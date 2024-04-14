<div class="flex items-end justify-end">
    <button data-dropdown-toggle="{{ $id }}" class="action" type="button">
        <x-icons.more class="w-4 h-4" />
    </button>
    <div id="{{ $id }}"
        class="hidden z-50 min-w-[8rem] overflow-hidden rounded-md border bg-popover p-1 text-popover-foreground shadow-md">
        {{ $slot }}
    </div>
</div>
