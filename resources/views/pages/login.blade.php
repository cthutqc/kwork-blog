<x-app-layout>
    <x-container>
        <x-row>
            <livewire:login-form />
        </x-row>
    </x-container>
    <div class="fixed inset-0 -z-[10]"style="background-image: url({{asset('images/face.jpg')}})">
        <span class="absolute inset-0 bg-black bg-opacity-50"></span>
    </div>
</x-app-layout>
