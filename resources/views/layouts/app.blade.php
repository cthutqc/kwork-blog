<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! Meta::toHtml() !!}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
</head>
<body class="relative leading-none overflow-x-hidden flex min-h-screen flex-col justify-between bg-slate-100">
<div id="preloader">
    <x-loading />
</div>
@if(\Route::is('pages.home') || \Route::is('categories.show') || \Route::is('search.show'))
    <div class="bg-no-repeat bg-cover bg-center fixed inset-0 -z-10" style="background-image: url({{asset('images/list-p-bg.jpeg')}})"></div>
@endif
    <x-header />
    <main>
        {{$slot}}
    </main>
    <x-footer />
</body>
@push('js')
    <script>
        window.addEventListener('load', function(){
            // Wait for 3 seconds before hiding the preloader
            setTimeout(function(){
                const preloader = document.getElementById('preloader');
                preloader.classList.add('hide');
            }, 500);
        });
    </script>
@endpush
@stack('js')
<livewire:scripts />
<script>
    document.addEventListener('livewire:load', () => {
        Livewire.onPageExpired((response, message) => {})
    })
</script>
</html>
