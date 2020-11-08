@extends('shop.layouts.app')
    @section('content')
    @include('shop.partials.slider')
    <!-- product-grid-view content section start -->
    <section class="pages products-page section-padding-bottom">
        <div class="container">
            <div class="row">
                @include('shop.partials.left_sidebar')
                <div class="col-xs-12 col-sm-8 col-md-9 mt-5">
                    <div class="right-products">
                        <div class="row">
                            <div class="tab-content grid-content">
                                <div class="tab-pane fade in active text-center" id="grid">
                                    <!-- single product -->
                                    @foreach($allProduct as $product)
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <div class="pro-type">
                                                    <span>{{ $product->tag }}</span>
                                                </div>
                                                <a href="#"><img src="{{ asset('public/uploads/product/' .$product->img_url) }}" alt="{{ $product->product_name }}" width=100%/></a>
                                                <div class="actions-btn">
                                                    <a href="#" id="add_to_cart" data-cart_id="{{ $product->id }}"><i class="mdi mdi-cart"></i></a>
                                                    <a href="#" data-toggle="modal" data-prodetails="{{ $product->id }}" id="prodetails_view" data-target="#quick-view"><i class="mdi mdi-eye"></i></a>
                                                    <a href="#"><i class="mdi mdi-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-dsc">
                                                <p><a href="{{ asset('public/component/shop') }}/#">{{ $product->product_name }}</a></p>
                                                <div class="ratting">
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star-half"></i>
                                                    <i class="mdi mdi-star-outline"></i>
                                                </div>
                                                <span>{{ number_format($product->price) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- single product end -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="pagnation-ul">
                                    <ul class="clearfix">
                                        <li><a href="{{ asset('public/component/shop') }}/#"><i class="mdi mdi-menu-left"></i></a></li>
                                        <li><a href="{{ asset('public/component/shop') }}/#">1</a></li>
                                        <li><a href="{{ asset('public/component/shop') }}/#">2</a></li>
                                        <li><a href="{{ asset('public/component/shop') }}/#">3</a></li>
                                        <li><a href="{{ asset('public/component/shop') }}/#">4</a></li>
                                        <li><a href="{{ asset('public/component/shop') }}/#">5</a></li>
                                        <li><a href="{{ asset('public/component/shop') }}/#">...</a></li>
                                        <li><a href="{{ asset('public/component/shop') }}/#">10</a></li>
                                        <li><a href="{{ asset('public/component/shop') }}/#"><i class="mdi mdi-menu-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-grid-view content section end -->


    @endsection


