@extends('layout.app')
@section('header')
    <style>header .mdui-appbar {
            display: none;
        }</style>
@endsection
@section('content')
    <div id="slide">
        <img src="{{asset('images/logo_white.png')}}">
        <div class="container">
            <span class="rotate">{{Config("welcomeText")}}</span>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function () {
            $('body').backstretch([
                "{{getCdn().'cover/cover1.jpg'}}",
                "{{getCdn().'cover/cover2.jpg'}}",
                "{{getCdn().'cover/cover3.jpg'}}",
                "{{getCdn().'cover/cover5.jpg'}}"
            ], {
                fade: 800,
                duration: 2600
            });
            $(".rotate").textrotator({
                animation: "fade",
                separator: ",",
                speed: 1800
            });
        });
    </script>
@endsection