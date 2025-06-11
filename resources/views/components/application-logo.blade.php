@props(['class' => 'h-10 w-auto'])

<img src="{{ asset('logo.png') }}" alt="Logo" {{ $attributes->merge(['class' => $class]) }}>
