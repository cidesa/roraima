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
		var $sqla;
		var $sqlx;
		var $sqlb;
		var $sqlc;
		var $sqld;
		var $sqlmes;
		var $sqldia;
		var $sql1;
		var $sql2;
		var $sql3;
		var $sql4;
		var $sql5;
		var $ag;
		var $rif;
		var $dire;
		var $orde;
		var $ben;
		var $corr;
		var $corre;
		var $cormanual;
		var $benalt;
		var $fechasys;
		var $correlativo;
		var $mes;
		var $ano;


		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->ag=$_POST["ag"];
			$this->rif=$_POST["rif"];
			$this->dire=$_POST["dire"];
			$this->orde=$_POST["orde"];
			$this->ben=$_POST["ben"];
			$this->corr=$_POST["corr"];
			$this->corre=$_POST["corre"];
			$this->responsable=$_POST["responsable"];
			$this->fechaentrega=$_POST["fechaentrega"];

				$this->sql="select a.numord,b.cedrif,b.nomben,b.fecemi,to_char(a.fecfac,'dd/mm/yyyy') as fecfac,a.numfac,
							a.numctr,a.tiptra,a.facafe,b.monord,
							a.totfac,a.exeiva,a.basltf,a.porltf,a.monltf
							from opfactur a,opordpag b
							where
							a.numord='".$this->orde."' and
							a.numord=b.numord
							order by a.numord";
							//print $this->sql;exit;
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,50);
		}


		function br()
		{
			$this->fechasys=date('d/m/Y');
			$this->ano=date('Y');
			$this->mes=date('m');
		//---------------------
		$this->sql1="select comret,feccomret, to_char(feccomret,'dd/mm/yyyy') as feccomretc
					from opordpag where numord='".$this->orde."'";
		$tb1=$this->bd->select($this->sql1);
		if ($tb1->fields["comret"]==NULL)
		{
			$comret=" ";
		}
		else
		{
			$comret=$tb1->fields["comret"];
		}
		$feccomret=$tb1->fields["feccomret"];
		$feccomretc=$tb1->fields["feccomretc"];

		/*/----GENERAR CORRELATIVO
		if (strtoupper($this->corr)=="N")//NO
		{
			if ($comret==" ")
			{
			$this->correlativo=0;
			}
			else
			{
				$this->correlativo=$comret;
				if ($feccomretc==NULL)
				{
					$feccomretc=" ";
				}
				if ($feccomretc<>" ")
				{
					$this->fechasys=$feccomretc;
				}
			}
			$this->sql2="update opordpag set comret='".$this->correlativo."',
						feccomret=to_date('".$this->fechasys."','dd/mm/yyyy')
					    where numord='".$this->orde."'";
			$this->bd->actualizar($this->sql2);

		}
		else
		{
		//SI
		}*/
			if ($this->corre==NULL)
			{
				$this->cormanual=" ";
			}
			else
			{
				$this->cormanual=$this->corre;
			}

			if ($this->cormanual==" ")
			{
				$this->correlativo=0;
			}
			else
			{
				$this->correlativo=$this->cormanual;
				if ($feccomretc==NULL)
				{
					$feccomretc=" ";
				}
				if ($feccomretc<>" ")
				{
					$this->fechasys=$feccomretc;
				}

			}
		}

		function Footer()
		{
			$this->SetFont("Arial","B",9);
			$this->SetY(190);
			$this->Line(110,$this->GetY(),170,$this->GetY());
			$this->MultiCell(0,5,$_POST["responsable"]."\nAgente de Retención",0,'C');
			$this->ln(4);
			$this->SetFont("Arial","B",6);
			$this->MultiCell(0,5,'En Cumplumiento a lo dispuesto en el articulo 5 de la providencia Administrativa Nº DRTI-2004-0022 de fecha 13 de Abril de 2004',0,'L');
			$this->SetFont("Arial","B",9);

		}

		function Header()
		{
			$this->SetFont("Arial","B",8);
			$this->Image("../../img/logo_1.jpg",10,10,30);
			$this->SetY(15);
			$this->Cell(40);
			$this->SetX(10);
			$this->MultiCell(0,3,"REPUBLICA BOLIVARIANA DE VENEZUELA",0,'C');
			$this->MultiCell(0,3,"SERVICIO METROPOLITANO DE ADMINISTRACIÓN TRIBUTARIA",0,'C');
			$this->MultiCell(0,3,"DE LA ALCALDIA DEL DISTRITO METROPOLITANO DE CARACAS",0,'C');
			$this->ln();
			$this->MultiCell(0,3,"COMPROBANTE DE RETENCION DEL IMPUESTO DEL UNO POR MIL (1 X 1000)",0,'C');
			$this->ln();
			$this->SetFont("Arial","",6);
			$this->MultiCell(0,3,"CONSAGRADO EN EL ARTICULO 9 DE LA ORDENANZA DEL TIBRE FISCAL DEL DISTRITO METROPOLITANO DE CARACAS",0,'C');
			$this->SetFont("Arial","",8);

			//$this->Image("../../img/seniat.jpg",215,20,30);
			$this->Cell(40);
			/*
			$this->MultiCell(0,3,"(LEY IVA-ART.11 * SERAN RESPONSABLES DEL PAGO DEL IMPUESTO EN CALIDAD DE AGENTES DE RETENCIÓN,\n".
								"LOS COMPROBANTES O ADQUIRIENTES DE DETERMINADOS BIENES MUEBLES Y LOS RECEPTORES DE CIERTOS SERVICIOS,\n".
								"A QUIERES LA ADMINISTRACIÓN TRIBUTARIA DESIGNE COMO TAL).",0,'C');
			*/
			$this->Line(10,40,270,40);
			$this->SetY(42);
			#$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->br();

			$this->SetFillColor(190,190,190);
			#$this->Rect(170,36,45,12,"DF");
			$this->Rect(225,41,45,12);
			$this->setFont("Arial","B",9);
			$this->ln(-1);
			$this->cell(163,5,"Responsable: ".$this->responsable);
			$this->setFont("Arial","",7);
			$this->cell(54);
			#$this->cell(54,5,"Número Comprobante:");
			$this->cell(50,5,"Fecha:");
			$this->ln(11);
			$this->sqla="select nomemp from empresa where codemp='001'";
			$tba=$this->bd->select($this->sqla);
			$this->setFont("Arial","B",8);
			$this->cell(95,5,strtoupper($tba->fields["nomemp"]));
			$this->setFont("Arial","B",8);
			$this->cell(50,5,"Datos del Agente de Retención");
			$this->ln();
			$this->Rect(10,$this->GetY(),100,8);
			$this->Rect(120,$this->GetY(),85,8);
			$this->Rect(210,$this->GetY(),60,13);
			$this->Rect(10,$this->GetY()+10,195,11);
			#$this->ln(1);
			$this->cell(1,5,"");
			$this->cell(110,5,"Nombre:");
			$this->cell(150,5,"No. R.I.F.:");
			$this->ln(1);
			$this->cell(218,5,"");
			$this->cell(20,5,"Periodo Fiscal");
			$this->ln(6);
			$this->cell(203,5,"");
			$this->cell(33,5,"Año:");
			$this->cell(20,5,"Mes:");
			$this->ln(6);
			$this->cell(1,5,"");
			$this->cell(110,5,"Dirección:");
			$this->ln(10);
			$this->cell(99,5,"");
			$this->cell(50,5,"Datos del Contribuyente");
			$this->Rect(10,$this->GetY()+5,100,15);
			$this->Rect(120,$this->GetY()+5,85,15);
			$this->ln();
			$this->cell(2,5,"");
			$this->cell(110,5,"Nombre o Razón Social:");
			$this->cell(50,5,"RIF. del Sujeto Retenido:");
			$this->ln(17);
			//$this->Rect(195,$this->GetY(),45,5,"DF");
			$this->Rect(10,$this->GetY()+5,260,9,"DF");
			//vert
			$this->Line(35,$this->Gety()+5,35,$this->Gety()+14);
			$this->Line(70,$this->Gety()+5,70,$this->Gety()+14);
			$this->Line(100,$this->Gety()+5,100,$this->Gety()+14);
			$this->Line(130,$this->Gety()+5,130,$this->Gety()+14);
			$this->Line(180,$this->Gety()+5,180,$this->Gety()+14);
			$this->Line(225,$this->Gety()+5,225,$this->Gety()+14);
			$this->SetXY(10,$this->GetY()+7);
			$this->cell(25,4,'OPER.No',0,0,'C');
			$this->cell(35,4,'ORDEN DE PAGO No',0,0,'C');
			$this->cell(30,4,'FACTURA',0,0,'C');
			$this->cell(30,4,'No DE CONTROL',0,0,'C');
			$this->cell(50,4,'MONTO DE LA FACTURA',0,0,'C');
			#$this->cell(50,4,'MONTO DE LA ORDEN DE PAGO',0,0,'C');
			$this->cell(45	,4,'BASE IMPONIBLE',0,0,'C');
			#$this->cell(45	,4,'MONTO SUJETO A RENDICION',0,0,'C');
			$this->cell(45	,4,'MONTO RETENIDO',0,0,'C');
			$this->setFont("Arial","B",9);
			$this->ln(12);
		}
		function Cuerpo()
		{
		 $tb=$this->bd->select($this->sql);
		 $tb2=$this->bd->select($this->sql);
		 $this->SetWidths(array(25,35,30,30,50,45,45));
     	 $this->SetAligns(array("C","C","C","C","C","C","C"));
     	 $this->Setborder(array(true));

		 $totfac=0;
		 $exeiva=0;
		 $basimp=0;
		 $moniva=0;
		 $monret=0;
		 $cont=0;
		 if (!$tb2->EOF)
		 {
		 $ref=$tb2->fields["numord"];
		 $this->ln(-73);
		 $this->setFont("Arial","B",10);
		 $this->cell(163,5,"");
		 $this->cell(65);
		 #$this->cell(65,5,$this->ano."  -  ".$this->mes."  -  ".str_pad($this->corre,8,"0",STR_PAD_LEFT));
		 #$this->cell(20,5,$this->fechasys);
		 $this->cell(20,5,$this->fechaentrega);
		 $this->setFont("Arial","",8);
		 $this->ln(12);
		 $this->cell(15,5,"");
		 $this->cell(85,5,strtoupper($this->ag),0,0,'');
		 $this->cell(25,5,"",0,0,'');
		 $this->cell(85,5,strtoupper($this->rif),0,0,'');
		 $this->ln();
		 $this->cell(212,5,"");
		# $this->cell(34,5,$this->ano);
		 #$this->cell(30,5,$this->mes);
		 $este=explode("/",$this->fechaentrega);
		 $this->cell(34,3,$este[2]);
		 $this->cell(30,3,$este[1]);
		 $this->ln(6);
		 $this->cell(16,5,"");
		 $this->cell(115,5,strtoupper($this->dire));
		 $this->ln(20);
		 //$cont=0;
		 if ($this->ben=="")
		 {
			 	$this->ben=$tb2->fields["cedrif"]."?".$tb2->fields["nomben"];
		 }
		 if ($this->ben<>" ")
		 {
		 	$pos=strpos($this->ben,"?");
		 	$ben=substr($this->ben,$pos+1,strlen($this->ben));
		 	#$bennom=$tb2->fields["nomben"];
		 }

		$this->cell(5,5,"");
		$this->cell(95,5,strtoupper($ben),0,0,'');
		$this->cell(15,5,"");
		#$this->cell(85);//,5,strtoupper($ben),0,0,'');

		$pos=strpos($this->ben,"?");
		$tira=substr($this->ben,0,$pos);
		$this->cell(115,5,strtoupper($tira),0,0,'');}
		$this->ln(26.2);


		while (!$tb->EOF)
		{
			if ($tb->fields["numord"]!=$ref)
			{

				$this->setFont("Arial","B",9);
				$this->ln(0.5);
				$this->cell(103,5,"");
				$this->cell(15,5,"Totales");
				$this->ln(1.5);
				$this->ln(-1);
				$this->setFont("Arial","",6);
				$this->cell(120,5,"");
				$this->cell(50,5,number_format($totfac,2,'.',','),0,0,"R");
				$this->cell(45,5,number_format($exeiva,2,'.',','),0,0,"R");
				$this->cell(45,5,number_format($basimp,2,'.',','),0,0,"R");
				$totfac=0;
				$exeiva=0;
				$basimp=0;
				$moniva=0;
				$monret=0;
				$this->ln(250);
				$this->cell(5,5,"");
				$this->ln(-75);
				$this->setFont("Arial","B",10);
				$this->cell(163,5,"");
				 $this->cell(65);
				 #$this->cell(65,5,$this->ano."  -  ".$this->mes."  -  ".str_pad($this->correlativo,8,"0",STR_PAD_LEFT));
				 #$this->cell(20,5,$this->fechasys);
				 $this->cell(20,5,$this->fechaentrega);
				 $this->setFont("Arial","",8);
				 $this->ln(12);
				 $this->cell(15,5,"");
				 $this->cell(115,5,strtoupper($this->ag));
				 $this->cell(20,5,strtoupper($this->rif));
				 $this->ln();
				 $this->cell(212,5,"");
				 $this->cell(34,5,$this->ano);
				 $this->cell(30,5,$this->mes);
				 $this->ln(6);
				 $this->cell(16,5,"");
				 $this->cell(115,5,strtoupper($this->dire));
				 $this->ln(20);
				 if ($this->ben==NULL)
				 {
					 	$this->ben=" ";
				 }
				 if ($this->ben<>" ")
				 {
				 	$pos=strpos($this->ben,"?");
		 			$ben=substr($this->ben,$pos+1,strlen($this->ben));
		 			$bennom=$tb2->fields["nomben"];
				 }


				$this->cell(5,5,"");
				$this->cell(95,5,strtoupper($bennom),0,0,'');
				$this->cell(15,5,"");
				$this->cell(85,5,strtoupper($ben),0,0,'');


				$pos=strpos($this->ben,"?");
				$tira=substr($this->ben,0,$pos);
				$this->cell(115,5,strtoupper($tira));
				$this->ln(26.2);
			}
		//Detalle
		$this->ln(1);
		$this->setFont("Arial","",6);
		$ref=$tb->fields["numord"];
		$cont=$cont + 1;

		//print $cont;exit;
		$this->setFont("Arial","",6);
		$this->SetWidths(array(25,35,30,30,50,45,45));
     	$this->Setborder(true);
     	$this->SetAligns(array("C","C","C","C","C","C","C"));
    	$this->Row(array(number_format($cont),$tb->fields["numord"],$tb->fields["numfac"],$tb->fields["numctr"],H::FormatoMonto($tb->fields["totfac"]),H::FormatoMonto($tb->fields["basltf"]),H::FormatoMonto($tb->fields["monltf"])));
		$totfac=$totfac+$tb->fields["totfac"];
		$exeiva=$exeiva+$tb->fields["basltf"];
		$basimp=$basimp+$tb->fields["monltf"];
		//$this->ln();

		$tb->MoveNext();
		}

		$this->setFont("Arial","B",9);
		$this->ln(5);
		$this->cell(103,5,"");
		$this->cell(15,5,"Totales");
		$this->ln(1.5);
		$this->ln(-1);
		//$this->setFont("Arial","B",9);
		$this->cell(120,5,"");
		$this->cell(45,5,H::FormatoMonto($totfac),0,0,"R");
		$this->cell(45,5,H::FormatoMonto($exeiva),0,0,"R");
		$this->cell(45,5,H::FormatoMonto($basimp),0,0,"R");
		$this->ln();

		}
	}
?>
