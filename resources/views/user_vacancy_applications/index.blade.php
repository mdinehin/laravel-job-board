<x-layout>
    <x-breadcrumb
        :links="[
            'My Applications' => '#'
        ]"
    />

    @forelse ($applications as $application)
        <x-vacancy-card :vacancy="$application->vacancy">

        </x-vacancy-card>
    @empty
        
    @endforelse
</x-layout>
