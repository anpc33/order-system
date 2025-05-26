<div class="p-6 max-w-7xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Chỉnh sửa danh mục</h1>
        <p class="mt-1 text-sm text-gray-600">Cập nhật thông tin danh mục sản phẩm</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <form wire:submit="save">
            <div class="space-y-6">
                <!-- Tên danh mục -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên danh mục</label>
                    <div class="mt-1">
                        <input type="text" wire:model="name" id="name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('name') border-red-300 @enderror"
                            placeholder="Nhập tên danh mục">
                    </div>
                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mô tả -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                    <div class="mt-1">
                        <textarea wire:model="description" id="description" rows="3"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('description') border-red-300 @enderror"
                            placeholder="Nhập mô tả danh mục"></textarea>
                    </div>
                    @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Trạng thái -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input type="checkbox" wire:model="status"
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-600">Đang hoạt động</span>
                        </label>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t">
                    <a href="{{ route('admin.categories.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Hủy
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cập nhật danh mục
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
