@extends('dashboard.layouts.app')
@section('content')
<section class="content-header">
   <div class="header-icon">
      <i class="fa fa-connectdevelop"></i>
   </div>
   <div class="header-title">
      <h1>Add Slider</h1>
      <small>The slider you want to store</small>
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
                   <h4>Slider</h4>
                </div>
             </div>
             <div class="panel-body">
             <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="btn-group">
                <div class="buttonexport" id="buttonlist">
                   <a class="btn btn-add" href="#" data-toggle="modal" data-target="#addcustom"> <i class="fa fa-plus"></i> Add new Slider
                   </a>
                </div>
                </div>
                <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="table-responsive">
                   <table id="sliderTable" class="table table-bordered table-striped table-hover">
                    <!-- all slider will display here -->
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
                <h3><i class="fa fa-connectdevelop m-r-5"></i> Add New Slider</h3>
             </div>
             <div class="modal-body">
                <div class="row">
                   <div class="col-md-12">
                      <form class="form-horizontal" action="{{ route('save.slider') }}" method="POST" id="slider_form" enctype="multipart/form-data">
                         @csrf
                         <fieldset>
                            <!-- Text input-->
                            <div class="col-md-12 form-group">
                               <label class="control-label">Slider Title (optional):</label>
                               <input type="text" name="title" class="form-control">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-7 form-group">
                                    <label class="control-label">Add Sub-Title (optional):</label>
                                    <input type="text" name="sub_title" class="form-control">
                                </div>
                                <div class="col-md-5 form-group">
                                    <label class="control-label">Slider Image:</label>
                                    <input type="file" name="slider_image" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="control-label">Price Start Text (optional):</label>
                                <input type="text" name="price_text" class="form-control">
                            </div>

                            <div class="col-md-12 form-group">
                               <label class="control-label">Description (optional)</label>
                               <textarea id="description" name="description" class="form-control" cols="55" rows="6"></textarea>
                            </div>
                            <div class="col-md-12 form-group user-form-group">
                               <div class="pull-right">
                                  <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Cancel</button>
                                  <button type="submit" id="save_slider" class="btn btn-add btn-sm">Save</button>
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
    <!-- Edit Modal1 -->
    <div class="modal fade" id="editSliderModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
              <div class="modal-header modal-header-primary">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h3><i class="fa fa-connectdevelop m-r-5"></i> Edit Slider</h3>
              </div>
              <div class="modal-body">
                 <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="slider_id" name="slider_id">
                       <form class="form-horizontal" id="slider_edit_form">
                          @csrf
                          <fieldset>
                             <!-- Text input-->
                             <div class="col-md-12 form-group">
                                <label class="control-label">Slider Title:</label>
                                <input type="text" id="title" name="title" class="form-control">
                             </div>
                             <div class="col-md-12 form-group">
                                    <label class="control-label">Sub-Title:</label>
                                    <input type="text" id="sub_title" name="sub_title" class="form-control">
                             </div>
                             <div class="col-md-12 form-group">
                                 <label class="control-label">Price Start Text:</label>
                                 <input type="text" id="price_text" name="price_text" class="form-control">
                             </div>
                             <div class="col-md-12 form-group">
                                <label class="control-label">Description</label>
                                <textarea id="edit_description" name="description" class="form-control" cols="55" rows="6"></textarea>
                             </div>
                             <div class="col-md-12 form-group user-form-group">
                                <div class="pull-right">
                                   <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Cancel</button>
                                   <button type="submit" id="update_slider" class="btn btn-add btn-sm">Update</button>
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
