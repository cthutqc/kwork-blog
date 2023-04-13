<?php

namespace App\Http\Livewire;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class LoginForm extends Component implements Forms\Contracts\HasForms
{
    use InteractsWithForms;

    public $name;
    public $phone;
    public $email;
    public $password;
    public $isLogin = true;
    public $isRegister = false;
    public $isReminder = false;

    public function mount()
    {
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($this->only(['email', 'password']))) {
            session()->flash('success', 'Поздравляем! Вы успешно вошли на сайт.');
        } else {
            session()->flash('error', 'Введенные вами данные не найдены.');
        }
    }

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::create($this->only(['name', 'email', 'password']));

        $user->assignRole('user');

        if(Auth::attempt($this->only(['email', 'password']))) {
            session()->flash('success', 'Поздравляем! Вы успешно зарегистрировались на сайте.');
        } else {
            session()->flash('error', 'Поздравляем! Вы успешно зарегистрировались на сайте.');
        }
    }

    public function remind()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        Password::sendResetLink(['email' => $this->email]);

        session()->flash('success', 'На указаный почтовый ящик выслана инструкция по смене пароля.');
    }

    public function loginPage()
    {
        $this->isLogin = true;
        $this->isRegister = false;
        $this->isReminder = false;
    }

    public function registerPage()
    {
        $this->isLogin = false;
        $this->isRegister = true;
        $this->isReminder = false;
    }

    public function reminderPage()
    {
        $this->isLogin = false;
        $this->isRegister = false;
        $this->isReminder = true;
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
