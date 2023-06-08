<div data-popover id="popover-del" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
    <div class="p-3 space-y-2">
        <h3 class="font-semibold text-gray-900 dark:text-white">Unenroll Student <span class="name">{{ $par->user->name }}</span></h3>
        <p></p>
        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700">
            <div class="bg-red-600 h-2.5 rounded-full" style="width: 100%"></div>
        </div>
        <button type="button" class="btn btn-secondary unenroll" data-modal-target="unenroll-modal" data-modal-toggle="unenroll-modal" data-id="{{ $par->user->id }}"
            data-kelas="{{ $par->class_id }}">Unenroll <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button>
    </div>
    <div data-popper-arrow></div>
</div>