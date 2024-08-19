@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi Tiết Hóa Đơn #{{ $bill->id }}</h1>

    <p><strong>Tên:</strong> {{ $bill->name }}</p>
    <p><strong>Email:</strong> {{ $bill->email }}</p>
    <p><strong>Số điện thoại:</strong> {{ $bill->phone }}</p>
    <p><strong>Địa chỉ:</strong> {{ $bill->address }}</p>
    <p><strong>Subtotal:</strong> ${{ number_format($bill->subtotal, 2) }}</p>
    <p><strong>Phí vận chuyển:</strong> ${{ number_format($bill->shipping_cost, 2) }}</p>
    <p><strong>Tổng cộng:</strong> ${{ number_format($bill->total, 2) }}</p>

    <h4>Chi Tiết Đơn Hàng:</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng cộng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>${{ number_format($item['price_regular'], 2) }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ number_format($item['quantity'] * $item['price_regular'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('client.printBill') }}" class="btn btn-primary">In Hóa Đơn</a>
</div>
@endsection
