<div @class([
        "my-40",
        "!mt-20 mb-40" => \Route::is('categories.show') || \Route::is('search.show')
])>
    {{$slot}}
</div>
