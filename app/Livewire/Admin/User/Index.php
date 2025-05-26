<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $role = '';
    public $perPage = 10;

    protected $queryString = ['search', 'role'];

    public function mount()
    {
        $this->search = request()->query('search', '');
        $this->role = request()->query('role', '');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedRole()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'role']);
        $this->resetPage();
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($q) {
                $q->where(function ($sub) {
                    $sub->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->role, function ($q) {
                $q->whereHas('role', fn($r) => $r->where('name', $this->role));
            })
            ->with('role')
            ->latest()
            ->paginate($this->perPage);

        $roles = Role::all();

        return view('livewire.admin.user.index', compact('users', 'roles'));
    }
}
