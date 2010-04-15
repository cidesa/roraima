<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

	var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $codbandes;
		var $codbanhas;
		var $tipcuedes;
		var $tipcuehas;
		var $fecdes;
		var $fechas;
		var $conf;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array(); 
			$this->codbandes=$_POST["codbandes"];
			$this->codbanhas=$_POST["codbanhas"];
			$this->tipcuedes=$_POST["tipcuedes"];
			$this->tipcuehas=$_POST["tipcuehas"];
			$this->fecdes=$_POST["fecdes"];
			$this->fechas=$_POST["fechas"];


				$this->sql="SELECT C.TIPINT as TIPO,
							COALESCE(SUM(Case A.DEBCRE when 'D' then B.MONMOV else 0),0) as TOTDEB,
COALESCE(SUM(case A.DEBCRE when 'C' then B.MONMOV else 0 end),0) as TOTCRE
							FROM TSTIPMOV A, TSMOVLIB B, TSDEFBAN C, CONTABA D WHERE
							B.NUMCUE=C.NUMCUE AND
							B.TIPMOV = A.CODTIP AND
							TO_DATE(B.FECING,'DD/MM/YYYY') >=TO_DATE(D.FECINI,'DD/MM/YYYY') AND
							TO_DATE(B.FECING,'DD/MM/YYYY') <= (TO_DATE('".$this->fechas."','DD/MM/YYYY')-1) AND
							(C.TIPINT= 'A' OR C.TIPINT= 'B' OR C.TIPINT= 'C' OR C.TIPINT= 'D')
							GROUP BY C.TIPINT";





			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="";
				$this->titulos[1]="Banco";
				$this->titulos[2]="Nómina";
				$this->titulos[3]="Fondos Especiales";
				$this->titulos[4]="Fondos de terceros";
				$this->titulos[5]="Total";


		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"]." ".$_POST["fecdes"],"l","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i],0,0,'R');
			}
			$this->ln();
			$this->Line(10,45,270,45);
			$this->Line(10,35,10,45);
			$this->Line(270,35,270,45);

		}
		function Cuerpo()
		{
		$tb=$this->bd->select($this->sql);

						}


		}

?>
