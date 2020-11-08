@extends('dashboard.layouts.app')
@section('content')
<div class="modal-content">
    <div class="modal-header modal-header-primary">
       <h3><i class="fa fa-product-hunt m-r-5"></i> Edit Product</h3>
    </div>
    @include('dashboard.inc.message')
    <div class="modal-body">
       <div class="row">
          <div class="col-md-12">
              @php
                   use App\Models\Dashboard\Category;
                   use App\Models\Dashboard\SubCategory;
                   use App\Models\Dashboard\Brand;

                   $categorys = Category::orderBy('category_name')->where('status', '1')->get();
                   $sub_cates = SubCategory::orderBy('sub_category')->where('status', '1')->get();
                   $brands = Brand::orderBy('name')->where('status', '1')->get();
              @endphp

             <form class="form-horizontal" action="{{ route('update.product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <input type="hidden" value="{{ $products['id'] }}" name="productId">
                   <!-- Text input-->
                   <div class="col-md-12 form-group">
                        <div class="col-md-7 form-group">
                            <label class="control-label">Product Title:</label>
                            <input type="text" name="product_name" value="{{ $products['product_name'] }}" placeholder="Enter Product Name" class="form-control" required>
                        </div>
                        <div class="col-md-5 form-group">
                            <label class="control-label">Sub-Title:</label>
                            <input type="text" name="sub_title" value="{{ $products['sub_title'] }}" placeholder="Enter Product Sub-title" class="form-control">
                        </div>
                </div>
                   <div class="col-md-12 form-group">
                      <div class="col-md-4 form-group">
                           <label class="control-label">Product Price:</label>
                           <input type="number" name="price" value="{{ $products['price'] }}" placeholder="Enter Product Name" class="form-control" required>
                       </div>
                       <div class="col-md-8 form-group">
                           <label class="control-label">Select Category:</label>
                           <select name="category" class="form-control" required>
                               <option value="">Select...</option>
                               @foreach($categorys as $category)
                                   <option value="{{ $category->id }}" {{ $products->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                               @endforeach
                           </select>
                        </div>
                   </div>
                   <div class="col-md-12 form-group">
                       <div class="col-md-7 form-group">
                           <label class="control-label">Select Sub-Category:</label>
                           <select name="sub_category" class="form-control" required>
                               <option value="">Select...</option>
                               @foreach($sub_cates as $sub)
                                   <option value="{{ $sub->id }}" {{ $products->sub_category_id == $sub->id ? 'selected' : '' }}>{{ $sub->sub_category }}</option>
                               @endforeach
                           </select>
                        </div>
                        <div class="col-md-5">
                           <label class="control-label">Add Tag (optional):</label>
                           <select name="tag" class="form-control" required>
                               <option value="{{ $products['tag'] }}">{{ $products['tag'] }}</option>
                               <option value="">Select...</option>
                               <option value="New">New</option>
                               <option value="Sale">Sale</option>
                               <option value="Offer">Offer</option>
                           </select>
                        </div>
                    </div>
                   <div class="col-md-12 form-group">
                       <div class="col-md-7 form-group">
                           <label class="control-label">Select Brand:</label>
                           <select name="brand" class="form-control" required>
                               <option value="">Select...</option>
                               @foreach($brands as $brand)
                                   <option value="{{ $brand->id }}" {{ $products->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="col-md-5">
                           <div class="col-md-7">
                               <label for="product_image" class="control-label">Product Image:</label>
                               <input type="file" name="product_image"/>
                            </div>
                           <div class="col-md-5">
                            <img src="{{ asset('public/uploads/product/' . $products->img_url) }}" name="uploaded_img" width=80px; height=85px;>
                           </div>
                       </div>
                   </div>
                   @php
                        $otherProducts = $products->productOtherColor;
                   @endphp
                   @if(!empty($otherProducts))
                    <label class="control-label">Other product :</label>
                    <div class="col-md-12 form-group" id="other_same_product">
                        @foreach($otherProducts as $other)
                        <div class="other_img_content">
                            <img src="{{ asset('public/uploads/product/' . $other->same_product_url) }}" alt="Avatar" class="other_img" width=100px; height=110px;>
                            <div class="other_delete_content">
                              <div class="other_delete"><a href="{{ route('delete.same.product', $other->id) }}" id="other_product_delete"><i class='fa fa-trash fa-3x' style="color:#8a2020"></i></a></div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    @endif
                   <div class="col-md-12 form-group">
                      <label class="control-label">Description (optional)</label>
                      <textarea name="description" class="form-control" cols="55" rows="6">{{ $products['description'] }}</textarea>
                   </div>
                   <div class="col-md-12 form-group user-form-group">
                      <div class="pull-right">
                         <button type="submit" class="btn btn-add btn-lg" id="save_product">Save</button>
                      </div>
                   </div>
                </fieldset>
             </form>
          </div>
       </div>
    </div>
 </div>
 <br><br><br>

 <!-- /.modal-content -->
@endsection
