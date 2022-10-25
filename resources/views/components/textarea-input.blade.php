@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full border border-gray-300 p-2 mb-4']) !!}></textarea>
