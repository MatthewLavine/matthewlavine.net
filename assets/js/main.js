$(function() {
    $(document).ready(function() {
        $('body, html').animate({
            scrollTop: 0
        }, 'fast');
    });

    function doScroll() {
        $(".arrow").animate({"opacity" : "0", "bottom" : 3*parseInt($('.arrow').css('bottom'))/5}, 200, function() {
            $(".arrow").css("visibility", "hidden");
        })
        $(".info").animate({"padding-top":"3em"}, 500);
        setTimeout(function() {
            $(".work, .cloud").css("height", "auto").css("visibility", "visible").animate({"opacity" : "1"}, 500);
            $(".about, footer").css("height", "auto").css("visibility", "visible").animate({"opacity" : "1"}, 500);
        }, 200);
        setTimeout(function() {
            $('body, html').css("overflow-y", "visible");
        }, 700);
        $(window).unbind('mousewheel DOMMouseScroll touchmove', handler);
    }

    var handler = function(event){
        event.preventDefault();
        event.stopPropagation();
        doScroll();
    };
    $(window).bind('mousewheel DOMMouseScroll touchmove', handler);
    $(".arrow").click(doScroll);

    function shuffleArray(array) {
        for (var i = array.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var temp = array[i];
            array[i] = array[j];
            array[j] = temp;
        }
        return array;
    }
    var techs = [];
    $('.project > a').each(function() {
        $.each($(this).data('technologies').split(', '), function() {
            var el = "<span>" + this  + "</span>";
            if((techs.indexOf("<span>" + this  + "</span>")) < 0) {
                techs.push(el);
            }
        });
    });
    techs = shuffleArray(techs);
    $.each(techs, function() {
        $('.skill-container').append(this);
    });
    $('.project > a').hover(function() {
        var proj = $(this);
        $.each(proj.data('technologies').split(', '), function() {
            var p = this.toString();
            $(".skill-container").children().each(function() {
                var k = $(this).contents().text();
                if(p == k) {
                    $(this).addClass('highlight');
                }
            });
        });

    }, function() {
        $(".skill-container").children().removeClass('highlight');
    });
    $('.skill-container > span').hover(function() {
        var tech = $(this).contents().text();
        $('.project > a').each(function() {
            if($(this).data('technologies').split(', ').indexOf(tech) > -1) {
                $(this).addClass('highlight');
            }
        });

    }, function() {
        $('.project > a').removeClass('highlight');
    });
});