<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts._head')
    </head>
    <body class="hidden-sn mdb-skin">
        @include('layouts._nav')
        @if(Request::is('/'))
            @include('layouts._slider')
        @endif
        <div class="container-fluid">
            @yield('content')
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&autoLogAppEvents=1&version=v3.2&appId=781670632042941';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            @include('layouts._footer')
        </div>
        <!-- end of .container -->
        @include('layouts._script')
        <!-- add scripts -->
        @yield('scripts')
    </body>
</html>
