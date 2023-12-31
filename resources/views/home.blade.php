@extends('layouts')

@section('content')
    <!--slide banner section start-->
    <div class="hero_banner_section hero_banner2 d-flex align-items-center mb-60"
        data-bgimg="{{ asset('/') }}assets/img/demo-bg.jpg">
        <div class="container">
            <div class="hero_banner_inner">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero_content hero_content2">
                            <h3 class="wow fadeInUp text-white" data-wow-delay="0.1s" data-wow-duration="1.1s"> Up To
                                Sale <span> 50% Off</span> </h3>
                            <h1 class="wow fadeInUp text-white" data-wow-delay="0.2s" data-wow-duration="1.2s">We
                                Bake
                                With <br>
                                Pasion.</h1>
                            <a class="btn btn-link wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s"
                                href="{{ route('products') }}">Belanja Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--slider area end-->

    <!-- featured banner section start -->
    <div class="featured_banner_section mb-100">
        <div class="container-fluid">
            <div class="row featured_banner_inner slick__activation"
                data-slick='{
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "arrows": true,
                "dots": false,
                "autoplay": false,
                "speed": 300,
                "infinite": true ,  
                "responsive":[ 
                  {"breakpoint":768, "settings": { "slidesToShow": 2 } }, 
                  {"breakpoint":500, "settings": { "slidesToShow": 1 } }  
                 ]                                                     
            }'>
                <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <div class="featured_banner_thumb">
                            <a href="shop-left-sidebar.html"><img src="{{ asset('/') }}assets/img/cake.jpg"
                                    alt="" style="width: 550px; height: 340px"></a>
                        </div>
                        <div class="featured_banner_text d-flex justify-content-between align-items-center">
                            <h3><a href="shop-left-sidebar.html">Kue</a></h3>
                            <span>(39)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                        <div class="featured_banner_thumb">
                            <a href="shop-left-sidebar.html"><img src="{{ asset('/') }}assets/img/bread.jpg"
                                    alt="" style="width: 550px !important; height: 340px !important"></a>
                        </div>
                        <div class="featured_banner_text d-flex justify-content-between align-items-center">
                            <h3><a href="shop-left-sidebar.html">Roti</a></h3>
                            <span>(23)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                        <div class="featured_banner_thumb">
                            <a href="shop-left-sidebar.html"><img src="{{ asset('/') }}assets/img/mochi.jpg"
                                    alt="" style="width: 550px; height: 340px"></a>
                        </div>
                        <div class="featured_banner_text d-flex justify-content-between align-items-center">
                            <h3><a href="shop-left-sidebar.html">Mochi</a></h3>
                            <span>(17)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                        <div class="featured_banner_thumb">
                            <a href="shop-left-sidebar.html"><img
                                    src="{{ asset('/') }}assets/img/bg/featured-banner1.png" alt=""></a>
                        </div>
                        <div class="featured_banner_text d-flex justify-content-between align-items-center">
                            <h3><a href="shop-left-sidebar.html">Pastry</a></h3>
                            <span>(39)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured banner section end -->

    <!-- product section start -->
    <div class="product_section mb-80 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
        <div class="container">
            <div class="product_header">
                <div class="section_title text-center">
                    <h2>Produk Omama</h2>
                </div>
                <div class="product_tab_button">
                    <ul class="nav justify-content-center" role="tablist" id="nav-tab">
                        <li>
                            <a class="active" data-toggle="tab" href="#kue" role="tab" aria-controls="kue"
                                aria-selected="false">Kue</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#roti" role="tab" aria-controls="roti" aria-selected="false">
                                Roti</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#mochi" role="tab" aria-controls="mochi"
                                aria-selected="false">Mochi</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content product_container">
                <div class="tab-pane fade show active" id="kue" role="tabpanel">
                    <div class="product_gallery">
                        <div class="row">
                            @foreach ($data as $d)
                                @if ($d->category->name == 'Kue')
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="#"><img src="{{ asset('storage/' . $d->product_pict) }}"
                                                            alt=""></a>
                                                </div>
                                                <figcaption class="product_content text-center">
                                                    <h4><a
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
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="roti" role="tabpanel">
                    <div class="product_gallery">
                        <div class="row">
                            @foreach ($data as $d)
                                @if ($d->category->name == 'Roti')
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('storage/' . $d->product_pict) }}"
                                                            alt=""></a>
                                                </div>
                                                <figcaption class="product_content text-center">
                                                    <h4><a
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
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="mochi" role="tabpanel">
                    <div class="product_gallery">
                        <div class="row">
                            @foreach ($data as $d)
                                @if ($d->category->name == 'Mochi')
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('storage/' . $d->product_pict) }}"
                                                            alt=""></a>
                                                </div>
                                                <figcaption class="product_content text-center">
                                                    <h4><a
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
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product section end -->

    <!-- product section start -->
    <div class="product_section mb-80 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
        <div class="container">
            <div class="section_title text-center mb-55">
                <h2>Best Seller</h2>
                <p>Produk Best Seller Favorit Customer Omama Bakery!</p>
            </div>
            <div class="row product_slick slick_navigation slick__activation"
                data-slick='{
                "slidesToShow": 4,
                "slidesToScroll": 1,
                "arrows": true,
                "dots": false,
                "autoplay": false,
                "speed": 300,
                "infinite": true ,  
                "responsive":[ 
                  {"breakpoint":992, "settings": { "slidesToShow": 3 } }, 
                  {"breakpoint":768, "settings": { "slidesToShow": 2 } }, 
                  {"breakpoint":500, "settings": { "slidesToShow": 1 } }  
                 ]                                                     
            }'>
                @foreach ($data as $d)
                    @if ($d->is_best_seller == 'ya')
                        <div class="col-lg-3">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a href="{{ route('products.show', $d->slug) }}"><img
                                                src="{{ asset('storage/' . $d->product_pict) }}" alt=""></a>
                                    </div>
                                    <figcaption class="product_content text-center">
                                        <h4><a href="{{ route('products.show', $d->slug) }}">{{ $d->name }}</a></h4>
                                        <div class="price_box">
                                            <span class="current_price">Rp. {{ number_format($d->price) }}</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- product section end -->
@endsection
