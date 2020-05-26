<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;


Auth::routes();


//++++++++++++++++ FRONTEND ++++++++++++++++++++

Route::get('/home', function () {
    return redirect()->route('home');
});

Route::get('/', 'HomeController@index')->name('home');
//search

Route::get('search', ['as' => 'search', 'uses' => 'ProductController@getSearch']);
//feed

//xoa galery
Route::get("xoa-galery/{id}", ['as' => 'xoa-galery', 'uses' => 'ProductController@xoaGalery']);
// chi tiets don hang
Route::get("detail-order", ['as' => 'detail-order', 'uses' => 'HomeController@getOrder']);
Route::get('showDetail/{id}', ['as' => 'showDetail', 'uses' => 'ProductController@getDetailProduct']);
//review rate
Route::post('review/{id}', ['as' => 'review', 'uses' => 'HomeController@productStar']);
Route::get('list-rate/{id}', ['as' => 'list-rate', 'uses' => 'HomeController@listRate']);
Route::post('showDetail/{id}', 'CommentController@comment')->name('post.comment');
Route::post('showDetail/{id}/{comment_id}', 'CommentController@reply')->name('reply.comment');
//nút chi tiết sản phẩm
Route::get("product-detail/{id}", ['as' => 'product-detail', 'uses' => "ProductController@getDetailProduct"]);
//chi tiết hình ảnh sản phẩm
Route::get("product-galleries/{product_id}", ['as' => 'galleries', 'uses' => "ProductController@getGalleryProduct"]);
//thêm hàng
Route::post("add-to-cart/{id}", ['as' => 'add-to-cart', 'uses' => "CartController@postAddToCart"]);
//page mua hàng
Route::get("gio-hang", ['as' => 'gio-hang', 'uses' => "CartController@index"]);
//thanh toán
Route::get("thanh-toan", ['as' => 'thanh-toan', 'uses' => "CartController@payNow"]);
Route::post("thanh-toan", ['as' => 'thanh-toan', 'uses' => "CartController@postPayNow"]);
Route::post("remove-item-cart/{id}", ['as' => 'remove-item-cart', 'uses' => "CartController@removeItemCart"]);
//đăng nhập đăng ký tìm kiếm
Route::post("dang-nhap", ['as' => 'dang-nhap', 'uses' => "CartController@removeItemCart"]);
Route::post("dang-ky", ['as' => 'dang-ky', 'uses' => "CartController@removeItemCart"]);
Route::post("tim-kiem", ['as' => 'tim-kiem', 'uses' => "CartController@removeItemCart"]);
//TODO làm sau giới thiệu liên hệ
Route::get("gioi-thieu", ['as' => 'gioi-thieu', 'uses' => "HomeController@gioithieu"]);
Route::get("contact", ['as' => 'contact', 'uses' => "ContactController@view"]);
Route::post("contact", ['as' => 'contact', 'uses' => "ContactController@postcontact"]);
Route::post("lien-he", ['as' => 'lien-he', 'uses' => "CartController@removeItemCart"]);

Route::get("profile", ['as' => 'profile', 'uses' => "UserController@getprofile"]);
Route::get("edit-profile", ['as' => 'edit-profile', 'uses' => "UserController@geteditprofile"]);
Route::post("edit-profile", ['as' => 'update-profile', 'uses' => "UserController@getpostprofile"]);
//TODO làm sau
Route::get("danh-muc/{id}", ['as' => 'danh-muc', 'uses' => "ProductController@getProductsById"]);

//Thanh toán
//Route::view('/checkout', 'checkout-page');
Route::get("/checkout", ['as' => 'checkout', 'uses' => "PaymentController@getCheckout"]);
Route::post('/checkout', 'PaymentController@createPayment')->name('create-payment');
Route::get('/confirm', 'PaymentController@confirmPayment')->name('confirm-payment');


