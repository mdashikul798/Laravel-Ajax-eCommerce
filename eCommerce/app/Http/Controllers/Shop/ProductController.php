<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetails(){
        $productId = $_GET['id'];
        $product = Product::find($productId);
        $row = $product;

        $output = '';
        $output .= '
        <div class="main-view modal-content">
        <div class="modal-footer" data-dismiss="modal">
            <span>x</span>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-4">
                <div class="quick-image">
                    <div class="single-quick-image text-center">
                        <div class="list-img">
                            <div class="product-img tab-content">

                                <div class="simpleLens-container tab-pane active fade in" id="q-sin-b">
                                    <div class="pro-type">
                                        <span>'.$row['tag'].'</span>
                                    </div>
                                    <a class="simpleLens-image" href="#">
                                        <img src='.asset('public/uploads/product/'.$row['img_url']).' alt="" class="simpleLens-big-image"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-8">
                <div class="quick-right">
                    <div class="list-text">
                        <h3>'.$row['product_name'].'</h3>
                        <span>'.$row['sub_title'].'</span>
                        <div class="ratting floatright">
                            <p>( 27 Rating )</p>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star"></i>
                            <i class="mdi mdi-star-half"></i>
                            <i class="mdi mdi-star-outline"></i>
                        </div>
                        <h5>'.number_format($row['price']).'</h5>
                        <p>'.$row['description'].'</p>
                        <div class="all-choose">
                            <div class="s-shoose">
                                <h5>size</h5>
                                <select class="product_size">
                                    <option value="">Sellect...</option>
                                    <option value="Xl">Xl</option>
                                    <option value="SL">SL</option>
                                    <option value="S">S</option>
                                    <option value="L">L</option>
                                </select>
                            </div>
                            <div class="s-shoose">
                                <h5>qty</h5>
                                <form action="#" method="POST">
                                    <div class="plus-minus">
                                        <a class="dec qtybutton">-</a>
                                        <input type="text" value="1" name="qtybutton" class="plus-minus-box">
                                        <a class="inc qtybutton">+</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="list-btn">
                            <a href="#">add to cart</a>
                            <a href="#">wishlist</a>
                            <a href="#" data-toggle="modal" data-target="#quick-view">zoom</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
       return response($output);
    }

    public function productPriceRange(Request $request){
        // $filter = DB::table('products')
        // ->whereBetween('price',
        //  [$request->input('min'), $request->input('max')])
        // ->get();

        // return view('shop.home', compact('filter'));
    }



}
