<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $events = Event::all();
        $partners = Partner::all();
        return view('admin', compact('articles', 'events', 'partners'));
    }
    //
}
