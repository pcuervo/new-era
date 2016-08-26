//HEROTHEME FUNCTIONS
var htheme_toggle = 'open';
var global_product_object = [];
var htheme_width = 0;

jQuery(function(){

    jQuery('.htheme_masonry_holder').masonry({
        // options
        itemSelector: '.htheme_masonry_item'
    });

    //CHECK STICKY
    var tp = jQuery(window).scrollTop();

    //MAIN MENU STICKY CHECK
    if(!jQuery('.htheme_main_navigation').hasClass('htheme_mobile')){
        if(tp >= 50){
            htheme_front_menu('sticky');
            htheme_check_logo('sticky');
        }else{
            htheme_front_menu('default');
            htheme_check_logo('default');
        }
    }

    //CHANGE MENU
    jQuery(window).on('scroll', function(){
        if(!jQuery('.htheme_main_navigation').hasClass('htheme_mobile')){
            tp = jQuery(this).scrollTop();
            //MAIN MENU STICKY CHECK
            if(tp >= 50){
                htheme_front_menu('sticky');
                htheme_check_logo('sticky');
            } else {
                htheme_front_menu('default');
                htheme_check_logo('default');
            }
            //BACK TO TOP
            if(tp >= 1000){
                htheme_show_top('show');
            } else {
                htheme_show_top('hide');
            }
        }
    });

    //ENABLE MOBILE
    htheme_check_mobile();

    //TOGGLE BOXES
    htheme_toggle_boxes();

    //TOGGLE ACCORDION
    htheme_accordion();

    //ENABLE SLIDERS
    htheme_enable_promo_slider();
    htheme_enable_testimonial_slider();
    htheme_enable_look_slider();
    htheme_enable_lookcol_slider();
    htheme_category_look_slider();
    htheme_horizontal_slider();
    htheme_product_slider();

    //ENABLE FULLSCREEN HEIGHT
    htheme_fullscreen();

    //ADD ON RESIZE
    jQuery(window).on('resize', function(){
        htheme_horizontal_slider();
        htheme_fullscreen();
    });

    //ENABLE SWIPE
    if(jQuery.support.touch){
        htheme_enable_slider_swipe();
    }

    //ENABLE INPUT CLASS SWITCHING
    htheme_enable_inputs();

    //ENABLE OVERLAYS
    htheme_search_overlay();
    htheme_popup_overlay();
    htheme_popup_signup();

    //ENABLE PRODUCT INFO SWITCHING
    htheme_product_info();

    //GENERATE SELECT BOXES
    htheme_generate_select();

    //ENABLE SELECT BOXES
    htheme_enable_select_boxes();

    //ENABLE TOOLTIPS
    htheme_enable_tooltip();

    //LOAD MORE PRODUCTS
    htheme_load_more_products();

    //ENABLE ADD TO CART CHECK
    if(jQuery('.htheme_woo_ajax_check').length > 0){
        htheme_ajax_check();
    }

    if(jQuery('body').find('[name=update_cart]').length > 0){
        htheme_ajax_check_update();
    }

    //ENABLE COUPON
    htheme_anable_misc_functions();

    //PREVIEW ENABLE
    htheme_popup_preview();

    //ENABLE MAIN HOME SLIDER
    htheme_home_slider();

    //GET WISHLIST
    if(jQuery('body').find('.htheme_icon_nav_wishlist').length > 0){
        htheme_insert_wishlist_item();
        htheme_get_wishlist_data('load');
    }

    //ENABLE MAIN HOME SLIDER
    htheme_bind_form_listeners();

});

//ENABLE AJAX CHECK FOR ADD TO CART
function htheme_ajax_check_update(){

    //PRELOAD CART ITEMS
    htheme_get_nav_cart_data('load');

    //VARIABLES
    var add = jQuery('body').find('[name=update_cart]');

    //BIND CLICK TO ADD TO CART BUTTON
    add.bind('click', function(){
        var clicked_button = jQuery(this);
        clicked_button.html('<div class="htheme_double_bounce1"></div><div class="htheme_double_bounce2"></div>');
        jQuery( document ).on('ajaxSuccess', function() {
            clicked_button.html('');
            htheme_add_tooltip_to_wc_button();
            htheme_get_nav_cart_data('click');
            htheme_anable_misc_functions();
        });
    });

}

//CHECK LOGO
function htheme_check_logo(check){

    var placeholder_logo = jQuery('.htheme_default_logo_text');

    if(check === 'sticky'){
        if(!jQuery('body').find('a').hasClass('htheme_sticky_logo')){
            jQuery(placeholder_logo).show();
        } else {
            jQuery(placeholder_logo).hide();
        }
    } else if(check === 'default'){
        if(!jQuery('body').find('a').hasClass('htheme_main_logo')){
            jQuery(placeholder_logo).show();
        } else {
            jQuery(placeholder_logo).hide();
        }
    } else if(check === 'mobile'){
        if(!jQuery('body').find('a').hasClass('htheme_mobile_logo')){
            jQuery(placeholder_logo).show();
        } else {
            jQuery(placeholder_logo).hide();
        }
    } else {
        jQuery(placeholder_logo).hide();
    }

}

//ENABLE FULLSCREEN
function htheme_fullscreen(){

    //VARAIBLES
    var height = jQuery(window).height();

    jQuery('body').find('.htheme_is_fullscreen').each(function(){
        jQuery(this).height(height);
        //ENABLE SCROLL
        jQuery(this).children('.htheme_fullscreen_button').on('click', function(){
            TweenMax.to(window, 2, {scrollTo:{y:height}, ease:Strong.easeInOut});
        });
        //ANIMATE PARRALX
        var body_top = jQuery(document).scrollTop();
        jQuery(window).scroll(function(){
            var body_top_new = jQuery(document).scrollTop();
            if(body_top_new > body_top){
                htheme_animate_para(body_top_new);
            }else{
                htheme_animate_para(body_top_new);
            }
        });
    });
}

//IMAGE HEADER PARRALAX
function htheme_animate_para(top_offset){
    var new_offset = ''+ Math.round(top_offset / 7) +'px';
    jQuery('.htheme_intro').animate({
        backgroundPositionY: new_offset
    },0,'swing');
}

//ENABLE SWIPE
function htheme_enable_slider_swipe(){

    jQuery('.htheme_post_slider_wrapper').on({
        'swipeleft':function(){
            jQuery(this).parents('.htheme_horz_slider').find('[data-side="right"]').trigger('tap');
        },
        'swiperight':function(){
            jQuery(this).parents('.htheme_horz_slider').find('[data-side="left"]').trigger('tap');
        }
    });

}

//BIND FORM LISTENER
function htheme_bind_form_listeners(){

    jQuery('body').find('.htheme_contact_form').each(function(){

        //VARIABLES
        var form_id = jQuery(this).attr('id');

        jQuery("#"+form_id+" .htheme_btn_style_1").bind('click', function(){
            htheme_enable_forms('contact', form_id);
        });

        jQuery("#"+form_id+" input").keypress(function(event) {
            if (event.which == 13) {
                event.preventDefault();
                htheme_enable_forms('contact', form_id);
            }
        });

    });

    jQuery('body').find('.htheme_signup_form').each(function(){

        //VARIABLES
        var form_id = jQuery(this).attr('id');

        jQuery("#"+form_id+" input").keypress(function(event) {
            if (event.which == 13) {
                event.preventDefault();
                htheme_enable_forms('signup', form_id);
            }
        });

    });

    jQuery('.htheme_signup_show_check input').on('change', function(){

        if(jQuery(this).attr('checked')){

            //SET SESSION
            //AJAX CALL
            jQuery.ajax({
                url: ajaxurl,
                type: "POST",
                data: {
                    'action': 'htheme_set_signup_session'
                },
                dataType: "json"
            }).done(function(data){

            }).fail(function(event){

            });

        } else {
        }

    });

    jQuery('.htheme_icon_search_btn').on('click', function(){
        jQuery(this).parents('form').submit();
    });

}

//ENABLE FORMS
function htheme_enable_forms(type, form_id){

    //VARAIBLES
    var form_data = jQuery('#'+form_id).serialize();

    //CLEAR ERROR MESSAGES
    jQuery('#'+form_id+' div').removeClass('htheme_field_error');
    var subject = jQuery('#'+form_id).attr('data-subject');

    //AJAX CALL
    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: {
            'action': 'htheme_check_forms',
            'data': form_data,
            'type': type,
            'subject': subject
        },
        dataType: "json"
    }).done(function(data){

        if(data.status){

            if(type == 'signup'){

                //CHECK EMAIL STATUS - ADD STATUS MESSAGE
                if(data.email_status){
                    jQuery('#'+form_id+' .htheme_form_status_message').html('<div class="htheme_form_status_message_success">' + data.insert_msg + '</div>');
                    jQuery('#'+form_id+' input').val('');
                } else {
                    jQuery('#'+form_id+' .htheme_form_status_message').html('<div class="htheme_form_status_message_error">' + data.insert_msg + '</div>');
                    jQuery('#'+form_id+' input').val('');
                }

            } else if(type == 'contact') {

                jQuery('#'+form_id+' .htheme_form_status_message').html('<div class="htheme_form_status_message_success">' + data.insert_msg + '</div>');
                jQuery('#'+form_id+' input').val('');
                jQuery('#'+form_id+' textarea').val('');

            }

        } else {

            //CLEAR STATUS MESSAGE
            jQuery('#'+form_id+' .htheme_form_status_message').html('');

            jQuery.each(data.fields, function(index,value){
                if(!value){
                    jQuery('#'+form_id+' #'+ index).parent('div').addClass('htheme_field_error');
                }
            });

        }

    }).fail(function(event){
        //console.log(event);
    });

}

