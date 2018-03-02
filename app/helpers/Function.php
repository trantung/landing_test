<?php
function getAllPermissions(){
    return [
        'admin.view' => [
            'name' => 'Xem danh sách quản trị viên',
            'description' => 'Được phép xem danh sách tất cả các quản trị viên của hệ thống. Chỉ trao quyền cho người đáng tin cậy',
            'accept' => ['AdminController@index'],
            'callback_function' => '',
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
    ];
}

function userAccess($permission, $user = null){
    if( $user == null ){
        $user = currentUser();
    }
    if( hasRole('admin', $user) ){
        // return true;
    }
    $permissions = RolePermission::where('role_id', $user->role_id)->where('permission', $permission)->count();
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
    if( Auth::user()->check() ){
        $user = Auth::user()->get();
        $user->model = 'User';
    }
    return $user;
}