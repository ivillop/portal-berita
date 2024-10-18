@props(['item'])

<td class="px-6 py-2">
    @if (filter_var($item->image, FILTER_VALIDATE_URL))
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none"
                onclick="onShow('image-modal', '{{ $item->image }}')">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                  </svg>

        </button>
    @else
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none"
                onclick="onShow('image-modal', '{{ asset('storage/' . $item->image) }}')">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                  </svg>

        </button>
    @endif
</td>

<div id="image-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-75 transition-opacity duration-300 ease-in-out opacity-0 pointer-events-none">
    <div class="relative max-w-2xl transform transition-transform duration-300 ease-in-out scale-90">
        <button type="button"
            class="absolute top-2 right-2 text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-2.5 dark:hover:bg-gray-600 dark:hover:text-white"
            onclick="onHide('image-modal')">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
        </button>

        <img id="modal-image" src="" alt="Modal Image" class="w-full h-auto rounded-lg">
    </div>
</div>
