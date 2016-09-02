var $=jQuery.noConflict();

(function($){
    "use strict";
    $(function(){

        /*------------------------------------*\
            #GLOBAL
        \*------------------------------------*/
        $(window).ready(function(){
            footerBottom();
            $( "#spinner" ).spinner();
        });

        $(window).on('resize', function(){
            footerBottom();
        });

    });
})(jQuery);

//Footer Bottom

function footerBottom(){
    var alturaFooter = getFooterHeight();
    $('.main-body').css('padding-bottom', alturaFooter );
}

function getHeaderHeight(){
    return $('.js-header').outerHeight();
}// getHeaderHeight

function getFooterHeight(){
    return $('.htheme_footer_holder').outerHeight();
}// getFooterHeight