//PAGE LOAD
function htheme_page_load(){

    var htheme_body = jQuery('body > div');
    var htheme_a_tag = jQuery('body a');
    var htheme_page_loader = jQuery(".htheme_page_loader");

    TweenMax.to(htheme_body, 1, {
            opacity:1,
            ease:Strong.easeInOut
        }
    );

    TweenMax.to(htheme_page_loader, 1, {
            opacity:0,
            display:'none',
            ease:Strong.easeInOut
        }
    );


    jQuery( htheme_a_tag ).click(function( event ){

        var str = event.currentTarget.href;
        var hash = str.match(/#/g);
        var href_match = str.match(/add-to-cart/g);

        if(event.which != 2){
            if(event.currentTarget.href && !hash && event.currentTarget.target != '_blank' && !href_match){
                TweenMax.to(htheme_body, 1, {
                        opacity:0,
                        ease:Strong.easeInOut
                    }
                );
                TweenMax.to(htheme_page_loader, 1, {
                        opacity:1,
                        display:'table',
                        ease:Strong.easeInOut
                    }
                );
            }
        }
    });

}

//HOME SLIDER

var htheme_current_position = 1;

function htheme_home_slider(){

    var total_items = jQuery('.htheme_slide_holder .htheme_slide').length;
    var animation_speed = jQuery('.htheme_slide_holder').data('speed');
    var transition = jQuery('.htheme_slide_holder').data('transition');
    var idle = jQuery('.htheme_slide_holder').data('idle');
    var idle_display = jQuery('.htheme_slide_holder').data('idle-display');

    if(total_items <= 1){
        jQuery('.htheme_slider_navigation').hide();
    }

    //ADD SIDE CLICK ACTION
    jQuery('.htheme_slide_button').on('click', function(){
        var side = jQuery(this).attr('data-side');
        switch(side){
            case 'left':
                htheme_animate_home_prev_slide(htheme_current_position, 1, 'left', 'click', animation_speed, transition, total_items, idle, idle_display);
                htheme_current_position--;
                if(htheme_current_position < 1){
                    htheme_current_position = total_items;
                }
                //ANIMATE SLIDE
                htheme_animate_home_slide(htheme_current_position, 1, 'left', 'click', animation_speed, transition, total_items, idle, idle_display);
                break;
            case 'right':
                htheme_animate_home_prev_slide(htheme_current_position, 1, 'right', 'click', animation_speed, transition, total_items, idle, idle_display);
                htheme_current_position++;
                if(htheme_current_position > total_items){
                    htheme_current_position = 1;
                }
                //ANIMATE SLIDE
                htheme_animate_home_slide(htheme_current_position, 1, 'right', 'click', animation_speed, transition, total_items, idle, idle_display);
                break;
        }

    });

    //ANIMATE FIRST SLIDE
    htheme_animate_home_slide(1, 1, 'left', 'load', animation_speed, transition, total_items, idle, idle_display);

}

function htheme_enable_timer(animation_speed, transition, total_items, idle, idle_display){

    if(idle !== 0){

        var opacity = 0;

        if(idle_display){
            opacity = 1;
        }

        var htheme_slider_instance = new TimelineLite();

        htheme_slider_instance.restart();

        htheme_slider_instance.to(jQuery('.htheme_slide_holder .htheme_timer_holder'), 0, {
            width:'0',
            opacity:opacity
        });

        htheme_slider_instance.to(jQuery('.htheme_slide_holder .htheme_timer_holder'), 10, {
            width:'100%',
            ease:Power0.easeNone,
            force3D:true,
            onComplete: function(){
                htheme_animate_home_prev_slide(htheme_current_position, 1, 'right', 'click', animation_speed, transition, total_items, idle, idle_display);
                htheme_current_position++;
                if(htheme_current_position > total_items){
                    htheme_current_position = 1;
                }
                //ANIMATE SLIDE
                htheme_animate_home_slide(htheme_current_position, 1, 'right', 'click', animation_speed, transition, total_items, idle, idle_display);
            }
        });

    }

}

function htheme_animate_home_slide(current_position, speed, side, type, animation_speed, transition, total_items, idle, idle_display){

    //VARIABLES
    var window_width = jQuery(window).width();
    var set_width = 0;

    htheme_enable_timer(animation_speed, transition, total_items, idle, idle_display);

    //DO CHECKS
    if(transition === 'slide'){
        if(side === 'left' && type === 'click'){
            set_width = -(window_width);
        }else if(side === 'right' && type === 'click'){
            set_width = window_width;
        }else if(side === 'left' && type === 'load'){
            set_width = 0;
        }
    }

    //SET POSITION OF NEW SLIDE
    jQuery('#htheme_slide_id_'+current_position).css({
        'left': set_width+'px',
        'z-index':9
    });

    //ONCE THE POSITION IS SET ANIMATE
    TweenMax.to(jQuery('#htheme_slide_id_'+current_position), animation_speed, {
            left:0,
            opacity:1,
            ease:Strong.easeInOut,
            force3D:true
        }
    );

    if(transition === 'shutter'){
        //ANIMATE MASKS
        jQuery('#htheme_slide_id_' + current_position + ' .htheme_mask_holder .htheme_mask_item').each(function(index, element){
            var spd = (0.2 * (index));
            TweenMax.to(jQuery(this), spd, {
                    opacity:1,
                    ease:Power3.easeInOut
                }
            );
        });
    }

}

function htheme_animate_home_prev_slide(prev_position, speed, side, type, animation_speed, transition, total_items, idle, idle_display){

    //VARIABLES
    var window_width = jQuery(window).width();
    var set_width = 0;

    //DO CHECKS
    if(transition === 'slide'){
        if(side === 'left' && type === 'click'){
            set_width = window_width;
        } else if(side === 'right' && type === 'click') {
            set_width = -(window_width);
        } else if(side === 'left' && type === 'load') {
            set_width = 0;
        }
    }

    //SET POSITION OF NEW SLIDE
    jQuery('#htheme_slide_id_'+prev_position).css({
        'z-index':3
    });

    TweenMax.to(jQuery('#htheme_slide_id_'+prev_position), animation_speed, {
            left: set_width+'px',
            opacity:0,
            onUpdate:function(){
                //jQuery('.htheme_slide_button').unbind('click');
            },
            onComplete:function(){
                //jQuery('.htheme_slide_button').bind('click');
            },
            ease:Strong.easeInOut,
            force3D:true
        }
    );

    if(transition === 'shutter'){
        //ANIMATE MASKS
        jQuery('#htheme_slide_id_'+prev_position + ' .htheme_mask_holder .htheme_mask_item').each(function(index,element){
            var spd = (0.2 * (index));
            TweenMax.to(jQuery(this), spd, {
                     opacity:0,
                     ease:Power3.easeInOut
                 }
             );
         });
    }

}

//PARRALAX
function htheme_parralax(){

    var lastScrollTop = 0;

    jQuery(".htheme_parralax").css({
        'background-position':'center top'
    });

    jQuery(window).bind('scroll',function(e){

        var scrolled = jQuery(this).scrollTop();
        var page_height = jQuery('body').height();
        var perc = ((scrolled/page_height)*100) + 50;

        TweenLite.to(jQuery(".htheme_parralax"),0,{css:{backgroundPosition:"center "+(-(scrolled*0.1))+"px", force3D:true}});

    });

}

//ENABLE MISC FUNCTIONS
function htheme_anable_misc_functions(){

    //ENABLE COUPON CLICK
    jQuery('body').find('.htheme_coupon_open').off().on('click', function(){

        //VARIABLES
        var toggle = jQuery(this).attr('data-toggle');

        if(toggle === 'open'){

            TweenMax.to(jQuery('.htheme_coupon_wrap'), 1, {
                    width:500,
                    opacity:1,
                    ease:Strong.easeOut,
                    onComplete:function(){
                        jQuery('.htheme_coupon_wrap').css({
                            'overflow':'visible'
                        })
                    }
                }
            );

            TweenMax.to(jQuery('.htheme_coupon_inner'), 1, {
                    opacity:1,
                    ease:Strong.easeOut
                }
            );

            jQuery(this).attr('data-toggle', 'close');

            jQuery(this).html('Cerrar cupón!');

        } else {

            TweenMax.to(jQuery('.htheme_coupon_wrap'), 1, {
                    width:220,
                    opacity:1,
                    ease:Strong.easeOut
                }
            );

            jQuery('.htheme_coupon_wrap').css({
                'overflow':'hidden'
            });

            TweenMax.to(jQuery('.htheme_coupon_inner'), 1, {
                    opacity:0,
                    ease:Strong.easeOut
                }
            );

            jQuery(this).attr('data-toggle', 'open');

            jQuery(this).html('Tienes un cupón?');

        }

    });

    //REMOBE MARGINING AND PADDING FROM FIRST ROW AFTER SEARCH
    jQuery('body').find('.htheme_filter_row').next().css({
        "padding-top":0
    })

}

//GET WISHLIST DATA
function htheme_get_wishlist_data(get_load_type){

    //GET CART OBJECT
    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: {
            'action': 'htheme_get_nav_wishlist_data'
        },
        dataType: "json"
    }).done(function(data){

        //SET COUNT OF CART ITEMS
        jQuery('.htheme_icon_nav_wishlist span').html(data.length);

        //FLASH WISHLIST
        htheme_flash_icon(get_load_type);

    }).fail(function(event){
    });

}

//FLASH ICON
function htheme_flash_icon(get_load_type){

    if(get_load_type === 'click'){
        //ANIMATE
        TweenMax.to(jQuery('.htheme_icon_nav_wishlist_fill'), 0.5, {
                opacity:1,
                ease:Strong.easeOut,
                onComplete:function(){
                    TweenMax.to(jQuery('.htheme_icon_nav_wishlist_fill'), 0.5, {
                            opacity:0,
                            ease:Strong.easeOut
                        }
                    );
                }
            }
        );
    }

}

//INSERT WISHLIST ITEM
function htheme_insert_wishlist_item(){

    jQuery('.htheme_icon_list_product_wishlist, .htheme_icon_most_wanted_wish').on('click', function(){

        //VARIABLES
        var btn = jQuery(this);
        var id = jQuery(this).data('product-id');
        var login_status = jQuery(this).data('login-status');

        if(login_status === 'in'){
            //GET WISHLIST OBJECT
            jQuery.ajax({
                url:ajaxurl,
                type:"POST",
                data:{
                    'action':'htheme_add_wishlist_item',
                    'id':id
                },
                dataType:"json"
            }).done(function(data){

                jQuery(btn).parent('div').append('<div class="htheme_icon_wishlist_added"></div>');
                htheme_get_wishlist_data('click');

            }).fail(function(event){
            });
        } else {
            htheme_open_specific_box(jQuery('.htheme_wishlist_box'));
        }

    });

}

//ENABLE AJAX CHECK FOR ADD TO CART
function htheme_ajax_check(){

    //PRELOAD CART ITEMS
    htheme_get_nav_cart_data('load');

    //VARIABLES
    var add = jQuery(".add_to_cart_button");

    //BIND CLICK TO ADD TO CART BUTTON
    add.bind('click', function(){
        var clicked_button = jQuery(this);
        clicked_button.html('<div class="htheme_double_bounce1"></div><div class="htheme_double_bounce2"></div>');
        jQuery( document ).on('ajaxSuccess', function() {
            clicked_button.html('');
            htheme_add_tooltip_to_wc_button();
            htheme_get_nav_cart_data('click');
        });
    });

}

function htheme_add_tooltip_to_wc_button(){

    jQuery('.added_to_cart').each(function(){

        jQuery(this).removeAttr('title');

    });

}

//GET THE DATA FOR THE NAVIGATION CART ITEM
function htheme_get_nav_cart_data(event_type){

    //GET CART OBJECT
    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: {
            'action': 'htheme_get_nav_cart_data'
        },
        dataType: "json"
    }).done(function(data){

        //SET COUNT OF CART ITEMS
        jQuery('.htheme_icon_nav_cart span').html(data.count);

        //CHECK CART ITEMS
        if(data.cart.length > 0){
            jQuery('.htheme_no_items').hide();
            jQuery('.htheme_has_items').show();
            //POPULATE CART HTML
            htheme_get_nav_cart_html(data);
        } else {
            jQuery('.htheme_has_items').hide();
            jQuery('.htheme_no_items').show();
        }

        if(event_type === 'click'){
            htheme_open_specific_box(jQuery('.htheme_cart_box'));
        }

        if(event_type === 'delete'){
            jQuery('.htheme_cart_box').parent('ul').children('.htheme_box_toggle').trigger('click');
        }

        //STOP AJAX SUCCESS
        jQuery( document ).off('ajaxSuccess');

    }).fail(function(event){
    });

}

//GET NAV CART HTML
function htheme_get_nav_cart_html(obj){

    var html = '';
    var count = 1;

    //LOOP EACH PRODUCT
    jQuery(obj.cart.reverse()).each(function(index, element){

        if(count < 4){
            html += '<div class="htheme_box_product">';
                html += '<a href="'+element.link+'" class="htheme_box_product_image" style="background-image:url('+element.image+');"></a>';
                html += '<a href="'+element.link+'" class="htheme_box_product_info">';
                    html += '<div class="htheme_vertical_align">';
                        html += '<span class="htheme_box_product_heading">'+element.title+'</span>';
                        var item = 'item';
                        if(element.quantity > 1){
                            item = 'items'
                        }
                        html += '<span class="htheme_box_product_sub">Quantity '+element.quantity + ' - ' + obj.symbol + '' +element.total+'</span>';
                    html += '</div>';
                html += '</a>';
                html += '<div class="htheme_box_product_remove htheme_remove_nav_box" data-product-id="'+element.id+'">';
                    html += '<div class="htheme_vertical_align"></div>';
                html += '</div>';
                html += '<div class="htheme_box_scaler"></div>';
            html += '</div>';
        }
        count++;

    });


    jQuery('.htheme_box_price').html('Total: ' + obj.total);

    jQuery('.htheme_box_cart_items').html(html);

    //ENABLE REMOVE CART
    htheme_remove_cart_item();

}

function htheme_remove_cart_item(){

    jQuery('.htheme_remove_nav_box').on('click', function(){

        //VARIABLES
        var id = jQuery(this).data('product-id');

        //GET CART OBJECT
        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                'action': 'htheme_remove_cart_item',
                'id':id
            },
            dataType: "json"
        }).done(function(data){

            if(data.status = 'success'){
                htheme_get_nav_cart_data('delete');
            }

        }).fail(function(event){
        });

    });

}

//GENERATE SELECT
function htheme_generate_select(){

    jQuery('.htheme_generate_select, .widget_layered_nav select, .woocommerce-ordering select').each(function(index, element){

        var html = '';
        var type = jQuery(this).data('type');
        var type_filter = 'data-filter-type="form"';

        //ENABLE BLOG FILTER SELECT
        if(type === 'blog_filter'){
            type_filter = 'data-filter-type="blog"';
        }

        html += '<div class="htheme_filter_value htheme_icon_filter_value" '+type_filter+' data-select-dropdown="true" data-toggle="open" data-link="'+element.id+'">';

        var htheme_label = 'Please select.';

        jQuery(this).children('option').each(function(index, option){
            if(jQuery(this).is(':selected')){
                htheme_label = option.text;
            }
        });

            html += '<span>'+htheme_label+'</span>';

            html += '<div class="htheme_filter_dropdown">';
                html += '<div class="htheme_filter_dropdown_inner">';
                    html += '<ul>';
                        jQuery(this).children('option').each(function(index, option){
                            html += '<li data-value="'+jQuery(this).val()+'" data-link="'+element.id+'">'+option.text+'</li>';
                        });
                    html += '</ul>';
                html += '</div>';
            html += '</div>';
        html += '</div>';

        jQuery(this).parent('.htheme_sidebar_source, .htheme_filter_select_item, form').append(html);

    });
}

