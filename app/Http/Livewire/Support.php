<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Notifications\SupportRequestNotification;
use Livewire\Component;

class Support extends Component
{
    public $name;
    public $email;
    public $message;

    public function send()
    {
        $validated = $this->validate([
           'name' => 'required',
           'email' => 'required|email',
           'message' => 'required',
        ]);

        User::whereHas('roles', function ($q) use($validated){
            $q->where('name', 'admin');
        })->each(function ($user) use($validated){
            $user->notify(new SupportRequestNotification($validated));
        });

        session()->flash('success', 'Ваш запрос успешно отправлен.');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.support');
    }
}
