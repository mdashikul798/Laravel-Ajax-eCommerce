@extends('shop.layouts.app')
@section('content')
<section class="pages checkout section-padding">
    <div class="container">
        <div class="row">
            <form action="{{ route('complete.payment') }}" method="post" class="require-validation" data-cc-on-file="false"
            data-stripe-publishable-key="STRIPE_API_KEY_WOULD_BE_HERE"
            id="payment-form">
                <div class="col-sm-6">
                    <div class="main-input single-cart-form padding60">
                        <div class="log-title">
                            <h3><strong>shipping details</strong></h3>
                        </div>
                        <div class="custom-input">

                            <input type="text" name="name" placeholder="Your name" required>
                            <input type="number" name="phone" placeholder="Enter your phone number" required>
                            <input type="text" name="district" placeholder="Enter your district" required>
                            <div class="custom-mess">
                                <textarea rows="2" placeholder="Your address here" name="address" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="main-input single-cart-form padding60">
                        <div class="log-title">
                            @php
                                $subTotal = Session::get('cart')->totalPrice;
                                $vat = (Session::get('cart')->totalPrice / 100) * 5;
                                $shipping = (Session::get('cart')->totalPrice / 100) * 2;
                            @endphp
                            <h3><strong>Stripe Payment Details</strong> <span class="tfoot">( total : {{ number_format($subTotal + $vat + $shipping) }} )</span></h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                              <label for="cc-name">Name on card</label>
                              <input type="text" name="card_name" class="form-control" id="card-name" placeholder="Name on card is required" required>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <label for="cc-number">Credit card number</label>
                              <input type="text" name="card_number" class="form-control" id="card_number" placeholder="Credit card number is required" required>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-6 fom">
                              <label for="cc-expiration">Expiration</label>
                              <input type="text" name="exp_year" class="form-control" id="exp_year" placeholder=" YYYY" required>
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <label for="cc-expiration"></label>
                              <input style="margin-top:8px;" type="text" name="exp_month" class=" form-control" id="exp_month" placeholder=" MM" required>
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <label for="cc-expiration">CVV</label>
                              <input type="text" name="card_cvc" class="form-control" id="card_cvc" placeholder="" required="">
                              <div class="invalid-feedback">
                                Security code required
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit-text pull-right">
                    <button type="submit" class="mdi mdi-cart" style="margin:5px;margin-right:5px;"> Buy Now </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
