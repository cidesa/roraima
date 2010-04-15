<?
//Definiciones de Funciones
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");	

	
	class pdfreporte extends fpdf
	{
		//Def de Variables a utilizar
		var $bd;
		var $cf_montocuotas;
		var $monto;
		var $cs;
		var $cs2;
		var $montocuotas;
		var $numorddes;
		var $numordhas;
		var $bendes;
		var $benhas;
		var $fechades;
		var $fechahas;
		var $tipcaudes;
		var $tipcauhas;
		var $lugar_pago;
		var $cod_lugar;
		var $numcont;
		var $antic;
		var $valuac;
		var $fecha;
		var $numord;
		var $fecord;
		var $numserv;
		var $fecserv;
		var $cuenta;
		
				
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");  
			$this->bd=new basedatosAdo();	
			$this->cab=new cabecera();			
			//Recibir las variables por el Post
			$this->numorddes=$_POST["NUMORDDES"];
			$this->numordhas=$_POST["NUMORDHAS"];
			$this->bendes=$_POST["BENDES"];
			$this->benhas=$_POST["BENHAS"];
			$this->fechades=$_POST["FECHADES"];
			$this->fechahas=$_POST["FECHAHAS"];
			$this->tipcaudes=$_POST["TIPCAUDES"];
			$this->tipcauhas=$_POST["TIPCAUHAS"];
			$this->lugar_pago=$_POST["LUGAR_PAGO"];
			$this->cod_lugar=$_POST["COD_LUGAR"];
			$this->numcont=$_POST["NUMCONT"];
			$this->antic=$_POST["ANTIC"];
			$this->valuac=$_POST["VALUAC"];
			$this->fecha=$_POST["FECHA"];
			$this->numord=$_POST["NUMORD"];
			$this->fecord=$_POST["FECORD"];
			$this->numserv=$_POST["NUMSERV"];
			$this->fecserv=$_POST["FECSERV"];
			$this->cuenta=$_POST["cuenta"];
			$this->lugar_pago=$_POST["LUGAR_PAGO"];
			$this->cod_lugar=$_POST["COD_LUGAR"];

		}
		

		function Header()
		{
			// pagina con Orientacion Vertical
			$this->setFont("Arial","B",8);
			$this->rect($this->GetX()-5,$this->GetY(),205,260);		
		}
							
		function Cuerpo()
		{
							
			$this->sql1= "SELECT A.NUMORD as ORDEN, A.NUMORD as NUMORD, A.NUMORD2 as NUMORD2,
						 A.CEDRIF, A.CTABAN, A.TIPCAU, A.ANOPRE, A.NOMBEN, A.DESORD, A.CEDAUT,
						 A.MONORD, to_char(A.FECEMI,'dd/mm/yyyy') as fecemi, A.NUMCOM, A.PERAUT,
						 A.NUMTIQ, (A.MONORD-A.MONRET-A.MONDES) as NETO,
						    (CASE WHEN A.STATUS='I' THEN 'Pagadas'
								WHEN A.STATUS='N' THEN 'Pendiente por Pagar'
									WHEN A.STATUS='A' THEN 'Anuladas'
										WHEN A.STATUS='C' THEN 'Contraloría'
											WHEN A.STATUS='E' THEN 'Elaborada' END) as STAORD,
																								
							A.CODUNI, B.NOMEXT as nomext, C.DESENL 
							FROM OPORDPAG as A, CPDOCCAU as B,TSDEFBAN as C 
							WHERE 
							A.TIPCAU=B.TIPCAU
							and A.CTABAN=C.NUMCUE 
							AND trim(A.NUMORD) >= ('".$this->numorddes."') 
							AND trim(A.NUMORD) <= ('".$this->numordhas."') 
							AND trim(A.CEDRIF) >= ('".$this->bendes."') 
							AND trim(A.CEDRIF) <= ('".$this->benhas."') 
							AND (A.FECEMI) >= to_date('".$this->fechades."','dd/mm/yyyy') 
							AND (A.FECEMI) <= to_date('".$this->fechahas."','dd/mm/yyyy') 
							AND (A.TIPCAU) >= ('".$this->tipcaudes."') 
							AND (A.TIPCAU) <= ('".$this->tipcauhas."') 
							ORDER BY RTRIM(A.NUMORD)";
							
						//	print $this->sql1;
			$tb1=$this->bd->select($this->sql1);
		
			
		while(!$tb1->EOF) {
							
			$this->Cell(60,5,$this->numcont,0,0,'C');
			$this->setFont("Arial","B",9);
			$this->Cell(125,5,$tb1->fields["numord2"],0,0,'R');
			$this->Ln(5);
			$this->setFont("Arial","B",8);
			$this->Cell(50,5,$this->antic,0,0,'L');
			$this->Cell(50,5,$this->valuac,0,0,'L');
			$this->setFont("Arial","B",9);
			$this->Cell(90,5,$tb1->fields["fecemi"],0,0,'R');
			$this->Ln(5);
			$this->setFont("Arial","B",8);
			$this->Cell(60,5,$this->fecha,0,0,'C');
			$this->setFont("Arial","B",9);
			$this->Cell(125,5,$tb1->fields["desenl"],0,0,'R');
			$this->Ln(5);
			$this->setFont("Arial","B",8);
			$this->Cell(50,5,$this->numord,0,0,'L');
			$this->Cell(50,5,$this->fecord,0,0,'L');
			$this->Ln(5);
			$this->Cell(50,5,$this->numserv,0,0,'L');
			$this->Cell(50,5,$this->fecserv,0,0,'L');
			$this->setFont("Arial","B",9);
			$this->Cell(90,5,$tb1->fields["ctaban"],0,0,'R');
			$this->Ln(10);		
					
			$this->Cell(120,5,$tb1->fields["nomext"],0,0,'R');
			$this->Cell(25,5,$tb1->fields["tipcau"],0,0,'R');
			$this->Ln(10);
					
		//beneficiarios y autorizados		
			$this->setFont("Arial","B",8);
			$this->Cell(100,5,substr ($tb1->fields["nomben"],0,50) ,0,0,'L');
			$this->setFont("Arial","B",9);
			$this->Cell(25,5,$tb1->fields["cedrif"],0,0,'R');
			$this->Ln(5);
			$this->setFont("Arial","B",8);
			$this->Cell(100,5,substr ($tb1->fields["peraut"],0,50) ,0,0,'L');
			$this->setFont("Arial","B",9);
			$this->Cell(25,5,$tb1->fields["cedaut"],0,0,'R');
			$this->Ln(15);
			$this->setFont("Arial","B",8);
			
		//-------------------------------------//
		
			
  			$this->sql4="SELECT NOMPRE as nompre FROM CPDEFTIT 
						WHERE CODPRE =RPAD(('".$tb1->fields["coduni"]."'),32,' ')";
 	 		$tb4=$this->bd->select($this->sql4);
			
			$this->Cell(125,5,$tb4->fields["nompre"],0,0,'R');
			$this->Ln(5);
			
			$this->Cell(125,5,$this->cuenta,0,0,'R');
  			$this->Ln(10);
			
			$this->setFont("Arial","B",9);
			
			//----------------------------------//
			
			 //cuotas de pago y lo relacionado
//primer termino   

   		$this->sql20= "SELECT to_char(MIN(B.FECINICUO),'DD/MM/YYYY') as FECINICUO
						FROM OPDETPER as B
						WHERE B.REFOPP=('".$tb1->fields["orden"]."')";  	  
		$tb20=$this->bd->select($this->sql20);
		//print $this->sql20;
		if($tb20->fields["fecinicuo"]=null)
			{
				$this->cell(20,10,' ',0,0,'L');
			}
 			else
			{
				$this->cell(20,10,$tb20->fields["fecinicuo"]);
  			}
//segundo termino
		$this->sql21= " SELECT to_char(MAX(B.FECFINCUO),'DD/MM/YYYY') as FECFINCUO
						FROM OPDETPER as B
						WHERE B.REFOPP=('".$tb1->fields["orden"]."')";  	  
		$tb21=$this->bd->select($this->sql21);
		if($tb21->fields["fecfincuo"]=null)
			{
				$this->cell(20,10,' ',0,0,'L');
			}
 			else
			{
				$this->cell(20,10,$tb21->fields["fecfincuo"]);
  			}
		
		//tercer termino
			
		$this->sql22= " SELECT A.NUMCUO as CUOTAS
						FROM OPORDPER as A
						WHERE A.REFOPP=('".$tb1->fields["orden"]."')";  	  
		$tb22=$this->bd->select($this->sql22);
		if($tb22->fields["cuotas"]=null)
			{
				$this->cell(20,10,'1',0,0,'L');
			}
 			else
			{
				$this->cell(20,10,$tb22->fields["cuotas"],0,0,'L');
  			}
 //cuarto termino
 $this->sql23= " SELECT (CASE WHEN FREOPP='Q' THEN 'Quincenal'
								WHEN FREOPP='M' THEN 'Mensual'
									WHEN FREOPP='B' THEN 'Bimensual'
										WHEN FREOPP='T' THEN 'Trimestral'
											WHEN FREOPP='C' THEN 'Cuatrimestral'
												WHEN FREOPP='S' THEN 'Semestral'
													WHEN FREOPP='A' THEN 'Anual'
														WHEN FREOPP='P' THEN 'Pago Único'
														 END) as frecuencia
						FROM OPORDPER WHERE REFOPP=('".$tb1->fields["orden"]."')";  	  
		$tb23=$this->bd->select($this->sql23);
		
		if(!$tb23->EOF)//ojo en el termino anterior lo hace con null
			{
				$this->cell(30,10,$tb23->fields["frecuencia"],0,0,'L');
			}
 			else
			{
				$this->cell(20,10,'Un solo Pago',0,0,'L');
  			}
  //quinto y sexto termino directo del form
			$this->Cell(50,10,$this->lugar_pago,0,0,'R');
			$this->Cell(20,10,$this->cod_lugar,0,0,'R');
			$this->Ln(20);
	
	
	//----------------------------------//monto escrito
	 $this->setFont("Arial","B",8);
	 
 	$this->Multicell(180,8,montoescrito($tb1->fields["neto"],$this->bd),0,'L');
	//$this->cell(120,10,'monto escrito: '.number_format($tb1->fields["neto"],2,'.',','),0,0,'C');
		$this->Ln();
	  $this->setFont("Arial","B",11);
	 
	
	 //----------------------------------//lo q va antes de la partida
	  $this->Cell(15,10,$tb1->fields["tipcau"],0,0,'L');
	  if ($tb1->fields["tipcau"]!='OP08' )
	{  
		$this->sql40= "SELECT DISTINCT TO_CHAR(A.FECPRC,'YYYY') as FECPRC
						FROM CPPRECOM as A,CPIMPCAU as B
						WHERE B.REFCAU=('".$tb1->fields["orden"]."') 
						AND A.REFPRC=B.REFPRC";  	  
		$tb40=$this->bd->select($this->sql40);
		//print $this->sql40;
		if($tb40->fields["fecprc"]!=null)
		{
			$this->cell(15,10,$tb40->fields["fecprc"],0,0,'L');
		}
		else 
		{
			$this->sql41= " SELECT DISTINCT TO_CHAR(A.FECCAU,'YYYY') as FECCAU
						FROM CPCAUSAD as A,CPIMPCAU as B
						WHERE RTRIM(B.REFCAU)=RTRIM(('".$tb1->fields["orden"]."'))
						AND A.REFCAU=B.REFCAU";  	  
		$tb41=$this->bd->select($this->sql41);
		//print $this->sql40;
		$this->cell(15,10,$tb41->fields["feccau"],0,0,'L');
		}
	}
	else
	{ 
		$this->sql42= " SELECT DISTINCT (TO_NUMBER(TO_CHAR(FECEMI,'YYYY'),9999)-1) as FECEMI
						FROM OPORDPAG WHERE NUMORD=('".$tb1->fields["orden"]."')";  	  
		$tb42=$this->bd->select($this->sql42);
		//print $this->sql40;
		$this->cell(15,10,$tb42->fields["fecemi"],0,0,'L');
	}
	
	$this->cell(10,10,' 01 ',0,0,'L');
	
	  //----------------------------------//
		$this->sql25= "SELECT B.NUMORD as ORDPRE, B.CODPRE,
						SUBSTR(B.CODPRE,1,2) as sector, SUBSTR(B.CODPRE,4,2) as programa,
						SUBSTR(B.CODPRE,7,2) as proyecto, SUBSTR(B.CODPRE,10,2) as actividad,
						SUBSTR(B.CODPRE,13,3) as partida, SUBSTR(B.CODPRE,17,2) as generica,
						SUBSTR(B.CODPRE,20,2) as especifica, SUBSTR(B.CODPRE,23,2) as subespecifica,
						SUBSTR(B.CODPRE,26,3) as numeral, RTRIM(C.NOMPRE) as nompre,
						B.MONCAU as MONCAU, B.MONDES as MONDES,
						B.MONRET as MONRET
						FROM OPDETORD as B, CPDEFTIT as C 
						WHERE 
						B.NUMORD = ('".$tb1->fields["orden"]."') and
						B.CODPRE = C.CODPRE
						ORDER BY B.CODPRE";	
						
		$tb25=$this->bd->select($this->sql25);		
		$cs=0;
		$cs2=0;
	
		while(!$tb25->EOF) 
				{
			 $this->sql26= "SELECT A.NUMCUO, B.MONCAU, B.MONRET, B.CODPRE as NUMCUO, MONCAU,
  					MONRET, CODPRE
					FROM OPORDPER as A, OPDETORD as B 
					WHERE A.REFOPP=B.NUMORD AND
					REFOPP=('".$tb1->fields["orden"]."') AND
					RTRIM(B.CODPRE)=('".$tb25->fields["sector"]."') || '-' ||
					('".$tb25->fields["programa"]."') || '-00-' || ('".$tb25->fields["actividad"]."') || '-' ||
					('".$tb25->fields["partida"]."') || '-' || ('".$tb25->fields["generica"]."') || '-' ||
					('".$tb25->fields["especifica"]."') || '-' || ('".$tb25->fields["subespecifica"]."')
					 || '-' || ('".$tb25->fields["numeral"]."')";
					
				$tb26=$this->bd->select($this->sql26);	
				//----------------------------------//partida completa
				
				
				$this->cell(10,10,$tb25->fields["sector"],0,0,'L');
				$this->cell(10,10,$tb25->fields["programa"],0,0,'L');
				$this->cell(10,10,$tb25->fields["actividad"],0,0,'L');
				$this->cell(10,10,$tb25->fields["partida"],0,0,'L');
				$this->cell(10,10,$tb25->fields["generica"],0,0,'L');
				$this->cell(10,10,$tb25->fields["especifica"],0,0,'L');
				$this->cell(10,10,$tb25->fields["subespecifica"],0,0,'L');
				$this->cell(20,10,$tb25->fields["numeral"],0,0,'L');
				
				//	primer monto
								
				$cf_montocuotas=0;
				if($tb26->fields["numcou"]>0)
				 {
					$cf_montocuotas=($tb26->fields["moncau"]-$tb26->fields["monret"])/$tb26->fields["numcou"];
					}
				else
					{
					$cf_montocuotas=$tb25->fields["moncau"]-$tb25->fields["monret"]+$tb25->fields["mondes"];
					}
				$this->cell(35,10,number_format($cf_montocuotas,2,'.',','),0,0,'L');
				$cs=$cs+$cf_montocuotas;
				
				// 2DO MONTO
  
     				   $this->sql55= "SELECT monopp as monto FROM opordper
				       				 WHERE trim(refopp)=('".$tb1->fields["orden"]."') ";
							//		 print $this->sql45;
	 					$tb55=$this->bd->select($this->sql55);
						$monto=0; 
						if($tb45->fields["monto"]=null)
							 { $monto=$tb25->fields["moncau"]-$tb25->fields["monret"]+$tb25->fields["mondes"];
		 						}
	 						else
							 { $monto=$tb55->fields["monto"];
								}
						 $this->cell(30,10,number_format($monto,2,'.',','),0,0,'L');
						 $cs2=$cs2+$monto;
	 
 			$this->Ln(5);
			$tb25->MoveNext();
				} // fin ciclo secundario
				
//----------------------------------//totales
	$this->Ln(10);
	$this->Cell(130,10,' ',0,0,'C');
	$this->Cell(35,10,number_format($cs,2,'.',','),0,0,'L');
	$this->Cell(30,10,number_format($cs2,2,'.',','),0,0,'L');
	$this->Ln();
	
	
	 
	
	//----------------------------------//descripcion tiquet y referencia
		$this->Ln(80);
	 	$this->setFont("Arial","B",8);
		$this->Cell(125,5,substr ($tb1->fields["desord"],0,110) ,0,0,'L');
		$this->Ln(5);
		$this->Cell(125,5,substr ($tb1->fields["desord"],110,110) ,0,0,'L');
		$this->Ln(5);
		$this->Cell(125,5,substr ($tb1->fields["desord"],220,110) ,0,0,'L');
		$this->Ln(10);
		$this->Cell(125,5,'Ticket: '.$tb1->fields["numtiq"],0,0,'L');
	
		
	
	//fin ciclo principal
	$tb1->MoveNext();	
	if (!$tb1->EOF){$this->AddPage();}
	
	}
				
			  
			}
		}
	
?>