<?php

namespace App\Livewire\Calendar;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
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
    public $selectedDay, $selectedMonth, $selectedYear = null; // selected day, month, year

    protected $listeners = ['dateUpdated' => 'calculateMonthData'];

    public function mount()
    {
        $now = Carbon::now();
        $this->currentDay = $now->day;
        $this->currentMonth = $now->month;
        $this->currentYear = $now->year;

        $savedData = Session::get('selected_date');

        if ($savedData) {
            $this->selectedDay = $savedData['selectedDay'];
            $this->selectedMonth = $savedData['selectedMonth'];
            $this->selectedYear = $savedData['selectedYear'];
            $this->changeMonth = $savedData['changeMonth'];
            $this->changeYear = $savedData['changeYear'];
        } else {
            $this->changeMonth = $this->currentMonth;
            $this->changeYear = $this->currentYear;
        }

        $this->calculateMonthData();
    }

    private function saveToSession()
    {
        Session::put('calendar_data', [
            'selectedDay' => $this->selectedDay,
            'selectedMonth' => $this->selectedMonth,
            'selectedYear' => $this->selectedYear,
            'changeMonth' => $this->changeMonth,
            'changeYear' => $this->changeYear
        ]);
    }

    // calculate number of days in month, first day of month, name of month
    public function calculateMonthData()
    {
        $date = Carbon::create($this->changeYear, $this->changeMonth, 1);
        $this->daysInMonth = $date->daysInMonth;
        $this->firstDayOfMonth = $date->dayOfWeek;
        $this->nameOfMonth = $date->format('F Y');

        $this->saveToSession();
        $this->dispatch('dateUpdated');
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
        $this->selectedDay = $selectDay;
        $this->selectedMonth = $this->changeMonth;
        $this->selectedYear = $this->changeYear;

        $this->saveToSession();
    }

    public function clearSelectedDate()
    {
        Session::forget('calendar_data');
        $this->selectedDay = null;
        $this->selectedMonth = $this->currentMonth;
        $this->selectedYear = $this->currentYear;
        $this->changeMonth = $this->currentMonth;
        $this->changeYear = $this->currentYear;

        $this->calculateMonthData();
    }

    public function render()
    {
        return view('livewire.calendar.mini-calendar');
    }
}
