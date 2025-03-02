<?php

namespace App\View\Components;

use App\Models\Event;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class alittleEvent extends Component
{
    /**
     * Create a new component instance.
     */
    public $listEvents ;
    public function __construct()
    {
        $this->listEvents = Event::orderBy('event_date', 'desc')->take(3)->get();
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alittle-event');
    }
}
