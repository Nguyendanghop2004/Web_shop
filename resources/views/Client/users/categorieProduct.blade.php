@extends('Client.layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="row">
    @foreach ($catelogues->products as $product)
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card border-0 rounded-0 text-center shadow-none overflow-hidden">
            <a href="#!">
                {{-- <span class="badge badge-primary">NEW</span> --}}
                <a href=""><img class="card-img-top rounded-0"
                    style="max-height:200px" src="{{\Storage::url($product->img_thumbnail) }}" alt="Card image"></a>
                    
                <div class="card-body">
                    <a href="">
                        <h4 class="text-uppercase mb-3"> {{$product->name}}</h4>
                    </a>
                    <p class="h4 text-muted font-weight-light mb-3">Lip Gloss</p>
                    <p class="h4">{{$product->gia}}</p>
                    <a href="{{ url('client/users/cart/add') }}?quantity=1&productID=" 
                    class="btn btn-primary">Thêm vào giỏ hàng</a>
                </div>
            </a>
        </div>
    </div>
    @endforeach
   

   

</div>
@endsection 