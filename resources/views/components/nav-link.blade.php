@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white focus:outline-none transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white/[.8] hover:text-white focus:outline-none focus:text-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
