<?php

namespace App\Livewire\Layouts;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CalendarLayout extends Component
{  
    public function render()
    {
        return view('livewire.layouts.calendar-layout');
    }
}
