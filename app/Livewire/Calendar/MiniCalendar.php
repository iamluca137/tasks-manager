<?php

namespace App\Livewire\Calendar;

use Carbon\Carbon;
use Livewire\Attributes\Url;
use Livewire\Component;

class MiniCalendar extends Component
{
    public $weekDays = ['M', 'T', 'W', 'T', 'F', 'S', 'S']; // week days
    public $nameOfMonth; // name of month
    public $currentDay, $currentMonth, $currentYear; // current day, month, year
    public $changeMonth, $changeYear; // month and year to display
    public $daysInMonth, $firstDayOfMonth; // number of days in month, first day of month
    #[Url]
    public $sD, $sM, $sY = null; // selected day, month, year

    public function mount()
    {
        $this->currentDay = Carbon::now()->day;
        $this->currentMonth = Carbon::now()->month;
        $this->currentYear = Carbon::now()->year;
        $this->changeMonth = $this->sM ?? $this->currentMonth;
        $this->changeYear = $this->sY ?? $this->currentYear;
        $this->calculateMonthData();
    }

    // calculate number of days in month, first day of month, name of month
    public function calculateMonthData()
    {
        $date = Carbon::create($this->changeYear, $this->changeMonth, 1);
        $this->daysInMonth = $date->daysInMonth;
        $this->firstDayOfMonth = $date->dayOfWeek;
        $this->nameOfMonth = $date->format('F Y');
    }

    // go to previous month
    public function previousMonth()
    {
        $this->changeMonth--;
        if ($this->changeMonth < 1) {
            $this->changeMonth = 12;
            $this->changeYear--;
        }
        $this->calculateMonthData();
    }

    // go to next month
    public function nextMonth()
    {
        $this->changeMonth++;
        if ($this->changeMonth > 12) {
            $this->changeMonth = 1;
            $this->changeYear++;
        }
        $this->calculateMonthData();
    }

    // select date
    public function selectDate($selectDay)
    {
        $this->sD = $selectDay;
        $this->sM = $this->changeMonth;
        $this->sY = $this->changeYear;
    } 

    public function render()
    {
        return view('livewire.calendar.mini-calendar');
    }
}
