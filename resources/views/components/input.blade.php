@props(['title', 'name', 'placeholder'])

@php
    $text = $name === 'password' ? 'password' : 'text';
@endphp

<div>
    <p>
        {{ $title }}
    </p>

    <input type="{{ $text }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
        class="p-2 border border-black rounded-lg w-full">
</div>
