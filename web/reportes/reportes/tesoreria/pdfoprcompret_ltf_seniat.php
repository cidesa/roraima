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

/*function trun($numero,$decimales)
{
$exp=pow(10, $decimales);
$n=floor($numero*$exp);
return $n/$exp;
}*/

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
			$this->responsable=$_POST["responsable"];
			$this->fechaentrega=$_POST["fechaentrega"];
			$this->feccomp=trim(H::GetPost("feccomp"));
			$this->numcomp=trim(H::GetPost("numcomp"));
			$this->corr=H::GetPost("corr");
			$this->actcor=H::GetPost("actcor");
				$this->cont=$_POST["cont"];
			$this->diradm=$_POST["diradm"];

				$this->sql="select a.numord,b.cedrif,b.nomben,to_char(b.fecemi,'dd/mm/yyyy') as fecemi,to_char(a.fecfac,'dd/mm/yyyy') as fecfac,a.numfac,
							a.numctr,a.tiptra,a.facafe,b.monord,
							a.totfac,a.exeiva,a.basltf,a.porltf,a.basimp,a.monltf, b.numche, to_char(c.feclib,'dd/mm/yyyy') as feclib
	                        from opfactur a,opordpag b left outer join tsmovlib c on b.numche=c.reflib
							where
							a.numord='".$this->orde."' and
							a.numord=b.numord
							order by a.numord";
						//	print '<pre>'; print $this->sql; exit;

			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,50);
            $this->tb=$this->bd->select($this->sql);

		}


