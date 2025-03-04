<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SitemapController;
use App\Models\Article;
use App\Models\Event;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $listShowPartners = Partner::where('isShow', 'SHOW')->get();
    return view('home', compact('listShowPartners'));
});
Route::get('/company', function () {
    $articles = Article::orderBy('created_at', 'desc')->take(3)->get();
    $events = Event::orderBy('event_date', 'desc')->take(3)->get();
    return view('company', compact('articles', 'events'));
});
Route::get('/collaboration', function () {
    $listShowPartners = Partner::where('isShow', 'SHOW')->get();
    return view('collaboration', compact('listShowPartners'));
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/articles', [ArticleController::class, 'listArticle'])->name('articles');
Route::get('/article/{id}', [ArticleController::class, 'detailArticle'])->name('detailArticle');
Route::get('/events', [EventController::class, 'listEvents'])->name('events');
Route::get('/event/{id}', [EventController::class, 'detailEvent'])->name('detailEvent');

//CREATE CONSULTATION
Route::post('/create/consult', [ConsultationController::class, 'createConsult'])->name('createConsult');

//Admin GET
Route::get('/admin/login', function () {
    return view('adminLogin');
});
Route::middleware(['adminMiddleware'])->prefix('/admin')->group(function()
    {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/article/add', function () {
            return view('addArticle');
        });
        Route::get('/event/add', function () {
            return view('addEvent');
        });
        Route::get('/partner/add', function () {
            return view('addPartner');
        });
        Route::get('/article/edit/{id}', [ArticleController::class, 'indexEditArticle'])->name('admin.indexEditArticle');
        Route::get('/event/edit/{id}', [EventController::class, 'indexEditArticle'])->name('admin.indexEditArticle');
        Route::get('/partner/edit/{id}', [PartnerController::class, 'indexEditPartner'])->name('admin.indexEditPartner');
    }
);

//API Endpoint
//Table Data
Route::get('/api/articles', function (Request $request) {
    $search = $request->query('search', '');
    $limit = $request->query('limit', 10);

    $articles = Article::where('title', 'like', "%$search%")->orderBy('created_at', 'desc')->paginate($limit);

    return response()->json([
        'articles' => $articles->items(),
        'pagination' => $articles->links('vendor.pagination.tailwind')->render()
    ]);
});
Route::get('/api/events', function (Request $request) {
    $search = $request->query('search', '');
    $limit = $request->query('limit', 10);

    $events = Event::where('title', 'like', "%$search%")->orderBy('event_date', 'desc')->paginate($limit);

    return response()->json([
        'events' => $events->items(),
        'pagination' => $events->links('vendor.pagination.tailwind')->render()
    ]);
});
Route::get('/api/partners', function (Request $request) {
    $search = $request->query('search', '');
    $limit = $request->query('limit', 10);

    $partners = Partner::where('name', 'like', "%$search%")->orderBy('created_at', 'desc')->paginate($limit);

    return response()->json([
        'partners' => $partners->items(),
        'pagination' => $partners->links('vendor.pagination.tailwind')->render()
    ]);
});
//Auth POST
Route::post('/api/auth/user/regist', [AuthController::class, 'registerUser'])->name('admin.registerUser');
Route::post('/api/auth/user/login', [AuthController::class, 'loginUser'])->name('admin.loginUser');

//Admin POST
Route::post('/api/create/article', [ArticleController::class,'createArticle'])->name('admin.createArticle');
Route::post('/api/create/event', [EventController::class,'createEvent'])->name('admin.createEvent');
Route::post('/api/create/partner', [PartnerController::class,'createPartner'])->name('admin.createPartner');

//Admin PUT
Route::put('/api/edit/article/{id}', [ArticleController::class,'editArticle'])->name('admin.editArticle');
Route::put('/api/edit/event/{id}', [EventController::class,'editEvent'])->name('admin.editEvent');
Route::put('/api/edit/partner/{id}', [PartnerController::class,'editPartner'])->name('admin.editPartner');

//Admin DELETE
Route::delete('/api/delete/article/{id}', [ArticleController::class, 'deleteArticle'])->name('admin.deleteArticle');
Route::delete('/api/delete/event/{id}', [EventController::class, 'deleteEvent'])->name('admin.deleteEvent');
Route::delete('/api/delete/partner/{id}', [PartnerController::class, 'deletePartner'])->name('admin.deletePartner');