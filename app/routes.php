<?php
// $test = date('Y-m-d', time());
// dd($test);
Route::get('/', 'LandingController@index');

// Route::get('add_student_manual', 'AdminController@getAdd');
// Route::post('/add_student_manual', 'AdminController@postAdd');

// // Route::get('/fix_bug_lesson_detail', function(){
// //     $schedules = Schedule::all();
// //     foreach ($schedules as $key => $value) {
// //         ScheduleDetail::where('schedule_id', $value->id)
// //             ->update(['teacher_id' => $value->id]);
// //     }
// //     dd(333);
// // });
// // Route::get('/add_super_admin', function(){
// //     $input['username'] = 'super_admin';
// //     $input['role_id'] = 1;
// //     $input['status'] = 1;
// //     $input['full_name'] = 'super admin';
// //     $input['email'] = 'trantunghn196@gmail.com';
// //     $input['password'] = Hash::make('123456');
// //     Admin::create($input);
// //     dd('success');
// // });
// // Route::get('/', 'AdminController@dashboard');
// $locale = Request::segment(1);
// if (in_array($locale, Config::get('app.languages'))) {
//     App::setLocale($locale);
// } else {
//     $locale = null;
//     // dd($locale);
//     App::setLocale('vi');
// }
// Route::group(array('prefix' => $locale), function() {
//     Route::get('/', 'AdminController@dashboard');
//     Route::group(['prefix' => 'admin'], function () {
//         Route::get('/', 'AdminController@index');
//         Route::get('/login', array('uses' => 'AdminController@login', 'as' => 'admin.login'));
//         Route::post('/login', array('uses' => 'AdminController@doLogin'));
//         Route::get('/logout', 'AdminController@logout');
//         Route::get('/add_student_manual', 'AdminController@getAdd');
//         Route::post('/add_student_manual', 'AdminController@postAdd');

//         Route::get('administrator/{id}/reset', 'AdminController@getResetPass');
//         Route::post('/administrator/{id}/reset', 'AdminController@postResetPass');

//         Route::resource('/sale', 'ManagerSaleController');
//         Route::get('teacher/{id}/reset', 'ManagerTeacherController@getResetPass');
//         Route::post('/teacher/{id}/reset', 'ManagerTeacherController@postResetPass');
//         Route::post('/teacher/{id}/comment', 'TeacherController@commentTeacher');
//         Route::resource('/teacher', 'ManagerTeacherController');

//         Route::get('/gmo', 'AdminController@gmoIndex');

//         Route::get('/waitting_gmo', 'ManagerStudentController@waittingGmo');
//         Route::get('/student_sale/per_month', 'ManagerStudentController@saleStudentPerMonth');
//         Route::get('/student_sale/month', 'ManagerStudentController@saleStudentMonth');
//         Route::get('/student_sale', 'ManagerStudentController@saleStudent');

//         Route::post('/student_publish/schedule/reject/{schedule_id}', 'ManagerStudentController@rejectStudent');
//         Route::post('/student_publish/schedule/approve/{schedule_id}', 'ManagerStudentController@approveStudent');
//         Route::get('/student_publish', 'ManagerStudentController@publish');
//         Route::get('student_publish/{id}', 'ManagerStudentController@getPublishShow');
//         Route::post('student_publish/{id}', 'ManagerStudentController@postPublishShow');
//         Route::resource('/student', 'ManagerStudentController');
//         Route::resource('/student_schedule', 'ScheduleController');
        
//         Route::resource('/administrator', 'AdminController');

//         Route::resource('/role', 'RoleController');
//         Route::get('/permission/{role}', 'PermissionController@editRole');
//         Route::put('/permission/{role}', 'PermissionController@updateRole');
//         Route::resource('/permission', 'PermissionController');

