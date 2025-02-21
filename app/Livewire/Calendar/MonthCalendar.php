<?php

namespace App\Livewire\Calendar;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.calendar-layout')]
class MonthCalendar extends Component
{
    public $days = [
        ['short' => 'M', 'full' => 'on'],
        ['short' => 'T', 'full' => 'ue'],
        ['short' => 'W', 'full' => 'ed'],
        ['short' => 'T', 'full' => 'hu'],
        ['short' => 'F', 'full' => 'ri'],
        ['short' => 'S', 'full' => 'at'],
        ['short' => 'S', 'full' => 'un'],
    ];
    public $nameOfMonth;
    public $currentDay, $currentMonth, $currentYear;
    public $changeMonth, $changeYear;
    public $daysInMonth, $firstDayOfMonth;
    public $selectedDay, $selectedMonth, $selectedYear;

    public $daysFromPreviousMonth, $daysFromNextMonth;

    #[On('dateUpdated')]
    public function mount()
    {
        $now = Carbon::now();
        $this->setCurrentDate($now);
        $this->loadSelectedDateFromUrl();
        $this->calculateMonthData();
    }

    private function setCurrentDate(Carbon $now): void
    {
        $this->currentDay = $now->day;
        $this->currentMonth = $now->month;
        $this->currentYear = $now->year;
    }

    private function loadSelectedDateFromUrl(): void
    {
        $segments = request()->segments();

        $this->selectedYear = $this->changeYear = (int) ($segments[0] ?? now()->year);
        $this->selectedMonth = $this->changeMonth = (int) ($segments[1] ?? now()->month);
        $this->selectedDay = (int) ($segments[2] ?? now()->day);
    }

    public function calculateMonthData(): void
    {
        $date = Carbon::create($this->changeYear, $this->changeMonth, 1);
        $this->daysInMonth = $date->daysInMonth;
        $this->firstDayOfMonth = $date->dayOfWeek;
        $this->nameOfMonth = $date->format('F Y');

        // Tính toán ngày từ tháng trước
        $previousMonth = $date->copy()->subMonth();
        $daysInPreviousMonth = $previousMonth->daysInMonth;
        $this->daysFromPreviousMonth = $daysInPreviousMonth - $this->firstDayOfMonth + 1;

        // Tính toán ngày từ tháng sau
        $totalDisplayedDays = $this->firstDayOfMonth + $this->daysInMonth;
        $this->daysFromNextMonth = (7 * 6) - $totalDisplayedDays; // 6 tuần đủ 42 ô

        $this->dispatch('dateUpdated');
    }

    public function render()
    {
        return view('livewire.calendar.month-calendar');
    }
}
