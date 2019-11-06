$(function() {
    if ($(window).width() < 576 ) {
        $('.menu-top ul li ul').slideUp();
    }

    $('.menu-top .navbar-light .navbar-nav > li').bind('touchstart', function() {
        $(this).children('ul').slideToggle();
    });

    $('ul.tdtab li b').click(function(){
        $('ul.tdtab li b').removeClass('active');
        $(this).addClass('active');

       chiso = $(this).parent().index() + 1;
       $('ul.ndtab li .divsanpham').removeClass('xuathien');
       $('ul.ndtab li:nth-child(' + chiso + ') .divsanpham').addClass('xuathien');
    });

    //hieu ung cuon chuot
    new WOW().init();

    $('#carousel-example').on('slide.bs.carousel', function (e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 5;
        var totalItems = $('.carousel-item').length;
        
        if (idx >= totalItems-(itemsPerSlide-1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i=0; i<it; i++) {
                // append slides to end
                if (e.direction=="left") {
                    $('.carousel-item').eq(i).appendTo('.carousel-inner');
                }
                else {
                    $('.carousel-item').eq(0).appendTo('.carousel-inner');
                }
            }
        }
    });
})