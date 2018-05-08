<div class="mdui-col-md-8 mdui-col-offset-md-2">
    <div class="mdui-card activeArea">
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
                        <div class="mdui-card-primary-subtitle card-info hide activeContent">
                            {{$project->description}}
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>