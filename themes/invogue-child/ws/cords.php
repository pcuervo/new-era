<?php
header('Content-Type: text/html; charset=ISO-8859-1');
?>

<?php
if (!$enlace = mysql_connect('localhost', 'cliento_apps', 'UsrNew1520')) {
    echo 'No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('cliento_aplicaciones', $enlace)) {
    echo 'No pudo seleccionar la base de datos';
    exit;
}

$sql       = 'SELECT id as id_tienda, latitud, longitud FROM Tiendas';
$resultado = mysql_query($sql, $enlace);

if (!$resultado) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL: " . mysql_error() ;
    exit;
}
$points= array();
while ($extraido = mysql_fetch_assoc($resultado)) {
     array_push($points , $extraido);
}
echo json_encode($points);
//mysqli_close($enlace);
?>

