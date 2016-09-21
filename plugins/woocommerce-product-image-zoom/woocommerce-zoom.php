<?php
/*
	Plugin Name: WooCommerce Zoom Image
	Plugin URI: http://berocket.com/wp-plugins/zoom-image
	Description: Zoom Image on mouse click
	Version: 1.0.1
	Author: BeRocket
	Author URI: http://berocket.com
*/

class BeRocket_WZI {
	public static $defaults = array(
		"zoomWidth"     => "auto",
		"zoomHeight"    => "auto",
		"position"      => "right",
		"adjustX"       => "0",
		"adjustY"       => "0",
		"tint"          => "false",
		"tintOpacity"   => "0.5",
		"lensOpacity"   => "0.5",
		"softFocus"     => "false",
		"smoothMove"    => "3",
		"showTitle"     => "false",
		"titleOpacity"  => "0.5",
	);

	function BeRocket_WZI(){
		register_activation_hook(__FILE__, array( __CLASS__, 'br_add_defaults' ) );
		register_uninstall_hook(__FILE__, array( __CLASS__, 'br_delete_plugin_options' ) );

		add_action('admin_menu', array( __CLASS__, 'br_add_options_page' ) );
		add_action('wp_footer', array( __CLASS__, 'br_head' ), 30);
		add_action('wp_enqueue_scripts', array( __CLASS__, 'br_enqueue_scripts' ) );
		add_action( 'admin_init', array( __CLASS__, 'register_br_options' ) );

		add_filter( 'single_product_small_thumbnail_size', array( __CLASS__, 'catalog_thumbnail' ), 10, 2 ) ;
	}

	public static function register_br_options() {
		register_setting( 'br_plugin_options', 'br_options' );
	}

	public static function br_add_defaults(){
		$tmp = get_option('br_options');
		if( ( @$tmp['chk_default_options_db'] == '1' ) or ( ! @is_array( $tmp ) ) ){
			delete_option( 'br_options' );
			update_option( 'br_options', BeRocket_WZI::$defaults );
		}
	}

	public static function br_delete_plugin_options(){
		delete_option( 'br_options' );
	}

	public static function br_add_options_page(){
		add_options_page( 'Zoom Image Plugin For WooCommerce', 'Zoom Image', 'manage_options', __FILE__, array( __CLASS__, 'br_render_form' ) );
	}

