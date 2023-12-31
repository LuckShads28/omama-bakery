@extends('layouts')

@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-100" data-bgimg="assets/img/others/breadcrumbs-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>Produk Omama Bakery</h1>
                        <ul>
                            <li><a href="{{ route('home') }}">Home </a></li>
                            <li>// Produk</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->

    <!-- product page section start -->
    <div class="product_page_section mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_page_wrapper">
                        <!--shop toolbar area start-->
                        <div class="product_sidebar_header mb-60 d-flex justify-content-between align-items-center">
                            <div class="page__amount border">
                                <p><span>12</span> Product Found of <span>30</span></p>
                            </div>
                            <div class="product_header_right d-flex align-items-center">
                                <div class="sorting__by d-flex align-items-center">
                                    <span>Sort By : </span>
                                    <form class="select_option" action="#">
                                        <select name="orderby" id="short">
                                            <option selected value="1">Default</option>
                                            <option value="2">Sort by popularity</option>
                                            <option value="3">Sort by newness</option>
                                            <option value="4">low to high</option>
                                            <option value="5">high to low</option>
                                            <option value="6">Product Name: Z</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--shop toolbar area end-->

                        <!--shop gallery start-->
                        <div class="product_page_gallery">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="grid">
                                    <div class="row grid__product">
                                        @foreach ($data as $d)
                                            <div class="col-xl-3 col-md-4 col-sm-6">
                                                <article class="single_product wow fadeInUp" data-wow-delay="0.1s"
                                                    data-wow-duration="1.1s">
                                                    <figure>
                                                        <div class="product_thumb">
                                                            <a href="{{ route('products.show', $d->slug) }}"><img
                                                                    src="{{ asset('storage/' . $d->product_pict) }}"
                                                                    alt="" /></a>
                                                        </div>
                                                        <figcaption class="product_content text-center">
                                                            <h4>
                                                                <a
                                                                    href="{{ route('products.show', $d->slug) }}">{{ $d->name }}</a>
                                                            </h4>
                                                            <div class="price_box">
                                                                <span class="current_price">Rp.
                                                                    {{ number_format($d->price) }}</span>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ $data->links() }}
                        <div class="pagination poduct_pagination">
                            <ul>
                                <li class="current"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next">
                                    <a href="#"><i class="ion-chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!--shop gallery end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product page section end -->
@endsection
