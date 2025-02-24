<?php

namespace App\Livewire\Calendar;

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.layouts.calendar-layout')]
class Calendar extends Component
{
    public $view;

    public function mount(): void
    {
        $this->view = Session::get('view-calendar', 'month-calendar');
    }

    public function render()
    {
        return view('livewire.calendar.calendar', [
            'view' => $this->view,
        ]);
    }
}