//LOAD MORE PRODUCTS
function htheme_load_more_products(){

    /*jQuery('body').find('.htheme_product_list_inner').each(function(){
        var the_height = jQuery(this).children('.htheme_col_3').first().height();
        jQuery(this).height(the_height);
    });*/

    jQuery('.htheme_product_list').find('.htheme_load_more').on('click', function(){

        //VARIABLES
        var btn_element = jQuery(this);
        var offset_amount = 4;
        var type = jQuery(btn_element).attr('data-type');
        var offset = jQuery(btn_element).attr('data-offset');
        var categories = jQuery(btn_element).attr('data-categories');
        var sorting = jQuery(btn_element).attr('data-sorting');
        var rows = jQuery(this).parents('.htheme_product_list').data('rows');
        var amount = 0;
        var current_height = jQuery(this).parents('.htheme_product_list').children('.htheme_product_list_inner').height();
        //var padding = 40;

        jQuery(this).parents('.htheme_product_list').prepend('<div class="htheme_product_loading"><div class="htheme_inner_product_load"><div class="htheme_spinner"><div class="htheme_double_bounce1"></div><div class="htheme_double_bounce2"></div></div></div></div>');

        jQuery('.htheme_product_loading').height(current_height);

        if(type === 'clear'){
            amount = parseInt(jQuery(btn_element).attr('data-click-amount'));
        } else {
            amount = parseInt(parseInt(jQuery(btn_element).attr('data-click-amount')) + 1);
        }

        //SET NEW AMOUNT VALUE
        jQuery(btn_element).attr('data-offset', (offset_amount*amount));
        jQuery(btn_element).attr('data-click-amount', amount);

        //ADD CLASS TO BUTTON
        jQuery(btn_element).children('.htheme_load_more_btn').addClass('htheme_busy_loading');

        //GET TEST OBJECT
        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                'action': 'htheme_ajax_loadmore',
                'offset': offset,
                'categories': categories,
                'sorting': sorting,
                'amount': amount,
                'rows': rows,
                'type': type
            },
            dataType: "html"
        }).done(function(data){
            //REMOVE CLASS
            jQuery('.htheme_product_list_inner').children('div').removeClass('htheme_faded_item');
            //ADD PRODUCTS TO FRONTEND
            jQuery('.htheme_product_loading').remove();
            if(type === 'clear'){
                jQuery('.htheme_product_list_inner').html(data);
            } else {
                jQuery('.htheme_product_list_inner').append(data);
            }
            jQuery('.htheme_faded_item').each(function(index, element){
                var speed = (0.4 * (index+0.6));
                TweenMax.to(jQuery(element), 1, {
                        opacity:1,
                        delay:speed,
                        marginTop:0,
                        ease:Strong.easeOut
                    }
                );
            });
            TweenMax.to(jQuery('.htheme_faded_item'), 2, {
                    ease:Strong.easeOut,
                    onComplete:function(){
                        htheme_active_item_hover(jQuery('.htheme_product_list_item'), jQuery('.htheme_product_list_item').attr('data-hover-type'));
                    }
                }
            );
            //PREVIEW ENABLE
            htheme_popup_preview();
            //ENABLE TOOLTIPS
            htheme_enable_tooltip();
            //ENABLE ADD TO CART CHECK
            htheme_ajax_check();
            //GET WISHLIST
            if(jQuery('body').find('.htheme_icon_nav_wishlist').length > 0){
                htheme_insert_wishlist_item();
                htheme_get_wishlist_data('load');
            }

            //REMOVE CLASS TO BUTTON
            jQuery(btn_element).children('.htheme_load_more_btn').removeClass('htheme_busy_loading');

            //COUNT PRODUCTS
            var count = (data.match(/htheme_product_list_item/g) || []).length;

            //SHOW HIDE LOAD MORE
            if(count < 4){
                jQuery(btn_element).hide();
            } else {
                jQuery(btn_element).show();
            }

            //SET BACK TO LOADMORE ON DATA TYPE
            jQuery(btn_element).attr('data-type', 'loadmore');

        }).fail(function(event){
        });

    });

    //ENABLE CATEGORY CLICK
    jQuery('body').find('.htheme_category_more').on('click', function(){

        var btn_element = jQuery(this);
        var offset = jQuery(btn_element).attr('data-offset');
        var categories = jQuery(btn_element).attr('data-categories');
        var sorting = jQuery(btn_element).attr('data-sorting');
        var amount = parseInt(jQuery(btn_element).attr('data-click-amount'));
        var link = jQuery(btn_element).attr('data-link');
        var type = jQuery(btn_element).attr('data-type');

        //SET ACTIVE
        jQuery(this).parents('.htheme_product_categories_switch').children('.htheme_categories_wrap').children('.htheme_inner_col').children('.htheme_category_more').each(function(){
            if(categories == jQuery(this).attr('data-categories')){
                jQuery(this).addClass('htheme_is_active_category');
            } else {
                jQuery(this).removeClass('htheme_is_active_category');
            }
        });

        //SET THE LOAD BUTTON
        jQuery('#' + link).find('.htheme_load_more').attr('data-offset', offset);
        jQuery('#' + link).find('.htheme_load_more').attr('data-categories', categories);
        jQuery('#' + link).find('.htheme_load_more').attr('data-sorting', sorting);
        jQuery('#' + link).find('.htheme_load_more').attr('data-click-amount', amount);
        jQuery('#' + link).find('.htheme_load_more').attr('data-type', type);

        //TRIGGER CLICK
        jQuery('#' + link).find('.htheme_load_more').trigger('click');

    });

}

//ENABLE SELECT BOXES
function htheme_enable_tooltip(){

    jQuery('body').find('[data-tooltip=true]').each(function(){

        //SET THE CONTAINER TO RELAVTIVE
        jQuery(this).css({
            'position':'relative'
        });

        jQuery(this).on({
            'mouseenter': function(){

                //STATEMENT
                if(jQuery(this).find('.htheme_tooltip_holder').length < 1){
                    var the_tip_html = '';
                    var the_tip_text = jQuery(this).attr('data-tooltip-text');

                    the_tip_html += '<div class="htheme_tooltip_holder">';
                        the_tip_html += '<div class="htheme_tooltip_inner htheme_icon_tooltip">';
                            the_tip_html += '<div class="htheme_tooltip_wrap">'+the_tip_text+'</div>';
                        the_tip_html += '</div>';
                    the_tip_html += '</div>';

                    jQuery(this).append(the_tip_html);
                }

                //SET VISIBLE
                jQuery(this).find('.htheme_tooltip_holder').css({'display':'table'});

                //VARAIBLES
                var width_tooltip = jQuery(this).find('.htheme_tooltip_wrap').width();
                var width_of_holder = (width_tooltip+20);

                //SET WIDTH
                jQuery(this).find('.htheme_tooltip_holder, .htheme_tooltip_inner').width(width_of_holder);

                //SET LEFT MARGINING
                jQuery(this).find('.htheme_tooltip_holder').css({
                    'margin-left':-(width_of_holder/2)+'px'
                });

                //ANIMATE
                TweenMax.to(jQuery(this).find('.htheme_tooltip_holder'), 0.5, {
                        top:-25,
                        opacity:1,
                        ease:Strong.easeOut
                    }
                );

                //PRODUCT ITEM SPECIFIC
                jQuery(this).parents('.htheme_product_list_button').css({'overflow':'visible'});

            },
            'mouseleave': function(){

                var hover_element = jQuery(this);
                var holder = jQuery(this).find('.htheme_tooltip_holder');

                //ANIMATE
                TweenMax.to(jQuery(this).find('.htheme_tooltip_holder'), 0.5, {
                        top:-15,
                        opacity:0,
                        ease:Strong.easeOut,
                        onComplete:function(){
                            //SET NOT VISIBLE
                            jQuery(holder).css({'display':'none'});
                        }
                    }
                );

            }
        });

    });

}

//ENABLE SELECT BOXES
function htheme_enable_select_boxes(){

    jQuery('body').find('[data-select-dropdown=true]').each(function(){

        jQuery(this).on('click', function(){

            var el = jQuery(this).find('.htheme_filter_dropdown');
            var span = jQuery(this).find('span');

            jQuery(this).find('.htheme_filter_dropdown').css({'display':'block'});

            //VARIABLES
            var toggle = jQuery(this).attr('data-toggle');
            var inner_height = jQuery(this).find('.htheme_filter_dropdown_inner').height() + 20;

            if(toggle === 'open'){

                TweenMax.to(jQuery(this).find('.htheme_filter_dropdown'), 1, {
                        height:inner_height,
                        opacity:1,
                        ease:Strong.easeOut
                    }
                );
                TweenMax.to(jQuery(span), 0.5, {
                        opacity:0,
                        ease:Strong.easeOut
                    }
                );
                jQuery(this).attr('data-toggle', 'close');

            } else {

                TweenMax.to(jQuery(this).find('.htheme_filter_dropdown'), 1, {
                        height:30,
                        opacity:0,
                        ease:Strong.easeOut,
                        onComplete:function(){
                            jQuery(el).css({'display':'none'});
                        }
                    }
                );
                TweenMax.to(jQuery(span), 0.5, {
                        opacity:1,
                        ease:Strong.easeOut
                    }
                );
                jQuery(this).attr('data-toggle', 'open');

            }

            jQuery(el).find('li').on('click', function(){

                //VARIABLES
                var type = jQuery(el).parents('.htheme_filter_value').data('filter-type');
                var select_value = jQuery(this).data('value');
                var select_text = jQuery(this).text();
                var element = jQuery(this);

                if(type === 'blog'){
                    window.location.href = select_value;
                } else {

                    //SET SELECT BOX
                    jQuery(element).parents('.htheme_filter_value').prev('select').children('option').each(function(index, option){
                        if(jQuery(this).val() == select_value){
                            jQuery(this).attr('selected', 'selected').trigger('change');
                        }
                    });

                    //SET LABEL
                    jQuery(span).html(jQuery(this).html());
                }

            });

        });

    });

    jQuery(document).on('click', function(event){

        jQuery('body').find('[data-select-dropdown=true]').each(function(){

            var container = jQuery(this);

            if (!container.is(event.target) // if the target of the click isn't the container...
                && container.has(event.target).length === 0) // ... nor a descendant of the container
            {
                if(jQuery(this).attr('data-toggle') === 'close'){
                    jQuery(this).trigger('click');
                }
            }

        });

    });

}

//ENABLE PRODUCT INFO SWITCHING
function htheme_product_info(){

    htheme_product_info_animate('1');

    jQuery('.htheme_content_tabs_inner').find('.htheme_content_tabs_item').on('click', function(){

        var content_id = jQuery(this).attr('data-id');

        htheme_product_info_animate(content_id);

    });

}

function htheme_product_info_animate(content_id){

    jQuery('.htheme_content_tabs_inner').find('.htheme_content_tabs_item').each(function(){

        if(jQuery(this).attr('data-id') === content_id){
            jQuery(this).addClass('htheme_content_tabs_active');
        } else {
            jQuery(this).removeClass('htheme_content_tabs_active');
        }

    });

    jQuery('.htheme_content_tabs_content').find('.htheme_content_tabs_content_item').each(function(){

        var content_height = jQuery(this).height();

        if(jQuery(this).attr('data-id') === content_id){
            TweenMax.to(jQuery('.htheme_content_tabs_content'), 1, {
                    height:content_height,
                    ease:Strong.easeOut
                }
            );
            TweenMax.to(jQuery(this), 1, {
                    opacity:1,
                    ease:Strong.easeOut
                }
            );
        } else {
            TweenMax.to(jQuery(this), 1, {
                    opacity:0,
                    ease:Strong.easeOut
                }
            );
        }

    });

}

