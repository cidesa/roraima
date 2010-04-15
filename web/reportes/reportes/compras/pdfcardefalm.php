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
		var $codesde;
		var $codhasta;
		var $conf;
				
		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codesde=$_POST["codesde"];
			$this->codhasta=$_POST["codhasta"];
			$this->sql="SELECT DISTINCT 
							a.CODALM as codigo,
							a.NOMALM as nombre,
							a.CODCAT as categoria,
							b.nomins as inst
						FROM CADEFALM a, bndefins b
						WHERE 
							b.codins='001' and
							RTRIM(a.CODALM) >= RTRIM('".$this->codesde."') AND
							RTRIM(a.CODALM) <= RTRIM('".$this->codhasta."') 
						ORDER BY a.CODALM";			
						//print $this->sql;
			$this->llenartitulosmaestro();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo Almacen";
				$this->titulos[1]="Descripción Almacen";
				$this->titulos[2]="Categoria";
				$this->anchos[0]=40;
				$this->anchos[1]=100;	
				$this->anchos[2]=40;	
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(4); 
			$this->Line(10,45,200,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(5); 
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			while(!$tb->EOF)
			{
				$this->setFont("Arial","",8); 
				 $this->cell($this->anchos[0],10,$tb->fields["codigo"]);
				 $this->cell($this->anchos[1],10,$tb->fields["nombre"]);
				 $this->cell($this->anchos[2],10,$tb->fields["categoria"]);				 
				$tb->MoveNext();
			    $this->ln(3);
			}	
		}
	}
?>