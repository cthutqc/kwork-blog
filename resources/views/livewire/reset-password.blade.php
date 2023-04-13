<div class="bg-white rounded-b-md w-full md:w-[460px] m-auto overflow-hidden shadow">
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
        <form wire:submit.prevent="save">
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
                Сохранить
            </x-form-button>
        </form>
    </div>
</div>
