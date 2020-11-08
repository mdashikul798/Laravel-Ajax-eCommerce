@php
 use App\Models\Dashboard\Category;
 use App\Models\Dashboard\Brand;

 $categories = Category::orderBy('category_name')->where('status', '1')->get();
 $brands = Brand::orderBy('name')->where('status', '1')->get();

@endphp
<div class="col-xs-12 col-sm-4 col-md-3">
    <div class="sidebar left-sidebar">
        <div class="s-side-text">
            <div class="sidebar-title clearfix">
                <h4 class="floatleft">Categories</h4>
                <h5 class="floatright"><a href="#">All</a></h5>
            </div>
            <div class="categories left-right-p">
                <ul id="accordion" class="panel-group clearfix">
                    <?php $count = 0; ?>
                    @foreach($categories as $category)
                    <li class="panel">
                        <div data-toggle="collapse" data-parent="#accordion" data-target="#collapse5{{ $count }}" >
                            <div class="medium-a">
                                {{ $category->category_name }}
                            </div>
                        </div>
                        <div class="paypal-dsc panel-collapse collapse" id="collapse5{{ $count }}">
                            <div class="normal-a">
                                @foreach ($category->subCategory as $sub)
                                <a href="#" id="sub_cate_search_id" data-sub_cate_id="{{ $sub->id }}">{{ $sub->sub_category }}</a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <?php $count++; ?>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="s-side-text">
            <div class="sidebar-title">
                <h4>price</h4>
            </div>
            <div class="range-slider clearfix">
                <form action="#" method="get">
                    <label><span>You range</span>
                        <input type="text" id="amount" readonly /></label>
                    <div id="price-range"></div>
                </form>
            </div>
        </div>

        <div class="s-side-text">
            <div class="sidebar-title clearfix">
                <h4 class="floatleft">brands</h4>
                <h5 class="floatright"><a href="#">All</a></h5>
            </div>
            <div class="section-title clearfix">
                <ul>
                    @foreach($brands as $brand)
                    <li id="brand_list">
                        <a href="#" id="brand_search_id" data-brand_search="{{ $brand->id }}">
                        {{ $brand->name }}</a><span class="pull-right">( {{ App\Models\Dashboard\Product::where('brand_id', $brand->id)->count() }} )</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
