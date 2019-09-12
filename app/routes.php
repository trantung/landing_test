<?php
Route::get('/', 'LandingController@index');
Route::get('/mua-san-pham', 'LandingController@getBuy');

Route::post('/order','OrderController@order');
// Route::post('/success','OrderController@sucess');
Route::resource('/dat-hang', 'OrderController');

$locale = Request::segment(1);
if (in_array($locale, Config::get('app.languages'))) {
    App::setLocale($locale);
} else {
    $locale = null;
    // dd($locale);
    App::setLocale('vi');
}
Route::group(array('prefix' => $locale), function() {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', 'AdminController@dashboard');
        Route::get('/', 'AdminController@index');
        Route::get('/login', array('uses' => 'AdminController@login', 'as' => 'admin.login'));
        Route::post('/login', array('uses' => 'AdminController@doLogin'));
        Route::get('/logout', 'AdminController@logout');
        Route::get('/config', 'AdminConfigController@getConfig');
        Route::post('/config', 'AdminConfigController@updateConfig');
        
        Route::resource('/slide', 'SlideController');
        Route::resource('/comment', 'CommentController');
        Route::resource('/comment_order', 'CommentOrderController');
        Route::resource('/product', 'ProductController');
        Route::resource('/order', 'AdminOrderController');
        Route::resource('/discount', 'AdminDiscountController');

    });
    
});
Route::post('/ajax/product', 'AjaxController@ajaxProduct');
Route::controller('/ajax', 'AjaxController');
Route::controller('/test', 'TestController');


App::error( function(Exception $exception, $code){
    $pathInfo = Request::getPathInfo();
    $message = $exception->getMessage() ?: 'Exception';
    Log::error("$code - $message @ $pathInfo\r\n$exception");
});
