<x-layout>
    <x-breadcrumb
        :links="[
            'My Applications' => '#'
        ]"
    />

    @forelse ($applications as $application)
        <x-vacancy-card :vacancy="$application->vacancy">
            <div class="flex items-end justify-between text-xs text-slate-500">
                <div>
                    <div>You have applied {{
                        $application->created_at->diffForHumans()
                    }}</div>

                    <div>Other {{
                        Str::plural('applicant', $application->vacancy->applications_count - 1)
                    }} {{
                        $application->vacancy->applications_count - 1
                    }}</div>

                    <div>Your asking salary is £{{
                        number_format($application->expected_salary)
                    }}</div>

                    <div>Average asking salary is £{{
                        number_format($application->vacancy->applications_avg_expected_salary)
                    }}</div>
                </div>

                <div>
                    <form action="{{ route('my-applications.destroy', $application) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <x-form.button>Withdraw</x-form.button>
                    </form>
                </div>
            </div>
        </x-vacancy-card>
    @empty
        <x-card>
            <div>No vacancy applications available.</div>

            <div>Find vacancies <x-link-nav class="text-indigo-600"
                :href="route('vacancies.index')"
            >here</x-link-nav>.</div>
        </x-card>
    @endforelse
</x-layout>
