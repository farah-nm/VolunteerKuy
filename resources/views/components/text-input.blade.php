@props(['disabled' => false])

<input
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' => '
            bg-white text-gray-800 border border-gray-300
            focus:border-blue-500 focus:ring-2 focus:ring-blue-200
            rounded-md shadow-sm w-full
        '
    ]) !!}
>
