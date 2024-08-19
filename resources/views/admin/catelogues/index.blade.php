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
            <div class="white_card_body">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <a href="{{route('admin.catelogue.create')}}" class="bnt btn-success">them moi</a>

                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <form Active="#">
                                        <div class="search_field">
                                            <input type="text" placeholder="Search content here..." />
                                        </div>
                                        <button type="submit">
                                            <i class="ti-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="add_button ms-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addcategory" class="btn_1">Add
                                    New</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table mb_30">
                        <table class="table lms_table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name </th>
                                    <th>created_at</th>
                                    <th>updated_at </th>
                                    <th>Thao tac </th>
                                    <th> </th>
                                </tr>
                            </thead>
                            {{-- @dd($data); --}}
                            <tbody>
                                @foreach ($data as $item)
                                {{-- @dd($item->is_active) --}}
                                    <tr>
                                        <td> {{ $item->id }}</td>
                                        <td> {{ $item->name }}</td>
                                        <td> {{ $item->created_at }}</td>
                                        <td> {{ $item->updated_at }} </td>
                                        <td> 
                                            <a href="{{route('admin.catelogue.show',$item->id)}}">show</a>
                                            <a href="{{route('admin.catelogue.edit',$item->id)}}">sua</a>
                                            <a href="
                                            {{route('admin.catelogue.destroy',$item->id)}}
                                            " return onclick=" confirm ('chắc chán k')">xoa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
