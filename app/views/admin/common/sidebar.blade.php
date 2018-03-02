<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ action('AdminController@index') }}">
                    <i class="fa fa-newspaper-o"></i> 
                    <span>Quản lý admin </span>
                </a>
            </li>
            <li>
                <a href="{{ action('ManagerTeacherController@index') }}">
                    <i class="fa fa-newspaper-o"></i> 
                    <span>Quản lý teacher </span>
                </a>
            </li>
             <li>
                <a href="{{ action('ManagerStudentController@index') }}">
                    <i class="fa fa-newspaper-o"></i> 
                    <span>Quản lý student 1</span>
                </a>
            </li>
            
        </ul>
    </section>
</aside>
