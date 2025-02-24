<?php

namespace App\Livewire\Traits;

use Carbon\Carbon;

trait HandlesCalendar
{
    public $nameOfMonth, $currentDay, $currentMonth, $currentYear;
    public $changeMonth, $changeYear;
    public $daysInMonth, $firstDayOfMonth;
    public $selectedDay, $selectedMonth, $selectedYear;

    public function initializeCalendar(): void
    {
        $now = Carbon::now();
        $this->currentDay = $now->day;
        $this->currentMonth = $now->month;
        $this->currentYear = $now->year;
        $this->loadSelectedDateFromUrl();
    }

    public function loadSelectedDateFromUrl(): void
    {
        $segments = request()->segments();
        $this->selectedYear = $this->changeYear = is_numeric($segments[0] ?? null) ? (int)$segments[0] : now()->year;
        $this->selectedMonth = $this->changeMonth = is_numeric($segments[1] ?? null) ? (int)$segments[1] : now()->month;
        $this->selectedDay = is_numeric($segments[2] ?? null) ? (int)$segments[2] : now()->day;
    }
}
