<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $name = '';
    public $description = '';
    public $status = true;

    protected $rules = [
        'name' => 'required|min:3|max:255|unique:categories',
        'description' => 'nullable|max:1000',
        'status' => 'boolean'
    ];

    public function save()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Danh mục đã được tạo thành công.');

        return redirect()->route('admin.categories.index');
    }

    public function render()
    {
        return view('livewire.admin.category.create');
    }
}
