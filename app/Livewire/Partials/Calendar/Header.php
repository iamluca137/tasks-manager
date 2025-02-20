<?php

namespace App\Livewire\Partials\Calendar;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Url;
use Livewire\Component;

class Header extends Component
{
    public $viewModes = ['Day', 'Week', 'Month'];
    public $fixedDayCounts = [2, 3, 4, 5, 6, 7, 8, 9];
    public $otherDayCount;
    public $nameOfMonth; // name of month
    public $currentDay, $currentMonth, $currentYear; // current day, month, year
    public $changeMonth, $changeYear; // month and year to display
    public $daysInMonth, $firstDayOfMonth; // number of days in month, first day of month
    #[Url]
    public $selectedDay, $selectedMonth, $selectedYear = null; // selected day, month, year

    protected $listeners = ['dateUpdated' => 'updateDate'];

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
            'selectedDay' => $this->selectedDay,
            'selectedMonth' => $this->selectedMonth,
            'selectedYear' => $this->selectedYear,
            'changeMonth' => $this->changeMonth,
            'changeYear' => $this->changeYear
        ]);
    }

    public function gotoToday() {}

    public function render()
    {
        return view('livewire.partials.calendar.header');
    }
}
