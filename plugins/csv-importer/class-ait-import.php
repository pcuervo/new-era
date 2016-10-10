<?php
/**
 * AIT Import Plugin
 *
 * @package   AitImport
 * @author    AitThemes.com <info@ait-themes.com>
 * @copyright 2013 AitThemes
 * @link      http://www.AitThemes.com/
 */

/**
 * Plugin class.
 *
 * @package AitImport
 * @author  AitThemes.com <info@ait-themes.com>
 */
class AitImport {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	protected $version = '1.6';

	/**
	 * Unique identifier for your plugin.
	 *
	 * Use this value (not the variable name) as the text domain when internationalizing strings of text. It should
	 * match the Text Domain file header in the main plugin file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'ait-import';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * If save empty string values
	 *
	 * @since 1.1
	 * 
	 * @var boolean
	 */
	protected $save_empty_values = false;

	/**
	 * Is current theme from AIT
	 * @var boolean
	 */
	protected $ait_theme;

	/**
	 * List of custom types
	 * @var array of AitImportType
	 */
	public $post_types = array();

	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		// Add the options page and menu item.
		add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );

		// Load admin style sheet and JavaScript.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

		$this->ait_theme = (isset($GLOBALS['aitThemeCustomTypes'])) ? true : false;

		$this->post_types = $this->get_theme_custom_types();

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Fired when the plugin is activated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog.
	 */
	public static function activate( $network_wide ) {

	}

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses "Network Deactivate" action, false if WPMU is disabled or plugin is deactivated on an individual blog.
	 */
	public static function deactivate( $network_wide ) {

	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		$domain = $this->plugin_slug;
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
	}

	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 * @since     1.0.0
	 *
	 * @return    null    Return early if no settings page is registered.
	 */
	public function enqueue_admin_styles() {

		if ( ! isset( $this->plugin_screen_hook_suffix ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( $screen->id == $this->plugin_screen_hook_suffix ) {
			wp_enqueue_style( $this->plugin_slug .'-admin-styles', plugins_url( 'css/admin.css', __FILE__ ), $this->version );
		}

	}

	/**
	 * Register and enqueue admin-specific JavaScript.
	 *
	 * @since     1.0.0
	 *
	 * @return    null    Return early if no settings page is registered.
	 */
	public function enqueue_admin_scripts() {

		if ( ! isset( $this->plugin_screen_hook_suffix ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( $screen->id == $this->plugin_screen_hook_suffix ) {
			wp_enqueue_script( $this->plugin_slug . '-admin-script', plugins_url( 'js/admin.js', __FILE__ ), array( 'jquery' ), $this->version );
		}

	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		if( is_admin() && current_user_can("manage_options") ) {
			$this->plugin_screen_hook_suffix = add_menu_page(
				__('Plugin para Import CSV a WordPress', 'ait-import'),
				__('Importar CSV', 'ait-import'),
				'read',
				$this->plugin_slug,
				array( $this, 'display_plugin_admin_page' )
			);
		}

	}

	


	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page() {
		include_once( 'views/admin.php' );
	}

	/**
	 * Get post types and custom post types for this theme
	 *
	 * @since 1.0.0
	 * 
	 * @return array array of AitImportType objects
	 */
	public function get_theme_custom_types() {
		$post_types_import = array();
		$post_types_import[] = new AitImportType('product', false);
		//$post_types_import[] = new AitImportType('post', false);
		//$post_types_import[] = new AitImportType('page', false);
		
		if($this->ait_theme){
			global $aitThemeCustomTypes;
			$post_types = array_keys($aitThemeCustomTypes);
			// if(in_array("dir-item-tour", $post_types)){
			// 	$post_types[] = "dir-item-tour-offer";
			// }
			foreach ($post_types as $key => $type) {
				$id_type = "ait-" . $type;
				if($type == "dir-item-tour") $id_type = "ait-dir-item";
				// if($type == "dir-item-tour-offer") $id_type = "ait-dir-item-offer";
				$post_types_import[] = new AitImportType($id_type, true, $type);
			}
		}
		//var_dump($post_types_import);
		return $post_types_import;
	}

	/**
	 * Get attachment ID
	 *
	 * @since 1.0.0
	 * 
	 * @param  string $image_url      url of the image to find
	 * 
	 */
	public function pippin_get_image_id($image_url) {
	    global $wpdb;
	    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
	        return $attachment[0]; 
	}

	/**
	 * Validate Row
	 *
	 * @since 1.0.0
	 * 
	 * @param  string $data      row in array format
	 * 
	 */
	public function validate_row($data) {
		//VALIDAR QUE LOS CAMPOS REQUERIDOS ESTEN SETEADOS Y NO ESTEN VACIOS
		
		if(!isset($data[0]) || empty($data[0]) || !isset($data[1]) || empty($data[1]) || !isset($data[2]) || empty($data[2]) || !isset($data[3]) || empty($data[3]) ||  !isset($data[12]) || empty($data[12]) || !isset($data[16]) || empty($data[16]) || !isset($data[14]) || empty($data[14]) || !isset($data[15]) || empty($data[15]) ||  !isset($data[25]) || empty($data[25]) || !isset($data[23]) || empty($data[23]) || !isset($data[24]) || empty($data[24]) ) {
	    	return true;
	    }
	    
	    //VALIDAR QUE EL PRECIO SEA UN VALOR NUMERICO >= 1
	    if($data[12] < 0 || !is_numeric($data[12])) {
	    	return true;
	    }
	    //VALIDAR QUE LA CANTIDAD SEA UN VALOR NUMERICO >= 1
	    if($data[15] < 0 || !is_numeric($data[15])) {
	    	return true;
	    }
		return false;
	}

	public function limpiarCaracteresEspeciales($string ){
	 $string = htmlentities($string);
	 $string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
	 return $string;
	}

	function sanear_string($string)
	{
	 
	    $string = trim($string);
	 
	    $string = str_replace(
	        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
	        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
	        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
	        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
	        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
	        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
	        $string
	    );
	 
	    $string = str_replace(
	        array('ñ', 'Ñ', 'ç', 'Ç'),
	        array('n', 'N', 'c', 'C',),
	        $string
	    );
	 
	    //Esta parte se encarga de eliminar cualquier caracter extraño
	    /*
	    $string = str_replace(
	        array("\", "¨", "º", "-", "~",
	             "#", "@", "|", "!", """,
	             "·", "$", "%", "&", "/",
	             "(", ")", "?", "'", "¡",
	             "¿", "[", "^", "<code>", "]",
	             "+", "}", "{", "¨", "´",
	             ">", "< ", ";", ",", ":",
	             ".", " "),
	        '',
	        $string
	    );
	 	*/
	 
	    return $string;
	}

	function sanitize_txt ( $text ) {
        $san_text = filter_var($text, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH | FILTER_FLAG_STRIP_LOW ) ;
        return $san_text;
    }  

	/**
	 * Import items from CSV file
	 *
	 * @since 1.0.0
	 * 
	 * @param  string $type      post type id
	 * @param  sting $file      url to temp csv file
	 * @param  string $duplicate how to handle duplicate items
	 * 
	 */
	public function import_csv($type, $file, $duplicate) {

		$encoding_id = intval( get_option( 'ait_import_plugin_encoding', '25' ) );
		$encoding_list = mb_list_encodings();
		$encoding = $encoding_list[$encoding_id];

		$header_line = 1;
		$cols = 0;

		$default_options = array();
		$meta_options = array();
		$taxonomies = array();
		$sku_exitosos = '';
		$sku_invalidos = '';
		$sku_existentes = '';
		$tax_pre = 'tax-';

		$post_type = new AitImportType($type);

		$num_imported = 0;
		$num_updated = 0;
		$num_ignored = 0;
		$num_existente = 0;

		$ignore = false;
		$row = 1;
		
		if (isset ($_POST ['delim']) )
			$delim = $_POST ['delim'];
		
		if (($handle = fopen($file, "r")) !== FALSE) {
			// $handle = Encoding::toUTF8($handle);
			//VARIABLE PARA PRUEBAS, ELIMINAR CONDICION DEL WHILE EN PRODUCCION
			$insertar = 0;
			while (($data_row = fgetcsv($handle, 10000, $delim, '"')) !== FALSE /* && $insertar < 1 */ ) {
				
				$ignore = false;
				// if first line define separator for microsoft office
				if ($row == 1 && isset($data_row[0]) && trim($data_row[0]) == 'sep=;') {
					$header_line = 2;
				}
				if ($row == $header_line) {
					$cols = count($data_row);
					for ($c=0; $c < $cols; $c++) {
						if (in_array($data_row[$c],array_keys($post_type->default_options))){
							$default_options[$c] = $data_row[$c];
						} elseif (!strncmp($data_row[$c], $tax_pre, strlen($tax_pre))) {
							$taxonomies[$c] = substr($data_row[$c], strlen($tax_pre));
						} else {
							$meta_options[$c] = $data_row[$c];
						}
					}
				} 
				if ($row > $header_line) {
					// default options
					$attrs = array();
					foreach ($default_options as $key => $opt) {
						$attrs[$opt] = ($encoding == 'UTF-8') ? $data_row[$key] : mb_convert_encoding($data_row[$key],'UTF-8',$encoding);
					}
					// define post type
					$attrs['post_type'] = $type;
					// remove image attr
					if (isset($attrs['post_image'])) {
						$image_slug = $attrs['post_image'];
						unset($attrs['post_image']);
					}

					// find existing post
					global $wpdb;
					if ($duplicate == '2' || $duplicate == '3') {
						if (isset($attrs['post_name']) && !empty($attrs['post_name'])) {
							$slug = $attrs['post_name'];
							$finded_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$slug'");
						}
						if (isset($finded_id) && $finded_id) {
							if ($duplicate == '3') {
								// igonre this row
								$num_ignored++;
								$ignore = true;
							}
							$attrs['ID'] = $finded_id;
						}
					}

					//VALIDATE DUPLICATE SKU
					//echo "SELECT post_id FROM $wpdb->postmeta WHERE meta_value = '".$data_row[0]."' and meta_key = '_sku'";
					if (isset($data_row[1]) && !empty($data_row[1])) {
						$sku = $data_row[1];
						$existente_id = $wpdb->get_var("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = '".$sku."' and meta_key = '_sku'");
					}
					if (isset($existente_id) && $existente_id) {
						$num_existente++;
						$ignore = true;
						$attrs['ID'] = $existente_id;
						$sku_existentes .= $sku.', ';
					}

					//VALIDAR DATOS DE ENTRADA
					if(!$ignore) { 
						$ignore = $this->validate_row($data_row); 
						if($ignore) { $num_ignored++; $sku_invalidos .= $sku.', '; }
					}

					if (!$ignore) {
						// parent
						if (isset($attrs['post_parent']) && !empty($attrs['post_parent'])) {
							$parent = $attrs['post_parent'];
							$parent_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$parent'");
						}
						if (isset($parent_id)) {
							$attrs['post_parent'] = $parent_id;
						}
						// author
						if (isset($attrs['post_author']) && !empty($attrs['post_author'])) {
							$author = get_user_by( 'login', $attrs['post_author'] );
						}
						if (isset($author)) {
							if ($author){
								$attrs['post_author'] = $author->ID;
							} else {
								unset($attrs['post_author']);
							}
						}

						$attrs['post_title'] = $data_row[2]; //columna 'nombre' del archivo csv
						$attrs['post_content'] = '';	//columna 'descripcion' del archivo csv	
						//$sku_exitosos .= '['.$attrs['post_content'].']';
						//$attrs['post_content'] = sanitize_post_field( 'post_content', $post_content, $post_id, 'db' );
						//$attrs = sanitize_post($attrs, 'db');
						// insert or update
						$post_id = wp_insert_post( $attrs, true );

						if ( is_wp_error($post_id) ){
							echo '<div class="error"><p>' . $post_id->get_error_message() . ' - SKU : '.$data_row[0].'</p></div>';
							//var_dump($post_id->get_error_data());
						} else {
							$insertar++;
							$sku_exitosos .= $data_row[1].', ';
							// incerment count
							if(isset($finded_id) && $finded_id) {
								$num_updated++;
							} else {
								$num_imported++;
							}
							// set featured image
							if (isset($image_slug) && !empty($image_slug)) {
								$slug = trim($image_slug);
								$finded_image_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$slug'");
								if (isset($finded_image_id) && $finded_image_id) {
									update_post_meta( $post_id, '_thumbnail_id', $finded_image_id);
								}
							}
							// insert meta
							if(count($meta_options) > 0){
								//$meta_key = '_'.$type;
								$meta_key = $type;
								$meta_attrs = array();
								$uploads_dir = wp_upload_dir();
								$post_content = '';
								foreach ($meta_options as $key => $opt) {
									/*
									if(!$this->save_empty_values) { 
										if(!empty($data_row[$key])) {
											$meta_attrs[$opt] = ($encoding == 'UTF-8') ? $data_row[$key] : mb_convert_encoding($data_row[$key],'UTF-8',$encoding);
										}
									} else {
											$meta_attrs[$opt] = ($encoding == 'UTF-8') ? $data_row[$key] : mb_convert_encoding($data_row[$key],'UTF-8',$encoding);
									}
									
									$aux = '';
									$aux = substr($opt, 0, 2);
									if($aux == 'TAX') { $opt = $aux; }
									$aux = substr($opt, 0, 8);
									if($aux == 'TAXGORRA') { $opt = $aux; }
									*/
									$data_row[$key] = $this->sanitize_txt($data_row[$key]);
									switch ($opt) {
										case 'UPC':
												$opt = '_sku';
												update_post_meta( $post_id, $opt, $data_row[$key] );
											break;
										case 'DESCRIPCION':
												//$opt = 'post_title';
												//update_post_meta( $post_id, $opt, $data_row[$key] );
												$post_content .= $this->sanitize_txt($data_row[$key]);
												$post_content .= '<ul>';
											break;
										case 'PRECIO':
												$opt = '_price';
												update_post_meta( $post_id, $opt, $data_row[$key] );
												update_post_meta( $post_id, '_regular_price', $data_row[$key] );
											break;
										case 'TALLA':
												$opt = 'attribute_pa_talla';
												update_post_meta( $post_id, $opt, $data_row[$key] );

												//$talla_terms = get_terms('pa_talla');
												//$sku_exitosos .= $talla_terms.' - ';
												wp_set_object_terms( $post_id, 'variable', 'product_type' );
												wp_set_object_terms($post_id, $data_row[$key], 'pa_talla', true);
												$thedata[sanitize_title('pa_talla')] = Array(
									                    'name' => wc_clean('pa_talla'),
									                    'value' => strtolower($data_row[$key]),
									                    'postion' => '0',
									                    'is_visible' => '1',
									                    'is_variation' => '1',
									                    'is_taxonomy' => '1'
									            );
									            update_post_meta($post_id, '_product_attributes', $thedata);
											break;		
										case 'CATEGORIA':
												$term_id = get_term_by('name', $data_row[$key], 'product_cat');
												if ($term_id){
													$result = wp_set_post_terms($post_id, $term_id->term_id, 'product_cat', true);
												}
											break;
										case 'SUBCATEGORIA':
												$term_id = get_term_by('name', $data_row[$key], 'product_cat');
												if ($term_id){
													$result = wp_set_post_terms($post_id, $term_id->term_id, 'product_cat', true);
												}
											break;											
										case 'SE MUESTRA EN':
												if(!empty($data_row[$key]) && isset($data_row[$key]) && $data_row[$key] != '') {
													$term_id = get_term_by('name', $data_row[$key], 'semuestraen');
													if ($term_id){
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'semuestraen', true);
													}
													else {
														$term_id = wp_insert_term( $data_row[$key], 'semuestraen' );
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'semuestraen', true);
													}
												}
											break;
										case 'GENERO':
												//$sku_exitosos .= $data_row[$key].' - 1 ->';
												if(!empty($data_row[$key]) && isset($data_row[$key]) && $data_row[$key] != '') {
													$term_id = get_term_by('name', $data_row[$key], 'genero');
													//$sku_exitosos .= $term_id->term_id.' - 2 ->';
													if ($term_id){
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'genero', true);
													}
													else {
														//$sku_exitosos .= $term_id->term_id.' - ';
														$term_id = wp_insert_term( $data_row[$key], 'genero' );
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'genero', true);
													}
												}
											break;
										case 'SILUETA':
												if(!empty($data_row[$key]) && isset($data_row[$key]) && $data_row[$key] != '') {
													$term_id = get_term_by('name', $data_row[$key], 'silueta');
													if ($term_id){
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'silueta', true);
													}
													else {
														$term_id = wp_insert_term( $data_row[$key], 'silueta' );
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'silueta', true);
													}
												}
											break;
										case 'VICERA':
												if(!empty($data_row[$key]) && isset($data_row[$key]) && $data_row[$key] != '') {
													$term_id = get_term_by('name', $data_row[$key], 'vicera');
													if ($term_id){
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'vicera', true);
													}
													else {
														$term_id = wp_insert_term( $data_row[$key], 'vicera' );
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'vicera', true);
													}
												}
											break;
										case 'AJUSTE':
												if(!empty($data_row[$key]) && isset($data_row[$key]) && $data_row[$key] != '') {
													$term_id = get_term_by('name', $data_row[$key], 'ajuste');
													if ($term_id){
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'ajuste', true);
													}
													else {
														$term_id = wp_insert_term( $data_row[$key], 'ajuste' );
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'ajuste', true);
													}
												}
											break;
										case 'EQUIPO':
												if(!empty($data_row[$key]) && isset($data_row[$key]) && $data_row[$key] != '') {
													$term_id = get_term_by('name', $data_row[$key], 'equipo');
													if ($term_id){
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'equipo', true);
													}
													else {
														$term_id = wp_insert_term( $data_row[$key], 'equipo' );
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'equipo', true);
													}
												}
											break;
										case 'COLECCION':
												if(!empty($data_row[$key]) && isset($data_row[$key]) && $data_row[$key] != '') {
													$term_id = get_term_by('name', $data_row[$key], 'coleccion');
													if ($term_id){
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'coleccion', true);
													}
													else {
														$term_id = wp_insert_term( $data_row[$key], 'coleccion' );
														$result = wp_set_post_terms($post_id, $term_id->term_id, 'coleccion', true);
													}
												}
											break;
										
										case 'CANTIDAD':
												if(is_numeric($data_row[$key]) ) {
													update_post_meta( $post_id, '_manage_stock', 'yes' );	
													update_post_meta( $post_id, '_stock', $data_row[$key] );
												}
											break;
										
										case 'PRECIO_OFERTA':
												$opt = '_sale_price';
												if(is_numeric($data_row[$key]) && $data_row[$key] > 0) {
													update_post_meta( $post_id, $opt, $data_row[$key] );
												}
											break;	
	
										case 'FOTO_DESTACADA':
												$ruta_imagen = $uploads_dir['url'].'/'.$data_row[$key];
												$image_id = $this->pippin_get_image_id($ruta_imagen);
												update_post_meta( $post_id, '_thumbnail_id', $image_id );
												set_post_thumbnail( $post_id, $image_id );
											break;							
										default:
												if($opt == 'FOTO1' || $opt == 'FOTO2' || $opt == 'FOTO3' || $opt == 'FOTO4' || $opt == 'FOTO5' || $opt == 'FOTO6' ) {
													$ruta_imagen = $uploads_dir['url'].'/'.$data_row[$key];
													$image_id = $this->pippin_get_image_id($ruta_imagen);
													$img_galery .= 	$image_id .', ';
												}
												else {
													if ($opt == 'BULLET1' || $opt == 'BULLET2' || $opt == 'BULLET3' || $opt == 'BULLET4' || $opt == 'BULLET5' || $opt == 'BULLET6' || $opt == 'BULLET7' || $opt == 'BULLET8' ) {
														if(!empty($data_row[$key]) && isset($data_row[$key]) && $data_row[$key] != '') {
															$post_content .= '<li>'.$this->sanitize_txt($data_row[$key]).'</li>';
														}
													} 
													else {
														update_post_meta( $post_id, strtolower($opt), $data_row[$key] );	
													}
												}
												
																								
											break;
									}
								}
								//GALERIA DE IMAGENES
								$img_galery = substr($img_galery, 0, -2);
								update_post_meta( $post_id, '_product_image_gallery', $img_galery );

								//FINALIZAR DE SETEAR EL CONETENIDO 
								$post_content .= '</ul>';
								//$post_content = sanitize_post_field( 'post_content', $post_content, $post_id, 'db' );
								$my_post = array(
								    'ID'           => $post_id,
								    'post_content' => $post_content,
								);

								// Update the post into the database
								wp_update_post( $my_post );	
								
							}
							// set terms
							foreach ($taxonomies as $key => $tax) {
								$terms = explode(",",trim($data_row[$key]));
								foreach ($terms as $key_term => $term) {
									$term_id = get_term_by('slug', $term, $tax);
									if ($term_id){
										$result = wp_set_post_terms($post_id, $term_id->term_id, $tax, true);
									}
								}
							}
						}
					}
				}
				$row++;
			}
			fclose($handle);
			
			echo '<div class="updated"><p>' . $num_imported . __(' productos fueron importados exitosamente. ').' Listado de SKUs ['.$sku_exitosos.']</p><p>'. $num_existente .  __(' productos tienen un SKU que ya exite y no fueron agregados. ').' Listado de SKUs ['.$sku_existentes.']</p><p>' . $num_ignored . __(' productos no fueron insertados por no cumplir la validación.') .' Listado de SKUs ['.$sku_invalidos.']</p></div>';
		}		
	}

	/**
	 * Import categories from CSV file
	 *
	 * @since 1.0.0
	 * 
	 * @param  string $type      taxonomy id
	 * @param  sting $file      url to temp csv file
	 * @param  string $duplicate how to handle duplicate categories
	 * 
	 */
	public function import_terms_csv($type, $file, $duplicate) {

		$encoding_id = intval( get_option( 'ait_import_plugin_encoding', '25' ) );
		$encoding_list = mb_list_encodings();
		$encoding = $encoding_list[$encoding_id];

		$header_line = 1;
		$cols = 0;
		
		$default_options = array();
		$meta_options = array();

		$taxonomy = new AitImportTaxonomy($type);

		$num_imported = 0;
		$num_updated = 0;
		$num_ignored = 0;

		$ignore = false;
		$row = 1;
		
		if (isset ($_POST ['delim']) )
			$delim = $_POST ['delim'];
			
		if (($handle = fopen($file, "r")) !== FALSE) {
			while (($data_row = fgetcsv($handle, 10000, $delim, '"')) !== FALSE) {
				$ignore = false;
				// if first line define separator for microsoft office
				if ($row == 1 && isset($data_row[0]) && trim($data_row[0]) == 'sep=;') {
					$header_line = 2;
				}
				if ($row == $header_line) {
					$cols = count($data_row);
					for ($c=0; $c < $cols; $c++) {
						if (in_array($data_row[$c],array_keys($taxonomy->default_options))){
							$default_options[$c] = $data_row[$c];
						} else {
							$meta_options[$c] = $data_row[$c];
						}
					}
				}
				if ($row > $header_line) {
					// default options
					$attrs = array();
					foreach ($default_options as $key => $opt) {
						$attrs[$opt] = ($encoding == 'UTF-8') ? $data_row[$key] : mb_convert_encoding($data_row[$key],'UTF-8',$encoding);
					}
					if ($duplicate == '2' || $duplicate == '3') {
						// find existing term
						if (isset($attrs['slug']) && !empty($attrs['slug'])) {
							$finded_term = get_term_by( 'slug', $attrs['slug'], $type );
						}
					}
					if ($duplicate == '3' && isset($finded_term) && $finded_term) {
						$num_ignored++;
					} else {
						// find parent term
						if (isset($attrs['parent']) && !empty($attrs['parent'])) {
							$parent_term = get_term_by( 'slug', $attrs['parent'], $type );
						}
						if (isset($parent_term) && $parent_term) {
							$attrs['parent'] = $parent_term->term_id;
						}
						
						// title
						if (isset($attrs['title'])) {
							$title = $attrs['title'];
							if($duplicate == '2') {
								$attrs['name'] = $title;
							}
						} else {
							$title = __('Category');
						}

						$tax = $type;
						if (isset($finded_term) && $finded_term) {
							unset($attrs['slug']);
							$term_id = wp_update_term($finded_term->term_id, $tax, $attrs);
						} else {
							$term_id = wp_insert_term($title, $tax, $attrs);
						}

						if (is_wp_error($term_id)){
							echo '<div class="error"><p>' . $term_id->get_error_message() . '</p></div>';
						} else {
							if (isset($finded_term) && $finded_term) {
								$num_updated++;
							} else {
								$num_imported++;
							}
							// insert meta
							if(count($meta_options) > 0){
								if($taxonomy->storage_type = 2) {
									$meta_type = str_replace("-","_",$type);
									foreach ($meta_options as $key => $opt) {
										$meta_key = $meta_type . "_" . $term_id['term_id'] . '_' . $opt ;
										$meta_value = ($encoding == 'UTF-8') ? $data_row[$key] : mb_convert_encoding($data_row[$key],'UTF-8',$encoding);
										update_option( $meta_key, $meta_value );
									}
								} else {

								}
							}
						}
					}
				}
				$row++;
			}
			
			fclose($handle);

			// wordpress cache bugfix
			delete_option("{$type}_children");

			echo '<div class="updated"><p>' . $num_imported . __(' categories was successfully imported. ') . $num_updated .  __(' categories updated. ') . $num_ignored . __(' categories ignored.') . 'delimiter' .$delim .'</p></div>';
		}

	}

}