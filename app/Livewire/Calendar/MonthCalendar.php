<?php

namespace App\Livewire\Calendar;

use App\Livewire\Traits\HandlesCalendar;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Livewire\Component;

class MonthCalendar extends Component
{
    use HandlesCalendar;

    public $days = [
        ['short' => 'M', 'full' => 'on'],
        ['short' => 'T', 'full' => 'ue'],
        ['short' => 'W', 'full' => 'ed'],
        ['short' => 'T', 'full' => 'hu'],
        ['short' => 'F', 'full' => 'ri'],
        ['short' => 'S', 'full' => 'at'],
        ['short' => 'S', 'full' => 'un'],
    ];

    public $daysFromPreviousMonth, $daysFromNextMonth;

    public function mount(): void
    {
        $this->initializeCalendar();
        $this->calculateMonthData();
    }

    #[On('calendarUpdated')]
    public function updateDate($data): void
    {
        $this->changeMonth = $data['changeMonth'];
        $this->changeYear = $data['changeYear'];
        $this->nameOfMonth = $data['nameOfMonth'];

        $this->calculateMonthData();
    }

    public function calculateMonthData(): void
    {
        $date = Carbon::create($this->changeYear, $this->changeMonth, 1);
        $this->daysInMonth = $date->daysInMonth;
        $this->firstDayOfMonth = $date->dayOfWeek;
        $this->nameOfMonth = $date->format('F Y');

        $previousMonth = $date->copy()->subMonth();
        $daysInPreviousMonth = $previousMonth->daysInMonth;
        $this->daysFromPreviousMonth = $daysInPreviousMonth - $this->firstDayOfMonth + 1;

        $totalDisplayedDays = $this->firstDayOfMonth + $this->daysInMonth;
        $this->daysFromNextMonth = (7 * 6) - $totalDisplayedDays; // 6 tuần đủ 42 ô

        $this->dispatch('dateUpdated');
    }

    public function changeMonth($direction): void
    {
        $this->changeMonth += $direction;

        if ($this->changeMonth < 1) {
            $this->changeMonth = 12;
            $this->changeYear--;
        } elseif ($this->changeMonth > 12) {
            $this->changeMonth = 1;
            $this->changeYear++;
        }

        $this->calculateMonthData();
        $this->dispatch('monthCalendarUpdated', [
            'changeMonth' => $this->changeMonth,
            'changeYear' => $this->changeYear,
            'nameOfMonth' => $this->nameOfMonth,
        ]);
    }

    #[On('previousMonth')]
    public function previousMonth(): void
    {
        $this->changeMonth(-1);
    }

    #[On('nextMonth')]
    public function nextMonth(): void
    {
        $this->changeMonth(1);
    }

    public function render()
    {
        return view('livewire.calendar.month-calendar');
    }
}
