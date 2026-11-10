<x-layout>
    <ul class="flex flex-col gap-4">
        @foreach($vacancies as $vacancy)
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
                        <x-tag>{{ Str::ucfirst($vacancy->experience) }}</x-tag>
                        <x-tag>{{ $vacancy->category }}</x-tag>
                    </div>
                </div>

                <p class="text-sm text-slate-500">{!! nl2br(e($vacancy->description)) !!}</p>
            </x-card>
        @endforeach
    </ul>
</x-layout>
