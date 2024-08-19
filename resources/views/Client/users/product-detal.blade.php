@extends('Client.layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')

    <div class="main_content_iner overly_inner">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">
                                Product Details
                            </h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Salessa
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Product Details
                                </li>
                            </ol>
                        </div>
                        <a href="#" class="white_btn3">Create Report</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="white_card position-relative mb_20">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 align-self-center">
                                    <img src=" {{ \Storage::url($products->img_thumbnail) }}" alt
                                        class="mx-auto d-block sm_w_100" height="300" />
                                </div>

                                <div class="col-lg-6 align-self-center">
                                    <div class="single-pro-detail">
                                        <p class="mb-1">{{ $products->catelogue->name }}</p>
                                        <div class="custom-border mb-3"></div>
                                        <h3 class="pro-title">
                                            {{ $products->name }}
                                        </h3>


                                        <h2 class="pro-price">
                                            {{ $products->price_regular }}
                                            <span><del>{{ $products->price_sale }}</del></span><span
                                                class="text-danger fw-bold ms-2"> Đồng
                                            </span>
                                        </h2>
                                        <h6 class="text-muted font_s_13 mt-2 mb-1">
                                            Features :
                                        </h6>
                                        <ul class="list-unstyled pro-features border-0">
                                            <li>
                                                It is a long established
                                                fact that a reader will
                                                be distracted.
                                            </li>
                                            <li>
                                                Contrary to popular
                                                belief, Lorem Ipsum is
                                                not text.
                                            </li>
                                        </ul>
                                        <form action="{{ route('client.cart') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id_product" value="{{ $products->id }}">
                                            <div class="quantity mt-3">
                                                <input class="form-control form-control-sm" type="number" min="1"
                                                    value="1" id="example-number-input" name=quantity />
                                            </div>
                                          
                                            <button type="submit" class="btn green_bg  px-4 mt-5"> <i
                                                    class="fa fa-cart-plus me-2"></i>Add to Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white_card position-relative mb_20">
                        <div class="card-body">
                            <h5 class="mt-0">Mô tả</h5>
                            <p class="text-muted mb-3 font_s_14">
                                {{ $products->content }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                        <div class="col-md-3">
                            <div class="white_card position-relative mb_20">
                                <div class="card-body">
                                    <div class="ribbon1 rib1-primary">
                                        <span
                                            class="text-white text-center rib1-primary"
                                            >50% off</span
                                        >
                                    </div>
                                    <img
                                        src="img/products/img-5.png"
                                        alt
                                        class="d-block mx-auto my-4"
                                        height="150"
                                    />
                                    <div class="row my-4">
                                        <div class="col">
                                            <span class="badge_btn_3 mb-1"
                                                >Life Style</span
                                            >
                                            <a
                                                href="#"
                                                class="f_w_400 color_text_3 f_s_14 d-block"
                                                >Unique Blue Bag</a
                                            >
                                        </div>
                                        <div class="col-auto">
                                            <h4 class="text-dark mt-0">
                                                $49.00
                                                <small
                                                    class="text-muted font_s_14"
                                                    ><del>$99.00</del></small
                                                >
                                            </h4>
                                            <ul
                                                class="list-inline mb-0 product-review align-self-center"
                                            >
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star-half text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn_2">
                                            Add To Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="white_card position-relative mb_20">
                                <div class="card-body">
                                    <div class="ribbon1 rib1-primary">
                                        <span
                                            class="text-white text-center rib1-primary"
                                            >50% off</span
                                        >
                                    </div>
                                    <img
                                        src="img/products/img-2.png"
                                        alt
                                        class="d-block mx-auto my-4"
                                        height="150"
                                    />
                                    <div class="row my-4">
                                        <div class="col">
                                            <span class="badge_btn_3 mb-1"
                                                >Life Style</span
                                            >
                                            <a
                                                href="#"
                                                class="f_w_400 color_text_3 f_s_14 d-block"
                                                >Unique Blue Bag</a
                                            >
                                        </div>
                                        <div class="col-auto">
                                            <h4 class="text-dark mt-0">
                                                $49.00
                                                <small
                                                    class="text-muted font_s_14"
                                                    ><del>$99.00</del></small
                                                >
                                            </h4>
                                            <ul
                                                class="list-inline mb-0 product-review align-self-center"
                                            >
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star-half text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn_2">
                                            Add To Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="white_card position-relative mb_20">
                                <div class="card-body">
                                    <div class="ribbon1 rib1-primary">
                                        <span
                                            class="text-white text-center rib1-primary"
                                            >50% off</span
                                        >
                                    </div>
                                    <img
                                        src="img/products/02.png"
                                        alt
                                        class="d-block mx-auto my-4"
                                        height="150"
                                    />
                                    <div class="row my-4">
                                        <div class="col">
                                            <span class="badge_btn_3 mb-1"
                                                >Life Style</span
                                            >
                                            <a
                                                href="#"
                                                class="f_w_400 color_text_3 f_s_14 d-block"
                                                >Unique Blue Bag</a
                                            >
                                        </div>
                                        <div class="col-auto">
                                            <h4 class="text-dark mt-0">
                                                $49.00
                                                <small
                                                    class="text-muted font_s_14"
                                                    ><del>$99.00</del></small
                                                >
                                            </h4>
                                            <ul
                                                class="list-inline mb-0 product-review align-self-center"
                                            >
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star-half text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn_2">
                                            Add To Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="white_card position-relative mb_20">
                                <div class="card-body">
                                    <div class="ribbon1 rib1-primary">
                                        <span
                                            class="text-white text-center rib1-primary"
                                            >50% off</span
                                        >
                                    </div>
                                    <img
                                        src="img/products/img-1.png"
                                        alt
                                        class="d-block mx-auto my-4"
                                        height="150"
                                    />
                                    <div class="row my-4">
                                        <div class="col">
                                            <span class="badge_btn_3 mb-1"
                                                >Life Style</span
                                            >
                                            <a
                                                href="#"
                                                class="f_w_400 color_text_3 f_s_14 d-block"
                                                >Unique Blue Bag</a
                                            >
                                        </div>
                                        <div class="col-auto">
                                            <h4 class="text-dark mt-0">
                                                $49.00
                                                <small
                                                    class="text-muted font_s_14"
                                                    ><del>$99.00</del></small
                                                >
                                            </h4>
                                            <ul
                                                class="list-inline mb-0 product-review align-self-center"
                                            >
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i
                                                        class="fas fa-star-half text-warning font-16 ms-n2"
                                                    ></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn_2">
                                            Add To Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
        </div>
    </div>






    </html>
