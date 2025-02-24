<?php

namespace App\Livewire\Calendar;

use App\Livewire\Traits\HandlesCalendar;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class MiniCalendar extends Component
{
    use HandlesCalendar;

    public $weekDays = ['M', 'T', 'W', 'T', 'F', 'S', 'S'];

    public function mount(): void
    {
        $this->initializeCalendar();
        $this->calculateMonthData();
    }

    #[On('calendarUpdated')]
    #[On('monthCalendarUpdated')]
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
    }

    public function previousMonth(): void
    {
        $this->changeMonth(-1);
    }

    public function nextMonth(): void
    {
        $this->changeMonth(1);
    }

    public function selectDate($selectDay): void
    {
        $this->selectedDay = $selectDay;
        $this->selectedMonth = $this->changeMonth;
        $this->selectedYear = $this->changeYear;

        $newUrl = url("{$this->selectedYear}/{$this->selectedMonth}/{$this->selectedDay}");
        $this->dispatch('update-url', ['url' => $newUrl]);

        $this->calculateMonthData();

        $this->dispatch('miniCalendarUpdated', [
            'changeMonth' => $this->changeMonth,
            'changeYear' => $this->changeYear,
            'nameOfMonth' => $this->nameOfMonth,
        ]);
        $this->dispatch('calendarUpdated', [
            'changeMonth' => $this->changeMonth,
            'changeYear' => $this->changeYear,
            'nameOfMonth' => $this->nameOfMonth,
        ]);
    }

    public function render()
    {
        return view('livewire.calendar.mini-calendar');
    }
}
