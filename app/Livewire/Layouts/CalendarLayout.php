<?php

namespace App\Livewire\Layouts;

use Carbon\Carbon;
use Livewire\Component;

class CalendarLayout extends Component
{
    public $currentDay, $currentMonth, $currentYear;
    public $selectedDay, $selectedMonth, $selectedYear;

    public function mount()
    {
        $now = Carbon::now();
        $this->currentDay = $now->day;
        $this->currentMonth = $now->month;
        $this->currentYear = $now->year;
        $this->selectedDay = $this->currentDay;
        $this->selectedMonth = $this->currentMonth;
        $this->selectedYear = $this->currentYear;
    }

    public function updateDate($day, $month, $year)
    {
        $this->selectedDay = $day;
        $this->selectedMonth = $month;
        $this->selectedYear = $year;

        $this->dispatch('dateUpdated', $day, $month, $year);
    }

    public function render()
    {
        return view('livewire.layouts.calendar-layout');
    }
}
