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
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        $events = Event::orderBy('event_date', 'desc')->paginate(5);
        $partners = Partner::orderBy('created_at', 'desc')->paginate(5);
        return view('admin', compact('articles', 'events', 'partners'));
        // return view('admin', compact('events', 'partners'));
        // return view('admin', compact('partners'));
        // return view('admin', compact('articles'));
        // return view('admin');
    }
    //
}
