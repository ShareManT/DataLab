<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <title>@if($title) {{$title}} - @endif PC预览 - 锦城数据实验室</title>
    <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('vendor/jquery/jquery.qrcode.min.js')}}"></script>
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?ca626f87275090d71ff21c6ebfb820c1";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <style>
        html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td {
            margin: 0;
            padding: 0;
            border: 0;
            outline: 0;
            font-size: 100%;
            vertical-align: baseline;
            background: transparent
        }

        body {
            line-height: 1
        }

        ol, ul {
            list-style: none
        }

        :focus {
            outline: 0
        }

        a {
            text-decoration: none;
            color: #666666;
        }

        body {
            font-weight: 300;
            color: #333;
            background-image: url({{asset('images/bg.jpg')}});
            background-size: 100% auto;
        }

        .menu {
            background: rgba(255, 255, 255, .8);
            border-radius: 10px;
            border: 1px solid #CCCCCC;
            position: fixed;
            color: #999999;
            top: 20px;
            left: 20px;
            width: 300px;
            display: flex;
            text-align: center;
            flex-direction: column;
            justify-content: center;
            align-content: center;
        }

        .menu-item {
            padding: 20px;
            border-bottom: 1px solid #CCCCCC;
        }

        #iframe {
            margin-top: 0
        }

        #iframe-wrap {
            height: 100%;
            overflow: visible;
            position: relative;
            top: 0;
            z-index: 50
        }

        .tablet-width iframe {
            height: 960px !important
        }

        .mobile-width iframe {
            height: 704px !important
        }

        .mobile-width-2 {
            height: 540px !important;
            margin: 0 auto;
            padding: 102px 25px 159px 23px;
            width: 337px;
            margin-top: 5px;
            background: url({{asset('images/iphone.png')}}) no-repeat;
            transition: all 0.5s ease 0s;
        }

        .mobile-width-2 iframe {
            height: 585px !important
        }

        .mobile-width-3 iframe {
            height: 317px !important
        }

    </style>
</head>

<body>
<div class="menu">
    <div class="menu-item">
        <a href="{{route('index')}}">锦城数据实验室</a>
    </div>
    <div class="menu-item">
        <div id="output"></div>
    </div>
</div>
<div id="iframe-wrap" class="mobile-width-2">
    <iframe id="iframe" src="{{$url or route('index')}}" frameborder="0" width="100%"
            height="884px"></iframe>
</div>
<script>
    function disabledMouseWheel() {
        if (document.addEventListener) {
            document.addEventListener('DOMMouseScroll', scrollFunc, false);
        }//W3C
        window.onmousewheel = document.onmousewheel = scrollFunc;//IE/Opera/Chrome
    }

    function scrollFunc(evt) {
        return false;
    }

    window.onload = disabledMouseWheel;
    const url = '{{$url or route('index')}}';
    jQuery('#output').qrcode({width: 160, height: 160, text: url});
</script>
</body>
</html>