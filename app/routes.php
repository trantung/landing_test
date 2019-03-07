<?php
Route::get('/', 'LandingController@index');

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
        Route::get('/slide', 'SlideController@index');
        Route::get('/slide/create', 'SlideController@create');
        Route::post('/slide/create', 'SlideController@store');
        Route::get('/order', 'OrderController@index');
        Route::get('/comment', 'CommentController@index');
    });
    
});


Route::controller('/ajax', 'AjaxController');
Route::controller('/test', 'TestController');


App::error( function(Exception $exception, $code){
    $pathInfo = Request::getPathInfo();
    $message = $exception->getMessage() ?: 'Exception';
    Log::error("$code - $message @ $pathInfo\r\n$exception");
    switch ($code)
    {
        case 403:
            return View::make('errors.404', array('code' => 403, 'message' => 'Quyền truy cập bị từ chối!'));

        case 404:
            return View::make('errors.404', array('code' => 404, 'message' => 'Trang không tìm thấy!'));

        default:
            if (Config::get('app.debug')) {
                return;
            }
    }
});