<select name="{{ $name }}" id="{{ $name }}"
    class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 focus:ring-2"
>
    <option value="">Select a {{ $name }}</option>

    @foreach($options as $option)
        <option value="{{ $option }}"
            @selected(request('option') === $option)
        >{{
            strlen($option) <= \App\Models\Vacancy::$maxAcronymLength
                ? strtoupper($option)
                : Str::ucfirst($option)
        }}</option>
    @endforeach
</select>
