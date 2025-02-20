<div class="grid divide-y text-sm md:text-base divide-neutral-200 max-w-xl mx-auto">
    <div class="py-3">
        <details class="group" open>
            <summary class="flex justify-between items-center font-medium cursor-pointer list-none mb-2 px-2">
                <span>My Calendars</span>
                <span class="transition group-open:rotate-180">
                    <i class="fa-solid fa-chevron-down fa-sm"></i>
                </span>
            </summary>
            @forelse ($myCalendars as $calendar)
                <div class="flex items-center justify-between px-2 py-1 rounded-full hover:bg-gray-200 group/item">
                    <div class="flex items-center">
                        <input checked id="red-checkbox" type="checkbox" value=""
                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded-sm focus:ring-0"
                            style="color: {{ $calendar->color }}">
                        <label for="red-checkbox"
                            class="ms-2 text-sm font-medium text-gray-900 ">{{ $calendar->name }}</label>
                    </div>
                    <div
                        class="w-4 hidden group-hover/item:flex justify-center items-center rounded-full text-gray-600 hover:text-gray-800">
                        <i class="fa-solid fa-ellipsis-vertical fa-sm"></i>
                    </div>
                </div>
            @empty
                <div class="px-2 py-1 text-gray-500">No calendars found.</div>
            @endforelse
        </details>
    </div>
</div>
