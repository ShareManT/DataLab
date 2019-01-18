@extends( 'layout.html5' )
@section( 'title', '锦城2017阅读报告' )
@section('header')
    <link rel="stylesheet" href="//jcqsscdn.ochase.com/remote/library2017/css/vendor/normalize.min.css">
    <link rel="stylesheet" href="//jcqsscdn.ochase.com/remote/library2017/css/vendor/animate.min.css">
    <link rel="stylesheet" href="//jcqsscdn.ochase.com/remote/library2017/css/common.css">
    <link rel="stylesheet" href="//jcqsscdn.ochase.com/remote/library2017/css/index.css">
    <script src="//jcqsscdn.ochase.com/remote/library2017/js/rem-resize.js"></script>
@endsection
@section( 'content' )
    <div id="wrap">
        <div id="app">
            <img class="title animated fadeInRight" src="//jcqsscdn.ochase.com/remote/library2017/img/page1-title.png"
                 alt="有一份您与锦城图书馆的故事待领取">
            <a href="{{route('html5.auth',$project->slug)}}"><img class="view-button"
                                       src="//jcqsscdn.ochase.com/remote/library2017/img/page1-view-button.png" alt="立即查看"></a>
            <div class="view-bounce"></div>
        </div>
    </div>
@endsection