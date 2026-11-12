<div class="flex flex-col gap-2">
    <label class="flex flex-row items-center">
        <input type="radio" name="{{ $name }}" value=""
            @checked(! request($name))
        />
        <span class="ml-1">All</span>
    </label>

    @foreach($options as $option)
        <label class="flex flex-row items-center">
            <input type="radio" name="{{ $name }}" value="{{ $option }}"
                @checked(request($name) === $option)
            />
            <span class="ml-1">{{ Str::ucfirst($option) }}</span>
        </label>
    @endforeach
</div>
