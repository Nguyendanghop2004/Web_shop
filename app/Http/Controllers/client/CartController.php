<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\catelogue;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listCart()
    {
        $cart = session()->get('cart', []);
        $catelogue = catelogue::query()->get();
        $customer = Auth::user(); // Hoặc cách lấy thông tin khách hàng phù hợp

        return view('client.carts.cart', compact('catelogue', 'cart', 'customer'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function cart(Request $request)
    {
        if (!Auth::check()) {
            // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập hoặc thông báo lỗi
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        $product_id = $request->input('id_product');
        $quantity = $request->input('quantity');
        $product = product::query()->findOrFail($product_id);

        $cart = session()->get('cart', []);
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $quantity;
        } else {
            $cart[$product_id] = [
                'name' => $product->name,
                'quantity' => $quantity,
                'price_regular' => isset($product->price_sale) ? $product->price_sale : $product->price_regular,
                'img_thumbnail' => $product->img_thumbnail
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('client.listCart')->with('success', 'Thêm vào giỏ hàng thành công');
    }


    public function destroy(string $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->route('client.listCart')->with('success', 'Sản phẩm đã được xóa thành công');
        }

        return redirect()->route('client.listCart')->with('error', 'Sản phẩm không tìm thấy trong giỏ hàng');
    }

    public function checkout()
    {
        $cartItems = session()->get('cart', []);
        $subtotal = array_sum(array_map(function ($item) {
            return $item['quantity'] * $item['price_regular'];
        }, $cartItems));

        // Get customer information
        $customer = auth()->user(); // Hoặc cách lấy thông tin khách hàng phù hợp

        return view('client.carts.checkout', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'customer' => $customer
        ]);
    }
}
