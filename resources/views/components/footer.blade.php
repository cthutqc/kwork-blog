<div class="bg-[#191919] w-full py-2 md:py-10 text-white fixed bottom-0 inset-x-0 z-50 md:z-0 md:relative z-20">
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
                <div x-show="open" class="fixed inset-0 bg-black bg-opacity-80 z-50">
                    <x-container>
                        <x-search />
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
            <a href="{{route('pages.show', 'about')}}">О блоге</a>
        </div>
    </x-container>
</div>
