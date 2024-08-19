@extends('admin.layouts.master')

@section('title')
    Sửa tài khoản
@endsection

@section('content')
    <div class="main_content_iner">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Sửa tài khoản</h1>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.user.update',$user->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" placeholder="Nhập tên tài khoản" name="name"
                                    value="{{ $user->name }} {{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="Nhập Email" name="email"
                                    value="{{ $user->email }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Chức vụ</label>
                                {{-- @foreach ($user->toArray() as $key => $item)
                                  @if ($key == 'type')
                                     @dd(1);
                                  @endif
                                @endforeach --}}
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="type"
                                        value="member" {{ $user->type == 'member' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="check1">Member</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="type"
                                        value="admin" {{ $user->type == 'admin' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="check1">Admin</label>
                                </div>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" placeholder="Nhập mật khẩu" name="password"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label"> Nhập lại mật khẩu</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" placeholder="Nhập lại mật khẩu" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
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
