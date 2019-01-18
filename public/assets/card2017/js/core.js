var music = {
    changeClass: function (target, id) {
        var className = $(target).attr('class');
        var ids = document.getElementById(id);
        (className == 'on') ?
            $(target).removeClass('on').addClass('off') : $(target).removeClass('off').addClass('on');
        (className == 'on') ?
            ids.pause() : ids.play();
    },
    play: function () {
        document.getElementById('media').play();
    }
}
music.play();

let monthTotalResume = null;//12个月的总消费
let first_end = {};//一年最早和最晚的数据 一二栏的数据
let componentNumber = [];//保存第四栏消费分类的金额
let rankData = {};//保存第七栏的排名和总额消费

let allSheet = [];//保存总账单的分类数据
let allSheetText = [];//保存总账单的文本

function cancelAnimation(state) {
    if (state) {
        $('.load-section').hide();
    }
    $('.load-section').show();
}

//转换时间格式的函数
function convertTime(result) {
    var Data = result.split(' ');
    var TimeOne = Data[0].split('-');
    var TimeTwo = Data[1].split(':');
    return `${TimeOne[0]}年${TimeOne[1]}月${TimeOne[2]}日 ${TimeTwo[0]}点${TimeTwo[1]}分`;
}

//赋值给first_end保存最早和最晚的数组 并且渲染到页面上 className=>{first-time,first-place,last-tiem,last-place}
function getLastAndEnd(theFirstDayDealDate, theLastDayDealDate, result) {
    first_end.theFirstDayDealDate = theFirstDayDealDate;
    first_end.theLastDayDealDate = theLastDayDealDate;
    first_end.theFirstDayDealSite = result.theFirstDayDealSite;
    first_end.theLastDayDealSite = result.theLastDayDealSite;

    //赋值给保存第三栏的数组
    $('#firstTime').html(first_end.theFirstDayDealDate)
    $('#firstPlace').html(first_end.theFirstDayDealSite)
    $('#lastTime').html(first_end.theLastDayDealDate)
    $('#lastPlace').html(first_end.theLastDayDealSite)
}

//获取第四栏消费组成金额的方法
function getComponentNumber(result) {
    componentNumber[0] = result.breakfastAmountMoney;
    componentNumber[1] = result.brunchAmountMoney;
    componentNumber[2] = result.lunchAmountMoney;
    componentNumber[3] = result.afternoonTeaAmountMoney;
    componentNumber[4] = result.dinnerAmountMoney;
    componentNumber[5] = result.nightSackAmountMoney;
    $('.go-times').each(function (index, val) {
        $(this).html(`￥${componentNumber[index]}`);
    })
}

//遍历数据到第七栏消费比较排名的方法
function compareRank(totalResume, result) {
    rankData.totalResume = totalResume.substr(0, 1);
    rankData.rank = result.rank;
    rankData.sum = result.sum;
    rankData.over = (1 - (rankData.rank / 20481)) * 100;
    $('.ranks').eq(0).html(rankData.totalResume);
    $('.ranks').eq(1).html(rankData.sum);
    $('.ranks').eq(2).html(rankData.rank);
    $('.ranks').eq(3).html(rankData.over.toFixed(2));
}

//获取总账单数据的的方法
function getAllFee(dealType) {
    for (var index of dealType) {
        allSheet.push(index.type);
        allSheetText.push({value: index.money, name: index.type});
    }
}

//总账单的饼图
function renderPie() {

    let dom = document.getElementById("container");
    let myChart = echarts.init(dom);
    let app = {};
    option = null;
    app.title = '消费类型图';
    option = {
        tooltip: {
            trigger: 'item',
            formatter: "{b}<br/>{c} ({d}%)"
        },
        legend: {
            orient: 'horizontal',
            left: '15',
            right: '10',
            gap: '0',
            height: '5',
            x: 'center',
            bottom: '0',
            data: allSheet
        },
        series: [
            {
                name: '消费类型',
                type: 'pie',
                center: ['50%', '35%'],
                radius: '60%',
                avoidLabelOverlap: false,
                label: {
                    normal: {
                        show: false,
                        position: 'center',
                    },
                },
                labelLine: {
                    normal: {
                        show: false
                    }
                },
                data: allSheetText
            }
        ]
    };
    if (option && typeof option === "object") {
        myChart.setOption(option, true);
    }
}

