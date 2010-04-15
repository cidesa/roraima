<?php
	//CONFIGURACION YML

	require_once("../../lib/yaml/Yaml.class.php");
	$rep = substr($reporte,0,strpos($reporte,"."));
	define('REP',$rep);
	$clase = ucfirst(REP);

	//CONF BASICA PDF
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/tesoreria/".$clase.".class.php");

	class pdfreporte extends fpdf
	{

		function pdfreporte()
		{
			$opciones = Yaml::load("pdf".REP.".yml");
			$fpdf = $opciones["PDFreporte"]["fpdf"];
			foreach ($fpdf as $f)
			{
				$fpdfparam.= ",'".$f."'";
			}
			$fpdfparam = substr($fpdfparam,1,strlen($fpdfparam));
			eval('parent::FPDF('.$fpdfparam.');');
			//VARIABLES DEL GENERALES
			foreach($opciones["PDFreporte"]["variablesgen"] as $valor)
			{
				$aux=split("=",$valor);
				eval('$this->'.$aux[0].'=("'.$aux[1].'");');
			}
			//VARIABLES DEL SQL
			foreach($opciones["PDFreporte"]["variablessql"] as $valor)
			{
				eval('$this->'.$valor.'=H::GetPost("'.$valor.'");');
				eval('$auxparam.= ",".$this->'.$valor.';');
			}
			//PARTE DINAMICA FUNCIONES
			foreach($opciones["PDFreporte"]["dinfunciones"] as $valor)
			{
				eval('$this->'.$valor.';');
			}
			//PARTE DINAMICA GENERALES
			foreach($opciones["PDFreporte"]["dingenerales"] as $key => $valor)
			{
				$var = str_replace('%','$this->',trim($key));
				$aux = split("=>",$var);
				eval('$this->'.$aux[0].'('.$aux[1].');');
			}

			$auxparam = substr($auxparam,1,strlen($auxparam));
			/////////////////////////////////////////////////
			eval('$this->obj'.ucfirst(REP).' = new '.ucfirst(REP).'();');
			eval('$this->arrp = $this->obj'.ucfirst(REP).'->SQLp('.$auxparam.');');
		}

		/***
		 * prueba de funciones adicionales
		 * */

		function llenartitulos()
		{

		}
		/*****************************/

		function header()
		{
			$opciones = Yaml::load("pdf".REP.".yml");
			$cabecera = $opciones["Header"]["cabecera"];
			if($cabecera=='true')
				$this->getCabecera(H::GetPost("titulo"),"");
			//VARIABLES DEL GENERALES
			foreach($opciones["Header"]["variables"] as $head)
			{
				$head = str_replace('%','this->',$head);
				$aux=split("=",$head);
				eval('$'.$aux[0].'=("'.$aux[1].'");');
			}
			print "<pre>";print_r ($opciones["Header"]["dinamica"]);exit;
			foreach($opciones["Header"]["dinamica"] as $key => $head)
			{
				$head = str_replace('%','$this->',trim($key));
				$aux = split("=>",$head);
				eval('$this->'.$aux[0].'('.$aux[1].');');
				print '$this->'.$aux[0].'('.$aux[1].')';
			}

		}

		function Cuerpo()
		{
			$opciones = Yaml::load("pdf".REP.".yml");
			$cuerpo = $opciones["Cuerpo"]["footer"];

			for ($i=0;$i < 10; $i++)
			{
				$this->multicell(100,4,"HOLA HOLA HOLA HOLA HOLA HOLA HOLA HOLA HOLA HOLA HOLA HOLA ");
			}

		}

		function Footer()
		{
			$opciones = Yaml::load("pdf".REP.".yml");
			$footer = $opciones["Footer"]["footer"];
			if($footer=='true')
			{
				//VARIABLES DEL GENERALES
				foreach($opciones["Footer"]["variables"] as $foot)
				{
					$foot = str_replace('%','this->',$foot);
					$aux=split("=",$foot);
					eval('$'.$aux[0].'=("'.$aux[1].'");');
				}
				//print_r ($opciones["Footer"]["dinamica"]);exit;
				foreach($opciones["Footer"]["dinamica"] as $key => $foot)
				{
					$foot = str_replace('%','$this->',trim($key));
					$aux = split("=>",$foot);
					eval('$this->'.$aux[0].'('.$aux[1].');');
				}
			}
		}

	}
?>