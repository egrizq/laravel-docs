@props(['title', 'name', 'placeholder'])

@php
    $text = $name === 'password' ? 'password' : 'text';
@endphp

<div class="flex flex-col gap-3">
    <p>
        {{ $title }}
    </p>

    <input type="{{ $text }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
        class="p-3 border border-black rounded-lg w-full" required>
</div>
