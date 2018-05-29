@extends( 'layout.html5' )
@section( 'title', '锦城2017饭卡消费记录' )
@section('header')
    <link rel="stylesheet" href="//cdn.soujincheng.com/card2017/css/reset.css">
    <link rel="stylesheet" href="//cdn.soujincheng.com/card2017/css/index.min.css">
    <script src="//cdn.soujincheng.com/card2017/js/rem.min.js"></script>
@endsection
@section( 'content' )
    <div id="wrap">
        <div id="app">
            <img class="title animated rubberBand" src="https://cdn.soujincheng.com/img/meal-card-index-title.png"
                 alt="">
            <a href="{{route('html5.auth',$project->slug)}}">
                <img class="view-button" src="https://cdn.soujincheng.com/img/page1-view-button.png" alt="立即查看">
            </a>
            <div class="view-bounce"></div>
        </div>
    </div>
@endsection