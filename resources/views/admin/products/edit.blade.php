@extends('admin.layouts.master')
@section('title')
    danh sach danh mục
@endsection


@section('content')
    <div class="main_content_iner">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">

                <form action="{{ route('admin.product.update',$product->id) }}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" placeholder="Enter name" name="name" value="{{$product->name}}{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Danh mục</label>

                                {{-- @dd($catelogue) --}}
                                <select name="catelogue_id" class="form-select">
                                    @foreach ($catelogue as $key => $value)
                                        
                                    <option value="{{$key}}">{{$value}}</option>
                                    
                                   
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Ảnh sản phẩm</label>
                                <input type="file" class="form-control @error('img_thumbnail') is-invalid @enderror"
                                    id="img_thumbnail" placeholder="Enter Img Thumbnail" name="img_thumbnail"
                                    value="{{ old('img_thumbnail') }}">
                                    <img src="{{\Storage::url($product->img_thumbnail) }} " alt="" width="50px">

                                @error('img_thumbnail')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <label for="">Trạng thái</label>
                            <select name="is_active" class="form-select">
                              
                                    <option value="1"> Yes</option>
                                    <option value="2">NO</option>
                              

                            </select>

                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3 mt-3">
                                <label for="number" class="form-label">Số lượng sản phẩm</label>
                                <input type="text" class="form-control @error('number') is-invalid @enderror"
                                    id="number" placeholder="Enter number" name="number" value=" {{$product->number}}{{ old('number') }}">
                                @error('number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="price_regular" class="form-label">Giá bán thường</label>
                                <input type="text" class="form-control @error('price_regular') is-invalid @enderror"
                                    id="price_regular" placeholder="Enter price_regular" name="price_regular"
                                    value="{{$product->price_regular}}{{ old('price_regular') }}">
                                @error('price_regular')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="content" class="form-label">Mô tả</label>
                                <input type="text" class="form-control @error('content') is-invalid @enderror"
                                    id="content" placeholder="Enter content" name="content"
                                    value="{{$product->content}}{{ old('content') }}">
                                @error('content')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="price_sale" class="form-label">Giá bán sale</label>
                                <input type="text" class="form-control @error('price_sale') is-invalid @enderror"
                                    id="price_sale" placeholder="Enter price_sale" name="price_sale"
                                    value="{{$product->price_sale}}{{ old('price_sale') }}">
                                @error('price_sale')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection




</body>


</html>
