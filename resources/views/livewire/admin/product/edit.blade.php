<div class="p-6 max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Chỉnh sửa sản phẩm</h1>
            <p class="mt-1 text-sm text-gray-600">Cập nhật thông tin sản phẩm</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <form wire:submit="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tên sản phẩm -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                    <input type="text" wire:model="name" id="name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                    <input type="text" wire:model="slug" id="slug"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('slug') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Danh mục -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Danh mục</label>
                    <select wire:model="category_id" id="category_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Chọn danh mục</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Giá gốc -->
                <div>
                    <label for="original_price" class="block text-sm font-medium text-gray-700">Giá gốc</label>
                    <input type="number" step="0.01" wire:model="original_price" id="original_price"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('original_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Giá bán -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Giá bán</label>
                    <input type="number" step="0.01" wire:model="price" id="price"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Số lượng -->
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700">Số lượng</label>
                    <input type="number" wire:model="stock" id="stock"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('stock') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Trạng thái -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                    <select wire:model="status" id="status"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="active">Đang hoạt động</option>
                        <option value="inactive">Ngừng hoạt động</option>
                    </select>
                    @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Ảnh thumbnail -->
                <div class="md:col-span-2">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700">Ảnh thumbnail</label>
                    <input type="file" wire:model="thumbnail" id="thumbnail" accept="image/*"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    @error('thumbnail') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                    <!-- Preview -->
                    <div class="mt-2">
                        @if ($thumbnail)
                            <img src="{{ $thumbnail->temporaryUrl() }}" class="h-32 w-32 object-cover rounded-lg">
                        @elseif ($oldThumbnail)
                            <img src="{{ Storage::url($oldThumbnail) }}" class="h-32 w-32 object-cover rounded-lg">
                        @endif
                    </div>
                </div>

                <!-- Mô tả -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Mô tả</label>
                    <textarea wire:model="description" id="description" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end space-x-3">
                <a href="{{ route('admin.products.index') }}"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Hủy
                </a>
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cập nhật sản phẩm
                </button>
            </div>
        </form>
    </div>
</div>
