<?php
function getAllPermissions(){
    return [
        'admin.view' => [
            'name' => 'Xem danh sách quản trị viên',
            'description' => 'Được phép xem danh sách tất cả các quản trị viên của hệ thống. Chỉ trao quyền cho người đáng tin cậy',
            'accept' => ['AdminController@index'],
            'callback_function' => 'function_calback',
        ],
        'sale.view' => [
            'name' => 'Xem sale',
            'description' => 'Được phép xem danh sách tất cả các sale',
            'accept' => ['ManagerSaleController@index'],
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
        'student.approve' => [
            'name' => 'Approve, reject học sinh cho giáo viên',
            'description' => 'Approve, reject học sinh cho giáo viên',
            'accept' => ['ManagerStudentController@approveStudent', 'ManagerStudentController@rejectStudent', 'ManagerStudentController@waittingGmo'],
            'callback_function' => '',
        ],
        'student.sale' => [
            'name' => 'Dành riêng cho sale',
            'description' => 'Sale xem danh sách học sinh',
            'accept' => ['ManagerStudentController@saleStudent', 'ManagerStudentController@saleStudentMonth', 
                'ManagerStudentController@saleStudentPerMonth', 'ManagerStudentController@index'
            ],
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
                'PublishController@cancelStopScheduleStudent', 'ManagerStudentController@index'
            ],
            'callback_function' => '',
        ],

        'teacher.schedule' => [
            'name' => 'Xem lịch dạy',
            'description' => 'Xem lịch dạy',
            'accept' => ['TeacherController@showSchedule', 'TeacherController@showScheduleTime'],
            'callback_function' => '',
        ],
        'teacher.comment' => [
            'name' => 'Xem comment',
            'description' => 'Xem comment',
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
    if( Common::getObject($user->role, 'slug') == $roleName ){
        return true;
    }
    if ($user->model == 'Admin' && $user->role_id == 1) {
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
        return trans('common.not_study');
    }
    if ($status == CANCEL_LESSON) {
        return trans('common.lesson_cancel');
    }
    if ($status == WAIT_CONFIRM_FINISH) {
        return trans('common.lesson_not_confirm');
    }
    if ($status == FINISH_LESSON) {
        return trans('common.lesson_finish');
    }
    if ($status == CHANGE_LESSON) {
        return trans('common.lesson_change_schedule');
    }

    return null;
}

function getStatusLesson()
{
    $array = [
        '' => trans('common.chossen'),
        WAIT_CONFIRM_FINISH => trans('common.lesson_detail_wait_confirm'),
        // CANCEL_LESSON => trans('common.lesson_detail_cancel'),
        CHANGE_LESSON => trans('common.lesson_detail_change_schedule'),
    ];
    return $array;
}

function getDurationLesson()
{
    $array = [
        '' => trans('common.chossen'),
        30 => '30 '.trans('common.minute'), 
        60 => '60 '.trans('common.minute'), 
        90 => '90 '.trans('common.minute')
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

function checkPermissionBySlug($slug)
{
    $user = currentUser();
    if ($user->model == 'Teacher') {
        return false;
    }
    $role = Role::findBySlug($slug);
    if (!$role) {
        return false;
    }
    $roleId = $role->id;
    $admin = Admin::where('id', $user->id)
        ->where('role_id', $roleId)
        ->first();
    if (!$admin) {
        return false;
    }
    return true;
}
function getStartMonth()
{
    $monthStart = strtotime('first day of this month', time());
    return date("Y-m-d H:i:s", $monthStart);
}
function getEndMonth()
{
    $monthEnd = strtotime('last day of this month', time());
    return date("Y-m-d H:i:s", $monthEnd);
}
function getStartMonthPrevious()
{
    $monthStart = strtotime('FIRST DAY OF PREVIOUS MONTH', time());
    return date("Y-m-d H:i:s", $monthStart);
}
function getEndMonthPrevious()
{
    $monthEnd = strtotime('LAST DAY OF PREVIOUS MONTH', time());
    return date("Y-m-d H:i:s", $monthEnd);
}
function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
function convertMinToHours($min)
{
    $hours = round($min/60, 2);
    return $hours;
}
function checkRemain($student)
{
    $number = Common::getScheduleByStudent($student)->lesson_number - Common::getNumberLessonStatus(Common::getScheduleByStudent($student)->id, FINISH_LESSON);
    if ($number <= 5) {
        return true;
    }
    return false;
}

function stripVN($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);

    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    return $str;
}



// function backup_tables($tables = '*'){  /* backup the db OR just a table */
//     $host='localhost';
//     $user='root';
//     $pass='root';
//     $dbname='schedule_1';
//     $data = "";
//     //get all of the tables
//     if($tables == '*')
//     {
//         $tables = array();
//         $result = $this->dbc->prepare('SHOW TABLES'); 
//         $result->execute();                         
//         while($row = $result->fetch(PDO::FETCH_NUM)) 
//         { 
//             $tables[] = $row[0]; 
//         }
//     }
//     else
//     {
//         $tables = is_array($tables) ? $tables : explode(',',$tables);
//     }
//     //cycle through
//     foreach($tables as $table)
//     {
//         $resultcount = $this->dbc->prepare('SELECT count(*) FROM '.$table);
//         $resultcount->execute();
//         $num_fields = $resultcount->fetch(PDO::FETCH_NUM);
//         $num_fields = $num_fields[0];

//         $result = $this->dbc->prepare('SELECT * FROM '.$table);
//         $result->execute();
//         $data.= 'DROP TABLE '.$table.';';

//         $result2 = $this->dbc->prepare('SHOW CREATE TABLE '.$table);    
//         $result2->execute();                            
//         $row2 = $result2->fetch(PDO::FETCH_NUM);
//         $data.= "\n\n".$row2[1].";\n\n";

//         for ($i = 0; $i < $num_fields; $i++) 
//         {
//             while($row = $result->fetch(PDO::FETCH_NUM))
//             { 
//                 $data.= 'INSERT INTO '.$table.' VALUES(';
//                 for($j=0; $j<$num_fields; $j++) 
//                 {
//                     $row[$j] = addslashes($row[$j]); 
//                     $row[$j] = str_replace("\n","\\n",$row[$j]);
//                     if (isset($row[$j])) { $data.= '"'.$row[$j].'"' ; } else { $data.= '""'; }
//                     if ($j<($num_fields-1)) { $data.= ','; }
//                 }
//                 $data.= ");\n";
//             }
//         }
//         $data.="\n\n\n";
//     }
//     //save filename
//     $filename = 'db-backup.sql';
//     writeUTF8filename($filename,$data);
// /*USE EXAMPLE
//    $connection = new MySql(SERVERHOST,"your_db_name",DBUSER, DBPASS);
//    $connection->backup_tables(); //OR backup_tables("posts");
//    $connection->closeConnection();
// */
// } /*end function*/


// function writeUTF8filename($filenamename,$content){  /* save as utf8 encoding */
//     $f=fopen($filenamename,"w+"); 
//     # Now UTF-8 - Add byte order mark 
//     fwrite($f, pack("CCC",0xef,0xbb,0xbf)); 
//     fwrite($f,$content); 
//     fclose($f); 
// /*USE EXAMPLE this is only used by public function above...
//     $this->writeUTF8filename($filename,$data);
// */
// } /*end function*/




