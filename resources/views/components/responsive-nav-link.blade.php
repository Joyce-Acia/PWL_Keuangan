@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#FE914D] text-start text-base font-medium text-[#FE914D] bg-[#FFF2CC] focus:outline-none focus:text-[#FE914D] focus:bg-[#FFFAED] focus:border-[#FE914D] transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-[#3a2a18] hover:text-[#FE914D] hover:bg-[#FFF2CC] hover:border-[#FEAF52] focus:outline-none focus:text-[#FE914D] focus:bg-[#FFFAED] focus:border-[#FE914D] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
