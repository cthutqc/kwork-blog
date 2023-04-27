<div class="bg-white rounded-b-md w-full lg:w-2/3 m-auto overflow-hidden shadow relative">
    <div class="h-[10px] bg-gradient-to-r from-[#7fccbb] to-[#4c7af1]"></div>
    <div class="p-10">
        @if (!session()->has('success'))
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

            <div class="relative my-4">
                <label for="preview" class="cursor-pointer">
                    <input type="file" id="preview" wire:model="image" class="hidden">
                    @if($image)
                        <img src="{{$image->temporaryUrl()}}"
                              class="m-auto h-[200px] w-[200px] shadow" />
                    @else
                        <div class="m-auto text-center p-10 w-full shadow bg-slate-100">
                            Загрузить превью статьи
                        </div>
                    @endif
                </label>
                <div wire:loading wire:target="image" class="absolute inset-0 bg-white bg-opacity-60">
                    <x-loading />
                </div>
            </div>

            <livewire:trix :value="$text" />

            <div class="my-4">

                <select wire:model="category_id"
                    @class([
                           'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                           'border !border-red-500' => $errors->first('category_id'),
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

            <x-form-button>
                Отправить
            </x-form-button>

            @endif

            @if (session()->has('success'))
                <div class="text-center leading-normal text-green-500">
                    {{ session('success') }}
                </div>
            @else (session()->has('error'))
                <div class="text-center leading-normal text-red-500">
                    {{ session('error') }}
                </div>
            @endif

            <div wire:loading wire:target="submit" class="absolute inset-0 bg-white bg-opacity-60">
                <x-loading />
            </div>
        </form>
    </div>
</div>
