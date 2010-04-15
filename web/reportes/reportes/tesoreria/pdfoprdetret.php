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
							B.CODTIP,
							D.PORRET as PORRET,
							D.DESTIP as DESTIP,
							A.NUMORD,
							A.CEDRIF,
							A.NOMBEN,
							A.NUMCHE,
							E.CODPRO as CODPRO,
							SUM(B.MONRET) as MONRET,
							SUM(A.MONORD) as MONORD,
							SUM(C.MONCAU) as MONOBJ
 						FROM OPORDPAG A,OPRETORD B, OPDETORD C,OPTIPRET D, CAPROVEE E
						WHERE 
							A.NUMORD=B.NUMORD AND
							C.NUMORD=A.NUMORD AND
							B.CODPRE=C.CODPRE AND
							B.CODTIP=D.CODTIP AND
							B.CODTIP>='".$this->codretdes."' AND
							B.CODTIP<='".$this->codrethas."' AND
							A.CEDRIF>='".$this->bendes."' AND 
							A.CEDRIF<='".$this->benhas."' AND 
							A.FECEMI>=to_date('".$this->fecretdes."','dd/mm/yyyy') AND
							A.FECEMI<=to_date('".$this->fecrethas."','dd/mm/yyyy') AND
							A.CEDRIF=E.RIFPRO
						GROUP BY 
							B.CODTIP,
							D.PORRET,
							D.DESTIP,
							A.NUMORD,
							A.CEDRIF,
							A.NOMBEN,
							A.NUMCHE,
							E.CODPRO
						ORDER BY B.CODTIP,A.NUMORD,A.NOMBEN";			
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
			$this->line(10,$this->getY(),270,$this->getY());
		}
		function Cuerpo()
		{
			$this->setFont("Arial","",8);
			$acum1=0;
			$acum2=0;
			$acum3=0;
			$acum4=0;
		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$ref="";
			if(!$tb2->EOF)
			{
				$this->setFont("Arial","B",9);
				$ref=$tb2->fields["codtip"];
				$this->MultiCell(260,4,'Retencion: '.$tb2->fields["destip"]);
		    	//$this->ln(4);
				$this->line(10,$this->getY(),270,$this->getY());
				$this->cell(10,5,'');
				$this->cell(30,5,'Monto Bs.');
				$this->cell(30,5,'Objeto retenido');
				$this->cell(25,5,'%');
				$this->cell(25,5,'Monto Retenido');
				$this->cell(25,5,'Codigo');
				$this->cell(60,5,'Proveedor/Contratista');
				$this->cell(25,5,'No. de RIF');
				$this->cell(25,5,'No. de Cheque');
		    	$this->ln(4);
				$this->line(10,$this->getY(),270,$this->getY());
			
			}
			while(!$tb->EOF)
			{
				if($tb->fields["codtip"]!=$ref)
				{
					//Totales
					$this->setFont("Arial","B",9);
					$this->ln(2);
					$this->line(10,$this->getY(),130,$this->getY());
					$this->cell(10);
					$this->cell(17,5,number_format($acum1,2,'.',','),0,0,'R');
					$acum1=0;
					$this->cell(38,5,number_format($acum2,2,'.',','),0,0,'R');
					$acum2=0;
					$this->cell(15);
					$this->cell(41,5,number_format($acum3,2,'.',','),0,0,'R');
					$this->cell(16,4,'<--Total',0,0,'R');
					$acum3=0;
										//
					$this->ln(4);
					$this->line(10,$this->getY(),270,$this->getY());
					$this->cell(50,5,'Retencion: '.$tb->fields["destip"]);
		    		$this->ln(4);
					$this->line(10,$this->getY(),270,$this->getY());
					$this->cell(10,5,'');
					$this->cell(30,5,'Monto Bs.');
					$this->cell(30,5,'Objeto retenido');
					$this->cell(25,5,'%');
					$this->cell(25,5,'Monto Retenido');
					$this->cell(25,5,'Codigo');
					$this->cell(60,5,'Proveedor/Contratista');
					$this->cell(25,5,'No. de RIF');
					$this->cell(25,5,'No. de Cheque');
		    		$this->ln(4);
					$this->line(10,$this->getY(),270,$this->getY());
				}
				$this->setFont("Arial","",8);
				//$this->ln(2);
				$this->cell(10,5,'');
				$this->cell(17,5,number_format($tb->fields["monord"],2,'.',','),0,0,'R');
				$acum1=$acum1+$tb->fields["monord"];
				$this->cell(38,5,number_format($tb->fields["monobj"],2,'.',','),0,0,'R');
				$acum2=$acum2+$tb->fields["monobj"];
				$this->cell(15,5,number_format($tb->fields["porret"],2,'.',','),0,0,'C');
				$this->cell(41,5,number_format($tb->fields["monret"],2,'.',','),0,0,'R');
				$acum3=$acum3+$tb->fields["monret"];
				$this->cell(25,5,$tb->fields["codpro"]);
				$x = $this->GetX();
				$this->cell(60);
				$this->cell(25,5,$tb->fields["cedrif"]);
				$this->cell(25,5,$tb->fields["numche"]);

				$this->SetY($this->GetY()+1);
				$this->SetX($x);
				$this->setFont("Arial","",6);
				$this->MultiCell(60,3,trim($tb->fields["nomben"]));
				$this->setFont("Arial","",8);
				
				
				$ref=$tb->fields["codtip"];
			  $tb->MoveNext();
  			  //$this->ln(5);			
  		  }	
		  
					//Totales
					$this->setFont("Arial","B",9);
					$this->ln(2);
					$this->line(10,$this->getY(),130,$this->getY());
					$this->cell(10);
					$this->cell(17,5,number_format($acum1,2,'.',','),0,0,'R');
					$acum1=0;
					$this->cell(38,5,number_format($acum2,2,'.',','),0,0,'R');
					$acum2=0;
					$this->cell(15);
					$this->cell(41,5,number_format($acum3,2,'.',','),0,0,'R');
					$this->cell(16,4,'<--Total',0,0,'R');
					$acum3=0;
  		  			//
		}
	}
?>