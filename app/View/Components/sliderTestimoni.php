<?php

namespace App\View\Components;

use App\Models\Partner;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sliderTestimoni extends Component
{
    /**
     * Create a new component instance.
     */
    public $listShowPartners;
    public function __construct()
    {
        //
        $this->listShowPartners = Partner::where('isShow', 'SHOW')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.slider-testimoni');
    }
}
