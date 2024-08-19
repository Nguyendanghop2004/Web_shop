<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\catelogue;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    const PATH_VIEW = 'admin.products.';
    public product $product;
    public function  __construct()
    {
        $this->product = new product();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = product::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })->orderByDesc('id')->paginate(10);

        return view(self::PATH_VIEW . __FUNCTION__, compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catelogue = catelogue::get()->toArray();
        $catelogue = array_column($catelogue, 'name', 'id');
        //
        return view(self::PATH_VIEW . __FUNCTION__, compact('catelogue'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request  $request)
    {
        // $storeProductRequest->authorize();
        $data =  $request->except('img_thumbnail');
        if ($request->hasFile('img_thumbnail')) {
            $data['img_thumbnail'] = Storage::put('public/uploads/catelogues', $request->file('img_thumbnail'));
        }
        product::create($data);
        return redirect()->route('admin.product.index')->with('seec', ' Thêm mới thành công');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $products = product::query()->findOrFail($id);
        // dd($products->first() ->catelogue->toArray());
        return view(self::PATH_VIEW . __FUNCTION__, compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $catelogue = catelogue::get()->toArray();
        $catelogue = array_column($catelogue, 'name', 'id');
        $product = product::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'catelogue'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = product::query()->findOrFail($id);

        $data =  $request->except('img_thumbnail');

        if ($request->hasFile('img_thumbnail')) {

            $data['img_thumbnail'] = Storage::put('public/uploads/catelogues', $request->file('img_thumbnail'));
        }
        $img = $products->img_thumbnail;
        $products->update($data);

        if ($img && Storage::exists($img) && $request->hasFile('img_thumbnail')) {
            Storage::delete($img);
        } else {
            $data['img_thumbnail'] =  $img;
        }

        return back()->with('seec', ' thêm mới thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = product::query()->findOrFail($id);
        $products->delete();
        if ($products->img_thumbnail && Storage::exists($products->img_thumbnail)) {
            Storage::delete($products->img_thumbnail);
        }

        return back()->with('seec', ' thêm mới thành công');
    }
}
