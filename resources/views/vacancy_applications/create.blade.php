<x-layout>
    <x-breadcrumb
        :links="[
            'Vacancies' => route('vacancies.index'),
            $vacancy->title => route('vacancies.show', $vacancy),
            'Apply' => '#'
        ]"
    />

    <x-vacancy-card :$vacancy />

    <x-card>
        <h2 class="text-lg font-medium">Your Vacancy Application</h2>

        <form action="{{ route('vacancies.application.store', $vacancy) }}" method="POST" class="flex flex-col gap-4">
            @csrf

            <div>
                <div class="mb-1 font-semibold">Expected Salary</div>

                <x-form.text-input type="number" name="expected_salary" value="{{ request('expected_salary') }}" />
            </div>

            <x-form.button class="w-full">Apply</x-form.button>
        </form>
    </x-card>
</x-layout>