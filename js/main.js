$(function() {
    var mq = window.matchMedia('@media (max-width: 906px)');
    if(mq.matches) {
        // disable interactivity
    } else {
        function doScroll() {
            $(".arrow").animate({"opacity" : "0"}, 200, function() {
                $(".arrow").css("visibility", "hidden");
            })
            $(".info").animate({"padding-top":"3em"}, 500);
            $("section, footer").delay(200).css("visibility", "visible").animate({"opacity" : "1"}, 500);
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