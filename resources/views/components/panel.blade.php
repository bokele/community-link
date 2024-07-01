@php
    $classes =
        'p-4 shadow-lg rounded-xl border border-gray-300 hover:border-blue-800 dark:hover:border-gray-300 group transition-colors duration-300 dark:bg-gray-800 dark:border-transparent';
@endphp

<div {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</div>
