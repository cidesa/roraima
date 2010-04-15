<?
//Definiciones de Funciones
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		//Def de Variables a utilizar
		var $bd;
		var $orden;
		var $ord2;
		var $tipo;
		var $fecha;
		var $pagina;
		var $fecemi;

		
				
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");  
			$this->bd=new basedatosAdo();	
			//Recibir las variables por el Post
			$this->orden=$_POST["orden"];        
			$this->ord2=$_POST["ord2"];
			$this->cab=new cabecera();			
		}
		

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			
			$this->setFont("Arial","B",8);
			/*$this->Ln(4);
			$this->Cell(250,5,'Republica Bolivariana de Venezuela',0,0,'C');
			$this->Ln(5);
    		$this->Cell(250,5,'Gobernación del Estado Bolivar',0,0,'C');
			$this->Ln(5);
    		$this->Cell(250,5,'Secretaria de Administración y Finanzas',0,0,'C');
			$this->Ln(5);
    		$this->Cell(250,5,'Dirección de Administración',0,0,'C');
			
			$this->Ln(5);
			$this->Cell(250,5,'División de Contabilidad',0,0,'C');
			$this->Ln(5);
			$this->Cell(250,5,'Dpto. Ordenación de Pagos',0,0,'C');
			$this->Ln(10);
			$this->setFont("Arial","B",14);*/
			$this->Cell(250,5,'LISTADO DE ORDENES DE PAGO EMITIDAS',0,0,'C');
			
			$this->Ln(8);
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->setFont("Arial","B",9);
			$this->Cell(30,5,'Orden de Pago ',0,0,'L');
			$this->Cell(65,5,'Nombre o Razon Social ',0,0,'L');
			$this->Cell(30,5,'Fecha de Emisión ',0,0,'L');
			$this->Cell(30,5,'Nro. Tiquet ',0,0,'L');
			$this->Cell(50,5,'Tipo Orden ',0,0,'L');
			$this->Cell(30,5,'Monto Bs. ',0,0,'L');
			$this->Ln();
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->Ln(5);
			
		}
							
		function Cuerpo()
		{
			$CONT=0;
			$this->sql1= "SELECT A.NUMORD, C.NUMORD2 as NUMORD2, to_char(A.FECEMI,'dd/mm/yyyy') as fecemi,
							A.NOMBEN as nomben, A.MONORD,
							A.MONORD-C.MONRET as MONTOT, C.NUMTIQ, C.TIPCAU as tipcau
							FROM TMPORDPAGCON as A, OPORDPAG as C 
							WHERE A.NUMORD=C.NUMORD 
							AND A.NUMORD >=('".$this->orden."') 
							AND A.NUMORD <=('".$this->ord2."')
							UNION SELECT B.REFAJU, B.REFAJU as NUMORD2,
							to_char(B.FECAJU,'dd/mm//yyyy') as fecaju, C.NOMBEN, B.TOTAJU, B.TOTAJU as MONTO, C.NUMTIQ, B.TIPAJU as TIPAJU
							FROM TMPORDPAGCON as A, CPAJUSTE as B, OPORDPAG as C 
							WHERE B.REFERE=C.NUMORD 
							AND A.NUMORD=B.REFAJU 
							AND B.ORDPAG='C' 
							AND A.NUMORD >=('".$this->orden."') 
							AND A.NUMORD <=('".$this->ord2."')
							ORDER BY NUMORD";
			
			$tb1=$this->bd->select($this->sql1);
			//print $this->sql1;
			$total=0;
			
		while(!$tb1->EOF) {
							
				$this->cell(30,10,'				'.$tb1->fields["numord2"]);
				$this->cell(70,10,substr($tb1->fields["nomben"],0,70));
				$this->cell(25,10,$tb1->fields["fecemi"]);
				$this->cell(30,10,$tb1->fields["numtiq"]);
				
				//ojo coalesce en 0
				$this->sql2="select count(tipcau) as contador 
							from cpdoccau where tipcau= ('".$tb1->fields["tipcau"]."')"; 
							
 				 $tb2=$this->bd->select($this->sql2);
				//print $this->sql2;
				 if ($tb2->fields["contador"]!=0) 
				 {     $this->sql3="SELECT NOMEXT as refere FROM CPDOCCAU
				 					WHERE TIPCAU=('".$tb1->fields["tipcau"]."') ";  	  
						$tb3=$this->bd->select($this->sql3);
						//print $this->sql3;
						
				       $this->cell(50,10,substr($tb3->fields["refere"],0,70));
					 
					  }
				  else
				  {    // coalesce en  vacio ' '
				  		 $this->sql4="SELECT MAX(NOMEXT) as refere FROM CPDOCCOM
				  				     WHERE TIPCOM=('".$tb1->fields["tipcau"]."') ";
						$tb4=$this->bd->select($this->sql4);
						//print $this->sql4;
						if ($tb4->fields["refere"]!=' ') 
						{    $this->cell(50,10,substr($tb4->fields["refere"],0,70));
						}
						else 
						{    $this->sql5="SELECT NOMEXT as refere FROM CPDOCAJU
									      WHERE TIPAJU=('".$tb1->fields["tipcau"]."') ";
										//  print $this->sql5;
							 $tb5=$this->bd->select($this->sql5);
							$this->cell(50,10,substr($tb5->fields["refere"],0,70));
						}
					
					}
					
								
				$this->cell(30,10,number_format($tb1->fields["monord"],2,'.',','),0,0,'R');
				$total=$total+$tb1->fields["monord"];
				$CONT=$CONT+1;
				$this->ln(5);
			$tb1->MoveNext();
			 
			}
			
		$this->ln(5);
		$this->Line(80,$this->GetY(),250,$this->GetY());
		$this->cell(100,10,'								');
		$this->cell(50,10,'	TOTAL ORDENES DE PAGO:  '.number_format($CONT,0,'.',','),0,0,'R');
		$this->cell(50,10,'	TOTAL Bs.    '.number_format($total,2,'.',','));
		
		}
		
			
	}
	
?>