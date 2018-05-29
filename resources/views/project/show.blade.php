@extends( 'layout.app' )
@section( 'title',$project->name." - 项目")
@section( 'content')
    <div class="mdui-col-md-8 mdui-col-offset-md-2">
        <div class="mdui-card activeArea card-margin">
            <a href="{{route('project.item',$project->id)}}">
                <div class="mdui-card-media card-background-image"
                     style="background-image: url({{getCdn().$project->image}})">
                    <div class="mdui-card-media-covered mdui-card-media-covered-gradient card-overlay">
                        <div class="mdui-card-primary">
                            <div class="mdui-card-primary-subtitle"><span
                                        class="tag">{{$project->type.' / '.$project->category}}</span></div>
                            <div class="mdui-card-primary-title card-title">{{$project->name}}</div>
                            <div class="mdui-card-primary-subtitle">
                                <small>
                                    {{$project->created_at->format('Y年m月d日').' / '.$project->created_at->diffForHumans()}}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <div class="mdui-card-content content">
                @if($project->progress == '100')
                    @if($project->url)
                        <a href="{{$project->url}}" target="_blank">
                            <button class="mdui-btn mdui-btn-block mdui-color-indigo mdui-ripple">
                                进入项目
                            </button>
                        </a>
                    @else
                        <a href="{{route('html5.view',$project->slug)}}" target="_blank">
                            <button class="mdui-btn mdui-btn-block mdui-color-indigo mdui-ripple">
                                进入项目
                            </button>
                        </a>
                    @endif
                @else
                    <button class="mdui-btn mdui-btn-block mdui-color-indigo-accent mdui-ripple">
                        项目进度 <strong>100%</strong> 时才可预览
                    </button>
                @endif

                <div class="title">项目信息</div>
                项目进度：{{$project->progress or '暂无记录'}} %
                <br>
                项目状态：{{$project->status or '暂未更新'}}
                <div class="title">项目内容</div>
                {{$project->description}}
                <br>
                {!! $project->content !!}
                <div class="title">项目人员</div>
                {{$project->coworker or '暂无人员记录'}}
                <div class="title">权利说明</div>
                {{$project->copyright or '暂无特殊权利说明'}}
            </div>
        </div>
    </div>
@endsection
@section( 'footer')
    <script>
        $(".content").find("img").each(function () {
            $(this).attr('class', 'materialboxed');
        });
    </script>
@endsection