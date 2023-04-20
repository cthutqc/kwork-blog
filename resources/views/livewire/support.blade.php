<div class="rounded-md bg-white shadow-xl overflow-hidden grid md:grid-cols-3 my-[200px] w-full lg:w-2/3 m-auto">
    <div class="md:col-span-2 p-10">
        <form id="comment" wire:submit.prevent="send" class="relative">
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
                <input type="text"
                       @class([
                             'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                             'border !border-red-500' => $errors->first('email'),
                         ])
                       wire:model="email"
                       placeholder="Email">
            </div>

            <div class="my-4">
                <textarea wire:model="message"
                         @class([
                            'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                            'border !border-red-500' => $errors->first('message'),
                        ])>

                </textarea>
            </div>
            @if (session()->has('success'))
                <div class="text-center leading-normal text-green-500">
                    {{ session('success') }}
                </div>
            @else (session()->has('error'))
                <div class="text-center leading-normal text-red-500">
                    {{ session('error') }}
                </div>
            @endif
            <x-form-button>
                Отправить
            </x-form-button>
            <div wire:loading wire:target="send" class="absolute inset-0 bg-white bg-opacity-60">
                <x-loading />
            </div>
        </form>
    </div>
    <div class="hidden md:block bg-[#dcefff] p-10 text-center space-y-4">
        <x-title>Напишите нам</x-title>
        <p class="text-left">Ваше мнение о сайте важно для нас. Если у вас трудности в использовании или вы хотите предложить улучшение сайта, напишите нам.</p>
    </div>
</div>
