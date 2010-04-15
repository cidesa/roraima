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
		var $codaredes;
		var $codarehas;
		var $tipo;
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
			$this->codaredes=$_POST["codaredes"];
			$this->codarehas=$_POST["codarehas"];			
			$this->sql="SELECT 
							CODARECUR as codare, 
							DESARECUR as desare
						FROM RHARECUR
						WHERE 
							RTRIM(CODARECUR) >= RTRIM('".$this->codaredes."') AND
							RTRIM(CODARECUR)<= RTRIM('".$this->codarehas."')
						ORDER BY CODARECUR";		
							//print $this->sql;	
			$this->llenartitulosmaestro();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código del Area de Curso";
				$this->titulos[1]="Descripción";
				$this->anchos[0]=60;
				$this->anchos[1]=60;	
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],5,$this->titulos[$i]);
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
				 $this->cell($this->anchos[0],10,$tb->fields["codare"]);
				 $this->cell($this->anchos[1],10,$tb->fields["desare"]);
				 $tb->MoveNext();
			     $this->ln(3);
			}	
		}
	}
?>