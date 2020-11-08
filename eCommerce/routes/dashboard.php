<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\SliderController;

//the middleware is checking, if the user is login or not
Route::group(['middleware' => ['auth']], function () {
    //all route is biended with 'dashboard' group
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::prefix('dashboard')->group(function(){
    //category and sub-category route is biended with a group
    Route::prefix('category')->group(function(){
        Route::get('/view-category', [CategoryController::class, 'index'])->name('category');
        Route::get('/allCategory', [CategoryController::class, 'allCategory'])->name('allCategory');
        Route::post('saveCategory', [CategoryController::class, 'saveCategory'])->name('saveCategory');
        Route::get('deleteCategory', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
        //sub-category route
        Route::get('/sub-category', [CategoryController::class, 'subCategory'])->name('sub.category');
        Route::get('/all-sub-category', [CategoryController::class, 'allSubCategory'])->name('all.sub.category');
        Route::post('/save-sub-category', [CategoryController::class, 'saveSubCategory'])->name('save.sub.category');
        Route::post('/delete-sub-category', [CategoryController::class, 'deleteSubCategory'])->name('delete.sub.category');
    });
    //product route
    Route::get('/manage-product', [ProductController::class, 'index'])->name('manage.product');
    Route::post('/save-product', [ProductController::class, 'saveProduct'])->name('save.product');
    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
    Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('update.product');
    Route::post('/delete-product', [ProductController::class, 'deleteProduct'])->name('delete.product');
    Route::get('/product-status/{id}/{status}', [ProductController::class, 'productStatus'])->name('product.status');

    //Route for same product of other color
    Route::post('/add-same-product', [ProductController::class, 'addSameProduct'])->name('add.same.product');
    Route::get('/delete-same-product/{id}', [ProductController::class, 'deleteSameProduct'])->name('delete.same.product');

    //brand route
    Route::get('/manage-brand', [BrandController::class, 'index'])->name('manage.brand');
    Route::get('/allBrand', [BrandController::class, 'allBrand'])->name('allBrand');
    Route::post('/saveBrand', [BrandController::class, 'saveBrand'])->name('saveBrand');
    Route::get('/deleteBrand', [BrandController::class, 'deleteBrand'])->name('deleteBrand');
    //slider route
    Route::get('/manage-slider', [SliderController::class, 'manageSlider'])->name('slider.image');
    Route::get('/allSlider', [SliderController::class, 'allSlider'])->name('allSlider');
    Route::post('/save-slider', [SliderController::class, 'saveSlider'])->name('save.slider');
    Route::get('/edit-slider/{id}', [SliderController::class, 'editSlider'])->name('edit.slider');
    Route::get('/delete-slider', [SliderController::class, 'deleteSlider'])->name('delete.slider');

});
});
    //login route
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'checklogin'])->name('checklogin.login');
    Route::get('/success-login', [LoginController::class, 'successlogin'])->name('success.login');
    Route::get('/admin-logout', [LoginController::class, 'adminLogout'])->name('admin.logout');
    //change the password route
    Route::get('/change-password', [LoginController::class, 'changePass'])->name('change.password');
    Route::post('/reset-password', [LoginController::class, 'resetPass'])->name('reset.password');



