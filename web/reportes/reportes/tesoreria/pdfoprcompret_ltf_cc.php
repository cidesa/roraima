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
		var $cont;
		var $diradm;


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
			$this->cor=$_POST["cor"];
			$this->cont=$_POST["cont"];
			$this->diradm=$_POST["diradm"];


				$this->sql="select a.numord,b.cedrif,b.nomben,b.fecemi,to_char(a.fecfac,'dd/mm/yyyy') as fecfac,a.numfac,
							a.numctr,a.tiptra,a.facafe,
							a.totfac,a.exeiva,a.basltf,a.porltf,a.monltf
							from opfactur a,opordpag b
							where
							a.numord='".$this->orde."' and
							a.numord=b.numord
							order by a.numord";

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
		$this->sql1="select coalesce(comretltf,' ') as comretltf,feccomretltf, to_char(feccomretltf,'dd/mm/yyyy') as feccomretc
					from opordpag where numord='".$this->orde."'";
		$tb1=$this->bd->select($this->sql1);
		if (trim($tb1->fields["comretltf"])=="")
		{
			$comret=" ";
		}
		else
		{
			$comret=$tb1->fields["comretltf"];
		}
		$feccomret=$tb1->fields["feccomretltf"];
		$feccomretc=$tb1->fields["feccomretc"];

		if (trim($this->ben)=='?')
		{
			$this->benalt=" ";
		}
		else
		{
			$this->benalt=$this->ben;
		}
		if ($this->benalt<>" ")
		{
		$this->sql2="update opfactur set rifalt='".str_pad(substr($this->benalt,1,strpos($this->benalt,"?")-1),15," ",STR_PAD_RIGHT)."'
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
		  if($this->cor==null){
			if (trim($comret)=="")
			{
			   $this->sql3="select nextval('correlativo_ltf') as correlativo";
  			   $tb3=$this->bd->select($this->sql3);
			   $this->correlativo=$tb3->fields["correlativo"];
			   $this->sql4="update opordpag set comretltf='".$this->correlativo."', feccomretltf=to_date('".$this->fechasys."','dd/mm/yyyy')
						    where numord='".$this->orde."'";
			   //print $this->sql4;
			   $this->bd->actualizar($this->sql4);
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
			$this->sql2="update opordpag set comretltf='".$this->correlativo."',
						feccomretltf=to_date('".$this->fechasys."','dd/mm/yyyy')
					    where numord='".$this->orde."'";
			$this->bd->actualizar($this->sql2);
			}
			else{
				$this->correlativo=$this->cor;
				$this->sql4="update opordpag set comretltf='".$this->correlativo."', feccomretltf=to_date('".$this->fechasys."','dd/mm/yyyy')
						    where numord='".$this->orde."'";
			   $this->bd->actualizar($this->sql4);

			}

		}
		else
		{
		//SI
		if($this->cor==null){
		   $this->sql3="select nextval('correlativo_ltf') as correlativo";
			$tb3=$this->bd->select($this->sql3);
			$this->correlativo=$tb3->fields["correlativo"];

			$this->sql4="update opordpag set comretltf='".$this->correlativo."', feccomretltf=to_date('".$this->fechasys."','dd/mm/yyyy')
						where numord='".$this->orde."'";
			$this->bd->actualizar($this->sql4);
		}
		else{
			$this->correlativo=$this->cor;
			$this->sql4="update opordpag set comretltf='".$this->correlativo."', feccomretltf=to_date('".$this->fechasys."','dd/mm/yyyy')
						where numord='".$this->orde."'";
			$this->bd->actualizar($this->sql4);

		}
		}// cierre del si

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
			$this->cell(163,7,"");
			$this->cell(54,7,"Numero Comprobante:");
			$this->cell(50,7,"Fecha:");
			$this->ln(11);
			$this->sqla="select nomemp from empresa where codemp='001'";
			$tba=$this->bd->select($this->sqla);
			$this->setFont("Arial","B",8);
			$this->cell(95,5,strtoupper($tba->fields["nomemp"]));
			$this->setFont("Arial","",8);
			$this->cell(50,5,"Datos del Agente de Retencion");
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
			$this->Rect(195,$this->GetY(),45,5,"DF");
			$this->Rect(10,$this->GetY()+5,260,9,"DF");
			//vert
			$this->Line(25,$this->Gety()+5,25,$this->Gety()+14);
			$this->Line(40,$this->Gety()+5,40,$this->Gety()+14);
			$this->Line(56,$this->Gety()+5,56,$this->Gety()+14);
			$this->Line(75,$this->Gety()+5,75,$this->Gety()+14);
			$this->Line(94,$this->Gety()+5,94,$this->Gety()+14);
			$this->Line(106,$this->Gety()+5,106,$this->Gety()+14);
			$this->Line(128,$this->Gety()+5,128,$this->Gety()+14);
			$this->Line(162,$this->Gety()+5,162,$this->Gety()+14);
			$this->Line(195,$this->Gety()+5,195,$this->Gety()+14);
			$this->Line(229,$this->Gety()+5,229,$this->Gety()+14);
			$this->Line(240,$this->Gety()+5,240,$this->Gety()+14);
			//----
			$this->cell(195,5,"");
			$this->cell(50,5,"Importe Gravado");
			$this->ln();
			$this->setFont("Arial","",7);
			$this->cell(1,5,"");
			$this->cell(14,5,"Fecha de");
			$this->cell(16,5,"Numero de");
			$this->cell(16,5,"Nº Control");
			$this->cell(19,5,"Numero Nota");
			$this->cell(20,5,"Numero Nota");
			$this->cell(11,5,"Tipo");
			$this->cell(32,5," Nº de Factura");
			$this->cell(34,5,"  Total");
			$this->cell(35,5,"Exenta");
			$this->cell(24,5,"Base");
			$this->cell(13,5,"%");
			$this->cell(6,5,"");
			$this->cell(20,5,"L.T.F");
			$this->ln(3);
			$this->cell(2,5,"");
			$this->cell(14,5,"Factura");
			$this->cell(16,5,"Factura");
			$this->cell(17,5,"Factura");
			$this->cell(19,5,"de Debito");
			$this->cell(16,5,"de Credito");
			$this->cell(16,5,"Transacc");
			$this->cell(27,5," Afectada");
			$this->cell(27,5,"  Facturado");
			$this->cell(42,5,"");
			$this->cell(25,5,"Imponible");
			$this->cell(17,5,"Alic.");
			$this->cell(1,5,"");
			$this->cell(20,5,"Retenido");
			$this->setFont("Arial","B",9);
			$this->ln(12);
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
		 $this->cell(20,5,"");
		 $this->multicell(150,3,strtoupper($this->dire));
		 $this->ln(20);
		 $ben=$tb->fields["nomben"];
		if ($ben==null)
		{
		$ben=$this->benalt;
		$pos=strpos($this->ben,"?");
		$tira=substr($this->ben,0,$pos); // rif del bebefialterno
		}
		else{
		$ben=$tb->fields["nomben"];
		$tira=$tb->fields["cedrif"];
		}
		$this->cell(5,5,"");
		$this->cell(119,5,strtoupper($ben));
		$this->cell(115,5,strtoupper($tira));
		$this->ln(26.2);
		}

		while (!$tb->EOF)
		{
			if ($tb->fields["numord"]!=$ref)
			{
				$this->Rect(128,$this->GetY()-0.2,34,7);
				$this->Rect(162,$this->GetY()-0.2,33,7);
				$this->Rect(195,$this->GetY()-0.2,34,7);//basimp
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
				$this->cell(33,5,number_format($exeiva,2,'.',','),0,0,"R");
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
				 $this->cell(20,5,"");
		 		 $this->multicell(150,3,strtoupper($this->dire));
				 $this->ln(20);
				 if ($this->ben==NULL)
				 {
					 	$this->ben=" ";
				 }
				 if ($this->ben<>" ")
				 {
				 	$pos=strpos($this->ben,"?");
				 	$ben=substr($this->ben,$pos+1,strlen($this->ben));
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

		$this->cell(15,5,$tb->fields["fecfac"],0,0,"C");
		$this->cell(14,5,$tb->fields["numfac"],0,0,"C");
		$this->cell(17,5,$tb->fields["numctr"],0,0,"C");
		$this->cell(19,5,$tb->fields["numfac"],0,0,"C");
		$this->cell(19,5,$tb->fields["numfac"],0,0,"C");
		$this->cell(12,5,$tb->fields["tiptra"],0,0,"C");
		$this->cell(22,5,$tb->fields["facafe"],0,0,"C");
		$this->cell(33,5,number_format($tb->fields["totfac"],2,'.',','),0,0,"R");
		$totfac=$totfac+$tb->fields["totfac"];
		$this->cell(33,5,number_format($tb->fields["exeiva"],2,'.',','),0,0,"R");
		$exeiva=$exeiva+$tb->fields["exeiva"];
		$this->cell(34,5,number_format($tb->fields["basltf"],2,'.',','),0,0,"R");
		$basimp=$basimp+$tb->fields["basltf"];
		$this->cell(14,5,number_format($tb->fields["porltf"],2,'.',','),0,0,"C");
		$this->cell(27,5,number_format($tb->fields["monltf"],2,'.',','),0,0,"R");
		$monret=$monret+$tb->fields["monltf"];
		$this->Rect(10,$this->GetY()-0.2,15,5);
		$this->Rect(25,$this->GetY()-0.2,15,5);
		$this->Rect(40,$this->GetY()-0.2,16,5);
		$this->Rect(56,$this->GetY()-0.2,19,5);
		$this->Rect(75,$this->GetY()-0.2,19,5);
		$this->Rect(94,$this->GetY()-0.2,12,5);
		$this->Rect(106,$this->GetY()-0.2,22,5);
		$this->Rect(128,$this->GetY()-0.2,34,5);
		$this->Rect(162,$this->GetY()-0.2,33,5);
		$this->Rect(195,$this->GetY()-0.2,34,5);//basimp
		$this->Rect(229,$this->GetY()-0.2,11,5);
		$this->Rect(240,$this->GetY()-0.2,30,5);
		$this->ln();
		$tb->MoveNext();
		}
		$this->Rect(128,$this->GetY()-0.2,34,7);
		$this->Rect(162,$this->GetY()-0.2,33,7);
		$this->Rect(195,$this->GetY()-0.2,34,7);//basimp
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
		$this->cell(33,5,number_format($exeiva,2,'.',','),0,0,"R");
		$this->cell(34,5,number_format($basimp,2,'.',','),0,0,"R");
		$this->cell(41,5,number_format($monret,2,'.',','),0,0,"R");
		$this->setFont("Arial","B",8);
		$this->Rect(15,180,50,15);
		$this->setxy(20,190);
		$this->cell(25,5,"Firma y Sello del Beneficiario");
		$this->setxy(85,187);
		$this->cell(25,5,$this->cont);
		$this->setxy(90,190);
		$this->cell(25,5,"Contralor");
		$this->line(75,187,120,187);
		$this->setxy(140,190);
		$this->cell(25,5,"Agente de Retención");
		$this->line(130,190,180,190);
		$this->setxy(200,190);
		$this->cell(25,5,"Director de Administración y Finanza ");
		$this->setxy(210,187);
		$this->cell(25,5,$this->diradm);
		$this->line(195,187,260,187);
		}
	}
?>
