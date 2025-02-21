<?php

namespace App\Livewire\Partials\Calendar;


use Livewire\Component;

class Header extends Component
{
    public $viewModes = ['Day', 'Week', 'Month'];
    public $fixedDayCounts = [2, 3, 4, 5, 6, 7, 8, 9];
    public $otherDayCount;


    public function render()
    {
        return view('livewire.partials.calendar.header');
    }
}
