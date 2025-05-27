<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                        </path>
                    </svg>
                    Lịch sử đơn hàng
                </h2>
            </div>

            <div class="p-6">
                @if($orders->isEmpty())
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Chưa có đơn hàng nào</h3>
                        <p class="mt-1 text-sm text-gray-500">Bạn chưa có đơn hàng nào trong lịch sử.</p>
                        <div class="mt-6">
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                    </path>
                                </svg>
                                Mua sắm ngay
                            </a>
                        </div>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Mã đơn hàng
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Ngày đặt
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tổng tiền
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Trạng thái
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Thao tác
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($orders as $order)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $order->code }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $order->created_at->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ number_format($order->total_price) }}₫
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $this->getStatusBadgeClass($order->status) }}">
                                                @switch($order->status)
                                                    @case('pending') Chờ xác nhận @break
                                                    @case('confirmed') Đã xác nhận @break
                                                    @case('shipped') Đang giao hàng @break
                                                    @case('completed') Đã hoàn thành @break
                                                    @case('cancelled') Đã hủy @break
                                                @endswitch
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 gap-3">
                                            @if($order->status == 'pending')
                                                <button wire:click="cancelOrder({{ $order->id }})" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')"
                                                    class="text-red-600 hover:text-red-900">Hủy đơn hàng</button>
                                            @endif
                                            <button wire:click="viewOrderDetails({{ $order->id }})"
                                                class="text-blue-600 hover:text-blue-900 ml-3">Xem chi tiết</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- Modal chi tiết đơn hàng -->
        @if($showOrderDetails && $selectedOrder)
            <div class="fixed inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        Chi tiết đơn hàng #{{ $selectedOrder->code }}
                                    </h3>
                                    <div class="mt-4 space-y-4">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Thông tin người nhận</h4>
                                            <div class="mt-2 text-sm text-gray-500">
                                                <p><span class="font-medium">Họ tên:</span> {{ $selectedOrder->receiver_name }}</p>
                                                <p><span class="font-medium">SĐT:</span> {{ $selectedOrder->phone }}</p>
                                                <p><span class="font-medium">Địa chỉ:</span> {{ $selectedOrder->address }}</p>
                                            </div>
                                        </div>

                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Sản phẩm</h4>
                                            <div class="mt-2 space-y-2">
                                                @foreach($selectedOrder->items as $item)
                                                    <div class="flex justify-between text-sm">
                                                        <span>{{ $item->product_name }} x {{ $item->quantity }}</span>
                                                        <span>{{ number_format($item->total) }}₫</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="border-t border-gray-200 pt-4">
                                            <div class="flex justify-between text-sm font-medium">
                                                <span>Tổng tiền:</span>
                                                <span>{{ number_format($selectedOrder->total_price) }}₫</span>
                                            </div>
                                        </div>

                                        @if($selectedOrder->note)
                                            <div>
                                                <h4 class="text-sm font-medium text-gray-900">Ghi chú</h4>
                                                <p class="mt-1 text-sm text-gray-500">{{ $selectedOrder->note }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" wire:click="closeOrderDetails"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Đóng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
