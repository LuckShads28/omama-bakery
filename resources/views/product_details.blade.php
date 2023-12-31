@extends('layouts')

@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-100" data-bgimg="{{ asset('/') }}assets/img/others/breadcrumbs-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>Produk Omama Bakery</h1>
                        <ul>
                            <li><a href="{{ route('products') }}">Produk </a></li>
                            <li> // {{ $data->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->

    <!-- single product section start-->
    <div class="single_product_section mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single_product_gallery">
                        <img class="img-responsive" src="{{ asset('storage/' . $data->product_pict) }}" alt="Product Pict">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_details_sidebar">
                        <h2 class="product__title">{{ $data->name }}</h2>
                        <div class="price_box">
                            <span class="current_price">Rp. {{ number_format($data->price) }}</span>
                        </div>
                        <p class="product_details_desc">{{ $data->description }}</p>
                        <div class="product_pro_button quantity d-flex align-items-center">
                            <a class="add_to_cart ms-0" href="https://wa.me/+6212345678" target="_blank">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details section end-->
@endsection