//ENABLE SEARCH OVERLAY
function htheme_popup_overlay(){

    //VARAIBLES
    var window_height = jQuery(window).height();

    //BUILD SLIDES
    jQuery('.htheme_gallery_item').each(function(index, element){
        jQuery('.htheme_popup_inner').append('<div class="htheme_gallery_item_slide" data-img-id="'+(index+1)+'" style="background-image:url('+jQuery(this).attr('data-gallery-src')+')"></div>');
    });

    var total_items = jQuery('.htheme_gallery_item').length;

    //HIDE ARROWS
    if(total_items <= 1){
        jQuery('.htheme_popup_arrows').hide();
    }

    //VARIABLES
    var current_position = 1;

    //BIND CLICK
    jQuery('.htheme_activate_zoom').on('click', function(){

        //VARAIBLES
        var zoom_id = jQuery(this).attr('data-zoom-id');

        current_position = zoom_id;

        //SET INNER HEIGHT
        jQuery('.htheme_popup_inner').height(window_height-100);

        jQuery('.htheme_popup_inner').css({
            'margin-top': '-'+((window_height-100)/2)+'px',
            'margin-left': '-'+(jQuery('.htheme_popup_inner').width()/2)+'px'
        });

        //SET HEIGHT
        jQuery('.htheme_popup_overlay').height(window_height+80);

        //SET OPACITY
        TweenMax.to(jQuery('.htheme_popup_overlay'), 1, {
                opacity:1,
                display:'table',
                ease:Strong.easeOut
            }
        );

        //ANIMATE SLIDE
        htheme_animate_product_image(current_position, 0);

        //ADD SIDE CLICK ACTION
        jQuery('.htheme_popup_arrows').off().on('click', function(){
            var side = jQuery(this).attr('data-side');
            switch(side){
                case 'left':
                    current_position--;
                    if(current_position < 1){
                        current_position = total_items;
                    }
                    //ANIMATE SLIDE
                    htheme_animate_product_image(current_position, 1);
                    break;
                case 'right':
                    current_position++;
                    if(current_position > total_items){
                        current_position = 1;
                    }
                    //ANIMATE SLIDE
                    htheme_animate_product_image(current_position, 1);
                    break;
            }

        });

    });

    jQuery('.htheme_popup_overlay').on('click', function(event){

        jQuery('.htheme_popup_inner').each(function(){

            var container = jQuery(this);

            if (!container.is(event.target) // if the target of the click isn't the container...
                && container.has(event.target).length === 0) // ... nor a descendant of the container
            {
                //SET OPACITY
                TweenMax.to(jQuery('.htheme_popup_overlay'), 1, {
                        opacity:0,
                        display:'none',
                        ease:Strong.easeOut
                    }
                );
            }

        });

    });

    htheme_check_variation();

}

//ENABLE PREVIEW
function htheme_popup_preview(){

    //VARAIBLES
    var window_height = jQuery(window).height();
    var current_position = 1;

    //BIND CLICK
    jQuery('.htheme_activate_preview').on('click', function(){

        //SET POSITION
        current_position = 1;

        //CLEAR HTML
        jQuery('.htheme_preview_load').html('');

        //ADD LOADER
        jQuery('.htheme_preview_load').html('<div class="htheme_preview_loader"><div class="htheme_spinner"><div class="htheme_double_bounce1"></div><div class="htheme_double_bounce2"></div></div></div>');

        //VARAIBLES
        var product_id = jQuery(this).attr('data-product-id');

        //SET HEIGHT
        jQuery('.htheme_popup_preview').height(window_height+80);

        //SET OPACITY
        TweenMax.to(jQuery('.htheme_popup_preview'), 1, {
                opacity:1,
                display:'table',
                ease:Strong.easeOut
            }
        );

        //ANIMATE
        TweenMax.to(jQuery('.htheme_preview_wrap'), 0, {
                opacity:0,
                ease:Strong.easeOut
            }
        );

        //GET TEST OBJECT
        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                'action': 'htheme_ajax_get_preview',
                'id': product_id
            },
            dataType: "html"
        }).done(function(data){

            jQuery('.htheme_preview_load').html(data);

            var total_items = jQuery('.htheme_preview_left .htheme_preview_slide').length;

            //ANIMATE
            TweenMax.to(jQuery('.htheme_preview_wrap'), 1, {
                    opacity:1,
                    ease:Strong.easeOut
                }
            );

            //HIDE ARROWS
            if(total_items <= 1){
                jQuery('.htheme_preview_nav').hide();
            }

            //ANIMATE FIRST
            htheme_animate_preview_image(1, 1);

            //ADD SIDE CLICK ACTION
            jQuery('.htheme_preview_gal_btn').off().on('click', function(){
                var side = jQuery(this).attr('data-side');
                switch(side){
                    case 'left':
                        current_position--;
                        if(current_position < 1){
                            current_position = total_items;
                        }
                        //ANIMATE SLIDE
                        htheme_animate_preview_image(current_position, 1);
                        break;
                    case 'right':
                        current_position++;
                        if(current_position > total_items){
                            current_position = 1;
                        }
                        //ANIMATE SLIDE
                        htheme_animate_preview_image(current_position, 1);
                        break;
                }

            });

        }).fail(function(event){

        });

    });

    jQuery('.htheme_popup_preview').on('click', function(event){

        jQuery('.htheme_preview_load').each(function(){

            var container = jQuery(this);

            if (!container.is(event.target) // if the target of the click isn't the container...
                && container.has(event.target).length === 0) // ... nor a descendant of the container
            {
                //SET OPACITY
                TweenMax.to(jQuery('.htheme_popup_preview'), 1, {
                        opacity:0,
                        display:'none',
                        ease:Strong.easeOut
                    }
                );
            }

        });

    });

}

//ENABLE SIGNUP
function htheme_popup_signup(){

    //VARAIBLES
    var window_height = jQuery(window).height();

    //SET HEIGHT
    jQuery('.htheme_signup_preview').height(window_height+80);

    //SET OPACITY
    TweenMax.to(jQuery('.htheme_signup_preview'), 1, {
            opacity:1,
            display:'table',
            ease:Strong.easeOut,
            force3D:true
        }
    );

    TweenMax.to(jQuery('.htheme_signup_holder'), 1.5, {
            marginTop:-255,
            opacity:1,
            delay:1.5,
            ease:Back.easeOut,
            force3D:true
        }
    );

    jQuery('.htheme_signup_preview').on('click', function(event){

        jQuery('.htheme_signup_holder').each(function(){

            var container = jQuery(this);

            if (!container.is(event.target) // if the target of the click isn't the container...
                && container.has(event.target).length === 0) // ... nor a descendant of the container
            {
                //SET OPACITY
                TweenMax.to(jQuery('.htheme_signup_preview'), 1, {
                        opacity:0,
                        display:'none',
                        ease:Strong.easeOut
                    }
                );
            }

        });

    });

}

//CHECK VARIATION
function htheme_check_variation(){

    if(jQuery('.variation_id').length){
        jQuery('.variation_id').on('change', function(){
            jQuery('.htheme_single_product_thumbs').find('[data-variation-img-link="'+jQuery(this).val()+'"]').trigger('click');
        });
    }

}

//ANIMATE SLIDE
function htheme_animate_product_image(position, duration){

    //SHOW IMAGE U CLICKED ON
    jQuery('.htheme_popup_overlay .htheme_popup_inner .htheme_gallery_item_slide').each(function(index, element){

        if(parseInt(jQuery(this).attr('data-img-id')) === parseInt(position)){
            TweenMax.to(jQuery(this), parseInt(duration), {
                    opacity:1,
                    ease:Strong.easeOut
                }
            );
        } else {
            TweenMax.to(jQuery(this), parseInt(duration), {
                    opacity:0,
                    ease:Strong.easeOut
                }
            );
        }

    });

}

//ANIMATE SLIDE PREVIEW
function htheme_animate_preview_image(position, duration){

    //SHOW IMAGE U CLICKED ON
    jQuery('.htheme_preview_left .htheme_preview_slide').each(function(index, element){

        if(parseInt(jQuery(this).attr('data-id')) === parseInt(position)){
            TweenMax.to(jQuery(this), parseInt(duration), {
                    opacity:1,
                    scaleX:1,
                    scaleY:1,
                    ease:Strong.easeOut,
                    force3D:true
                }
            );
        } else {
            TweenMax.to(jQuery(this), parseInt(duration), {
                    opacity:0,
                    scaleX:1.1,
                    scaleY:1.1,
                    ease:Strong.easeOut,
                    force3D:true
                }
            );
        }

    });

}

//ENABLE ACCORDION
function htheme_accordion(){

    jQuery('.htheme_faq_holder').each(function(){

        jQuery(this).children('.htheme_faq_item').on('click', function(){

            // VARIBLES
            var toggle = jQuery(this).attr('data-toggle');
            var toggle_height = jQuery(this).children('.htheme_faq_content').height() + (74);

            if(toggle === 'open'){
                jQuery(this).children('.htheme_faq_heading').addClass('htheme_icon_faq_active');
                TweenMax.to(jQuery(this), 0.5, {
                        height:toggle_height,
                        ease:Strong.easeOut
                    }
                );
                jQuery(this).attr('data-toggle', 'close');
            } else {
                jQuery(this).children('.htheme_faq_heading').removeClass('htheme_icon_faq_active');
                TweenMax.to(jQuery(this), 0.5, {
                        height:70,
                        ease:Strong.easeOut
                    }
                );
                jQuery(this).attr('data-toggle', 'open');
            }
        });

    });

}

//SHOW HIDE TOP BUTTON
function htheme_show_top(status){

    if(status === 'show'){
        TweenMax.to(jQuery('.htheme_icon_backtop'), 1, {
                opacity:1,
                display:'table',
                ease:Strong.easeOut
            }
        );
    } else {
        TweenMax.to(jQuery('.htheme_icon_backtop'), 1, {
                opacity:0,
                display:'none',
                ease:Strong.easeOut
            }
        );
    }

    //BIND CLICK
    jQuery('.htheme_icon_backtop').off().on('click', function(){
        TweenMax.to(jQuery(window), 2, {scrollTo:{y:0}, ease:Power2.easeInOut});
    });

}

//ENABLE SEARCH OVERLAY
function htheme_search_overlay(){

    //VARAIBLES
    var window_height = jQuery(window).height();

    //BIND CLICK
    jQuery('.htheme_overlay_search').on('click', function(){

        //SET HEIGHT
        jQuery('.htheme_search_overlay').height(window_height+80);

        //SET OPACITY
        TweenMax.to(jQuery('.htheme_search_overlay'), 1, {
                opacity:1,
                display:'table',
                ease:Strong.easeOut,
                onComplete:function(){
                    //SET FOCUS
                    jQuery('#s').focus();
                }
            }
        );
    });

    //BIND CLICK
    jQuery('.htheme_icon_search_close').on('click', function(){
        //SET OPACITY
        TweenMax.to(jQuery('.htheme_search_overlay'), 1, {
                opacity:0,
                display:'none',
                ease:Strong.easeOut
            }
        );
    });

}

//ENABLE INPUTS
function htheme_enable_inputs(){

    jQuery(':text, textarea').each(function(){

        jQuery(this).off().on({
            'focus': function(){
                jQuery(this).next().addClass('htheme_active_field');
            },
            'focusout': function(){
                if(jQuery(this).val() === ''){
                    jQuery(this).next().removeClass('htheme_active_field');
                }
            }
        });

    });

}

/***************
 ****************   PRODUCT SLIDER
 ****************/

//ENABLE CATEGORY SLIDER
function htheme_product_slider(){

    jQuery('.htheme_single_product_image_container').each(function(){

        //VARAIBLES
        var button = jQuery(this).find('.htheme_single_product_thumb_item');
        var product_slider = jQuery('.htheme_single_product_image_container');

        //PRELOAD FIRST SLIDE
        htheme_animate_product(product_slider, 1);

        //COUNT OF TESTIMONIALS
        //var count = jQuery(this).find('.htheme_category_slider_item').length;

        //BIND
        jQuery(button).on('click', function(){

            var thumb_id = jQuery(this).attr('data-id');

            jQuery('.htheme_icon_single_product_featured_zoom').attr('data-zoom-id', thumb_id);

            htheme_animate_product(product_slider, parseInt(thumb_id));

        });

    });

}

//ANIMATE CATEGORY
function htheme_animate_product(product_slider, id){

    //SET ACTIVE
    jQuery(product_slider).find('.htheme_single_product_thumb_item').each(function(){

        if(parseInt(jQuery(this).attr('data-id')) === id){

            //ANIMATE IN
            TweenMax.to(jQuery(this), 0.5, {
                    opacity:1,
                    borderLeft:'0px solid #FFF',
                    ease:Strong.easeOut
                }
            );

        } else {

            //ANIMATE IN
            TweenMax.to(jQuery(this), 0.2, {
                    opacity:0.5,
                    borderLeft:'0px solid #FFF',
                    ease:Strong.easeOut
                }
            );

        }
    });

    //SET IMAGE
    jQuery(product_slider).find('.htheme_single_product_featured_item').each(function(){

        if(parseInt(jQuery(this).attr('data-gallery-id')) === id){

            //ANIMATE IN
            TweenMax.to(jQuery(this), 2, {
                    opacity:1,
                    ease:Strong.easeOut
                }
            );

        } else {

            //ANIMATE IN
            TweenMax.to(jQuery(this), 0.5, {
                    opacity:0,
                    ease:Strong.easeOut
                }
            );

        }
    });

}

