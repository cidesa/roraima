<?
//Definiciones de Funciones
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");
   // require_once("../../lib/general/fpdf/font/makefont/makefont.php");

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
		var $proy;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->cab=new cabecera();
			
			
			
			
			if($_GET["NUMORDDES"]!="")
			{
				$this->numorddes=str_replace('*',' ',$_GET["NUMORDDES"]);
				$this->numordhas=str_replace('*',' ',$_GET["NUMORDHAS"]);
				$this->sql1= "SELECT A.NUMORD as ORDEN, A.NUMORD as NUMORD,
						 A.CEDRIF, A.CTABAN, A.TIPCAU, A.ANOPRE, A.NOMBEN, A.DESORD, A.CEDAUT,
						 A.MONORD, to_char(A.FECEMI,'dd/mm/yyyy') as fecemi, A.NUMCOM, A.PERAUT, A.SUJREN as sujren,
						 A.NUMTIQ, (A.MONORD-A.MONRET-A.MONDES) as NETO, 
						    (CASE WHEN A.STATUS='I' THEN 'Pagadas'
								WHEN A.STATUS='N' THEN 'Pendiente por Pagar'
									WHEN A.STATUS='A' THEN 'Anuladas'
										WHEN A.STATUS='C' THEN 'Contraloria'
											WHEN A.STATUS='E' THEN 'Elaborada' END) as STAORD
							FROM OPORDPAG as A
							WHERE
							trim(A.NUMORD) >= ('".$this->numorddes."')
							AND trim(A.NUMORD) <= ('".$this->numordhas."')";
						
			}
			else
			{
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
			$this->proy=$_POST["PROY"];
			$this->lugar_pago=$_POST["LUGAR_PAGO"];
			$this->cod_lugar=$_POST["COD_LUGAR"];
			
			$this->sql1= "SELECT A.NUMORD as ORDEN, A.NUMORD as NUMORD,
						 A.CEDRIF, A.CTABAN, A.TIPCAU, A.ANOPRE, A.NOMBEN, A.DESORD, A.CEDAUT,
						 A.MONORD, to_char(A.FECEMI,'dd/mm/yyyy') as fecemi, A.NUMCOM, A.PERAUT, A.SUJREN as sujren,
						 A.NUMTIQ, (A.MONORD-A.MONRET-A.MONDES) as NETO, 
						    (CASE WHEN A.STATUS='I' THEN 'Pagadas'
								WHEN A.STATUS='N' THEN 'Pendiente por Pagar'
									WHEN A.STATUS='A' THEN 'Anuladas'
										WHEN A.STATUS='C' THEN 'Contraloria'
											WHEN A.STATUS='E' THEN 'Elaborada' END) as STAORD
							FROM OPORDPAG as A
							WHERE
							trim(A.NUMORD) >= ('".$this->numorddes."')
							AND trim(A.NUMORD) <= ('".$this->numordhas."')
							AND trim(A.CEDRIF) >= ('".$this->bendes."')
							AND trim(A.CEDRIF) <= ('".$this->benhas."')
							AND (A.FECEMI) >= ('".$this->fechades."')
							AND (A.FECEMI) <= ('".$this->fechahas."')
							AND (A.TIPCAU) >= ('".$this->tipcaudes."')
							AND (A.TIPCAU) <= ('".$this->tipcauhas."')
							AND A.STATUS <> 'A'
							GROUP BY A.NUMORD,
							A.CEDRIF, A.CTABAN, A.TIPCAU, A.ANOPRE,
							A.NOMBEN, A.DESORD, A.CEDAUT, A.MONORD,
							to_char(A.FECEMI,'dd/mm/yyyy'),
							A.NUMCOM, A.PERAUT, A.SUJREN, A.NUMTIQ,
							(A.MONORD-A.MONRET-A.MONDES), 
							A.STATUS";
							
							//print $this->sql1;
			}
			$this->cab=new cabecera();
						    $this->SetAutoPageBreak(true,51);
							$this->tb1=$this->bd->select($this->sql1);
							$tb1=$this->bd->select($this->sql1);

		}


		function Header()
		{
			// pagina con Orientacion Vertical
			$this->setFont("Arial","",8);
			
		}


		function Cuerpo()
		{


			
			$tb1=$this->bd->select($this->sql1);
			#$this->bd->validar();
			
			
			
		while(!$tb1->EOF) {

			$this->SetXY(100,16);
			$this->Cell(40,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
			$this->SetXY(185,6);
			$this->setFont("Arial","",13);
			$this->Cell(125,5,$tb1->fields["numord"]);

			//$this->setFont("Arial","",8);
			$this->SetXY(185,16);
			$this->setFont("Arial","",12);
			$this->Cell(90,5,$tb1->fields["fecemi"]);


			
			$this->sql2="SELECT A.NOMEXT as NOMEXT
							FROM CPDOCCAU as A,OPORDPAG as B
						 	WHERE A.TIPCAU=B.TIPCAU AND
							B.NUMORD=('".$tb1->fields["numord"]."')";
			//print $this->sql2;
			$this->setFont("Arial","",8);
 			$tb2=$this->bd->select($this->sql2);
			$this->SetXY(15,26);
			if(!$tb2->EOF)
			{
				$this->Cell(85,5,$tb2->fields["nomext"]);
				$nomext=$tb2->fields["nomext"];
				$this->Cell(25,5,$tb1->fields["tipcau"]);
				$tipcau=$tb1->fields["tipcau"];
				//$this->Cell(25,5,$tb1->fields["tipcau"]);
				//$tipcau=$tb1->fields["tipcau"];
				$this->setFont("Arial","",10);
				if($tb1->fields["sujren"]=='S')
				{
					$this->SetXY(118,27);
					$this->cell(5,4,'X',0,0,'L');
				}
				else
				{
				    $this->SetXY(153,27);
					$this->cell(5,4,'X',0,0,'L');
				}	
				$this->Ln(15);
			}
			else {
					$this->sql3=" SELECT A.NOMEXT as NOMEXT
									FROM CPDOCCOM as A,OPORDPAG as B
									WHERE A.TIPCOM=B.TIPCAU AND
									B.NUMORD=('".$tb1->fields["numord"]."')";
					//print $this->sql3;
					$this->setFont("Arial","",8);
					$tb3=$this->bd->select($this->sql3);
					$this->Cell(85,5,$tb3->fields["nomext"]);
					$nomext=$tb3->fields["nomext"];
					$this->Cell(25,5,$tb1->fields["tipcau"]);
					$tipcau=$tb1->fields["tipcau"];
					$this->setFont("Arial","",10);
					if($tb1->fields["sujren"]=='S')
					{
						$this->SetXY(117,25);
						$this->cell(5,4,'X',0,0,'L');
					}
					else
					{
						$this->SetXY(153,25);
						$this->cell(5,4,'X',0,0,'L');
					}	
					$this->Ln(15);
				}

		//-------------------------------------//


		//-------------------------------------//

		//beneficiarios y autorizados
			$this->setFont("Arial","",11);
			$this->SetXY(15,52);
			$this->Cell(100,5,substr ($tb1->fields["nomben"],0,80) ,0,0,'L');
//			$this->setFont("Arial","",9);
			$this->SetX(175);
			$this->Cell(35,5,$tb1->fields["cedrif"],0,0,'R');
			$this->Ln(15);
//			$this->setFont("Arial","",8);
			$this->Cell(100,5,substr ($tb1->fields["peraut"],0,50) ,0,0,'L'); 
//			$this->setFont("Arial","",9);
			$this->SetX(175);
			$this->Cell(35,5,$tb1->fields["cedaut"],0,0,'R');
			$this->Ln(15);

	//----------------------------------//descripcion tiquet y referencia


		$this->SetXY(10,95);
	 	$this->setFont("Arial","",11);
	 	$this->multicell(180,5,$tb1->fields["desord"]);

	//----------------------------------//

	//----------------------------------//
//
	//----------------------------------//


		$this->sql25= "SELECT B.NUMORD as ORDPRE, B.CODPRE, A.TIPCAU, 
						SUBSTR(B.CODPRE,1,2) as sector, SUBSTR(B.CODPRE,4,2) as programa,
						SUBSTR(B.CODPRE,7,2) as subprograma, SUBSTR(B.CODPRE,10,4) as proyecto,
						SUBSTR(B.CODPRE,15,2) as actividad, SUBSTR(B.CODPRE,18,2) as partida,
						SUBSTR(B.CODPRE,21,2) as generica, SUBSTR(B.CODPRE,24,3) as especifica,
						SUBSTR(B.CODPRE,28,3) as subespecifica, SUBSTR(B.CODPRE,32,3) as aporte,
						RTRIM(C.NOMPRE) as nompre, D.fuefin, E.nomext, count (d.fuefin),
						B.MONCAU as MONCAU, SUM(B.MONDES) as MONDES,
						SUM(B.MONRET) as MONRET
						FROM OPORDPAG A, OPDETORD as B, CPDEFTIT as C, CPDISFUEFIN as D, FORTIPFIN as E
						WHERE
						B.NUMORD = ('".$tb1->fields["numord"]."') and
						B.NUMORD = A.NUMORD and
						B.CODPRE = C.CODPRE and
						B.CODPRE = D.CODPRE and 
						D.FUEFIN = E.CODFIN 
						and d.fuefin = '0100' 
						GROUP BY B.CODPRE, B.NUMORD, A.TIPCAU, 
						SUBSTR(B.CODPRE,1,2), SUBSTR(B.CODPRE,4,2),
						SUBSTR(B.CODPRE,7,2), SUBSTR(B.CODPRE,10,4),
						SUBSTR(B.CODPRE,15,2), SUBSTR(B.CODPRE,18,2),
						SUBSTR(B.CODPRE,21,2), SUBSTR(B.CODPRE,24,3),
						SUBSTR(B.CODPRE,28,3), SUBSTR(B.CODPRE,32,3),
						RTRIM(C.NOMPRE), D.fuefin, E.nomext, B.moncau
						ORDER BY B.CODPRE";
						//print $this->sql25;



		//print $this->sql25;
		$tb25=$this->bd->select($this->sql25);
		$cs=0;
		$cs2=0;
		$Y=134;
		$cabe=0;
		$this->setFont("Arial","",11);
		while(!$tb25->EOF)
				{

						$this->SetXY(30,40);
						$this->setFont("Arial","",10);
						$this->Cell(90,5,$tb25->fields["nomext"]);
						/*if($tb25->fields["fuefin"] > 1)
						{
							$this->SetXY(45,40);
							$this->setFont("Arial","",10);
							$this->Cell(90,5,$tb25->fields["nomext"]);
						}*/
						
						$cabe+=1;
						$tb26=$this->bd->select($this->sql26);
						//----------------------------------//partida completa
						$this->setFont("Arial","",12);
						$this->SetXY(10,$Y);
						$this->cell(10,10,$tb25->fields["sector"],0,0,'L');
						$this->SetX(23);
						$this->cell(10,10,$tb25->fields["programa"],0,0,'L');
						$this->SetX(42);
						$this->cell(10,10,$tb25->fields["subprograma"],0,0,'L');
						$this->SetX(60);
						$this->cell(10,10,$tb25->fields["proyecto"],0,0,'L');
						$this->SetX(76);
						$this->cell(10,10,$tb25->fields["actividad"],0,0,'L');
						$this->SetX(93);
						$this->cell(10,10,$tb25->fields["partida"],0,0,'L');
						$this->SetX(113);
						$this->cell(10,10,$tb25->fields["generica"],0,0,'L');
						$this->SetX(128);
						$this->cell(10,10,$tb25->fields["especifica"],0,0,'L');
						$this->SetX(147);
						$this->cell(20,10,$tb25->fields["subespecifica"],0,0,'L');
						$this->SetX(163);
						$this->cell(20,10,$tb25->fields["aporte"],0,0,'L');

						//	primer monto
						$cf_montocuotas=0;
						/*if($tb26->fields["numcou"]>0)
						 {
							$cf_montocuotas=($tb26->fields["moncau"]-$tb26->fields["monret"])/$tb26->fields["numcou"];
							}
						else
							{
							$cf_montocuotas=$tb25->fields["moncau"]-$tb25->fields["monret"]+$tb25->fields["mondes"];
							}*/
							
						    if($tb25->fields["tipcau"]=='OP/N')
							{
							$cf_montocuotas=$tb25->fields["moncau"];
							}
							else
							{
							$cf_montocuotas=$tb25->fields["moncau"]-$tb25->fields["monret"]+$tb25->fields["mondes"];
							}
						$this->SetXY(170,$Y);

						$this->cell(35,10,number_format($cf_montocuotas,2,'.',','),0,0,'R');
						$cs=$cs+$cf_montocuotas;

					$Y+=8.5;
					$tb25->MoveNext();
					if (!$tb25->EOF && $cabe>5){
						$this->AddPage();
						$this->setFont("Arial","",8);
						$this->SetXY(100,16);
						$this->Cell(40,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
						$this->SetXY(185,6);
						$this->setFont("Arial","",13);
						$this->Cell(125,5,$tb1->fields["numord"]);
						$this->SetXY(185,16);
						$this->setFont("Arial","",12);
						$this->Cell(90,5,$tb1->fields["fecemi"]);
						$this->setFont("Arial","",8);
						$this->SetXY(15,23);
						$this->Cell(80,5,$nomext);
						$this->Cell(25,5,$tipcau);
							//beneficiarios y autorizados
						$this->setFont("Arial","",11);
						$this->SetXY(15,50);
						$this->Cell(100,5,substr ($tb1->fields["nomben"],0,50) ,0,0,'L');
						$this->SetX(175);
						$this->Cell(35,5,$tb1->fields["cedrif"],0,0,'R');
						$this->Ln(15);
						$this->Cell(100,5,substr ($tb1->fields["peraut"],0,50) ,0,0,'L');
						$this->SetX(175);
						$this->Cell(35,5,$tb1->fields["cedaut"],0,0,'R');
						$this->Ln(15);
						////descripcion tiquet y referencia
						$this->SetXY(10,95);
					 	$this->setFont("Arial","",10);
					 	$this->multicell(180,3,$tb1->fields["desord"]);
					 	$cabe=0;
					 	$Y=134;
					}
		} // fin ciclo secundario



	//----------------------------------//monto escrito
	 $this->setFont("Arial","",11);
	 $this->SetXY(10,81);

	if ($tb22->fields["cuotas"]>1)
		{	//$this->Setxy(120,60);

			$this->MultiCell(150,3,montoescrito($cs,$this->bd));
			$this->Ln();
			$this->Ln();
			$this->SetXY(180,87);
			$this->cell(20,5,number_format($cs,2,'.',','));

		}
	 else
		{
			//$this->Setxy(120,60);

			$this->MultiCell(150,3,montoescrito($cs,$this->bd));
			$this->Ln();
			$this->Ln();
			$this->SetXY(180,87);
			$this->cell(20,5,number_format($cs,2,'.',','));
		  }
	$this->Ln();

	//fin ciclo principal
	$tb1->MoveNext();
	if (!$tb1->EOF) {
			$this->AddPage();
		}
	}


			}
		}

?>
