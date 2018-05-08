$(function () {
    $('#app').fullpage({
        // verticalCentered: false,
        // resize: true,
        // scrollBar: true,

        // 事件
        onLeave: function (index, nextIndex, direction) {
            $('#app').find('.section').eq(index - 1).trigger('onLeave');
            $('#app').find('.section').eq(nextIndex - 1).trigger('onLoad');
            // 当下一个页面为最后一个页面时，隐藏 arrow 显示 link-info
            if (nextIndex >= ($('#app').find('.section').length - 1)) {
                $('.arrow-bottom').css('display', 'none');
                if (nextIndex === ($('#app').find('.section').length - 1)) {
                    $('.link-info').css('display', 'block');
                    $("#audioBtn").css('display', 'block');
                } else {
                    $('.link-info').css('display', 'none');
                    $("#audioBtn").css('display', 'none');
                }
            } else {
                $('.arrow-bottom').css('display', 'block');
                $('.link-info').css('display', 'none');
                $("#audioBtn").css('display', 'block');
            }
        },

        afterLoad: function (anchorLink, index) {

        },
    });

    $('.section').on('onLeave', function () {
        console.log($(this).attr('class'), '==>>', 'onLeave');
        $(this).find('.component').trigger('onLeave');
    });

    $('.section').on('onLoad', function () {
        console.log($(this).attr('class'), '==>>', 'onLoad');
        $(this).find('.component').trigger('onLoad');
    });

    $('.component').on('onLoad', function () {
        $(this).addClass($(this).attr('data-animate'));
        return false;
    });

    $('.component').on('onLeave', function () {
        $(this).removeClass($(this).attr('data-animate'));
        return false;
    });

    /* 音乐加载 */
    var music = document.getElementById("bgMusic");
    $("#audioBtn").click(function () {
        if (music.paused) {
            music.play();
            $("#audioBtn").removeClass("pause").addClass("play");
        } else {
            music.pause();
            $("#audioBtn").removeClass("play").addClass("pause");
        }
    });

    // 社交分享
    var $config = {
        sites: ['weibo', 'qq', 'qzone', 'douban'], // 启用的站点
        image: 'http://p7oyh7h4h.bkt.clouddn.com/img/library.jpg'
    };

    $('.social-list').share($config);

    // 注册绑定事件
    $('.share').on('click', function () {
        $('.share-panel').fadeIn();
        return false;
    });

    $('.share-cancel-btn').on('click', function () {
        $('.share-panel').css('display', 'none');
        return false;
    });

    $('.more-borrow').on('click', function () {
        $('.info-more').fadeIn();
        $('.borrow-book').css('display', 'block');

        // fullpage 禁止 fullpage 页面滚动
        setFullScroll(false);

        return false;
    });

    $('.more-fate').on('click', function () {
        $('.info-more').fadeIn();
        $('.fate').css('display', 'block');
        setFullScroll(false);
        return false;
    });

    $('.info-cancel-btn').on('click', function () {
        $('.info-more').css('display', 'none');
        $('.borrow-book').css('display', 'none');
        $('.fate').css('display', 'none');

        // fullpage 恢复 fullpage 页面滚动
        setFullScroll(true);
    });

    function setFullScroll(whether) {
        $.fn.fullpage.setAllowScrolling(whether);
        $.fn.fullpage.setKeyboardScrolling(whether);
    }

    new ClipboardJS('.copy-btn');

    // fix
    $('#share-panel-inner-fix').on('touchstart', function () {
        $('#wrap').css('height', htmlHeight + 'px');
        $('#wrap').css('overflow', 'hidden');
    });

    $('.share-cancel-btn').on('click', function () {
        $('#wrap').css('height', '100%');
        $('#wrap').css('overflow', 'initial');
    });
});