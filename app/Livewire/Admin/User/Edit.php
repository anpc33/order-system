<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public $user;
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
        'password' => 'nullable|min:6',
        'role_id' => 'required|exists:roles,id'
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->role_id = $user->role_id;
    }

    public function update()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'role_id' => $this->role_id
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        $this->user->update($data);

        session()->flash('message', 'Người dùng đã được cập nhật thành công!');
        return redirect()->route('admin.users.index');
    }

    public function render()
    {
        return view('livewire.admin.user.edit', [
            'roles' => Role::all()
        ]);
    }
}
