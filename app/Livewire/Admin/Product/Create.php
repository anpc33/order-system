<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public $name = '';
    public $slug = '';
    public $description = '';
    public $original_price = '';
    public $price = '';
    public $stock = '';
    public $thumbnail;
    public $category_id = '';
    public $status = 'active';

    protected $rules = [
        'name' => 'required|min:3',
        'slug' => 'required|unique:products,slug',
        'description' => 'required',
        'original_price' => 'required|numeric|min:0',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'thumbnail' => 'required|image|max:1024', // max 1MB
        'category_id' => 'required|exists:categories,id',
        'status' => 'required|in:active,inactive'
    ];

    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }

    public function save()
    {
        $this->validate();

        // Upload thumbnail
        $thumbnailPath = $this->thumbnail->store('products', 'public');

        Product::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'original_price' => $this->original_price,
            'price' => $this->price,
            'stock' => $this->stock,
            'thumbnail' => $thumbnailPath,
            'category_id' => $this->category_id,
            'status' => $this->status
        ]);

        session()->flash('message', 'Sản phẩm đã được tạo thành công!');
        return redirect()->route('admin.products.index');
    }

    public function render()
    {
        return view('livewire.admin.product.create', [
            'categories' => Category::where('status', true)->get()
        ]);
    }
}
