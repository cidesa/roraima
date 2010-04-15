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

			
			$this->sql="select * from npestorg
					where codniv >= rtrim('".$this->cod1."') and codniv <= rtrim('".$this->cod2."') 
					order by codniv";

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código Nivel";
				$this->titulos[1]="Descripción Nivel";
				$this->titulos[2]="             Teléfono Nivel";
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
			$this->ln(-2); 
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			$ncampos=count($this->titulos);
			
			while (!$tb->EOF)
			{
				//$this->setFont("Arial","B",8); 
				$this->cell($this->anchos[0],5,"".$tb->fields["codniv"]);
				$this->cell($this->anchos[1]+5,5,substr($tb->fields["desniv"],0,120));
				$this->cell($this->anchos[2],5,"  ".$tb->fields["telext"]);

				$this->ln();
				$tb->MoveNext();
			}
		}
	}
?>
