<div class="bg-white rounded-b-md w-full lg:w-2/3 m-auto overflow-hidden shadow relative">
    <div class="h-[10px] bg-gradient-to-r from-[#7fccbb] to-[#4c7af1]"></div>
    <div class="p-10">
        <form wire:submit.prevent="submit">

            <div class="my-4">
                <input type="text"
                       @class([
                             'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                             'border !border-red-500' => $errors->first('name'),
                         ])
                       wire:model="name"
                       placeholder="Заголовок">
            </div>

            <div class="my-4">
                <textarea wire:model="text"
                         @class([
                            'border border-slate-100 h-[200px] rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                            'border !border-red-500' => $errors->first('meta_description'),
                        ])
                        placeholder="Текст">

                </textarea>
            </div>

            <div class="my-4">

                <select wire:model="category_id"
                    @class([
                           'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                           'border !border-red-500' => $errors->first('meta_description'),
                       ])>
                    <option value="">Выбрать категорию</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

            </div>

            <div class="my-4">
                <input type="text"
                       @class([
                             'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                             'border !border-red-500' => $errors->first('h1'),
                         ])
                       wire:model="h1"
                       placeholder="H1">
            </div>

            <div class="my-4">
                <input type="text"
                       @class([
                             'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                             'border !border-red-500' => $errors->first('meta_title'),
                         ])
                       wire:model="meta_title"
                       placeholder="Meta Title">
            </div>

            <div class="my-4">
                <textarea wire:model="meta_description"
                         @class([
                            'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                            'border !border-red-500' => $errors->first('meta_description'),
                        ])
                         placeholder="Meta description">

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
            <div wire:loading wire:target="submit" class="absolute inset-0 bg-white bg-opacity-60">
                <x-loading />
            </div>
        </form>
    </div>
</div>
