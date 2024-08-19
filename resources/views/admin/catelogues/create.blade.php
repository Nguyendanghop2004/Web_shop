@extends('admin.layouts.master')
@section('title')
    danh sach danh mục
@endsection


@section('content')
    <div class="main_content_iner">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <form action="{{ route('admin.catelogue.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Enter name" name="name" value="{{ old('name') }}">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <h1>chập nhật {{ $model['name'] }}</h1> --}}



</body>
{{-- <form action="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="cover" class="form-label">Img</label>
                    <input type="file" class="form-control" id="cover" name="cover">
                </div>
                <div class="mb-5 mt-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="text" class="form-control" id="password" placeholder="Enter password"
                        name="password">
                </div>
                <button type="submit" class="btn btn-primary ">Submit</button>
            </form> --}}

</html>
