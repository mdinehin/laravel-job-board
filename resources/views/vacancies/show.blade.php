<x-layout>
    <x-breadcrumb class="mb-4"
        :links="[
            'Vacancies' => route('vacancies.index'),
            $vacancy->title => '#',
        ]"
    />

    <x-vacancy-card :$vacancy class="mb-4">
        <p class="text-sm text-slate-500">{!! nl2br(e($vacancy->description)) !!}</p>
    </x-vacancy-card>

    <x-card>
        <h2 class="text-lg font-medium">More vacancies from {{ $vacancy->employer->company_name }}</h2>

        <ul class="flex flex-col gap-4 text-sm text-slate-500">
            @foreach($vacancy->employer->vacancies as $otherVacancy)
                <li class="flex justify-between">
                    <div>
                        <div class="text-slate-700">
                            <a href="{{ route('vacancies.show', $otherVacancy) }}">{{ $otherVacancy->title }}</a>
                        </div>

                        <div class="text-xs">{{ $otherVacancy->created_at->diffForHumans() }}</div>
                    </div>

                    <div class="text-xs">£{{ number_format($otherVacancy->salary) }}</div>
                </li>
            @endforeach
        </ul>
    </x-card>
</x-layout>
