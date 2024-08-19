<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function processCheckout(Request $request)
    {
        // Validate the request
        $request->validate([
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'shipping' => 'required|numeric',
        ]);
    
        // Get cart items from session
        $cartItems = session()->get('cart', []);
        $subtotal = array_sum(array_map(function($item) {
            return $item['quantity'] * $item['price_regular'];
        }, $cartItems));
    
        $shippingCost = $request->input('shipping');
        $total = $subtotal + $shippingCost;
    
        // Save the bill
        $bill = new Bill();
        $bill->user_id = auth()->id();
        $bill->name = $request->input('name');
        $bill->email = $request->input('email');
        $bill->phone = $request->input('phone');
        $bill->address = $request->input('address');
        $bill->subtotal = $subtotal;
        $bill->shipping_cost = $shippingCost;
        $bill->total = $total;
        $bill->items = json_encode($cartItems);
        $bill->save();
    
        // Clear the cart
        session()->forget('cart');
    
        // Redirect to checkout success page with bill ID
        return redirect()->route('client.checkout.success', ['bill_id' => $bill->id])->with('success', 'Thanh toán thành công!');
    }
    
    // Hiển thị hóa đơn thành công
    public function checkoutSuccess(Request $request)
    {
        $billId = $request->query('bill_id'); // Lấy ID hóa đơn từ query string
        $bill = Bill::find($billId);

        if (!$bill) {
            return redirect()->route('client.index')->with('error', 'Không tìm thấy hóa đơn.');
        }

        return view('client.carts.checkout-success', compact('bill'));
    }

    // Hiển thị hóa đơn để in
    public function printBill()
    {
        // Lấy thông tin hóa đơn từ cơ sở dữ liệu
        $bill = Bill::where('user_id', Auth::id())->latest()->first();
    
        if (!$bill) {
            return redirect()->route('client.listCart')->with('error', 'Không tìm thấy hóa đơn!');
        }
    
        $cart = json_decode($bill->items, true);
    
        return view('client.users.print-bill', [
            'cart' => $cart,
            'subtotal' => $bill->subtotal,
            'shipping_cost' => $bill->shipping_cost,
            'total' => $bill->total
        ]);
    }
    public function showBill($billId)
{
    // Lấy thông tin hóa đơn từ cơ sở dữ liệu
    $bill = Bill::find($billId);

    if (!$bill) {
        return redirect()->route('client.index')->with('error', 'Hóa đơn không tìm thấy.');
    }

    $cart = json_decode($bill->items, true);

    return view('client.bill.view-bill', [
        'bill' => $bill,
        'cart' => $cart
    ]);
}
public function showOrder()
{
    $orders = Bill::where('user_id', Auth::id())->get(); // Lấy tất cả đơn hàng của người dùng hiện tại

    return view('client.users.orders', compact('orders'));
}
public function showOrders()
    {
        // Lấy tất cả đơn hàng của người dùng hiện tại
        $orders = Bill::where('user_id', Auth::id())->get();

        // Trả về view với danh sách đơn hàng
        return view('client.bills.orders', compact('orders'));
    }
    
    public function orderDetails($id)
    {
        // Tìm đơn hàng theo ID và đảm bảo nó thuộc về người dùng hiện tại
        $order = Bill::where('user_id', Auth::id())->where('id', $id)->first();

        if (!$order) {
            return redirect()->route('client.client.showOrders')->with('error', 'Đơn hàng không tìm thấy.');
        }

        // Trả về view với thông tin đơn hàng
        return view('client.bills.order-details', compact('order'));
    }

}
