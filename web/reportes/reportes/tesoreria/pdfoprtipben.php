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
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codtipben1;
		var $codtipben2;
		var $refiere;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codtipben1=$_POST["codtipben1"];
			$this->codtipben2=$_POST["codtipben2"];
			///nombre de tabla: predocprc
			$this->sql="SELECT codtipben as codtipben,destipben
						FROM optipben
						WHERE ( codtipben >='".$this->codtipben1."' AND codtipben <='".$this->codtipben2."' )
						ORDER BY destipben";
			$this->llenartitulosmaestro();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Tipo Beneficio";
				$this->titulos[1]="Descripción";
				$this->anchos[0]=10;
				$this->anchos[1]=30;



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
				$this->cell($this->anchos[$i]+40,10,$this->titulos[$i]);
			}
				//$this->setXY(182,40);
				//$this->cell(30,5,'Refiere');

				// $this->cell($this->anchos[0]-10,10,"Refiere");

			$this->ln(4);
			$this->Line(10,45,270,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(5);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",7);
		    $tb=$this->bd->select($this->sql);
		    #$this->bd->validar();
			$ref="";
			while(!$tb->EOF)
			{
				$this->setFont("Arial","",8);
				 $this->cell($this->anchos[0]+40,10,$tb->fields["codtipben"]);
				 $this->cell($this->anchos[1]+40,10,$tb->fields["destipben"]);
				$tb->MoveNext();
			    $this->ln(4);
			}
		}
	}
?>