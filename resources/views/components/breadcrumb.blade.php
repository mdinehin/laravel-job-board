<nav {{ $attributes }}>
    <ul class="flex flex-row gap-2 items-center">
        <li class="flex flex-row gap-2 items-center">
            <x-link-nav :href="route('vacancies.index')">Home</x-link-nav>
            <span>></span>
        </li>

        @foreach($links as $label => $link)
            <li class="flex flex-row gap-2 items-center">
                @if(! $loop->last)
                    <x-link-nav :href="$link">{{ $label }}</x-link-nav>
                    <span>></span>
                @else
                    <div>{{ $label }}</div>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
