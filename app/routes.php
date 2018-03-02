<?php
// Route::resource('/admin', 'AdminController');
// Route::get('/', 'AdminController@index');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', array('uses' => 'AdminController@login', 'as' => 'admin.login'));
    Route::post('/login', array('uses' => 'AdminController@doLogin'));
    Route::get('/logout', 'AdminController@logout');
    Route::get('administrator/{id}/reset', 'AdminController@getResetPass');
    Route::post('/administrator/{id}/reset', 'AdminController@postResetPass');
    Route::resource('/teacher', 'ManagerTeacherController');
    Route::resource('/student', 'ManagerStudentController');
	Route::resource('/', 'AdminController');
});


// Route::controller('/ajax', 'AjaxController');


// App::error( function(Exception $exception, $code){
//     $pathInfo = Request::getPathInfo();
//     $message = $exception->getMessage() ?: 'Exception';
//     Log::error("$code - $message @ $pathInfo\r\n$exception");
//     switch ($code)
//     {
//         case 403:
//             return View::make('errors.404', array('code' => 403, 'message' => 'Quyền truy cập bị từ chối!'));

//         case 404:
//             return View::make('errors.404', array('code' => 404, 'message' => 'Trang không tìm thấy!'));

//         default:
//             if (Config::get('app.debug')) {
//                 return;
//             }
//     }
// });