/***************
 ****************   HORIZONTAL SLIDER
 ****************/

//ENABLE CATEGORY SLIDER
function htheme_horizontal_slider(){

    jQuery('.htheme_horz_slider').each(function(){

        var slider_height = 0;

        //VARAIBLES
        if(jQuery(this).find('.htheme_horz_slide_item').length > 0){
            slider_height = jQuery(this).find('.htheme_horz_slide_item').first().height();
        } else {
            slider_height = jQuery(this).find('.htheme_post_slider_inner').height();
        }

        var id = jQuery(this).attr('id');
        var slider_width = jQuery(this).width();
        var items_to_display = 0;
        var desktop_big_display = parseInt(jQuery(this).attr('data-items-big-desktop'));
        var desktop_display = parseInt(jQuery(this).attr('data-items-desktop'));
        var tablet_display = parseInt(jQuery(this).attr('data-items-tablet'));
        var mobile_display = parseInt(jQuery(this).attr('data-items-mobile'));

        if(slider_width > 1500){
            items_to_display = desktop_big_display;
        } else if(slider_width > 1000){
            items_to_display = desktop_display;
        } else if(slider_width < 1000 && slider_width > 768) {
            items_to_display = tablet_display;
        } else if(slider_width < 767) {
            items_to_display = mobile_display;
        }

        htheme_create_slider_html(slider_width, items_to_display, id, slider_height);

    });

}

var global_slider_position = [];

function htheme_create_slider_html(slider_width, items_to_display, id, slider_height){

    //CREATE ARRAY
    global_slider_position[id] = 1;

    //CLEAR PAGER
    jQuery('#'+id).find('.htheme_horz_pager_shifter').html('');

    //VARAIBLES
    var number_of_items = jQuery('#'+id).find('.htheme_horz_slide_item').length;
    var width_of_item = (slider_width/items_to_display);
    var inner_width = (slider_width/items_to_display) * number_of_items;
    var pager_items = Math.ceil(number_of_items / items_to_display);
    var position = 1;

    //SET WIDTH OF INNER CONTAINER
    jQuery('#'+id).find('.htheme_post_slider_inner').width(inner_width);

    //SET HEIGHT
    jQuery('#'+id).find('.htheme_post_slider_wrapper').height(slider_height);
    jQuery('#'+id).height(parseInt(slider_height));

    //SET WIDTH OF ITEMS
    jQuery('#'+id).find('.htheme_horz_slide_item').width(width_of_item - 20); //30 is the margining on each item - this need to be subtracted from the actual width of the item

    var pager_html = '';

    //BUILD PAGER ITEMS
    for(var i = 1; i <= pager_items; i++){
        if(i !== pager_items){
            pager_html += '<span data-id="'+(i-1)+'" data-relation="'+id+'" data-items="'+items_to_display+'"> '+i+' </span>';
        } else {
            var e =  number_of_items - (items_to_display * (i-1));
            pager_html += '<span data-id="'+(i-1)+'" data-relation="'+id+'" data-items="'+e+'"> '+i+' </span>';
        }
    }

    //BUILD THE PAGER
    jQuery('#'+id).find('.htheme_horz_pager_shifter').html(pager_html);

    jQuery('#'+id).find('.htheme_horz_pager_shifter span').first().addClass('htheme_is_active_pager');

    //HIDE PAGE IF ONLY 1
    if(pager_items <= 1){
        jQuery('#'+id).find('.htheme_horz_pager_wrapper').hide();
    }

    //ENABLE PAGER
    htheme_enable_slider_pager(slider_width, items_to_display, id, pager_items, width_of_item);

    var custom_event = jQuery.support.touch ? "tap" : "click";

    //BIND
    jQuery('#'+id).find('.htheme_horz_side').off().on(custom_event, function(){
        var side = jQuery(this).attr('data-side');
        switch(side){
            case 'left':
                global_slider_position[id]--;
                if(global_slider_position[id] < 1){
                    global_slider_position[id] = pager_items;
                }
                jQuery('#'+id).find('[data-id='+(global_slider_position[id]-1)+']').trigger('click');
                break;
            case 'right':
                global_slider_position[id]++;
                if(global_slider_position[id] > pager_items){
                    global_slider_position[id] = 1;
                }
                jQuery('#'+id).find('[data-id='+(global_slider_position[id]-1)+']').trigger('click');
                break;
        }

    });

    //SET SHIFTER WIDTH
    jQuery('#'+id).find('.htheme_horz_pager_shifter').width(pager_items*30);

    //SET INNER WIDTH
    if(pager_items <= 3){
        jQuery('#'+id).find('.htheme_horz_slider_pager_inner').width(pager_items*30);
    }

}

function htheme_enable_slider_pager(slider_width, items_to_display, id, pager_items, width_of_item){

    //RESHIFT
    TweenMax.to(jQuery('#'+id).find('.htheme_horz_pager_shifter'), 1, { left:0, ease:Strong.easeInOut } );
    TweenMax.to(jQuery('#'+id).find('.htheme_post_slider_inner'), 1, {
            left:0,
            ease:Strong.easeInOut
        }
    );

    jQuery('#'+id).find('.htheme_horz_slider_pager_inner span').on('click', function(){

        var the_link = jQuery(this).attr('data-id');

        global_slider_position[id] = parseInt(jQuery(this).attr('data-id')) + 1;

        jQuery('#'+id).find('.htheme_horz_pager_shifter span').each(function(){
            if(the_link === jQuery(this).attr('data-id')){
                jQuery(this).addClass('htheme_is_active_pager');
            } else {
                jQuery(this).removeClass('htheme_is_active_pager');
            }
        });

        //VARIABLES
        var prev_all = 0;
        var shift_left = 0;
        var element_id = jQuery(this).attr('data-id');

        if(jQuery(this).prevAll()){
            jQuery(this).prevAll().each(function(){
                prev_all += parseInt(jQuery(this).attr('data-items'));
            });
        }

        if(prev_all > 0){
            var subtracted = jQuery(this).prev().attr('data-items') - jQuery(this).attr('data-items');
            shift_left = width_of_item * (prev_all - subtracted);
        }

        TweenMax.to(jQuery('#'+id).find('.htheme_post_slider_inner'), 1, {
                left:-(shift_left),
                ease:Strong.easeInOut
            }
        );

        //SHIFT THE SHIFTER
        var shift_amount = 30;
        var prev_id = jQuery(this).prev('span').data('id');
        var next = jQuery(this).nextAll().length;
        var prev = jQuery(this).prevAll().length;

        //SET SHIFTER WIDTH
        jQuery('#'+id).find('.htheme_horz_pager_shifter').width(pager_items*shift_amount);

        if(pager_items > 3){
            if(next < 1){
                TweenMax.to(jQuery('#'+id).find('.htheme_horz_pager_shifter'), 1, { left:-(shift_amount * (prev_id - 1)), ease:Strong.easeInOut } );
            } else if(prev < 1){
                TweenMax.to(jQuery('#'+id).find('.htheme_horz_pager_shifter'), 1, { left:0, ease:Strong.easeInOut } );
            } else {
                TweenMax.to(jQuery('#'+id).find('.htheme_horz_pager_shifter'), 1, { left:-(shift_amount * prev_id), ease:Strong.easeInOut } );
            }
        }

    });

}


/***************
 ****************   CATEGORY SLIDER
 ****************/

//ENABLE CATEGORY SLIDER
function htheme_category_look_slider(){

    jQuery('.htheme_category_slider').each(function(){

        //VARAIBLES
        var position = 1;
        var button = jQuery(this).children('.htheme_category_slider_navigation').children('.htheme_category_button');
        var category_slider = jQuery(this).attr('id');

        //PRELOAD FIRST SLIDE
        htheme_animate_category(category_slider, 1);

        //COUNT OF TESTIMONIALS
        var count = jQuery(this).find('.htheme_category_slider_item').length;

        //HIDE ARROWS
        if(count <= 1){
            jQuery('.htheme_category_slider_navigation').hide();
        }

        //BIND
        jQuery(button).on('click', function(){

            var side = jQuery(this).attr('data-side');

            switch(side){
                case 'left':
                    position--;
                    if(position < 1){
                        position = count;
                    }
                    htheme_animate_category(category_slider, position, 'left');
                    break;
                case 'right':
                    position++;
                    if(position > count){
                        position = 1;
                    }
                    htheme_animate_category(category_slider, position, 'right');
                    break;
            }
        });

    });

}

//ANIMATE CATEGORY
function htheme_animate_category(category_slider, position){

    jQuery('#'+category_slider).off().on({
        'mouseenter': function(){
            TweenMax.to(jQuery(this).children('.htheme_category_slider_navigation'), 1, {
                    opacity:1,
                    ease:Strong.easeOut
                }
            );
        },
        'mouseleave': function(){
            TweenMax.to(jQuery(this).children('.htheme_category_slider_navigation'), 1, {
                    opacity:0,
                    ease:Strong.easeOut
                }
            );
        }
    });

    jQuery('#'+category_slider).find('.htheme_category_slider_title_inner').off().on({
        'mouseenter': function(){
            TweenMax.to(jQuery(this), 0.5, {
                    padding:"40px",
                    ease:Strong.easeOut
                }
            );
        },
        'mouseleave': function(){
            TweenMax.to(jQuery(this), 1, {
                    padding:"30px",
                    ease:Strong.easeOut
                }
            );
        }
    });

    jQuery('#'+category_slider).find('.htheme_category_slider_item').each(function(){
        if(parseInt(jQuery(this).attr('data-id')) === position){

            //ANIMATE IN
            TweenMax.to(jQuery(this), 2, {
                    opacity:1,
                    scaleY:1,
                    scaleX:1,
                    zIndex:1,
                    ease:Strong.easeOut
                }
            );

        } else {

            //ANIMATE IN
            TweenMax.to(jQuery(this), 0.5, {
                    opacity:0,
                    scaleY:1.1,
                    scaleX:1.1,
                    zIndex:0,
                    ease:Strong.easeOut
                }
            );

        }
    });

    jQuery('#'+category_slider).find('.htheme_category_span').each(function(){
        if(parseInt(jQuery(this).attr('data-id')) === position){

            //ANIMATE IN
            TweenMax.to(jQuery(this), 2, {
                    opacity:1,
                    zIndex:1,
                    ease:Strong.easeOut
                }
            );

        } else {

            //ANIMATE IN
            TweenMax.to(jQuery(this), 0.5, {
                    opacity:0,
                    zIndex:0,
                    ease:Strong.easeOut
                }
            );

        }
    });

}

/***************
 ****************   LOOK COL SLIDER ONE
 ****************/

//ENABLE LOOK COL SLIDER
function htheme_enable_lookcol_slider(){

    jQuery('.htheme_lookcol_holder').each(function(){

        //VARAIBLES
        var position = 1;
        var button = jQuery(this).children('.htheme_lookcol_nav').children('.htheme_lookcol_button');
        var lookcol_slider = jQuery(this).attr('id');

        //PRELOAD FIRST SLIDE
        htheme_animate_lookcol(lookcol_slider, 1);

        //COUNT OF TESTIMONIALS
        var count = jQuery(this).children('.htheme_lookcol_item').length;

        //BIND
        jQuery(button).on('click', function(){

            var side = jQuery(this).attr('data-side');

            switch(side){
                case 'left':
                    position--;
                    if(position < 1){
                        position = count;
                    }
                    htheme_animate_lookcol(lookcol_slider, position, 'left');
                    break;
                case 'right':
                    position++;
                    if(position > count){
                        position = 1;
                    }
                    htheme_animate_lookcol(lookcol_slider, position, 'right');
                    break;
            }

        });

    });

}

