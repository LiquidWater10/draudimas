<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class shortcode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response= $next($request);
        $shortcodes =\App\Models\ShortCode::all();
        $html=$response->getContent();
        foreach($shortcodes as $shortcode)
        {
            $html=str_replace($shortcode->shortcode,$shortcode->replace, $html);
        }

        $response->setContent($html);

        return $response;
    }
}
