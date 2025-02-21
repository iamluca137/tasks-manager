<div class="flex md:ml-10 items-center justify-between gap-3">
    <div class="flex items-center gap-4">
        <div class="flex items-center gap-6">
            <button wire:click="gotoToday"
                class="flex py-2 pl-1.5 pr-3 rounded-md bg-gray-50 border border-gray-300 items-center gap-1.5 text-xs font-medium text-gray-900 transition-all duration-500 hover:bg-gray-100">
                <i class="fa-solid fa-calendar-days text-gray-500"></i>Today
            </button>
            <button wire:click.debounce.0ms="previousMonth"
                class="text-gray-500 rounded flex items-center transition-all duration-300 hover:bg-gray-100 hover:text-gray-900">
                <i class="fa-solid fa-chevron-left fa-xs text-gray-500 hover:text-gray-400"></i>
            </button>
            <button wire:click.debounce.0ms="nextMonth"
                class="text-gray-500 rounded flex items-center transition-all duration-300 hover:bg-gray-100 hover:text-gray-900">
                <i class="fa-solid fa-chevron-right fa-xs text-gray-500 hover:text-gray-400"></i>
            </button>
        </div>
        <h5 class="text-xl leading-8 font-semibold text-gray-900">{{ $nameOfMonth }}</h5>
    </div>
</div>
