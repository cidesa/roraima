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
		var $codvar1;
		var $codvar2;
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
			$this->codvar1=$_POST["codvar1"];
			$this->codvar2=$_POST["codvar2"];
			$this->sql="SELECT * FROM npdefvar a, npnomina b 
						      WHERE 
							        (a.codvar Between  '".$this->codvar1."' AND '".$this->codvar2."')  and
									a.codnom=b.codnom
							  ORDER BY 
							  codvar";			
			$this->llenartitulosmaestro();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Còdigo";
				$this->titulos[1]="Descripción";
				$this->titulos[2]="Nomina";
				$this->titulos[3]="Valor1";
				$this->titulos[4]="Valor2";
				$this->titulos[5]="Valor3";
				$this->titulos[6]="Valor4";
				$this->titulos[7]="Valor5";

				$this->anchos[0]=10;
				$this->anchos[1]=20;
				$this->anchos[2]=70;
				$this->anchos[3]=20;	
				$this->anchos[4]=15;					
				$this->anchos[5]=15;	
				$this->anchos[6]=15;					
				$this->anchos[7]=15;	


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
				 $this->cell($this->anchos[0],10,$tb->fields["codvar"]);
				 $this->cell($this->anchos[1],10,$tb->fields["desvar"]);
				 $this->cell($this->anchos[2],10,$tb->fields["nomnom"]);
				 $this->cell($this->anchos[3],10,$tb->fields["valor1"]);
				 $this->cell($this->anchos[4],10,$tb->fields["valor2"]);
				 $this->cell($this->anchos[5],10,$tb->fields["valor3"]);
				 $this->cell($this->anchos[6],10,$tb->fields["valor4"]);
				 $this->cell($this->anchos[5],10,$tb->fields["valor5"]);
				 $tb->MoveNext();
			     $this->ln(3);
			}	
		}
	}
?>