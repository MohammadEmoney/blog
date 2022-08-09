<!DOCTYPE html>
<html lang="fa">
    <head>
        @include('layouts.admin_partials.head')
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Top Bar Start -->
            @include('layouts.admin_partials.header')

            @include('layouts.admin_partials.sidebar')
             <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- Footer Start -->
            @include('layouts.admin_partials.footer')
        <!-- Footer End -->
        </div>
        @include('layouts.admin_partials.scripts')
    </body>
</html>
