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
			//$this->corr=$_POST["corr"];
			$this->corr='S';

				$this->co=trim(H::GetPost("co"));
			$this->responsable=$_POST["responsable"];
			$this->fechaentrega=$_POST["fechaentrega"];
			$this->ordecita=explode("?",$this->orde);
			$this->orde=$this->ordecita[0];
			$this->feccomp=trim(H::GetPost("feccomp"));
			$this->numcomp=trim(H::GetPost("numcomp"));


				$this->sql="select a.numord,to_char(b.fecemi,'dd/mm/yyyy') as fecemi, b.cedrif,b.nomben,c.nitben, c.dirben, c.telben,to_char(a.fecfac,'dd/mm/yyyy') as fecfac, a.numfac,
							a.numctr,a.tiptra,a.facafe,
							a.totfac,a.exeiva,a.basimp,a.poriva,a.moniva,a.monret, d.numche
							from opfactur a,opordpag b join opbenefi c on b.cedrif=c.cedrif
							left outer join tscheemi d on (b.numche = d.numche)
							where
							a.numord='".$this->orde."' and
							a.numord=b.numord
							order by a.numord";
						//print '<pre>'; print $this->sql; exit;

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="";
				$this->titulos[1]="Cuenta";
				$this->titulos[2]="Uso";
				$this->titulos[3]="Saldo Anterior";
				$this->titulos[4]="Débitos";
				$this->titulos[5]="Créditos";
				$this->titulos[6]="Saldo Segun Libros";

		}

		function br()
		{
			if($this->feccomp=="")
		{
			$this->fechasys=date('d/m/Y');
			$this->ano=date('Y');
			$this->mes=date('m');
			$this->digent='vacio';
		}else
		{
			$this->digent='lleno';
			$aux=explode("/",$this->feccomp);
			$this->fechasys=$this->feccomp;
			$this->fechasys2=$this->feccomp;
			$this->ano=$aux[2];
			$this->mes=$aux[1];
			$this->sql44="update opordpag set feccomret=to_date('".$this->fechasys."','dd/mm/yyyy')	where numord='".$this->orde."'";
			$tb44=$this->bd->actualizar($this->sql44);
		}
		if($this->numcomp<>""){
			$this->sql45="update opordpag set comret='".$this->numcomp."'	where numord='".$this->orde."'";
			$tb44=$this->bd->actualizar($this->sql45);

		}

		$this->sql1="select comret,feccomret, to_char(feccomret,'dd/mm/yyyy') as feccomretc, to_char(feccomret,'mm') as mes,to_char(feccomret,'yyyy') as ano
					from opordpag where numord='".$this->orde."'";
		$tb1=$this->bd->select($this->sql1);
		//print $this->sql1;
		if ($tb1->fields["comret"]==NULL)
		{
			$comret=" ";
		}
		else
		{
			$comret=$tb1->fields["comret"];
			$this->ano=$tb1->fields["ano"];
			$this->mes=$tb1->fields["mes"];
		}
		$feccomret=$tb1->fields["feccomret"];
		$feccomretc=$tb1->fields["feccomretc"];
		//---------------------

		if ($this->ben=="")
		{
			$this->benalt=" ";
		}
		else
		{
			$this->benalt=$this->ben;
		}
		if ($this->benalt<>" ")
		{

		$this->sql2="update opfactur set rifalt='".$this->benalt."'
					   where numord='".$this->orde."'";
		$this->bd->actualizar($this->sql2);
		}
		//----GENERAR CORRELATIVO
		if (strtoupper($this->corr)=="N")//NO
		{

			if ($comret==" " and $this->co=="")
			{
			$this->sql3="select nextval('correlativo_iva') as correlativo";
			$tb3=$this->bd->select($this->sql3);
			$this->correlativo=$tb3->fields["correlativo"];
			$this->sql4="update opordpag set comret='".$this->correlativo."', feccomret=to_date('".$this->fechasys."','dd/mm/yyyy')
						where numord='".$this->orde."'";
			$tb4=$this->bd->actualizar($this->sql4);
			}
			elseif ($this->co!="")
			{
			$this->correlativo=$this->co;
			$this->sql4="update opordpag set comret='".$this->co."', feccomret=to_date('".$this->fechasys."','dd/mm/yyyy')
						where numord='".$this->orde."'";
			$tb4=$this->bd->actualizar($this->sql4);
			}
			elseif ($comret!=" ")
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

		}
		else
		{
		//SI
			if ($this->co!="")
			{
				$this->correlativo=$this->co;
				$this->sql4="update opordpag set comret='".$this->co."', feccomret=to_date('".$this->fechasys."','dd/mm/yyyy')
							where numord='".$this->orde."'";
				$tb4=$this->bd->actualizar($this->sql4);
			}
			elseif ($comret!=" ")
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
			else
			{
				$this->sql3="select nextval('correlativo_iva') as correlativo";
				$tb3=$this->bd->select($this->sql3);
				$this->correlativo=$tb3->fields["correlativo"];

				$this->sql4="update opordpag set comret='".$this->correlativo."', feccomret=to_date('".$this->fechasys."','dd/mm/yyyy')
							where numord='".$this->orde."'";
				$this->bd->actualizar($this->sql4);
			}
		}

		}

		function Footer()
		{
			$this->SetFont("Arial","B",9);
			$this->SetXY(15,180);
			$this->Line(15,$this->GetY(),115,$this->GetY());
			$this->MultiCell(100,5,$_POST["responsable"]."\nFirma y Sello \nAgente de Retención",0,'C');
			$this->SetXY(210-20,180);
			$this->cell(100,5,"Recibido por: _______________________________",0,'C');
			$this->ln();
			$this->SetX(227-20);
			$this->cell(100,5,"C.I: _______________________________",0,'C');
			$this->ln();
			$this->SetX(215-20);
			$this->cell(100,5,"        Fecha: _______________________________",0,'C');
			$this->ln();
			$this->SetX(215-20);
			$this->cell(100,5,"        Firma: _______________________________",0,'C');
		    $this->SetY(205);
		    $this->SetFont("Arial","",6);
			$this->cell(250,5,"ORIGINAL: PARA PROVEEDOR."."\n  COPIA: SOPORTE CONTABLE/ARCHIVO",0,0,'C');
		}

		function Header()
		{
			$this->SetFont("Arial","B",7);
			$this->Image("../../img/logotesoreria.jpg",10,10,40);
			$this->SetXY(50,10);
			$this->Cell(10,3,'REPUBLICA BOLIVARIANA DE VENEZUELA');
			$this->ln();
			$this->SetX(50);
			$this->Cell(10,3,'MINISTERIO DEL PODER POPULAR PARA LA ALIMENTACION');
			$this->ln();
			$this->SetX(50);
			$this->Cell(10,3,'');
			$this->ln();
			$this->SetX(50);
			$this->Cell(10,3,'GERENCIA DE ADMINISTRACIÓN Y FINANZAS');

			$this->SetY(35);
			$this->Cell(40);
			$this->SetFont("Arial","B",12);
			$this->MultiCell(0,3,"COMPROBANTE DE RETENCION DEL IMPUESTO AL VALOR AGREGADO",0,'C');

			$this->Line(10,40,270,40);
			$this->SetY(42);
			#$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->br();

			$this->SetFillColor(190,190,190);
			$this->Rect(170,41,45,12,"DF");
			$this->Rect(225,41,45,12);

			$this->Rect(225,73,45,12);
#			$this->Rect(225,88,45,12);
			$this->setFont("Arial","B",9);
			$this->ln(-1);
			//$this->cell(163,5,"Responsable: ".$this->responsable);
			$this->cell(163,5,'');
			$this->setFont("Arial","",7);
			$this->cell(54,5,"Número Comprobante:");
			$this->cell(50,5,"Fecha de Retención:");
			$puntoy=$this->GetY();
			$this->SetXY(226,73);
			$this->Cell(50,5,"Fecha de Emisión");
			$this->SetXY(226,88);
		//	$this->Cell(50,5,"Fecha de Entrega");
			$this->SetY($puntoy);
			$this->ln(11);
			$this->sqla="select nomemp from empresa where codemp='001'";
			$tba=$this->bd->select($this->sqla);
			$this->setFont("Arial","B",8);
			$this->cell(95,5,"");
			$this->setFont("Arial","B",9);
			$this->cell(50,5,"Datos del Agente de Retención");
			$this->ln();
			$this->Rect(10,$this->GetY(),100,8);
			$this->Rect(120,$this->GetY(),85,8);
			$this->Rect(210,$this->GetY(),60,13);
			$this->Rect(10,$this->GetY()+10,195,11);
			$this->ln(1);
			$this->cell(1,5,"");
			$this->cell(110,5,"Nombre:");
			$this->cell(45,5,"R.I.F.:");
			$this->cell(45,5,"N.I.F.:");
			$this->ln(-1);
			$this->cell(218,5,"");
			$this->cell(20,5,"Período Fiscal");
			$this->ln(6);
			$this->cell(203,5,"");
			$this->cell(33,5,"Año:");
			$this->cell(20,5,"Mes:");
			$this->ln(6);
			$this->cell(1,5,"");
			$this->cell(115,5,"Dirección:");
			$this->cell(60,5,"Télefono:");
			$this->ln(10);
			$this->cell(99,5,"");
			$this->setFont("Arial","B",9);
			$this->cell(50,5,"Datos del Contribuyente");
			$this->Rect(10,$this->GetY()+5,100,15);
			$this->Rect(120,$this->GetY()+5,85,15);
			$this->Rect(210,$this->GetY()+7,60,14);
	//		$this->ln();
		//	$this->Rect(10,$this->GetY()+10,195,11);

			$this->ln();

			$this->cell(2,5,"");
			$this->cell(110,5,"Nombre o Razón Social:");
			$this->cell(55,5,"RIF. del Sujeto Retenido");
			$this->cell(50,5,"NIF.");

			$this->ln(2);
			$this->setX(210);
			$this->cell(55,5,"Dirección: ");
			$this->ln(10);
			$this->setX(210);
	//	$this->cell(55,5,"Télefono: ");


			$this->ln(7);
			$this->setx(120);
			$this->setFont("Arial","B",9);
			$this->cell(55,5,"Datos de la Factura");

		//	$this->Rect(145,$this->GetY(),70,5,"DF");
			$this->Rect(10,$this->GetY()+5,260,9,"DF");
			//vert
			$this->Line(27,$this->Gety()+5,27,$this->Gety()+14);
			$this->Line(45,$this->Gety()+5,45,$this->Gety()+14);
			$this->Line(61,$this->Gety()+5,61,$this->Gety()+14);
			$this->Line(75,$this->Gety()+5,75,$this->Gety()+14);
			$this->Line(89,$this->Gety()+5,89,$this->Gety()+14);
			$this->Line(103,$this->Gety()+5,103,$this->Gety()+14);
			$this->Line(117,$this->Gety()+5,117,$this->Gety()+14);
			$this->Line(138,$this->Gety()+5,138,$this->Gety()+14);
			$this->Line(160,$this->Gety()+5,160,$this->Gety()+14);
			$this->Line(181,$this->Gety()+5,181,$this->Gety()+14);
			$this->Line(205,$this->Gety()+5,205,$this->Gety()+14);
			$this->Line(216,$this->Gety()+5,216,$this->Gety()+14);
			$this->Line(243,$this->Gety()+5,243,$this->Gety()+14);
			//----
		//	$this->cell(20,5,"");
			//$this->cell(50,5,"Compras Internas o Importaciones");
			$this->ln();
			$this->setFont("Arial","",7);
			//$this->cell(1,5,"");
			$this->cell(17,5,"Fecha de",0,0,'C');
			$this->cell(17,5,"Número de",0,0,'C');
		//	$this->cell(13,5,"Tipo de",0,0,'C');
			$this->cell(16,5,"Fecha de",0,0,'C');
			$this->cell(14,5,"Número de",0,0,'C');
			$this->cell(14,5,"N° Control",0,0,'C');
		$this->cell(14,5,"Nota",0,0,"C");
		$this->cell(14,5,"Nota",0,0,"C");
			$this->cell(21,5,"Total",0,0,'C');
			$this->cell(22,5,"Total Compras",0,0,'C');
			$this->cell(21,5,"Compras",0,0,'C');//29
			$this->cell(24,5,"Base",0,0,'C');//30
			$this->cell(11,5,"%",0,0,'C');
			$this->cell(27,5,"Impuesto",0,0,'C');
			$this->cell(28,5,"IVA",0,0,'C');
			$this->ln(3);
			$this->cell(2,5,"");
			$this->cell(17,5,"Orden/Pago");
			$this->cell(17,5,"Orden/Pago");
		//	$this->cell(15,5,"transac.");
			$this->cell(15,5,"Factura");
			$this->cell(13,5,"Factura");
			$this->cell(15,5,"Factura");
				$this->cell(14,5,"Debito",0,0,"C");
		$this->cell(14,5,"Credito",0,0,"C");
			$this->cell(20,5,"   Facturado");
			$this->cell(23,5,"    con  IVA");
			$this->cell(25,5,"Exentas de IVA");//32
			$this->cell(21,5,"Imponible");//25
			$this->cell(18,5,"Alic.");
			$this->cell(25,5,"   IVA");
			$this->cell(25,5,"  Retenido");
			$this->setFont("Arial","B",9);
			$this->ln(3);
		}

		function Cuerpo()
		{
		 $tb=$this->bd->select($this->sql);
		 $tb2=$tb;

		 $totfac=0;
		 $exeiva=0;
		 $basimp=0;
		 $moniva=0;
		 $monret=0;
		 $monconiva=0;
		 $partY=114;

		 if (!$tb2->EOF)
		 {
		 $ref=$tb2->fields["numord"];
		 $this->ln(-67);
		 $this->setFont("Arial","B",10);
		 $this->cell(163,5,"");
#		 $this->cell(65,5,$this->ano."  -  ".$_POST["co"]);
		 $this->cell(65,5,$this->ano."  -  ".$this->mes."  -  ".str_pad($this->correlativo,9,"0",STR_PAD_LEFT));
		 //$this->cell(20,5,$_POST["fechaentrega"]);fecha de retencion
		 $this->cell(20,5,$tb2->fields["fecemi"]);
		 #$this->cell(20,5,$tb2->fields["fecret"]);

			$puntoy=$this->GetY();
			$this->SetXY(226,79);
			$this->Cell(45,5,$this->fechasys,0,0,'C');
			#$this->SetXY(226,94);
		    //$this->Cell(45,5,$_POST["fechaentrega"],0,0,'C');
			$this->SetY($puntoy);

		 $this->setFont("Arial","",8);
		 $this->ln(12);
		 $this->cell(15,5,"");
		// $this->cell(115,5,strtoupper($this->ag));
		 $this->cell(115,5,'LOGÍSTICA CASA S.A. (LOGICASA S.A.)');
		 //$this->cell(20,5,strtoupper($this->rif));
		 $this->cell(40,5,'G20008732-3');//RIF
		 $this->cell(20,5,'');//0180305866
		 $this->ln();
		 $this->cell(212,5,"");
		 $this->cell(34,5,$this->ano);
		 $this->cell(30,5,$this->mes);
		 $this->ln(6);
		 $this->cell(18);
		 $x=$this->getX();
		 $y=$this->getY();
		 $this->setx(28);
		 $this->multicell(95,3,'AV. CARLOS SOUBLETTE, SECTOR CABO BLANCO, ENTRADA A LA ADUANA AEREA DE LA GUAIRA');
		 $this->SetXY(145,$y);
		 	 $this->cell(115,5,'0212-3311860');//TLF
		  //$this->cell(115,5,strtoupper($this->dire));
		 $this->ln(20);
		 if ($this->benalt<>" ")
		 {
		 	$pos=strpos($this->ben,"?");
		 	$ben=substr($this->benalt,$pos+1,strlen($this->benalt));
			$tira=substr($this->ben,0,$pos);
			$this->sqlben="select c.nitben, c.dirben, c.telben  from opbenefi c where c.cedrif='".$tira."'";
			$tbben=$this->bd->select($this->sqlben);

		   	 $nit=$tbben->fields["nitben"];
			 $dir=$tbben->fields["dirben"];
			 $tel=$tbben->fields["telben"];
		 }
		 else
		 {
			 $ben=$tb2->fields["nomben"];
			 $tira=$tb2->fields["cedrif"];
			 $nit=$tb2->fields["nitben"];
			 $dir=$tb2->fields["dirben"];
			 $tel=$tb2->fields["telben"];
		 }
		$this->cell(5,5,"");
		$this->cell(119,5,strtoupper($ben));
		$this->cell(50,5,strtoupper($tira));
		$this->cell(50,5,strtoupper($nit));

		$this->setX(210);
		 $this->setFont("Arial","",7);
		$this->multicell(60,3,$dir.' Tlf: '.$tel);
		 $this->setFont("Arial","",8);


		$this->ln(20);
		}
        $numope=1;
		while (!$tb->EOF)
		{
			if ($tb->fields["numord"]!=$ref)
			{
				$this->setFont("Arial","B",9);
				$this->ln(0.5);
				$this->cell(103,5,"");
				$this->cell(15,5,"Totales");
				$this->ln(1);
				$this->cell(24,5,number_format($totfac,2,'.',','),0,0,"R");
				$this->cell(27,5,number_format($exeiva,2,'.',','),0,0,"R");
				$this->cell(28,5,number_format($basimp,2,'.',','),0,0,"R");
				$this->cell(11,5,"");
				$this->cell(26,5,number_format($moniva,2,'.',','),0,0,"R");
				$this->cell(25,5,number_format($monret,2,'.',','),0,0,"R");

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
				 #$this->cell(65,5,$this->ano."  -  ".$_POST["co"]);
				// $this->cell(65,5,$this->ano."  -  ".$this->mes."  -  ".str_pad($this->correlativo,8,"0",STR_PAD_LEFT));
				 $this->cell(20,5,$_POST["fechaentrega"]);
				 #$this->cell(20,5,$tb->fields["fecret"]);

				$puntoy=$this->GetY();
				$this->SetXY(226,79);
				$this->Cell(45,5,$this->fechasys,0,0,'C');
				#$this->SetXY(226,94);
				#$this->Cell(45,5,$_POST["fechaentrega"],0,0,'C');
				$this->SetY($puntoy);

				 $this->setFont("Arial","",8);
				 $this->ln(12);
				 $this->cell(15,5,"");
				 $this->cell(115,5,'');
				 $this->cell(20,5,strtoupper($this->rif));
				 $this->ln();
				 $this->cell(212,5,"");
				 $this->cell(34,5,$this->ano);
				 $this->cell(30,5,$this->mes);
				 $this->ln(6);
				 $this->cell(18);
				 $this->cell(115,5,strtoupper($this->dire));
				 $this->ln(20);
				 if ($this->benalt<>" ")
		 {
		 	$pos=strpos($this->ben,"?");
		 	$ben=substr($this->benalt,$pos+1,strlen($this->benalt));
			$tira=substr($this->ben,0,$pos);
			$this->sqlben="select c.nitben, c.dirben, c.telben  from opbenefi c where c.cedrif='".$tira."'";
			$tbben=$this->bd->select($this->sqlben);

		   	 $nit=$tbben->fields["nitben"];
			 $dir=$tbben->fields["dirben"];
			 $tel=$tbben->fields["telben"];
		 }
		 else
		 {
			 $ben=$tb2->fields["nomben"];
			 $tira=$tb2->fields["cedrif"];
			 $nit=$tb2->fields["nitben"];
			 $dir=$tb2->fields["dirben"];
			 $tel=$tb2->fields["telben"];
		 }
		$this->cell(5,5,"");
		$this->cell(119,5,strtoupper($ben));
		$this->cell(50,5,strtoupper($tira));
		$this->cell(50,5,strtoupper($nit));
		$this->setX(210);
		$this->setFont("Arial","",6);
		$this->multicell(55,2,$dir.' Tlf: '.$tel);
				$this->ln(26.2);
			}
		//Detalle
		$this->setFont("Arial","",6);
		$ref=$tb->fields["numord"];
        //$this->setX(10);
        $this->setXY(8,$partY);

        /* $this->SetWidths(array(35,40,20,20,25,25,25));
	 $this->SetBorder(true);
	 $this->Setaligns(array('C','C','C','C','C','C','C'));
	 $this->Row(array("Activo","Mueble","Fecha Compra","Fecha Depreciación","Valor Depreciación","Depreciación Acumulada","Valor Segun Libros"));
	*/
$this->ln(4);
         $this->cell(17,5,$tb->fields["fecemi"],1,0,"C");
        //$this->cell(20,5,$numope,0,0,"C");
        $this->cell(18,5,$tb->fields["numord"],1,0,"C");
      //  $this->cell(13,5,$tb->fields["tiptra"],1,0,"C");
		$this->cell(16,5,$tb->fields["fecfac"],1,0,"C");
		$this->cell(14,5,$tb->fields["numfac"],1,0,"C");
		$this->cell(14,5,$tb->fields["numctr"],1,0,"C");
		//nota de debito / credito
		$this->cell(14,5,"",1,0,"C");//nota debito
		$this->cell(14,5,"",1,0,"C");//nota credito
		//
		$this->cell(21,5,number_format($tb->fields["totfac"],2,'.',','),1,0,"R");//21
		$totfac=$totfac+$tb->fields["totfac"];
		$this->cell(22,5,"0.00",1,0,"R");
		$monconiva=$monconiva+0;
		$this->cell(21,5,number_format($tb->fields["exeiva"],2,'.',','),1,0,"R");//29
		$exeiva=$exeiva+$tb->fields["exeiva"];
		$this->cell(24,5,number_format($tb->fields["basimp"],2,'.',','),1,0,"R");//30
		$basimp=$basimp+$tb->fields["basimp"];
		$this->cell(11,5,number_format($tb->fields["poriva"],0),1,0,"C");
		$this->cell(27,5,number_format($tb->fields["monret"],2,'.',','),1,0,"R");		$moniva=$moniva+$tb->fields["moniva"];
		$this->cell(27,5,number_format($tb->fields["moniva"],2,'.',','),1,0,"R");
		$monret=$monret+$tb->fields["monret"];

		$this->ln();
		$numope++;$partY+=5;
		$tb->MoveNext();
		}
		$this->setFont("Arial","B",9);
		$this->ln(0.8);
		$this->cell(50,5,"");
		$this->cell(15,5,"Total Neto a Pagar");
		$this->ln(1.5);
		$this->ln(-1);
		$this->setFont("Arial","",6);
		$this->cell(83+15+9,5,"");
		$this->cell(21,5,number_format($totfac,2,'.',','),1,0,"R");
		$this->cell(22,5,number_format($monconiva,2,'.',','),1,0,"R");
		$this->cell(21,5,number_format($exeiva,2,'.',','),1,0,"R");//29
		$this->cell(24,5,number_format($basimp,2,'.',','),1,0,"R");//30
		$this->cell(12,5,"");
		$this->cell(26,5,number_format($monret,2,'.',','),1,0,"R");
		$this->setFont("Arial","B",12);
		 $this->SetFillColor(195,195,195);
		$this->cell(27,5,number_format($moniva,2,'.',','),1,0,"R");
		$this->setFont("Arial","",6);
		}

	}
?>
