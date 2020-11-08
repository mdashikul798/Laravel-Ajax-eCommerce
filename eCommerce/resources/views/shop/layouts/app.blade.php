@include('shop.partials.header')
    <!-- Main body -->
    @yield('content')

    <!-- quick view start -->
    <div class="product-details quick-view modal animated zoomInUp" id="quick-view">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="d-table">
                        <div class="d-tablecell">
                            <div id="product_details_vue" class="modal-dialog">
                                <!-- the details of product is showing here by using ajax -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- quick view end -->
@include('shop.partials.footer')
