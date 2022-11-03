@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-full shadow-sm bg-gray-100 py-1']) !!} style="padding: 0.4rem 0.85rem;">
