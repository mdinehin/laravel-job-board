<x-layout>
    <x-breadcrumb
        :links="[
            'Create Employer' => '#'
        ]"
    />

    <x-card>
        <h2 class="text-lg font-medium">Create Employer</h2>

        <form action="{{ route('employers.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf

            <div>
                <x-form.label :required="true">Company Name</x-form.label>

                <x-form.text-input name="company_name" />
            </div>

            <x-form.button class="w-full">Create</x-form.button>
        </form>
    </x-card>
</x-layout>