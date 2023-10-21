<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Product; // Import model Product

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (auth()->check()) {
            $products = Product::orderBy('created_at', 'desc')->take(8)->get();
            view()->share('products', $products);
        }
        if (auth()->check() && in_array(auth()->user()->role, $roles)) {
            return $next($request);
        } else {
            $targetUrl = '/'; 

            if (auth()->user() && auth()->user()->role === 'user') {
                $targetUrl = '/index'; 
            }
            return redirect($targetUrl)->with('error', 'Bạn không có quyền truy cập.');
        }
    }
}
