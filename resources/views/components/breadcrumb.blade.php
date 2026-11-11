<nav {{ $attributes }}>
    <ul class="flex flex-row gap-2 items-center">
        <li class="flex flex-row gap-2 items-center">
            <a href="/" class="hover:underline hover:underline-offset-4">Home</a>
            <span>></span>
        </li>

        @foreach($links as $label => $link)
            <li class="flex flex-row gap-2 items-center">
                @if(! $loop->last)
                    <a href="{{ $link }}" class="hover:underline hover:underline-offset-4">{{ $label }}</a>
                    <span>></span>
                @else
                    <div>{{ $label }}</div>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
