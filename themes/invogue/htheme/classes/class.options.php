<?php
/**
 * THEME - InVogue
 * AUTHOR - HEROPLUGINS
 */

#HERO SETTINGS PANEL FOR BACKEND
class htheme_options{

	#CONSTRUCT
	public function __construct(){

		#INSERT DEFAULT OPTIONS
		$this->htheme_add_default_options('initial');

	}

	#ADD DEFAULT DATA
	public function htheme_add_default_options($load = 'update'){

		#DEFAULT ARRAY
		$default = array(
			'settings' => array(
				'general' => array( #GENERAL SETTINGS
					'_label' => 'General Settings',
					'_slug' => 'general-settings',
					'theme' => 'InVogue Theme',
					'favIcon' => '',
					'pageLoader' => 'true',
					'toTop' => 'true',
					'codeHead' => '',
					'codeBody' => '',
					'codeCss' => '',
					'page_404_title' => 'Oops!',
					'page_404_sub' => 'It looks like the page you are looking for is not here.',
					'page_404_description' => 'Please feel free to browse the rest of our site.',
					'page_404_button_text' => 'Back to home',
					'page_404_button_url' => '#',
				),
				'styling' => array( #STYLING
					'_label' => 'Styling',
					'_slug' => 'styling',
					'accents' => array(
						array(
							'title' => 'Accent #1',
							'label' => 'accentone',
							'color' => '#2B2B2B',
						),
						array(
							'title' => 'Accent #2',
							'label' => 'accenttwo',
							'color' => '#999999',
						),
						array(
							'title' => 'Accent #3',
							'label' => 'accentthree',
							'color' => '#BCBCBC',
						),
						array(
							'title' => 'Accent #4',
							'label' => 'accentfour',
							'color' => '#84C7B6',
						),
						array(
							'title' => 'Top header divider color',
							'label' => 'accentdividerone',
							'color' => '#333333',
						),
						array(
							'title' => 'Content header divider color',
							'label' => 'accentdividertwo',
							'color' => '#EEEEEE',
						),
					),
					'buttons' => array(
						array(
							'title' => 'Button Styling',
							'slug' => 'button_primary',
							'opacity' => 1,
							'background' => '#2B2B2B',
							'backgroundHover' => '#393939',
							'family' => 'Roboto',
							'size' => '14px',
							'transform' => 'uppercase',
							'spacing' => '1.5px',
							'weight' => '300',
							'color' => '#FFFFFF',
							'hoverColor' => '#FFFFFF',
							'type' => 'square',
						),
						array(
							'title' => 'Blog Tag and Category Styling',
							'slug' => 'tag_category',
							'opacity' => 1,
							'background' => '#2B2B2B',
							'backgroundHover' => '#393939',
							'family' => 'Roboto',
							'size' => '12px',
							'transform' => 'uppercase',
							'spacing' => '1.5px',
							'weight' => '100',
							'color' => '#FFFFFF',
							'hoverColor' => '#FFFFFF',
							'type' => 'square',
						),
						array(
							'title' => 'Blockquote Styling',
							'slug' => 'blockquote',
							'opacity' => 1,
							'background' => '#2B2B2B',
							'backgroundHover' => '#393939',
							'family' => 'Lora',
							'size' => '16px',
							'transform' => 'uppercase',
							'spacing' => '1.5px',
							'weight' => '100',
							'color' => '#FFFFFF',
							'hoverColor' => '#FFFFFF',
							'type' => 'square',
						),
						array(
							'title' => 'Product Badge Styling',
							'slug' => 'product_tag',
							'opacity' => 1,
							'background' => '#2B2B2B',
							'backgroundHover' => '#393939',
							'family' => 'Roboto',
							'size' => '12px',
							'transform' => 'uppercase',
							'spacing' => '1.5px',
							'weight' => '300',
							'color' => '#FFFFFF',
							'hoverColor' => '#FFFFFF',
							'type' => 'square',
						),
					),
				),
				'typography' => array( #FONT STYLING
					'_label' => 'Typography',
					'_slug' => 'typography',
					'fonts' => array(
						array(
							'label' => 'Body',
							'slug' => 'body',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '22px',
							'style' => 'normal',
							'transform' => 'inherit',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'h1',
							'slug' => 'h1',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '35px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => '2.5px',
							'subset' => '',
							'color' => 'accentone',
						),
						array(
							'label' => 'h1 Sub Heading',
							'slug' => 'h1_sub',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '18px',
							'lineHeight' => '18px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => '0.5px',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'h2',
							'slug' => 'h2',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '30px',
							'lineHeight' => '30px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => '2px',
							'subset' => '',
							'color' => 'accentone',
						),
						array(
							'label' => 'h2 Sub Heading',
							'slug' => 'h2_sub',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'h3',
							'slug' => 'h3',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '24px',
							'lineHeight' => '20px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => '2.5px',
							'subset' => '',
							'color' => 'accentone',
						),
						array(
							'label' => 'h3 Sub Heading',
							'slug' => 'h3_sub',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'h4',
							'slug' => 'h4',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '18px',
							'lineHeight' => '18px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accentone',
						),
						array(
							'label' => 'h4 Sub Heading',
							'slug' => 'h4_sub',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '12px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'inherit',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'h5',
							'slug' => 'h5',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => '2px',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'h5 Sub Heading',
							'slug' => 'h5_sub',
							'family' => 'Lora',
							'weight' => 'italic',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'Capitalize',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accentthree',
						),
						array(
							'label' => 'h6',
							'slug' => 'h6',
							'family' => 'Lora',
							'weight' => 'italic',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'inherit',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accentfour',
						),
						array(
							'label' => 'h6 Sub Heading',
							'slug' => 'h6_sub',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '12px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'inherit',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'Form labels',
							'slug' => 'label',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => '2px',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'Form (input, select, textarea)',
							'slug' => 'input',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => '2px',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'Widget Heading',
							'slug' => 'widget_heading',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '18px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => '1px',
							'subset' => '',
							'color' => 'accentone',
						),
						array(
							'label' => 'Widget Content',
							'slug' => 'widget_content',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '20px',
							'style' => 'normal',
							'transform' => 'inherit',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'Widget Sub Content',
							'slug' => 'widget_sub_content',
							'family' => 'Roboto',
							'weight' => '100italic',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'inherit',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'Widget Price',
							'slug' => 'widget_price',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accentone',
						),
						array(
							'label' => 'Single Product and Promo Slider Title',
							'slug' => 'main_product_title',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '35px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accentone',
						),
						array(
							'label' => 'Single Product and Promo Slider Price',
							'slug' => 'main_product_price',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '30px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accentone',
						),
						array(
							'label' => 'Product List Title',
							'slug' => 'product_list_title',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '16px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accentone',
						),
						array(
							'label' => 'Product List Price',
							'slug' => 'product_list_price',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'Slider Title',
							'slug' => 'slider_title',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '30px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accentone',
						),
						array(
							'label' => 'Slider Content',
							'slug' => 'slider_content',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'Content link',
							'slug' => 'link',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'Content link hover',
							'slug' => 'link_hover',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accentone',
						),
						array(
							'label' => 'Element category',
							'slug' => 'element_category',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accenttwo',
						),
						array(
							'label' => 'Element category hover',
							'slug' => 'element_category_hover',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '14px',
							'lineHeight' => '14px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accentfour',
						),
						array(
							'label' => 'Blog category',
							'slug' => 'element_blog_category',
							'family' => 'Roboto',
							'weight' => '300',
							'size' => '12px',
							'lineHeight' => '12px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'color' => 'accentfour',
						),
					),
				),
				'header' => array( #HEADER
					'_label' => 'Header',
					'_slug' => 'header',
					'layout' => 2,
					'imageForLogo' => 'true',
					'srcLogo' => '',
					'srcLogoRetina' => 'logo_retina.png',
					'logoHeight' => '30px',
					'logoPadding' => 20,
					'srcStickyLogo' => '',
					'srcStickyLogoRetina' => 'logo_retina.png',
					'logoStickyHeight' => '30px',
					'logoStickyPadding' => 20,
					'stickOnMobile' => 'true',
					'srcMobileLogo' => '',
					'optionFullWidth' => 'false',
					'optionAccount' => 'true',
					'optionCart' => 'true',
					'optionWishlist' => 'true',
					'optionSearch' => 'true',
					'optionLanguage' => 'false',
					'colorScheme' => 'light',
					'stylingOptions' => array(
						array(
							'title' => 'Primary Navigation',
							'slug' => 'navigation_primary',
							'opacity' => 0,
							'background' => '#FFFFFF',
							'family' => 'Roboto',
							'size' => '14px',
							'lineHeight' => 16,
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'weight' => '300',
							'color' => '#666666',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'title' => 'Dropdown Navigation',
							'slug' => 'navigation_dropdown',
							'opacity' => 1,
							'background' => '#2B2B2B',
							'family' => 'Roboto',
							'size' => '14px',
							'lineHeight' => 16,
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'weight' => '300',
							'color' => '#B2B2B2',
							'hoverColor' => '#FFFFFF',
						),
						array(
							'title' => 'Sticky Navigation',
							'slug' => 'navigation_sticky',
							'opacity' => 1,
							'background' => '#FFFFFF',
							'family' => 'Roboto',
							'size' => '14px',
							'lineHeight' => 16,
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'weight' => '300',
							'color' => '#666666',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'title' => 'Mobile Navigation',
							'slug' => 'navigation_mobile',
							'opacity' => 1,
							'background' => '#2B2B2B',
							'family' => 'Roboto',
							'size' => '14px',
							'lineHeight' => 16,
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'weight' => '300',
							'color' => '#D0D0D0',
							'hoverColor' => '#FFFFFF',
						),
						array(
							'title' => 'Login Navigation',
							'slug' => 'navigation_login',
							'opacity' => 1,
							'background' => '#2B2B2B',
							'family' => 'Roboto',
							'size' => '10px',
							'lineHeight' => 16,
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'weight' => '300',
							'color' => '#AAAAAA',
							'hoverColor' => '#C6C6C6',
						),
					),
					'headerBorder' => 1,
					'headerBorderColor' => '#CC0000',
					'secondaryHeaderBorder' => 1,
					'secondaryHeaderBorderColor' => '#CC0000',
					'socialIcons' => 'true',
					'socialPrimaryColor' => '#2B2B2B',
					'socialItems' => array(
						array(
							'label' => 'facebook',
							'status' => 'true',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'label' => 'twitter',
							'status' => 'true',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'label' => 'google',
							'status' => 'true',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'label' => 'vimeo',
							'status' => 'false',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'label' => 'dribble',
							'status' => 'false',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'label' => 'pinterest',
							'status' => 'false',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'label' => 'youtube',
							'status' => 'false',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'label' => 'tumblr',
							'status' => 'false',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'label' => 'linkedin',
							'status' => 'false',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'label' => 'rss',
							'status' => 'false',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'label' => 'behance',
							'status' => 'false',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'label' => 'instagram',
							'status' => 'false',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'label' => 'flickr',
							'status' => 'false',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
						array(
							'label' => 'spotify',
							'status' => 'false',
							'url' => '#',
							'target' => '_blank',
							'hoverColor' => '#2B2B2B',
						),
					),
				),
				'footer' => array( #FOOTER
					'_label' => 'Footer',
					'_slug' => 'footer',
					'layout' => 'footer_full',
					'columnLayout' => 4,
					'colorScheme' => 'dark',
					'stylingOptions' => array(
						array(
							'title' => 'Footer Headings',
							'slug' => 'footer_headings',
							'family' => 'Roboto',
							'size' => '15px',
							'lineHeight' => '16px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => '0.5px',
							'subset' => '',
							'weight' => '300',
							'color' => '#C9C9CB',
							'linkColor' => '#CC0000',
							'hoverColor' => '#000000',
						),
						array(
							'title' => 'Footer Content',
							'slug' => 'footer_content',
							'family' => 'Roboto',
							'size' => '12px',
							'lineHeight' => '16px',
							'style' => 'normal',
							'transform' => 'none',
							'spacing' => 'normal',
							'subset' => '',
							'weight' => '300',
							'color' => '#777777',
							'linkColor' => '#BBBBBB',
							'hoverColor' => '#EFEFEF',
						),
						array(
							'title' => 'Footer Copyright',
							'slug' => 'footer_copyright',
							'family' => 'Roboto',
							'size' => '14px',
							'lineHeight' => '16px',
							'style' => 'normal',
							'transform' => 'uppercase',
							'spacing' => 'normal',
							'subset' => '',
							'weight' => '300',
							'color' => '#666666',
							'linkColor' => '#666666',
							'hoverColor' => '#FFFFFF',
						),
					),
					'backgroundPrimary' => '#2B2B2B',
					'backgroundSecondary' => '#242424',
					'copyright' => 'true',
					'copyrightText' => 'Some copyright information',
					'social' => 'true',
				),
				'blog' => array(
					'_label' => 'Blog',
					'_slug' => 'blog',
					'layout' => 'standard_no_sidebar',
					'singleLayout' => 'standard_no_sidebar',
					'socialIcons' => 'true',
					'tags' => 'true',
					'author' => 'true',
					'masonry' => 'false',
				),
				'lookbook' => array(
					'_label' => 'Lookbooks',
					'_slug' => 'lookbook',
					'layout' => 'default',
					'divider' => 'zigzag',
					'dividerColor' => '#2B2B2B',
				),
				'newsletter' => array( #NEWSLETTER
					'_label' => 'Signup Popup',
					'_slug' => 'newsletter',
					'status' => 'false',
					'page' => '',
					'title' => 'Weekly Newsletter Signup',
					'info' => 'Let us know if you would like to be included in our weekly newsletter.',
					'backgroundImage' => 'image.png',
					'backgroundSize' => 'cover',
					'backgroundPosition' => 'center',
					'backgroundColor' => '#EFEFEF',
					'sendToEmail' => 'info@awesome.co.za',
				),
				'slider' => array(
					'_label' => 'Home Slider',
					'_slug' => 'slider',
					'transition' => 'fade',
					'transitionSpeed' => 2,
					'height' => 650,
					'idleDisplay' => 'true',
					'idle' => 10,
					'slides' => array(
						array(
							'status' => 'false',
							'imageContent' => 'true',
							'layout' => 3,
							'imageContentSrc' => '',
							'backgroundSrc' => '',
							'slideTitle' => '',
							'slideContent' => '',
							'slideUrl' => '#',
							'deleted' => 'false',
							'backgroundColor' => '#FFFFFF',
							'color' => '#2B2B2B',
							'contentColor' => '#EFEFEF',
							'buttonText' => 'View Now',
							'order' => '0',
						),
					),
				),
				'woocommerce' => array( #WOOCOMMERCE
					'_label' => 'WooCommerce',
					'_slug' => 'woocommerce',
					'shopLayout' => 'no_sidebar',
					'socialIcons' => 'true',
				),
				'sharing' => array( #SHARING
					'_label' => 'Sharing',
					'_slug' => 'sharing',
					'shares' => array(
						array(
							'status' => 'false',
							'for' => 'Products',
							'postType' => 'product',
							'socialItems' => array(
								array(
									'label' => 'facebook',
									'description' => '',
									'status' => 'true',
								),
								array(
									'label' => 'twitter',
									'description' => '',
									'status' => 'true',
								),
								array(
									'label' => 'googleplus',
									'description' => '',
									'status' => 'true',
								),
								array(
									'label' => 'pinterest',
									'description' => '',
									'status' => 'true',
								),
								array(
									'label' => 'tumblr',
									'description' => '',
									'status' => 'true',
								),
							),
						),
						array(
							'status' => 'false',
							'for' => 'Posts',
							'postType' => 'post',
							'socialItems' => array(
								array(
									'label' => 'facebook',
									'description' => '',
									'status' => 'true',
								),
								array(
									'label' => 'twitter',
									'description' => '',
									'status' => 'true',
								),
								array(
									'label' => 'googleplus',
									'description' => '',
									'status' => 'true',
								),
								array(
									'label' => 'pinterest',
									'description' => '',
									'status' => 'true',
								),
								array(
									'label' => 'tumblr',
									'description' => '',
									'status' => 'true',
								),
							),
						),
						array(
							'status' => 'false',
							'for' => 'Lookbooks',
							'postType' => 'lookbook',
							'socialItems' => array(
								array(
									'label' => 'facebook',
									'description' => '',
									'status' => 'true',
								),
								array(
									'label' => 'twitter',
									'description' => '',
									'status' => 'true',
								),
								array(
									'label' => 'googleplus',
									'description' => '',
									'status' => 'true',
								),
								array(
									'label' => 'pinterest',
									'description' => '',
									'status' => 'true',
								),
								array(
									'label' => 'tumblr',
									'description' => '',
									'status' => 'true',
								),
							),
						),
					),
				),
				'demo' => array( #DEMOS
					'_label' => 'Demos',
					'_slug' => 'demos',
				),
				'import' => array( #IMPORTING
					'_label' => 'Import/Export',
					'_slug' => 'import',
				),
			),
		);

		if($load == 'initial'){

			#CONVERT ARRAY TO SERIALIZE STRING
			$serialize = serialize($default);

			#CREATE OPTION
			add_option( 'hero_theme_options', $serialize, '', 'yes' );
			add_option( 'hero_reset_options', $serialize, '', 'yes' );

		} else {

			return $default;

		}

	}

}