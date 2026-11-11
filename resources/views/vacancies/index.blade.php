<x-layout>
    <x-breadcrumb class="mb-4"
        :links="[
            'Vacancies' => route('vacancies.index'),
        ]"
    />

    <x-card class="mb-4 text-sm">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <div class="mb-1 font-semibold">Search</div>
                <x-text-input name="search" value="" placeholder="Search for text" />
            </div>
            <div>
                <div class="mb-1 font-semibold">Salary</div>
                <div class="flex flex-row gap-2">
                    <x-text-input name="min_salary" value="" placeholder="From" />
                    <x-text-input name="max_salary" value="" placeholder="To" />
                </div>
            </div>
            <div>3</div>
            <div>4</div>
        </div>
    </x-card>

    <ul class="flex flex-col gap-4">
        @foreach($vacancies as $vacancy)
            <li>
                <x-vacancy-card :$vacancy>
                    <div>
                        <x-link-button :href="route('vacancies.show', $vacancy)">
                            View vacancy
                        </x-link-button>
                    </div>
                </x-vacancy-card>
            </li>
        @endforeach
    </ul>
</x-layout>
