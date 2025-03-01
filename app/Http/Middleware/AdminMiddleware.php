<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/admin/login')->with('error', 'You must be logged in to access admin pages.');
        }

        // Atur sesi dengan timeout 1 jam
        $timeout = 60 * 60; // 1 jam dalam detik

        // Cek kapan terakhir kali user aktif
        if (Session::has('lastActivity')) {
            $lastActivity = Session::get('lastActivity');
            if (time() - $lastActivity > $timeout) {
                Auth::logout();
                Session::flush();
                return redirect('/admin/login')->with('error', 'Session expired. Please log in again.');
            }
        }

        // Perbarui waktu aktivitas terakhir user
        Session::put('lastActivity', time());

        return $next($request);
    }
}
