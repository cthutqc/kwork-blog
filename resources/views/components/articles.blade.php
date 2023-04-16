@props([
    'category' => $category ?? null,
    'search' => $search ?? null,
])
<x-row>
    @if($category || $search)
        <div class="mt-22 mb-8">
            <x-h1>{{$category->h1 ?? $category->name ?? 'Ви искали: ' . $search}}</x-h1>
            @if($category)
            {{ Breadcrumbs::render('category', $category) }}
            @endif
        </div>
    @endif
    <div class="rounded-md grid md:grid-cols-4 overflow-hidden">
        <x-sidebar />
        <div class="space-y-4 bg-slate-100 py-4 px-4 lg:px-8 w-full block md:col-span-3">
            {{$slot}}
        </div>
    </div>
</x-row>
