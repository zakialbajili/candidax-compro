<?php

namespace App\View\Components;

use App\Models\Event;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tableEvent extends Component
{
    /**
     * Create a new component instance.
     */
    public $events;
    public function __construct()
    {
        //
        $this->events = Event::orderBy('event_date', 'desc')->paginate(5);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tableEvent');
    }
}
