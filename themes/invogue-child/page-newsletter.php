<?php get_header(); ?>
<div class="htheme_content_holder [ content-guide-size ]">
	<div class="htheme_vc_row_contained">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner ">
				<div class="wpb_wrapper">
					<div class="wpb_text_column wpb_content_element ">
						<div class="wpb_wrapper">
							<div class="htheme_inner_col htheme_default_content">


<div class="contenido">
	<div class="header">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/lightbox/img/gorras-new-era-logo.png" alt="Logo new era">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/lightbox/img/blog-new-era-pantallas.png" alt="nuevo blog New Era" class="computadora">
	</div>
	<div class="lightbox-container">
		<iframe id="destination-frame" src="<?php echo get_stylesheet_directory_uri(); ?>/lightbox/formulario-lightbox-sitio.html"></iframe>
	</div>
	<script>
		ga('create', 'UA-44588413-1', 'auto');
		ga(function(tracker) {
			// Gets the client ID of the default tracker.
			var clientId = tracker.get('clientId');
		 console.log(clientId);

			// Gets a reference to the window object of the destionation iframe.
			var frameWindow = document.getElementById('destination-frame').contentWindow;

			// Sends the client ID to the window inside the destination frame.
			frameWindow.postMessage(clientId, '<?php echo get_stylesheet_directory_uri(); ?>/lightbox/formulario-lightbox-sitio.html');
		});
	</script>
	<div class="footer"></div>
</div>






							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
