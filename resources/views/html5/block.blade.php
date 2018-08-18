@extends('layout.app')
@section('header')
    <style>footer {
            display: none !important;
        }</style>
@endsection
@section('content')
    <div class="mdui-col-md-4 mdui-col-offset-md-4">
        <div style="text-align:center;margin: 10px 0;border: 2px solid #cccccc;font-size: 0.85rem;border-radius: 5px;padding: 10px;color: #999999;">
            {{$project->name}}
            <p>
                数据还未正式发布，敬请期待！
            </p>
            <p>
                <span id="time">10</span>秒钟后将跳转回数据实验室首页。
            </p>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(function () {
            setTimeout(ChangeTime, 1000);
        });

        function ChangeTime() {
            let time;
            time = $("#time").text();
            time = parseInt(time);
            time--;
            if (time <= 0) {
                window.location.href = "{{route('index')}}";
            } else {
                $("#time").text(time);
                setTimeout(ChangeTime, 1000);
            }
        }
    </script>
@endsection