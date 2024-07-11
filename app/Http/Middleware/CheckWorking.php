<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification;

class CheckWorking
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('employee')->user();

        if (!$user) {
            // Проверяем, является ли текущий маршрут маршрутом логина
            if (!Route::is('filament.employee.auth.login')) {
                return redirect()->route('filament.employee.auth.login');
            }
        } else {
            if ($user->is_working) {
                return $next($request);
            }

            Auth::logout();

            return redirect()->route('filament.employee.auth.login')
                ->withErrors('Ваш аккаунт был деактивирован');
        }

        return $next($request);
    }
}
