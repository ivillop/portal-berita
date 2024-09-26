@props(['active' => false])
<a {{ $attributes }}
    class="{{ $active ? 'border-sky-500 text-sky-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 pb-4 text-sm font-medium shrink-0 border-b-2"
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
