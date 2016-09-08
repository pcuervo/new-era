<?php get_header(); ?>
<div class="htheme_content_holder [ content-guide-size ]">
	<div class="htheme_row_margin_top_bottom htheme_vc_row_contained">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner ">
				<div class="wpb_wrapper"><!-- ROW -->
					<div class="htheme_row">
						<div class="htheme_container">
							<div class="htheme_inner_col"><!-- TITLE DOUBLE TOP BOTTOM -->
								<div class="htheme_title_container" data-title-type="top_bottom">
									<div class="htheme_title">
										<h2>Encuentra una tienda</h2>
									</div>
								</div>
							</div>
						</div>
					</div><!-- ROW -->
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>

<div class="container">
	<div class="nav">
		<div class="search">
			<input id="word" class="style-input" type="text"  placeholder="Buscar">
			<img class="filter" src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/encuentra-tienda/filter.svg">
			<img id="searcher" class="store-search" src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/encuentra-tienda/store.svg">
		</div>
	</div>
	<div class="map" >
		<div id="map"></div>
	</div>
	<div class="side" >
		<img id="show_hide" src="https://www.socialpro.mx/apps/facebook/img/arrowSmall.svg">
	</div>
	<div class="banner-left">
		<img class="arrow" src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/encuentra-tienda/blank-left-arrow.svg">
		<div id="pins-container">
		</div>
	</div>
	<div class="store">
		<img class="close-bar" src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/encuentra-tienda/cancel-button.svg">
		<div class="padding-div2">
			<img class="pin" src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/encuentra-tienda/Pin.png">
			<span class="style-title" id="store-title"></span>
			<span class="style-place" id="store-subtitle"></span>
		</div>
		<div class="detalle-container">
			<img class="style-logo-store" id="store-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/encuentra-tienda/new_era.png">
			<br>
			<p class="style-adress-State"  id="plaza"></p>
			<p class="style-adress-State" id="store-adress"></p>
			<p class="style-adress-State"  id="store-cp"></p>
		</div>
	</div>
	<div class="barFilters">
		<img class="close-bar2" src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/encuentra-tienda/cancel-button.svg">
		<div class="position-form">
			<div class="center" >
				<select class="style-select font-select" id="select-state" onchange="cambiar(this.value)" name="state">
					<option name="" value="0">Selecciona un estado</option>
				</select>
			</div>
		</div>
		</br>
		<div class="position-form">
			<div class="center" id="container-city">
				<select class="style-select font-select" id="select-city" name="city">
					<option name="" value="0">Selecciona una localidad</option>
				</select>
			</div>
		</div>
		</br>
		<div class="position-form">
			<div class="center">
				<select class="style-select font-select" id="select-store" name="store">
					<option name="" value="">Selecciona una tienda</option>
				</select>
			</div>
		</div>
		</br>
		</br>
		<div class="checkbox center" id="check-zone-container">
			<img class="style-checkbox" id="zone-check" src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/encuentra-tienda/select_empty.svg"/>
			<input class="style-checkbox" type="hidden" name="" value="">
			<label>En mi zona</label>
			</br>
			</br>
			<input class="button center" type="button" onclick="close_bar()" id="button-filter" value="BUSCAR >">
		</div>
	</div>
</div>

<?php get_footer(); ?>
