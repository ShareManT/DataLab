@extends('layout.app')
@section('title',$post->title)
@section('css')
@endsection
@section('content')
    <div class="mdui-row">
        <div class="mdui-col-md-8 mdui-col-offset-md-2">
            <div class="mdui-card">
                <div class="mdui-card-media">
                    <img src="{{getCdn().$post->image}}"/>
                    <div class="mdui-card-media-covered mdui-card-media-covered-gradient card-overlay">
                        <div class="mdui-card-primary">
                            <div class="mdui-card-primary-subtitle card-info">
                                <span class="tag">{{$post->category}}</span>
                            </div>
                            <div class="mdui-card-primary-title card-title">{{$post->title}}</div>
                        </div>
                    </div>
                </div>
                <div class="mdui-card-content content">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function () {

        });
    </script>
@endsection