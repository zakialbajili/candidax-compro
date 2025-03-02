<?php

namespace App\View\Components;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tableArticle extends Component
{
    /**
     * Create a new component instance.
     */
    public $articles;
    public function __construct()
    {
        //
        $this->articles = Article::orderBy('created_at', 'desc')->paginate(5);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tableArticle');
    }
}
