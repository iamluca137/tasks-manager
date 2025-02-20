<?php

namespace App\Livewire\Calendar;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.calendar-layout')]
class Calendar extends Component
{
    public function render()
    {
        return view('livewire.calendar.calendar');
    }
}
