<?php

namespace App\Livewire\Calendar;

use Livewire\Component;
use Livewire\Livewire;

class Calendar extends Component
{
    public function render()
    {
        $view = session()->get('view-calendar', 'month-calendar');
        return Livewire::mount("calendar.$view");
    }
}
