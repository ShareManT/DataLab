<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title'){{env('APP_NAME')}}</title>
    <meta name="keywords" content="{{config('siteKeywords')}},@yield('keywords')">
    <meta name="description" content="{{config('siteDescription')}} @yield('description')">
    <link rel="stylesheet" type="text/css" href="{{mix('/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{mix('/css/packages.css')}}">
    @yield('header')
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?ca626f87275090d71ff21c6ebfb820c1";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body style="background-image: url({{asset('images/bg.jpg')}});background-size: 100% auto;">
<header>
    @include('layout.header')
</header>
<main>
    <div class="mdui-container">
        @yield('content')
    </div>
</main>
<footer>
    @include('layout.footer')
</footer>
<script type="text/javascript" src="{{mix('/js/packages.js')}}"></script>
<script>
    $(document).ready(function () {
        $(".activeArea").hover(function () {
            $(this).find(".activeContent").fadeToggle(300).toggleClass("hide");
        });
    });
</script>
@include('component.notify')
@yield('footer')
</body>
</html>
