<div class="rounded-lg border-gray-300  h-full mb-4" id="calendar-container">
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
            <div class="bg-gray-200 text-xs leading-6 text-gray-700 flex-auto">
                <div class="w-full grid grid-cols-7 grid-rows-6 gap-px h-full">
                    @php
                        $dayCounter = 1;
                        $nextMonthDayCounter = 1;
                    @endphp
                    @for ($row = 0; $row < 6; $row++)
                        @for ($col = 0; $col < 7; $col++)
                            @if ($row === 0 && $col < $firstDayOfMonth)
                                {{-- Ngày từ tháng trước --}}
                                <div class="relative bg-white px-3 py-2 border-b border-gray-300 text-black">
                                    <p class="text-center day">{{ $daysFromPreviousMonth++ }}</p>
                                </div>
                            @elseif ($dayCounter > $daysInMonth)
                                {{-- Ngày từ tháng sau --}}
                                <div class="relative bg-white px-3 py-2 border-b border-gray-300 text-black">
                                    <p class="text-center day">{{ $nextMonthDayCounter++ }}</p>
                                </div>
                            @else
                                @if ($currentDay === $dayCounter && $currentMonth === $changeMonth && $currentYear === $changeYear)
                                    <div class="relative bg-white px-3 py-2 border-b border-gray-300">
                                        <div class="flex justify-center day">
                                            <p datetime="2022-01-12"
                                               class="flex h-6 w-6 items-center justify-center rounded-full bg-indigo-600 font-semibold text-white">{{ $dayCounter }}</p>
                                        </div>
                                        <ol class="mt-2">
                                            <li>
                                                <a href="#" class="group flex">
                                                    <p
                                                        class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">
                                                        Sam's birthday party</p>
                                                    <time datetime="2022-01-25T14:00"
                                                          class="ml-3 hidden flex-none text-gray-500 group-hover:text-indigo-600 xl:block">
                                                        2PM
                                                    </time>
                                                </a>
                                            </li>
                                        </ol>
                                    </div>
                                @else
                                    <div class="relative bg-white px-3 py-2 border-b border-gray-300 text-black">
                                        <p class="text-center day" datetime="2022-01-01">{{ $dayCounter }}</p>
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
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendar = document.getElementById('calendar-container');
            let isScrolling = false;
            const day = document.querySelectorAll('.day');

            calendar.addEventListener('wheel', function (event) {
                event.preventDefault();

                if (!isScrolling) {
                    isScrolling = true;

                    if (event.deltaY < 0) {
                        Livewire.dispatch('previousMonth');
                    } else {
                        Livewire.dispatch('nextMonth');
                    }

                    // Delay time
                    setTimeout(() => {
                        isScrolling = false;
                    }, 400);
                }
            }, {passive: false});
        });
    </script>
@endpush
