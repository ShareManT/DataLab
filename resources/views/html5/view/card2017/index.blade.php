@extends( 'layout.html5' )
@section( 'title', '锦城2017饭卡消费记录' )
@section('header')
    <link rel="stylesheet" href="http://jcqsscdn.ochase.com/remote/card2017/css/reset.css">
    <link rel="stylesheet" href="http://jcqsscdn.ochase.com/remote/card2017/css/index.min.css">
    <script src="http://jcqsscdn.ochase.com/remote/card2017/js/rem.min.js"></script>
@endsection
@section( 'content' )
    <div id="wrap">
        <div id="app">
            <img class="title animated rubberBand" src="http://jcqsscdn.ochase.com/remote//img/meal-card-index-title.png"
                 alt="">
            <a href="{{route('html5.auth',$project->slug)}}">
                <img class="view-button" src="http://jcqsscdn.ochase.com/remote//img/page1-view-button.png" alt="立即查看">
            </a>
            <div class="view-bounce"></div>
        </div>
    </div>
@endsection