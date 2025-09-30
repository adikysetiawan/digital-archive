<div class="fi-topbar-tools flex items-center gap-3">
    <div class="fi-topbar-search hidden sm:block">
        <x-filament::input.placeholder icon="heroicon-m-magnifying-glass" :placeholder="__('Search')" />
    </div>

    <div class="fi-topbar-notifications relative">
        <button type="button" class="fi-icon-btn rounded-full p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
            <x-filament::icon icon="heroicon-o-bell" class="h-5 w-5" />
        </button>
        @php $count = optional(auth()->user())->unreadNotifications()->count() ?? 0; @endphp
        @if($count > 0)
            <span class="absolute -top-1 -right-1 inline-flex items-center justify-center rounded-full bg-primary-600 text-white text-xs h-5 min-w-5 px-1">
                {{ $count }}
            </span>
        @endif
    </div>
</div>