//         Route::controller('/export', 'ExportController');
//     });
//     Route::group(['prefix' => 'publish'], function () {
//         Route::get('/teacher/student', 'PublishController@privateStudent');
//         Route::get('/teacher/schedule_student/{id}/stop/{teacher_id}', 'PublishController@stopScheduleStudent');
//         Route::post('/teacher/schedule_student/{id}/stop/{teacher_id}', 'PublishController@postStopScheduleStudent');
//         Route::post('/teacher/schedule_student/{id}/cancel/{teacher_id}', 'PublishController@cancelStopScheduleStudent');
//         Route::get('/teacher/schedule_student/{id}/show/{teacher_id}', 'PublishController@showScheduleStudent');
//         Route::get('/teacher/schedule_detail/{id}/show/{teacher_id}', 'PublishController@showScheduleDetail');
//         Route::post('/teacher/schedule_detail/{id}/show/{teacher_id}', 'PublishController@updateScheduleDetail');
//         Route::get('/confirm_student/{token}/{id}', 'PublishController@confirmEmail');
//         Route::get('/teacher/schedule_time/', 'TeacherController@showScheduleTime');
//         Route::resource('/teacher', 'PublishController');
//     });
// });
// // Route::group(['prefix' => 'admin'], function () {
// // 	Route::get('/', 'AdminController@index');
// //     Route::get('/login', array('uses' => 'AdminController@login', 'as' => 'admin.login'));
// //     Route::post('/login', array('uses' => 'AdminController@doLogin'));
// //     Route::get('/logout', 'AdminController@logout');
// //     Route::get('administrator/{id}/reset', 'AdminController@getResetPass');
// //     Route::post('/administrator/{id}/reset', 'AdminController@postResetPass');

// //     Route::resource('/sale', 'ManagerSaleController');
// //     Route::get('teacher/{id}/reset', 'ManagerTeacherController@getResetPass');
// //     Route::post('/teacher/{id}/reset', 'ManagerTeacherController@postResetPass');
// //     Route::post('/teacher/{id}/comment', 'TeacherController@commentTeacher');
// //     Route::resource('/teacher', 'ManagerTeacherController');

// //     Route::get('/gmo', 'AdminController@gmoIndex');

// //     Route::get('/waitting_gmo', 'ManagerStudentController@waittingGmo');
// //     Route::get('/student_sale/per_month', 'ManagerStudentController@saleStudentPerMonth');
// //     Route::get('/student_sale/month', 'ManagerStudentController@saleStudentMonth');
// //     Route::get('/student_sale', 'ManagerStudentController@saleStudent');

// //     Route::post('/student_publish/schedule/reject/{schedule_id}', 'ManagerStudentController@rejectStudent');
// //     Route::post('/student_publish/schedule/approve/{schedule_id}', 'ManagerStudentController@approveStudent');
// //     Route::get('/student_publish', 'ManagerStudentController@publish');
// //     Route::get('student_publish/{id}', 'ManagerStudentController@getPublishShow');
// //     Route::post('student_publish/{id}', 'ManagerStudentController@postPublishShow');
// //     Route::resource('/student', 'ManagerStudentController');
// //     Route::resource('/student_schedule', 'ScheduleController');
    
// //     Route::resource('/administrator', 'AdminController');

// //     Route::resource('/role', 'RoleController');
// //     Route::get('/permission/{role}', 'PermissionController@editRole');
// //     Route::put('/permission/{role}', 'PermissionController@updateRole');
// // 	Route::resource('/permission', 'PermissionController');

// //     Route::controller('/export', 'ExportController');
// // });
// // Route::group(['prefix' => 'publish'], function () {
// //     Route::get('/teacher/student', 'PublishController@privateStudent');
// //     Route::get('/teacher/schedule_student/{id}/stop/{teacher_id}', 'PublishController@stopScheduleStudent');
// //     Route::post('/teacher/schedule_student/{id}/stop/{teacher_id}', 'PublishController@postStopScheduleStudent');
// //     Route::post('/teacher/schedule_student/{id}/cancel/{teacher_id}', 'PublishController@cancelStopScheduleStudent');
// //     Route::get('/teacher/schedule_student/{id}/show/{teacher_id}', 'PublishController@showScheduleStudent');
// //     Route::get('/teacher/schedule_detail/{id}/show/{teacher_id}', 'PublishController@showScheduleDetail');
// //     Route::post('/teacher/schedule_detail/{id}/show/{teacher_id}', 'PublishController@updateScheduleDetail');
// //     Route::get('/confirm_student/{token}/{id}', 'PublishController@confirmEmail');
// //     Route::get('/teacher/schedule_time/', 'TeacherController@showScheduleTime');
// //     Route::resource('/teacher', 'PublishController');
// // });

// // App::error( function(Exception $exception, $code){
// // 	$pathInfo = Request::getPathInfo();
// //     $message = $exception->getMessage() ?: 'Exception';
// //     Log::error("$code - $message @ $pathInfo\r\n$exception");
// //     switch ($code)
// //     {
// //         case 403:
// //             return View::make('403', array('code' => 403, 'message' => 'Quyền truy cập bị từ chối!'));

// //         case 404:
// //             return 'Trang không tìm thấy!';

// //         default:
// // 		    if (Config::get('app.debug')) {
// // 		        return;
// // 		    }
// //     }
// // });

// Route::controller('/ajax', 'AjaxController');
// Route::controller('/test', 'TestController');


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