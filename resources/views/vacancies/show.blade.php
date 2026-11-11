<x-layout>
    <x-breadcrumb class="mb-4"
        :links="[
            'Vacancies' => route('vacancies.index'),
            $vacancy->title => '#',
        ]"
    />

    <x-vacancy-card :$vacancy />
</x-layout>
