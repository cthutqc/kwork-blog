<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ResetPassword extends Component
{
    public $token;
    public $email;
    public $password;

    public function save()
    {
        Password::reset(
            $this->only(['token', 'email', 'password']),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(\Str::random(60));

                $user->save();
            }
        );

        session()->flash('success', 'Вы успешно смнели пароль и можете авторизоваться на сайте.');
    }

    public function mount($token)
    {
        $this->token = $token;
    }

    public function render()
    {
        return view('livewire.reset-password');
    }
}
