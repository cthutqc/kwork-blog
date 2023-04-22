<div class="bg-[#090b52] w-full block fixed inset-x-0 top-0 z-50 text-white z-50">
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
                    @if(count($categories))
                    <div x-show="open" @click.away="open = false" class="md:w-max text-black py-4 px-10 bg-white shadow fixed inset-0 md:h-fit md:absolute md:top-full block">
                        <ul class="block text-left m-auto">
                            @foreach($categories as $category)
                                <li>
                                    <x-category-link :category="$category" />
                                </li>
                            @endforeach
                        </ul>
                        <button @click.prevent="open = false" class="lg:hidden absolute right-4 top-4">
                            <x-icons.close />
                        </button>
                    </div>
                    @endif
                </div>
                <div class="pl-4 lg:w-[376px] hidden md:block">
                    <x-search />
                </div>
            </div>
            <div>
                @auth
                    <a href="{{route('users.dashboard')}}" class="hidden md:block">
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
