<?
	require_once("../../lib/bd/basedatosAdo.php");
	
	class moduloapartado
	{ 
		var $incmod;
		var $sql;
		var $numreg;
		var $actfor;
		var $formatopresup;
		var $numeroperiodos;
		var $niveldisponibilidad;
		var $fechainicio;
		var $fechacierre;
		var $anoinicio;
		var $anocierre;
		var $anoperiodo;
		var $presenter;
		var $asignacion;
		var $hay_disponibilidad;
		var $estatusprc;
		var $disponible;
		#define("AJUSTEPRC","AJPR"); // si deciden crear el documento con otro codigo, solo debe cambiarse aqui

		//*******************************
		function moduloapartado()
		{
			$this->bd=new basedatosAdo();
		

		}
		//*******************************
		function obtener_formatopresup()
		{
			try 
			{
				$error='Error no se que';
				throw new Exception($error);
				 
				$formatopresup="";
				$sql="select *, TO_CHAR(FECINI,'DD/MM/YYYY') AS FECINI, TO_CHAR(FECCIE,'DD/MM/YYYY') AS FECCIE
								TO_CHAR(FECINI,'YYYY') AS ANOINI, TO_CHAR(FECCIE,'YYYY') AS ANOCIE
					  from CPDEFNIV where CODEMP='001'";
				$tb = $bd->select($sql);
				if (!$tb->EOF)
				{
					$this->formatopresup=$tb->fields["FORPRE"];
					$this->numeroperiodos=$tb->fields["NUMPER"];
					$this->niveldisponibilidad=$tb->fields["NIVDIS"];
					$this->fechainicio=$tb->fields["FECINI"];
					$this->anoinicio=$tb->fields["ANOINI"];
					$this->fechacierre=$tb->fields["FECCIE"];
					$this->anocierre=$tb->fields["ANOCIE"];
					if ($tb->fields["ASIPER"]=='S')
					{
						$this->asignacion=true;
					}
					else
					{
						$this->asignacion=false;
					}
				}
			}
			catch(Exception $e)
			{
				print "Excepcion	Obtenida: ".$e->getMessage()."\n";
			}
		
		}
		//*******************************
		

	}// class end

?>