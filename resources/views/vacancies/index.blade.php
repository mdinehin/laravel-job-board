<x-layout>
    <x-breadcrumb class="mb-4"
        :links="[
            'Vacancies' => route('vacancies.index'),
        ]"
    />

    <x-card class="mb-4 text-sm">
        <form id="vacancy-filter-form" action="{{ route('vacancies.index') }}" method="GET" class="flex flex-col gap-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>

                    <x-form.text-input name="search" value="{{ request('search') }}" placeholder="Search keyword text"
                        form-id="vacancy-filter-form"
                    />
                </div>

                <div>
                    <div class="mb-1 font-semibold">Salary Range</div>

                    <div class="flex flex-row gap-2">
                        <x-form.text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From"
                            form-id="vacancy-filter-form"
                        />

                        <x-form.text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To"
                            form-id="vacancy-filter-form"
                        />
                    </div>
                </div>

                <div>
                    <div class="mb-1 font-semibold">Experience Level</div>

                    <x-form.radio-group name="experience"
                        :options="\App\Models\Vacancy::$experience"
                    />
                </div>

                <div>
                    <div class="mb-1 font-semibold">Category</div>

                    <x-form.select name="category"
                        :options="\App\Models\Vacancy::$category"
                    />
                </div>
            </div>

            <button class="w-full">Filter</button>
        </form>
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
