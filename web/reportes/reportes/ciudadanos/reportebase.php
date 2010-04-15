<?php session_start();
require_once("../../lib/yaml/Yaml.class.php");
$opciones = Yaml::load($reporte.".yml");
$modulo=$opciones["Parametros"]["modulo"];
include_once("../../lib/general/headhtml.php");
require_once("../../lib/modelo/business/".$modulo.".class.php");
?>
<?php

/*****VARIABLES FIJAS PARA EL REPORTE VIENEN DEL YML**************/
$bd=new basedatosAdo();

$nomrep=$opciones["Parametros"]["nomrep"];
$con=$bd;
$width=$opciones["Parametros"]["width"];
$titulo=$opciones["Parametros"]["titulo"];
$orientacion=$opciones["Parametros"]["orientacion"];
$tipopagina=$opciones["Parametros"]["tipopagina"];
?>

<?php include_once("../../lib/general/formtop.php")?>

<?php
//CAJA CON CATALOGO
/*************VARIABLES DEL CICLO VIENEN DEL YML**************/
//param

foreach($opciones["Filas"] as $opc)
{

	$label=$opc["label"];//"PRUEBA ETIQUETA";
	$sql=$opc["sql"];//"SELECT min(codnom) as codnommin,max(codnom) as codnommax FROM npnomina";
	//arrcajtex
	$nomdes=$opc["nomdes"];//"pruebades";
	$campodes=$opc["campodes"];//"codnommin";
	$catdes=$opc["catdes"];//0;
	$nomhas=$opc["nomhas"];//"pruebahas";
	$campohas=$opc["campohas"];//"codnommax";
	$cathas=$opc["cathas"];//1;
	$nomcat=$opc["nomcat"];//"codnom";
	$tipotag=$opc["tipotag"];//'inputcat_tag';
	$size=$opc["size"];
	$parametros=$opc["parametros"];

	if (!is_null($nomcat))
	{
	eval('$catalogo[] = '.$modulo.'::catalogo_'.$nomcat.'($nomdes);');
	eval('$catalogo[] = '.$modulo.'::catalogo_'.$nomcat.'($nomhas);');
	$_SESSION[$nomrep] = $catalogo;
	}

	if (is_null($nomhas) || is_null($campohas))
		$arrcajtex = array($nomdes,$campodes,$catdes);
	else
	   $arrcajtex = array($nomdes,$campodes,$catdes,$nomhas,$campohas,$cathas);

	$param = array($nomrep,$con,$label,$sql);
	$op=array($size,$width);

	eval('echo '.$tipotag.'($param,$arrcajtex,$op,$parametros);');
}
?>


<?php include_once("../../lib/general/formbottom.php")?>

