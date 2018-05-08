<div class="mdui-bottom-nav mdui-bottom-nav-scroll-hide mdui-headroom mdui-headroom-pinned-down shadow">
    @foreach(getMenuDisplay() as $nav)
        <a href="/{{$nav->link}}"
           class="mdui-ripple @if(strpos(Request::path(),$nav->link) !== false or strpos(Route::currentRouteName(),$nav->link)!== false) mdui-bottom-nav-active @endif">
            <i class="mdui-icon material-icons">{{$nav->icon}}</i>
            <label>{{$nav->name}}</label>
        </a>
    @endforeach
</div>