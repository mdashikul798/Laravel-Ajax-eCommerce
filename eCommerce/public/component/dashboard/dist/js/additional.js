$(document).ready(function() {
    /***
     * script for the category
     *
     * */
    //Load all category
    function loadCategory() {
        $.ajax({
            url: 'allCategory',
            type: 'GET',
            success: function(data) {
                $('#dataTableExample1').html(data);
            }
        });
    }
    loadCategory();

    // Insert category
    $('#save_category').on('click', function(e) {
        e.preventDefault();
        var category = $('#category_name').val();
        var description = $('#description').val();
        if (category == '') {
            alert('Category is required');
        } else {
            $.ajax({
                url: 'saveCategory',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { cate_name: category, description: description },
                success: function(data) {
                    if (data == 1) {
                        // $('.modal').hide();
                        // $('.modal-backdrop').hide();
                        $('#category_form').trigger('reset');
                        loadCategory();
                    } else {
                        alert('Data not saved')
                    }
                }
            });
        }
    });
    // End of Insert category

    //Delete Category
    $(document).on('click', '#category_delete', function() {
        var categoryId = $(this).data('id');
        var elements = this;
        bootbox.confirm("Do you want to delete permanently!", function(confirmed) {
            if (confirmed) {
                $.ajax({
                    url: 'deleteCategory',
                    type: 'GET',
                    data: { id: categoryId },
                    success: function(data) {
                        if (data == 1) {
                            $(elements).closest("tr").fadeOut();
                            loadCategory();
                        } else {
                            $('#error-msg').html('Record deleted successfully').slideDown();
                            console.log('Data not deleted');
                        }
                    }
                });
            }
        });
    });
    //End of delete category

    /***
     * script for the sub-category
     *
     * */

    //Load all sub-category
    function loadSubCategory() {
        $.ajax({
            url: 'all-sub-category',
            type: 'GET',
            success: function(data) {
                $('#category_table').html(data);
            }
        });
    }
    loadSubCategory();

    // Insert sub-category
    $('#save_sub_category').on('click', function(e) {
        e.preventDefault();
        var subCategory = $('#sub_category_name').val();
        var categoryId = $('#category').val();
        var description = $('#description').val();
        if (subCategory == '' || categoryId == '') {
            alert('Sub-Category & Category is required');
        } else {
            $.ajax({
                url: 'save-sub-category',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { sub_cate_name: subCategory, cate_id: categoryId, description: description },
                success: function(data) {

                    if (data == 1) {
                        $('#sub_category_form').trigger('reset');
                        loadSubCategory();
                    } else {
                        alert('Data not saved')
                    }
                }
            });
        }
    });
    // End of Insert sub-category

    //Delete Sub-Category
    $(document).on('click', '#sub_category_delete', function() {
        var subcId = $(this).data('sub_id');
        var elements = this;
        bootbox.confirm("Do you want to delete permanently!", function(confirmed) {
            if (confirmed) {
                $.ajax({
                    url: 'delete-sub-category',
                    type: 'POST',
                    data: { id: subcId },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data == 1) {
                            $(elements).closest("tr").fadeOut();
                            loadSubCategory();
                        } else {
                            $('#error-msg').html('Record deleted successfully').slideDown();
                            console.log('Data not deleted');
                        }
                    }
                });
            }
        });
    });

    /***
     * script for the brand
     *
     * */

    //Load all brand
    function loadBrand() {
        $.ajax({
            url: 'allBrand',
            type: 'GET',
            success: function(data) {
                $('#brandTable').html(data);
            }
        });
    }
    loadBrand();

    // Insert Brand
    $('#save_brand').on('click', function(e) {
        e.preventDefault();
        var brand = $('#brand_name').val();
        var description = $('#description').val();
        if (brand == '') {
            alert('Brand is required');
        } else {
            $.ajax({
                url: 'saveBrand',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { brand: brand, description: description },
                success: function(data) {
                    if (data == 1) {
                        // $('.modal').hide();
                        // $('.modal-backdrop').hide();
                        $('#brand_form').trigger('reset');
                        loadBrand();
                    } else {
                        alert('Data not saved')
                    }
                }
            });
        }
    });
    // End of Insert brand

    //Delete brand
    $(document).on('click', '#brand_delete', function() {
        var brandId = $(this).data('brand_id');
        var elements = this;
        bootbox.confirm("Do you want to delete permanently!", function(confirmed) {
            if (confirmed) {
                $.ajax({
                    url: 'deleteBrand',
                    type: 'GET',
                    data: { id: brandId },
                    success: function(data) {
                        if (data == 1) {
                            $(elements).closest("tr").fadeOut();
                            loadBrand();
                        } else {
                            $('#error-msg').html('Record deleted successfully').slideDown();
                            console.log('Data not deleted');
                        }
                    }
                });
            }
        });
    });
    //End of delete brand

    /***
     * script for the product
     *
     * */

    //change the product-status
    $(document).on('change', '#product_status', function() {
        var proId = $(this).data('pro_status');
        if (this.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.ajax({
            url: 'product-status/' + proId + '/' + status,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                console.log(result);
            }
        });
    });

    //Delete Product
    $(document).on('click', '#delete_product', function() {
        var productId = $(this).data('pro_id');
        var elements = this;
        bootbox.confirm("Do you want to delete permanently!", function(confirmed) {
            if (confirmed) {
                $.ajax({
                    url: 'delete-product',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: productId },
                    success: function(data) {
                        if (data == 1) {
                            $(elements).closest("tr").fadeOut();
                        } else {
                            $('#error-msg').html('Record deleted successfully').slideDown();
                            console.log('Data not deleted');
                        }
                    }
                });
            }
        });
    });
    //End of Delete Product

    /***
     * script for the slider
     *
     * */
    //Load all slider
    function loadSlider() {
        $.ajax({
            url: 'allSlider',
            type: 'GET',
            success: function(data) {
                $('#sliderTable').html(data);
            }
        });
    }
    loadSlider();

    //Edit slider
    $(document).on('click', '#slider_edit', function() {
        $('#editSliderModel').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#slider_id').val(data[0]);
        $('#title').val(data[2]);
        $('#sub_title').val(data[3]);
        $('#price_text').val(data[4]);
        $('#edit_description').html(data[5]);
    });

    $('#slider_edit_form').on('submit', function(e) {
        e.preventDefault();
        var id = $('#slider_id').val();
        $.ajax({
            method: 'GET',
            url: 'edit-slider/' + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $('#slider_edit_form').serialize(),
            success: function(resqonse) {
                console.log(resqonse);
                $('#editSliderModel').modal('hide');
                //location.reload();
                loadSlider();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
    //end of edit slider

    //Delete slider
    $(document).on('click', '#slider_delete', function() {
        var sliderId = $(this).data('slider_id');
        var elements = this;
        bootbox.confirm("Do you want to delete permanently!", function(confirmed) {
            if (confirmed) {
                $.ajax({
                    url: 'delete-slider',
                    type: 'GET',
                    data: { id: sliderId },
                    success: function(data) {
                        if (data == 1) {
                            $(elements).closest("tr").fadeOut();
                            loadSlider();
                        } else {
                            $('#error-msg').html('Record deleted successfully').slideDown();
                            console.log('Data not deleted');
                        }
                    }
                });
            }
        });
    });
    //End of delete slider

    //Add aditional same product
    $(document).on('click', '#same_product_btn', function(e) {
        e.preventDefault();
        var productId = $(this).data('product_id');
        $('#pro_id').val(productId);
    });

    //Delete aditional same product
    $(document).on("click", "#other_product_delete", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        bootbox.confirm("Are you want to delete permanently!", function(confirmed) {
            if (confirmed) {
                window.location.href = link;
            };
        });
    });

});



/*------------ End of script of Dashboard -------------*/