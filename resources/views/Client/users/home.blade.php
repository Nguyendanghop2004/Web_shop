<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href=" <?= $_ENV['BASE_URL'] ?>assets/css/style1.css ">
    {{-- <link rel="stylesheet" href=" {{asset('assets/css/style1.css')}} ">; --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <h1 class=" mt-5 ">Welcome {{ $name }} to my website!</h1>

    @if (isset($_SESSION['user']))
        <a class="btn btn-primary" href="{{ url('client/users/login') }}">logout</a>
    @endif

    @if (!isset($_SESSION['user']))
        <a class="btn btn-primary" href="{{ url('client/users/login') }}">login</a>
    @endif
    <div class="row mt-5">

        @foreach ($products as $product)
            <div class="col-md-4 mb-2 mt-2">
                <div class="card">
                    <a href="{{ url('product/' . $product['id']) }}"><img class="card-img-top"
                            style="max-height:200px" src="{{ asset($product['img_thumbnail']) }}" alt="Card image"></a>
                    <div class="card-body">
                        <a href="{{ url('product/' . $product['id']) }}">
                            <h4 class="card-title">{{ $product['name'] }}</h4>
                        </a>
                        {{-- <p class="card-text">{{ $product['content'] }}</p> --}}
                        <a href="{{ url('cart/add') }}?quantity=1&productID={{ $product['id'] }}" 
                        class="btn btn-primary">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</body>

</html>
