<?php

if (!$enlace = mysql_connect('localhost', 'cliento_apps', 'UsrNew1520')) {
    echo 'No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('cliento_aplicaciones', $enlace)) {
    echo 'No pudo seleccionar la base de datos';
    exit;
}
mysql_set_charset('utf8', $enlace);

$sql = 'SELECT Tiendas.id as id_tienda , direccion_1, direccion_2, codigo_postal, latitud, longitud, retailer, tipo, municipio, estado, estado.id as estado_id, municipio.id as municipio_id, Tipos_Tiendas.id as tipo_id From Tiendas Inner Join Retailer On Tiendas.id_retailer = Retailer.id Inner Join Tipos_Tiendas On Tipos_Tiendas.id = Retailer.id_tipo_tienda Inner Join municipio On Tiendas.id_ciudad = municipio.id Inner Join estado On municipio.id_estado = estado.id ';
$resultado = mysql_query($sql, $enlace);

if (!$resultado) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL: " . mysql_error() ;
    exit;
}

$datos = array();
while ($extraido = mysql_fetch_assoc($resultado)) {
     array_push($datos ,  $extraido);
}
echo json_encode($datos);

