<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">S.H.E</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="{{ asset('custom/img/logo1.png') }}" style="max-height: 50px;"></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Menu</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifi-dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o"></i> <span class="badge count-unread-notifi"></span></a>
                    <div class="dropdown-menu notification-area">
                        <ul class="nav menu list-notifications">
                            @foreach( CommonNotification::getUserNotification() as $value )
                                <li data-id="{{ $value->id }}" class="{{ ($value->read == 0 | !$value->read) ? 'unread' : '' }}">
                                    <p class="title">{{ $value->title }}</p>
                                    <p class="message">{{ str_limit($value->message, 100, '...') }}</p>
                                    <span class="date text-muted"><i>{{ date('H:i d/m/Y', strtotime($value->created_at)) }}</i></span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="notifi-footer cleafix text-center">
                            <a class="btn btn-default" id="view-all" href="#">{{ trans('common.see_all') }}</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{ trans('common.account') }}: {{ currentUser()->username }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            @if (currentUser()->model == 'Admin')
                                <a href="{{ action('AdminController@getResetPass', currentUser()->id) }}">{{ trans('common.change_pass') }}</a>
                            @endif
                            @if (currentUser()->model == 'Teacher')
                                <a href="{{ action('ManagerTeacherController@getResetPass', currentUser()->id) }}">{{ trans('common.change_pass') }}</a>
                            @endif
                        </li>
                    </ul>
                </li>
                <li class="user">
                    <a href="{{ action('AdminController@logout') }}"><i class="fa fa-power-off"></i> {{ trans('common.logout') }}</a>
                </li>
                <li class="user">
                    <a href="/vi"><i class=""></i> <img src="/vietnam.png" height="10" width="24"></a>
                </li>
                <li class="user">
                    <a href="/en"><i class=""></i> <img src="/england.jpeg" height="10" width="24"></a>
                </li>

            </ul>
        </div>
    </nav>
</header>