//ANIMATE LOOK COL
function htheme_animate_lookcol(lookcol_slider, position, side){

    jQuery('#'+lookcol_slider).off().on({
        'mouseenter': function(){
            TweenMax.to(jQuery(this).children('.htheme_lookcol_nav'), 1, {
                    opacity:1,
                    ease:Strong.easeOut
                }
            );
        },
        'mouseleave': function(){
            TweenMax.to(jQuery(this).children('.htheme_lookcol_nav'), 1, {
                    opacity:0,
                    ease:Strong.easeOut
                }
            );
        }
    });

    jQuery('#'+lookcol_slider).children('.htheme_lookcol_item').each(function(){
        if(parseInt(jQuery(this).attr('data-id')) === position){

            //ANIMATE IN
            TweenMax.to(jQuery(this), 2, {
                    opacity:1,
                    zIndex:1,
                    ease:Strong.easeOut
                }
            );

            jQuery(this).find('.htheme_lookcol_sidebar_item').each(function(index, element){
                var duration = index * 0.5;
                TweenMax.to(jQuery(this), 1, {
                        opacity:1,
                        marginTop:0,
                        delay:duration,
                        ease:Strong.easeOut
                    }
                );
            });

            //KILL TWEEN
            TweenMax.killTweensOf(jQuery(this).find('.htheme_lookcol_main_image'));

            jQuery(this).find('.htheme_lookcol_main_image').each(function(index, element){
                TweenMax.to(jQuery(this), 1, {
                        opacity:1,
                        top:0,
                        ease:Strong.easeInOut
                    }
                );
            });

        } else {

            //ANIMATE IN
            TweenMax.to(jQuery(this), 0.5, {
                    opacity:0,
                    zIndex:0,
                    ease:Strong.easeOut
                }
            );

            jQuery(this).find('.htheme_lookcol_sidebar_item').each(function(index, element){
                var duration = index * 0.5;
                TweenMax.to(jQuery(this), 1, {
                        opacity:0,
                        marginTop:-20,
                        delay:duration,
                        ease:Strong.easeOut
                    }
                );
            });

            //KILL TWEEN
            TweenMax.killTweensOf(jQuery(this).find('.htheme_lookcol_main_image'));

            jQuery(this).find('.htheme_lookcol_main_image').each(function(index, element){
                TweenMax.to(jQuery(this), 2, {
                        opacity:0,
                        delay:0.5,
                        top:'40px',
                        ease:Strong.easeOut
                    }
                );
            });

        }
    });

}

/***************
 ****************   LOOK SLIDER ONE
 ****************/

//ENABLE LOOK SLIDER
function htheme_enable_look_slider(){

    jQuery('.htheme_look_holder').each(function(){

        //VARAIBLES
        var position = 1;
        var button = jQuery(this).children('.htheme_look_navigation').children('.htheme_icon_look_nav');
        var look_slider = jQuery(this).attr('id');

        //PRELOAD FIRST SLIDE
        htheme_animate_look(look_slider, 1);

        //COUNT OF TESTIMONIALS
        var count = jQuery(this).children('.htheme_look_item').length;

        //BIND
        jQuery(button).on('click', function(){

            var side = jQuery(this).attr('data-side');

            switch(side){
                case 'left':
                    position--;
                    if(position < 1){
                        position = count;
                    }
                    htheme_animate_look(look_slider, position, 'left');
                    break;
                case 'right':
                    position++;
                    if(position > count){
                        position = 1;
                    }
                    htheme_animate_look(look_slider, position, 'right');
                    break;
            }

        });

    });

}

//ANIMATE LOOK
function htheme_animate_look(look_slider, position){

    jQuery('#'+look_slider).off().on({
        'mouseenter': function(){
            TweenMax.to(jQuery(this).children('.htheme_look_navigation'), 1, {
                    opacity:1,
                    ease:Strong.easeOut
                }
            );
        },
        'mouseleave': function(){
            TweenMax.to(jQuery(this).children('.htheme_look_navigation'), 1, {
                    opacity:0,
                    ease:Strong.easeOut
                }
            );
        }
    });

    jQuery('#'+look_slider).children('.htheme_look_item').each(function(){
        if(parseInt(jQuery(this).attr('data-id')) === position){

            //ANIMATE IN
            TweenMax.to(jQuery(this), 2, {
                    opacity:1,
                    ease:Strong.easeOut
                }
            );
            TweenMax.to(jQuery(this).children('.htheme_look_content').children('.htheme_look_inner_content'), 1, {
                    marginTop:0,
                    ease:Strong.easeOut
                }
            );
            TweenMax.to(jQuery(this).children('.htheme_split_1'), 1, {
                    left:0,
                    ease:Strong.easeOut
                }
            );
            TweenMax.to(jQuery(this).children('.htheme_split_2'), 1, {
                    right:0,
                    ease:Strong.easeOut
                }
            );

        } else {

            //ANIMATE IN
            TweenMax.to(jQuery(this), 0.5, {
                    opacity:0,
                    ease:Strong.easeOut
                }
            );
            TweenMax.to(jQuery(this).children('.htheme_look_content').children('.htheme_look_inner_content'), 1, {
                    marginTop:-40,
                    ease:Strong.easeOut
                }
            );
            TweenMax.to(jQuery(this).children('.htheme_split_1'), 3, {
                    left:0,
                    ease:Strong.easeOut
                }
            );
            TweenMax.to(jQuery(this).children('.htheme_split_2'), 3, {
                    right:0,
                    ease:Strong.easeOut
                }
            );

        }
    });

}

/***************
****************   TESTIMONIAL SLIDER
****************/

//ENABLE TESTIMONIAL SLIDER
function htheme_enable_testimonial_slider(){

    jQuery('.htheme_testimonial_holder').each(function(){

        //VARAIBLES
        var position = 1;
        var button = jQuery(this).children('.htheme_testimonail_nav').children('.htheme_testimonial_navigate');
        var pager = jQuery(this).children('.htheme_testimonial_pager').children('.htheme_testimonial_pager_inner').children('.htheme_testimonial_pager_btn');
        var testimonial_slider = jQuery(this).attr('id');

        //PRELOAD FIRST SLIDE
        htheme_animate_testimonial(testimonial_slider, 1);

        //COUNT OF TESTIMONIALS
        var count = jQuery(this).children('.htheme_testimonial_item').length;

        //HIDE ARROWS
        if(count <= 1){
            jQuery('.htheme_testimonail_nav, .htheme_testimonial_pager').hide();
        }

        //BIND
        jQuery(button).on('click', function(){

            var side = jQuery(this).attr('data-side');

            switch(side){
                case 'left':
                    position--;
                    if(position < 1){
                        position = count;
                    }
                    htheme_animate_testimonial(testimonial_slider, position, 'left');
                    break;
                case 'right':
                    position++;
                    if(position > count){
                        position = 1;
                    }
                    htheme_animate_testimonial(testimonial_slider, position, 'right');
                    break;
            }

        });

        //SET PAGER
        jQuery(pager).on('click', function(){
            var position_id = jQuery(this).attr('data-id');
            htheme_animate_testimonial(testimonial_slider, parseInt(position_id));
        });

    });

}

//ANIMATE TESTIMONIAL
function htheme_animate_testimonial(testimonial_slider, position){

    jQuery('#'+testimonial_slider).children('.htheme_testimonial_item').each(function(){
        if(parseInt(jQuery(this).attr('data-id')) === position){

            //ANIMATE IN
            TweenMax.to(jQuery(this), 2, {
                    opacity:1,
                    ease:Strong.easeOut
                }
            );

            TweenMax.to(jQuery(this).children('.htheme_testimonial_image'), 2, {
                    opacity:1,
                    scaleX:1,
                    scaleY:1,
                    ease:Strong.easeOut
                }
            );

        } else {

            //ANIMATE OUT
            TweenMax.to(jQuery(this), 1, {
                    opacity:0,
                    ease:Strong.easeOut
                }
            );

            TweenMax.to(jQuery(this).children('.htheme_testimonial_image'), 2, {
                    opacity:1,
                    scaleX:1.3,
                    scaleY:1.3,
                    ease:Strong.easeOut
                }
            );

        }
    });

    //SET PAGER ACTIVE
    jQuery('#'+testimonial_slider).children('.htheme_testimonial_pager').children('.htheme_testimonial_pager_inner').children('.htheme_testimonial_pager_btn').each(function(){
        if(parseInt(jQuery(this).attr('data-id')) === position){
            jQuery(this).addClass('htheme_active_pager');
        } else {
            jQuery(this).removeClass('htheme_active_pager');
        }
    });

}

/***************
 ****************   PROMO SLIDER
 ****************/

//ENABLE PROMO SLIDER
function htheme_enable_promo_slider(){

    jQuery('.htheme_promo_slider').each(function(){

        //VARAIBLES
        var position = 1;
        var button = jQuery(this).children('.htheme_promo_slide_inner').children('.htheme_promo_slider_nav').children('.htheme_promo_navigate');
        var promo_slider = jQuery(this).attr('id');

        //PRELOAD FIRST SLIDE
        htheme_animate_promo(promo_slider, 1);

        //COUNT OF SLIDER
        var count = jQuery(this).children('.htheme_promo_slide_inner').children('.htheme_promo_slide').length;

        //BIND
        jQuery(button).on('click', function(){

            var side = jQuery(this).attr('data-side');

            switch(side){
                case 'left':
                    position--;
                    if(position < 1){
                        position = count;
                    }
                    htheme_animate_promo(promo_slider, position, 'left');
                    break;
                case 'right':
                    position++;
                    if(position > count){
                        position = 1;
                    }
                    htheme_animate_promo(promo_slider, position, 'right');
                    break;
            }

        });

    });

}

//ANIMATE PROMO
function htheme_animate_promo(promo_slider, position){

    jQuery('#'+promo_slider).children('.htheme_promo_slide_inner').children('.htheme_promo_slide').each(function(){
        if(parseInt(jQuery(this).attr('data-id')) === position){
            jQuery(this).css({
                'z-index':10,
            });
            //ANIMATE IN
            TweenMax.to(jQuery(this), 2, {
                    opacity:1,
                    ease:Strong.easeOut
                }
            );
            TweenMax.to(jQuery(this).children('.htheme_promo_content'), 0.5, {
                    paddingTop:0,
                    ease:Strong.easeOut
                }
            );
        } else {
            jQuery(this).css({
                'z-index':0,
            });
            //ANIMATE OUT
            TweenMax.to(jQuery(this), 1, {
                    opacity:0,
                    ease:Strong.easeOut
                }
            );
            TweenMax.to(jQuery(this).children('.htheme_promo_content'), 0.5, {
                    paddingTop:50,
                    ease:Strong.easeOut
                }
            );
        }
    });

    jQuery('#'+promo_slider).parents('.htheme_promo_main').children('.htheme_promo_images').children('.htheme_promo_slide_bg').each(function(){
        if(parseInt(jQuery(this).attr('data-id')) === position){
            jQuery(this).css({
                'z-index':10,
            });
            //ANIMATE IN
            TweenMax.to(jQuery(this), 2, {
                    opacity:1,
                    ease:Strong.easeOut
                }
            );
        } else {
            jQuery(this).css({
                'z-index':0,
            });
            //ANIMATE OUT
            TweenMax.to(jQuery(this), 1, {
                    opacity:0,
                    ease:Strong.easeOut
                }
            );
        }
    });

}

/***************
 ****************   ENABLERS
 ****************/

//ENABLE MOBILE
function htheme_check_mobile(){

    var window_width = jQuery(window).width();

    htheme_toggle_menu(window_width);
    htheme_set_menu_sub(window_width);
    htheme_shift_divs(window_width);

    jQuery(window).on('resize', function(){
        window_width = jQuery(window).width();
        htheme_toggle_menu(window_width);
        htheme_set_menu_sub(window_width);
        htheme_shift_divs(window_width);
    });

}

//ENABLE DIV SHIFTER
function htheme_shift_divs(window_width){

    //SHIFT GET THE LOOK HTML
    jQuery('body').find('.htheme_lookcol_holder').each(function(){

        var this_element = jQuery(this);

        if(window_width < 768){
           // var col_to_shift = jQuery(this_element).find('.htheme_lookcol_center').parent();
            //var col_previous = jQuery(col_to_shift).prev();
            //jQuery(col_to_shift).insertBefore(col_previous);
        } else {

        }

    });
}

//ENABLE HOVER
function htheme_enable_hovers(){

    //FIND THE HOVERS
    jQuery('body').find('[data-hover-type]').each(function(){

        //VARIABLE
        var hover_element = jQuery(this);
        var hover_type = jQuery(this).attr('data-hover-type');

        //CHECK HOVERS
        switch(hover_type){
            case 'hover_product_list':
                htheme_active_item_hover(hover_element, hover_type);
            break;
            case 'hover_blog_split':
                htheme_active_item_hover(hover_element, hover_type);
            break;
            case 'hover_column_list':
                htheme_active_item_hover(hover_element, hover_type);
            break;
            case 'hover_pinterest_block':
                htheme_active_item_hover(hover_element, hover_type);
            break;
            case 'hover_product_list_box':
                htheme_active_item_hover(hover_element, hover_type);
            break;
            case'hover_launch_pads':
                htheme_active_item_hover(hover_element, hover_type);
            break;
            case 'hover_categories':
                htheme_active_item_hover(hover_element, hover_type);
            break;
            case 'hover_slider_item':
                htheme_active_item_hover(hover_element, hover_type);
            break;
            case 'hover_top_ten_item':
                htheme_active_item_hover(hover_element, hover_type);
            break;
            case 'hover_look_img':
                htheme_active_item_hover(hover_element, hover_type);
            break;
            case 'hover_people_item':
                htheme_active_item_hover(hover_element, hover_type);
            break;
            case 'hover_social':
                htheme_active_item_hover(hover_element, hover_type);
            break;
        }

    });

}

