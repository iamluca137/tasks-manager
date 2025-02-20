<?php

namespace App\Livewire\Partials\Calendar;

use Livewire\Component;

class Header extends Component
{
    public function gotoToday()
    {
        return redirect()->route('calendar');
    }
    
    public function render()
    {
        return view('livewire.partials.calendar.header');
    }
}
