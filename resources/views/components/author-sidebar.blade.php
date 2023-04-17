<div class="sticky top-[52px] h-max">
    <div class="block rounded-t-md overflow-hidden bg-cover bg-center bg-no-repeat relative"
         style="background-image: url({{asset('images/all-list-bg.jpg')}})">
        <span class="absolute inset-0 bg-blue-600 bg-opacity-40"></span>
        <p class="bg-green-600 absolute top-0 inset-x-0 w-max text-[12px] py-1 px-4 rounded-b-md m-auto text-white">Автор</p>
        <div class="p-10 text-center text-white relative space-y-2">
            <img src="{{$user->getFirstMediaUrl() ? $user->getFirstMediaUrl() : asset('images/profile-placeholder.png')}}"
                 class="m-auto h-[100px] w-[100px] rounded-full" />
            <p class="text-lg">{{$user->name}}</p>
        </div>
    </div>
    <div class="border-x border-b border-slate-200 bg-white p-10 rounded-b-md relative">
        <a href="" class="rounded-3xl text-white bg-[#56caff] font-semibold py-2 px-4 absolute inset-x-0 m-auto w-max bottom-[86%]">Посмотреть профайл</a>
        <button class="text-center m-auto block">Написать автору</button>
    </div>
</div>
