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
		var $codaccadm1;
		var $codaccadm2;
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
			$this->codaccadm1=$_POST["codaccadm1"];
			$this->codaccadm2=$_POST["codaccadm2"];
			$this->sql="select codaccadm,desaccadm
							  from npaccadm  
						      WHERE 
							        (codaccadm Between  '".$this->codaccadm1."' AND '".$this->codaccadm2."')
							  ORDER BY 
							  desaccadm asc";			
			$this->llenartitulosmaestro();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="C�digo";
				$this->titulos[1]="Descripci�n";
				$this->anchos[0]=40;
				$this->anchos[1]=80;

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",7);
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
			$this->setFont("Arial","B",7);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			while(!$tb->EOF)
			{
				 $this->setFont("Arial","",7); 
				 $this->cell($this->anchos[0],10,$tb->fields["codaccadm"]);
				 $this->cell($this->anchos[1],10,$tb->fields["desaccadm"]);
				 $tb->MoveNext();
			     $this->ln(3);
			}	
		}
	}
?>