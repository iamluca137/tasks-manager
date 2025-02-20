<?php

namespace App\Livewire\Calendar;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.calendar-layout')]
class Calendar extends Component
{
    public function render()
    {
        $view = session()->get('view-calendar', 'month-calendar');
        return view("livewire.calendar.$view");
    }
}
