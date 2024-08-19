@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{route('client.index')}}">Mua thêm</a>
    <h2>Giỏ Hàng</h2>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(!empty($cart))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $id => $item)
                <tr>
                    <td><img src="{{ asset('storage/'.$item['img_thumbnail']) }}" alt="{{ $item['name'] }}" width="100"></td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ number_format($item['price_regular'], 0, ',', '.') }} đ</td>
                    <td>{{ number_format($item['quantity'] * $item['price_regular'], 0, ',', '.') }} đ</td>
                    <td>
                        <form action="{{ route('client.cart.destroy', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="d-flex justify-content-between">
            <h4>Tổng cộng: {{ number_format(array_sum(array_map(function($item) {
                return $item['quantity'] * $item['price_regular'];
            }, $cart)), 0, ',', '.') }} đ</h4>
            <a href="{{ route('client.checkout') }}" class="btn btn-primary">Thanh toán</a>
        </div>
    @else
        <p>Giỏ hàng của bạn đang rỗng!</p>
    @endif
</div>
@endsection
