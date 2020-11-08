@if(Session::has('cart'))
    <div class="submit-text">
        <a href="{{ route('cart.checkout') }}" class="btn pull-right">Check Out</a>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive padding60">
                <table class="wishlist-table text-center">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td class="td-img text-left">
                                <a href="#"><img src="{{ asset('public/uploads/product/' . $product['item']['img_url']) }}" alt="Add Product"></a>
                                <div class="items-dsc">
                                    <h5><a href="#">{{ $product['item']['product_name'] }}</a></h5>
                                </div>
                            </td>
                            <td>{{ number_format($product['item']['price']) }}</td>
                            <td>
                                <form action="#" method="POST">
                                    <div class="plus-minus">
                                        <a href="#" id="qty_decrease" data-qty_dec_id="{{ $product['item']['id'] }}" class="dec qtybutton">-</a>
                                        <input type="text" value="{{ $product['qty'] }}" name="qtybutton" class="plus-minus-box">
                                        <a href="#" id="qty_increase" data-qty_inc_id="{{ $product['item']['id'] }}" class="inc qtybutton">+</a>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <strong>{{ number_format($product['price']) }}</strong>
                            </td>
                            <td>
                                <a id="cancle_product" data-pro_cancle_id="{{ $product['item']['id'] }}"><i class="mdi mdi-close" title="Remove this product"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row margin-top">
        <div class="col-sm-6">
            <div class="single-cart-form padding60">
                <div class="log-title">
                    <h3><strong>coupon discount</strong></h3>
                </div>
                <div class="cart-form-text custom-input">
                    <p>Enter your coupon code if you have one!</p>
                    <form action="mail.php" method="post">
                        <input type="text" name="subject" placeholder="Enter your code here...">
                        <div class="submit-text coupon">
                            <button type="submit">apply coupon </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="single-cart-form padding60">
                <div class="log-title">
                    <h3><strong>payment details</strong></h3>
                </div>
                <div class="cart-form-text pay-details table-responsive">
                    <table>
                        <tbody>
                            <tr>
                                <th>Cart Subtotal</th>
                                <td>{{ number_format($totalPrice) }}</td>
                            </tr>
                            <tr>
                                @php
                                    $subTotal = $totalPrice;
                                    $shipping = ($totalPrice / 100) * 2;
                                    $vat = ($totalPrice / 100) * 5;
                                    $orderTotal = $subTotal + $shipping + $vat;
                                @endphp
                                <th>Shipping and Handing ( 2% )</th>
                                <td>{{ number_format($shipping) }}</td>
                            </tr>
                            <tr>
                                <th>Vat ( 5% )</th>
                                <td>{{ number_format($vat) }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="tfoot-padd">Order total</th>
                                <td class="tfoot-padd">{{ number_format($orderTotal) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @else
    <h3>No item is added</h3>
@endif
