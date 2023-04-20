<x-app-layout>
    <div class="hidden md:block w-full h-[200px] pt-16 relative bg-repeat" style="background-image: url({{asset('images/all-list-bg.jpg')}})">
        <span class="absolute inset-0 bg-blue-600 bg-opacity-50"></span>
        <div class="absolute text-center inset-x-0 m-auto w-max top-1/2">
            <x-container class="space-y-2">
                <x-h1>{{$page->h1 ?? $page->name}}</x-h1>
                {{ Breadcrumbs::render('page', $page) }}
            </x-container>
        </div>
    </div>
    <x-container>
        <x-row>
            <div class="description">
                {!! $page->text !!}
            </div>
        </x-row>
    </x-container>
</x-app-layout>
