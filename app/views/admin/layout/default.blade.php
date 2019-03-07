<!DOCTYPE html>
<html>
@include('admin.common.header')
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include('admin.common.navbar')
        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.common.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('title')
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2018</strong>
        </footer>

    </div>
    <!-- ./wrapper -->

    @include('admin.common.footer')
</body>
</html>