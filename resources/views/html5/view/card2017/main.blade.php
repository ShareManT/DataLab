@extends( 'layout.html5' )
@section( 'title',' 2017饭卡消费记录 - 锦城数据实验室' )
@section('header')
    <link rel="stylesheet" href="http://jcqsscdn.ochase.com/remote/card2017/css/app.min.css">
@endsection
@section( 'content' )
    <div class="loader">
        <div class="loader-inner">
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
        </div>
    </div>
    <div class="wrap">
        <div id="audio-btn" class="on" onclick="music.changeClass(this,'media')">
            <audio loop="loop" src="http://music.163.com/song/media/outer/url?id=29207827.mp3" id="media"
                   preload="preload"
                   autoplay></audio>
        </div>
        <div id="fullpage">
            <div class="section cgf-collageCost-bg">
                <div class="container7">
                    <p amt="animated slideInLeft"
                       class="title_one">你好，<span
                                id="userName" class="highlight"></span></p>
                    <p amt="animated slideInLeft" class="title_one animated slideInLeft">感谢开启你的2017饭卡数据报告</p>
                    <p amt="animated slideInLeft" class="title_one animated slideInLeft">在过去的2017年</p>
                    <p style="display: none;" amt="animated slideInLeft" class="title-collageCost-bg-three">
                        2017年全校饭卡消费近<span
                                class="night highlight ranks">[3]</span>亿元</p>
                    <p amt="animated slideInLeft" class="title-collageCost-bg-four">你消费了<span
                                class="night highlight ranks">[3000]</span>元</p>
                    <p amt="animated slideInLeft" class=" title-collageCost-bg-six">在全校排名为<span
                                class="over-all highlight ranks">[1564]</span>名</p>
                    <p amt="animated slideInLeft" class=" title-collageCost-bg-six">超过了全校<span
                                class="over-all highlight ranks">[12]</span>%的师生</p>
                    <p amt="animated slideInLeft" class="hint-text">
                        有效数据人数为 20,481 人。因六食堂数据系统为新系统，数据未统计在内。
                    </p>
                </div>
            </div>
            <div class="section cgf-Bed-bg">
                <div class="animated slideInUp cgf-two-bg" amt="animated slideInUp "></div>
                <div class="container1" amt="animated slideInUp ">
                    <p amt="animated slideInRight " class="title_three animated slideInRight "><span id="firstTime"
                                                                                                     class="highlight">[时间]</span>
                    </p>
                    <p amt="animated slideInLeft " class="title_one animated slideInLeft">新的一年，新的开始</p>
                    <p amt="animated slideInRight " class="title_four animated slideInRight">你在锦城<span id="firstPlace"
                                                                                                       class="highlight">[食堂名称]</span>
                    </p>
                    <p amt="animated slideInRight " class="title_four animated slideInRight">第一次使用饭卡</p>
                </div>
            </div>
            <div class="section cgf-sleep-bg">
                <div class="container2" amt=" animated slideInUp">
                    <p amt="animated slideInRight" class="title_three_sleep weather">
                        <span id="lastTime" class="highlight">[时间]</span>
                    </p>
                    <p amt="animated slideInLeft" class="title_one_sleep">
                        这是这一年 你最后一次
                    </p>
                    <p amt="animated slideInLeft" class="title_two_sleep">
                        在 锦城
                        <span id="lastPlace" class="highlight">[食堂名称]</span>
                        留下了刷卡痕迹
                    </p>
                    <p amt="animated slideInLeft" class="title_two_sleep">
                        17 年末，满载收获，憧憬 2018！
                    </p>

                </div>
            </div>
            <div class="section cgf-cost-bg">
                <div class="container3" amt=" animated slideInUp
        "><p amt="animated slideInRight" class="title_three_cost weather"><span
                                id="maxConsumeTime" class="highlight">[时间]</span></p>
                    <p amt="animated slideInRight" class="title_four_cost">WOW！这一天你花费了<span
                                id="maxConsumeMoney"
                                class="highlight">225</span>元
                    </p>
                    <p amt="animated slideInLeft" class="title_one_cost">这是你2017年饭卡消费最高的一天</p>
                    <p amt="animated slideInLeft" class="title_two_cost">这一天是因为...</p>
                    <p amt="animated slideInLeft" class="title_two_cost">心情好犒劳自己所以吃得特别多？</p>
                    <p amt="animated slideInLeft" class="title_two_cost">还是因为难过用食物排解郁闷？</p></div>
            </div>
            <div class="section cgf-costMoth-bg">
                <div class="container8" amt="animated rotateIn">
                    <p>饭卡每月消费</p>
                </div>
                <div class="datePiceker" amt="animated rollIn">
                    <div class="dateTable">
                        <div class="one-cost">
                            <div>
                                <div class="month-cost">1000元</div>
                                <div>一月</div>
                            </div>
                            <div>
                                <div class="month-cost">1000元</div>
                                <div>二月</div>
                            </div>
                            <div>
                                <div class="month-cost">1000元</div>
                                <div>三月</div>
                            </div>
                            <div>
                                <div class="month-cost">1000元</div>
                                <div>四月</div>
                            </div>
                        </div>
                        <div class="two-cost">
                            <div>
                                <div class="month-cost">1000元</div>
                                <div>五月</div>
                            </div>
                            <div>
                                <div class="month-cost">1000元</div>
                                <div>六月</div>
                            </div>
                            <div>
                                <div class="month-cost">1000元</div>
                                <div>七月</div>
                            </div>
                            <div>
                                <div class="month-cost">1000元</div>
                                <div>八月</div>
                            </div>
                        </div>
                        <div class="three-cost">
                            <div>
                                <div class="month-cost">1000元</div>
                                <div>九月</div>
                            </div>
                            <div>
                                <div class="month-cost">1000元</div>
                                <div>十月</div>
                            </div>
                            <div>
                                <div class="month-cost">1000元</div>
                                <div>十一月</div>
                            </div>
                            <div>
                                <div class="month-cost">1000元</div>
                                <div>十二月</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section cgf-costComponent-bg">
                <div class="container5">
                    <p amt="animated slideInUp" class="title-component-bg-two">这一年，你有好好吃饭吗？</p></div>
                <div class="components-site">
                    <div class="compose-list">
                        <div amt="animated rotateInDownLeft" class="compose-item" data-target="food-breakfast">
                            <div class="compose-item-inner">
                                <div class="compose-name"><p>早餐</p>
                                    <p><span id="breakfastNum"></span>次</p></div>
                                <div class="compose-introduction"><p>5:30-9:30</p>
                                    <small>点击查看详情</small>
                                </div>
                            </div>
                        </div>
                        <div amt="animated rotateInDownLeft" class="compose-item" data-target="food-brunch">
                            <div class="compose-item-inner">
                                <div class="compose-name"><p>早午餐</p>
                                    <p><span id="brunchNum"></span>次</p></div>
                                <div class="compose-introduction"><p>9:30-11:00</p>
                                    <small>点击查看详情</small>
                                </div>
                            </div>
                        </div>
                        <div amt="animated rotateInDownLeft" class="compose-item" data-target="food-lunch">
                            <div class="compose-item-inner">
                                <div class="compose-name"><p>午餐</p>
                                    <p><span id="lunchNum"></span>次</p></div>
                                <div class="compose-introduction"><p>11:00-14:00</p>
                                    <small>点击查看详情</small>
                                </div>
                            </div>
                        </div>
                        <div amt="animated rotateInDownLeft" class="compose-item" data-target="food-afternoon">
                            <div class="compose-item-inner">
                                <div class="compose-name"><p>下午茶</p>
                                    <p><span id="afternoonNum"></span>次</p></div>
                                <div class="compose-introduction"><p>14:00-16:30</p>
                                    <small>点击查看详情</small>
                                </div>
                            </div>
                        </div>
                        <div amt="animated rotateInDownLeft" class="compose-item" data-target="food-dinner">
                            <div class="compose-item-inner">
                                <div class="compose-name"><p>晚餐</p>
                                    <p><span id="dinnerNum"></span>次</p></div>
                                <div class="compose-introduction"><p>16:30-22:00</p>
                                    <small>点击查看详情</small>
                                </div>
                            </div>
                        </div>
                        <div amt="animated rotateInDownLeft" class="compose-item" data-target="food-latelight">
                            <div class="compose-item-inner">
                                <div class="compose-name"><p>夜宵</p>
                                    <p><span id="nightNum"></span>次</p></div>
                                <div class="compose-introduction"><p>22:00-24:00</p>
                                    <small>点击查看详情</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section cgf-position-bg"><img src="http://jcqsscdn.ochase.com/remote//card2017/img/one-to-three.png"
                                                      class="container4"/>
                <div class="position-text" amt="animated slideInDown">
                    <div class="container4-two">
                        <div class="one-text">
                            <div>早餐</div>
                            <div><span class="go-times">[29]</span></div>
                        </div>
                        <div class="one-text">
                            <div>早午餐</div>
                            <div><span class="go-times">[29]</span></div>
                        </div>
                        <div class="one-text">
                            <div>午餐</div>
                            <div><span class="go-times">[29]</span></div>
                        </div>
                    </div>
                    <div class="container4-four">
                        <div class="one-text">
                            <div>下午茶</div>
                            <div><span class="go-times">[29]</span></div>
                        </div>
                        <div class="one-text">
                            <div>晚餐</div>
                            <div><span class="go-times">[29]</span></div>
                        </div>
                        <div class="one-text">
                            <div>夜宵</div>
                            <div><span class="go-times">[29]</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section cgf-vacation-bg">
                <div class="container6">
                    <p class="vc-one" amt="animated rotateInDownLeft">你最长有连续 <span
                                class="no-card" id="gapDay">[天数]</span> 天没有使用饭卡
                    </p>
                    <p class="vc-one" amt="animated rotateInDownLeft">开始于 <span
                                class="no-card" id="gapStart">[开始时间]</span> 这一天
                    </p>
                    <p class="vc-one" amt="animated rotateInDownLeft">结束于 <span
                                class="no-card" id="gapEnd">[开结束时间]</span> 这一天
                    </p>
                    <p class="vc-one" amt="animated rotateInDownRight">你是宅在寝室还是正在过寒暑假呢?</p>
                    <p class="vc-one" amt="animated rotateInDownRight">饭卡正静静等待着新的旅程</p></div>
            </div>
            <div class="section cgf-connection-bg">
                <div class="container"><p>通过查看大数据运算结果</p>
                    <p>错峰出行，做一个优雅的吃货</p>
                    <div class="container-two-9" amt="animated rotateInDownLeft"><span class="title">饭点人流量高峰地点</span>
                        <p class="detail-btn">点我了解一下</p></div>
                    <div class="container-three-9" amt="animated rotateInDownRight"><span class="title">饭点人流量低峰地点</span>
                        <p class="detail-btn">点我打开秘籍</p></div>
                </div>
            </div>
            <div class="section cgf-all-bg">
                <div class="container11" amt="animated rotateIn"><!--总账单的饼图-->
                    <div id="container" style="height: 100%"></div>
                </div>
            </div>
            <div class="section cgf-costAttr-bg">
                <img id="keywordImg" class="keyword-img"
                     src="http://jcqsscdn.ochase.com/remote//img/KeyWordImage/KeyWordImage1.jpg"
                     alt="">
            </div>
            <div class="section cgf-mp-bg">
                <div class="container13">
                    <div class="team-text">
                        <div class="section personnel-list">
                            <div class="container" amt="animated slideInRight">
                                <div class="paragraph">
                                    <small>指导老师</small>
                                    <p>王科 杨杉 严张凌</p>
                                </div>
                                <div class="paragraph">
                                    <small>平台 · 团建 · 后端</small>
                                    <p>曾小满 彭伟</p>
                                </div>
                                <div class="paragraph">
                                    <small>HTMl5 开发 · 前端</small>
                                    <p>王治文 曾小满 陈国峰</p>
                                </div>
                                <div class="paragraph">
                                    <small>UI · 平面 · 原画版权</small>
                                    <p>王腾达</p>
                                </div>
                                <div class="paragraph">
                                    <small>数据 清洗 · 关联 · 处理</small>
                                    <p>胡鋼 许彭戈飏 赖思成 兰玉 张颖 唐萍 张星鹭</p>
                                </div>
                                <div class="paragraph">
                                    <small>宣传协助</small>
                                    <p>郝晨露 郭倍余 陈龙 杜柳宜</p>
                                    <p>陈旭东 陈家俊 林弟忠 马秘 薛然 钟锦锋</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section cgf-end-bg">
                <div class="once-watch"></div>
                <div class="share-btn"></div>
                <div class="share-friend-btn"></div>
                <div amt="animated slideInUp"></div>
            </div>
        </div>
        <img class="arrow-down" src="http://jcqsscdn.ochase.com/remote//img/arrow.png">
        <div class="info-more" style="display: none;">
            <div class="info-title">查看详情</div>
            <div id="share-panel-inner" style="height: 300px;overflow: auto; padding: 0.2rem"><!--所有查看详情列表共享此面板-->
                <!--早饭-->
                <div class="food-breakfast" style="display: none;"></div>
                <!--早午饭-->
                <div class="food-brunch" style="display: none">早午饭</div>
                <!--午饭-->
                <div class="food-lunch" style="display: none">午饭</div>
                <!--下午茶-->
                <div class="food-afternoon" style="display: none">下午茶</div>
                <!--晚饭-->
                <div class="food-dinner" style="display: none">晚饭</div>
                <!--夜宵-->
                <div class="food-latelight" style="display: none">夜宵</div>
                <!--人流量最大-->
                <div class="max-heatmap" style="display: none"></div>
                <!--人流量最小-->
                <div class="min-heatmap" style="display: none"></div>
            </div>
            <div class="info-cancel-btn">关闭</div>
        </div>
        <div class="share-panel">
            <div class="share-panel-inner">
                <div class="s-share" style="display: none;"><p class="section-title">社交分享</p>
                    <div class="social-list" data-mode="prepend" data-description="">
                        <a href="javascript:;" id="copyBtn" class="social-share-icon icon-link"
                           data-clipboard-text=""></a>
                    </div>
                </div>
                <div class="public-share" style="display: none;"><p class="section-title">公开分享</p>
                    <p class="tips">公开分享你的饭卡消费记录给好友，你的好友可通过加密连接可直接访问到你的数据。</p>
                    <div class="copy-area">
                        {{$shareUrl or '暂时无法生成'}}
                        <button id="copyPublicBtn" class="copy-btn" data-clipboard-text="">复制</button>
                    </div>
                </div>
            </div>
            <div class="share-cancel-btn">关闭</div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        const apiUrl = '/api/data/MealCard?id={{$id}}&name={{$name}}';
        const shareUrl = '{{$shareUrl}}';
        const projectUrl = '{{route('html5.view',$project->slug)}}';
    </script>
    <script src="http://jcqsscdn.ochase.com/remote/card2017/js/app.min.js"></script>
    <script src="http://jcqsscdn.ochase.com/remote/card2017/js/echarts.min.js"></script>
    <script src="{{asset('assets/card2017/js/core.js')}}?{{time()}}"></script>
@endsection