$(function() {
    function shuffleArray(array) {
        for (var i = array.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var temp = array[i];
            array[i] = array[j];
            array[j] = temp;
        }
        return array;
    }

    $(document).ready(function() {

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

        $('.skill-container').append(techs);

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
});