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

$sql = 'SELECT id, tipo FROM Tipos_Tiendas';

$resultado = mysql_query($sql, $enlace);



if (!$resultado) {

    echo "Error de BD, no se pudo consultar la base de datos\n";

    echo "Error MySQL: " . mysql_error() ;

    exit;

}

$datos= array();

while ($extraido = mysql_fetch_assoc($resultado)) {

     array_push($datos ,  $extraido);

}

echo json_encode($datos);

?>