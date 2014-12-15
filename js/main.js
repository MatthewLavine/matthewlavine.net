$(function() {
    var mq = window.matchMedia('@media (max-width: 906px)');
    if(mq.matches) {
        // disable interactivity
    } else {
        function doScroll() {
            $(".arrow").animate({"opacity" : "0"}, 300, function() {
                $(".arrow").css("display", "none");
            })
            $(".info").animate({"padding-top":"3em"}, 600, function() {
                $("section, footer").css("display", "inline-block").animate({"opacity" : "1"}, 400);
            });
            $(window).unbind('mousewheel DOMMouseScroll', handler);
        }

        var handler = function(event){
            if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
            // mouse scrolled up
        } else {
            doScroll();
        }
    }
    $(window).bind('mousewheel DOMMouseScroll', handler);
    $(".arrow").click(doScroll);
    }
});