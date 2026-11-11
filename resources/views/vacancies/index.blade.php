<x-layout>
    <ul class="flex flex-col gap-4">
        @foreach($vacancies as $vacancy)
            <li>
                <x-vacancy-card :$vacancy>
                    <div>
                        <x-link-button :href="route('vacancies.show', $vacancy)">
                            Show vacancy
                        </x-link-button>
                    </div>
                </x-vacancy-card>
            </li>
        @endforeach
    </ul>
</x-layout>
