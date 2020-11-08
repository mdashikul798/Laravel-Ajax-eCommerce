@extends('dashboard.layouts.app')
@section('content')
<section class="content-header">
   <div class="header-icon">
      <i class="fa fa-list"></i>
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
                   <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                      <thead>
                         <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                         </tr>
                      </thead>
                      <tbody>
                         <tr>
                            <td width="90px">
                                <img src="" alt="" width="80px" height="60px">
                            </td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>
                                <input type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive" data-size="mini">
                            </td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
                            </td>
                         </tr>
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- ADD Modal1 -->
    <div class="modal fade" id="addcustom" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header modal-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3><i class="fa fa-product-hunt m-r-5"></i> Add New Product</h3>
             </div>
             <div class="modal-body">
                <div class="row">
                   <div class="col-md-12">
                      <form class="form-horizontal" method="post" action="#">
                         @csrf
                         <fieldset>
                            <!-- Text input-->
                            <div class="col-md-12 form-group">
                               <label class="control-label">Product Name:</label>
                               <input type="text" name="product" placeholder="Product Name" class="form-control">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="control-label">Select Category:</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select...</option>
                                </select>
                             </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-7 form-group">
                                    <label class="control-label">Select Brand:</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select...</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input type="file" name="file" id="file" class="inputfile" />
                                    <label for="file">Product Image...</label>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                               <label class="control-label">Description</label>
                               <textarea name="description" class="form-control" cols="55" rows="6"></textarea>
                            </div>


                            <div class="col-md-12 form-group user-form-group">
                               <div class="pull-right">
                                  <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Cancel</button>
                                  <button type="submit" class="btn btn-add btn-sm">Save</button>
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
    <!-- /.modal -->

    <!-- /.Edit modal -->
    <div class="modal fade in" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
              <div class="modal-header modal-header-primary">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h3><i class="fa fa-product-hunt m-r-5"></i> Update Product</h3>
              </div>
              <div class="modal-body">
                 <div class="row">
                    <div class="col-md-12">
                       <form class="form-horizontal">
                          <fieldset>
                             <!-- Text input-->
                             <div class="col-md-7 form-group">
                                <label class="control-label">Product Name</label>
                                <input type="text" id="product_name" class="form-control">
                             </div>
                             <!-- Text input-->
                             <div class="col-md-5 form-group">
                                <label class="control-label">Product Image</label>
                                <input type="file" id="image" class="form-control">
                             </div>
                             <!-- Text input-->
                             <div class="col-md-6 form-group">
                                <label class="control-label">Product Category</label>
                                <select id="category" class="form-control">
                                    <option value=""></option>
                                </select>
                             </div>
                             <div class="col-md-6 form-group">
                                <label class="control-label">Product Brand</label>
                                <select id="brand" class="form-control">
                                    <option value=""></option>
                                </select>
                             </div>
                             <div class="col-md-12 form-group">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" id="description" cols="10" rows="6"></textarea>
                             </div>
                             <div class="col-md-12 form-group user-form-group">
                                <div class="pull-right">
                                   <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                                   <button type="submit" class="btn btn-success btn-sm">Save</button>
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
        <!-- /.Edit modal-dialog -->
     </div>
 </section>
 <!-- /.content -->
@endsection
