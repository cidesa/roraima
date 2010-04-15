<?php
require_once('simpletest/web_tester.php');
require_once('simpletest/reporter.php');
require_once('Herramientas.php');
require_once("../../lib/yaml/Yaml.class.php");

class Prueba_Unitaria extends WebTestCase {

		private $ruta ="http://localhost/tachira/reportes/";
		private $page;
		private $minombre;
		private $mimodulo;
		private $contadorbuenos;
		private $contadormalos;

	function Prueba_Unitaria($modulo,$nombre){
		$this->minombre = $nombre;
		$this->mimodulo = $modulo;
	}

    function testContact() {
    	print "<strong>Probando el Reporte ".$this->minombre."</strong>";
		$this->page=$this->ruta.$this->mimodulo.'/'.$this->minombre;
        $this->get($this->page);
        print "<br>Carga de ".$this->minombre." = ";
        $ok= $this->assertTrue($this);
        if ($ok==1){
        	print " OK";
        }
        print "";
        $this->submitFormById('form1');
        print "<br> Oprimir el botón Generar = ";
       	$ok2=$this->assertNoText('Fatal error:');
		if ($ok2==1){
			print " OK";
		}
		print "</br>";
		if ($ok and $ok2){
			$this->calcularContador($this->contadorbuenos);
			}
		else{
			$this->calcularContador($this->contadormalos);
		}

    }

	function calcularContador(&$cont){
		$cont=$cont+1;
	}

	function obtenerContadores(&$cont1,&$cont2){
		$cont1=$this->contadorbuenos;
		$cont2=$this->contadormalos;
	}



 }

	include('obtenermenu.php');
	$herra = new Herramientas();
	$herra->recorrerArreglo($carmodulo,&$mod);
	print "<h1>Pruebas Unitarias Formulación</h1>";
	$contador=0;
	$contadormalos=0;
	$contadorbuenos=0;
	foreach($mod as $objm){
		$contador= $contador + 1;
		$nombre=strtolower($objm);
		$test = &new Prueba_Unitaria('formulacion',$nombre.'.php');
		$test->run(new HtmlReporter());
		$test->obtenerContadores($cont1,$cont2);
		$contadorbuenos=$contadorbuenos+$cont1;
		$contadormalos=$contadormalos+$cont2;
		print "<br></br>";
	}

print "<br><strong>---ESTADÍSTICAS FINALES----</strong></br><br><strong>Total de Reportes probados = ".$contador."</strong></br><br><strong> Total Reportes Correctos = ".$contadorbuenos."</strong></br><br><strong> Total Reportes Incorrectos = ".$contadormalos." </strong></br>";
?>