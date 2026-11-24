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

                <div>Right</div>
            </div>
        </x-vacancy-card>
    @empty
        
    @endforelse
</x-layout>
