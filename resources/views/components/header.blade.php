<div class="bg-[#090b52] w-full block fixed inset-x-0 top-0 z-50 py-4 lg:py-2 text-white">
    <x-container>
        <div class="flex justify-between items-center w-full">
            <div class="flex justify-start items-center space-x-4 flex-wrap">
                <a href="{{route('pages.home')}}">
                    <img src="{{asset('images/logo-b.png')}}" />
                </a>
                <div class="border-l border-l-slate-50 border-opacity-50 pl-4">
                    {{__('index.all_category')}}
                </div>
                <div class="pl-4 w-[376px] hidden lg:block">
                    <input type="text" placeholder="search" class="w-full rounded-sm px-4 py-2">
                </div>
            </div>
            <div>
                account
            </div>
        </div>
    </x-container>
</div>
