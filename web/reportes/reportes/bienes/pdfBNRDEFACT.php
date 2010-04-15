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
		var $codact1;
		var $codact2;


		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codact1=$_POST["cat1"];
			$this->codact2=$_POST["cat2"];



				$this->sql="SELECT A.CODACT as acodact ,A.DESACT as adesact FROM BNDEFACT A WHERE RTRIM(A.CODACT) >= RTRIM('".$this->codact1."') AND
						RTRIM(A.CODACT) <= RTRIM('".$this->codact2."') ORDER BY CODACT";

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,15);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO DEL ACTIVO";
				$this->titulos[1]="DESCRIPCION";

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
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
			$this->Line(10,50,270,50);
		}



		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);


			while(!$tb->EOF)
			{

				$this->setFont("Arial","",8);
				 $this->cell($this->anchos[0],7,$tb->fields["acodact"]);
				 $this->cell($this->anchos[1],7,$tb->fields["adesact"]);
				 $this->ln();
				 $tb->MoveNext();
				}
		}


	}
?>