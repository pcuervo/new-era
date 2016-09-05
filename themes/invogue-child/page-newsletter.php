<?php get_header(); ?>

	<body>
		<div class="contenido">
			<div class="header">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/lightbox/blog-new-era-pantallas.png" alt="nuevo blog New Era" class="computadora"> 
			</div>
			<div class="lightbox-container">
					<iframe id="destination-frame" src="<?php echo get_stylesheet_directory_uri(); ?>/newsletter-iframe/formulario-lightbox-sitio.html"></iframe>
					<!-- <iframe id="destination-frame" src="<?php echo get_stylesheet_directory_uri(); ?>/page-form-lightbox.php"></iframe> -->
			</div>
			<div class="footer"></div>
		</div>
	</body>


<?php get_footer(); ?>