//++++++++++++++++ BACKEND +++++++++++++++++++++
Route::group(['prefix' => 'admin', 'namespace' => "Admin", "middleware" => "auth"], function () {

    Route::group(['middleware' => 'check.user'], function () {

        Route::get('', function () {
            return redirect()->route('danh-sach-san-pham');
        });

        Route::group(['prefix' => 'san-pham'], function () {
            //root/admin/san-pham/danh-sach
            Route::get("danh-sach", ['as' => 'danh-sach-san-pham', 'uses' => "ProductController@getListProduct"]);
            //root/admin/san-pham/them
            Route::get("them", ['as' => 'them-san-pham', 'uses' => 'ProductController@getAddProduct']);
            //root/admin/san-pham/them
            Route::post("them", ['as' => 'post-add-product', 'uses' => 'ProductController@postAddProduct']);
            //root/admin/san-pham/sua-san-pham
            Route::get("sua-san-pham/{id}", ['as' => 'sua-san-pham', 'uses' => 'ProductController@getEditProduct']);
            //root/admin/san-pham/sua-san-pham
            Route::post("sua-san-pham/{id}", ['as' => 'post-sua-san-pham', 'uses' => 'ProductController@postEditProduct']);
            //root/admin/san-pham/xoa-san-pham
            Route::get("xoa-san-pham/{id}", ['as' => 'xoa-san-pham', 'uses' => 'ProductController@getDeleteProduct']);
            //root/admin/san-pham/list-image/{id}
            Route::get("list-image/{id}", ['as' => 'list-image', 'uses' => 'ProductController@getEditListImageProduct']);
            //root/admin/san-pham/add-image-product/{product_id}
            Route::get("add-image-product/{product_id}", ['as' => 'add-image-product', 'uses' => 'ProductController@getAddImageProduct']);
            //root/admin/san-pham/add-image-product/{product_id}
            Route::post("add-image-product/{product_id}", ['as' => 'post-add-image-product', 'uses' => 'ProductController@postAddImageProduct']);
            //root/admin/san-pham/delete-gallery
            Route::get("delete-gallery/{id}", ['as' => 'delete-gallery', 'uses' => 'ProductController@getDeleteGallery']);
        });


//
//        Route::group(['prefix' => 'danh-muc', 'middleware'=>'check.employee'], function (){
        //root/admin/danh-muc/list-danh-muc
        Route::get("list-danh-muc", ['as' => 'list-danh-muc', 'uses' => "CategoryController@getListCategory"]);
        //root/admin/danh-muc/them-danh-muc
        Route::get("them-danh-muc", ['as' => 'them-danh-muc', 'uses' => "CategoryController@getAddCategory"]);
        //root/admin/danh-muc/them-danh-muc
        Route::post("them-danh-muc", ['as' => 'post-add-category', 'uses' => "CategoryController@postAddCategory"]);
        //root/admin/danh-muc/sua-danh-muc
        Route::get("sua-danh-muc/{id}", ['as' => 'sua-danh-muc', 'uses' => "CategoryController@getEditCategory"]);
        //root/admin/danh-muc/sua-danh-muc
        Route::post("post-sua-danh-muc/{id}", ['as' => 'post-sua-danh-muc', 'uses' => "CategoryController@postEditCategory"]);
        //root/admin/danh-muc/xoa-danh-muc
        Route::get("xoa-danh-muc/{id}", ['as' => 'xoa-danh-muc', 'uses' => 'CategoryController@getDeleteCategory']);
    });

    Route::group(['prefix' => 'don-hang'], function () {
        //root/admin/danh-muc/list-don-hang
        Route::get("list-don-hang", ['as' => 'list-don-hang', 'uses' => "OrderController@getAllOrder"]);
        //root/admin/danh-muc/chi-tiet-don-hang
        Route::get("chi-tiet-don-hang/{id}", ['as' => 'chi-tiet-don-hang', 'uses' => "OrderController@getOrderDetail"]);
        //root/admin/danh-muc/chi-tiet-don-hang
        Route::post("update-order/{id}", ['as' => 'post-edit-order', 'uses' => 'OrderController@updateOrder']);
        //root/admin/danh-muc/xoa-don-ha
        Route::get("xoa-don-hang/{id}", ['as' => 'xoa-don-hang', 'uses' => 'OrderController@getDeleteOrder']);

        Route::get("change-status/{id}", ['as' => 'change-status', 'uses' => 'OrderController@changeStatus']);
    });
    Route::get("export", ['as' => 'export', 'uses' => "OrderController@export"]);
    Route::group(['prefix' => 'thong-ke'], function () {
        Route::get("list-thong-ke", ['as' => 'list-thong-ke', 'uses' => "OrderController@thongke"]);
        Route::get("list-thong-ke-sp", ['as' => 'list-thong-ke-sp', 'uses' => "OrderController@thongkesp"]);
    });
    Route::group(['prefix' => 'comment'], function () {
        //root/admin/danh-muc/list-don-hang
        Route::get("list-comment", ['as' => 'list-comment', 'uses' => "CommentController@getComment"]);

        //root/admin/danh-muc/xoa-don-hang
        Route::get('xoa-comment/{id}', 'CommentController@getDeleteComment')->name('xoa-comment');
    });


//    });
});
