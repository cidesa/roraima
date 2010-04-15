<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/bienes/Bnrinvbiemue.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");

	class pdfreporte extends fpdf
	{

		var $total_activo=0;
		var $acum_activo=0;
		var $acum2=0;
		var $acum3=0;
		var $result=0;
		var $result2=0;
		var $result3=0;
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
		var $codubi;
		var $codactdes;
		var $codacthas;
		var $codmuedes;
		var $codmuehas;
		var $fecregdes;
		var $fecreghas;
		var $prenom;
		var $precar;
		var $confnom;
		var $confcar;
		var $apronom;
		var $aprocar;
		var $ubi;

		function pdfreporte()
		{
			//$this->fpdf("l","mm","Letter");
			parent::FPDF("L");
			$this->bd        = new basedatosAdo();
			$this->titulos   = array();
			$this->titulos2  = array();
			$this->campos    = array();
			$this->anchos    = array();
			$this->anchos2   = array();
			$this->codubides    = H::GetPost("codubides");
			$this->codubihas    = H::GetPost("codubihas");
			$this->codactdes = H::GetPost("codactdes");
			$this->codacthas = H::GetPost("codacthas");
			$this->codmuedes = H::GetPost("codmuedes");
			$this->codmuehas = H::GetPost("codmuehas");
			$this->fecdes = H::GetPost("fecdes");
			$this->fechas = H::GetPost("fechas");
			$this->responsable = H::GetPost("responsable");
				$this->prepardes = H::GetPost("prepardes");
			$this->preparhas = H::GetPost("preparhas");
			$this->confordes = H::GetPost("confordes");
			$this->conforhas = H::GetPost("conforhas");
			$this->aprobades = H::GetPost("aprobades");
			$this->aprobahas = H::GetPost("aprobahas");

			$this->bnrinvbiemue = new Bnrinvbiemue();
		    $this->arrp=$this->bnrinvbiemue->sqlp($this->codactdes, $this->codacthas,$this->codmuedes,$this->codmuehas,$this->fecdes,$this->fechas,$this->codubides,$this->codubihas);

		    //h::printR($this->arrp);

			$this->llenartitulosmaestro();
			$this->cab = new cabecera();
			$this->SetAutoPageBreak(true,40);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo del Activo";
				$this->titulos[1]="CLASIFICACION Grupo Sub-Grupo Secciónes";
				$this->titulos[2]="Número del Bien Municipal";
				$this->titulos[3]="Nombre y Descripción de los Elementos";
				$this->titulos[4]="Valor Unitario Bs.";
				$this->titulos[5]="Valor total Bs.";
		}

		function Header()
		{

			$this->SetTextColor(0,0,0);
	  	    $this->cab->poner_cabecera_f($this,$_POST["titulo"],$this->conf,"n","n");
			$this->setFont("Arial","B",8);
		    $this->SetXY(150,10);
		    $this->Cell(120,5,'FORMULARIO BM-I',0,0,'R');
		    $this->SetXY(150,15);
		    $this->Cell(120,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'R');
			$this->setFont("Arial","B",10);
			$this->SetTextColor(0,0,0);
		    $this->SetXY(10,40);
		    $this->Cell(45,5,'1.ENTIDAD PROPIETARIA:',0,0,'l');
		    $this->setFont("Arial","",10);

		    $this->Cell(60,5,$this->Empresa('nombre'),0,0,'l');//funcion Empresa esta es el fpdf
		    $this->Line(57,$this->GetY()+5,140,$this->GetY()+5);

			$this->setFont("Arial","B",10);
		    $this->SetXY(145,$this->getY());
		    $this->Cell(45,5,'2.SERVICIOS:',0,0,'l');
		    $this->setFont("Arial","",10);
		    $this->Line(170,$this->GetY()+5,270,$this->GetY()+5);

		    $this->setFont("Arial","B",10);
			$this->SetTextColor(0,0,0);
		    $this->SetXY(10,$this->getY()+6);
		    //
		    $this->Cell(45,5,'3.UNIDAD DE TRABAJO O DEPENDENCIA:',0,0,'l');
		    $this->setFont("Arial","",10);
	  		//$this->Cell(45,5,$this->arrp["bdesubi"],0,0,'l');
		    $this->Line(87,$this->GetY()+5,270,$this->GetY()+5);
			$this->setFont("Arial","B",10);
			$this->SetTextColor(0,0,0);
		    $this->SetXY(10,$this->getY()+6);
		    $this->Cell(20,5,'4.ESTADO:',0,0,'l');
		    $this->setFont("Arial","",10);
	  		$this->Cell(25,5,$this->Edo(),0,0,'l');//funcion Edo esta en el fpdf
	  		$this->setFont("Arial","B",10);
		    $this->Cell(22,5,'5.DISTRITO:',0,0,'l');
		    $this->setFont("Arial","",10);
	  		$this->Cell(35,5,"CAPITAL",0,0,'l');
	  		$this->Line(77,$this->GetY()+5,110,$this->GetY()+5);
	  		$this->setFont("Arial","B",10);
		    $this->Cell(25,5,'6.MUNICIPIO:',0,0,'l');
		    $this->setFont("Arial","",10);
	  		$this->Cell(25,5,$this->Mun(),0,0,'l');//funcion Mun esta en el fpdf
	  		$this->Line(138,$this->GetY()+5,165,$this->GetY()+5);
		    $this->Line(30,$this->GetY()+5,55,$this->GetY()+5);

		    $this->setFont("Arial","B",10);
			$this->SetTextColor(0,0,0);
		    $this->SetXY(10,$this->getY()+6);
		    $this->Cell(43,5,'7.DIRECCIÓN O LUGAR:',0,0,'l');
		    $this->setFont("Arial","",9);
	  		$this->Cell(25,5,"",0,0,'l');
	  		$this->setFont("Arial","B",10);
		    $this->Line(57,$this->GetY()+5,160,$this->GetY()+5);

			$this->setFont("Arial","B",10);
		    $this->SetXY(165,$this->getY());
		    $this->Cell(20,5,'8.FECHA:',0,0,'l');
		    $this->setFont("Arial","",10);
		    if ($this->fechas == (RTRIM('07/01/2088')))
{  		    //fecha actual
			$fecha=date("d/m/Y");
			$this->Cell(20,5,$fecha,0,0,'C');}
				 else 	$this->Cell(20,5,$this->fechas,0,0,'C');
		    $this->Line(185,$this->GetY()+5,205,$this->GetY()+5);
			$this->ln(10);

			         $this->setWidths(array(30,20,30,120,25,25));
					 $this->setaligns(array("C","C","C","C","C"));
					 $this->setFont("Arial","",8);
					 $this->Line(10,$this->GetY(),270,$this->GetY());
 					 $this->ln(4);
 					 $this->setBorder(1);
					 $this->SetTextColor(150,0,0);
					 $this->Row(array($this->titulos[1],"Cantidad",$this->titulos[2],$this->titulos[3],$this->titulos[4],$this->titulos[5]));
					 $this->ln(3);
					 $this->SetTextColor(0,0,0);
				    // $this->Line(10,$this->GetY()-3,270,$this->GetY()-3);
				     $this->SetTextColor(0,0,0);
				     $this->setaligns(array("L","C","L","R","R"));

		}

		function Footer()
		{

		if ($this->total_activo!=0 and $this->acum_activo!=0 ){
       //  $this->Line(235,$this->GetY(),270,$this->GetY());
		 $this->setFont("Arial","B",8);
 		 $this->SetTextColor(0,0,150);
 		 $this->SetX(195);
	     $this->cell(45,6,"Total Parcial:");
	     $this->cell(20,5,H::FormatoMonto($this->total_activo2),0,0,'R');
 		 $this->setFont("Arial","",8);
 		 $this->SetTextColor(0,0,150);
 		 $this->ln();
 		 $this->SetX(195);
		 $this->cell(45,6,"Cantidad de Activo:");
		 $this->cell(20,5,$this->acum_activo2,0,0,'R');
		 $this->total2=0;
		 $this->t_activo2=0;
		}
		 $this->total2=0;
		 $this->t_activo2=0;
		 $this->ln();
		 $this->sety(177);
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->Line(10,$this->GetY(),10,$this->GetY()+25);
			$this->Line(100,$this->GetY(),100,$this->GetY()+25);
			$this->Line(180,$this->GetY(),180,$this->GetY()+25);
			$this->Line(270,$this->GetY(),270,$this->GetY()+25);
			$this->SetTextColor(150,0,0);
			$this->setFont("Arial","",11);
			$this->cell(90,5,"Responsable de los Bienes Muebles");
			$this->cell(80,5,"Firma y Sello del jefe de la unidad de trabajo");
			$this->cell(90,5,"Registrador de Bienes");
			$this->ln();
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","",10);
			$this->cell(90,5,"Nombre:     ".$this->prepardes);
			$this->cell(80,5,$this->confordes,0,0,'L');
			$this->cell(90,5,$this->aprobades,0,0,'L');
			$this->ln();
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->cell(90,7,"Cargo:      ".$this->preparhas);
			$this->cell(80,7,$this->conforhas,0,0,'L');
			$this->cell(90,7,$this->aprobahas,0,0,'L');
			$this->ln();
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->cell(0,8,"Firma:");
			$this->ln();
			$this->Line(10,$this->GetY(),270,$this->GetY());
		}

		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
			$this->setWidths(array(30,20,30,120,25,25));
			$this->setaligns(array("C","C","C","C","C","C"));
			$acodubi="";
			$bdesubi="";
			$dirubi2="";
			foreach($this->arrp as $arrp)
			{
				if ($acodubi!=$arrp["acodubi"])
				{
					$this->SetTextColor(0,0,0);
					if ($acodubi)   //Fin de la linea del tipo del Mueble
					{
						// $this->ln();
						 $yp=$this->GetY();
						 $xp=$this->GetX();
						 $this->SetXY(85,46);
						 $this->setFont("Arial","",10);
		    			 $this->Cell(120,5,$bdesubi.' : 1 '.$dirubi2,0,0,'L');
		    			 $this->SetXY($xp,$yp);
			 		//	 $this->Line(235,$this->GetY(),270,$this->GetY());
				 		 $this->setFont("Arial","B",8);
				 		 $this->SetTextColor(0,0,150);
				 		 $this->SetX(195);
		 			     $this->cell(45,6,"Total de Activo (Ubicación):");
		 			     $this->cell(20,5,H::FormatoMonto($this->total_activo),0,0,'R');
				 		 $this->setFont("Arial","",8);
				 		 $this->SetTextColor(0,0,150);
				 		 $this->ln();
				 		 $this->SetX(195);
						 $this->cell(45,6,"Cantidad de Activo:");
						 $this->cell(20,5,$this->acum_activo,0,0,'R');
						 $this->total+=$this->total_activo;
						 $this->t_activo+=$this->acum_activo;
						 $this->total_activo = 0;
						 $this->acum_activo  = 0;
						 $this->total_activo2 = 0;
						 $this->acum_activo2  = 0;
						 $this->setaligns(array("C","C","C","L","R","R"));
						 $this->AddPage();
					}
				 	$this->arrp2=$this->bnrinvbiemue->sqlp2($arrp["acodubi"]);
				 	foreach($this->arrp2 as $arrp2){
				 		//DESUBI
				 		 $desubi=$arrp2["desubi"];
                         $dirubi2= $arrp2["dirubi"];
				 	}


					 $acodubi    = $arrp["acodubi"];
	     			 $ref2       = $arrp["acodact"];
	     			 $bdesubi    = $arrp["bdesubi"];


	     			     $this->SetTextColor(0,0,0);
						 $yp=$this->GetY();
						 $xp=$this->GetX();
						 $this->SetXY(85,46);
						 $this->setFont("Arial","",10);
		    			 $this->Cell(120,5,$bdesubi,0,0,'L');
		    		     $this->SetXY(55,58);
						 $this->setFont("Arial","",10);
		    			 $this->Cell(120,5,$dirubi2,0,0,'L');
		    			 $this->SetXY($xp,$yp);



				}

				///Detalles
				 $this->SetLineWidth(0.2);
 				 $this->setFont("Arial","",8);
 				 $this->setaligns(array("C","C","C","L","R","R"));

				if ($arrp["marmue"]!='') {$desm=' Marca: '.$arrp["marmue"];}
				if ($arrp["modmue"]!='') {$desmo=' Modelo: '.$arrp["modmue"];}
				if ($arrp["sermue"]!='') {$dess=' Serial: '.$arrp["sermue"];}

 				/*  if ($arrp["marmue"]!='' or $arrp["sermue"]!='' or $arrp["modmue"]!='' ){
 				 $descrip=$arrp["descri"].' , Marca: '.$arrp["marmue"].' , Modelo: '.$arrp["modmue"].' , Serial: '.$arrp["sermue"];}
 				 else $descrip=$arrp["descri"];*/

 				 $descrip=$arrp["descri"].$desm.$desmo.$dess;
$this->setBorder(1);
 			//	 $this->Row(array(substr($arrp["acodact"],0,1)."            ".substr($arrp["acodact"],2,2)."            ".substr($arrp["acodact"],3,1),$arrp["acodmue"],$descrip,H::FormatoMonto($arrp["avalini"]),H::FormatoMonto($arrp["avalini"])));
 				$this->Row(array($arrp["acodact"],"1",$arrp["acodmue"],$arrp["descri"],H::FormatoMonto($arrp["avalini"]),H::FormatoMonto($arrp["avalini"])));
 				 $this->total_activo=($this->total_activo+$arrp["avalini"]);
 				 $this->acum_activo++;
 				 $this->total_activo2=($this->total_activo2+$arrp["avalini"]);
 				 $this->acum_activo2++;
 				 $des=$arrp["desubi"];
 				 $desm='';
 				 $desmo='';
 				 $dess='';
 				 if ($this->GetY()>160){
 				 	 $this->AddPage();
 				 	 $yp=$this->GetY();
						 $xp=$this->GetX();
						 $this->SetXY(85,46);
						 $this->setFont("Arial","",10);
		    			 $this->Cell(120,5,$bdesubi,0,0,'L');
		    			 $this->SetXY(55,58);
						 $this->setFont("Arial","",10);
		    			 $this->Cell(120,5,$dirubi2,0,0,'L');
		    			 $this->SetXY($xp,$yp);
 				 }

			}

			 $this->ln();
 			// $this->Line(235,$this->GetY(),270,$this->GetY());
	 		 $this->setFont("Arial","B",8);
	 		 $this->SetTextColor(0,0,150);
	 		 $this->SetX(195);
		     $this->cell(45,6,"Total de Activo (Ubicación):");
		     $this->cell(20,5,H::FormatoMonto($this->total_activo),0,0,'R');
	 		 $this->setFont("Arial","",8);
	 		 $this->SetTextColor(0,0,150);
	 		  $this->ln();
	 		 $this->SetX(195);
			 $this->cell(45,6,"Cantidad de Activo:");
			 $this->cell(20,5,$this->acum_activo,0,0,'R');

			 $this->t_activo=$this->t_activo+$this->acum_activo;
			 $this->total=$this->total+$this->total_activo;
			 $this->total_activo = 0;
			 $this->acum_activo  = 0;

						//total final
					     $this->ln(10);
					     $this->SetTextColor(0,0,150);
			 			 $this->Line(10,$this->GetY(),270,$this->GetY());
			 			 $this->Line(10,$this->GetY()+2,270,$this->GetY()+2);
			 			 $this->ln(5);
				 		 $this->setFont("Arial","B",12);

				 		 $this->SetX(195);
		 			     $this->cell(45,6,"Total General:");
		 			     $this->cell(20,5,H::FormatoMonto($this->total),0,0,'R');
		 			 /*    $this->SetX(10);
						 $this->cell(260,5,$this->responsable,0,0,'C');
						 $this->Line(100,$this->GetY()+5,180,$this->GetY()+5);
	 					 $this->ln();
						 $this->cell(260,5,"Responsable" ,0,0,'C');*/
						 $this->ln();
				 		 $this->setFont("Arial","",12);
				 		 $this->SetTextColor(0,0,150);

				 		 $this->SetX(195);
						 $this->cell(45,6,"Total de Activo:");
						 $this->cell(20,5,$this->t_activo,0,0,'R');
						// $this->ln();

						 $this->total = 0;
						 $this->t_activo = 0;

		}

	}

?>
