<div class="-mt-[90px] bg-gradient-to-b from-[#ffea31] to-[#ffbe5e] rounded-md p-10 block lg:flex lg:justify-between text-black text-center space-y-8 lg:space-y-0 lg:space-x-6 z-20">
    <div>
        <img src="{{$banner->getFirstMediaUrl() ? $banner->getFirstMediaUrl() : asset('images/idea.png')}}" class="m-auto" />
    </div>
    <div class="w-full lg:text-left">
        <x-title>
            {{$banner->name}}
        </x-title>
        <p class="font-semibold">
            {{$banner->text}}
        </p>
    </div>
    <div class="lg:min-w-[200px]">
        <a href="{{auth()->user() ? route('users.dashboard') : route('pages.login')}}" class="bg-[#0a2236] text-white py-3 w-max m-auto lg:w-full px-8 text-lg rounded-3xl block">
            {{$banner->button_text}}
        </a>
    </div>
</div>
