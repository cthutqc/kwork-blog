<div class="bg-[#090b52] w-full block fixed inset-x-0 top-0 z-50 text-white">
    <x-container>
        <div class="flex justify-between items-center w-full">
            <div class="flex justify-start items-center space-x-4 flex-wrap">
                <a href="{{route('pages.home')}}">
                    <img src="{{asset('images/logo-b.png')}}" />
                </a>
                <div x-data="{ open: false }" class="relative border-l border-l-slate-50 border-opacity-50 pl-4">
                    <button @click="open = !open" class="py-4">
                        <span class="block">Категории</span>
                    </button>
                    <div x-show="open" @click.away="open = false" class="lg:w-max text-black p-4 bg-white shadow fixed inset-0 lg:h-fit lg:absolute lg:top-full">
                        <ul class="block text-center lg:text-left">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{route('categories.show', $category)}}" @class([
                                    "block w-full p-4",
                                    "font-bold" => request()->segment(2) == $category->slug,
                                ])>{{$category->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                        <button @click.prevent="open = false" class="lg:hidden absolute right-4 top-4">
                            <x-icons.close />
                        </button>
                    </div>
                </div>
                <div class="pl-4 lg:w-[376px] hidden md:block">
                    <form action="{{route('search.show')}}" method="GET">
                        <input type="text" name="q" placeholder="Поиск..." class="w-full text-black rounded-sm px-4 py-2">
                    </form>
                </div>
            </div>
            <div>
                @auth
                    <a href="#" class="hidden md:block">
                        {{auth()->user()->name}}
                    </a>
                @else
                    <a href="{{route('pages.login')}}" class="hidden md:block">
                        Войти
                    </a>
                @endauth
            </div>
        </div>
    </x-container>
</div>
