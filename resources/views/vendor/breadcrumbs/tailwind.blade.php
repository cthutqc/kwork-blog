@unless ($breadcrumbs->isEmpty())
    <nav class="mx-auto">
        <ol class="rounded flex flex-wrap text-sm text-white">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li>
                        <a href="{{ $breadcrumb->url }}">
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li>
                        {{ $breadcrumb->title }}
                    </li>
                @endif

                @unless($loop->last)
                    <li class="px-2">
                        >
                    </li>
                @endif

            @endforeach
        </ol>
    </nav>
@endunless
