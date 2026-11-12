<x-layout>
    <x-breadcrumb class="mb-4"
        :links="[
            'Vacancies' => route('vacancies.index'),
        ]"
    />

    <x-card class="mb-4 text-sm">
        <form action="{{ route('vacancies.index') }}" method="GET" class="grid grid-col gap-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>

                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search keyword text" />
                </div>

                <fieldset>
                    <legend class="mb-1 font-semibold">Salary Range</legend>

                    <div class="flex flex-row gap-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" />
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="mb-1 font-semibold">Experience Level</legend>

                    <div class="flex flex-col gap-2">
                        <label class="flex flex-row items-center">
                            <input type="radio" name="experience" value=""
                                @checked(! request('experience'))
                            />
                            <span class="ml-1">All</span>
                        </label>

                        <label class="flex flex-row items-center">
                            <input type="radio" name="experience" value="entry"
                                @checked(request('experience') === 'entry')
                            />
                            <span class="ml-1">Entry</span>
                        </label>

                        <label class="flex flex-row items-center">
                            <input type="radio" name="experience" value="intermediate"
                                @checked(request('experience') === 'intermediate')
                            />
                            <span class="ml-1">Intermediate</span>
                        </label>

                        <label class="flex flex-row items-center">
                            <input type="radio" name="experience" value="senior"
                                @checked(request('experience') === 'senior')
                            />
                            <span class="ml-1">Senior</span>
                        </label>
                    </div>
                </fieldset>

                <div>4</div>
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
