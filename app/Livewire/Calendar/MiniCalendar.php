<?php

namespace App\Livewire\Calendar;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class MiniCalendar extends Component
{
    public $weekDays = ['M', 'T', 'W', 'T', 'F', 'S', 'S'];
    public $nameOfMonth;
    public $currentDay, $currentMonth, $currentYear;
    public $changeMonth, $changeYear;
    public $daysInMonth, $firstDayOfMonth;
    public $selectedDay, $selectedMonth, $selectedYear;

    public function mount(): void
    {
        $now = Carbon::now();
        $this->setCurrentDate($now);
        $this->loadSelectedDateFromUrl();
        $this->calculateMonthData();
    }

    private function setCurrentDate(Carbon $now)
    {
        $this->currentDay = $now->day;
        $this->currentMonth = $now->month;
        $this->currentYear = $now->year;
    }

    private function loadSelectedDateFromUrl()
    {
        $segments = request()->segments();

        $this->selectedYear = $this->changeYear = (int) ($segments[0] ?? now()->year);
        $this->selectedMonth = $this->changeMonth = (int) ($segments[1] ?? now()->month);
        $this->selectedDay = (int) ($segments[2] ?? now()->day);
    }

    #[On('dateUpdated')]
    public function updateDate()
    {
        $savedData = Session::get('calendar_data');

        if ($savedData) {
            $this->changeMonth = $savedData['changeMonth'];
            $this->changeYear = $savedData['changeYear'];
            $this->nameOfMonth = $savedData['nameOfMonth'];
        }
    }

    private function saveToSession()
    {
        Session::put('calendar_data', [
            'changeMonth' => $this->changeMonth,
            'changeYear' => $this->changeYear,
            'nameOfMonth' => $this->nameOfMonth,
        ]);
    }

    public function calculateMonthData()
    {
        $date = Carbon::create($this->changeYear, $this->changeMonth, 1);
        $this->daysInMonth = $date->daysInMonth;
        $this->firstDayOfMonth = $date->dayOfWeek;
        $this->nameOfMonth = $date->format('F Y');

        $this->saveToSession();
        $this->dispatch('dateUpdated');
    }

    public function changeMonth($direction)
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

    public function previousMonth()
    {
        $this->changeMonth(-1);
    }

    public function nextMonth()
    {
        $this->changeMonth(1);
    }

    public function selectDate($selectDay)
    {
        $this->selectedDay = $selectDay;
        $this->selectedMonth = $this->changeMonth;
        $this->selectedYear = $this->changeYear;

        $this->saveToSession();

        $newUrl = url("{$this->selectedYear}/{$this->selectedMonth}/{$this->selectedDay}");
        $this->dispatch('update-url', ['url' => $newUrl]);
    }

    public function render()
    {
        return view('livewire.calendar.mini-calendar');
    }
}
