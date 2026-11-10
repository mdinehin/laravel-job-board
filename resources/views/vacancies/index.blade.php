<x-layout>
    <ul class="flex flex-col gap-2 divide-y divide-gray-200">
        @foreach($vacancies as $vacancy)
            <li>{{ $vacancy->title }}</li>
        @endforeach
    </ul>
</x-layout>
