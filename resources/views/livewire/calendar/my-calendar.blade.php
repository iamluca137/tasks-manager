<div class="grid divide-y text-sm md:text-base divide-neutral-200 max-w-xl mx-auto" id="my-calendar">
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
                        <input checked id="{{ $calendar->code }}" type="checkbox" value=""
                               class="w-4 h-4 bg-gray-100 border-gray-300 rounded-sm focus:ring-0"
                               style="color: {{ $calendar->color }}">
                        <label for="{{ $calendar->code }}"
                               class="ms-2 text-sm font-medium text-gray-900 ">{{ $calendar->name }}</label>
                    </div>
                    <div id="my-calendar-{{ $calendar->code }}-button"
                         data-dropdown-toggle="my-calendar-{{$calendar->code}}-dropdown"
                         data-dropdown-placement="right"
                         class="w-4 hidden group-hover/item:flex justify-center items-center rounded-full text-gray-600 hover:text-gray-800">
                        <i class="fa-solid fa-ellipsis-vertical fa-sm"></i>
                    </div>
                    <!-- Dropdown menu -->
                    <div id="my-calendar-{{$calendar->code}}-dropdown"
                         class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44  ">
                        <ul class="py-2 text-xs text-gray-700 "
                            aria-labelledby="my-calendar-{{ $calendar->code }}-button">
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 hover:bg-gray-100 :bg-gray-600 :text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 hover:bg-gray-100 :bg-gray-600 :text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 hover:bg-gray-100 :bg-gray-600 :text-white">Earnings</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @empty
                <div class="px-2 py-1 text-gray-500">No calendars found.</div>
            @endforelse
        </details>
    </div>
</div>
