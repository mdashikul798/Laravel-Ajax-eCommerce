<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Product;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(Request $request){
        //product search by price range
        $min = $request->input('min');
        if ($request->ajax() && isset($min)) {
            $start = $request->input('min'); // min price value
            $end = $request->input('max'); // max price value
            $allProduct = DB::table('products')
                    ->where('price', '>=', $start)
                    ->where('price', '<=', $end)
                    ->orderby('price', 'ASC')
                    ->paginate(6);
            response()->json($allProduct); //return to ajax
            return view('shop.partials.product_search', compact('allProduct'));
        }
        //product search by brand
        else if(isset($request->brand)){
            $brand = $request->brand;
            $allProduct = DB::table('products')
                ->where('brand_id', $brand)
                ->paginate(6);
            $brd = Product::find($brand);
            if($brd){ //checking, is the brand->id is exist/not
                response()->json($allProduct); //return to ajax
                return view('shop.partials.product_search', compact('allProduct'));
            }else{
                echo '<h4>No record found</h4>';
            }
        }
        //product search by sub-category
        else if(isset($request->subCategory)){
            $subCategory = $request->subCategory;
            $allProduct = DB::table('products')
                ->where('sub_category_id', $subCategory)
                ->paginate(6);
            $cate = Product::find($subCategory);
            if($cate){
                response()->json($allProduct); //return to ajax
                return view('shop.partials.product_search', compact('allProduct'));
            }
            else{
                $output = '<h4>No record found</h4>';
                echo $output;
            }
        }
        else {
            $allProduct = DB::table('products')->paginate(6); // now we are fetching all products
            return view('shop.home', compact('allProduct'));
        }

    }

}