$.ajax({
    type: "GET",
    dataType: 'json',
    url: apiUrl,
    success: function (data) {
        if (data.status == "success") {
            console.log(data.msg);
            //十二个月的消费
            monthTotalResume = data.data.person.monthTotalResume;
            $('.month-cost').each(function (i, val) {
                /**
                 * 循环每个月与 JSON 对应的月份数据相匹配
                 * 如果找到对应月份 则赋值对应月份所在数组下标对象的 money 值
                 * 并 return true
                 * 如果没有找到则赋值 0
                 */
                for (let j = 0; j < monthTotalResume.length; j++) {
                    if (i + 1 == monthTotalResume[j].month) {
                        $(this).html('￥' + monthTotalResume[j].money);
                        return true;
                    }
                }
                $(this).html('￥' + 0);
            })
            //第一次使用饭卡和最后使用饭卡
            let result = data.data.person.result;
            //获取函数的最早时间使用的返回值
            let theFirstDayDealDate = convertTime(result.theFirstDayDealDate);
            //获取函数的最晚时间使用的返回值
            let theLastDayDealDate = convertTime(result.theLastDayDealDate);
            // 用户姓名
            $('#userName').html(result.name);
            //调用赋值函数并传递参数
            getLastAndEnd(theFirstDayDealDate, theLastDayDealDate, result);

            // 消费最贵的一天和地点
            $('#maxConsumeTime').html(result.maxExpenseDayDate);
            $('#maxConsumeMoney').html(result.maxExpenseDayMoney);

            //第四栏的消费组成金额
            getComponentNumber(result);
            //第七栏全校消费比较排名
            compareRank(data.data.school.monthTotalResume.totalResume, result);

            //第十一栏的总账单的数据
            getAllFee(data.data.person.dealType);
            renderPie();

            // 消费组成
            const person = data.data.person;

            /* 消费组成添加 数字 DOM  */
            function setComposeCount(composeData, targetElm) {
                let categorytotalNum = 0;
                composeData.forEach(function (element, index) {
                    categorytotalNum += parseInt(element.count);

                    $(targetElm).html(categorytotalNum);
                });
            }

            setComposeCount(person.personBreakfast, '#breakfastNum');
            setComposeCount(person.personBrunch, '#brunchNum');
            setComposeCount(person.personLunch, '#lunchNum');
            setComposeCount(person.personAfternoon, '#afternoonNum');
            setComposeCount(person.personDinner, '#dinnerNum');
            setComposeCount(person.personNight, '#nightNum');

            /* 消费组成添加 表格 DOM */
            function setComposeDetail(composeData, targetElm) {
                let clip = '';
                composeData.forEach(function (element, index) {
                    clip += `<tr><td>${element.site}</td><td>${element.count}</td></tr>`
                });
                fragment = `<table class="table"><thead><th>地点</th><th>次数</th></thead><tbody>${clip}</tbody></table>`;
                $(targetElm).html(fragment);
            }

            setComposeDetail(person.personBreakfast, '.food-breakfast');
            setComposeDetail(person.personBrunch, '.food-brunch');
            setComposeDetail(person.personLunch, '.food-lunch');
            setComposeDetail(person.personAfternoon, '.food-afternoon');
            setComposeDetail(person.personDinner, '.food-dinner');
            setComposeDetail(person.personNight, '.food-latelight');

            const school = data.data.school;

            // 热力图
            function setHeatMapDetail(heatMapData, targetElm) {
                let clip = '';
                for (const key in heatMapData) {
                    clip += `<tr><td>${key}</td><td>${heatMapData[key]}</td></tr>`;
                }

                fragment = `<table class="table"><thead><th>时间</th><th>热门地点（热度）</th></thead><tbody>${clip}</tbody></table>`;
                $(targetElm).html(fragment);
            }

            setHeatMapDetail(school.heatMap.max, '.max-heatmap');
            setHeatMapDetail(school.heatMap.min, '.min-heatmap');

            // 关键词描述 根据 json 返回的 keywordImageNumber 数据动态改变 图片的 src
            $('#keywordImg').attr('src', `http://jcqsscdn.ochase.com/remote/card2017/img/KeyWordImage/KeyWordImage${result.keywordImageNumber}.jpg`);

            // 再看一次 分享
            const shareText = `WoW！在过去的2017年，我在锦城使用了 ${result.amountDealCounts} 次，共计消费 ${result.sum}，在全校中排名 ${result.rank}，超过 ${'50%'} 的同学。消费最高的一天是 ${result.maxExpenseDayDate}，竟然消费了 ${result.maxExpenseDayMoney} 元 >>`;
            // 跳转首页的链接
            const shareTextAddon = `访问你的锦城饭卡消费报告：`+projectUrl;
            // 当前用户分享以供他人浏览的链接
            const shareTextPublicAddon = `访问我的锦城饭卡消费报告：` + shareUrl;
            $('.social-list').attr('data-description', shareText + shareTextAddon);
            $('#copyBtn').attr('data-clipboard-text', shareText + shareTextAddon);
            $('#copyPublicBtn').attr('data-clipboard-text', shareText + shareTextPublicAddon);

            // 社交分享 配置功能 必须放在这里 避免 data-description 没有改动就已经配置好了
            let $config = {
                sites: ['weibo', 'qq', 'qzone'], // 启用的站点
                image: 'http://jcqsscdn.ochase.com/project/Image/6e9173f5f77eada773b74a2eafbff4d7.jpg',
            };

            $('.social-list').share($config);

            // 挂载Gap数据
            $('#gapDay').html(data.data.person.personGap.days);
            $('#gapStart').html(data.data.person.personGap.start);
            $('#gapEnd').html(data.data.person.personGap.end);

            // 隐藏Loading
            setTimeout(function () {
                $('.loader').hide();
            }, 2000);

        } else {
            alert('数据获取出错，请重新输入学号/工号和姓名');
            location.href = "https://data.soujincheng.com/auth/card2017";
        }
    },
    error: function (err) {
        console.log(err);
    }
});

