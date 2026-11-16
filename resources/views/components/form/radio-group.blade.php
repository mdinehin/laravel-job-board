<div class="flex flex-col gap-2">
    <label class="flex flex-row items-center">
        <input type="radio" name="{{ $name }}" value=""
            @checked(! request($name))
        />
        <span class="ml-2">All</span>
    </label>

    @foreach($optionsWithLabels as $option => $label)
        <label class="flex flex-row items-center">
            <input type="radio" name="{{ $name }}" value="{{ $option }}"
                @checked(request($name) === $option)
            />
            <span class="ml-2">{{ $label }}</span>
        </label>
    @endforeach
</div>
