var $=jQuery.noConflict();

(function($){
    "use strict";
    $(function(){

        /*------------------------------------*\
            #GLOBAL
        \*------------------------------------*/
        $(window).ready(function(){
            footerBottom();
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


$( function() {
var spinner = $( "#spinner" ).spinner();

$( "#disable" ).on( "click", function() {
  if ( spinner.spinner( "option", "disabled" ) ) {
    spinner.spinner( "enable" );
  } else {
    spinner.spinner( "disable" );
  }
});
$( "#destroy" ).on( "click", function() {
  if ( spinner.spinner( "instance" ) ) {
    spinner.spinner( "destroy" );
  } else {
    spinner.spinner();
  }
});
$( "#getvalue" ).on( "click", function() {
  alert( spinner.spinner( "value" ) );
});
$( "#setvalue" ).on( "click", function() {
  spinner.spinner( "value", 5 );
});

$( "button" ).button();
} );