$(function () {
    $('#fullpage').fullpage({
        lazyLoading: true,
        anchors: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13'],
        onLeave(index, nextIndex, direction) {
            //利用这个方法 实现每次滚动有动画
            //console.log(index, nextIndex, direction);
            //当前动画样式去掉  给下一屏添加动画标签
            $('[amt]').each(function (indexs, element) {
                //console.log(element) 每个html对象
                var amt = $(element).attr('amt');
                $(element).removeClass(amt);
            });
            //给下一个显示屏里面的 需要表现动画的标签添加动画
            $('#fullpage .section').eq(nextIndex - 1).find('[amt]').each(function (indexs, element) {
                $(element).addClass($(element).attr('amt')); //为每一个元素通过amt属性添加相应的类
                // 当下一个页面为最后一个页面时，隐藏 arrow
                if (nextIndex >= $('#fullpage').find('.section').length) {
                    $('.arrow-down').css('display', 'none');
                } else {
                    $('.arrow-down').css('display', 'block');
                }
            });
        },
        afterLoad(anchorLink, index) {

        }
    })

    $(document).on('click', '.once-watch', function () {
        $.fn.fullpage.moveTo('1');
    })

    // fix 查看详情拖动滚动条页面造成页面拖动
    const htmlHeight = document.documentElement.clientHeight || document.body.clientHeight;
    $('#share-panel-inner').on('touchstart', function () {
        $('.wrap').css('height', htmlHeight + "px");
        $('.wrap').css('overflow', 'hidden');
    });

    $('.share-cancel-btn').on('click', function () {
        $('.wrap').css('height', '100%');
        $('.wrap').css('overflow', 'initial');
    });

    // 第五页 消费组成页 循环绑定点击事件
    $('.compose-list').children().on('click', function (e) {
        $('.info-more').fadeIn();
        const target = $(this).attr('data-target');
        $('.info-more').find(`.${target}`).css('display', 'block');
        // fullpage 禁止 fullpage 页面滚动
        setFullScroll(false);

        return false;
    });

    // 查看详情展示

    $('.container-two-9').on('click', function () {
        $('.info-more').fadeIn();
        $('.max-heatmap').css('display', 'block');

        // fullpage 禁止 fullpage 页面滚动
        setFullScroll(false);

        return false;
    });

    $('.container-three-9').on('click', function () {
        $('.info-more').fadeIn();
        $('.min-heatmap').css('display', 'block');

        // fullpage 禁止 fullpage 页面滚动
        setFullScroll(false);
        return false;
    });

    $('.info-cancel-btn').on('click', function () {
        // 隐藏查看详情面板
        $('.info-more').css('display', 'none');
        // 隐藏查看详情的内部元素
        $('#share-panel-inner').children().css('display', 'none');

        // fullpage 恢复 fullpage 页面滚动
        setFullScroll(true);
    });

    function setFullScroll(whether) {
        $.fn.fullpage.setAllowScrolling(whether);
        $.fn.fullpage.setKeyboardScrolling(whether);
    };

    // 注册分享按钮功能绑定事件
    $('.share-btn').on('click', function () {
        $('.share-panel').fadeIn();
        $('.s-share').css('display', 'block');
        setFullScroll(false);
        return false;
    });

    // 注册公开分享按钮功能绑定事件
    $('.share-friend-btn').on('click', function () {
        $('.share-panel').fadeIn();
        $('.public-share').css('display', 'block');
        setFullScroll(false);
        return false;
    });

    // 注册取消分享按钮绑定事件
    $('.share-cancel-btn').on('click', function () {
        $('.share-panel').fadeOut();
        $('.share-panel-inner').children().css('display', 'none');
        setFullScroll(true);
        return false;
    });

    // 复制链接
    const clipboard = new ClipboardJS('#copyBtn');
    clipboard.on('success', function (e) {
        alert('复制成功，分享给小伙伴吧！');
    });

    const copyPublicLink = new ClipboardJS('#copyPublicBtn');
    copyPublicLink.on('success', function (e) {
        alert('复制成功，分享给小伙伴吧！');
    });
});