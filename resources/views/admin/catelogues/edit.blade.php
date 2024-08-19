@extends('admin.layouts.master')
@section('title')
    Cập nhật danh sach danh mục
@endsection
@section('content')
    <div class="main_content_iner">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <form action="{{ route('admin.catelogue.update', $model->id) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name"
                                value="{{ $model->name }}" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection





</body>


</html>
