<div class="bg-[#191919] w-full py-2 md:py-10 text-white fixed bottom-0 inset-x-0 z-50 md:z-0 md:relative">
    <x-container>
        <div class="flex justify-between items-center md:hidden">
            <a href="{{route('pages.home')}}" class="space-y-2">
                <img src="{{asset('images/home.png')}}" class="w-6 h-6 m-auto">
                <span>На главную</span>
            </a>
            <div x-data={open:false} class="space-y-2 cursor-pointer">
                <button @click="open = !open">
                    <img src="{{asset('images/search1.png')}}" class="w-6 h-6 m-auto">
                    <span>Поиск</span>
                </button>
                <div x-show="open" class="fixed inset-0 bg-black bg-opacity-80 z-[999]">
                    <x-container>
                        <form action="{{route('search.show')}}" method="GET" class="py-4">
                            <div class="relative">
                                <input type="text" @click.away="open = false" name="q" placeholder="Поиск..." class="text-black w-full block rounded-sm p-4" />
                                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2">
                                    <x-icons.search class="w-6 h-6 fill-black"/>
                                </button>
                            </div>
                        </form>
                    </x-container>
                </div>
            </div>
            <a href="{{route('pages.login')}}" class="space-y-2">
                <img src="{{asset('images/shop.png')}}" class="w-6 h-6 m-auto">
                <span>
                @auth
                        {{auth()->user()->name}}
                @else
                        Войти
                @endauth
                </span>
            </a>
            <button class="space-y-2">
                <img src="{{asset('images/how1.png')}}" class="w-6 h-6 m-auto">
                <span>Поддержка</span>
            </button>
        </div>
        <div class="hidden md:flex">
            footer
        </div>
    </x-container>
</div>
