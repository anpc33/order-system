<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';
    public $perPage = 10;

    protected $queryString = ['search', 'category'];

    public function mount()
    {
        $this->search = request()->query('search', '');
        $this->category = request()->query('category', '');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCategory()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'category']);
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::query()
            ->when($this->search, function ($q) {
                $q->where(function ($sub) {
                    $sub->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->category, function ($q) {
                $q->whereHas('category', fn($c) => $c->where('id', $this->category));
            })
            ->with('category')
            ->latest()
            ->paginate($this->perPage);

        $categories = Category::all();

        return view('livewire.admin.product.index', compact('products', 'categories'));
    }
}
