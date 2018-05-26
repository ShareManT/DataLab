@extends( 'layout.html5' )
@section( 'title', '锦城2017阅读报告' )
@section('header')
    <link rel="stylesheet" href="//cdn.soujincheng.com/src/css/vendor/normalize.min.css">
    <link rel="stylesheet" href="//cdn.soujincheng.com/src/css/vendor/animate.min.css">
    <link rel="stylesheet" href="//cdn.soujincheng.com/src/css/common.css">
    <link rel="stylesheet" href="//cdn.soujincheng.com/src/css/index.css">
    <script src="//cdn.soujincheng.com/src/js/rem-resize.js"></script>
@endsection
@section( 'content' )
    <div id="wrap">
        <div id="app">
            <img class="title animated fadeInRight" src="//cdn.soujincheng.com/img/page1-title.png"
                 alt="有一份您与锦城图书馆的故事待领取">
            <a href="{{route('project.auth',$project->slug)}}"><img class="view-button"
                                       src="//cdn.soujincheng.com/img/page1-view-button.png" alt="立即查看"></a>
            <div class="view-bounce"></div>
        </div>
    </div>
@endsection