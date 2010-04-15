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
		var $tipcom1;
		var $tipcom2;
		var $comodin;
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
			$this->codart1=$_POST["codart1"];
			$this->codart2=$_POST["codart2"];
			$this->comodin=$_POST["comodin"];
			///nombre de tabla: predocprc
			$this->sql="SELECT codart as codart,substr(desart,1,30) as nombre,nomabr as abrev
						FROM cpartley
						WHERE ( codart >='".$this->codart1."' AND codart <='".$this->codart2."' )
						ORDER BY codart";			
			$this->llenartitulosmaestro();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Tipo Articulo";
				$this->titulos[1]="Descripción";
				$this->titulos[2]="Abrev.";
				//$this->titulos[3]="Refiere";
				$this->anchos[0]=10;
				$this->anchos[1]=30;
				$this->anchos[2]=55;
				$this->anchos[3]=55;				

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
				 $this->cell($this->anchos[0]+40,10,$tb->fields["codart"]);
				 $this->cell($this->anchos[1]+40,10,$tb->fields["nombre"]);
				 $this->cell($this->anchos[2]+2,10,$tb->fields["abrev"]);
				 if ($tb->fields["refier"]=='G'):
				 	$this->refiere="PAGADO";
				 elseif ($tb->fields["refier"]=='A'):
				 	$this->refiere="CAUSADO";
				 elseif ($tb->fields["refier"]=='P'):
				 	$this->refiere="PRECOMPROMISO";
				 elseif ($tb->fields["refier"]=='C'):
				 	$this->refiere="COMPROMISO";
				 endif;
				 $this->cell($this->anchos[2]+2,10,$this->refiere);
				$tb->MoveNext();
			    $this->ln(4);
			}	
		}
	}
?>