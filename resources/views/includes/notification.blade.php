<div id="error-notification" class="hidden mb-3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <span class="block sm:inline">@lang('template.something_went_wrong')</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red-500 cursor-pointer" viewBox="0 0 20 20" onclick="window.toggleNotification('error')">
        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
    </svg>
  </span>
</div>

<div id="success-notification" class="hidden mb-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
    <span id="success-notification-message" class="block sm:inline"></span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-green-500 cursor-pointer" viewBox="0 0 20 20" onclick="window.toggleNotification('success')">
        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
    </svg>
  </span>
</div>
