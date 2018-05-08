<div class="mdui-col-md-6 mdui-col-lg-4">
    <div class="mdui-card activeArea">
        <a href="{{route('post.item',$post->id)}}">
            <div class="mdui-card-media card-background-image" style="background-image: url({{getCdn().$post->image}})">
                <div class="mdui-card-media-covered mdui-card-media-covered-gradient card-overlay">
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-subtitle"><span class="tag">{{$post->category}}</span></div>
                        <div class="mdui-card-primary-title card-title">{{$post->title}}</div>
                        <div class="mdui-card-primary-subtitle card-info hide activeContent">
                            {{$post->description}}
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>