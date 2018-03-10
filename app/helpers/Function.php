<?php
function getAllPermissions(){
    return [
        'admin.view' => [
            'name' => 'Xem danh sách quản trị viên',
            'description' => 'Được phép xem danh sách tất cả các quản trị viên của hệ thống. Chỉ trao quyền cho người đáng tin cậy',
            'accept' => ['AdminController@index'],
            'callback_function' => 'function_calback',
        ],
        'teacher.view' => [
            'name' => 'Xem danh sách giáo viên',
            'description' => 'Được phép xem danh sách tất cả các giáo viên',
            'accept' => ['ManagerTeacherController@index'],
            'callback_function' => '',
        ],
        'teacher.create' => [
            'name' => 'Tạo mới giáo viên',
            'description' => 'Được phép tạo mới thông tin giáo viên',
            'accept' => ['ManagerTeacherController@create', 'ManagerTeacherController@store'],
            'callback_function' => '',
        ],
        'teacher.edit' => [
            'name' => 'Sửa thông tin giáo viên',
            'description' => 'Được phép sửa thông tin của tất cả giáo viên',
            'accept' => ['ManagerTeacherController@update', 'ManagerTeacherController@edit'],
            'callback_function' => '',
        ],
        'teacher.delete' => [
            'name' => 'Xóa giáo viên bất kỳ',
            'description' => 'Được phép xóa thông tin của tất cả giáo viên',
            'accept' => ['ManagerTeacherController@destroy'],
            'callback_function' => '',
        ],

        'student.view' => [
            'name' => 'Xem danh sách học sinh',
            'description' => 'Được phép xem danh sách tất cả học sinh.',
            'accept' => ['ManagerStudentController@index'],
            'callback_function' => '',
        ],
        'student.create' => [
            'name' => 'Tạo mới giáo viên',
            'description' => 'Được phép tạo mới thông tin học sinh',
            'accept' => ['ManagerStudentController@create', 'ManagerStudentController@store'],
            'callback_function' => '',
        ],
        'student.edit' => [
            'name' => 'Sửa thông tin học sinh',
            'description' => 'Được phép sửa thông tin tất cả học sinh',
            'accept' => ['ManagerStudentController@update', 'ManagerStudentController@edit'],
            'callback_function' => '',
        ],
        'student.delete' => [
            'name' => 'Xóa học sinh bất kỳ',
            'description' => 'Được phép xóa thông tin của tất cả học sinh',
            'accept' => ['ManagerStudentController@destroy'],
            'callback_function' => '',
        ],
        'schedule.view' => [
            'name' => 'Xem lịch học của học sinh',
            'description' => 'Được phép xem thông tin lịch học tất cả học sinh',
            'accept' => ['ScheduleController@index'],
            'callback_function' => '',
        ],
        'schedule.edit' => [
            'name' => 'Sửa lịch học của học sinh',
            'description' => 'Được phép sửa thông tin lịch học tất cả học sinh',
            'accept' => ['ScheduleController@update', 'ScheduleController@edit'],
            'callback_function' => '',
        ],
        'student.publish' => [
            'name' => 'Xem danh sách học sinh publish',
            'description' => 'Xem danh sách học sinh publish',
            'accept' => ['ManagerStudentController@publish', 'ManagerStudentController@publishShow'],
            'callback_function' => '',
        ],
        
    ];
}

function function_calback(){
    $route = Request::segment(3);
    dd($route);
}

function hasRoleAccess($role, $permission){
    $permissions = RolePermission::where('role_slug', $role)->where('permission', $permission)->count();
    if( $permissions > 0 ){
        return true;
    }
    return false;
}

function userAccess($permission, $user = null){
    if( $user == null ){
        $user = currentUser();
    }
    if( hasRole('admin', $user) ){
        return true;
    }
    $permissions = RolePermission::where('role_slug', Common::getObject($user->role, 'slug'))->where('permission', $permission)->count();
    if( $permissions > 0 ){
        return true;
    }
    return false;
}

function hasRole($roleName, $user = null){
    if( $user == null ){
        $user = currentUser();
    }
    if( !$user ){
        return false;
    }
    if( Common::getObject($user->role, 'slug') == $roleName ){
        return true;
    }
    return false;
}

function currentUser(){
    $user = false;
    if( Auth::admin()->check() ){
        $user = Auth::admin()->get();
        $user->model = 'Admin';
    }
    if( Auth::teacher()->check() ){
        $user = Auth::teacher()->get();
        $user->model = 'Teacher';
    }
    return $user;
}

function renderUrl($action, $title, $parameter = [], $attribute = []){
    $link = app('html')->linkAction($action, $title, $parameter, $attribute);
    $user = currentUser();
    if( !$user ){
        return false;
    }
    if( hasRole(ADMIN, $user) ){
        return $link;
    }

    $checkPermission = false;
    foreach (getAllPermissions() as $permission => $value) {
        if( userAccess($permission, $user) && in_array($action, $value['accept']) ){
            $checkPermission = $value['accept'];
            break;
        }
    }
    if( $checkPermission ){
        return $link;
    }
    return false;
}
function getTimeId($time)
{
    $string = $time;
    $timestamp = strtotime($string);
    $day = date("l", $timestamp);
    if ($day == 'Sunday') {
        return CN;
    }
    if ($day == 'Monday') {
        return T2;
    }
    if ($day == 'Tuesday') {
        return T3;
    }
    if ($day == 'Wednesday') {
        return T4;
    }
    if ($day == 'Thursday') {
        return T5;
    }
    if ($day == 'Friday') {
        return T6;
    }
    if ($day == 'Saturday') {
        return T7;
    }
    return false;
}