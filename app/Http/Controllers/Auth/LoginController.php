<?php

namespace App\Http\Controllers\Auth;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Handle the user's login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        // Restore cart from temporary session if it exists
        if (Session::has('temp_cart')) {
            $cart = Session::get('temp_cart');
            Session::put('cart', $cart);
            Session::forget('temp_cart');
        }
    }
  

    protected function loggedOut(Request $request)
    {
        $user = Auth::user();
    
        if ($user) {
            // Save the current cart to the database
            $cartItems = session()->get('cart', []);
            Cart::updateOrCreate(
                ['user_id' => $user->id],
                ['items' => json_encode($cartItems)]
            );
    
            // Optionally, you may also clear the session cart
            session()->forget('cart');
        }
    }
    
}
