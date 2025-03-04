<?php

namespace App\View\Components;

use App\Models\Partner;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tablePartner extends Component
{
    /**
     * Create a new component instance.
     */
    public $partners;
    public function __construct()
    {
        //
        $this->partners = Partner::orderBy('created_at', 'desc')->paginate(1);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tablePartner');
    }
}
