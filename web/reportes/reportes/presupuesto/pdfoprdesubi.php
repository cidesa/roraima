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
		var $codubi1;
		var $codubi2;
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
			$this->codubi1=$_POST["codubi1"];
			$this->codubi2=$_POST["codubi2"];
			///nombre de tabla: predocprc
			$this->sql="SELECT distinct(codubi) as codubi,desubi
						FROM bnubica
						WHERE ( codubi >='".$this->codubi1."' AND codubi <='".$this->codubi2."' )
						ORDER BY desubi";			
			$this->llenartitulosmaestro();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Tipo Ubicacion";
				$this->titulos[1]="Descripcion";
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
			$ref="";
			while(!$tb->EOF)
			{
				$this->setFont("Arial","",8); 
				 $this->cell($this->anchos[0]+40,3,$tb->fields["codubi"]);
				 $this->MultiCell($this->anchos[1]+180,3,$tb->fields["desubi"]);
				$tb->MoveNext();
			    $this->ln(1);
			}	
		}
	}
?>