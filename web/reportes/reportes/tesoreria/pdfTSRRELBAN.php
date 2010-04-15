<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $acum=0;
		var $acum2=0;
		var $acum3=0;				
		var $cont=0;
		var $cont1=0;				
		var $result=0;				
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
		var $codban1;
		var $codban2;
		var $tipcue1;
		var $tipcue2;
		var $saldo;
		var $fecreg1;
		var $fecreg2;
						
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codban1=$_POST["codban1"];
			$this->codban2=$_POST["codban2"];
			$this->tipcue1=$_POST["tipcue1"];
			$this->tipcue2=$_POST["tipcue2"];			
			$this->saldo=$_POST["saldo"];
			$this->fecreg1=$_POST["fecreg1"];
			$this->fecreg2=$_POST["fecreg2"];
									
						
				/*$this->sql="SELECT B.CODTIP as bcodtip, B.DESTIP as adestip ,A.NUMCUE as anumcue, A.NOMCUE as anomcue, A.ANTLIB as aantlib, A.DEBLIB as adeblib,
							A.CRELIB as acrelib, A.USOCUE as asucue, A.ANTLIB+A.DEBLIB-A.CRELIB as resu FROM TSDEFBAN A, TSTIPCUE B WHERE A.TIPCUE=B.CODTIP AND 
						 	B.CODTIP >= RPAD('".$this->tipcue1."',3,' ') AND B.CODTIP <= RPAD('".$this->tipcue2."',3,' ') AND
							A.NUMCUE >= RPAD('".$this->codban1."',20,' ') AND A.NUMCUE <= RPAD('".$this->codban2."',20,' ') 
							GROUP BY B.CODTIP,B.DESTIP,A.NUMCUE,A.NOMCUE,A.ANTLIB,A.DEBLIB,A.CRELIB,A.USOCUE"; */
		  $this->sql="SELECT B.CODTIP as bcodtip, B.DESTIP as adestip ,A.NUMCUE as anumcue, A.NOMCUE as anomcue, A.ANTLIB as aantlib, A.DEBLIB as adeblib,
							A.CRELIB as acrelib, A.ANTLIB+A.DEBLIB-A.CRELIB as resu FROM TSDEFBAN A, TSTIPCUE B WHERE A.TIPCUE=B.CODTIP AND 
						 	B.CODTIP >= RPAD('".$this->tipcue1."',3,' ') AND B.CODTIP <= RPAD('".$this->tipcue2."',3,' ') AND
							A.NUMCUE >= RPAD('".$this->codban1."',20,' ') AND A.NUMCUE <= RPAD('".$this->codban2."',20,' ') 
							GROUP BY B.CODTIP,B.DESTIP,A.NUMCUE,A.NOMCUE,A.ANTLIB,A.DEBLIB,A.CRELIB"; 
							
					

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);			
			
		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="BANCO";
				$this->titulos[1]="NUMERO CUENTA";
			///	$this->titulos[2]="USO CUENTA";
				$this->titulos[2]="";
				$this->titulos[3]="SALDO CUENTA";
	
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i]);
			}
			 $this->ln();
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],7,$this->titulos2[$i]);
			}
			$this->Line(10,46,200,46);
   		    $this->ln();						

		}
		
		
				
			function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["adestip"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8); 
				 $this->cell(20,4,"Tipo de Cuenta Bancaria   ");
				 $this->cell(20,4,"                    ".$tb2->fields["adestip"]);
				 $this->ln();				 				 
// 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());
			}
			while(!$tb->EOF)
			{
				if($tb->fields["adestip"]!=$ref)
				{
			 $this->SetLineWidth(0.2);
				 $this->ln();

				 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","B",8); 
          		 $this->Line(165,$this->GetY(),200,$this->GetY());
				 $this->SetX(120);
				 $this->cell(40,4,"Sub Total por Tipo de Cuenta: ");
				 $this->SetX(160);				 
				 $this->Cell($this->anchos[4]+29,4,number_format($this->acum,2,'.',','),0,0,'R');
				 $this->ln();				 
				 $this->acum=0;
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());				 				 	
				 $this->ln();
		 		 $this->setFont("Arial","B",8); 
				 $this->cell(20,4,"Tipo de Cuenta Bancaria   ");
				 $this->cell(20,4,"                    ".$tb->fields["adestip"]);
				 $this->ln();				 				 

// 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());				 
				 $this->ln();				 
		        }
				$ref=$tb->fields["adestip"];
				$this->setFont("Arial","",8);
				//Detalle
				 $this->cell($this->anchos[0],5,$tb->fields["anomcue"]);
				 $this->cell($this->anchos[1],5,$tb->fields["anumcue"]);				 
 			//	 $this->cell($this->anchos[2],5,$tb->fields["ausucue"]);
				 $this->cell($this->anchos[2],5,"");
				 $this->cell($this->anchos[4]+24,5,number_format($tb->fields["resu"],2,',','.'),0,0,'R');
 				 $this->acum=($this->acum+$tb->fields["resu"]);
 				 $this->acum2=($this->acum2+$tb->fields["resu"]);				 				 				 				 				 				 
				 $this->ln();
				 $tb->MoveNext();
		
		 
			 }
				 $this->SetLineWidth(0.2);			 
				 $this->ln();
          		 $this->Line(165,$this->GetY(),200,$this->GetY());
				 $this->SetX(120);
 				 $this->cell(20,4,"Total General: ");
				 $this->SetX(160);				 
				 $this->Cell($this->anchos[4]+29,4,number_format($this->acum2,2,'.',','),0,0,'R');	
		
		}

	}
?>