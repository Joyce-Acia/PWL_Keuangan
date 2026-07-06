@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#FD593D] text-start text-base font-medium text-[#FEAF52] bg-[#FFFAED] focus:outline-none focus:text-gray-800 focus:bg-[#FFFAED] focus:border-[#FF941D] transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#FD593D] text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-[#FFF2CC] hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-[#FFFAED] focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
