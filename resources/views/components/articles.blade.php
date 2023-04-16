@props([
    'category' => $category ?? null
])
<x-row>
    @if($category)
        <div class="mt-22 mb-8">
            <x-h1>{{$category->h1 ?? $category->name}}</x-h1>
            {{ Breadcrumbs::render('category', $category) }}
        </div>
    @endif
    <div class="rounded-md grid md:grid-cols-4 overflow-hidden">
        <x-sidebar />
        <div class="space-y-4 bg-slate-100 py-4 px-8 w-full block md:col-span-3">
            {{$slot}}
        </div>
    </div>
</x-row>
