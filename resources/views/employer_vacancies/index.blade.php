<x-layout>
    <x-breadcrumb
        :links="[
            'My Vacancies' => '#'
        ]"
    />

    <div>
        <x-link-button href="{{ route('my-vacancies.create') }}">Add New</x-link-button>
    </div>

    @forelse($vacancies as $vacancy)
        <x-vacancy-card :$vacancy>
            <p class="text-sm text-slate-500">{!! nl2br(e($vacancy->description)) !!}</p>

            <h3 class="font-medium">Applications</h3>

            @forelse($vacancy->applications as $application)
                <div class="flex items-center justify-between text-sm text-slate-500">
                    <div>
                        <p>{{ $application->user->name }}</p>

                        <p>Applied {{ $application->created_at->diffForHumans() }}</p>

                        <p>Download CV</p>
                    </div>

                    <p>Applicant salary expectations £{{ number_format($application->expected_salary) }}</p>
                </div>
            @empty
                <p>No applications available.</p>
            @endforelse

            <hr class="border-slate-300" />

            <div class="flex flex-row gap-2">
                <div>
                    <x-link-button href="{{ route('my-vacancies.edit', $vacancy) }}">Edit</x-link-button>
                </div>

                <div>
                    <form action="{{ route('my-vacancies.destroy', $vacancy) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <x-form.button>Delete</x-form.button>
                    </form>
                </div>
            </div>
        </x-vacancy-card>
    @empty
        <x-card>
            <div class="rounded-md border border-dashed border-slate-300 p-8">
                <p class="text-center font-medium">No vacancies available.</p>

                <p class="text-center">Post vacancies <x-link-nav class="text-indigo-600"
                    :href="route('my-vacancies.create')"
                >here</x-link-nav>.</p>
            </div>
        </x-card>
    @endforelse
</x-layout>