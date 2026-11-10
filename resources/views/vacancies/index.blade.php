<x-layout>
    <ul class="flex flex-col gap-4">
        @foreach($vacancies as $vacancy)
            <x-card>
                {{ $vacancy->title }}
            </x-card>
        @endforeach
    </ul>
</x-layout>
