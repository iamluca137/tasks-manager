<div class=" my-2 hidden md:block">
    <div class="ps-2 flex items-center justify-between">
        <span tabindex="0"
            class="focus:outline-none text-base font-bold  text-gray-800">{{ $nameOfMonth }}</span>
        <div class="flex items-center gap-2 justify-between">
            <button aria-label="calendar backward" wire:click.debounce.0ms="previousMonth"
                class="focus:text-gray-400 flex justify-center items-center hover:text-gray-300 text-gray-800  w-6">
                <i class="fa-solid fa-chevron-left fa-xs text-gray-500 hover:text-gray-300"></i>
            </button>
            <button aria-label="calendar forward" wire:click.debounce.0ms="nextMonth"
                class="focus:text-gray-400 flex justify-center items-center hover:text-gray-300 text-gray-800  w-6">
                <i class="fa-solid fa-chevron-right fa-xs text-gray-500 hover:text-gray-300"></i>
            </button>
        </div>
    </div>
    <div class="flex items-center justify-between pt-6 overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr>
                    @foreach ($weekDays as $day)
                        <th class="text-xs font-medium text-center text-gray-800 ">{{ $day }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @php $dayCounter = 1; @endphp
                @for ($row = 0; $row < 6; $row++)
                    <tr>
                        @for ($col = 0; $col < 7; $col++)
                            <td class="py-1.5">
                                @if (($row === 0 && $col < $firstDayOfMonth) || $dayCounter > $daysInMonth)
                                    <div class="p-1 cursor-pointer flex w-full justify-center"></div>
                                @else
                                    @if ($currentDay === $dayCounter && $currentMonth === $changeMonth && $currentYear === $changeYear)
                                        <div class="w-full h-full"
                                            wire:click.debounce.0ms="selectDate({{ $dayCounter }})">
                                            <div
                                                class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                                <a role="link" tabindex="0"
                                                    class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-600 focus:bg-teal-500 hover:bg-teal-500 text-xs w-6 h-6 flex items-center justify-center font-medium text-white bg-teal-600 rounded-full">{{ $dayCounter }}</a>
                                            </div>
                                        </div>
                                    @elseif ($selectedDay === $dayCounter && $selectedMonth === $changeMonth && $selectedYear === $changeYear)
                                        <div class="w-full h-full"
                                            wire:click.debounce.0ms="selectDate({{ $dayCounter }})">
                                            <div
                                                class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                                <a role="link" tabindex="0"
                                                    class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-400 focus:bg-teal-500 hover:bg-teal-500 text-xs w-6 h-6 flex items-center justify-center font-medium text-white bg-gray-400 rounded-full">{{ $dayCounter }}</a>
                                            </div>
                                        </div>
                                    @else
                                        <div wire:click.debounce.0ms="selectDate({{ $dayCounter }})"
                                            class="p-1 cursor-pointer flex w-full justify-center hover:bg-gray-200 hover:rounded-full hover:text-teal-600 text-gray-500">
                                            <p class="text-xs  font-medium">
                                                {{ $dayCounter }}</p>
                                        </div>
                                    @endif
                                    @php $dayCounter++; @endphp
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
@script
    <script>
        $wire.on('update-url', (event) => {
            const newUrl = event[0].url;
            window.history.pushState({}, '', newUrl);
        });
    </script>
@endscript
{{-- <div class="relative bg-white px-3 py-2">
                        <time datetime="2022-01-22">22</time>
                        <ol class="mt-2">
                            <li>
                                <a href="#" class="group flex">
                                    <p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">
                                        Maple syrup museum</p>
                                    <time datetime="2022-01-22T15:00"
                                        class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">3PM</time>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="group flex">
                                    <p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">
                                        Hockey game</p>
                                    <time datetime="2022-01-22T19:00"
                                        class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">7PM</time>
                                </a>
                            </li>
                        </ol>
                    </div> --}}

{{-- <button type="button"
                        class="flex h-14 flex-col bg-white px-3 py-2 font-semibold text-white hover:bg-gray-100 focus:z-10">
                        <time datetime="2022-01-22"
                            class="ml-auto flex h-6 w-6 items-center justify-center rounded-full bg-gray-900">22</time>
                        <span class="sr-only">2 events</span>
                        <span class="-mx-0.5 mt-auto flex flex-wrap-reverse">
                            <span class="mx-0.5 mb-1 h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                            <span class="mx-0.5 mb-1 h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                        </span>
                    </button>
                    <button type="button"
                        class="flex h-14 flex-col bg-gray-50 px-3 py-2 text-gray-500 hover:bg-gray-100 focus:z-10">
                        <time datetime="2022-02-04" class="ml-auto">4</time>
                        <span class="sr-only">1 event</span>
                        <span class="-mx-0.5 mt-auto flex flex-wrap-reverse">
                            <span class="mx-0.5 mb-1 h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                        </span>
                    </button>  --}}
