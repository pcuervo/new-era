<header>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="¡Suscríbete a la nueva comunidad New Era!" />

	<title>Blog New Era México | Bienvenido a la nueva comunidad New Era México</title>

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/lightbox/css/lightbox.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/lightbox/css/estilos-externos2.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/lightbox/css/lightbox.css">	
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/lightbox/img/favicon.png" type="image/png" />   


</header>

<div class="contenido [ main-body ]">
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

