{{-- <h1>ffsd</h1> --}}
@extends('admin.layouts.master')
@section('title')
    Chi tiết danh mục
@endsection


{{-- @dd($model) --}}
@section('content')
    <div class="main_content_iner">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">

                <table>
                    <tr>
                        <th>Trường</th>
                        <th>Giá trị</th>
                    </tr>
                    {{-- @dd($model) --}}
                    @foreach ($products->toArray() as $key => $value)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>
                                @php
                                    if ($key == 'catelogue_id') {
                                        echo $products->catelogue->name;
                                    } elseif ($key == 'img_thumbnail') {
                                        $url = \Storage::url($value);
                                        echo "<img src=' $url 'alt='' width='50px'>";
                                    } elseif (\Str::contains($key, 'is_active')) {
                                        echo $value ? 'Yes' : 'No';
                                    } else {
                                        echo $value;
                                    }
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
