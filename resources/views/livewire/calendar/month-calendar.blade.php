<div class="rounded-lg border-gray-300 dark:border-gray-600 h-screen mb-4">
    <div class="lg:flex lg:h-full lg:flex-col">
        <div class="shadow ring-1 ring-black ring-opacity-5 lg:flex lg:flex-auto lg:flex-col">
            <div
                class="grid grid-cols-7 gap-px border-b border-gray-300 bg-gray-200 text-center text-xs font-semibold leading-6 text-gray-700 lg:flex-none">
                @foreach ($days as $day)
                    <div class="flex justify-center bg-white py-2">
                        <span>{{ $day['short'] }}</span>
                        <span class="sr-only sm:not-sr-only ml-1">{{ $day['full'] }}</span>
                    </div>
                @endforeach
            </div>
            <div class="bg-gray-200 text-xs leading-6 text-gray-700 flex-auto h-screen">
                <div class="w-full grid grid-cols-7 grid-rows-6 gap-px h-full">
                    @php $dayCounter = 1; @endphp
                    @php $nextMonthDayCounter = 1; @endphp
                    @for ($row = 0; $row < 6; $row++)
                        @for ($col = 0; $col < 7; $col++)
                            @if ($row === 0 && $col < $firstDayOfMonth)
                                {{-- Ngày từ tháng trước --}}
                                <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
                                    <time>{{ $daysFromPreviousMonth++ }}</time>
                                </div>
                            @elseif ($dayCounter > $daysInMonth)
                                {{-- Ngày từ tháng sau --}}
                                <div class="relative bg-gray-50 px-3 py-2 text-gray-500">
                                    <time>{{ $nextMonthDayCounter++ }}</time>
                                </div>
                            @else
                                @if ($currentDay === $dayCounter && $currentMonth === $changeMonth && $currentYear === $changeYear)
                                    <div class="relative bg-white px-3 py-2">
                                        <time datetime="2022-01-12"
                                            class="flex h-6 w-6 items-center justify-center rounded-full bg-indigo-600 font-semibold text-white">{{ $dayCounter }}</time>
                                        <ol class="mt-2">
                                            <li>
                                                <a href="#" class="group flex">
                                                    <p
                                                        class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">
                                                        Sam's birthday party</p>
                                                    <time datetime="2022-01-25T14:00"
                                                        class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">2PM</time>
                                                </a>
                                            </li>
                                        </ol>
                                    </div>
                                @else
                                    <div class="relative bg-white px-3 py-2">
                                        <time datetime="2022-01-01">{{ $dayCounter }}</time>
                                    </div>
                                @endif
                                @php $dayCounter++; @endphp
                            @endif
                        @endfor
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
