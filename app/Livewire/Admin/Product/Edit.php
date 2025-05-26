<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public Product $product;
    public $name;
    public $slug;
    public $description;
    public $original_price;
    public $price;
    public $stock;
    public $thumbnail;
    public $category_id;
    public $status;
    public $oldThumbnail;

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'slug' => 'required|unique:products,slug,' . $this->product->id,
            'description' => 'required',
            'original_price' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'thumbnail' => 'nullable|image|max:1024', // max 1MB
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:active,inactive'
        ];
    }

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->description = $product->description;
        $this->original_price = $product->original_price;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->category_id = $product->category_id;
        $this->status = $product->status;
        $this->oldThumbnail = $product->thumbnail;
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'original_price' => $this->original_price,
            'price' => $this->price,
            'stock' => $this->stock,
            'category_id' => $this->category_id,
            'status' => $this->status
        ];

        // Xử lý upload thumbnail mới nếu có
        if ($this->thumbnail) {
            // Xóa thumbnail cũ
            if ($this->oldThumbnail) {
                Storage::disk('public')->delete($this->oldThumbnail);
            }
            // Upload thumbnail mới
            $data['thumbnail'] = $this->thumbnail->store('products', 'public');
        }

        $this->product->update($data);

        session()->flash('message', 'Sản phẩm đã được cập nhật thành công!');
        return redirect()->route('admin.products.index');
    }

    public function render()
    {
        return view('livewire.admin.product.edit', [
            'categories' => Category::where('status', true)->get()
        ]);
    }
}
