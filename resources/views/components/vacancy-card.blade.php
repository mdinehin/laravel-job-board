<x-card>
    <div class="flex justify-between">
        <h2 class="text-lg font-medium">{{ $vacancy->title }}</h2>

        <div class="text-slay-500">£{{ number_format($vacancy->salary) }}</div>
    </div>

    <div class="flex justify-between text-sm text-slate-500 items-center">
        <div class="flex space-x-4">
            <div>Company name</div>
            <div>{{ $vacancy->location }}</div>
        </div>

        <div class="flex space-x-1 text-xs">
            <a href="{{ route('vacancies.index', [
                'experience' => $vacancy->experience,
            ]) }}"><x-tag>{{ \App\Models\Vacancy::normalizeLabel($vacancy->experience) }}</x-tag></a>

            <a href="{{ route('vacancies.index', [
                'category' => $vacancy->category,
            ]) }}"><x-tag>{{ \App\Models\Vacancy::normalizeLabel($vacancy->category) }}</x-tag></a>
        </div>
    </div>

    {{ $slot }}
</x-card>
