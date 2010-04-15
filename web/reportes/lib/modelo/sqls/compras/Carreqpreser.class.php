<?php
require_once("../../lib/modelo/baseClases.class.php");
//require_once("../../lib/modelo/business/presupuesto.class.php");

class Carreqpreser extends baseClases
{
	public  function prueba()
	{
		$temp=$this->select("select * from cpniveles order by consec");

	    return $temp;
	}

	public  function SQLP($codreqdes, $codreqhas, $codcatdes, $codcathas, $codesde, $codhasta, $fechadesde, $fechahasta, $sta1, $sta2)
	{
		//$temp = new presupuesto();
		//$ObtenerCodPreporNiveles = $temp->ObtenerCodPreporNiveles('H');
		//$ObtenerNombCodpreporNiveles = $temp->ObtenerNombCodpreporNiveles('H','01-00-401');
				$sql="SELECT A.REQART as reqart,
							to_char(A.FECREQ,'dd/mm/yyyy') as fecreq,
							A.DESREQ as desreq,
							C.desubi as desubi

						FROM
							CAREQARTSER A,
							CAARTREQSER B,
							bnubibie C
						WHERE
							C.CODUBI=A.CODCATREQ AND
							A.REQART=B.REQART    AND

							RTRIM(A.REQART) >= RTRIM('".$codreqdes."') AND
							RTRIM(A.REQART) <= RTRIM('".$codreqhas."') AND
							RTRIM(B.CODCAT) >= RTRIM('".$codcatdes."') AND
							RTRIM(B.CODCAT) <= RTRIM('".$codcathas."') AND
							RTRIM(B.CODART) >= RTRIM('".$codesde."') AND
							RTRIM(B.CODART) <= RTRIM('".$codhasta."') 

						ORDER BY A.REQART";
						//$sql=$ObtenerNombCodpreporNiveles;
						//H::printR($sql);exit;
//exit();
		return $this->select($sql);
	}


	public  function SQLP1($reqart)
	{
		$sql=  "SELECT
							B.CODART as codart,
							D.DESART as desart,
							D.unimed as unidad

							FROM
							CAREQARTSER A,
							CAARTREQSER B,
							CAREGART D

							WHERE
							A.REQART='".$reqart."' AND
							A.REQART=B.REQART      AND
							B.CODART=D.CODART
							ORDER BY A.REQART";
                          // H::printR($sql);exit;

		return $this->select($sql);
	}

	public  function SQLEmpresa()
	{
		$sql="SELECT NOMEMP as nombre,DIREMP as dir,TLFEMP as telf FROM EMPRESA";
	    return $this->select($sql);
	}

	public function SQLCpdeftit($codpre,$sw)
		{
			//$sql=" select codpre, nompre from cpdeftit where codpre='$codpre'";
			if ($sw=='SE')
			{
				$concatenar = "substr('".$codpre."',1,2)";
			}elseif ($sw=='PR')
			{
				$concatenar = "substr('".$codpre."',1,5)";
			}elseif ($sw=='AC')
			{
				$concatenar = "substr('".$codpre."',1,9)";
			}


			 $sql="select
					codpre, nompre
					from
					cpdeftit
					where
					codpre =".$concatenar;

		    return $this->select($sql);
		}
}
?>