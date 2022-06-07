<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Create extends Component
{
    public $email;
    public $password;
    public $name;

    public function create()
    {
        $this->validate([
            'email' => 'required|email|unique:users',
            'name' => ['string', 'nullable'],
            'password' => 'required'
        ]);

        $user = User::Create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->user->email = $this->email;
        $this->user->name = $this->name;
        $user->save();

        $this->emitTo(\App\Http\Livewire\Users\Index::getName(), 'updateList');
    }

    public function render()
    {
        return view('livewire.users.create');
    }
}
