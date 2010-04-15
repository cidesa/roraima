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
		var $sql;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $bendes;
		var $benhas;
		var $codretdes;
		var $codrethas;
		var $fecretdes;
		var $fecrethas;
		var $status;
		var $conf;
		var $formato;
		var $direccion;
		var $telefono;
				
		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->bendes=$_POST["bendes"];
			$this->benhas=$_POST["benhas"];
			$this->codretdes=$_POST["codretdes"];
			$this->codrethas=$_POST["codrethas"];
			$this->fecretdes=$_POST["fecretdes"];
			$this->fecrethas=$_POST["fecrethas"];
			$this->status=$_POST["status"];
			$this->sql="SELECT 
							A.NUMRET, 
               				SUM(A.MONRET) as MONRET,
               				B.DESORD,
               				to_char(B.FECEMI,'dd/mm/yyyy') as fecemi,
               				B.STATUS as STATUS2,
               				B.FECPAG,
               				B.FECANU
						FROM OPRETORD A, OPORDPAG B
						WHERE 
							A.NUMRET=B.NUMORD AND
              				A.CODTIP>='".$this->codretdes."' AND 
              				A.CODTIP<='".$this->codrethas."' AND
              				B.FECEMI>=to_date('".$this->fecretdes."','dd/mm/yyyy') AND
              				B.FECEMI<=to_date('".$this->fecrethas."','dd/mm/yyyy') AND
              				B.CEDRIF >='".$this->bendes."' AND
              				B.CEDRIF <='".$this->benhas."'
						GROUP BY 
							A.NUMRET, 
               				B.DESORD,
               				B.FECEMI,
               				B.STATUS,
               				B.FECPAG,
               				B.FECANU
						ORDER BY A.NUMRET";			
			//print $this->sql;
		}
		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$this->cell(270,3,'Del: '.$this->fecretdes.' Al '.$this->fecrethas,0,0,'C');
			$this->ln(4);
			$this->cell(20,5,'Numero');
			$this->cell(25,5,'Fecha');
			$this->cell(90,5,'Concepto');
			$this->cell(100,5,'Beneficiario');
			$this->cell(25,5,'Monto');
		    $this->ln(6);
			$this->line(10,$this->getY()-2,270,$this->getY()-2);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","",8);
			$acum1=0;
		    $tb=$this->bd->select($this->sql);
			while(!$tb->EOF)
			{
				$this->setFont("Arial","",8);
				//$this->ln(2);
			  	$this->cell(20,3,$tb->fields["numret"]);
			  	$this->cell(25,3,$tb->fields["fecemi"]);
				$this->setFont("Arial","",7);
				$x1 = $this->GetX();
			  	$this->cell(90);
				$x2 = $this->GetX();
			  	$this->cell(100);
				$this->setFont("Arial","",8);
			    $this->cell(25,3,number_format($tb->fields["monret"],2,'.',','),0,0,'R');
				$y=$this->GetY();
			    $this->SetX($x2);
				$h=$this->bd->select("SELECT NOMBEN as nombre FROM OPORDPAG  WHERE NUMORD IN (SELECT NUMORD FROM OPRETORD WHERE NUMRET='".$tb->fields["numret"]."')");
			  	$this->MultiCell(100,3,trim($h->fields["nombre"]));
			  	$hasta1 = $this->GetY();
			  	$pag = $this->PageNo();
			    $this->SetY($y);
			  	$this->SetX($x1);
			  	$this->MultiCell(90,3,trim($tb->fields["desord"]));
			  	
			  	if($hasta1 > $this->GetY() and $pag == $this->PageNo())
			  	{
					$this->SetY($hasta1);
			  	}
			    
			    $acum1=$acum1+$tb->fields["monret"];
			  $tb->MoveNext();
  			  $this->ln(2);			
			}	
		  
		  $this->ln(5);
		  $this->line(10,$this->getY(),270,$this->getY());
		  $this->cell(20,5,'');
		  $this->cell(25,5,'');
		  $this->cell(90,5,'');
		  $this->setFont("Arial","B",9);
		  $this->cell(100,5,'Total:');
		  $this->cell(25,5,number_format($acum1,2,'.',','),0,0,'R');
		  $this->ln(4);
		}
	}
?>