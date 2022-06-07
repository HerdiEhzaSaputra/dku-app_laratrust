<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $user;
    public $email;
    public $password;
    public $name;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->email = $user->email;
        $this->name = $user->name;
    }

    public function edit()
    {
        $this->validate([
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'name' => ['string', 'nullable'],
            'password' => 'nullable'
        ]);

        $this->user->email = $this->email;
        $this->user->name = $this->name;
        if($this->password) {
            $this->user->password = Hash::make($this->password);
        }
        $this->user->save();

        $this->emitTo(\App\Http\Livewire\Users\Index::getName(), 'updateList');
    }

    public function render()
    {
        return view('livewire.users.edit');
    }
}
