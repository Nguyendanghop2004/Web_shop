@extends('admin.layouts.master')
@section('title')
    danh sach danh mục
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">DANH SÁCH DANH MỤC</h1>
                    </div>
                </div>
            </div>
            @if (session('seec'))
            <h1> {{ session('seec') }}</h1>
        @endif
        @php
            $erro = session('seec');
            unset($erro);
        @endphp
            <div class="white_card_body">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <a href="{{ route('admin.product.create') }}" class="bnt btn-success">them moi</a>

                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <form action="{{route('admin.product.index')}}" method="get">
                                        <div class="search_field">
                                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Tên sản phẩm" />
                                        </div>
                                        <button type="submit">
                                            <i class="ti-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="QA_table mb_30">
                        <table class="table lms_table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name </th>
                                    <th>Danh mục sản phẩm</th>
                                    <th>Giá bán </th>
                                    <th>Ảnh sản phẩm </th>
                                    <th>Giá bán thường</th>
                                    <th>Thao tac </th>
                                </tr>
                            </thead>
                            {{-- @dd($data); --}}
                            <tbody>
                                @foreach ($products as $item)
                                    {{-- @dd($item->is_active) --}}
                                    <tr>
                                        <td> {{ $item->id }}</td>
                                        <td> {{ $item->name }}</td>
                                        <td> {{ $item->catelogue->name }}</td>
                                        <td> {{ $item->number }}</td>
                                        <td>
                                            <img src="{{\Storage::url($item->img_thumbnail) }} " alt="" width="50px">
                                        </td>
                                        <td> {{ $item->price_regular }}</td>
                                        <td> {{ $item->price_sale }}</td>
                                        <td> {{ $item->is_active }}</td>
                                        <td>
                                            <a href="{{ route('admin.product.show', $item->id) }}">show</a>
                                            <a href="{{ route('admin.product.edit', $item->id) }}">sua</a>
                                            <a href="
                                            {{ route('admin.product.destroy', $item->id) }}
                                            "
                                                return onclick=" confirm ('chắc chán k')">xoa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
