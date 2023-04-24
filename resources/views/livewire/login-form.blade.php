<div class="bg-white rounded-b-md w-full md:w-[460px] m-auto overflow-hidden shadow relative">
    <div class="h-[10px] bg-gradient-to-r from-[#7fccbb] to-[#4c7af1]"></div>
    <div class="p-10">
        @if (session()->has('success'))
            <div class="text-center leading-normal text-green-500">
                {{ session('success') }}
            </div>
        @else (session()->has('error'))
            <div class="text-center leading-normal text-red-500">
                {{ session('error') }}
            </div>
        @endif
        @if (!session()->has('success'))
            @if($isLogin)
                <form wire:submit.prevent="login">
                    <div class="my-4">
                        <input type="email"
                               @class([
                                     'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                                     'border !border-red-500' => $errors->first('email'),
                                 ])
                               wire:model="email"
                               placeholder="Email">
                    </div>
                    <div class="my-4">
                        <input type="password"
                               @class([
                                     'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                                     'border !border-red-500' => $errors->first('password'),
                                 ])
                               wire:model="password"
                               placeholder="Пароль">
                    </div>
                    <x-form-button>
                        Войти
                    </x-form-button>
                </form>
            @elseif($isRegister)
                <form wire:submit.prevent="register">
                    <div class="my-4">
                        <input type="text"
                               @class([
                                     'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                                     'border !border-red-500' => $errors->first('name'),
                                 ])
                               wire:model="name"
                               placeholder="Имя">
                    </div>
                    <div class="my-4">
                        <input type="email"
                               @class([
                                  'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                                  'border !border-red-500' => $errors->first('email'),
                              ])
                               wire:model="email"
                               placeholder="Email">
                    </div>
                    <div class="my-4">
                        <input type="password"
                               @class([
                                     'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                                     'border !border-red-500' => $errors->first('password'),
                                 ])
                               wire:model="password"
                               placeholder="Пароль">
                    </div>
                    <x-form-button>
                        Зарегистрироваться
                    </x-form-button>
                </form>
            @else
                <form wire:submit.prevent="remind">
                    <div class="my-4">
                        <input type="email"
                               @class([
                                     'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                                     'border !border-red-500' => $errors->first('email'),
                                 ])
                               wire:model="email"
                               placeholder="Email">
                    </div>
                    <x-form-button>
                        Напомнить пароль
                    </x-form-button>
                </form>
            @endif
        @endif
    </div>
    <div class="flex justify-between px-2 py-4 bg-slate-100 text-sm md:text-base">
        <button wire:click="loginPage" class="text-[#47b5ff]">Есть акаунт?</button>
        <button wire:click="registerPage" class="text-[#47b5ff]">Регистрация?</button>
        <button wire:click="reminderPage" class="text-[#47b5ff]">Забыли пароль?</button>
    </div>
    <div wire:loading wire:target="login,register,remind" class="absolute inset-0 bg-white bg-opacity-60">
        <x-loading />
    </div>
    <script>
        function phoneMask(input) {
            return '+7 (999) 999-99-99'
        }
    </script>
</div>
