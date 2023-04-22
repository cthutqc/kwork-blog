<x-app-layout>
    <div class="hidden md:block w-full h-[400px] relative bg-repeat" style="background-size:8%; background-image: url({{asset('images/face.jpg')}})">
        <span class="absolute inset-0 bg-blue-600 bg-opacity-50"></span>
    </div>
    <div class="block md:absolute md:h-[420px] top-0 inset-x-0 m-auto max-w-[720px] bg-slate-300 md:grid md:grid-cols-3 rounded-sm shadow overflow-hidden">
        <div class="bg-white pt-14">
            <div class="p-10 text-center relative space-y-4">
                <livewire:avatar-upload />
                <p class="text-lg">{{$user->name}}</p>
                <p class="text-sm">На сайте с {{$user->formatted_created_at}}</p>
                <a href="{{route('users.add.article')}}" class="block text-lg rounded-md w-full bg-[#51c0ff] focus:bg-[#007bff] focus:outline-none focus:ring focus:ring-[#51c0ff] text-white py-2 text-center">
                    Добавить запись
                </a>
                <a href="{{route('users.chat')}}" class="relative block text-lg rounded-md w-full bg-[#51c0ff] focus:bg-[#007bff] focus:outline-none focus:ring focus:ring-[#51c0ff] text-white py-2 text-center">
                    <span>Сообщения</span>
                    @if($user->unreadMessages())
                    <span class="rounded-full bg-red-600 text-white absolute -top-1 -right-1 h-6 w-6">
                        <span class="absolute inset-x-0 text-[12px] m-auto top-1/2 -translate-y-1/2">{{$user->unreadMessages()}}</span>
                    </span>
                    @endif
                </a>
            </div>
        </div>
        <div class="h-[420px] md:h-auto md:col-span-2 bg-cover bg-center bg-no-repeat" style="background-image: url({{asset('images/promo.jpg')}})"></div>
    </div>
    <x-container>
        <x-row>
            <x-title>Мои записи</x-title>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @each('profile.item', $user->articles, 'article')
            </div>
        </x-row>
    </x-container>
</x-app-layout>
