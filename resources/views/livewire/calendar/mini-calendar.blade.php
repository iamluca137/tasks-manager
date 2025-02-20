<div class="dark:bg-gray-800 my-2 hidden md:block">
    <div class="ps-2 flex items-center justify-between">
        <span tabindex="0"
            class="focus:outline-none text-base font-bold dark:text-gray-100 text-gray-800">{{ $nameOfMonth }}</span>
        <div class="flex items-center gap-2 justify-between">
            <button aria-label="calendar backward" wire:click.debounce.0ms="previousMonth"
                class="focus:text-gray-400 flex justify-center items-center hover:text-gray-300 text-gray-800 dark:text-gray-100 w-6">
                <i class="fa-solid fa-chevron-left fa-xs text-gray-500 hover:text-gray-300"></i>
            </button>
            <button aria-label="calendar forward" wire:click.debounce.0ms="nextMonth"
                class="focus:text-gray-400 flex justify-center items-center hover:text-gray-300 text-gray-800 dark:text-gray-100 w-6">
                <i class="fa-solid fa-chevron-right fa-xs text-gray-500 hover:text-gray-300"></i>
            </button>
        </div>
    </div>
    <div class="flex items-center justify-between pt-6 overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr>
                    @foreach ($weekDays as $day)
                        <th class="text-xs font-medium text-center text-gray-800 dark:text-gray-100">{{ $day }}
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
                                        <div class="w-full h-full">
                                            <div
                                                class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                                <a role="link" tabindex="0"
                                                    class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-600 focus:bg-teal-500 hover:bg-teal-500 text-xs w-6 h-6 flex items-center justify-center font-medium text-white bg-teal-600 rounded-full">{{ $dayCounter }}</a>
                                            </div>
                                        </div>
                                    @elseif ($sD === $dayCounter && $sM === $changeMonth && $sY === $changeYear)
                                        <div class="w-full h-full">
                                            <div
                                                class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                                <a role="link" tabindex="0"
                                                    class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-400 focus:bg-teal-500 hover:bg-teal-500 text-xs w-6 h-6 flex items-center justify-center font-medium text-white bg-gray-400 rounded-full">{{ $dayCounter }}</a>
                                            </div>
                                        </div>
                                    @else
                                        <div
                                            class="p-1 cursor-pointer flex w-full justify-center hover:bg-gray-200 hover:rounded-full hover:text-teal-600 text-gray-500">
                                            <p wire:click.debounce.0ms="selectDate({{ $dayCounter }})"
                                                class="text-xs dark:text-gray-100 font-medium">
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
