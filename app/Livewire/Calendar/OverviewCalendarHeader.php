<?php

namespace App\Livewire\Calendar;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class OverviewCalendarHeader extends Component
{
    public $nameOfMonth; // name of month
    public $currentDay, $currentMonth, $currentYear; // current day, month, year
    public $changeMonth, $changeYear; // month and year to display
    public $daysInMonth, $firstDayOfMonth; // number of days in month, first day of month 

    public function mount()
    {
        $now = Carbon::now();
        $this->currentDay = $now->day;
        $this->currentMonth = $now->month;
        $this->currentYear = $now->year;

        $savedData = Session::get('calendar_data');

        if ($savedData) {
            $this->changeMonth = $savedData['changeMonth'];
            $this->changeYear = $savedData['changeYear'];
        } else {
            $this->changeMonth = $this->currentMonth;
            $this->changeYear = $this->currentYear;
        }

        $this->calculateMonthData();
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

    public function calculateMonthData()
    {
        $date = Carbon::create($this->changeYear, $this->changeMonth, 1);
        $this->daysInMonth = $date->daysInMonth;
        $this->firstDayOfMonth = $date->dayOfWeek;
        $this->nameOfMonth = $date->format('F Y');

        $this->saveToSession();
        $this->dispatch('dateUpdated');
    }

    private function saveToSession()
    {
        Session::put('calendar_data', [
            'changeMonth' => $this->changeMonth,
            'changeYear' => $this->changeYear,
            'nameOfMonth' => $this->nameOfMonth,
        ]);
    }

    public function previousMonth()
    {
        $this->changeMonth--;
        if ($this->changeMonth < 1) {
            $this->changeMonth = 12;
            $this->changeYear--;
        }
        $this->calculateMonthData();
    }

    public function nextMonth()
    {
        $this->changeMonth++;
        if ($this->changeMonth > 12) {
            $this->changeMonth = 1;
            $this->changeYear++;
        }
        $this->calculateMonthData();
    }

    public function gotoToday()
    {
        $this->redirect('calendar', navigate: true);
    }

    public function render()
    {
        return view('livewire.calendar.overview-calendar-header');
    }
}
