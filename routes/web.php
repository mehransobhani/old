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
 Route::get('a',function(){
return "mehran";});
Route::middleware(['throttle:150,1'])->group(function () {
 Route::get('a2',function(){
return "mehran";});

	Route::middleware(['check_admin', 'load_admin_data'])->group(function () {
		Route::get('admin', 'admin\AdminController@index');
		Route::resource('admin/product', 'admin\ProductController', ['except' => ['show']]);
		Route::resource('admin/category', 'admin\CategoryController', ['except' => ['show']]);
		Route::post('admin/category/del_img/{id}', 'admin\CategoryController@del_img');
		Route::resource('admin/slider', 'admin\SliderController', ['except' => ['show']]);
		Route::get('admin/product/gallery', 'admin\ProductController@gallery');
		Route::post('admin/product/upload', 'admin\ProductController@upload');
		Route::post('admin/product/del_product_img/{id}', 'admin\ProductController@del_product_img');
		Route::get('admin/filter', 'admin\FilterController@index');
		Route::post('admin/filter', 'admin\FilterController@create');
		Route::get('admin/item', 'admin\ItemController@index');
		Route::post('admin/item', 'admin\ItemController@create');
		Route::get('admin/product/add-item/{id}', 'admin\ProductController@add_item_form');
		Route::post('admin/product/add_item', 'admin\ProductController@add_item_product');
		Route::resource('admin/amazing', 'admin\AmazingController', ['except' => ['show']]);
		Route::resource('admin/service', 'admin\ServiceController');
		Route::post('admin/service/get_price', 'admin\ServiceController@get_price');
		Route::post('admin/service/set_price', 'admin\ServiceController@set_price');
		Route::get('admin/product/add-review', 'admin\ProductController@add_review_form');
		Route::post('admin/product/add_review', 'admin\ProductController@add_review');
		Route::post('admin/product/del_review_img/{id}', 'admin\ProductController@del_review_img');
		Route::resource('admin/ostan', 'admin\OstanController', ['except' => ['show']]);
		Route::resource('admin/shahr', 'admin\ShahrController', ['except' => ['show']]);
		Route::get('admin/order', 'admin\OrderController@index');
		Route::get('admin/order/{id}', 'admin\OrderController@view');
		Route::delete('admin/order/{id}', 'admin\OrderController@destroy');
		Route::post('admin/order/set_status', 'admin\OrderController@set_status');
		Route::resource('admin/user', 'admin\UserController');
		Route::get('admin/product/add-filter/{id}', 'admin\ProductController@add_filter_form');
		Route::post('admin/product/add_filter', 'admin\ProductController@add_filter_product');
		Route::get('admin/statistics', 'admin\AdminController@statistics');
		Route::get('admin/comment', 'admin\CommentController@index');
		Route::get('admin/ajax/set_comment_status/{id}', 'admin\CommentController@set_comment_status')->name('admin.setCommentStatus');
		Route::delete('admin/comment/{id}', 'admin\CommentController@delete');
		Route::get('admin/question', 'admin\QuestionController@index');
		Route::post('admin/ajax/set_status_question', 'admin\QuestionController@set_status');
		Route::delete('admin/question/{id}', 'admin\QuestionController@delete');
		Route::post('admin/question/add', 'admin\QuestionController@add');
		Route::get('admin/setting/pay', 'admin\AdminController@pay_setting_form');
		Route::post('admin/setting/pay', 'admin\AdminController@pay_setting');
		Route::get('admin/news', 'admin\NewsController@index')->name('admin.newsList');
		Route::get('admin/news/create', 'admin\NewsController@create')->name('admin.createNews');
		Route::post('admin/news/store', 'admin\NewsController@store')->name('admin.storeNews');
		Route::get('admin/news/edit/{news}', 'admin\NewsController@edit')->name('admin.editNews');
		Route::put('admin/news/update/{news}', 'admin\NewsController@update')->name('admin.updateNews');
		Route::post('admin/news/del_img/{id}', 'admin\NewsController@del_img')->name('admin.deleteNewsImage');
		Route::get('admin/banners/', 'admin\BannerController@index')->name('admin.BannerList');
		Route::get('admin/banners/edit/{id}', 'admin\BannerController@edit')->name('admin.editBanner');
		Route::post('admin/banners/edit/{id}', 'admin\BannerController@update')->name('admin.updateBanner');

		//Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
		//Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');

	});

	Route::get('admin_login', 'admin\AdminController@admin_login')->name('admin_login');

	Route::middleware(['statistics'])->group(function () {
		Route::get('/', 'SiteController@index')->name('site.homepage');
		Route::get('product/{code}/{title}', 'SiteController@show')->name('site.showProductDetails');
		Route::get('category/{cat1}', 'SearchController@cat1')->name('site.categoryLevelOne');
		Route::get('category/{cat1}/{cat2}', 'SearchController@show_cat1')->name('site.categoryLevelTwo');
		Route::get('category/{cat1}/{cat2}/{cat3}', 'SearchController@show_cat_product')->name('site.categoryLevelThree');
		Route::get('category/{cat1}/{cat2}/{cat3}/{cat4}', 'SearchController@show_cat4');
		Route::get('search/{cat1}/{cat2}/{cat3}', 'SearchController@search');
		Route::get('cart', 'SiteController@show_cart')->name('site.shoppingCart');

		Route::get('news/show/{url}', 'SiteController@viewNews')->name('site.viewNews');
		Route::get('news', 'SiteController@listNews')->name('site.listNews');

		Route::get('contact_us', 'SiteController@showContact')->name('site.showContact');
		Route::post('contact_us', 'SiteController@sendContact')->name('site.sendContact');

		Route::get('pages/{page}', 'SiteController@showPage')->name('site.showPage');

		Route::get('Compare/{product1}', 'SiteController@compare');
		Route::get('Compare/{product1}/{product2}', 'SiteController@compare');
		Route::get('Compare/{product1}/{product2}/{product3}', 'SiteController@compare');
		Route::get('Compare/{product1}/{product2}/{product3}/{product4}', 'SiteController@compare');
	});

	Route::get('/products/search', 'SearchController@productSearchTerm')->name('searchProducts');

	Route::post('site/ajax_set_service', 'SiteController@set_service');

	Route::post('cart', 'SiteController@cart')->name('site.addToCart');
	Route::get('cart/{product_id}', 'SiteController@cart')->name('site.addToCartByButton');
	Route::post('cart/ajax_del_cart', 'SiteController@del_cart')->name('site.deleteProductFromShoppingCart');
	Route::post('cart/ajax_change_cart', 'SiteController@change_cart')->name('site.changeProductQTYOnShoppingCart');
	Route::get('shipping', 'ShopController@Shipping')->name('site.shipping');
	Route::get('wish_list/add/{id}', 'ShopController@addProductToWishList')->name('site.addToWishList');
	Route::get('wish_list/remove/{id}', 'ShopController@removeProductFromWishList')->name('site.removeFromWishList');
	Route::get('wish_list', 'ShopController@getWishList')->name('site.showWishLists');
	Route::get('shipping/add', 'ShopController@addShipping')->name('site.addShipping');
	Route::post('shipping/get_ajax_shahr', 'ShopController@get_ajax_shahr')->name('site.getCities');
	Route::post('shipping/add_address', 'ShopController@add_address')->name('site.insertShipping');
	Route::delete('shipping/remove_address/{id}', 'ShopController@remove_address')->name('site.removeShipping');
	Route::match(['get', 'post'], 'review', 'ShopController@review')->name('site.orderReview');
	Route::get('payment', 'ShopController@Payment')->name('site.paymentForm');
	//Route::post('payment', 'ShopController@Pay')->name('site.payment');
    Route::post('payment', 'PaymentController@requestPayment')->name('site.payment');

	Route::post('ajax_get_compare_product', 'SiteController@get_compare_product');
	Route::post('site/ajax_check_login', 'SiteController@check_login');
	Route::get('user/order', 'UserController@show_order')->name('site.showOrder');


	Route::post('shop/edit_address_form', 'ShopController@edit_address_form');
	Route::post('shop/edit_address/{address_id}', 'ShopController@edit_address');
    Route::get('rule','ShopController@rules')->name("rule");

    Route::get('payment/callback', 'PaymentController@verifyPayment')->name('site.payment.callback');

	Auth::routes();
	
	  Route::get('auth/register/submit_code', 'Auth\RegisterController@submitCode')->name("register.submit-code");
    Route::get('auth/register/final', 'Auth\RegisterController@final')->name("register.final");
	
	Route::get('Captcha', function () {
		$Captcha = new \App\lib\Captcha();
		$Captcha->create();
	});
	
	
    Route::get('forgetPassword','ResetPasswordController@view')->name("resetPasswordView");
    Route::post('forgetPassword/sendCode','ResetPasswordController@sendCode')->name("sendCode");
    Route::get('forgetPassword/newPassword/{id}','ResetPasswordController@newPasswordView')->name("newPasswordView");
    Route::get('forgetPassword/submit-code-view/{id}','ResetPasswordController@submitCodeView')->name("submit-code-view");
    Route::post('forgetPassword/submit-code','ResetPasswordController@submitCode')->name("submit-code");
    Route::post('forgetPassword/resetPassword','ResetPasswordController@reset')->name("reset-password");


	Route::middleware(['auth'])->group(function () {
		Route::get('users/profile', 'UserController@profile')->name('site.userProfile');

		Route::get('AddComment/{product_id}', 'SiteController@comment_form');
		Route::post('site/add_score', 'SiteController@add_score');
		Route::post('site/add_comment', 'SiteController@add_comment');
		Route::post('add_question', 'SiteController@add_question');
	});

	Route::get('user/order/print', 'UserController@print_order');
	Route::get('user/order/create_barcode', 'UserController@create_barcode')->name('site.createOrderBarcode');
	Route::get('user/order/pdf', 'UserController@create_pdf');
	Route::post('order', 'ShopController@update_order');
	Route::get('order', 'ShopController@update_order2');

	Route::post('ajax/set_filter_product', 'SearchController@ajax_search');
	Route::post('site/ajax_get_tab_data', 'SiteController@get_tab_data');

	Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/t', function () {
        \App\Classes\Email\OrderEmail::send('mehransobhani77@gmail.com',100);
dd();
    
    
    $r = new \App\Classes\Getway\Zibal\Request();
    $response = $r->request(10000, 4);
    if ($response->result == 100) {
        $startGateWayUrl = "https://gateway.zibal.ir/start/" . $response->trackId;
        return \Illuminate\Support\Facades\Redirect::secure($startGateWayUrl);
    }
    else {
        echo "errorCode: " . $response->result . "<br>";
        echo "message: " . $response->message;
    }
})->name('home');
