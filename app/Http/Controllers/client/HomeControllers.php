<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\catelogue;
use App\Models\product;


class HomeControllers extends Controller
{
    // Hiển thị trang chính
    public function index()
    {
        $products = product::query()->latest('id')->paginate(8);
        $catelogue = catelogue::query()->get();
        return view('Client.dashboard', compact('products', 'catelogue'));
    }

    // Hiển thị danh sách sản phẩm của danh mục
    public function create(string $id = null)
    {
        $catelogue = catelogue::query()->get();
        $catelogues = catelogue::query()->findOrFail($id);
        return view('Client.users.CategorieProduct', compact('catelogues', 'catelogue'));
    }

    // Hiển thị chi tiết sản phẩm
    public function product(string $id)
    {
        $catelogue = catelogue::query()->get();
        $products = product::query()->findOrFail($id);
        return view('client.users.product-detal', compact('products', 'catelogue'));
    }

    
    // Xử lý thanh toán
   

}
