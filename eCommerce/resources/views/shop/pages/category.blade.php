@extends('dashboard.layouts.app')
@section('content')
<section class="content-header">
   <div class="header-icon">
      <i class="fa fa-list"></i>
   </div>
   <div class="header-title">
      <h1>Add Category</h1>
      <small>The categories you want to store</small>
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
                   <h4>Category</h4>
                </div>
             </div>
             <div class="panel-body">
             <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="btn-group">
                <div class="buttonexport" id="buttonlist">
                   <a class="btn btn-add" href="#" data-toggle="modal" data-target="#addcustom"> <i class="fa fa-plus"></i> Add new category
                   </a>
                </div>
                </div>
                <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="table-responsive">
                   <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                      <thead>
                         <tr>
                            <th>SL No.</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                         </tr>
                      </thead>
                      <tbody id="all_category">
                          @foreach($allCate as $cate)
                         <tr>
                            <td>{{ loop()->index 1+ }}</td>
                            <td>2</td>
                            <td>3</td>
                            <td>
                                <input type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive" data-size="mini">
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash-o"></i></a>
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
    <!-- ADD Modal1 -->
    <div class="modal fade" id="addcustom" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header modal-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3><i class="fa fa-tag m-r-5"></i> Add New Category</h3>
             </div>
             <div class="modal-body">
                <div class="row">
                   <div class="col-md-12">
                      <form class="form-horizontal" method="post" action="#">
                         @csrf
                         <fieldset>
                            <!-- Text input-->
                            <div class="col-md-12 form-group">
                               <label class="control-label">Category Name:</label>
                               <input type="text" id="category_name" placeholder="Enter Category Name" class="form-control">
                            </div>
                            <div class="col-md-12 form-group">
                               <label class="control-label">Description (optional)</label>
                               <textarea id="description" class="form-control" cols="55" rows="6"></textarea>
                            </div>
                            <div class="col-md-12 form-group user-form-group">
                               <div class="pull-right">
                                  <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Cancel</button>
                                  <button type="submit" class="btn btn-add btn-sm" id="save_category">Save</button>
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
 </section>
 <!-- /.content -->
@endsection
