<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = Session::get('locale', config('app.locale', 'en'));

        App::setLocale($locale);

        // Compute direction and class
        $direction = $locale === 'ar' ? 'rtl' : 'ltr';
        $htmlClass = $locale === 'ar' ? 'rtl-mode' : 'ltr-mode';

        // Share to all Blade views
        view()->share([
            'currentLocale' => $locale,
            'htmlDirection' => $direction,
            'htmlClass' => $htmlClass,
        ]);

        return $next($request);
    }
}