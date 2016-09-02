<?php
$lug=$_GET["id_l"];

header('Content-Type:application/json; charset=ISO-8859-1');

if (!$enlace = mysql_connect('localhost', 'cliento_apps', 'UsrNew1520')) {
    echo 'No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('cliento_aplicaciones', $enlace)) {
    echo 'No pudo seleccionar la base de datos';
    exit;
}
mysql_set_charset('utf8', $enlace);
$sql = "SELECT Tiendas.id as id_tienda , direccion_1, direccion_2, codigo_postal, latitud, longitud, pais, tipo, municipio, estado, logo, retailer, id_retailer, Tipos_Tiendas.id as id_tipo_tienda, municipio.id as id_municipio, estado.id as id_estado, Retailer.retailer as nombre_retailer FROM Tiendas INNER JOIN Retailer ON Tiendas.id_retailer = Retailer.id INNER JOIN Tipos_Tiendas ON Retailer.id_tipo_tienda = Tipos_Tiendas.id INNER JOIN municipio ON Tiendas.id_ciudad = municipio.id INNER JOIN estado ON municipio.id_estado = estado.id WHERE Tiendas.id =".$lug;


$result = mysql_query($sql, $enlace);
if (!$result) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL: " . mysql_error() ;
    exit;
}
  	$extraido = mysql_fetch_assoc($result);
	$extraido2=str_replace("http","https",$extraido,$i);
	echo json_encode($extraido2);  

