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
                    <div x-show="open" @click.away="open = false"
                         class="hidden md:w-max text-black py-4 px-10 bg-white shadow fixed inset-0 md:h-fit md:absolute md:top-full"
                         :class="{ 'hidden' : !open, 'block' : open }"
                    >
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
            <div class="relative flex justify-end items-center space-x-4">
                @auth
                    <a href="{{route('users.chat')}}" class="hidden md:flex space-x-2 items-center py-4 relative">
                        <img src="{{asset('images/11.png')}}" class="h-6"/>
                        <span class="block">Чат</span>
                        @if(auth()->user()->unreadMessages())
                            <span class="rounded-full bg-red-600 text-white absolute top-3 -right-3 h-4 w-4">
                                <span class="absolute inset-x-0 text-[10px] m-auto top-1/2 -translate-y-1/2 w-max">{{auth()->user()->unreadMessages()}}</span>
                            </span>
                        @endif
                    </a>
                    <button x-data="{open : false}" @click="open = !open" class="hidden md:flex items-center block space-x-2">
                        <img src="{{auth()->user()->getFirstMediaUrl() ? auth()->user()->getFirstMediaUrl() : asset('images/profile-placeholder.png')}}" class="h-8 w-8 rounded-full m-auto"/>
                        <span>{{auth()->user()->name}}</span>
                        <div x-show="open" @click.away="open = false"
                             class="hidden md:w-max text-black py-4 px-10 bg-white shadow fixed top-full right-0 md:h-fit md:absolute md:top-full"
                             :class="{ 'hidden' : !open, 'block' : open }"
                        >
                            <ul class="block text-left m-auto">
                                <li>
                                    <a href="{{route('users.dashboard')}}" class="flex space-x-2 items-center w-full py-4 transition-all duration-500 uppercase hover:translate-x-6">
                                        <img src="{{asset('images/home.png')}}" class="h-8"/>
                                        <span>Аккаунт</span>
                                    </a>
                                    <a href="{{route('users.add.article')}}" class="flex space-x-2 items-center w-full py-4 transition-all duration-500 uppercase hover:translate-x-6">
                                        <img src="{{asset('images/blog1.png')}}" class="h-8"/>
                                        <span>Добавить статью</span>
                                    </a>
                                    <a href="{{route('users.chat')}}" class="flex space-x-2 items-center w-full py-4 transition-all duration-500 uppercase hover:translate-x-6">
                                        <img src="{{asset('images/11.png')}}" class="h-8"/>
                                        <span>Чат</span>
                                    </a>
                                    <a href="{{route('logout')}}" class="flex space-x-2 items-center w-full py-4 transition-all duration-500 uppercase hover:translate-x-6">
                                        <img src="{{asset('images/dbl12.png')}}" class="h-8"/>
                                        <span>Выйти</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </button>
                @else
                    <a href="{{route('pages.login')}}" class="hidden md:block">
                        Войти
                    </a>
                @endauth
            </div>
        </div>
    </x-container>
</div>
