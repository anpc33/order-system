<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(auth()->check() && auth()->user()->role_id === 1)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Tổng số người dùng -->
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-2xl font-bold text-blue-600">{{ $userCount }}</div>
                    <div class="text-gray-500 mt-2">Người dùng</div>
                </div>
                <!-- Tổng số sản phẩm -->
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-2xl font-bold text-green-600">{{ $productCount }}</div>
                    <div class="text-gray-500 mt-2">Sản phẩm</div>
                </div>
                <!-- Tổng số đơn hàng -->
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-2xl font-bold text-yellow-600">{{ $orderCount }}</div>
                    <div class="text-gray-500 mt-2">Đơn hàng</div>
                </div>
                <!-- Tổng doanh thu -->
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-2xl font-bold text-red-600">{{number_format($totalRevenue, 0, ',', '.') }}₫</div>
                    <div class="text-gray-500 mt-2">Doanh thu</div>
                </div>
            </div>

            <!-- Đơn hàng mới nhất -->
            <div class="bg-white rounded-lg shadow p-6 mt-3">
                <h3 class="text-lg font-semibold mb-4">Đơn hàng mới nhất</h3>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Mã ĐH</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Khách hàng</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tổng tiền</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Trạng thái</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestOrders as $order)
                        <tr>
                            <td class="px-4 py-2">{{ $order->id }}</td>
                            <td class="px-4 py-2">{{ $order->user->name ?? 'Khách' }}</td>
                            <td class="px-4 py-2">{{ number_format($order->total_price, 0, ',', '.') }}₫</td>
                            <td class="px-4 py-2">
                                <span
                                    class="px-2 py-1 rounded-full text-xs {{ $order->status == 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Chào mừng bạn đến với trang quản trị!</h3>
                <p>Vui lòng đăng nhập với tài khoản quản trị để xem thông tin chi tiết.</p>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
