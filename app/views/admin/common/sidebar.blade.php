<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ action('AdminController@index') }}">
                    <i class="fa fa-unlock-alt"></i> 
                    <span>Quản lý admin </span>
                </a>
            </li>
            <li>
                <a href="{{ action('ManagerTeacherController@index') }}">
                    <i class="fa fa-bullhorn"></i> 
                    <span>Quản lý teacher </span>
                </a>
            </li>
             <li>
                <a href="{{ action('ManagerStudentController@index') }}">
                    <i class="fa fa-graduation-cap"></i> 
                    <span>Quản lý student</span>
                </a>
            </li>
             <li>
                <a href="{{ action('PermissionController@index') }}">
                    <i class="fa fa-key"></i> 
                    <span>Phân quyền</span>
                </a>
            </li>
            
        </ul>
    </section>
</aside>
