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
            'accept' => ['PublishController@index'],
            'callback_function' => '',
        ],
        'student.publish_show' => [
            'name' => 'Xem chi tiết học sinh publish',
            'description' => 'Xem chi tiết học sinh publish',
            'accept' => ['PublishController@show','PublishController@update', 
                'PublishController@privateStudent', 'PublishController@showScheduleStudent',
                'PublishController@showScheduleDetail','PublishController@updateScheduleDetail',
                'PublishController@stopScheduleStudent', 'PublishController@postStopScheduleStudent',
                'PublishController@cancelStopScheduleStudent'
            ],
            'callback_function' => '',
        ],

        'teacher.schedule' => [
            'name' => 'Xem lịch dạy',
            'description' => 'Xem lịch dạy',
            'accept' => ['TeacherController@showSchedule'],
            'callback_function' => '',
        ],
        'teacher.comment' => [
            'name' => 'Xem lịch dạy',
            'description' => 'Xem lịch dạy',
            'accept' => ['TeacherController@commentTeacher'],
            'callback_function' => '',
        ],

    ];
}

function function_calback(){
    $route = Request::segment(3);
    // dd($route);
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
    if( Common::getObject($user->role, 'slug') == $roleName | Common::getObject($user->role, 'slug') == 'admin' ){
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

function renderUrl($action, $title, $parameter = [], $attributes = []){
    $link = '<a href="'.action($action, $parameter).'"'.HTML::attributes($attributes).'>'.$title.'</a>';
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

function getRoleIdBySlug($slug)
{   
    if ( !Cache::has('role_'.$slug) ){
        $role = Role::findBySlug($slug);
        Cache::put('role_'.$slug, $role, 15);
    }
    $role = Cache::get('role_'.$slug);

    if ($role) {
        return $role->id;
    }
    return null;
}

function getRoleNameById($id)
{   
    if ( !Cache::has('role_name_'.$id) ){
        $role = Role::find($id);
        Cache::put('role_name_'.$id, $role, 15);
    }
    $role = Cache::get('role_name_'.$id);

    if ($role) {
        return $role->name;
    }
    return null;
}

function getRoleAdmin()
{
    if ( !Cache::has('role_list') ){
        $roles = Role::lists('name', 'id');
        Cache::put('role_list', $roles, 30);
    }
    $roles = Cache::get('role_list');
    return $roles;
}

function getStatusScheduleDetail($status)
{
    if ($status == REGISTER_LESSON) {
        return 'Chưa học';
    }
    if ($status == CANCEL_LESSON) {
        return 'Huỷ buổi học';
    }
    if ($status == WAIT_CONFIRM_FINISH) {
        return 'Học sinh chưa xác nhận';
    }
    if ($status == FINISH_LESSON) {
        return 'Hoàn thành học';
    }
    if ($status == CHANGE_LESSON) {
        return 'Đã thay đổi lịch học';
    }

    return null;
}
function getStatusLesson()
{
    $array = [
        '' => 'Chọn',
        WAIT_CONFIRM_FINISH => 'Xác nhận hoàn thành',
        CANCEL_LESSON => 'Huỷ',
        CHANGE_LESSON => 'Thay đổi lịch học',
    ];
    return $array;
}
function getDurationLesson()
{
    $array = [
        '' => '-- Chọn --',
        30 => '30 phút', 
        60 => '60 phút', 
        90 => '90 phút'
    ];
    return $array;
}
function generateRandomString($length = 16) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}