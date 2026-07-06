@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-2 border-b-2 border-[#ffdf98] text-sm font-bold leading-5 text-[#FFF2CC] transition duration-150 ease-in-out'
            : 'inline-flex items-center px-3 py-2 border-b-2 border-transparent text-sm font-semibold leading-5 text-[#3a2a18] hover:text-[#FFF2CC] hover:border-[#FE914D] focus:text-[#ffdf98] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>