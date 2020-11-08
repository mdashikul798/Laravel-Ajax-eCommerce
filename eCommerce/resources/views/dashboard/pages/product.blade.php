@extends('dashboard.layouts.app')
@section('content')
<section class="content-header">
   <div class="header-icon">
      <i class="fa fa-product-hunt"></i>
   </div>
   <div class="header-title">
      <h1>Add Product</h1>
      <small>The product you want to store</small>
   </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
       <div class="col-sm-6">
          @include('dashboard.inc.message')
       </div>
       <div class="col-sm-12">
          <div class="panel lobidisable panel-bd">
             <div class="panel-heading">
                <div class="panel-title">
                   <h4>Product</h4>
                </div>
             </div>
             <div class="panel-body">
             <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="btn-group">
                <div class="buttonexport" id="buttonlist">
                   <a class="btn btn-add" href="#" data-toggle="modal" data-target="#addcustom"> <i class="fa fa-plus"></i> Add new Product
                   </a>
                </div>
                </div>
                <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="table-responsive">
                   <table id="product_table" class="table table-bordered table-striped table-hover">
                      <thead>
                         <tr>
                            <th>Image</th>
                            <th>Product Title</th>
                            <th>Sub Title</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Sub-Category</th>
                            <th>Brand</th>
                            <th>Status</th>
                            <th>Action</th>
                         </tr>
                      </thead>
                      <tbody>
                          @foreach($allProduct as $product)
                         <tr>
                            <td width="80px">
                                <img id="product_img" src="{{ asset('public/uploads/product/'.$product->img_url) }}" alt="" width="90%" height="60px">
                            </td>
                            <td style="display:none;">{{ $product->id }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->sub_title }}</td>
                            <td>TK. {{ number_format($product->price) }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->sub_category }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>
                                <input {{ $product->status ==1 ? 'checked' : '' }} id="product_status" data-pro_status='{{ $product->id }}' class='toggle-class' type='checkbox' data-onstyle='success' data-offstyle='danger' data-toggle='toggle' data-on='Active' data-off='InActive' data-size="mini">
                            </td>
                            <td>
                                <a href="#" data-product_id="{{ $product->id }}" id="same_product_btn" data-toggle="modal" data-target="#same_product_form" title="Add other color of this product" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></a>

                                <a href="{{ route('edit.product', $product->id) }}" title="Edit product" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>

                                <a href="#" class="btn btn-danger btn-sm" title="Delete product" data-pro_id="{{ $product->id }}" id="delete_product"><i class="fa fa-trash"></i></a>

                            </td>
                         </tr>
                         @endforeach
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- ADD Product Modal1 -->
    <div class="modal fade" id="addcustom" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header modal-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3><i class="fa fa-product-hunt m-r-5"></i> Add New Product</h3>
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

                      <form class="form-horizontal" action="{{ route('save.product') }}" method="POST" enctype="multipart/form-data" id="product_form">
                         @csrf
                         <fieldset>
                            <!-- Text input-->
                            <div class="col-md-12 form-group">
                                <div class="col-md-7">
                                    <label class="control-label">Product Title:</label>
                                    <input type="text" name="product_name" placeholder="Enter Product Name" class="form-control" required>
                                </div>
                                <div class="col-md-5">
                                    <label class="control-label">Sub-Title:</label>
                                    <input type="text" name="sub_title" placeholder="Enter Product Sub-Title" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                               <div class="col-md-4">
                                    <label class="control-label">Product Price:</label>
                                    <input type="number" name="price" placeholder="Enter Product Name" class="form-control" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="control-label">Select Category:</label>
                                    <select name="category" class="form-control" required>
                                        <option value="">Select...</option>
                                        @foreach($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                 </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-7">
                                    <label class="control-label">Select Sub-Category:</label>
                                    <select name="sub_category" class="form-control" required>
                                        <option value="">Select...</option>
                                        @foreach($sub_cates as $sub)
                                            <option value="{{ $sub->id }}">{{ $sub->sub_category }}</option>
                                        @endforeach
                                    </select>
                                 </div>
                                 <div class="col-md-5">
                                    <label class="control-label">Add Tag (optional):</label>
                                    <select name="tag" class="form-control" required>
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
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="file">Product Image...</label>
                                    <input type="file" name="product_image"  required/>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                               <label class="control-label">Description (optional)</label>
                               <textarea name="description" class="form-control" cols="55" rows="6"></textarea>
                            </div>


                            <div class="col-md-12 form-group user-form-group">
                               <div class="pull-right">
                                  <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Cancel</button>
                                  <button type="submit" class="btn btn-add btn-sm" id="save_product">Save</button>
                               </div>
                            </div>
                         </fieldset>
                      </form>
                   </div>
                </div>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
             </div>
          </div>
          <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
    </div>
    <!-- /.Add product modal -->

    <!-- ADD same Product Modal1 -->
    <div class="modal fade" id="same_product_form" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
              <div class="modal-header modal-header-primary">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h3><i class="fa fa-product-hunt m-r-5"></i> Add other color of same product</h3>
              </div>
              <div class="modal-body">
                 <div class="row">
                    <div class="col-md-12">
                       <form class="form-horizontal" action="{{ route('add.same.product') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <fieldset>
                            <input type="hidden" id="pro_id" name="main_pro_id">
                             <!-- Text input-->
                             <div class="col-md-12 form-group">
                                 <div class="col-md-8">
                                     <label class="control-label">Add product image:</label>
                                     <input type="file" name="product_image"  required/>
                                 </div>
                             </div>
                             <div class="col-md-12 form-group">
                                <label class="control-label">Product color:</label>
                                <div class="product_color_list">
                                    <label class="product_color">
                                        <input type="radio" value="lightgray" name="product_color">
                                        <span class="checkmark" style="background-color:lightgray" title="lightgray"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="darkgray" name="product_color">
                                        <span class="checkmark" style="background-color:darkgray" title="darkgray"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="gray" name="product_color">
                                        <span class="checkmark" style="background-color:gray" title="gray"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="slategray" name="product_color">
                                        <span class="checkmark" style="background-color:slategray" title="slategray"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="darkslategray" name="product_color">
                                        <span class="checkmark" style="background-color:darkslategray" title="darkslategray"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="black" name="product_color">
                                        <span class="checkmark" style="background-color:black" title="black"></span>
                                      </label>
                                    <label class="product_color">
                                        <input type="radio" value="white" name="product_color">
                                        <span class="checkmark" style="background-color:rgb(241, 236, 236)" title="white"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="lightyellow" name="product_color">
                                        <span class="checkmark" style="background-color:moccasin" title="lightyellow"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="yellow" name="product_color">
                                        <span class="checkmark" style="background-color:yellow" title="yellow"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="gold" name="product_color">
                                        <span class="checkmark" style="background-color:gold" title="gold"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="coral" name="product_color">
                                        <span class="checkmark" style="background-color:coral" title="coral"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="darkorange" name="product_color">
                                        <span class="checkmark" style="background-color:darkorange" title="darkorange"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="salmon" name="product_color">
                                        <span class="checkmark" style="background-color:salmon" title="salmon"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="orangered" name="product_color">
                                        <span class="checkmark" style="background-color:orangered" title="orangered"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="red" name="product_color">
                                        <span class="checkmark" style="background-color:red" title="red"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="darkred" name="product_color">
                                        <span class="checkmark" style="background-color:darkred" title="darkred"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="olivedrab" name="product_color">
                                        <span class="checkmark" style="background-color:olivedrab" title="olivedrab"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="olive" name="product_color">
                                        <span class="checkmark" style="background-color:olive" title="olive"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="lawngreen" name="product_color">
                                        <span class="checkmark" style="background-color:lawngreen" title="lawngreen"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="limegreen" name="product_color">
                                        <span class="checkmark" style="background-color:limegreen" title="limegreen"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="seagreen" name="product_color">
                                        <span class="checkmark" style="background-color:seagreen" title="seagreen"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="green" name="product_color">
                                        <span class="checkmark" style="background-color:green" title="green"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="aqua" name="product_color">
                                        <span class="checkmark" style="background-color:aqua" title="aqua"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="darkturquoise" name="product_color">
                                        <span class="checkmark" style="background-color:darkturquoise" title="darkturquoise"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="cadetblue" name="product_color">
                                        <span class="checkmark" style="background-color:cadetblue" title="cadetblue"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="teal" name="product_color">
                                        <span class="checkmark" style="background-color:teal" title="teal"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="lightblue" name="product_color">
                                        <span class="checkmark" style="background-color:lightblue" title="lightblue"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="skyblue" name="product_color">
                                        <span class="checkmark" style="background-color:skyblue" title="skyblue"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="deepskyblue" name="product_color">
                                        <span class="checkmark" style="background-color:dodgerblue" title="deepskyblue"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="royalblue" name="product_color">
                                        <span class="checkmark" style="background-color:royalblue" title="royalblue"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="blue" name="product_color">
                                        <span class="checkmark" style="background-color:blue" title="blue"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="navy" name="product_color">
                                        <span class="checkmark" style="background-color:navy" title="navy"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="slateblue" name="product_color">
                                        <span class="checkmark" style="background-color:darkslateblue" title="slateblue"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="violet" name="product_color">
                                        <span class="checkmark" style="background-color:violet" title="violet"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="magenta" name="product_color">
                                        <span class="checkmark" style="background-color:magenta" title="magenta"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="blueviolet" name="product_color">
                                        <span class="checkmark" style="background-color:blueviolet" title="blueviolet"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="purple" name="product_color">
                                        <span class="checkmark" style="background-color:purple" title="purple"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="indigo" name="product_color">
                                        <span class="checkmark" style="background-color:indigo" title="indigo"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="pink" name="product_color">
                                        <span class="checkmark" style="background-color:pink" title="pink"></span>
                                      </label>
                                      <label class="product_color">
                                        <input type="radio" value="hotpink" name="product_color">
                                        <span class="checkmark" style="background-color:hotpink" title="hotpink"></span>
                                      </label>
                                </div>
                             </div>
                          </fieldset>
                          <br><br>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-add pull-left">Save</button>
                          </div>
                       </form>
                    </div>
                 </div>
              </div>

           </div>
           <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
     </div>
     <!-- /.modal -->

 </section>
 <!-- /.content -->
@endsection
