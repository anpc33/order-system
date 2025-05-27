<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if (session()->has('error'))
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Layout responsive với order form luôn ở bên phải -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Phần giỏ hàng - Trên mobile, dưới desktop -->
            <div class="order-2 lg:order-1 flex-1 lg:w-2/3">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                        <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5 6m0 0h9m-9 0V9a2 2 0 012-2h2m5 0V7a2 2 0 012-2h2m0 0V5a2 2 0 012-2h2">
                                </path>
                            </svg>
                            Giỏ hàng của bạn
                        </h2>
                    </div>

                    <div class="p-6">
                        <!-- Mobile view -->
                        <div class="block md:hidden space-y-4">
                            @foreach ($cart as $productId => $item)
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="flex items-start space-x-4">
                                    @if($item['product']->thumbnail)
                                    <img src="{{ Storage::url($item['product']->thumbnail) }}"
                                        alt="{{ $item['product']->name }}"
                                        class="w-20 h-20 object-cover rounded-lg flex-shrink-0">
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-sm font-semibold text-gray-900 mb-1">{{ $item['product']->name
                                            }}</h3>
                                        <p class="text-xs text-gray-500 mb-2">{{
                                            Str::limit($item['product']->description, 40) }}</p>

                                        <div class="flex items-center justify-between mb-3">
                                            <span class="text-sm font-medium text-blue-600">{{
                                                number_format($item['product']->price) }}₫</span>
                                            <span class="text-xs text-gray-500">Kho: {{ $item['product']->stock
                                                }}</span>
                                        </div>

                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center bg-white rounded-lg border border-gray-300">
                                                <button type="button" wire:click="decrementQuantity({{ $productId }})"
                                                    class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50 rounded-l-lg transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M20 12H4" />
                                                    </svg>
                                                </button>
                                                <input type="number" wire:model="cart.{{ $productId }}.quantity"
                                                    class="w-12 text-center border-0 focus:ring-0 text-sm" min="0"
                                                    max="{{ $item['product']->stock }}">
                                                <button type="button" wire:click="incrementQuantity({{ $productId }})"
                                                    class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50 rounded-r-lg transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <span class="text-sm font-semibold text-gray-900">
                                                {{ number_format($item['product']->price * $item['quantity']) }}₫
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Desktop view -->
                        <div class="hidden md:block overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Sản phẩm
                                        </th>
                                        <th class="px-4 py-3 text-right text-sm font-semibold text-gray-700">Đơn giá
                                        </th>
                                        <th class="px-4 py-3 text-right text-sm font-semibold text-gray-700">Kho</th>
                                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Số lượng
                                        </th>
                                        <th class="px-4 py-3 text-right text-sm font-semibold text-gray-700">Thành tiền
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($cart as $productId => $item)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-4 py-4">
                                            <div class="flex items-center">
                                                @if($item['product']->thumbnail)
                                                <img src="{{ Storage::url($item['product']->thumbnail) }}"
                                                    alt="{{ $item['product']->name }}"
                                                    class="w-16 h-16 object-cover rounded-lg mr-4 flex-shrink-0">
                                                @endif
                                                <div class="min-w-0">
                                                    <h3 class="text-sm font-semibold text-gray-900 mb-1">{{
                                                        $item['product']->name }}</h3>
                                                    <p class="text-sm text-gray-500">{{
                                                        Str::limit($item['product']->description, 50) }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-right text-sm font-medium text-gray-900">
                                            {{ number_format($item['product']->price) }}₫
                                        </td>
                                        <td class="px-4 py-4 text-right text-sm text-gray-600">
                                            {{ $item['product']->stock }}
                                        </td>
                                        <td class="px-4 py-4 text-center">
                                            <div class="flex items-center justify-center">
                                                <div
                                                    class="flex items-center bg-gray-50 rounded-lg border border-gray-300">
                                                    <button type="button"
                                                        wire:click="decrementQuantity({{ $productId }})"
                                                        class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-l-lg transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M20 12H4" />
                                                        </svg>
                                                    </button>
                                                    <input type="number" wire:model="cart.{{ $productId }}.quantity"
                                                        class="w-16 text-center border-0 bg-transparent focus:ring-0 text-sm"
                                                        min="0" max="{{ $item['product']->stock }}">
                                                    <button type="button"
                                                        wire:click="incrementQuantity({{ $productId }})"
                                                        class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-r-lg transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 4v16m8-8H4" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-right text-sm font-semibold text-gray-900">
                                            {{ number_format($item['product']->price * $item['quantity']) }}₫
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Phần thông tin đặt hàng - Luôn ở bên phải trên desktop, trên cùng trên mobile -->
            <div class="order-1 lg:order-2 w-full lg:w-1/3 lg:max-w-md">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 lg:sticky lg:top-8">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                        <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            Thông tin đặt hàng
                        </h2>
                    </div>
                    <form wire:submit.prevent="submitOrder" class="p-6">
                        <div class="space-y-6">
                            <!-- Tổng tiền - Hiển thị trước trên mobile -->
                            <div class="lg:hidden bg-gray-50 rounded-lg p-4 space-y-3">
                                <h3 class="text-lg font-medium text-gray-900">Chi tiết thanh toán</h3>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Tạm tính:</span>
                                        <span class="text-gray-900 font-medium">{{ number_format($total) }}₫</span>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Phí vận chuyển:</span>
                                        <span class="text-green-600 font-medium">Miễn phí</span>
                                    </div>
                                    <div class="border-t border-gray-200 pt-3">
                                        <div class="flex justify-between items-center">
                                            <span class="text-lg font-semibold text-gray-900">Tổng cộng:</span>
                                            <span class="text-2xl font-bold text-blue-600">{{ number_format($total)
                                                }}₫</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Thông tin khách hàng -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-medium text-gray-900 border-b border-gray-200 pb-2">Thông tin
                                    khách hàng</h3>

                                <!-- Lựa chọn thông tin -->
                                <div class="space-y-3">
                                    <!-- Thông tin mặc định -->
                                    <div class="relative">
                                        <label
                                            class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                            <input type="radio" wire:model="use_default_info" value="1"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                            <div class="ml-3">
                                                <span class="text-sm font-medium text-gray-900">Sử dụng thông tin mặc
                                                    định</span>
                                                @if($use_default_info)
                                                <div class="mt-2 space-y-1 text-sm text-gray-500">
                                                    <p><span class="font-medium">Họ tên:</span> {{ Auth::user()->name }}
                                                    </p>
                                                    <p><span class="font-medium">SĐT:</span> {{ Auth::user()->phone }}
                                                    </p>
                                                    <p><span class="font-medium">Email:</span> {{ Auth::user()->email }}
                                                    </p>
                                                    <p><span class="font-medium">Địa chỉ:</span> {{
                                                        Auth::user()->address }}</p>
                                                </div>
                                                @endif
                                            </div>
                                        </label>
                                    </div>

                                    <!-- Thông tin mới -->
                                    <div class="relative">
                                        <label
                                            class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                            <input type="radio" wire:model.live="use_default_info" value="0"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                            <div class="ml-3">
                                                <span class="text-sm font-medium text-gray-900">Nhập thông tin
                                                    mới</span>
                                            </div>
                                        </label>

                                        <div x-data="{ show: @entangle('use_default_info').defer }" x-show="!show"
                                            x-cloak>
                                            <div
                                                class="mt-4 space-y-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Họ và
                                                        tên *</label>
                                                    <input type="text" wire:model.live="new_info.name"
                                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                                        placeholder="Nhập họ và tên">
                                                    @error('customer_name') <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Số điện
                                                        thoại *</label>
                                                    <input type="tel" wire:model.live="new_info.phone"
                                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                                        placeholder="Nhập số điện thoại">
                                                    @error('customer_phone') <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email
                                                        *</label>
                                                    <input type="email" wire:model.live="new_info.email"
                                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                                        placeholder="Nhập địa chỉ email">
                                                    @error('customer_email') <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Địa chỉ
                                                        *</label>
                                                    <textarea wire:model.live="new_info.address" rows="3"
                                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"
                                                        placeholder="Nhập địa chỉ giao hàng"></textarea>
                                                    @error('customer_address') <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Ghi chú</label>
                                    <textarea wire:model="note" rows="2"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"
                                        placeholder="Ghi chú thêm về đơn hàng (không bắt buộc)"></textarea>
                                </div>
                            </div>

                            <!-- Phương thức thanh toán -->
                            <div class="space-y-3">
                                <h3 class="text-lg font-medium text-gray-900 border-b border-gray-200 pb-2">Phương
                                    thức thanh toán</h3>
                                <div class="space-y-3">
                                    <label
                                        class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                        <input type="radio" wire:model="payment_method" value="cod"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3">
                                            <span class="text-sm font-medium text-gray-900">Thanh toán khi nhận hàng
                                                (COD)</span>
                                            <p class="text-xs text-gray-500">Thanh toán bằng tiền mặt khi nhận hàng</p>
                                        </div>
                                    </label>
                                    <label
                                        class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                        <input type="radio" wire:model="payment_method" value="banking"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3">
                                            <span class="text-sm font-medium text-gray-900">Chuyển khoản ngân
                                                hàng</span>
                                            <p class="text-xs text-gray-500">Thanh toán qua chuyển khoản</p>
                                        </div>
                                    </label>
                                </div>
                                @error('payment_method') <span class="text-red-500 text-sm mt-2 block">{{ $message
                                    }}</span> @enderror
                            </div>

                            <!-- Tổng tiền - Hiển thị cuối trên desktop -->
                            <div class="hidden lg:block bg-gray-50 rounded-lg p-4 space-y-3">
                                <h3 class="text-lg font-medium text-gray-900">Chi tiết thanh toán</h3>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Tạm tính:</span>
                                        <span class="text-gray-900 font-medium">{{ number_format($total) }}₫</span>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Phí vận chuyển:</span>
                                        <span class="text-green-600 font-medium">Miễn phí</span>
                                    </div>
                                    <div class="border-t border-gray-200 pt-3">
                                        <div class="flex justify-between items-center">
                                            <span class="text-lg font-semibold text-gray-900">Tổng cộng:</span>
                                            <span class="text-2xl font-bold text-blue-600">{{ number_format($total)
                                                }}₫</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nút đặt hàng -->
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-4 px-6 rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <span class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Đặt hàng ngay
                                </span>
                            </button>

                            <p class="text-xs text-gray-500 text-center">
                                Bằng việc đặt hàng, bạn đồng ý với
                                <a href="#" class="text-blue-600 hover:underline">Điều khoản dịch vụ</a>
                                và
                                <a href="#" class="text-blue-600 hover:underline">Chính sách bảo mật</a>
                                của chúng tôi.
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
