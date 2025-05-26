<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class Create extends Component
{
    public $name;
    public $email;
    public $phone;
    public $address;
    public $password;
    public $role_id;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users,email',
        'phone' => 'required|min:10',
        'address' => 'required',
        'password' => 'required|min:6',
        'role_id' => 'required|exists:roles,id'
    ];

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'password' => Hash::make($this->password),
            'role_id' => $this->role_id
        ]);

        session()->flash('message', 'Người dùng đã được tạo thành công!');
        return redirect()->route('admin.users.index');
    }

    public function render()
    {
        return view('livewire.admin.user.create', [
            'roles' => Role::all()
        ]);
    }
}
