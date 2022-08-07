<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.front_partials.head')
    </head>

    <body>
        <!-- Top Bar Start -->
        @include('layouts.front_partials.header')


        @yield('content')

        <!-- Footer Start -->
        @include('layouts.front_partials.footer')
        <!-- Footer End -->



        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        @include('layouts.front_partials.scripts')
    </body>
</html>
