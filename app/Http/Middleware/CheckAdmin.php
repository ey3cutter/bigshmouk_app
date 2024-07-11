<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('admin')->user();

        if (!$user) {
            // Проверяем, является ли текущий маршрут маршрутом логина
            if (!Route::is('filament.admin.auth.login')) {
                return redirect()->route('filament.admin.auth.login'); // Редирект на маршрут логина
            }
        } else {
            // Если пользователь авторизован и является администратором
            if ($user->is_admin) {
                return $next($request);
            }

            // Если пользователь не администратор, возвращаем ошибку доступа
            abort(403, 'Вам запрещён доступ к этой странице');
        }

        return $next($request);
    }
}
