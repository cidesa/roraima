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
		var $per1;
		var $per2;
		var $cod1;
		var $cod2;
		var $filtro;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->filtro=$_POST["filtro"];


			$this->sql="select codcta, descta, cargab as cargable
					from  contabb
					where (codcta >= '".$this->cod1."') and (codcta <= '".$this->cod2."') and
					(rtrim(codcta) like rtrim('".$this->filtro."'))
					order by codcta";


			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO. CUENTA";
				$this->titulos[1]="      DESCRIPCION";
				$this->titulos[2]="CARGABLE";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln();
			/*for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}*/
			$this->ln();
			$this->Line(10,47,200,47);
			$this->ln(-8);

		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",7);
			$ncampos=count($this->titulos);

			while(!$tb->EOF)
			{

				$this->cell($this->anchos[0],5,$tb->fields["codcta"]);

				if (strtoupper($tb->fields["cargable"])=='C')
				{
					$this->car="SI";
				}
				else
				{
					$this->car="NO";
				}
				$this->Setx(170);
				$this->cell($this->anchos[2],5,"          ".$this->car);
				$this->Setx(50);
				$this->multicell(130,3,$tb->fields["descta"],0,100);
				$this->ln(4);
				$tb->MoveNext();
			}
		}
	}
?>
