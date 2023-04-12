<div @class([
        "my-40",
        "mt-20 mb-40" => !\Route::is('pages.home')
])>
    {{$slot}}
</div>
