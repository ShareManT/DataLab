@extends('layout.app')
@section('header')
    <style>footer {
            display: none;
        }</style>
@endsection
@section('content')
    <div class="mdui-col-md-4 mdui-col-offset-md-4">
        <div style="text-align:center;margin: 10px 0;border: 2px solid #cccccc;font-size: 0.85rem;border-radius: 5px;padding: 10px;color: #999999;">
            {{$project->name}}
            <br>
            已有 <strong> “ {{$count}} ” </strong> 人查看了自己的数据报告
        </div>
        <form action="{{route('project.auth.check',$project->slug)}}" method="post">
            {{ csrf_field() }}
            <div class="mdui-textfield  mdui-textfield-floating-label">
                <i class="mdui-icon material-icons">credit_card</i>
                <label class="mdui-textfield-label">学号/教师号/工号</label>
                <input onkeyup="toUpperCase(this)" oninput="this.value=this.value.replace(/[\W]/g,'');"
                       class="mdui-textfield-input" type="text" name="stuId" required value="{{old('stuId')}}">
            </div>
            <div class="mdui-textfield  mdui-textfield-floating-label">
                <i class="mdui-icon material-icons">account_circle</i>
                <label class="mdui-textfield-label">姓名</label>
                <input class="mdui-textfield-input" type="text" name="name" required value="{{old('name')}}">
            </div>
            <div style="margin: 10px 0;border: 2px solid #cccccc;font-size: 0.85rem;border-radius: 5px;padding: 10px;color: #999999;">
                {{$project->copyright}}
            </div>
            <button class="mdui-btn mdui-btn-block mdui-color-indigo-accent mdui-ripple" type="submit"><i
                        class="mdui-icon material-icons">check</i> 授权开启我的数据报告
            </button>
        </form>
    </div>
@endsection
@section('footer')
    <script>function toUpperCase(obj) {
            obj.value = obj.value.toUpperCase()
        }</script>
@endsection