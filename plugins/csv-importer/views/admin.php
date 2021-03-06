<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package AitImport
 * @author  AitThemes.com <info@ait-themes.com>
 * @link    http://www.AitThemes.com/
 * @since   1.0.0
 */

$import = AitImport::get_instance();

?>
<div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	
	<?php 
	// save encoding
	if(isset($_POST["encoding"])) {
		update_option( 'ait_import_plugin_encoding', $_POST["encoding"] );
		echo '<div class="updated"><p>'.__('Settings saved').'.</p></div>';
	}
	// import posts from uploaded file
	if(isset($_FILES["posts_csv"]) && isset($_POST["type"])) {
		if ($_FILES["posts_csv"]["error"] > 0) {
			echo '<div class="error"><p>'.__('Incorrect CSV file').'.</p></div>';
		} else {
			$import->import_csv($_POST["type"],$_FILES["posts_csv"]['tmp_name'],$_POST["duplicate"]);
		}
		
	}
	// import categories from uploaded file
	if(isset($_FILES["categories_csv"]) && isset($_POST["type"])) {
		if ($_FILES["categories_csv"]["error"] > 0) {
			echo '<div class="error"><p>'.__('Incorrect CSV file').'.</p></div>';
		} else {
			$import->import_terms_csv($_POST["type"],$_FILES["categories_csv"]['tmp_name'],$_POST["duplicate"]);
		}
	}
	?>

	<div class="import-settings metabox-holder">
		<div class="import-options postbox">

			<div class="handlediv" title="Click to toggle"><br></div>

			<h3 class="hndle"><span><?php _e('Import settings'); ?></span></h3>

			<div class="inside">

				<?php $saved_encoding = get_option( 'ait_import_plugin_encoding', '25' ); ?>

				<form action="admin.php?page=ait-import" method="post">
					<label for="import-encoding"><?php _e('Encoding of imported CSV files: '); ?></label>
					<select name="encoding" id="import-encoding">
					<?php foreach (mb_list_encodings() as $key => $value) {
						if($key == intval($saved_encoding)) {
							echo "<option selected='selected' value='$key'>$value</option>";
						} else {
							echo "<option value='$key'>$value</option>";
						}
					} ?>
					</select>
					<input type="submit" value="<?php _e('Save settings'); ?>" class="save button">
				</form>

			</div>

		</div>
	</div>

	<?php
	foreach ($import->post_types as $type) { ?>
	<div class="import-custom-type metabox-holder">
		
		<div class="import-options postbox">

			<div class="handlediv" title="Click to toggle"><br></div>

			<h3 class="hndle"><span><?php echo $type->name; ?></span></h3>

			<div class="inside">
			
				<form action="<?php echo AIT_IMPORT_PLUGIN_URL . 'download.php'; ?>" method="post">
					
					<h4><?php _e('Sample CSV description'); ?></h4>
					
					<table>
						<tr>
							<th><?php _e('Attribute'); ?></th>
							<th><?php _e('Column name in CSV file'); ?></th>
							<th><?php _e('Notice'); ?></th>
						</tr>
						
						<!-- AGREGADOS EN HARDCODE PARA OBTENERE EL FORMATO REQUEIRDO POR EL CLIENTE -->
						<tr>
							<td><input type="checkbox" name="MID" checked="checked"> MID </td>
							<td>MID</td>
							<td>Valor numerico</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="UPC" checked="checked"> UPC </td>
							<td>UPC</td>
							<td>Corresponde al valor Sku</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="NOMBRE" checked="checked"> NOMBRE </td>
							<td>NOMBRE</td>
							<td>Nombre del producto</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="DESCRIPCION" checked="checked"> DESCRIPCION </td>
							<td>DESCRIPCION</td>
							<td>Descripción del producto</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="BULLET1" checked="checked"> Info adicional </td>
							<td>BULLET</td>
							<td>Se adicionara al final de la descripción en forma listada</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="BULLET2" checked="checked"> Info adicional </td>
							<td>BULLET</td>
							<td>Se adicionara al final de la descripción en forma listada</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="BULLET3" checked="checked"> Info adicional </td>
							<td>BULLET</td>
							<td>Se adicionara al final de la descripción en forma listada</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="BULLET4" checked="checked"> Info adicional </td>
							<td>BULLET</td>
							<td>Se adicionara al final de la descripción en forma listada</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="BULLET5" checked="checked"> Info adicional </td>
							<td>BULLET</td>
							<td>Se adicionara al final de la descripción en forma listada</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="BULLET6" checked="checked"> Info adicional </td>
							<td>BULLET</td>
							<td>Se adicionara al final de la descripción en forma listada</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="BULLET7" checked="checked"> Info adicional </td>
							<td>BULLET</td>
							<td>Se adicionara al final de la descripción en forma listada</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="BULLET8" checked="checked"> Info adicional </td>
							<td>BULLET</td>
							<td>Se adicionara al final de la descripción en forma listada</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="PRECIO" checked="checked"> PRECIO </td>
							<td>PRECIO</td>
							<td>El precio del producto. Debe ser un valor numerico.</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="PRECIO_OFERTA" checked="checked"> Precio de oferta </td>
							<td>PRECIO_OFERTA</td>
							<td>Un precio promocional o de oferta menor al PRECIO regular. Debe ser un valor numerico.</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="TALLA" checked="checked"> Talla del Producto </td>
							<td>TALLA</td>
							<td>El nombre de la talla contenido en esta columna ya debe haberse creado en la pagina como un atributo de producto.</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="CANTIDAD" checked="checked"> Cantidad </td>
							<td>CANTIDAD</td>
							<td>Representa la cantidad del producto en la talla especificada.</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="FOTO_DESTACADA" checked="checked"> Foto principal </td>
							<td>FOTO_DESTACADA</td>
							<td>Foto principal del producto. La imagen ya debe existir en la seccion multimedia de la pagina.</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="FOTO1" checked="checked"> Foto para Galeria </td>
							<td>FOTO</td>
							<td>Opcional. Corresponde a una foto de galeria del producto. La imagen ya debe existir en la seccion multimedia de la pagina.</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="FOTO2" checked="checked"> Foto para Galeria </td>
							<td>FOTO</td>
							<td>Opcional. Corresponde a una foto de galeria del producto. La imagen ya debe existir en la seccion multimedia de la pagina.</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="FOTO3" checked="checked"> Foto para Galeria </td>
							<td>FOTO</td>
							<td>Opcional. Corresponde a una foto de galeria del producto. La imagen ya debe existir en la seccion multimedia de la pagina.</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="FOTO4" checked="checked"> Foto para Galeria </td>
							<td>FOTO</td>
							<td>Opcional. Corresponde a una foto de galeria del producto. La imagen ya debe existir en la seccion multimedia de la pagina.</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="FOTO5" checked="checked"> Foto para Galeria </td>
							<td>FOTO</td>
							<td>Opcional. Corresponde a una foto de galeria del producto. La imagen ya debe existir en la seccion multimedia de la pagina.</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="FOTO6" checked="checked"> Foto para Galeria </td>
							<td>FOTO</td>
							<td>Opcional. Corresponde a una foto de galeria del producto. La imagen ya debe existir en la seccion multimedia de la pagina.</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="CATEGORIA" checked="checked"> Categoria del Producto </td>
							<td>CATEGORIA</td>
							<td>Categoria principal del producto</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="SUBCATEGORIA" checked="checked"> SubCategoria del Producto </td>
							<td>SUBCATEGORIA</td>
							<td>Subcategoria</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="SE MUESTRA EN" checked="checked"> Renglon del producto </td>
							<td>SE MUESTRA EN</td>
							<td>Caracteristica especial que agrupa al producto. Ej: <strong>Cap Carriers</strong></td>
						</tr>
						
						<tr>
							<td><input type="checkbox" name="GENERO" checked="checked"> Género </td>
							<td>TAX</td>
							<td>Caracteristica especial que agrupa al producto. Ej: <strong>Hombre</strong></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="SILUETA" checked="checked"> Silueta </td>
							<td>SILUETA</td>
							<td>Caracteristica especial que agrupa al producto. Ej: <strong>9Fifty</strong></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="AJUSTE" checked="checked"> Ajuste </td>
							<td>AJUSTE</td>
							<td>Caracteristica especial que agrupa al producto. Ej: <strong>Boston Red Sox</strong></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="VICERA" checked="checked"> Vicera </td>
							<td>VICERA</td>
							<td>Caracteristica especial de gorras que agrupa al producto. Ej: <strong>Plana</strong></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="EQUIPO" checked="checked"> Equipo </td>
							<td>EQUIPO</td>
							<td>Caracteristica especial de gorras que agrupa al producto. Ej: <strong>Chivas</strong></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="COLECCION" checked="checked"> Colección </td>
							<td>COLECCION</td>
							<td>Caracteristica especial de gorras que agrupa al producto. Ej: <strong>AC</strong></td>
						</tr>

						<!-- AGREGADOS EN HARDCODE PARA OBTENERE EL FORMATO REQUEIRDO POR EL CLIENTE -->

					</table>

					<input type="hidden" name="ait-import-post-type" value="<?php echo $type->id; ?>">
					<input type="hidden" name="ait-import-is-ait-type" value="yes">

					<input type="submit" value="<?php _e('Download sample CSV'); ?>" class="download button">
				
				</form>

				<form action="admin.php?page=ait-import" method="post" enctype="multipart/form-data">
					
					<h4><?php _e('Import from file'); ?></h4>
					
					Delimiter: <select name="delim" id="delim">
                                        <option value=",">,</option>
                                        <option value=";">;</option>
                     </select><br>

					<input type="hidden" name="type" value="<?php echo $type->id; ?>">

					<input type="radio" name="duplicate" value="1" checked="checked"> <?php _e("Rename item's name (slug) if item with name (slug) already exists"); ?> <br>
					<input type="radio" name="duplicate" value="2"> <?php _e("Update old item's data if item with name (slug) already exists"); ?> <br>
					<input type="radio" name="duplicate" value="3"> <?php _e("Ignore item if item with name (slug) already exists"); ?> <br>

					<input type="file" name="posts_csv">
					<input type="submit" value="<?php _e('Import from CSV'); ?>" class="upload button-primary">
				
				</form>

				<?php if(isset($type->taxonomies)) { foreach ($type->taxonomies as $key => $tax) { ?>
					
					<h3><?php echo $tax->name; ?></h3>
					
					<form action="<?php echo AIT_IMPORT_PLUGIN_URL . 'download.php'; ?>" method="post">

						<h4><?php _e('Sample CSV description'); ?></h4>

						<table>
							<tr>
								<th><?php _e('Attribute'); ?></th>
								<th><?php _e('Column name in CSV file'); ?></th>
								<th><?php _e('Notice'); ?></th>
							</tr>

							<?php foreach ($tax->default_options as $o_name => $option) { ?>
							<tr>
								<td><input type="checkbox" name="<?php echo $o_name; ?>" checked="checked"> <?php echo $option['label']; ?></td>
								<td><?php echo $o_name; ?></td>
								<td><?php echo $option['notice']; ?></td>
							</tr>
							<?php } ?>
							<?php if(isset($tax->meta_options)) { foreach ($tax->meta_options as $o_name => $option) { ?>
							<tr>
								<td><input type="checkbox" name="<?php echo $o_name; ?>" checked="checked"> <?php echo $option; ?></td>
								<td><?php echo $o_name; ?></td>
								<td></td>
							</tr>
							<?php } } ?>
						</table>

						<input type="hidden" name="ait-import-post-type" value="<?php echo $tax->id; ?>">

						<input type="submit" value="<?php _e('Download sample CSV'); ?>" class="download button">

					</form>

					<form action="admin.php?page=ait-import" method="post" enctype="multipart/form-data">

						<h4><?php _e('Import from file'); ?></h4>
						
					Delimiter: <select name="delim" id="delim">
                                        <option value=",">,</option>
                                        <option value=";">;</option>
                     </select><br>
						
						<input type="hidden" name="type" value="<?php echo $tax->id; ?>">

						<input type="radio" name="duplicate" value="1" checked="checked"> <?php _e("Rename category's name (slug) if category with name (slug) already exists"); ?> <br>
						<input type="radio" name="duplicate" value="2"> <?php _e("Update old category's data if category with name (slug) already exists"); ?> <br>
						<input type="radio" name="duplicate" value="3"> <?php _e("Ignore category if category with name (slug) already exists"); ?> <br>

						<input type="file" name="categories_csv">
						<input type="submit" value="<?php _e('Import categories from CSV'); ?>" class="upload button-primary">
					
					</form>

				<?php } } ?>

			</div>

		</div>

	</div>
	<?php } ?>
</div>