<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//frontend
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');
//danh mục sp trang chủ
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
//thuong hiệu sản phẩm
Route::get('/thuong-hieu-san-pham/{brand_id}','BrandProduct@show_brand_home');
//chitietsanpham
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');
/// backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');
//send mail
Route::get('/send-mail','HomeController@send_mail');

//category product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');

Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');

Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');

Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');

// brand product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');

Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');

Route::post('/save-brand-product','BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');

//  product
Route::get('/add-product','ProductController@add_product');
Route::get('/all-product','ProductController@all_product');

Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');

Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');

Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
//cart
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/gio-hang','CartController@gio_hang');
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
//login-checkout
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/login-customer','CheckoutController@login_customer');
Route::post('/add-customer','CheckoutController@add_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
//order
Route::post('/order-place','CheckoutController@order_place');
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{orderId}','CheckoutController@view_order');

//banner
Route::get('/manage-slider','SliderController@manage_slider');
Route::get('/add-slider','SliderController@add_slider');
Route::get('/insert-slider','SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','SliderController@unactive_slider');
Route::get('/active-slide/{slide_id}','SliderController@active_slider');
Route::get('/delete-slide/{slide_id}','SliderController@delete_slider');