<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            @if(userAccess('admin.view'))
            <li>
                <a href="{{ action('AdminController@index') }}">
                    <i class="fa fa-unlock-alt"></i> <span>Quản lý admin </span>
                </a>
            </li>
            @endif

            @if(userAccess('gmo.view'))
            <li>
                <a href="{{ action('AdminController@gmoIndex') }}">
                    <i class="fa fa-unlock-alt"></i> <span>Quản lý Gmo</span>
                </a>
            </li>
            @endif

            @if(userAccess('teacher.view'))
            <li>
                <a href="{{ action('ManagerTeacherController@index') }}">
                    <i class="fa fa-bullhorn"></i> <span>Quản lý teacher </span>
                </a>
            </li>
            @endif

            @if(userAccess('student.view'))
            <li>
                <a href="{{ action('ManagerStudentController@index') }}">
                    <i class="fa fa-graduation-cap"></i> <span>Quản lý student</span>
                </a>
            </li>
            @endif

            @if(userAccess('schedule.view'))
            <li>
                <a href="{{ action('ScheduleController@index') }}">
                    <i class="fa fa-flag-checkered"></i> <span>Quản lý lịch học</span>
                </a>
            </li>
            @endif

            @if(hasRole('admin'))
            <li>
                <a href="{{ action('PermissionController@index') }}">
                    <i class="fa fa-key"></i> <span>Phân quyền</span>
                </a>
            </li>
            <li class="treeview nav">
                <a href="#">
                    <i class="fa fa-flag"></i> <span>Thống kê</span>
                    <span class="pull-right-container"><i class="fa fa-angle-down pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ action('ExportController@getStudent') }}">
                            <i class="fa fa-download"></i> <span>Xuất dữ liệu học sinh</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ action('ExportController@getTeacher') }}">
                            <i class="fa fa-download"></i> <span>Xuất dữ liệu giáo viên</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ action('ExportController@getSale') }}">
                            <i class="fa fa-download"></i> <span>Xuất dữ liệu Sale</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if(hasRole('teacher'))
            <li>
                <a href="{{ action('PublishController@index') }}">
                    <i class="fa fa-key"></i> <span>Danh sách học sinh chung</span>
                </a>
            </li>
            <li>
                <a href="{{ action('PublishController@privateStudent') }}">
                    <i class="fa fa-key"></i> <span>Danh sách học sinh cá nhân</span>
                </a>
            </li>
            <li>
                <a href="{{ action('TeacherController@showSchedule') }}">
                    <i class="fa fa-key"></i> <span>Lịch dạy</span>
                </a>
            </li>
            @endif
        </ul>
    </section>
</aside>