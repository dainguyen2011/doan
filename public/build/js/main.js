'use strict'

function reverse(s) {
    var o = [];
    for (var i = 0, len = s.length; i <= len; i++)
        o.push(s.charAt(len - i));
    return o.join('');
}

var CURRENT_URL = reverse(reverse(window.location.href).split('/')[0]),
    $BODY = $('body'),
    $MENU_TOGGLE = $('#menu-toggle'),
    $SIDEBAR_MENU = $('.sidebar-nav'),
    $SIDEBAR_FOOTER = $('.sidebar-footer'),
    $LEFT_COL = $('.left_col'),
    $RIGHT_COL = $('.right_col'),
    $NAV_MENU = $('.nav_menu'),
    $RESIZE_VALUE = "1",
    $FOOTER = $('footer');
$(document).ready(function() {
    $('.sidebar-nav').find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('active').parents('li').addClass("active");
    $("#menu-toggle").on("click", function() {
        if ($RESIZE_VALUE == "0")
            resizeSidebar("1");
        else
            resizeSidebar("0");
    });
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        resizeSidebar("0");
    }
    /* resizebar */
    function resizeSidebar(op) {
        var w = $(window).width();
        var s = screen.width
        var width = (w > 0) ? w : s;
        if (op == "1") { //kucultmek 
            $("#wrapper").addClass("toggled");
            $(".navbar-header").addClass("toggled");
            //$(".nav-flyout").toggleClass('miniMenu2');
            $(".nav-flyout").css('left', '0');
            $(".nav-flyout").css('top', '5px');
            $("#wrapper.toggled #sidebar-wrapper").css('width', '45px');
            $("#wrapper.toggled #sidebar-wrapper").css('top', '50px');
            $("#bHeader").css('display', 'none');
            $("#sHeader").css('display', '');
            $('[data-toggle="popover"]').popover('hide');
            $('.person-info').css('display', 'none');

            $RESIZE_VALUE = "1";

        } else { //buyultmek
            $("#wrapper").removeClass("toggled");
            $(".navbar-header").removeClass("toggled");
            $("#wrapper #sidebar-wrapper").css('width', '250px');
            $(".nav-flyout").css('left', '2.5em');
            $(".nav-flyout").css('top', '155px');
            $("#bHeader").css('display', '');
            $("#sHeader").css('display', 'none');
            $('.person-info').css('display', '');
            $RESIZE_VALUE = "0";
            $(function() {
                $('[data-toggle="popover"]').popover({
                    trigger: "hover",
                    content: "data-content",
                    container: 'body',
                    padding: 0
                })
            })

        }
    }
    /* resizebar */
    function t(t, e) {
        return Math.floor(Math.random() * (e - t + 1)) + t
    }

    //****/
    $(function() {
        $(window).on("load resize", function() {
            var topOffset = 50;
            var isMobile = window.matchMedia("only screen and (max-width: 768px)");

            if (isMobile.matches) {
                var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
            } else {
                var width = this.screen.width;
            }
            if (width < 768) {

                $("#wrapper").addClass("toggled");

                resizeSidebar("1");
                topOffset = 100; // 2-row-menu
            } else {
                $("#wrapper").removeClass("toggled");

                resizeSidebar("0");
            }

            if (width < 450) {
                $(".navbar-right").css('display', 'none');
            } else {
                $(".navbar-right").css('display', '');
            }

            var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
            height = height - topOffset;
            if (height < 1) height = 1;
            if (height > topOffset) {
                $("#page-content-wrapper").css("min-height", (height) + "px");
            }
        });

        var url = window.location;
        var element = $('ul.nav a').filter(function() {
            return this.href == url;
        }).addClass('active').parent();

        while (true) {
            if (element.is('li')) {
                element = element.parent().addClass('in').parent();
            } else {
                break;
            }
        }
    });
    /*Pnael Click Button*/
    $(".panel .btn-remove").on("click", function(t) {
        t.preventDefault(), $(this).parents(".panel").fadeOut(300, function() {
            $(this).remove()
        })
    });

    var e = $(".panel-body");
    if ($(".panel .btn-toggle-collapse").clickToggle(function(t) {
            t.preventDefault(), $(this).parents(".panel").find(".slimScrollDiv").length > 0 && (e = $(".slimScrollDiv")), $(this).parents(".panel").find(e).slideUp(300), $(this).find("i.lnr-chevron-up").toggleClass("lnr-chevron-down")
        }, function(t) {
            t.preventDefault(), $(this).parents(".panel").find(".slimScrollDiv").length > 0 && (e = $(".slimScrollDiv")), $(this).parents(".panel").find(e).slideDown(300), $(this).find("i.lnr-chevron-up").toggleClass("lnr-chevron-down")
        }), $(".panel-scrolling").length > 0 && $(".panel-scrolling .panel-body").slimScroll({
            height: "430px",
            wheelStep: 2
        }), $("#panel-scrolling-demo").length > 0 && $("#panel-scrolling-demo .panel-body").slimScroll({
            height: "175px",
            wheelStep: 2
        }), $("#system-load").length > 0) {}

    /*Panel Click Button*/

    /**/
}), $.fn.clickToggle = function(t, e) {
    return this.each(function() {
        var i = !1;
        $(this).on("click", function() {
            return i ? (i = !1, e.apply(this, arguments)) : (i = !0, t.apply(this, arguments))
        })
    })
};
/* resizebar */

jQuery.fn.extend({
    toggleText: function(a, b) {
        var that = this;
        if (that.text() != a && that.text() != b) {
            that.text(a);
        } else
        if (that.text() == a) {
            that.text(b).animate({
                opacity: 'toggle'
            }, 'slow');;
        } else
        if (that.text() == b) {
            that.text(a).animate({
                opacity: 'toggle'
            }, 'slow');;
        }
        return this;
    }
});

/* fullsecreen*/
function toggleFullScreen(elem) {

    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}
/* fullsecreen*/