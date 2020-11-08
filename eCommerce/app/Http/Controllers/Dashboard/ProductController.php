<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard\Product;
use App\Models\Dashboard\ProductOtherColor;
use DB;
use Validator;

class ProductController extends Controller
{
    public function index(){
        //$allProduct = Product::orderBy('id', 'DESC')->where('status', '1')->get();

        $allProduct = DB::table('products')->orderBy('id', 'DESC')
                ->leftjoin('categories', 'products.category_id', '=', 'categories.id')
                ->leftjoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
                ->leftjoin('brands', 'products.brand_id', '=', 'brands.id')
                ->select('products.*', 'categories.category_name', 'sub_categories.sub_category', 'brands.name as brand')
                ->get();
        return view('dashboard.pages.product', compact('allProduct'));
    }
    public function saveProduct(Request $request){
        $request->validate([
            'product_image' => 'required',
            'product_name' => 'required|unique:products',
            'price' => 'required|numeric',
            'category' => 'required',
            'sub_category' => 'required',
            'brand' => 'required'
        ]);

        try{
            $image = $request->file('product_image');
            $fileExt = $image->getClientOriginalExtension();
            $fileName = date('ymdhis.') . $fileExt;
            $image->move(public_path('uploads/product/'), $fileName);

            $product = new Product();
            $product->product_name = $request->product_name;
            $product->sub_title = $request->sub_title;
            $product->price = $request->price;
            $product->category_id = $request->category;
            $product->sub_category_id = $request->sub_category;
            $product->tag = $request->tag;
            $product->brand_id = $request->brand;
            $product->img_url = $fileName;
            $product->description = $request->description;
            $product->save();
            if($product){
                echo 1;
            }else{
                echo 0;
            }
        }catch(\Exception $e){
            return $e->getMessage();
        }

        return redirect('dashboard/manage-product')->with('success', 'Data saved successfully!');
    }

    public function editProduct(Request $request, $id){
        $products = Product::find($id);
        return view('dashboard.pages.edit_product', compact('products'));

    }

    public function updateProduct(Request $request){
        $request->validate([
            'product_name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'sub_category' => 'required',
            'brand' => 'required'
        ]);
        try{
            $id = $request->productId;
            $product = Product::find($id);

            $newImg = $request->product_image;
            if($newImg){
                $imageUrl = $product->img_url;
                $uploadedImg = 'public/uploads/product/' . $imageUrl;
                unlink($uploadedImg);
                //image processing
                $image = $request->file('product_image');
                $fileExt = $image->getClientOriginalExtension();
                $fileName = date('ymdhis.') . $fileExt;
                $image->move(public_path('uploads/product/'), $fileName);

                $product->product_name = $request->product_name;
                $product->sub_title = $request->sub_title;
                $product->price = $request->price;
                $product->category_id = $request->category;
                $product->sub_category_id = $request->sub_category;
                $product->tag = $request->tag;
                $product->brand_id = $request->brand;
                $product->img_url = $fileName;
                $product->description = $request->description;
                $product->update();
            }else{
                $product->product_name = $request->product_name;
                $product->sub_title = $request->sub_title;
                $product->price = $request->price;
                $product->category_id = $request->category;
                $product->sub_category_id = $request->sub_category;
                $product->tag = $request->tag;
                $product->brand_id = $request->brand;
                $product->description = $request->description;
                $product->update();
            }
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
        return redirect('dashboard/manage-product')->with('success', 'Data updated successfully');
    }

    public function productStatus($id, $status){
        $proStatus = Product::find($id);
        $proStatus->status = $status;
        $proStatus->update();
    }

    public function deleteProduct(){
        $proId = $_POST['id'];
        $product = Product::find($proId);
        $imageUrl = $product->img_url;

        $uploadedImg = 'public/uploads/product/' . $imageUrl;
        unlink($uploadedImg);
        $product->delete();

        if($product){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function addSameProduct(Request $request){
        $request->validate([
            'product_image' => 'required'
        ]);
        $image = $request->file('product_image');
        $fileExt = $image->getClientOriginalExtension();
        $fileName = date('ymdhis.') . $fileExt;
        $image->move(public_path('uploads/product/'), $fileName);

        $otherProduct = new ProductOtherColor();
        $otherProduct->product_id = $request->main_pro_id;
        $otherProduct->same_product_url = $fileName;
        $otherProduct->color = $request->product_color;

        $otherProduct->save();
        return redirect()->back()->with('success', ' Product added successfully');
    }

    public function deleteSameProduct($id){
        $product = ProductOtherColor::find($id);
        $imageUrl = $product->same_product_url;

        $uploadedImg = 'public/uploads/product/' . $imageUrl;
        unlink($uploadedImg);
        $product->delete();
        return back();
    }

}
