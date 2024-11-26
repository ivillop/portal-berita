@props(['active' => false])
<a {{ $attributes }}
    class="{{ $active ? 'bg-blue-700 text-white' : 'border-transparent hover:bg-gray-200' }} font-medium rounded-md block py-2 px-4"
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
