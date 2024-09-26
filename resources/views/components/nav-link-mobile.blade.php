@props(['active' => false])
<a {{ $attributes }} class="{{ $active ? 'text-blue-500' : 'text-current' }} text-xs flex flex-col items-center"
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
