<?php

namespace App\Livewire\Calendar;

use App\Models\CatCalendar;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyCalendar extends Component
{
    public $myCalendars = [];

    public function mount()
    {
        $this->myCalendars = CatCalendar::where('user_id', Auth::id())
            ->where('is_show', true)
            ->orderBy('order', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.calendar.my-calendar');
    }
}
