<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">S.H.E</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="{{ asset('custom/img/logo.png') }}" style="max-height: 50px;"></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Menu</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{ currentUser()->username }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            @if (currentUser()->model == 'Admin')
                                <a href="{{ action('AdminController@getResetPass', currentUser()->id) }}">Thay mật khẩu</a>
                            @endif
                            @if (currentUser()->model == 'Teacher')
                                <a href="{{ action('ManagerTeacherController@getResetPass', currentUser()->id) }}">Thay mật khẩu</a>
                            @endif
                        </li>
                    </ul>
                </li>
                <li class="user">
                    <a href="{{ action('AdminController@logout') }}"><i class="fa fa-power-off"></i> Đăng xuất</a>
                </li>
            </ul>
        </div>
    </nav>
</header>