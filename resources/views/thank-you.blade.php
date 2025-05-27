<x-app-layout>
    <div class="min-h-screen flex flex-col items-center justify-center px-4 text-center">
        <h1 class="text-3xl font-bold text-green-600 mb-4">🎉 Đặt hàng thành công!</h1>
        <p class="text-gray-700 mb-6">Cảm ơn bạn đã mua hàng. Chúng tôi sẽ xử lý đơn hàng trong thời gian sớm nhất.</p>

        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('user.orders') }}"
                class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">
                📦 Xem đơn hàng của tôi
            </a>
            <a href="{{ route('dashboard') }}"
                class="bg-gray-100 text-gray-800 px-6 py-3 rounded hover:bg-gray-200 transition">
                🔙 Quay lại trang chủ
            </a>
        </div>
    </div>
</x-app-layout>