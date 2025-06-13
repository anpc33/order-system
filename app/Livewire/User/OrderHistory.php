<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class OrderHistory extends Component
{
    use WithPagination;

    public $selectedOrder = null;
    public $showOrderDetails = false;

    protected $listeners = [
        'echo:orders,OrderUpdated' => '$refresh'
    ];

    public function viewOrderDetails($orderId)
    {
        $this->selectedOrder = Order::with(['items'])->find($orderId);
        $this->showOrderDetails = true;
    }

    public function closeOrderDetails()
    {
        $this->showOrderDetails = false;
        $this->selectedOrder = null;
    }

    public function cancelOrder($orderId)
    {
        $order = Order::where('id', $orderId)
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->first();

        if (!$order) {
            session()->flash('error', 'Không thể hủy đơn hàng này.');
            return;
        }

        $order->status = 'cancelled';
        $order->save();

        $this->dispatch('orderStatusUpdated', orderId: $order->id, status: 'cancelled');
        $this->dispatch('orderCancelled', orderId: $order->id);

        session()->flash('success', 'Đơn hàng đã được hủy.');
    }

    public function getStatusBadgeClass($status)
    {
        return match ($status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'processing' => 'bg-blue-100 text-blue-800',
            'shipped' => 'bg-purple-100 text-purple-800',
            'delivered' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    public function getStatusText($status)
    {
        return match ($status) {
            'pending' => 'Chờ xử lý',
            'processing' => 'Đang xử lý',
            'shipped' => 'Đang giao hàng',
            'delivered' => 'Đã giao hàng',
            'cancelled' => 'Đã hủy',
            default => 'Không xác định',
        };
    }

    public function render()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.user.order-history', [
            'orders' => $orders
        ]);
    }
}
