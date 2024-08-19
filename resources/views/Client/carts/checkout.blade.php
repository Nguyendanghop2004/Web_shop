
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thanh Toán</h1>

    <form action="{{ route('client.checkout.process') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên" required>
        </div>

       
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
        </div>

        
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
        </div>

        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" required>
        </div>

       
        <div class="form-group">
            <label>Chọn phương thức giao hàng:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="shipping" value="5" checked>
                <label class="form-check-label">
                    Giao hàng tiêu chuẩn - $5.00
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="shipping" value="10">
                <label class="form-check-label">
                    Giao hàng nhanh - $10.00
                </label>
            </div>
        </div>

        <!-- Tổng cộng -->
        <div class="form-group">
            <h4>Tổng cộng: ${{ number_format($subtotal, 2) }}</h4>
        </div>

        <button type="submit" class="btn btn-primary">Thanh toán</button>
    </form>
</div>
@endsection
