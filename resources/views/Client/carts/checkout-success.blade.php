{{-- resources/views/client/users/checkout-success.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thanh Toán Thành Công</h1>

    <div class="alert alert-success">
        <strong>Chúc mừng!</strong> Bạn đã thanh toán thành công.
    </div>

    <h2>Chi Tiết Hóa Đơn</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng cộng</th>
            </tr>
        </thead>
        <tbody>
            @foreach(json_decode($bill->items, true) as $item)
                <tr>
                    <td>
                        <img src="{{ \Storage::url($item['img_thumbnail']) }}" alt="Product Image" height="52" />
                        {{ $item['name'] }}
                    </td>
                    <td>${{ number_format($item['price_regular'], 2) }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ number_format($item['quantity'] * $item['price_regular'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right">Tổng cộng</td>
                <td>${{ number_format($bill->total, 2) }}</td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