//ACTIVATE HOVERs
function htheme_active_item_hover(element, type){

    //SET HOVERS
    switch(type){
        case 'hover_product_list': // data-hover-type="hover_product_list"

            //VARIABLES
            var original_width = 0;
            var hover_status = false;

            //BIND
            jQuery(element).on({
                'mouseenter': function(){

                    TweenMax.to(jQuery(this).first().find('.htheme_product_list_options'), 0.5, {
                            opacity:1,
                            right:10,
                            force3D:true
                        }
                    );

                    TweenMax.to(jQuery(this).find('.htheme_product_secondary_img'), 0.5, {
                            opacity:1,
                            force3D:true
                        }
                    );

                },
                'mouseleave': function(){

                    TweenMax.to(jQuery(this).first().find('.htheme_product_list_options'), 0.5, {
                            opacity:0,
                            right:30,
                            force3D:true
                        }
                    );

                    TweenMax.to(jQuery(element).find('.htheme_product_secondary_img'), 0.5, {
                            opacity:0,
                            force3D:true
                        }
                    );

                }
            });

        break;

        case 'hover_blog_split':

            //BIND
            jQuery(element).off().on({
                'mouseenter': function(){
                    TweenMax.to(jQuery(this).children('.htheme_blog_image'), 7, {
                            scaleX:1.3,
                            scaleY:1.3,
                            ease:Power2.easeOut,
                            opacity:1,
                            force3D:true
                        }
                    );
                },
                'mouseleave': function(){
                    TweenMax.to(jQuery(this).children('.htheme_blog_image'), 7, {
                            scaleX:1,
                            scaleY:1,
                            ease:Power2.easeOut,
                            opacity:1,
                            force3D:true
                        }
                    );
                }
            });

        break;

        case 'hover_column_list':

            //BIND
            jQuery(element).children('.htheme_product_column_item').off().on({
                'mouseenter': function(){
                    TweenMax.to(jQuery(this).children('.htheme_product_column_content').children('.htheme_product_column_price').children('.htheme_icon_column_arrow'), 0.3, {
                            right:-40,
                            opacity:1,
                            ease:Power2.easeInOut,
                            force3D:true
                        }
                    );
                },
                'mouseleave': function(){
                    TweenMax.to(jQuery(this).children('.htheme_product_column_content').children('.htheme_product_column_price').children('.htheme_icon_column_arrow'), 0.3, {
                            right:-50,
                            opacity:0,
                            ease:Power2.easeInOut,
                            force3D:true
                        }
                    );
                }
            });

        break;

        case 'hover_pinterest_block':

            //BIND
            jQuery(element).off().on({
                'mouseenter': function(){
                    TweenMax.to(jQuery(this), 0.3, {
                            padding:40,
                            ease:Power2.easeInOut
                        }
                    );
                },
                'mouseleave': function(){
                    TweenMax.to(jQuery(this), 0.3, {
                            padding:30,
                            ease:Power2.easeInOut
                        }
                    );
                }
            });

        break;

        case 'hover_product_list_box':

            //NOTHING

        break;

        case 'hover_launch_pads':

            jQuery(element).off().on({
                'mouseenter': function(){
                    TweenMax.to(jQuery(this).children('.htheme_launch_overlay'), 0.3, {
                            scaleX:0.94,
                            scaleY:0.9,
                            opacity:0.2,
                            ease:Power2.easeInOut
                        }
                    );
                    TweenMax.to(jQuery(this).find('.htheme_icon_launch_arrow'), 0.3, {
                            marginLeft:-20,
                            opacity:1,
                            ease:Power2.easeInOut
                        }
                    );
                },
                'mouseleave': function(){
                    TweenMax.to(jQuery(this).children('.htheme_launch_overlay'), 0.3, {
                            scaleX:1,
                            scaleY:1,
                            opacity:0,
                            ease:Power2.easeInOut
                        }
                    );
                    TweenMax.to(jQuery(this).find('.htheme_icon_launch_arrow'), 0.3, {
                            marginLeft:-35,
                            opacity:0,
                            ease:Power2.easeInOut
                        }
                    );
                }
            });

        break;

        case 'hover_categories':

            jQuery(element).off().on({
                'mouseenter': function(){
                    TweenMax.to(jQuery(this).children('.htheme_inner_col').children('.htheme_product_category_content'), 0.8, {
                            height:416,
                            width:'90%',
                            ease:Strong.easeInOut
                        }
                    );
                    TweenMax.to(jQuery(this).children('.htheme_inner_col').children('.htheme_product_category_content').children('.htheme_product_category_title'), 1.5, {
                            height:90,
                            ease:Quint.easeInOut
                        }
                    );
                    TweenMax.to(jQuery(this).children('.htheme_inner_col').children('.htheme_product_category_content').children('.htheme_product_category_title').children('.htheme_product_category_hidden'), 1.5, {
                            opacity:1,
                            ease:Quint.easeInOut
                        }
                    );
                    TweenMax.to(jQuery(this).children('.htheme_inner_col').children('.htheme_product_category_content').children('.htheme_product_category_title').children('.htheme_cross_one'), 1.5, {
                            rotation:-45,
                            opacity:0.4,
                            ease:Quint.easeInOut
                        }
                    );
                    TweenMax.to(jQuery(this).children('.htheme_inner_col').children('.htheme_product_category_content').children('.htheme_product_category_title').children('.htheme_cross_two'), 1.5, {
                            rotation:45,
                            opacity:0.4,
                            ease:Quint.easeInOut
                        }
                    );
                },
                'mouseleave': function(){
                    TweenMax.to(jQuery(this).children('.htheme_inner_col').children('.htheme_product_category_content'), 0.3, {
                            opacity:1,
                            height:60,
                            width:'80%',
                            ease:Power2.easeInOut
                        }
                    );
                    TweenMax.to(jQuery(this).children('.htheme_inner_col').children('.htheme_product_category_content').children('.htheme_product_category_title'), 0.3, {
                            height:30,
                            ease:Power2.easeInOut
                        }
                    );
                    TweenMax.to(jQuery(this).children('.htheme_inner_col').children('.htheme_product_category_content').children('.htheme_product_category_title').children('.htheme_product_category_hidden'), 0.2, {
                            opacity:0,
                            ease:Quint.easeInOut
                        }
                    );
                    TweenMax.to(jQuery(this).children('.htheme_inner_col').children('.htheme_product_category_content').children('.htheme_product_category_title').children('.htheme_cross_one'), 0.5, {
                            rotation:0,
                            opacity:0,
                            ease:Quint.easeInOut
                        }
                    );
                    TweenMax.to(jQuery(this).children('.htheme_inner_col').children('.htheme_product_category_content').children('.htheme_product_category_title').children('.htheme_cross_two'), 0.5, {
                            rotation:0,
                            opacity:0,
                            ease:Quint.easeInOut
                        }
                    );
                }
            });

        break;

        case 'hover_slider_item':

            jQuery(element).off().on({
                'mouseenter': function(){
                    TweenMax.to(jQuery(this).children('.htheme_post_slider_image').children('.htheme_post_slider_overlay'), 0.8, {
                            opacity:1,
                            ease:Strong.easeOut
                        }
                    );
                    TweenMax.to(jQuery(this).children('.htheme_post_slider_image').children('.htheme_post_slider_overlay').children('.htheme_icon_slider_arrow'), 0.8, {
                            marginLeft:-20,
                            ease:Strong.easeOut
                        }
                    );
                    TweenMax.to(jQuery(this).children('.htheme_post_slider_heading').children('.htheme_post_slider_category'), 0.8, {
                            paddingLeft:0,
                            opacity:1,
                            ease:Strong.easeOut
                        }
                    );
                },
                'mouseleave': function(){
                    TweenMax.to(jQuery(this).children('.htheme_post_slider_image').children('.htheme_post_slider_overlay'), 0.3, {
                            opacity:0,
                            ease:Strong.easeOut
                        }
                    );
                    TweenMax.to(jQuery(this).children('.htheme_post_slider_image').children('.htheme_post_slider_overlay').children('.htheme_icon_slider_arrow'), 0.8, {
                            marginLeft:-35,
                            ease:Strong.easeOut
                        }
                    );
                    TweenMax.to(jQuery(this).children('.htheme_post_slider_heading').children('.htheme_post_slider_category'), 0.8, {
                            paddingLeft:20,
                            opacity:0,
                            ease:Strong.easeOut
                        }
                    );
                }
            });

        break;

        case 'hover_top_ten_item':

            jQuery(element).off().on({
                'mouseenter': function(){
                    TweenMax.to(jQuery(this).find('.htheme_most_wanted_line_1'), 0.5, {
                            rotation:45,
                            opacity:1,
                            ease:Power1.easeOut
                        }
                    );
                    TweenMax.to(jQuery(this).find('.htheme_most_wanted_line_2'), 0.5, {
                            rotation:-45,
                            opacity:1,
                            ease:Power1.easeOut
                        }
                    );
                    jQuery(this).find('.htheme_most_wanted_icon').each(function(index, element){
                        var speed = (0.4 * (index+0.5));
                        TweenMax.to(jQuery(this), speed, {
                                marginTop:0,
                                opacity:1,
                                ease:Strong.easeInOut
                            }
                        );
                    });
                    TweenMax.to(jQuery('.htheme_icon_wishlist_added'), 0.6, {
                            marginTop:0,
                            opacity:1,
                            ease:Strong.easeInOut
                        }
                    );
                },
                'mouseleave': function(){
                    TweenMax.to(jQuery(this).find('.htheme_most_wanted_line_1'), 2, {
                            rotation:0,
                            opacity:0,
                            ease:Strong.easeOut
                        }
                    );
                    TweenMax.to(jQuery(this).find('.htheme_most_wanted_line_2'), 2, {
                            rotation:0,
                            opacity:0,
                            ease:Strong.easeOut
                        }
                    );
                    jQuery(this).find('.htheme_most_wanted_icon').each(function(index, element){
                        var speed = (0.4 * (index+0.5));
                        TweenMax.to(jQuery(this), speed, {
                                marginTop:30,
                                opacity:0,
                                ease:Strong.easeInOut
                            }
                        );
                    });
                    TweenMax.to(jQuery('.htheme_icon_wishlist_added'), 0.6, {
                            marginTop:30,
                            opacity:0,
                            ease:Strong.easeInOut
                        }
                    );
                }
            });

        break;

        case 'hover_look_img':

            jQuery(element).off().on({
                'mouseenter': function(){
                    TweenMax.to(jQuery(this).find('.htheme_icon_look_book_inner'), 0.5, {
                            opacity:1,
                            ease:Power1.easeOut,
                            scaleX:1,
                            scaleY:1,
                            rotation:0
                        }
                    );
                },
                'mouseleave': function(){
                    TweenMax.to(jQuery(this).find('.htheme_icon_look_book_inner'), 1, {
                            opacity:0,
                            ease:Power1.easeOut,
                            scaleX:1.5,
                            scaleY:1.5,
                            rotation:25
                        }
                    );
                }
            });

        break;

        case 'hover_people_item':

            jQuery(element).off().on({
                'mouseenter': function(){
                    TweenMax.to(jQuery(this).find('.htheme_people_image').children('.htheme_people_image_inner'), 0.5, {
                            ease:Power1.easeOut,
                            scaleX:1.05,
                            scaleY:1.05
                        }
                    );
                },
                'mouseleave': function(){
                    TweenMax.to(jQuery(this).find('.htheme_people_image').children('.htheme_people_image_inner'), 0.5, {
                            ease:Power1.easeOut,
                            scaleX:1,
                            scaleY:1
                        }
                    );
                }
            });

        break;

        case 'hover_social':

            //KILL TWEEN
            TweenMax.killTweensOf(jQuery(element).children('.htheme_social_text'));

            //SPLIT TEXT
            //var mySpliteText = new SplitText(jQuery(element).children('.htheme_social_text'), {type:"words,chars"});

            jQuery(element).off().on({
                'mouseenter': function(){
                    var color = jQuery(this).attr('data-color');

                    TweenMax.to(jQuery(this).find('.htheme_social_text'), 0.2, {
                            opacity:1,
                            top:0,
                            ease:Power1.easeOut
                        }
                    );

                    /*TweenMax.staggerFrom(mySpliteText.chars, 0.5, {
                            opacity:0,
                            rotation:-240,
                            y:-100,
                            ease:Back.easeOut
                        }, 0.02
                    );*/
                },
                'mouseleave': function(){

                    TweenMax.to(jQuery(this).find('.htheme_social_text'), 0.5, {
                            opacity:0,
                            top:20,
                            ease:Power1.easeOut
                        }
                    );

                }
            });

        break;

    }

}

