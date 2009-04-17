<?php
//obtiene el nombre del archivo a descargar pasado por 'url'
$file = $_GET["archivo"];
//$file = "licencia.txt";

//seencuentra en el directorio 'export/' en el servidor
//$url = "export/".$file;
$url = $file;

header ("Content-Disposition: attachment; filename=".$file.";" );
header ("Content-Type: application/force-download");
readfile($url);
exit;
?>
