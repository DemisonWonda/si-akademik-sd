@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-blue-700 text-white font-bold'
            : 'text-blue-100 hover:bg-blue-700 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes . ' flex items-center px-4 py-3 rounded-xl transition duration-150 ease-in-out decoration-0']) }}>
    {{ $slot }}
</a>