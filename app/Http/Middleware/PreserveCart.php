<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PreserveCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logging out and preserve cart
        if ($request->routeIs('logout')) {
            // Check if the cart exists and save it to a temporary session
            if (Session::has('cart')) {
                $cart = Session::get('cart');
                Session::put('temp_cart', $cart);
            }
        }

        $response = $next($request);

        // Restore cart from temporary session if it exists
        if ($request->routeIs('login') && Session::has('temp_cart')) {
            $cart = Session::get('temp_cart');
            Session::put('cart', $cart);
            Session::forget('temp_cart');
        }

        return $response;
    }
}
