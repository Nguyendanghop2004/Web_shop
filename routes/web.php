<?php
use App\Http\Controllers\BillController;
use App\Http\Controllers\CatelogueController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\HomeControllers;
use App\Http\Controllers\client\OrdersController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeControllers::class, 'index'])->name('index');


Route::prefix('client')
    ->as('client.')
    ->group(function () {
        Route::get('product/{id}', [HomeControllers::class, 'product'])->name('product');
        Route::get('create/{id}', [HomeControllers::class, 'create'])->name('create');
        Route::get('/', [HomeControllers::class, 'index'])->name('index');

        Route::get('listCart', [CartController::class, 'listCart'])->name('listCart');
        Route::post('cart', [CartController::class, 'cart'])->name('cart');
        Route::delete('cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
        
        // Hiển thị trang thanh toán
        Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');

        Route::post('checkout', [OrdersController::class, 'processCheckout'])->name('checkout.process');
        Route::get('checkout/success', [OrdersController::class, 'checkoutSuccess'])->name('checkout.success');
        // Route in hóa đơn
        Route::get('/print-bill', [OrdersController::class, 'printBill'])->name('client.printBill');
        Route::get('/checkout-success/{bill_id}', [OrdersController::class, 'checkoutSuccess'])->name('client.checkout.success');

        Route::get('/my-orders', [OrdersController::class, 'myOrders'])->name('client.myOrders');
      
        Route::get('/order-details/{id}', [OrdersController::class, 'orderDetails'])->name('client.orderDetails');
        Route::get('/bill/{billId}', [OrdersController::class, 'showBill'])->name('client.showBill');

        Route::get('/orders', [OrdersController::class, 'showOrders'])->name('client.showOrders');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
