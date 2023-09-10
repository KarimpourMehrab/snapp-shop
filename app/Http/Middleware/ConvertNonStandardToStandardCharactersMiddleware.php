<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConvertNonStandardToStandardCharactersMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        foreach ($request->all() as $key => $item) {
            $request->merge([
                $key => standardiseCharactersAndNumbers($item)
            ]);
        }
        return $next($request);
    }
}
