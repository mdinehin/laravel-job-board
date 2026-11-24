<div class="mb-1 font-semibold flex flex-row gap-1">
    <span>{{ $slot }}</span>
    @if($required)
        <span>*</span>
    @endif
</div>