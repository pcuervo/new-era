<?php

if (!defined('ABSPATH'))
    exit;

// Register Shortcode
function iheb_oxi_effects_shortcode($atts) {
    extract(shortcode_atts(array(
        'id' => '',
                    ), $atts));


    $q = new WP_Query(
            array('posts_per_page' => -1, 'post_type' => 'iheb-oxi-hov', 'p' => $id)
    );

    while ($q->have_posts()) : $q->the_post();
        $id = get_the_ID();
        $iheb_oxi_meta = vp_metabox('iheb_oxi_meta.style', false);
        $style = vp_metabox('iheb_oxi_meta.effectscustom.0.style', false);
        $style_effect = vp_metabox('iheb_oxi_meta.effectscustom.0.style_effect', false);
        $row_table = vp_metabox('iheb_oxi_meta.effectscustom.0.row_table', false);
        $animation = vp_metabox('iheb_oxi_meta.effectscustom.0.animation', false);
        $imagesize = vp_metabox('iheb_oxi_meta.effectscustom.0.imagesize', false);
        $iheb_bottom = vp_metabox('iheb_oxi_meta.effectscustom.0.iheb_bottom', false);

        $i = 0;

        $output = '<div class="image-ultimate-container">   <div class="image-ultimate-row"> ';
        $output .= ' <style>
            .hover-img-shadow:before, .hover-img-shadow-squre:before{ box-shadow: inset 0 0 0 12px rgba(255,255,255,0.6),0 1px 2px rgba(0,0,0,0.3); }
            .image-ultimate-info-circle h3, .image-ultimate-info-circle-2 h3, .image-ultimate-info-square h3, .image-ultimate-main-sqr-2 h3, .image-ultimate-main-sqr-4 h3, .image-ultimate-info-square h3{ color:#fff ;font-size:20px !important; padding:30% 0 5% 0;border-bottom: 1px solid; font-weight: 500;}
            .image-ultimate-info-circle p , .image-ultimate-info-circle-2 p, .image-ultimate-info-square p, .image-ultimate-main-sqr-2 p, .image-ultimate-main-sqr-4 p, .image-ultimate-info-square p{ color:#ffffff;font-size:14px !important; }
            </style> ';

        foreach ($iheb_oxi_meta as $info) {

            if ($info[iheb_url] != '') {
                if ($iheb_bottom == '') {
                    $bottomtext = '';
                    $herf1st = '<a target="_blank" href="' . $info[iheb_url] . '" >';
                    $herflast = '</a>';
                } else {
                    $bottomtext = '<div class="image-ultimate-button-div"><a target="_blank" href="' . $info[iheb_url] . '" class="image-ultimate-button">' . $iheb_bottom . '</a></div>';
                    $herf1st = '';
                    $herflast = '';
                }
            } else {
                $bottomtext = '';
                $herf1st = '<span style="cursor: pointer;">';
                $herflast = '</span>';
            }

            if ($style == circle and $style_effect == effect1) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-hover image-ultimate-circle image-ultimate-circle-effect-1 ' . $animation . '" style="width:' . $imagesize . 'px; height:' . $imagesize . 'px;">
                            ' . $herf1st . '
                                <div class="hover-img hover-img-shadow">
                                    <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                </div>
                                <div class="image-ultimate-info-circle bg-1-3">
                                    <h3 >' . $info[iheb_title] . '</h3>
                                 <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                   
                                </div>
                               ' . $herflast . '
                        </div>
                    </div>                  
                               ';
            }
            if ($style == circle and $style_effect == effect2) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-map">
                            <div class="image-ultimate-hover image-ultimate-border-image-ultimate image-ultimate-circle image-ultimate-circle-effect-2 ' . $animation . '" style="width:' . $imagesize . 'px; height:' . $imagesize . 'px;">
                                ' . $herf1st . '
                                    <div class="hover-img hover-img-shadow">
                                        <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                    </div>
                                    <div class="image-ultimate-info-circle bg-1-3"  >
                                        <h3 >' . $info[iheb_title] . '</h3>
                                     <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                    </div>
                                ' . $herflast . '
                            </div>
                        </div>
                    </div>                  
                               ';
            }
            if ($style == circle and $style_effect == effect3) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-hover image-ultimate-circle image-ultimate-circle-effect-3" style="width:' . $imagesize . 'px; height:' . $imagesize . 'px;">
                            ' . $herf1st . ' 
                                <div class="hover-img hover-img-shadow">
                                    <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                </div>
                                <div class="image-ultimate-info-circle bg-1-3">
                                    <h3 >' . $info[iheb_title] . '</h3>
                                 <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                </div>
                            ' . $herflast . '
                        </div>
                    </div>   
                               ';
            }
            if ($style == circle and $style_effect == effect4) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-hover image-ultimate-circle image-ultimate-circle-effect-4 ' . $animation . '" style="width:' . $imagesize . 'px; height:' . $imagesize . 'px;">
                            ' . $herf1st . ' 
                                <div class="hover-img hover-img-shadow">
                                    <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                </div>
                                <div class="image-ultimate-info-circle bg-1-3">
                                    <h3>' . $info[iheb_title] . '</h3>
                                 <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                </div>
                            ' . $herflast . '
                        </div>
                    </div>                                
                     ';
            }
            if ($style == circle and $style_effect == effect5) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-hover image-ultimate-circle image-ultimate-circle-effect-5" style="width:' . $imagesize . 'px; height:' . $imagesize . 'px;">
                            ' . $herf1st . ' 
                                <div class="hover-img hover-img-shadow">
                                    <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                </div>
                                <div class="image-ultimate-info-circle bg-1-3">
                                    <h3>' . $info[iheb_title] . '</h3>
                                 <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                </div>
                            ' . $herflast . '
                        </div>
                    </div>                    
                               ';
            }
            if ($style == circle and $style_effect == effect6) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-hover image-ultimate-circle image-ultimate-circle-effect-6" style="width:' . $imagesize . 'px; height:' . $imagesize . 'px;">
                            ' . $herf1st . ' 
                                <div class="hover-img hover-img-shadow">
                                    <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                </div>
                                <div class="image-ultimate-info-circle bg-1-3">
                                    <h3>' . $info[iheb_title] . '</h3>
                                 <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                </div>
                            ' . $herflast . '
                        </div>
                    </div>                     
                               ';
            }
            if ($style == circle and $style_effect == effect7) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-hover image-ultimate-circle image-ultimate-circle-effect-7" style="width:' . $imagesize . 'px; height:' . $imagesize . 'px;">
                            ' . $herf1st . ' 
                                <div class="hover-img hover-img-shadow">
                                    <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                </div>
                                <div class="image-ultimate-info-circle bg-1-3">
                                    <h3>' . $info[iheb_title] . '</h3>
                                 <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                </div>
                            ' . $herflast . '
                        </div>
                    </div>                   
                   
                               ';
            }
            if ($style == circle and $style_effect == effect8) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-hover image-ultimate-circle image-ultimate-circle-effect-8" style="width:' . $imagesize . 'px; height:' . $imagesize . 'px;">
                            ' . $herf1st . ' 
                                <div class="hover-img hover-img-shadow">
                                    <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                </div>
                                <div class="image-ultimate-info-circle bg-1-2">
                                    <h3>' . $info[iheb_title] . '</h3>
                                 <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                </div>
                            ' . $herflast . '
                        </div>
                    </div>               
                               ';
            }
            if ($style == circle and $style_effect == effect9) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-map">
                            <div class="image-ultimate-hover image-ultimate-circle image-ultimate-circle-effect-9 ' . $animation . '" style="width:' . $imagesize . 'px; height:' . $imagesize . 'px;">
                                ' . $herf1st . '
                                    <div class="hover-img hover-img-shadow">
                                        <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                    </div>
                                    <div class="image-ultimate-info-circle bg-1-3">
                                        <h3>' . $info[iheb_title] . '</h3>
                                     <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                    </div>
                                ' . $herflast . '
                            </div>
                        </div>
                    </div>                       
                               ';
            }
            if ($style == circle and $style_effect == effect10) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-hover image-ultimate-circle image-ultimate-circle-effect-10" style="width:' . $imagesize . 'px; height:' . $imagesize . 'px;">
                            ' . $herf1st . ' 
                                <div class="hover-img hover-img-shadow">
                                    <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                </div>
                                <div class="image-ultimate-info-circle bg-1-2">
                                    <h3>' . $info[iheb_title] . '</h3>
                                 <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                </div>
                            ' . $herflast . '
                        </div>
                    </div>                       
                     
                               ';
            }
            if ($style == square and $style_effect == effect1) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-map">
                            <div class="image-ultimate-hover image-ultimate-square image-ultimate-square-effect-1" style="width:230px; height:230px;">
                                ' . $herf1st . '
                                    <div class="hover-img hover-img-shadow-squre">
                                        <img  src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                    </div>
                                    <div class="image-ultimate-info-square bg-1-3">
                                        <h3>' . $info[iheb_title] . '</h3>
                                     <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                    </div>
                                ' . $herflast . '
                            </div>
                        </div>
                    </div>     
                   
                               ';
            }
            if ($style == square and $style_effect == effect2) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-map">
                           <div class="image-ultimate-hover image-ultimate-square image-ultimate-square-effect-2" style="width:230px; height:230px;">
                                ' . $herf1st . '
                                    <div class="hover-img hover-img-shadow-squre">
                                        <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                    </div>
                                    <div class="image-ultimate-info-square bg-1-3">
                                        <h3>' . $info[iheb_title] . '</h3>
                                     <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                    </div>
                                ' . $herflast . '
                            </div>
                        </div>
                    </div> 

                              ';
            }
            if ($style == square and $style_effect == effect3) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-map">
                            <div class="image-ultimate-hover image-ultimate-square image-ultimate-square-effect-3" style="width:230px; height:230px;">
                                <a target="_blank" href="' . $info[iheb_url] . '" >
                                    <div class="hover-img hover-img-shadow-squre">
                                        <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                    </div>
                                    <div class="image-ultimate-info-square bg-1-3">
                                        <h3>' . $info[iheb_title] . '</h3>
                                     <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                    </div>
                                ' . $herflast . '
                            </div>
                        </div>
                    </div> 
                              ';
            }
            if ($style == square and $style_effect == effect4) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-map">
                            <div class="image-ultimate-hover image-ultimate-square image-ultimate-square-effect-4" style="width:230px; height:230px;">
                                <a target="_blank" href="' . $info[iheb_url] . '" >
                                    <div class="hover-img hover-img-shadow-squre">
                                        <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                    </div>
                                    <div class="image-ultimate-info-square bg-1-3">
                                        <h3>' . $info[iheb_title] . '</h3>
                                     <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                    </div>
                                ' . $herflast . '
                            </div>
                        </div>
                    </div>
                              ';
            }
            if ($style == square and $style_effect == effect5) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-map">
                            <div class="image-ultimate-hover image-ultimate-square image-ultimate-square-effect-5" style="width:230px; height:230px;">
                             <a target="_blank" href="' . $info[iheb_url] . '" >
                                    <div class="hover-img hover-img-shadow-squre">
                                        <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                    </div>
                                    <div class="image-ultimate-info-square bg-1-3">
                                        <h3>' . $info[iheb_title] . '</h3>
                                     <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                    </div>
                                ' . $herflast . '
                            </div>
                        </div>
                    </div>

                              ';
            }
            if ($style == square and $style_effect == effect6) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-map">
                            <div class="image-ultimate-hover image-ultimate-square image-ultimate-square-effect-6 ' . $animation . '" style="width:230px; height:230px;">
                                <a target="_blank" href="' . $info[iheb_url] . '" >
                                    <div class="hover-img hover-img-shadow-squre">
                                        <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                    </div>
                                    <div class="image-ultimate-info-square bg-1-3">
                                        <h3>' . $info[iheb_title] . '</h3>
                                     <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                    </div>
                                ' . $herflast . '
                            </div>
                        </div>
                    </div>

                              ';
            }
            if ($style == square and $style_effect == effect7) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-map">
                            <div class="image-ultimate-hover image-ultimate-square image-ultimate-square-effect-7" style="width:230px; height:230px;">
                                ' . $herf1st . '
                                    <div class="hover-img hover-img-shadow-squre">
                                        <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                    </div>
                                    <div class="image-ultimate-info-square bg-1-3">
                                        <h3>' . $info[iheb_title] . '</h3>
                                     <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                    </div>
                                ' . $herflast . '
                            </div>
                        </div>
                    </div>      
                               ';
            }
            if ($style == square and $style_effect == effect8) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-map">
                            <div class="image-ultimate-hover image-ultimate-square image-ultimate-square-effect-8" style="width:230px; height:230px;">
                                <a target="_blank" href="#" >
                                    <div class="hover-img hover-img-shadow-squre">
                                        <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                    </div>
                                    <div class="image-ultimate-info-square bg-1-3">
                                        <h3>' . $info[iheb_title] . '</h3>
                                     <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                    </div>
                                ' . $herflast . '
                            </div>
                        </div>
                    </div>          
                               ';
            }
            if ($style == square and $style_effect == effect9) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-map">
                            <div class="image-ultimate-hover image-ultimate-square image-ultimate-square-effect-9" style="width:230px; height:230px;">
                                ' . $herf1st . '
                                    <div class="hover-img hover-img-shadow-squre">
                                        <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                    </div>
                                    <div class="image-ultimate-info-square bg-1-3">
                                        <h3>' . $info[iheb_title] . '</h3>
                                     <p>' . $info[iheb_descr] . '</p>                                        ' . $bottomtext . ' 
                                    </div>
                                ' . $herflast . '
                            </div>
                        </div>
                    </div>
                               ';
            }
            if ($style == square and $style_effect == effect10) {
                $output .= '  
                    <div class="' . $row_table . '">
                        <div class="image-ultimate-map">
                            <div class="image-ultimate-hover image-ultimate-square image-ultimate-square-effect-10" style="width:230px; height:230px;">
                             <a target="_blank" href="' . $info[iheb_url] . '" >
                                    <div class="hover-img hover-img-shadow-squre">
                                        <img src="' . $info[iheb_upload] . '" alt="' . $info[iheb_title] . '">
                                    </div>
                                    <div class="image-ultimate-main-sqr-2 bg-1-3">
                                        <h3>' . $info[iheb_title] . ' Here</h3>
                                        <p> ' . $info[iheb_descr] . '</p> 
                                        ' . $bottomtext . ' 
                                    </div>
                                ' . $herflast . '
                            </div>
                        </div>
                    </div>       
                     
                               ';
            }



            $i++;
        }
        $output .='</div></div>';

    endwhile;
    wp_reset_query();
    return $output;
}

add_shortcode('iheb_oxi_hover', 'iheb_oxi_effects_shortcode');
