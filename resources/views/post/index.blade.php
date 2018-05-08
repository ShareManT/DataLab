@extends('layout.app')
@section('content')
    <div class="mdui-row">
        @each('post.item',$posts,'post')
    </div>
@endsection
@section('js')
@endsection