<?php

if (!defined('ABSPATH'))
    exit;
return array(
    array(
                'type' => 'notebox',
                'name' => 'nb_2',
                'label' => __('Pro Version Available with full fixture :', 'vp_textdomain'),
                'description' => __('<p style="color: #000;">To get Pro Version of Image Hover Effects Pro, please buy the pro version only $9.99 <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'status' => 'normal',
            ),
    array(
        'type' => 'group',
        'repeating' => true,
        'sortable' => true,
        'name' => 'style',
        'priority' => 'high',
        'title' => __('Image Hover Item', 'vp_textdomain'),
        'fields' => array(
            array(
                'type' => 'upload',
                'name' => 'iheb_upload',
                'label' => __('Hover Image', 'vp_textdomain'),
            ),
            array(
                'type' => 'textbox',
                'name' => 'iheb_title',
                'label' => __('Title', 'vp_textdomain'),
                'default' => 'Heading Here',
            ),
            array(
                'type' => 'textbox',
                'name' => 'iheb_descr',
                'label' => __('Description', 'vp_textdomain'),
                'default' => 'Description goes here',
            ),
            array(
                'type' => 'textbox',
                'name' => 'iheb_url',
                'label' => __('Image Link', 'vp_textdomain'),
                'default' => '#',
            ),
           
        ),
    ),
    array(
        'type' => 'group',
        'repeating' => false,
        'sortable' => true,
        'name' => 'effectscustom',
        'priority' => 'high',
        'title' => __('Effects Settings', 'vp_textdomain'),
        'fields' => array(
            array(
                'type' => 'notebox',
                'name' => 'notebox',
                'label' => __('Author Comment', 'vp_textdomain'),
                'description' => __('To see all styles and effects use the <a target="_blank" href="https://www.oxilab.org/demo/image-hover-ultimate">demo site</a>', 'vp_textdomain'),
                'status' => 'normal',
            ),
            array(
                'type' => 'radiobutton',
                'name' => 'style',
                'label' => __('Select Hover Type', 'vp_textdomain'),
                'default' => array(
                    '{{first}}',
                ),
                'items' => array(
                    array(
                        'value' => 'circle',
                        'label' => 'Circle',
                    ),
                    array(
                        'value' => 'square',
                        'label' => 'Square',
                    ),
                ),
            ),
            array(
                'type' => 'select',
                'name' => 'style_effect',
                'label' => __('Hover Animation', 'vp_textdomain'),
                'id' => "testdata",
                'default' => array(
                    '{{first}}',
                ),
                'items' => array(
                    array(
                        'value' => 'effect1',
                        'label' => 'Effect 1',
                    ),
                    array(
                        'value' => 'effect2',
                        'label' => 'Effect 2',
                    ),
                    array(
                        'value' => 'effect3',
                        'label' => 'Effect 3',
                    ),
                    array(
                        'value' => 'effect4',
                        'label' => 'Effect 4',
                    ),
                    array(
                        'value' => 'effect5',
                        'label' => 'Effect 5',
                    ),
                    array(
                        'value' => 'effect6',
                        'label' => 'Effect 6',
                    ),
                    array(
                        'value' => 'effect7',
                        'label' => 'Effect 7',
                    ),
                    array(
                        'value' => 'effect8',
                        'label' => 'Effect 8',
                    ),
                    array(
                        'value' => 'effect9',
                        'label' => 'Effect 9',
                    ),
                    array(
                        'value' => 'effect10',
                        'label' => 'Effect 10',
                    ),
                    array(
                        'value' => 'effect11',
                        'label' => 'Effect 11 Pro Only',
                    ),
                    array(
                        'value' => 'effect12',
                        'label' => 'Effect 12 Pro Only',
                    ),
                    array(
                        'value' => 'effect13',
                        'label' => 'Effect 13 Pro Only',
                    ),
                    array(
                        'value' => 'effect14',
                        'label' => 'Effect 14 Pro Only',
                    ),
                    array(
                        'value' => 'effect15',
                        'label' => 'Effect 15 Pro Only',
                    ),
                    array(
                        'value' => 'effect16',
                        'label' => 'Effect 16 Pro Only',
                    ),
                    array(
                        'value' => 'effect17',
                        'label' => 'Effect 17 Pro Only',
                    ),
                    array(
                        'value' => 'effect18',
                        'label' => 'Effect 18 Pro Only',
                    ),
                    array(
                        'value' => 'effect19',
                        'label' => 'Effect 19 Pro Only',
                    ),
                    array(
                        'value' => 'effect20',
                        'label' => 'Effect 20 Pro Only',
                    ),
                    array(
                        'value' => 'effect21',
                        'label' => 'Effect 21 Pro Only',
                    ),
                    array(
                        'value' => 'effect22',
                        'label' => 'Effect 22 Pro Only',
                    ),
                    array(
                        'value' => 'effect23',
                        'label' => 'Effect 23 Pro Only',
                    ),
                    array(
                        'value' => 'effect24',
                        'label' => 'Effect 24 Pro Only',
                    ),
                    array(
                        'value' => 'effect25',
                        'label' => 'Effect 25 Pro Only',
                    ),
                    array(
                        'value' => 'effect26',
                        'label' => 'Effect 26 Pro Only',
                    ),
                    array(
                        'value' => 'effect27',
                        'label' => 'Effect 27 Pro Only',
                    ),
                    array(
                        'value' => 'effect28',
                        'label' => 'Effect 28 Pro Only',
                    ),
                    array(
                        'value' => 'effect29',
                        'label' => 'Effect 29 Pro Only',
                    ),
                    array(
                        'value' => 'effect30',
                        'label' => 'Effect 30 Pro Only',
                    ),
                    array(
                        'value' => 'effect31',
                        'label' => 'Effect 31 Pro Only',
                    ),
                    array(
                        'value' => 'effect32',
                        'label' => 'Effect 32 Pro Only',
                    ),
                    array(
                        'value' => 'effect33',
                        'label' => 'Effect 33 Pro Only',
                    ),
                    array(
                        'value' => 'effect34',
                        'label' => 'Effect 34 Pro Only',
                    ),
                    array(
                        'value' => 'effect35',
                        'label' => 'Effect 35 Pro Only',
                    ),
                ),
            ),
            array(
                'type' => 'radiobutton',
                'name' => 'animation',
                'label' => __('Animation Direction', 'vp_textdomain'),
                'default' => array(
                    '{{first}}',
                ),
                'items' => array(
                    array(
                        'value' => 'image-ultimate-left-to-right',
                        'label' => 'Left to Right',
                    ),
                    array(
                        'value' => 'image-ultimate-right-to-left',
                        'label' => 'Right to Left',
                    ),
                    array(
                        'value' => 'image-ultimate-top-to-bottom',
                        'label' => 'Top to Bottom',
                    ),
                    array(
                        'value' => 'image-ultimate-bottom-to-top',
                        'label' => 'Bottom to Top',
                    ),
                ),
            ),
            array(
                'type' => 'select',
                'name' => 'row_table',
                'label' => __('How many item\'s show in Display?', 'vp_textdomain'),
                'default' => 'image-ultimate-responsive-3',
                'items' => array(
                    array(
                        'value' => 'image-ultimate-responsive-1',
                        'label' => '1',
                    ),
                    array(
                        'value' => 'image-ultimate-responsive-2',
                        'label' => '2',
                    ),
                    array(
                        'value' => 'image-ultimate-responsive-3',
                        'label' => '3',
                    ),
                    array(
                        'value' => 'image-ultimate-responsive-4',
                        'label' => '4',
                    ),
                ),
            ),
            array(
                'type' => 'slider',
                'name' => 'imagesize',
                'label' => __('Image Size', 'vp_textdomain'),
                'description' => __('default value is 230px', 'vp_textdomain'),
                'min' => '180',
                'max' => '350',
                'step' => '5',
                'default' => '230',
            ),
            array(
                'type' => 'textbox',
                'name' => 'iheb_bottom',
                'label' => __('Bottom text', 'vp_textdomain'),
                'description' => __('Defult value is Blank & don\'t want please make if blank', 'vp_textdomain'),
                'default' => '',
            ),
            array(
                'type' => 'codeeditor',
                'name' => 'image_custom_css',
                'label' => __('Custom CSS - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('Write your custom css here.', 'vp_textdomain'),
                'mode' => 'css',
            ),
        ),
    ),
    array(
        'type' => 'group',
        'repeating' => false,
        'sortable' => true,
        'name' => 'customization',
        'priority' => 'high',
        'title' => __('Custom Settings', 'vp_textdomain'),
        'fields' => array(
            array(
                'type' => 'notebox',
                'name' => 'nb_2',
                'label' => __('Pro Version Available with full fixture :', 'vp_textdomain'),
                'description' => __('<p style="color: #000;">To get Pro Version of Image Hover Effects Pro, please buy the pro version only $9.99 <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'status' => 'normal',
            ),
            
            array(
                'type' => 'color',
                'name' => 'backgroundcolor',
                'label' => __('Background Color  - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('default Value is depend with effects', 'vp_textdomain'),
                'default' => '',
            ),
            array(
                'type' => 'slider',
                'name' => 'imageborder',
                'label' => __('Image Border - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('default, No border Value is 0', 'vp_textdomain'),
                'min' => '0',
                'max' => '30',
                'step' => '1',
                'default' => '0',
            ),
            array(
                'type' => 'slider',
                'name' => 'bordershadow',
                'label' => __('Border Shadow - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('default is 15px & Don\'t want Value is 0', 'vp_textdomain'),
                'min' => '0',
                'max' => '30',
                'step' => '1',
                'default' => '15',
            ),
            array(
                'type' => 'checkbox',
                'name' => 'newtab',
                'label' => __('Open In New Tab? - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('Check This Box if you want to open link in new TAB', 'vp_textdomain'),
                'items' => array(
                    array(
                        'value' => 'TARGET="_blank"',
                    ),
                ),
            ),
            array(
                'type' => 'radiobutton',
                'name' => 'bottomtextalain',
                'label' => __('Bottom text Align - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('Default is Right', 'vp_textdomain'),                
                'items' => array(
                    array(
                        'value' => 'left',
                        'label' => 'Left',
                    ),
                    array(
                        'value' => 'center',
                        'label' => 'Center',
                    ),
                    array(
                        'value' => 'right',
                        'label' => 'Right',
                    ),
                ),
            ),
            array(
                'type' => 'slider',
                'name' => 'headingfontsize',
                'label' => __('Heading Font Size - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('Default value is 18px', 'vp_textdomain'),
                'min' => '12',
                'max' => '30',
                'step' => '1',
                'default' => '18',
            ),
            array(
                'type' => 'radiobutton',
                'name' => 'headingfont',
                'label' => __('Heading Font Style - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('Default is Normal', 'vp_textdomain'),
                'default' => array(
                    '{{first}}',
                ),
                'items' => array(
                    array(
                        'value' => 'normal',
                        'label' => 'Normal',
                    ),
                    array(
                        'value' => 'uppercase',
                        'label' => 'Uppercase',
                    ),
                    array(
                        'value' => 'lowercase',
                        'label' => 'lowercase',
                    ),
                    array(
                        'value' => 'capitalize',
                        'label' => 'Capitalize',
                    ),
                ),
            ),
            array(
                'type' => 'checkbox',
                'name' => 'headingstyle',
                'label' => __('Heading Font Style - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('Default is Normal', 'vp_textdomain'),                
                'default' => array(
                    '{{first}}',
                ),
                'items' => array(
                    array(
                        'value' => 'normal',
                        'label' => 'Normal',
                    ),
                    array(
                        'value' => 'uppercase',
                        'label' => 'Bold',
                    ),
                    array(
                        'value' => 'italic',
                        'label' => 'Italic',
                    ),
                ),
            ),
            array(
                'type' => 'checkbox',
                'name' => 'headingunderline',
                'label' => __('Want to Add Heading Underline  - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('Check This Box if you want Underline', 'vp_textdomain'),
                'items' => array(
                    array(
                        'value' => 'no',
                    ),
                ),
            ),
            array(
                'type' => 'color',
                'name' => 'headingfontcolor',
                'label' => __('Heading Font Color - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('Default Value is depend with effects', 'vp_textdomain'),
                'default' => '',
            ),
            array(
                'type' => 'select',
                'name' => 'Customheadingfont',
                'label' => __('Custom Heading Font - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('This font will shown at Heading', 'vp_textdomain'),
                'default' => 'Roboto',
                'items' => array(
                    'data' => array(
                        array(
                            'source' => 'function',
                            'value' => 'vp_get_gwf_family',
                        ),
                    ),
                ),
            ),
            array(
                'type' => 'slider',
                'name' => 'descriptionfontsize',
                'label' => __('Description Font Size - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('Default value is 14px', 'vp_textdomain'),
                'min' => '12',
                'max' => '30',
                'step' => '1',
                'default' => '14',
            ),
            array(
                'type' => 'checkbox',
                'name' => 'imagedescfontstyle',
                'label' => __('Description Font Style - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('Default is Normal', 'vp_textdomain'),
                'default' => array(
                    '{{first}}',
                ),
                'items' => array(
                    array(
                        'value' => 'normal',
                        'label' => 'Normal',
                    ),
                    array(
                        'value' => 'uppercase',
                        'label' => 'Bold',
                    ),
                    array(
                        'value' => 'italic',
                        'label' => 'Italic',
                    ),
                ),
            ),
            array(
                'type' => 'color',
                'name' => 'descriptionfontcolor',
                'label' => __('Description Font Color - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('Default Value is depend with effects', 'vp_textdomain'),
                'default' => '',
            ),
            array(
                'type' => 'select',
                'name' => 'Customdescriptionfont',
                'label' => __('Custom Description Font - <span><a target="_blank" style="color: #005990;" href="https://www.oxilab.org/downloads/image-hover-ultimate-pro/">Pro Only</a></span>', 'vp_textdomain'),
                'description' => __('This font will shown at Description', 'vp_textdomain'),
                'default' => 'Roboto',
                'items' => array(
                    'data' => array(
                        array(
                            'source' => 'function',
                            'value' => 'vp_get_gwf_family',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
?>
