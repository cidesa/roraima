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
		var $estado;
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


			$this->sql="select codban, rtrim(nomban) as nomban
					from npbancos
					where rtrim(codban) >= rtrim('".$this->cod1."') and rtrim(codban) <= rtrim('".$this->cod2."')
					order by codban";

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[]="Codigo Banco";
				$this->titulos[]="Descripcion Banco";
				$this->titulos[]="Cantidad Empleados";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],5,$this->titulos[$i]);
			}
			$this->ln();
			/*for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}*/
			$this->ln();
			$this->Line(10,43,200,43);

		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			$ncampos=count($this->titulos);
			$canemp=0;
			while (!$tb->EOF)
			{
				//$this->setFont("Arial","B",8);
				$this->cell($this->anchos[0],3,"          ".$tb->fields["codban"]);
				$x=$this->GetX();
				$this->cell($this->anchos[1],3,'');
				$tbban=$this->bd->select("select count(distinct(codemp)) as canemp from nphojint where codban='".$tb->fields["codban"]."' and staemp<>'R'");
				$this->cell(30,3,$tbban->fields["canemp"],0,0,"C");
				$canemp+=$tbban->fields["canemp"];
				$this->setx($x);
				$this->Multicell($this->anchos[1],3,$tb->fields["nomban"]);

				$this->ln();
				$tb->MoveNext();
			}
			$this->ln();
			$this->setFont("Arial","B",9);
			$this->cell(50,3,'');
			$this->cell(50,3,'TOTAL EMPLEADOS:   '.$canemp);
		}
	}
?>
