  if(!checkCookie()){          
        var reached = false;
        $(document).scroll(function (e) {

            // grab the scroll amount and the window height
            var scrollAmount = $(window).scrollTop();
            var documentHeight = $(document).height();

            // calculate the percentage the user has scrolled down the page
            var scrollPercent = (scrollAmount / documentHeight) * 100;

            if (scrollPercent > 70 && !reached) {
                $(".fancybox").fancybox().trigger('click');
                reached = true;
            }
        });
        }