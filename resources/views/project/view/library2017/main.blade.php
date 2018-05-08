@extends( 'layout.html5' )
@section( 'title', $resultDatas->name.' 2017阅读报告 - 锦城数据实验室' )
@section('header')
    <link rel="stylesheet" href="http://p7oyh7h4h.bkt.clouddn.com/src/css/vendor/normalize.min.css">
    <link rel="stylesheet" href="http://p7oyh7h4h.bkt.clouddn.com/src/css/vendor/animate.min.css">
    <link rel="stylesheet" href="http://p7oyh7h4h.bkt.clouddn.com/src/css/common.css?{{time()}}">
    <link rel="stylesheet" href="http://p7oyh7h4h.bkt.clouddn.com/src/css/vendor/share.min.css">
    <link rel="stylesheet" href="http://p7oyh7h4h.bkt.clouddn.com/src/css/page.css?{{time()}}">
    <script src="http://p7oyh7h4h.bkt.clouddn.com/src/js/rem-resize.js"></script>
    <style>
        @media (max-height: 600px) {
            .hide-on-small-screen {
                display: none;
            }
        }
    </style>
@endsection
@section( 'content' )
    <div id="wrap">
        <div id="app">
            <div class="section page2">
                <img class="title" src="http://p7oyh7h4h.bkt.clouddn.com/img/page2-title.png" alt="图书馆">
                <img class="bg-bookcase component animated fadeInRight" data-animate="fadeInRight"
                     src="http://p7oyh7h4h.bkt.clouddn.com/img/page2-bookcase.png"
                     alt="书架">
                <img class="bg-chair component animated fadeInLeft" data-animate="fadeInLeft"
                     src="http://p7oyh7h4h.bkt.clouddn.com/img/page2-chair.png"
                     alt="读书的人和椅子">
                <img class="bg-clock" src="http://p7oyh7h4h.bkt.clouddn.com/img/page2-clock.png" alt="时钟">
                <div class="content component animated fadeInLeft" data-animate="fadeInLeft">
                    <p style="font-size: 22px">{{$resultDatas->name or ''}}
                        <small>，你好！</small>
                    </p>
                    <p>欢迎开启你的锦城2017阅读报告。</p>
                    <p class="mt-2">你也许会惊讶，<br>锦大图书馆竟藏着
                        <span class="p-8 f-18 c-stress">1,263,355</span>本图书</p>
                    <p class="mt-2">在过去的2017年
                        <br>锦大学子共借阅了
                        <span class="p-8 f-18 c-stress">103,461</span>册图书
                        <br>同学们进出图书馆共
                        <span class="p-8 f-18 c-stress">68,0374</span>次</p>
                </div>
            </div>
            <div class="section page3">
                <img class="title" src="http://p7oyh7h4h.bkt.clouddn.com/img/page3-title.png" alt="热门图书">
                <div class="content">
                    <p>
                        <span class="f-18 c-stress">2017年</span>
                    </p>
                    @if(isset($borrowDatas->books))
                        <p class="mt-2">
                            我借过的书有
                        </p>
                        <div class="mt-2 scrollArea" style="height: 120px;">
                            @foreach (explode('##',$borrowDatas->books) as $book)
                                <span class="tag-book">《 {{$book or ''}} 》</span>
                            @endforeach
                        </div>
                        <div class="more-borrow activeBottom">查看全部</div>
                    @else
                        <p class="mt-2">
                            我没有借过较为热门的书籍
                        </p>
                    @endif
                    <p class="mt-8">
                        锦城图书馆最热门的图书是
                    </p>
                    <div class="mt-2">
                        <span class="tag-book">三宫演义<small> 75</small></span>
                        <span class="tag-book">数字时代的大字<small> 53</small></span>
                        <span class="tag-book">解忧杂货店<small> 43</small></span>
                        <span class="tag-book">围城<small> 40</small></span>
                        <span class="tag-book">三体:“地球往事”三部曲之一<small> 39</small></span>
                        <span class="tag-book">活著<small> 39</small></span>
                        <span class="tag-book">麦田里的守望窖<small> 34</small></span>
                        <span class="tag-book">三体,黒暗森林<small> 33</small></span>
                        <span class="tag-book">许三观卖血记<small> 32</small></span>
                        <span class="tag-book">阿獅它佛么么哒<small> 31</small></span>
                        <span class="tag-book">线性代数辅导:同济版<small> 31</small></span>
                        <span class="tag-book">兄弟<small> 30</small></span>
                        <span class="tag-book">许三观卖血记<small> 29</small></span>
                    </div>
                </div>
            </div>
            <div class="section page4">
                <img class="title" src="http://p7oyh7h4h.bkt.clouddn.com/img/page4-title.png" alt="第一本书">
                <div class="content component animated" data-animate="fadeInLeft">
                    <p>我在图书馆借的第一本书是在</p>
                    <p class="mt-2">
                        <span class="p-8 f-18 c-stress">{{$resultDatas->firstArrive or '神秘时间' }} {{$resultDatas->week or '神秘的一天' }}</span>
                    </p>
                    <p class="mt-2">
                        那天天气
                        <span class="p-8 f-18 c-stress">{{$resultDatas->weather or '未知天气' }}
                            ，{{$resultDatas->minTmp or '未知' }}~{{$resultDatas->maxTmp or '未知' }}</span>
                    </p>

                    <p class="mt-8">书名是
                        <span class="p-8 f-18 c-stress"><small>《 </small>{{$resultDatas->firstBook or '未知书籍' }}
                            <small> 》</small></span>
                    </p>
                    <p class="mt-2">这本书也被
                        <span class="p-8 f-18 c-stress">{{$resultDatas->similarPersonCount or '0' }}</span>人借阅过
                    </p>
                </div>
                <img class="wave-black1 component animated" data-animate="slideInRight"
                     src="http://p7oyh7h4h.bkt.clouddn.com/img/page4-wave-black1.png"
                     alt="">
                <img class="wave-black2 component animated" data-animate="fadeInRight"
                     src="http://p7oyh7h4h.bkt.clouddn.com/img/page4-wave-black2.png"
                     alt="">
            </div>
            <div class="section page8">
                <img class="title" src="http://p7oyh7h4h.bkt.clouddn.com/img/page8-title.png" alt="我借过的书">
                <img class="circular component animated" data-animate="fadeInDown"
                     src="http://p7oyh7h4h.bkt.clouddn.com/img/page8-circular.png">
                <div class="content component animated" data-animate="fadeInLeft">
                    <p>
                        <span class="f-18 c-stress">2017年</span>
                    </p>
                    <p class="mt-2">
                        我在锦城图书馆共借阅
                        <span class="p-8 f-18 c-stress">{{$resultDatas->borrowCount or ''}}</span>
                        本书
                    </p>
                    <p class="mt-2">
                        我因此节约了
                        <span class="p-8 f-18 c-stress">{{$resultDatas->allPrice or ''}}</span>
                        元
                    </p>
                    <p class="mt-2">
                        <span class="p-8 f-18 c-stress">“{{$resultDatas->department or ''}}”</span>
                    </p>
                    <p class="mt-2">平均借阅量为
                        <span class="p-8 f-18 c-stress">{{$resultDatas->departmentAverage or ''}}</span>
                        本书</p>
                    <p class="mt-8">
                        请相信
                    </p>
                    <p class="mt-2">
                        爱读书的你会因为读书而受益终身
                    </p>
                </div>
            </div>
            <div class="section page9">
                <img class="title" src="http://p7oyh7h4h.bkt.clouddn.com/img/page9-title.png" alt="图书馆的日子">
                <div class="content component animated" data-animate="fadeInLeft">
                    <p>
                        <span class="f-18 c-stress">2017年</span>
                    </p>
                    <p class="mt-2">
                        我第一次进图书馆是在
                        <span class="p-8 f-18 c-stress">{{$firstEnterData->date or '日期不详'}} {{$firstEnterData->time or '时间不详'}}</span>
                    </p>
                    <p class="mt-2">
                        我最高连续进入图书馆
                        <span class="p-8 f-18 c-stress">{{$enterDatas->count or '0'}}</span>
                        天
                    </p>
                    <p class="mt-2">
                        在图书馆共学习了
                        <span class="p-8 f-18 c-stress">{{$timeDatas->time or '0'}}</span>
                        小时
                    </p>
                    <p class="mt-8">
                        图书馆学习的日子 孤独，却从不孤独
                    </p>
                    <p class="mt-2">
                        因为有书陪伴
                    </p>
                </div>
            </div>
            <div class="section page5">
                <img class="title" src="http://p7oyh7h4h.bkt.clouddn.com/img/page5-title.png" alt="">
                <img class="wave component animated" data-animate="fadeInDown"
                     src="http://p7oyh7h4h.bkt.clouddn.com/img/page5-wave.png">
                <div class="content component animated" data-animate="fadeInLeft">
                    <p class="mt-2">我所在的学院年级/部门</p>
                    <p class="mt-2">
                        <span class="f-18 c-stress">{{$resultDatas->department or ''}}</span></p>
                    <p class="mt-2">
                        共 <span class="p-8 c-stress">{{$resultDatas->departmentPerson or ''}}</span> 人在锦大图书馆留下印记
                    </p>
                    <p class="mt-2">借阅量排名为 <span class="p-8 f-18 c-stress">第{{$resultDatas->departmentRank or ''}}
                            名</span></p>
                    <p class="mt-8">
                        我为我的学院的排名贡献了
                        <span class="p-8 f-18 c-stress">{{round($resultDatas->borrowCount/$resultDatas->departmentCount*100,2)}}
                            %</span>
                        力量
                    </p>
                </div>
            </div>
            <div class="section page6 component animated" data-animate="bounceIn">
                <div class="content component animated" data-animate="fadeInLeft">
                    <p class="line1">你喜欢停留在 </p>
                    <p class="line1"><span class="c-stress">{{$resultDatas->bestArea or '图书馆大厅'}} </span>
                    </p>
                    <p class="line1">在你借阅过的书中</p>
                    <p class="line2 mt-2">你尤其偏爱</p>
                    <div class="line3">
                        <span style="font-size:30px">{{$resultDatas->bestType or ''}}</span> 类书籍
                    </div>
                    <div class="line2 mt-2">与你志趣相投的有
                        <span class="p-8 c-stress">
                            @if(strpos('马克思主义、列宁主义、毛泽东思想、邓小平理论',$resultDatas->bestType) !== false)
                                113
                            @elseif(strpos('哲学、宗教',$resultDatas->bestType) !== false)
                                3601
                            @elseif(strpos('社会科学总论',$resultDatas->bestType) !== false)
                                1396
                            @elseif(strpos('政治、法律',$resultDatas->bestType) !== false)
                                1676
                            @elseif(strpos('军事',$resultDatas->bestType) !== false)
                                415
                            @elseif(strpos('经济',$resultDatas->bestType) !== false)
                                14417
                            @elseif(strpos('文化、科学、教育、体育',$resultDatas->bestType) !== false)
                                1748
                            @elseif(strpos('语言、文字',$resultDatas->bestType) !== false)
                                5687
                            @elseif(strpos('文学',$resultDatas->bestType) !== false)
                                37414
                            @elseif(strpos('艺术',$resultDatas->bestType) !== false)
                                4891
                            @elseif(strpos('历史、地理',$resultDatas->bestType) !== false)
                                3290
                            @elseif(strpos('自然科学总论',$resultDatas->bestType) !== false)
                                134
                            @elseif(strpos('数理科学和化学',$resultDatas->bestType) !== false)
                                2397
                            @elseif(strpos('天文学、地球科学',$resultDatas->bestType) !== false)
                                216
                            @elseif(strpos('生物科学',$resultDatas->bestType) !== false)
                                229
                            @elseif(strpos('医药、卫生',$resultDatas->bestType) !== false)
                                340
                            @elseif(strpos('农业科学',$resultDatas->bestType) !== false)
                                97
                            @elseif(strpos('工业技术',$resultDatas->bestType) !== false)
                                21611
                            @elseif(strpos('交通运输',$resultDatas->bestType) !== false)
                                250
                            @elseif(strpos('航空、航天',$resultDatas->bestType) !== false)
                                24
                            @elseif(strpos('环境科学、安全科学',$resultDatas->bestType) !== false)
                                146
                            @elseif(strpos('综合性图书',$resultDatas->bestType) !== false)
                                98
                            @endif
                            </span> 人
                    </div>
                </div>
                <img class="leaf" src="http://p7oyh7h4h.bkt.clouddn.com/img/leaf.png" alt="">
            </div>
            <div class="section page10">
                <img class="title" src="http://p7oyh7h4h.bkt.clouddn.com/img/page10-title.png" alt="">
                <img class="lover component animated" data-animate="fadeInDown"
                     src="http://p7oyh7h4h.bkt.clouddn.com/img/page10-lover.png">
                <div class="content component animated" data-animate="fadeInLeft">
                    <p>
                        与你的读书契合度高的
                        <span class="f-18 c-stress">有缘人</span>
                    </p>
                    <ul class="scrollArea" style="height: 200px">
                        @isset($relationDatas)
                            @foreach($relationDatas as $person)
                                <li>
                                    <p>
                                        <span class="label-name mlr-8">{{$person->name2 or ''}}</span>
                                        有缘指数
                                        <img src="http://p7oyh7h4h.bkt.clouddn.com/img/cc-star.png" width="20px">
                                        @for ($i = 0; $i < floor($person->percent/0.05); $i++)
                                            <img src="http://p7oyh7h4h.bkt.clouddn.com/img/cc-star.png" width="20px">
                                            @break($i == 3)
                                        @endfor
                                    </p>
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                    <div class="more-fate activeBottom">查看全部</div>
                </div>
            </div>
            <div class="section fp-auto-height-responsive eggs">
                <div class="content component animated" data-animate="fadeInLeft">
                    <a href="{{route('project.item','2')}}" target="_blank">
                        <div class="card">
                            <div class="card-img">
                                <img src="http://p7oyh7h4h.bkt.clouddn.com/img/preview-banner02.jpg" alt="bannner01">
                            </div>
                            <div class="card-content">
                                <span style="color: #ffffff;background: red; padding: 5px;margin: 5px 0;">[ 下期预告 ] 锦城饭卡消费报告</span>
                                <p style="font-size:14px;color:#666666">震惊！我在锦城一年吃花费了这么多Money?
                                    <br>
                                    哇，这么多锦城小哥哥小姐姐和我的饮食结构居然一致！
                                </p>
                            </div>
                        </div>
                    </a>
                    <div class="tips" style="text-align: center">
                        <a href="{{route('project.index')}}" target="_blank">关注微信公众号“数据秘书”
                            <br>获取下一期数据报告最新动态</a>
                        <div style="text-align: center">
                            <img src="http://p7oyh7h4h.bkt.clouddn.com/img/QRCodeWeChat.png" width="160px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="section eggs">
                <div class="content component animated" data-animate="fadeInLeft">
                    <div class="card">
                        <div class="card-img hide-on-small-screen">
                            <img src="http://jcqsscdn.ochase.com/project/Image/224b1bafaa7af85232a58553238c141b.jpg">
                        </div>
                        <div class="card-content">
                            <p>
                                <small>数据提供 · 数据结果核对</small>
                                <br>
                                四川大学锦城学院图书馆 薛畔
                            </p>
                            <p>
                                <small>指导老师</small>
                                <br>
                                王科 杨杉 严张凌
                            </p>
                            <p>
                                <small>平台建设 · 团建 · 后端</small>
                                <br>
                                曾小满 彭伟
                            </p>
                            <p>
                                <small>HTML5开发</small>
                                <br>
                                王治文 任俊宏
                            </p>
                            <p>
                                <small>UI设计 · 制图</small>
                                <br>
                                王腾达
                            </p>
                            <p>
                                <small>数据清洗 · 处理</small>
                                <br>
                                胡鋼 张颖 唐萍 兰玉 许彭戈飏 赖思成 张星鹭
                            </p>
                            <p>
                                <small>数据分析 · 文案</small>
                                <br>
                                陈旭东 陈琛文 陈诗珂 家俊 廖廷情 林弟忠 马秘 薛然 钟锦锋
                            </p>
                            <p>
                                <small>新媒体 · 宣传</small>
                                <br>
                                郝晨露 郭倍余 陈龙
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section page7">
                <a href="" class="review"></a>
                <a href="" class="share"></a>
            </div>
        </div>
        <!-- 尾页下拉提示 -->
        <div class="link-info">
            <p style="background:rgba(255,255,255,0.8);border-radius:15px;padding: 5px 15px">下拉分享！</p>
        </div>
        <img class="arrow-bottom" src="http://p7oyh7h4h.bkt.clouddn.com/img/arrow.png" alt="">
        <!-- 音乐播放功能 -->
        <a id="audioBtn" class="play">
            <audio id="bgMusic" autoplay loop>
                <source src="http://music.163.com/song/media/outer/url?id=28481790.mp3" type="audio/mpeg">
            </audio>
        </a>
        <!-- 分享功能 -->
        <div class="share-panel">
            <div class="share-panel-inner">
                <div class="s-share">
                    <p class="section-title">社交分享</p>
                    <div class="social-list"
                         data-description="WoW！在过去的2017年，我在锦城图书馆借阅过{{$resultDatas->borrowCount or ''}}本书，我因此节约了{{$resultDatas->allPrice or ''}}元。我最喜欢 {{$resultDatas->bestType or ''}} 类书籍。第一次去图书馆是在{{$resultDatas->firstArrive or ''}}，在图书馆学习了 {{$timeDatas->time or ''}} 小时。我和最有缘的同学借过 {{$resultDatas->borrowCount or ''}} 本相同的书。>>访问你的锦城图书馆阅读报告：http://t.cn/RuuGOxH">
                    </div>
                </div>
                <div class="wx-share">
                    <p class="section-title">微信分享</p>
                    <p class="share-qrcode">
                        <img src="http://p7oyh7h4h.bkt.clouddn.com/img/QRCode.png" alt="微信二维码">
                    </p>
                </div>
                <div class="l-share">
                    <p class="section-title">链接分享</p>
                    <div class="copy-area">{{route('project.view',$project->slug)}}
                        <button class="copy-btn"
                                data-clipboard-text="WoW！在过去的2017年，我在锦城图书馆借阅过{{$resultDatas->borrowCount or ''}}本书，我因此节约了{{$resultDatas->allPrice or ''}}元。我最喜欢 {{$resultDatas->bestType or ''}} 类书籍。第一次去图书馆是在{{$resultDatas->firstArrive or ''}}，在图书馆学习了 {{$timeDatas->time or ''}} 小时。我和最有缘的同学借过 {{$resultDatas->borrowCount or ''}} 本相同的书。>>访问你的锦城图书馆阅读报告：http://t.cn/RuuGOxH">
                            复制
                        </button>
                    </div>
                </div>
            </div>
            <div class="share-cancel-btn">关闭分享窗</div>
        </div>
        <!-- 更多信息功能 默认隐藏 -->
        <div class="info-more" style="display:none">
            <div class="info-title">查看详情</div>
            <div id="share-panel-inner-fix" class="share-panel-inner">
                <!-- 我借过的书 和 有缘人更多 共享此面板 -->
                <!-- 我借过的书 -->
                <div class="borrow-book" style="display:none">
                    @isset($borrowDatas->books)
                        @foreach (explode('##',$borrowDatas->books) as $book)
                            <span class="tag-book"> <small>《 {{$book or ''}} 》 </small></span>
                        @endforeach
                    @endisset
                </div>
                <!-- 有缘人 -->
                <ul class="fate" style="display:none">
                    @foreach($relationDatas as $person)
                        <li>
                            <p>
                                <span class="label-name mlr-8">{{$person->name2 or ''}}</span>
                                有缘指数
                                <img src="http://p7oyh7h4h.bkt.clouddn.com/img/cc-star.png" width="20px">
                                @for ($i = 0; $i < floor($person->percent/0.05); $i++)
                                    <img src="http://p7oyh7h4h.bkt.clouddn.com/img/cc-star.png" width="20px">
                                    @break($i == 3)
                                @endfor
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="info-cancel-btn">已查看，继续</div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="http://p7oyh7h4h.bkt.clouddn.com/src/js/vendor/jquery.min.js"></script>
    <script src="http://p7oyh7h4h.bkt.clouddn.com/src/js/vendor/jquery.fullPage.js"></script>
    <script src="http://p7oyh7h4h.bkt.clouddn.com/src/js/vendor/jquery.share.min.js"></script>
    <script src="http://p7oyh7h4h.bkt.clouddn.com/src/js/vendor/clipboard.min.js"></script>
    <script src="{{asset('assets/library2017/main.js')}}?{{time()}}"></script>
@endsection