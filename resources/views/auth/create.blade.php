<x-layout>
    <h1 class="my-16 text-center text-4xl font-medoum text-slate-600">Sign in to your account</h1>

    <x-card class="py-15">
        <form action="{{ route('auth.store') }}" method="POST" class="flex flex-col gap-4 w-4/5 mx-auto">
            @csrf

            <div class="flex flex-col gap-4">
                <div>
                    <x-form.label :required="true">Email</x-form.label>

                    <x-form.text-input name="email" value="" placeholder="Email" />
                </div>

                <div>
                    <x-form.label :required="true">Password</x-form.label>

                    <x-form.text-input name="password" type="password" value="" placeholder="Password" />
                </div>
            </div>

            <div class="flex flex-row gap-4 justify-between text-sm font-medium">
                <div>
                    <label class="flex flex-row items-center">
                        <input type="checkbox" name="remember" value="1"
                            class="rounded-sm border border-slate-400"
                        />
                        <span class="ml-2">Remember me</span>
                    </label>
                </div>

                <div>
                    <a href="#" class="text-indigo-600 hover:underline">Forgot password?</a>
                </div>
            </div>

            <x-form.button class="w-full bg-green-50">Login</x-form.button>
        </form>
    </x-card>
</x-layout>