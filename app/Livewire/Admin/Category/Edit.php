<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{
    public Category $category;
    public $name;
    public $description;
    public $status;

    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:255|unique:categories,name,' . $this->category->id,
            'description' => 'nullable|max:1000',
            'status' => 'boolean'
        ];
    }

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->description = $category->description;
        $this->status = $category->status;
    }

    public function save()
    {
        $this->validate();

        $this->category->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Danh mục đã được cập nhật thành công.');

        return redirect()->route('admin.categories.index');
    }

    public function render()
    {
        return view('livewire.admin.category.edit');
    }
}
