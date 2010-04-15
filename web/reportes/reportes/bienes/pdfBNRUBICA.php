<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum=0;
		var $result=0;
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codubi1;
		var $codubi2;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codubi1=$_POST["codubi1"];
			$this->codubi2=$_POST["codubi2"];



				$this->sql="SELECT A.CODUBI as acodubi ,A.DESUBI as adesubi FROM BNUBIBIE A
							WHERE RTRIM(A.CODUBI) >= RTRIM('".$this->codubi1."') AND
							RTRIM(A.CODUBI) <= RTRIM('".$this->codubi2."') ORDER BY CODUBI";



			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,15);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO DE UBICACION";
				$this->titulos[1]="DESCRIPCION";

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln();
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}
			$this->ln();
			$this->Line(10,50,200,50);
		}



		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);


			while(!$tb->EOF)
			{

				$this->setFont("Arial","",8);
				 $this->cell($this->anchos[0],7,$tb->fields["acodubi"]);
				 $this->cell($this->anchos[1],7,$tb->fields["adesubi"]);
				 $this->ln();
				 $tb->MoveNext();
				}
		}


	}
?>