function br()
		{

		if(empty($this->feccomp))
		{
			$this->fechasys=date('d/m/Y');
			$this->ano=date('Y');
			$this->mes=date('m');
		}else
		{
			$aux=split("/",$this->feccomp);
			$this->fechasys=$this->feccomp;
			$this->ano=$aux[2];
			$this->mes=$aux[1];
		}

//-----------------------------------------------------------------------------------------------------------------------//
		$this->sql1="select comretltf,feccomretltf, to_char(feccomretltf,'dd/mm/yyyy') as feccomretc from opordpag where numord='".$this->orde."'";
		$tb1=$this->bd->select($this->sql1);
		if ($tb1->fields["comretltf"]==NULL)
		{$comret=" ";}
		else
		{$comret=$tb1->fields["comretltf"];}
		$feccomret=$tb1->fields["feccomretltf"];
		$feccomretc=$tb1->fields["feccomretc"];
	//----GENERAR CORRELATIVO
		if (strtoupper($this->corr)=="N")//NO
		{
			if ($comret==" ")
			{
			if(empty($this->numcomp))
			{
				$this->sql3="select nextval('correlativo_ltf') as correlativo";
				$tb3=$this->bd->select($this->sql3);
				$this->correlativo=$tb3->fields["correlativo"];
			}
			else
				$this->correlativo=$this->numcomp;

			$this->sql4="update opordpag set comretltf='".$this->correlativo."', feccomretltf=to_date('".$this->fechasys."','dd/mm/yyyy')
						where numord='".$this->orde."'";// print $this->sql4; exit;
						$this->actualizo=true;

			$tb4=$this->bd->actualizar($this->sql4);
			}
			else
			{
				if(empty($this->numcomp))
				{
					$this->correlativo=$comret;
				}
				else
					$this->correlativo=$this->numcomp;

				if(empty($this->feccomp))
				{
					if ($feccomretc==NULL)
					{
						$feccomretc=" ";
					}
					if ($feccomretc<>" ")
					{
						$this->fechasys=$feccomretc;
						$aux=split("/",$this->fechasys);
						$this->ano=$aux[2];
						$this->mes=$aux[1];
					}
				}
				$this->sql4="update opordpag set comretltf='".$this->correlativo."', feccomretltf=to_date('".$this->fechasys."','dd/mm/yyyy')
						where numord='".$this->orde."'";// print $this->sql4; exit;
						$this->actualizo=true;

				$tb4=$this->bd->actualizar($this->sql4);
			}
		}
		else
		{
		//SI
			if(empty($this->numcomp))
			{
				$this->sql3="select nextval('correlativo_ltf') as correlativo";
				$tb3=$this->bd->select($this->sql3);
				$this->correlativo=$tb3->fields["correlativo"];
			}
			else
				$this->correlativo=$this->numcomp;



			$this->sql4="update opordpag set comretltf='".$this->correlativo."', feccomretltf=to_date('".$this->fechasys."','dd/mm/yyyy')
						where numord='".$this->orde."'";
						$this->actualizo=true;
			$this->bd->actualizar($this->sql4);
		}
		$numcom=intval($this->numcomp)+1;
		if(strtoupper($this->actcor)=='S')
		{
			$this->bd->actualizar("ALTER SEQUENCE correlativo_ltf
				    INCREMENT 1  MINVALUE 0
				    MAXVALUE 9999999999999999  RESTART $numcom
				    CACHE 1  NO CYCLE;
				    COMMIT;");
		}

		}

		function Footer()
		{
			$this->SetFont("Arial","B",9);
			$this->SetXY(15,180);
		$this->setFont("Arial","B",8);
		$this->Rect(15,180,50,15);
		$this->setxy(20,190);
		$this->cell(25,5,"Firma y Sello del Beneficiario");
		$this->setxy(85,187);
		$this->cell(25,5,$this->cont);
		$this->setxy(90,190);
	$this->cell(25,5,"Contralor  ");
		$this->line(75,187,120,187);
		$this->setxy(130,190);
		$this->cell(25,5,"Director de Administración y Finanzas");
		$this->line(130,187,180,187);
		$this->setxy(135,187);
		$this->cell(25,5,$this->diradm);
              $this->setxy(266,185);
              $this->setFont("Arial","B",6);
              $this->cell(5,25,"EA / RR / LVF / LVR / FT / LR",0,0,'R');


		}

		function Header()
		{
			$this->br();
			$this->Image("../../img/logo_1.jpg",10,8,35);
			$this->setFont("Arial","B",9);
			$this->cell(250,5,"COMPROBANTE DE RETENCION DEL TIMBRE FISCAL",0,0,'C');

			$this->ln();
			$this->cell(70,3,"");
                     $this->cell(110,3,"DEL DISTRITO METROPOLITANO",0,0,'C');
			$this->setFont("Arial","",7);
			//$this->multicell(120,3,"(Ley IVA - Art. 11: Serán responsables del pago del impuesto en calidad de agentes de retención, los compradores o adquirientes de determinados bienes muebles y los receptores de ciertos servicios, a quienes la Administración Tributaria designe como tal.)",0,'C',0);
			$this->ln(5);
			$this->Line(10,40,270,40);
			$this->SetY(42);
			#$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->br();

			$this->SetFillColor(190,190,190);
				$this->Rect(170,41,45,12,"DF");;
			$this->Rect(225,41,45,12);
			$this->setFont("Arial","B",9);
			$this->ln(-1);
			//$this->cell(163,5,"Responsable: ".$this->responsable);
			$this->cell(163,5,"");
			$this->setFont("Arial","",7);
		//	$this->cell(54);
			$this->cell(54,5,"Número Comprobante:");
			$this->cell(50,5,"Fecha:");
			$this->ln(11);
			$this->sqla="select nomemp from empresa where codemp='001'";
			$tba=$this->bd->select($this->sqla);
			$this->setFont("Arial","B",8);
		//	$this->cell(95,5,strtoupper($tba->fields["nomemp"]));
			$this->cell(95,5,"");
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
			$this->Rect(10,$this->GetY()+5,260,8,"DF");
			//vert
			/*$this->Line(35,$this->Gety()+5,35,$this->Gety()+14);
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
			$this->cell(45	,4,'MONTO RETENIDO',0,0,'C');*/

		$this->SetWidths(array(17,27,27,27,27,27,27,27,27,27));
     	$this->Setborder(true);
     	$this->SetAligns(array("C","C","C","C","C","C","C","C","C","C"));
     		$this->ln();
    	$this->Row(array("OPER.No","Fecha Orden/Pago","Número Orden/Pago","Fecha de Factura","Factura","Nro. de Control","Monto de la Factura","Base Imponible","Alicuota %","Monto Retenido"));


			$this->setFont("Arial","B",9);
			$this->ln(12);
					 $this->ln(-80);
		 $this->setFont("Arial","B",10);
		 $this->cell(163,5,"");
	//	 $this->cell(65);
		 $this->cell(65,5,$this->ano."  -  ".$this->mes."  -  ".str_pad($this->correlativo,8,"0",STR_PAD_LEFT));
		$this->cell(20,5,$this->fechasys);
		// $this->cell(20,5,$this->fechaentrega);
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
		 $this->cell(34,3,$this->ano);
		 $this->cell(30,3,$this->mes);
		 $this->ln(6);
		 $this->cell(16,5,"");
		 $this->cell(115,5,strtoupper($this->dire));
		$this->ln(20);
			if ($ben=$this->tb->fields["nomben"]==null)
			{
			$ben=$this->benalt;
			$pos=strpos($this->ben,"?");
			$tira=substr($this->ben,0,$pos);
			}
			elseif($this->ben!="")
			{
			$ben=$this->benalt;
			$pos=strpos($this->ben,"?");
			$tira=substr($this->ben,0,$pos);
			}
			else
			{
			$ben=$this->tb->fields["nomben"];
			$tira=$this->tb->fields["cedrif"];
			}
			$this->cell(5,5,"");
			$this->cell(119);
			$this->cell(115,5,strtoupper($tira));
			$this->setX(15);
			$this->multicell(95,3,strtoupper($ben));
			$this->ln(22);
		}
		function Cuerpo()
		{
		 $tb2=$this->tb;
		 $this->SetWidths(array(25,35,30,30,50,45,45));
     	 $this->SetAligns(array("C","C","C","C","C","C","C"));
     	 $this->Setborder(array(true));

		 $totfac=0;
		 $exeiva=0;
		 $basimp=0;
		 $moniva=0;
		 $monret=0;
		 $cont=0;

		 $ref=$tb2->fields["numord"];



		while (!$this->tb->EOF)
		{
			if ($this->tb->fields["numord"]!=$ref)///	NO ESTA HACIENDO UN COÑO
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
			//	$this->cell(163,5,"");
				// $this->cell(65);
				// $this->cell(65,5,$this->ano."  -  ".$this->mes."  -  ".str_pad($this->correlativo,8,"0",STR_PAD_LEFT));
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
		$this->setFont("Arial","",6);
		$ref=$this->tb->fields["numord"];
		$cont=$cont + 1;

		//print $cont;exit;
		$this->setFont("Arial","",6);
		$this->SetWidths(array(17,27,27,27,27,27,27,27,27,27));
     	$this->Setborder(true);
     	$this->SetAligns(array("C","C","C","C","C","C","R","R","R","R"));
     	$cal=$this->tb->fields["basimp"]*($this->tb->fields["porltf"]/100);

//Forma para truncar
// primero localizamos la posicion del . en el monto

$posicion = strrpos($cal, ".");

//luego truncamos la cantidad para que no se redondee

//$cal2=substr($cal,0,$posicion+3);
    	$this->Row(array(number_format($cont),$this->tb->fields["fecemi"],$this->tb->fields["numord"],$this->tb->fields["fecfac"],$this->tb->fields["numfac"],$this->tb->fields["numctr"],H::FormatoMonto($this->tb->fields["totfac"]),H::FormatoMonto($this->tb->fields["basltf"]),H::FormatoMonto($this->tb->fields["porltf"]),$this->tb->fields["monltf"]));
		$totfac=$totfac+$this->tb->fields["totfac"];
		$exeiva=$exeiva+$this->tb->fields["basltf"];
		$porltf=$porltf+$this->tb->fields["porltf"];
		$basimp=$basimp+$this->tb->fields["totfac"];
		$monltf+=$this->tb->fields["monltf"];
		//$this->ln();

		$this->tb->MoveNext();
		}

		$this->setFont("Arial","B",9);
		$this->ln(5);
		$this->cell(135,5,"");
		$this->cell(15,5,"Totales...");
		$this->ln(1.5);
		$this->ln(-1);
		//$this->setFont("Arial","B",9);
		$this->cell(152,5,"");
		$this->cell(27,5,H::FormatoMonto($totfac),0,0,"R");
		$this->cell(27,5,H::FormatoMonto($exeiva),0,0,"R");
		$this->cell(27,5,"",0,0,"R");
		$this->cell(27,5,H::FormatoMonto($monltf),0,0,"R");
		$this->ln();

		}
	}
?>
