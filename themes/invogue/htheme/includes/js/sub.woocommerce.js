//INSTANTIATE JQUERY
jQuery(function(){

    //SET THE HEADER
    htheme_set_header('WooCommerce');

    //SET DATA
    htheme_set_data();

    //CONVERT COMPONENTS
    htheme_convert_components();

    //UPDATE DATA
    htheme_update_data();

});

function htheme_set_data(){

    //VARIABLES
    var _shopLayout = global_options.settings.woocommerce.shopLayout;
    var _socialIcons = global_options.settings.woocommerce.socialIcons;

    //SET DATA
    if(_shopLayout){
        jQuery('#shopLayout option').each(function(index, element) {
            if(jQuery(this).val() == _shopLayout){
                jQuery(this).attr('selected', 'selected')
            }
        });
    }

    if(_socialIcons){
        if(jQuery('#socialIcons').val() == _socialIcons){
            jQuery('#socialIcons').attr('checked', 'checked');
        }
    }

}

//UPDATE DATA
function htheme_update_data(){

    //VARIABLES
    var _shopLayout = jQuery('#shopLayout');
    var _socialIcons = jQuery('#socialIcons');

    //UPDATE
    jQuery(_shopLayout).on('change', function(){
        global_options.settings.woocommerce.shopLayout = jQuery(this).children('option:selected').val();
        htheme_flag_save(true);
    });

    jQuery(_socialIcons).on('change', function(){
        jQuery(this).prop('checked') ? global_options.settings.woocommerce.socialIcons = jQuery(this).val() : global_options.settings.woocommerce.socialIcons = false;
        htheme_flag_save(true);
    });

}
