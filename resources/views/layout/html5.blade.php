<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="keywords" content="{{config('siteKeywords')}},@yield('keywords')">
    <meta name="description" content="{{config('siteDescription')}} @yield('description')">
    @yield('header')
    <script>
        const directUrl = '{{URL::current()}}';
        if (self == top) {
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            } else {
                window.location = "/webView?url=" + directUrl;
            }
        }
        let _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?ca626f87275090d71ff21c6ebfb820c1";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body>
@yield('content')
@yield('footer')
</body>
</html>