//ENABLE THE DROP DOWN NAVIGATION
function htheme_set_menu_sub(window_width){

    //REMOVE TOGGLE
    jQuery('.htheme_mobile_menu_toggle').remove();

    jQuery('.htheme_nav ul').first().children('li').each(function(index, element){
        jQuery(this).has('ul').addClass('htheme_icon_dropdown');
        if(window_width < 768){
            jQuery(this).has('ul').append('<div class="htheme_mobile_menu_toggle" data-toggle="open"></div>');
            htheme_bind_menu_sub();
            jQuery('.htheme_icon_dropdown, .htheme_icon_sub_dropdown').unbind();
        } else {
            htheme_bind_menu_hover();
        }
        //ADD TOGGLE DIV
        jQuery(this).find('li').each(function(index, element){
            jQuery(this).has('ul').addClass('htheme_icon_sub_dropdown');
            if(window_width < 768){
                jQuery(this).has('ul').append('<div class="htheme_mobile_menu_toggle" data-toggle="open"></div>');
                htheme_bind_menu_sub();
                jQuery('.htheme_icon_dropdown, .htheme_icon_sub_dropdown').unbind();
            }else {
                htheme_bind_menu_hover();
            }
        });
    });

    //CHECK TO ENABLE NORMAL HOVER OR ACCORDION
    if(window_width <= 768){

    } else {

    }

}

//BIND THE DEFAULT MENU HOVER
function htheme_bind_menu_hover(){

    //REMOVE STYLE ATTR
    jQuery('.htheme_icon_dropdown, .htheme_icon_sub_dropdown').children('ul').removeAttr('style');

    jQuery('.htheme_icon_dropdown, .htheme_icon_sub_dropdown').off().on(
        {
            'mouseenter': function(){
                TweenMax.to(jQuery(this).children('ul'), 0.5, {
                        opacity:1,
                        display:'table',
                        ease:Strong.easeOut
                    }
                );
                if(jQuery(this).hasClass('htheme_icon_sub_dropdown')){
                    TweenMax.to(jQuery(this).children('ul'), 0.5, {
                            top:-10,
                            ease:Strong.easeOut
                        }
                    );
                }
            },
            'mouseleave': function(){
                TweenMax.to(jQuery(this).children('ul'), 0.5, {
                        opacity:0,
                        display:'none',
                        ease:Strong.easeOut
                    }
                );
                if(jQuery(this).hasClass('htheme_icon_sub_dropdown')){
                    TweenMax.to(jQuery(this).children('ul'), 0.5, {
                            top:-20,
                            ease:Strong.easeOut
                        }
                    );
                }
            }
        }
    )
}

//BIND THE MOBILE MENU ACCORDION TOGGLE
function htheme_bind_menu_sub(){

    //REMOVE STYLE ATTRIBUTES
    jQuery('.htheme_mobile_menu_toggle').prev().removeAttr('style');
    jQuery('.htheme_small_navigation').removeAttr('style');
    jQuery('.htheme_default_navigation').removeAttr('style');

    jQuery('.htheme_mobile_menu_toggle').off().on('click', function(){

        //VARIABLES
        var toggle = jQuery(this).attr('data-toggle');
        var ul_to_toggle = jQuery(this).prev();
        var move_height = 0;

        //CALC HEIGHT
        jQuery(ul_to_toggle).first().children('li').each(function(){
            move_height += jQuery(this).height();
        });

        jQuery(ul_to_toggle).find('ul').each(function(){
            if(jQuery(this).next('div').attr('data-toggle') === 'close'){
                TweenMax.to(jQuery(this), 0.5, {
                        height:0,
                        ease:Strong.easeOut
                    }
                );
                jQuery(jQuery(this)).css({
                    'display':'inherit'
                });
                //SET TOGGLE STATUS
                jQuery(this).next('div').attr('data-toggle', 'open')
            }
        });

        if(toggle === 'open'){
            //MOVE MENU
            TweenMax.to(ul_to_toggle, 0.5, {
                    height:move_height,
                    ease:Strong.easeOut,
                    onComplete:function(){
                        jQuery(ul_to_toggle).css({
                            'display':'table'
                        });
                    }
                }
            );
            //SET TOGGLE
            jQuery(this).attr('data-toggle', 'close');
        } else {
            //MOVE MENU
            TweenMax.to(ul_to_toggle, 0.5, {
                    height:0,
                    ease:Strong.easeOut
                }
            );
            jQuery(ul_to_toggle).css({
                'display':'inherit'
            });
            //SET TOGGLE
            jQuery(this).attr('data-toggle', 'open');
        }

    });

}

//ENABLE TOGGLE MENU CLICK
function htheme_toggle_menu(window_width){

    jQuery('.htheme_icon_mobile').remove();

    if(window_width <= 768){
        jQuery('.htheme_main_navigation').addClass('htheme_mobile');
        jQuery('.htheme_main_navigation').removeClass('htheme_default');
        jQuery('.htheme_inner_navigation').prepend('<div class="htheme_icon_mobile" data-toggle="'+htheme_toggle+'"></div>');
        if(htheme_toggle !== 'close'){
            jQuery('.htheme_mobile .htheme_nav').css({
                'right':-(window_width)
            })
        }
        //SET BG COLOR
        TweenMax.to( jQuery('.htheme_default_navigation'), 0.5, {
                //backgroundColor:jQuery('.htheme_default_navigation').attr('data-mobile-background'),
                ease:Strong.easeOut
            }
        );
        htheme_check_logo('mobile');
    } else {
        jQuery('.htheme_main_navigation').removeClass('htheme_mobile');
        jQuery('.htheme_main_navigation').addClass('htheme_default');
        jQuery('.htheme_icon_mobile').remove();
        jQuery('body').css({
            'margin-left':0,
            'width':'auto'
        });
        //SET BG COLOR
        TweenMax.to( jQuery('.htheme_default_navigation'), 0.5, {
                ease:Strong.easeOut
            }
        );
        //REMOVE STYLES
        jQuery('.htheme_nav').removeAttr('style');
        //ENABLE HOVERS
        htheme_enable_hovers();
        htheme_check_logo('default');
    }

    toggle = 'open';

    //ENABLE MOBILE
    htheme_enable_toggle();

}

//ENABLE MOBILE TOGGLE
function htheme_enable_toggle(){

    jQuery('.htheme_icon_mobile').off().on('click', function(){

        //VARIABLES
        var toggle = jQuery(this).attr('data-toggle');
        var window_width = jQuery(window).width();
        var window_height = jQuery(window).height();

        if(toggle === 'open'){
            //MOVE MENU
            TweenMax.to( jQuery('.htheme_nav'), 1, {
                    right:0,
                    ease:Strong.easeOut
                }
            );
            //SET HEIGHT
            jQuery('.htheme_nav').css({
                'height': (window_height-60) + 'px'
            });
            //SET TOGGLE
            jQuery(this).attr('data-toggle', 'close');
            htheme_toggle = 'close';
        } else {
            //MOVE MENU
            TweenMax.to( jQuery('.htheme_nav'), 1.6, {
                    right:-(window_width+50),
                    ease:Strong.easeOut
                }
            );
            //SET HEIGHT
            jQuery('.htheme_nav').css({
                'height': 'auto'
            });
            //SET TOGGLE
            jQuery(this).attr('data-toggle', 'open');
            htheme_toggle = 'open';
        }

    });

}

//TOGGLE BOXES
function htheme_toggle_boxes(){

    jQuery(document).on('click', function(event){

        jQuery('.htheme_box_toggle').each(function(){

            var container = jQuery(this);

            if (!container.is(event.target)
                && container.has(event.target).length === 0)
            {
                //HIDE
                if(event.target.className !== 'htheme_icon_list_product_wishlist'){
                    htheme_hide_box_content(container);
                }
            } else {
                //SHOW
                htheme_show_box_content(container);
            }

        });

    });

}

//OPEN SPECIFIC BOX
function htheme_open_specific_box(container){

    //SHOW
    htheme_show_box_content(container);

    var misc_element = jQuery('body');

    TweenMax.to(misc_element, 3, {
        onComplete:function(){
            //SHOW
            htheme_hide_box_content(container);
        }
    });

}

//SHOW BOX CONTENT
function htheme_show_box_content(element){

    //KILL TWEEN
    TweenMax.killTweensOf(jQuery(element).children('.htheme_white_box'));

    //VARIABLES
    var item_count = jQuery(element).children('.htheme_white_box').children('.htheme_box_inner').children('.htheme_box_item').length;
    var item_height = jQuery(element).children('.htheme_white_box').children('.htheme_box_inner').height();
    var button_height = jQuery(element).height();

    jQuery(element).children('.htheme_white_box').css({
        'display':'table'
    });

    //SHOW BOX
    TweenMax.to( jQuery(element).children('.htheme_white_box'), 0.5, {
            opacity:1,
            ease:Strong.easeOut,
            height:item_height,
            top:(button_height+10),
            onComplete:function(){
                jQuery(element).children('.htheme_white_box').css({
                    'overflow':'visible'
                });
                //SHOW EACH ITEM
                for(var i = 1; i <= item_count; i++){
                    TweenMax.to( jQuery(element).children('.htheme_white_box').children('.htheme_box_inner').children('div[data-id='+i+'], a[data-id='+i+']'), 1, {
                            opacity:1,
                            ease:Strong.easeOut,
                            delay:(i * 0.1)
                        }
                    );
                }
            }
        }
    );

}

//HIDE BOX CONTENT
function htheme_hide_box_content(element){

    //KILL TWEEN
    TweenMax.killTweensOf(jQuery(element).children('.htheme_white_box'));

    //VARIABLES
    var item_count = jQuery(element).children('.htheme_white_box').children('.htheme_box_inner').children('.htheme_box_item').length;

    //SHOW BOX
    for(var i = 1; i <= item_count; i++){
        TweenMax.to(jQuery(element).children('.htheme_white_box').children('.htheme_box_inner').children('div[data-id=' + i + '], a[data-id=' + i + ']'), 1, {
                opacity:0,
                ease:Strong.easeOut,
                delay:(i * 0.1)
            }
        );
    }
    TweenMax.to( jQuery(element).children('.htheme_white_box'), 1, {
            opacity:0,
            ease:Back.easeOut,
            height:0,
            top:10,
            delay:0.5,
            onComplete:function(){
                jQuery(element).children('.htheme_white_box').css({
                    'overflow':'visible',
                    'display':'none'
                });
            }
        }
    );

}

//ADJUST MENU FOR STICKY
function htheme_front_menu(type){

    var window_width = jQuery(window).width();

    switch(type){
        case 'sticky':
            //ADD CLASS
            jQuery('.htheme_default_navigation').addClass('htheme_sticky_nav');
            //SHOW HIDE
            if(window_width > 768){
                jQuery('.htheme_main_logo img').hide();
                jQuery('.htheme_sticky_logo img').show();
            }
            //SET DEFAULT
            TweenMax.to( jQuery('.htheme_default_navigation'), 1, {
                    height:60,
                    //backgroundColor:jQuery('.htheme_default_navigation').data('sticky-background'),
                    ease:Strong.easeOut,
                    boxShadow:"0px 0px 15px 5px rgb(0, 0, 0, 0.1)"
                }
            );
            //CHANGE SMALL NAV STYLES
            jQuery('.htheme_small_navigation').css({
                'display':'block',
                'overflow':'hidden'
            });
            TweenMax.to( jQuery('.htheme_small_navigation'), 1, {
                    height:0,
                    ease:Strong.easeOut
                }
            );
            break;
        case 'default':
            //ADD CLASS
            jQuery('.htheme_default_navigation').removeClass('htheme_sticky_nav');
            //SHOW HIDE
            if(window_width > 768){
                jQuery('.htheme_main_logo img').show();
                jQuery('.htheme_sticky_logo img').hide();

                //SET DEFAULT
                TweenMax.to( jQuery('.htheme_default_navigation'), 1, {
                        height:80,
                        //backgroundColor:jQuery('.htheme_default_navigation').data('background'),
                        ease:Strong.easeOut,
                        boxShadow:"0px 0px 0px 0px rgb(221, 221, 221)"
                    }
                );
            }
            //CHANGE SMALL NAV STYLES
            jQuery('.htheme_small_navigation').css({
                'display':'table',
                'overflow':'visible'
            });
            TweenMax.to( jQuery('.htheme_small_navigation'), 1, {
                    height:45,
                    ease:Strong.easeOut
                }
            );
            break;
    }

}