<x-layout>
    <x-breadcrumb
        :links="[
            'My Vacancies' => route('my-vacancies.index'),
            'Create' => '#'
        ]"
    />

    <x-card>
        <h2 class="text-lg font-medium">Your Vacancy Application</h2>

        <form action="{{ route('my-vacancies.store') }}" method="POST" class="grid grid-cols-2 gap-4">
            @csrf

            <div>
                <x-form.label :required="true">Vacancy Title</x-form.label>

                <x-form.text-input name="title" />
            </div>

            <div>
                <x-form.label :required="true">Location</x-form.label>

                <x-form.text-input name="location" />
            </div>


            <div class="col-span-2">
                <x-form.label :required="true">Salary</x-form.label>

                <x-form.text-input type="number" name="salary" />
            </div>

            <div class="col-span-2">
                <x-form.label :required="true">Description</x-form.label>

                <x-form.text-input type="textarea" name="description" />
            </div>

            <div>
                <x-form.label :required="true">Experience</x-form.label>

                <x-form.radio-group name="experience"
                    :all-option="false"
                    :value="old('experience')"
                    :options="\App\Models\Vacancy::$experience"
                />
            </div>

            <div>
                <x-form.label :required="true">Category</x-form.label>

                <x-form.select name="category"
                    :value="old('category')"
                    :options="\App\Models\Vacancy::$category"
                />
            </div>

            <div class="col-span-2">
                <x-form.button class="w-full">Create</x-form.button>
            </div>
        </form>
    </x-card>
</x-layout>