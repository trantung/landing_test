<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            @if(userAccess('admin.view'))
            <li>
                <a href="{{ action('AdminController@index') }}">
                    <i class="fa fa-unlock-alt"></i> <span>{{ trans('common.sidebar_manager_account') }}</span>
                </a>
            </li>
            @endif

            @if(userAccess('gmo.view'))
            <li>
                <a href="{{ action('AdminController@gmoIndex') }}">
                    <i class="fa fa-unlock-alt"></i> <span>{{ trans('common.sidebar_manager_gmo') }}</span>
                </a>
            </li>
            @endif
            @if(userAccess('sale.view'))
            <li>
                <a href="{{ action('ManagerSaleController@index') }}">
                    <i class="fa fa-bullhorn"></i> <span>{{ trans('common.sidebar_manager_sale') }}</span>
                </a>
            </li>
            @endif
            @if(userAccess('teacher.view'))
            <li>
                <a href="{{ action('ManagerTeacherController@index') }}">
                    <i class="fa fa-bullhorn"></i> <span>{{ trans('common.sidebar_manager_teacher') }}</span>
                </a>
            </li>
            @endif

            @if(userAccess('student.view'))
            <li>
                <a href="{{ action('ManagerStudentController@index') }}">
                    <i class="fa fa-graduation-cap"></i> <span>{{ trans('common.sidebar_manager_student') }}</span>
                </a>
            </li>
            @endif

            @if(hasRole('admin'))
            <li>
                <a href="{{ action('PermissionController@index') }}">
                    <i class="fa fa-key"></i> <span>{{ trans('common.sidebar_permission') }}</span>
                </a>
            </li>
            <li class="">
                <a href="{{ action('ExportController@getData') }}">
                    <i class="fa fa-flag"></i> <span>{{ trans('common.sidebar_report') }}</span>
                </a>
            </li>
            @endif
            @if(!hasRole('admin'))
                @if(hasRole('teacher'))
                <li>
                    <a href="{{ action('PublishController@index') }}">
                        <i class="fa fa-key"></i> <span>{{ trans('common.sidebar_student_list_new') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('PublishController@privateStudent') }}">
                        <i class="fa fa-key"></i> <span>{{ trans('common.sidebar_student_list_private') }}</span>
                    </a>
                </li>
                @endif
            @endif
            @if(!hasRole('admin'))
                @if(hasRole('sale'))
                <li>
                    <a href="{{ action('ManagerStudentController@saleStudent') }}">
                        <i class="fa fa-key"></i> <span>{{ trans('common.sidebar_student_list_all') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('ManagerStudentController@saleStudentMonth') }}">
                        <i class="fa fa-key"></i> <span>{{ trans('common.sidebar_student_report_current') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ action('ManagerStudentController@saleStudentPerMonth') }}">
                        <i class="fa fa-key"></i> <span>{{ trans('common.sidebar_student_report') }}</span>
                    </a>
                </li>

                @endif
            @endif
        </ul>
    </section>
</aside>