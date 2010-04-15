<?php
/*
 * Created on 02/10/2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?
// $archivo contiene el numero que actualizamos
$contador = 80;

//Abrimos el archivo y leemos su contenido

$nombre_archivo='file.txt';
if (!file_exists($nombre_archivo))
{
	fopen($nombre_archivo,"w");
}


$fp = fopen($nombre_archivo,"r");
$contador = fgets($fp, 26);
fclose($fp);

//Incrementamos el contador
++$contador;

//Actualizamos el archivo con el nuevo valor
$fp = fopen($nombre_archivo,"w+");
fwrite($fp, $contador, 26);
fclose($fp);

echo "Este script ha sido ejecutado $contador veces";

?>