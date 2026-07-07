@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-800 font-semibold hover:text-[#fff2cc] hover:border-[#fd593d] focus:outline-none focus:text-[#fd593d] focus:border-yellow-200 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-800 font-semibold hover:text-[#fff2cc] hover:border-[#fd593d] focus:outline-none focus:text-[#fd593d] focus:border-yellow-200 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
