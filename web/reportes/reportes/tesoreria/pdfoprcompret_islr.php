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
			$this->corr=$_POST["corr"];
            $this->corre=$_POST["corre"];
			$this->sql="select a.numord,b.cedrif,b.nomben,b.fecemi,to_char(a.fecfac,'dd/mm/yyyy') as fecfac,c.numche as numche,to_char(d.fecemi,'dd/mm/yyyy') as feche,a.numfac,
						a.numctr,a.tiptra,a.facafe,
						a.totfac,a.exeiva,a.basislr,a.porislr,a.monislr
						from opfactur a,opordpag b, opordche c, tscheemi d
						where
						a.numord='".$this->orde."' and
						a.numord=b.numord and a.numord=c.numord and c.numche=d.numche
						order by a.numord";

					//	print '<pre>'; print $this->sql; exit;

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="";
				$this->titulos[1]="Cuenta";
				$this->titulos[2]="Uso";
				$this->titulos[3]="Saldo Anterior";
				$this->titulos[4]="Debitos";
				$this->titulos[5]="Creditos";
				$this->titulos[6]="Saldo Segun Libros";

		}

		function br()
		{
			$this->fechasys=date('d/m/Y');
			$this->ano=date('Y');
			$this->mes=date('m');
		//---------------------
		$this->sql1="select comretislr,feccomretislr, to_char(feccomretislr,'dd/mm/yyyy') as feccomretc
					from opordpag where numord='".$this->orde."'";
		$tb1=$this->bd->select($this->sql1);
		if ($tb1->fields["comretislr"]==NULL)
		{
			$comret=" ";
		}
		else
		{
			$comret=$tb1->fields["comretislr"];
		}
		$feccomret=$tb1->fields["feccomretislr"];
		$feccomretc=$tb1->fields["feccomretc"];
		//---------------------

		if ($this->ben==NULL)
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
		else
		{
		$this->sql2="update opfactur set rifalt=''
					   where numord='".$this->orde."'";
		$this->bd->actualizar($this->sql2);
		}
		//----GENERAR CORRELATIVO
		if (strtoupper($this->corr)=="N")//NO
		{
			if ($comret==" ")
			{
			$this->sql3="select nextval('correlativo_islr') as correlativo";
			$tb3=$this->bd->select($this->sql3);
			$this->correlativo=$tb3->fields["correlativo"];
			$this->sql4="update opordpag set comretislr='".$this->correlativo."', feccomretislr=to_date('".$this->fechasys."','dd/mm/yyyy')
						where numord='".$this->orde."'";
			$tb4=$this->bd->actualizar($this->sql4);
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
		}
		else
		{
            $this->correlativo=$this->corre;
			$this->sql4="update opordpag set comretislr='".$this->correlativo."', feccomretislr=to_date('".$this->fechasys."','dd/mm/yyyy')
						where numord='".$this->orde."'";
			$this->bd->actualizar($this->sql4);
		}

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->br();

			$this->SetFillColor(190,190,190);
			$this->Rect(170,36,45,12,"DF");
			$this->Rect(225,36,45,12);
			$this->setFont("Arial","",7);
			$this->ln(-1);
			$this->cell(163,5,"");
			$this->cell(54,5,"Numero Comprobante:");
			$this->cell(50,5,"Fecha:");
            $this->ln(1);
			$this->setFont("Arial","B",8);
			$this->MultiCell(135,5,"Reglamento Parcial de la ley de Impuesto Sobre la Renta en Materia de Retenciones Dec 1808 6.0.36.203 de 12/05/1997",0,"J",0);
			$this->cell(95,5,strtoupper($tba->fields["nomemp"]));
			$this->setFont("Arial","B",8);
			$this->cell(50,5,"Datos del Agente de Retención");
			$this->ln();
			$this->Rect(10,$this->GetY(),100,8);
			$this->Rect(120,$this->GetY(),85,8);
			$this->Rect(210,$this->GetY(),60,13);
			$this->Rect(10,$this->GetY()+10,195,11);
			$this->ln(1);
			$this->cell(1,5,"");
			$this->cell(110,5,"Nombre:");
			$this->cell(150,5,"No. R.I.F.:");
			$this->ln(-1);
			$this->cell(218,5,"");
			$this->cell(20,5,"Periodo Fiscal");
			$this->ln(6);
			$this->cell(203,5,"");
			$this->cell(33,5,"Año:");
			$this->cell(20,5,"Mes:");
			$this->ln(6);
			$this->cell(1,5,"");
			$this->cell(110,5,"Direccion:");
			$this->ln(10);
			$this->cell(99,5,"");
			$this->cell(50,5,"Datos del Contribuyente");
			$this->Rect(10,$this->GetY()+5,100,15);
			$this->Rect(120,$this->GetY()+5,85,15);
			$this->ln();
			$this->cell(2,5,"");
			$this->cell(110,5,"Nombre o Razon Social:");
			$this->cell(50,5,"RIF. del Sujeto Retenido:");
			$this->ln(17);
			$this->Rect(140,$this->GetY(),49,5,"DF");
			$this->Rect(12,$this->GetY()+5,218,9,"DF");
			$this->Line(12,$this->Gety()+5,12,$this->Gety()+14);
			$this->Line(31,$this->Gety()+5,31,$this->Gety()+14);
			$this->Line(47,$this->Gety()+5,47,$this->Gety()+14);
			$this->Line(66,$this->Gety()+5,66,$this->Gety()+14);
			$this->Line(83,$this->Gety()+5,83,$this->Gety()+14);
			$this->Line(100,$this->Gety()+5,100,$this->Gety()+14);
			$this->Line(140,$this->Gety()+5,140,$this->Gety()+14);
			//$this->Line(155,$this->Gety()+5,155,$this->Gety()+14);
			$this->Line(189,$this->Gety()+5,189,$this->Gety()+14);
			$this->Line(200,$this->Gety()+5,200,$this->Gety()+14);
			//----
			$this->setX(155);
			$this->cell(50,5,"Importe Gravado");
			$this->ln();
			$this->setFont("Arial","",7);
            $this->setX(15);
            $this->cell(18,5,"Fecha");
            $this->cell(16,5,"Nº Cheque");
			$this->cell(17,5,"Fecha de");
			$this->cell(17,5,"Numero de");
			$this->cell(26,5,"N° Control");
			$this->cell(34,5,"  Total");
			$this->cell(15,5,"");
			$this->cell(35,5,"Base");
			$this->cell(13,5,"%");
			$this->cell(6,5,"");
			$this->cell(20,5,"ISRL");
			$this->ln(3);
			$this->setX(51);
			//$this->cell(18,5,"Emicion");
			$this->cell(18,5,"Factura");
			$this->cell(17,5,"Factura");
			$this->cell(22,5,"Factura");
			$this->cell(27,5,"  Facturado");
			$this->cell(21,5,"");
			$this->cell(37,5,"Imponible");
			$this->cell(17,5,"Alic.");
			$this->cell(1,5,"");
			$this->cell(20,5,"Retenido");
			$this->setFont("Arial","B",9);
			$this->ln(12);
		}

				function Footer()
		{
			$this->SetFont("Arial","B",9);
			$this->SetY(190);
			$this->Line(110,$this->GetY(),170,$this->GetY());
			$this->MultiCell(0,5,$_POST["responsable"]."\nAgente de Retención",0,'C');


		}
		function Cuerpo()
		{
		 $tb=$this->bd->select($this->sql);
		 $tb2=$this->bd->select($this->sql);

		 $totfac=0;
		 $exeiva=0;
		 $basimp=0;
		 $moniva=0;
		 $monret=0;

		 if (!$tb2->EOF)
		 {
		 $ref=$tb2->fields["numord"];
		 $this->ln(-75);
		 $this->setFont("Arial","B",10);
		 $this->cell(163,5,"");
		 $this->cell(65,5,$this->ano."  -  ".$this->mes."  -  ".str_pad($this->correlativo,8,"0",STR_PAD_LEFT));
		 $this->cell(20,5,$this->fechasys);
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

		 if ($this->benalt<>" ")
		 {
		 	$pos=strpos($this->ben,"?");
		 	$ben=substr($this->benalt,$pos+1,strlen($this->benalt));
		 }
		 else
		 {
			 $ben=$tb2->fields["nomben"];
		 }
		$this->cell(5,5,"");
		$this->cell(119,5,strtoupper($ben));

		$pos=strpos($this->ben,"?");
		$tira=substr($this->ben,0,$pos);
		$this->cell(115,5,strtoupper($tira));
		$this->ln(26.2);
		}

		while (!$tb->EOF)
		{
			if ($tb->fields["numord"]!=$ref)
			{
				$this->Rect(128,$this->GetY()-0.2,34,7);
				$this->Rect(162,$this->GetY()-0.2,33,7);
				$this->Rect(190,$this->GetY()-0.2,34,7);//basimp
				$this->Rect(240,$this->GetY()-0.2,30,7);
				$this->setFont("Arial","B",9);
				$this->ln(0.5);
				$this->cell(103,5,"");
				$this->cell(15,5,"Totales");
				$this->ln(1.5);
				$this->ln(-1);
				$this->setFont("Arial","",6);
				$this->cell(118,5,"");
				$this->cell(33,5,number_format($totfac,2,'.',','),0,0,"R");
		//		$this->cell(33,5,number_format($exeiva,2,'.',','),0,0,"R");
				$this->cell(34,5,number_format($basimp,2,'.',','),0,0,"R");
				$this->cell(41,5,number_format($monret,2,'.',','),0,0,"R");

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
				 $this->cell(65,5,$this->ano."  -  ".$this->mes."  -  ".str_pad($this->correlativo,8,"0",STR_PAD_LEFT));
				 $this->cell(20,5,$this->fechasys);
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
				 if ($this->benalt<>" ")
				 {
				 	$pos=strpos($this->ben,"?");
				 	$ben=substr($this->benalt,$pos+1,strlen($this->benalt));
				 }
				 else
				 {
					 $ben=$tb2->fields["nomben"];
				 }
				$this->cell(5,5,"");
				$this->cell(119,5,strtoupper($ben));

				$pos=strpos($this->ben,"?");
				$tira=substr($this->ben,0,$pos);
				$this->cell(115,5,strtoupper($tira));
				$this->ln(26.2);
				}
		//Detalle
		$this->setFont("Arial","",6);
		$ref=$tb->fields["numord"];
        $this->setX(12);
        $this->cell(19,5,$tb->fields["feche"],0,0,"C");
		$this->cell(16,5,$tb->fields["numche"],0,0,"C");
		$this->cell(19,5,$tb->fields["fecfac"],0,0,"C");
		$this->cell(16,5,$tb->fields["numfac"],0,0,"C");
		$this->cell(17,5,$tb->fields["numctr"],0,0,"C");
		$this->cell(33,5,number_format($tb->fields["totfac"],2,'.',','),0,0,"R");
		$totfac=$totfac+$tb->fields["totfac"];
			$this->cell(20,5,"",0,0,"R");
//		$exeiva=$exeiva+$tb->fields["exeiva"];
		$this->cell(30,5,number_format($tb->fields["basislr"],2,'.',','),0,0,"R");
		$basimp=$basimp+$tb->fields["basislr"];
		$this->cell(20,5,number_format($tb->fields["porislr"],2,'.',','),0,0,"C");
		$this->cell(27,5,number_format($tb->fields["monislr"],2,'.',','),0,0,"R");
		$monret=$monret+$tb->fields["monislr"];
			$this->Rect(12,$this->GetY()-0.2,19,5);
			$this->Rect(31,$this->GetY()-0.2,16,5);
		$this->Rect(47,$this->GetY()-0.2,19,5);
		$this->Rect(66,$this->GetY()-0.2,17,5);
		$this->Rect(83,$this->GetY()-0.2,17,5);
		$this->Rect(100,$this->GetY()-0.2,40,5);
		//$this->Rect(122,$this->GetY()-0.2,33,5);
		$this->Rect(140,$this->GetY()-0.2,49,5);//basimp
		$this->Rect(189,$this->GetY()-0.2,11,5);
		$this->Rect(200,$this->GetY()-0.2,30,5);
		$this->ln();
		$tb->MoveNext();
		}
		$this->Rect(100,$this->GetY()-0.2,40,7);
		//$this->Rect(122,$this->GetY()-0.2,33,7);
		$this->Rect(140,$this->GetY()-0.2,49,7);//basimp
		$this->Rect(200,$this->GetY()-0.2,30,7);
		$this->setFont("Arial","B",9);
		$this->ln(0.5);
		$this->setX(75);
		$this->cell(15,5,"Totales");
		$this->ln(1.5);
		$this->ln(-1);
		$this->setFont("Arial","",6);
		$this->setX(100);
		$this->cell(33,5,number_format($totfac,2,'.',','),0,0,"R");
		$this->cell(20,5,"",0,0,"R");
		//$this->setX(130);
		$this->cell(30,5,number_format($basimp,2,'.',','),0,0,"R");
		$this->cell(45,5,number_format($monret,2,'.',','),0,0,"R");


		}
	}
?>
