<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            @if(userAccess('admin.view'))
            <li>
                <a href="{{ action('AdminController@index') }}">
                    <i class="fa fa-unlock-alt"></i> <span>Quản lý thành viên</span>
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
                    <i class="fa fa-bullhorn"></i> <span>Quản lý teacher</span>
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

            @if(hasRole('admin'))
            <li>
                <a href="{{ action('PermissionController@index') }}">
                    <i class="fa fa-key"></i> <span>Phân quyền</span>
                </a>
            </li>
            <li class="">
                <a href="{{ action('ExportController@getData') }}">
                    <i class="fa fa-flag"></i> <span>Báo cáo / thống kê</span>
                </a>
            </li>
            @endif
            @if(!hasRole('admin'))
                @if(hasRole('teacher'))
                <li>
                    <a href="{{ action('PublishController@index') }}">
                        <i class="fa fa-key"></i> <span>Danh sách học sinh mới</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('PublishController@privateStudent') }}">
                        <i class="fa fa-key"></i> <span>Danh sách học sinh cá nhân</span>
                    </a>
                </li>
                @endif
            @endif
            @if(!hasRole('admin'))
                @if(hasRole('sale'))
                <li>
                    <a href="{{ action('ManagerStudentController@saleStudent') }}">
                        <i class="fa fa-key"></i> <span>Danh sách học sinh tất cả</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('ManagerStudentController@saleStudentMonth') }}">
                        <i class="fa fa-key"></i> <span>Thống kê học sinh hiện tại</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('ManagerStudentController@saleStudentPerMonth') }}">
                        <i class="fa fa-key"></i> <span>Thống kê học sinh</span>
                    </a>
                </li>

                @endif
            @endif
        </ul>
    </section>
</aside>