<?php

namespace App\Livewire\Calendar;

use App\Livewire\Traits\HandlesCalendar;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class OverviewCalendarHeader extends Component
{
    use HandlesCalendar;

    public function mount(): void
    {
        $this->initializeCalendar();
        $this->calculateMonthData();
    }

    #[On('miniCalendarUpdated')]
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
        $this->dispatch('calendarUpdated', [
            'changeMonth' => $this->changeMonth,
            'changeYear' => $this->changeYear,
            'nameOfMonth' => $this->nameOfMonth,
        ]);
    }

    public function previousMonth(): void
    {
        $this->changeMonth(-1);
    }

    public function nextMonth(): void
    {
        $this->changeMonth(1);
    }

    public function gotoToday(): void
    {
        $this->redirect('calendar', navigate: true);
    }

    public function render()
    {
        return view('livewire.calendar.overview-calendar-header');
    }
}