	public static function br_enqueue_scripts(){
		if( is_product() ){
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'berocket-zoom-js', plugins_url( '/js/berocket-zoom.1.0.min.js', __FILE__ ), array('jquery') );
			wp_register_style( 'berocket-zoom-css', plugins_url( '/css/berocket-zoom.css', __FILE__ ) );
			wp_enqueue_style( 'berocket-zoom-css' );
		}
	}

	public static function br_head(){
		if(is_product()){
			$defaults = BeRocket_WZI::$defaults;
			$options = get_option('br_options');
			foreach( $defaults as $key => $v )
				${$key} = ( $options[$key] == "" ) ? $v : $options[$key];
			?>
			<script type="text/javascript">
				jQuery(document).ready(function($){
					$('a.zoom').unbind('click.fb').unbind('touch.fb');
					$thumbnailsContainer = $('.product .thumbnails');
					$thumbnails = $('a', $thumbnailsContainer);
					$productImages = $('.product .images>a');
					addBeRocketZoom = function(onWhat){

						onWhat.addClass('berocket-zoom').attr('rel', "zoomWidth:'<?php echo $zoomWidth ?>',zoomHeight: '<?php echo $zoomHeight ?>',position:'<?php echo $position ?>',adjustX:<?php echo $adjustX ?>,adjustY:<?php echo $adjustY ?>,tint:'<?php echo $tint ?>',tintOpacity:<?php echo $tintOpacity ?>,lensOpacity:<?php echo $lensOpacity ?>,softFocus:<?php echo $softFocus ?>,smoothMove:<?php echo $smoothMove ?>,showTitle:<?php echo $showTitle ?>,titleOpacity:<?php echo $titleOpacity ?>").BeRocketZoom();

					}
					if($thumbnails.length){
						$thumbnails.bind('click',function(){
							$image = $(this).clone(false);
							$image.insertAfter($productImages);
							$productImages.remove();
							$productImages = $image;
							$('.mousetrap').remove();
							addBeRocketZoom($productImages);

							return false;
						})

					}
					addBeRocketZoom($productImages);
				});
			</script>
		<?php
		}
	}

	public static function br_render_form(){
		?>
		<div class="wrap">

			<!-- Display Plugin Icon, Header, and Description -->
			<div class="icon32" id="icon-options-general"><br></div>
			<h4>Zoom image plugin for WooCommerce by <a href="http://berocket.com" target="_blank">BeRocket</a> &amp; <a href="http://dholovnia.me" target="_blank">Dima Holovnia</a></h4>
			<form method="post" action="options.php">
				<?php settings_fields('br_plugin_options'); ?>
				<?php $options = get_option('br_options'); ?>
				<table class="form-table">
					<tr>
						<th scope="row">zoomWidth</th>
						<td>
							<input name="br_options[zoomWidth]" type='text' value='<?php echo @$options['zoomWidth']?>'/><br /><span style="color:#666666;margin-left:2px;">The width of the zoom window in pixels.</span>
						</td>
					</tr>
					<tr>
						<th scope="row">zoomHeight</th>
						<td>
							<input name="br_options[zoomHeight]" type='text' value='<?php echo @$options['zoomHeight']?>'/><br /><span style="color:#666666;margin-left:2px;">The height of the zoom window in pixels.</span>
						</td>
					</tr>
					<tr>
						<th scope="row">position</th>
						<td>
							<select name='br_options[position]'>
								<option value='inside' <?php selected('inside', @$options['position']); ?>>Inside</option>
								<option value='left' <?php selected('left', @$options['position']); ?>>Left</option>
								<option value='right' <?php selected('right', @$options['position']); ?>>Right</option>
								<option value='top' <?php selected('top', @$options['position']); ?>>Top</option>
								<option value='bottom' <?php selected('bottom', @$options['position']); ?>>Bottom</option>
							</select>
							<br />
	                    <span style="color:#666666;margin-left:2px;">
		                    Specifies the position of the zoom window relative to the small image. Allowable values are 'left',
		                    'right', 'top', 'bottom', 'inside' or you can specifiy the id of an html element to place the zoom
		                    window in e.g. position: 'element1'
	                    </span>
						</td>
					</tr>
					<tr>
						<th scope="row">adjustX</th>
						<td>
							<input name="br_options[adjustX]" type='text' value='<?php echo @$options['adjustX']?>'/><br /><span style="color:#666666;margin-left:2px;">Allows you to fine tune the x-position of the zoom window in pixels.</span>
						</td>
					</tr>
					<tr>
						<th scope="row">adjustY</th>
						<td>
							<input name="br_options[adjustY]" type='text' value='<?php echo @$options['adjustY']?>'/><br /><span style="color:#666666;margin-left:2px;">Allows you to fine tune the y-position of the zoom window in pixels.</span>
						</td>
					</tr>
					<tr>
						<th scope="row">tint</th>
						<td>
							<input name="br_options[tint]" type='text' value='<?php echo @$options['tint']?>'/><br /><span style="color:#666666;margin-left:2px;">Specifies a tint colour which will cover the small image. Colours should be specified in hex format, e.g. '#aa00aa'. Does not work with softFocus.</span>
						</td>
					</tr>
					<tr>
						<th scope="row">tintOpacity</th>
						<td>
							<input name="br_options[tintOpacity]" type='text' value='<?php echo @$options['tintOpacity']?>'/><br /><span style="color:#666666;margin-left:2px;">Opacity of the tint, where 0 is fully transparent, and 1 is fully opaque.</span>
						</td>
					</tr>
					<tr>
						<th scope="row">lensOpacity</th>
						<td>
							<input name="br_options[lensOpacity]" type='text' value='<?php echo @$options['lensOpacity']?>'/><br /><span style="color:#666666;margin-left:2px;">Opacity of the lens mouse pointer, where 0 is fully transparent, and 1 is fully opaque. In tint and soft-focus modes, it will always be transparent.</span>
						</td>
					</tr>
					<tr>
						<th scope="row">softFocus</th>
						<td>
							<select name='br_options[softFocus]'>
								<option value='false' <?php selected('false', @$options['softFocus']); ?>>False</option>
								<option value='true' <?php selected('true', @$options['softFocus']); ?>>True</option>
							</select>
							<br />
	                    <span style="color:#666666;margin-left:2px;">
		                    Applies a subtle blur effect to the small image. Set to true or false. Does not work with tint.
	                    </span>
						</td>
					</tr>
					<tr>
						<th scope="row">smoothMove</th>
						<td>
							<input name="br_options[smoothMove]" type='text' value='<?php echo @$options['smoothMove']?>'/>
							<br />
	                    <span style="color:#666666;margin-left:2px;">
		                    Amount of smoothness/drift of the zoom image as it moves. The higher the number,
		                    the smoother/more drifty the movement will be. 1 = no smoothing.
	                    </span>
						</td>
					</tr>
					<tr>
						<th scope="row">showTitle</th>
						<td>
							<select name='br_options[showTitle]'>
								<option value='false' <?php selected('false', @$options['showTitle']); ?>>False</option>
								<option value='true' <?php selected('true', @$options['showTitle']); ?>>True</option>
							</select>
							<br />
							<span style="color:#666666;margin-left:2px;">Shows the title tag of the image. True or false.</span>
						</td>
					</tr>
					<tr>
						<th scope="row">titleOpacity</th>
						<td>
							<input name="br_options[titleOpacity]" type='text' value='<?php echo @$options['titleOpacity']?>'/>
							<br />
	                    <span style="color:#666666;margin-left:2px;">
		                    Specifies the opacity of the title if displayed, where 0 is fully transparent, and 1 is fully opaque.
	                    </span>
						</td>
					</tr>
				</table>
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
				</p>
			</form>
		</div>
	<?php
	}

	public static function catalog_thumbnail(){
		return 'shop_single';
	}

}

new BeRocket_WZI;