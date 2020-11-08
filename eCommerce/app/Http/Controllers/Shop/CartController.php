<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Product;
use App\Models\Shop\ShoppingCart;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function getAddToCart(Request $request){
        $id = $request->input('productId');
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new ShoppingCart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);

        return response()->json(Session::get('cart')->totalQty);
    }

    public function getShoppingCart(){
        if(!Session::has('cart')){
            return view('shop.pages.shopping-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new ShoppingCart($oldCart);
        return view('shop.pages.shopping-cart', ['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function addQtyByOne(Request $request){
        $id = $request->qty_increase;
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new ShoppingCart($oldCart);
    	$cart->addQtyByOne($id);
    	Session::put('cart', $cart);
    	return view('shop.partials.shoppingcart_update', ['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function reduceQtyByOne(Request $request){
        $id = $request->qty_decrease;
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new ShoppingCart($oldCart);
    	$cart->reduceQtyByOne($id);
    	if(count($cart->items) > 0){
    		Session::put('cart', $cart);
    	}else{
    		Session::forget('cart');
    	}

        return view('shop.partials.shoppingcart_update', ['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);

    }

    public function cancleProduct(Request $request){
        $cancil_id = $request->input('product_id');
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new ShoppingCart($oldCart);
        $cart->removeProduct($cancil_id);
        Session::put('cart', $cart);

        return view('shop.partials.shoppingcart_update', ['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function cartCheckout(){
        return view('shop.pages.payment_checkout');
    }

    public function completePayment(){
        return view('shop.pages.payment_checkout');
    }



}
