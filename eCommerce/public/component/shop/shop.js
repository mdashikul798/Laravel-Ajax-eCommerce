$(document).ready(function() {
    /**
     *
     * script for product details view
     */

    $(document).on('click', '#prodetails_view', function() {
        var productId = $(this).data('prodetails');
        $.ajax({
            url: 'product-details-vue',
            type: 'GET',
            data: { id: productId },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $('#product_details_vue').html(data);
            }
        });
    });

    /**
     *
     * script for product-price-range search
     */

    $(function() {
        $("#price-range").slider({
            range: true,
            min: 0,
            max: 100000,
            values: [50, 15000],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                var value1 = ui.values[0];
                var value2 = ui.values[1];

                $.ajax({
                    type: "GET",
                    url: "",
                    data: "min=" + value1 + "&max=" + value2,
                    cache: false,
                    success: function(html) {
                        $("#grid").html(html);
                    }
                });
            }
        });
        $("#amount").val("$" + $("#price-range").slider("values", 0) +
            " - $" + $("#price-range").slider("values", 1));
    });

    /**
     *
     * Search product by sub-category
     */

    $(document).on('click', '#sub_cate_search_id', function(e) {
        e.preventDefault();
        var subCategory = $(this).data('sub_cate_id');

        $.ajax({
            type: "GET",
            dataType: 'html',
            url: "",
            data: "subCategory=" + subCategory,
            cache: false,
            success: function(html) {
                $("#grid").html(html);
            }
        });
    });

    /**
     *
     * Search product by brand
     */

    $(document).on('click', '#brand_search_id', function(e) {
        e.preventDefault();
        var brandId = $(this).data('brand_search');
        $.ajax({
            type: "GET",
            dataType: 'html',
            url: "",
            data: "brand=" + brandId,
            cache: false,
            success: function(html) {
                $("#grid").html(html);
            }
        });
    });

    /**
     *
     * script for add-to-cart
     */



    $(document).on('click', '#add_to_cart', function(e) {
        e.preventDefault();
        var cart_id = $(this).data('cart_id');
        $.ajax({
            type: "GET",
            dataType: 'html',
            url: "add-to-cart",
            data: "productId=" + cart_id,
            cache: false,
            success: function(html) {
                $('#totalQuentity').html(html);
            }

        });
        if (cart_id) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Product added successfully!',
                showConfirmButton: false,
                timer: 1500
            })
        }
    });

    /**
     *
     * cart-checkout increase quentity
     */

    $(document).on('click', '#qty_increase', function(e) {
        e.preventDefault();
        var qty_incr = $(this).data('qty_inc_id');

        $.ajax({
            type: "GET",
            dataType: 'html',
            url: "cart-increaseQty",
            data: "qty_increase=" + qty_incr,
            cache: false,
            success: function(html) {
                $("#checkout_update").html(html);
            }
        });
    });

    /**
     *
     * cart-checkout decrease quentity
     */

    $(document).on('click', '#qty_decrease', function(e) {
        e.preventDefault();
        var qty_decr = $(this).data('qty_dec_id');

        $.ajax({
            type: "GET",
            dataType: 'html',
            url: "cart-decreaseQty",
            data: "qty_decrease=" + qty_decr,
            cache: false,
            success: function(html) {
                $("#checkout_update").html(html);
            }
        });
    });

    /**
     *
     * cart-checkout cancle product
     */

    $(document).on('click', '#cancle_product', function() {
        var cancle_id = $(this).data('pro_cancle_id');
        var elements = this;

        $.ajax({
            url: 'cancle-product',
            type: 'GET',
            data: "product_id=" + cancle_id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $(elements).closest("tr").fadeOut();
                $("#checkout_update").html(data);
            }
        });

    });



});