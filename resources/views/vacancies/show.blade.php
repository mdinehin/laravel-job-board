<x-layout>
    <x-breadcrumb class="mb-4"
        :links="[
            'Vacancies' => route('vacancies.index'),
            $vacancy->title => '#',
        ]"
    />

    <x-vacancy-card :$vacancy>
        <p class="text-sm text-slate-500">{!! nl2br(e($vacancy->description)) !!}</p>
    </x-vacancy-card>
</x-layout>
