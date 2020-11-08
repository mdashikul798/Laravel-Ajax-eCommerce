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
