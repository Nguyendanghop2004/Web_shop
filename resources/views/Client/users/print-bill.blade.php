@extends('Client.layouts.master')

@section('title')
    Hóa Đơn
@endsection

@section('content')
    <div class="main_content_iner overly_inner">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Hóa Đơn</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('client.index') }}">Trang Chủ</a>
                                </li>
                                <li class="breadcrumb-item active">Hóa Đơn</li>
                            </ol>
                        </div>
                        <button class="white_btn3" onclick="window.print();">In Hóa Đơn</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card QA_section border-0">
                        <div class="card-body QA_table">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Sản phẩm</th>
                                            <th class="border-top-0">Giá</th>
                                            <th class="border-top-0">Số lượng</th>
                                            <th class="border-top-0">Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cart as $key => $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ \Storage::url($item['img_thumbnail']) }}" alt height="52" />
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="#" class="d-inline-block align-middle mb-0 f_s_16 f_w_600 color_theme2">{{ $item['name'] }}</a><br />
                                                        <span class="text-muted font_s_13">size-08 (Model 2019)</span>
                                                    </p>
                                                </td>
                                                <td>{{ $item['price_regular'] }}</td>
                                                <td>{{ $item['quantity'] }}</td>
                                                <td>{{ $item['quantity'] * $item['price_regular'] }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Giỏ hàng rỗng</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    <p><strong>Tổng tiền hàng:</strong> {{ $subtotal }} Đồng</p>
                                    <p><strong>Chi phí vận chuyển:</strong> {{ $shipping_cost }} Đồng</p>
                                    <p><strong>Tổng cộng:</strong> {{ $total }} Đồng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
