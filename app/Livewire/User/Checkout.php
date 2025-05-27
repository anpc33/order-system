<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Checkout extends Component
{
    public $cart = [];
    public $total = 0;
    public $customer_name = '';
    public $customer_phone = '';
    public $customer_email = '';
    public $customer_address = '';
    public $note = '';
    public $payment_method = 'cod';
    public $error_message = '';
    public $use_default_info = true;
    public $new_info = [
        'name' => '',
        'phone' => '',
        'email' => '',
        'address' => ''
    ];

    protected $rules = [
        'customer_name' => 'required|min:3',
        'customer_phone' => 'required|min:10',
        'customer_email' => 'required|email',
        'customer_address' => 'required|min:10',
        'payment_method' => 'required|in:cod,banking',
    ];

    public function mount()
    {
        $products = Product::where('status', 'active')->get();

        // Khởi tạo mảng giỏ hàng với quantity = 0
        foreach ($products as $product) {
            $this->cart[$product->id] = [
                'product' => $product,
                'quantity' => 0,
            ];
        }

        // Lấy thông tin user hiện tại
        $user = Auth::user();
        if ($user) {
            $this->customer_name = $user->name;
            $this->customer_phone = $user->phone;
            $this->customer_email = $user->email;
            $this->customer_address = $user->address;
        }
    }

    public function updatedUseDefaultInfo($value)
    {
        if ($value) {
            // Khi chọn thông tin mặc định
            $user = Auth::user();
            $this->customer_name = $user->name;
            $this->customer_phone = $user->phone;
            $this->customer_email = $user->email;
            $this->customer_address = $user->address;
            // Reset thông tin mới
            $this->new_info = [
                'name' => '',
                'phone' => '',
                'email' => '',
                'address' => ''
            ];
        } else {
            // Khi chọn thông tin mới
            $this->customer_name = $this->new_info['name'];
            $this->customer_phone = $this->new_info['phone'];
            $this->customer_email = $this->new_info['email'];
            $this->customer_address = $this->new_info['address'];
        }
    }

    public function updatedNewInfo($value, $key)
    {
        if (!$this->use_default_info) {
            $this->{"customer_" . $key} = $value;
        }
    }

    public function updatedCart()
    {
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = 0;
        foreach ($this->cart as $item) {
            if ($item['quantity'] > 0) {
                $this->total += $item['product']->price * $item['quantity'];
            }
        }
    }

    public function incrementQuantity($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            $this->addError('cart', 'Sản phẩm không tồn tại');
            return;
        }

        if ($this->cart[$productId]['quantity'] < $product->stock) {
            $this->cart[$productId]['quantity']++;
            $this->calculateTotal();
        } else {
            $this->addError('cart', "Sản phẩm {$product->name} chỉ còn {$product->stock} sản phẩm trong kho");
        }
    }

    public function decrementQuantity($productId)
    {
        if ($this->cart[$productId]['quantity'] > 0) {
            $this->cart[$productId]['quantity']--;
            $this->calculateTotal();
        }
    }

    public function updated($propertyName)
    {
        // Kiểm tra khi người dùng nhập trực tiếp số lượng
        if (str_starts_with($propertyName, 'cart.')) {
            $parts = explode('.', $propertyName);
            if (count($parts) === 3 && $parts[2] === 'quantity') {
                $productId = $parts[1];
                $product = Product::find($productId);

                if ($product && $this->cart[$productId]['quantity'] > $product->stock) {
                    $this->cart[$productId]['quantity'] = $product->stock;
                    $this->addError('cart', "Sản phẩm {$product->name} chỉ còn {$product->stock} sản phẩm trong kho");
                }
            }
        }
    }

    public function submitOrder()
    {
        // Reset error message
        $this->error_message = '';

        // Validate thông tin khách hàng
        $this->validate();

        // Kiểm tra giỏ hàng
        $hasItems = false;
        foreach ($this->cart as $item) {
            if ($item['quantity'] > 0) {
                $hasItems = true;
                break;
            }
        }

        if (!$hasItems) {
            $this->addError('cart', 'Vui lòng chọn ít nhất một sản phẩm');
            return;
        }

        // Kiểm tra tồn kho
        foreach ($this->cart as $item) {
            if ($item['quantity'] > 0) {
                $product = Product::find($item['product']->id);
                if (!$product) {
                    $this->addError('cart', 'Một số sản phẩm không tồn tại');
                    return;
                }
                if ($product->stock < $item['quantity']) {
                    $this->addError('cart', "Sản phẩm {$product->name} chỉ còn {$product->stock} sản phẩm trong kho");
                    return;
                }
            }
        }

        try {
            DB::beginTransaction();

            // Tạo mã đơn hàng
            $orderCode = 'ORD-' . strtoupper(Str::random(8));

            // Tạo đơn hàng
            $order = Order::create([
                'user_id' => Auth::id(),
                'code' => $orderCode,
                'receiver_name' => $this->customer_name,
                'phone' => $this->customer_phone,
                'address' => $this->customer_address,
                'note' => $this->note,
                'payment_method' => $this->payment_method,
                'total_price' => $this->total,
                'status' => 'pending'
            ]);

            // Tạo chi tiết đơn hàng và cập nhật tồn kho
            foreach ($this->cart as $item) {
                if ($item['quantity'] > 0) {
                    $product = Product::find($item['product']->id);

                    // Tạo chi tiết đơn hàng
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'product_name' => $product->name,
                        'price' => $product->price,
                        'quantity' => $item['quantity'],
                        'total' => $product->price * $item['quantity']
                    ]);

                    // Cập nhật số lượng sản phẩm
                    $product->stock -= $item['quantity'];
                    $product->save();
                }
            }

            DB::commit();
            return redirect()->route('checkout.thankyou');
            session()->flash('success', 'Đặt hàng thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất.');

        } catch (\Exception $e) {
            DB::rollBack();
            $this->error_message = 'Có lỗi xảy ra khi đặt hàng: ' . $e->getMessage();
            session()->flash('error', $this->error_message);
        }
    }

    public function render()
    {
        return view('livewire.user.checkout');
    }
}
