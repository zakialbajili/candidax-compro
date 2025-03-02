<?php

namespace App\View\Components;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class alittleArticle extends Component
{
    /**
     * Create a new component instance.
     */
    public $listArticle ;
    public function __construct()
    {
        $this->listArticle = Article::orderBy('created_at', 'desc')->take(3)->get();
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alittle-article');
    }
}
