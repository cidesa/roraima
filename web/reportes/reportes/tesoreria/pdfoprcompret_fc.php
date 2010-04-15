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
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->orden=$_POST["orden"];

				$this->sql="select distinct rtrim(a.numord) as orden,a.cedrif,a.numche,a.nomben, a.desord,to_char(a.fecemi,'dd/mm/yyyy') as fecemi,
				(CASE WHEN a.status='I' THEN 'Pagadas'
						WHEN a.status='N' THEN 'No Pagadas'
						WHEN a.status='A' THEN 'Anuladas' END) as staord,
						--b.codtip,
						--b.monret,
						c.numcue,c.numcom,
						--d.moncau,
						f.dirben,f.telben,e.nomcue
						from opretord b, tsmovlib c, tsdefban e, opbenefi f,
						opordpag a LEFT OUTER JOIN opdetord d ON (a.numord=d.numord)
						where a.numord=b.numord and
						a.numord=d.numord and
						a.numche=c.reflib and
						c.numcue=e.numcue and
						a.cedrif=f.cedrif
						--b.codtip='o01'
						--a.numord='".$this->orden."'
						";

			$this->cab=new cabecera();

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);



		}
		function Cuerpo()
		{
		 $tb=$this->bd->select($this->sql);


		 while (!$tb->EOF)
		 {

			$this->setFont("Arial","B",9);
			$this->cell(180,5,"DATOS DEL BENEFICIARIO",0,0,"C");
			//Cuadro1
			$this->Rect(10,43,190,25);
			$this->Line(10,54,145,54);
			$this->Line(10,68,200,68);
			$this->Line(145,43,145,68);
			$this->Line(145,50,200,50);
			$this->Line(145,61,200,61);
			$this->Line(10,61,10,75);
			$this->Line(200,61,200,75);
			$this->ln(6);
			$this->setFont("Arial","",7);
			$this->cell(2,5,"");
			$this->cell(30,5,"NOMBRE:");
			$this->ln(1);
			$this->cell(136,5,"");
			$this->cell(5,5,"R.I.F.:");
			$this->ln(10.5);
			$this->cell(2,5,"");
			$this->cell(30,5,"DIRECCION:");
			$this->ln(-4.5);
			$this->cell(136,5,"");
			$this->cell(5,5,"TELF:");
			$this->ln(6);
			$this->cell(136,5,"");
			$this->cell(5,5,"O/P:");
			$this->ln(12);
			$this->setFont("Arial","",8);
			$this->ln(-20);
			$this->cell(5,5,"");
			$this->cell(5,5,strtoupper($tb->fields["nomben"]));
			$this->ln(-4);
			$this->cell(145,5,"");
			$this->cell(5,5,strtoupper($tb->fields["cedrif"]));
			$this->ln(4);
			$this->ln(1.8);
			$this->cell(145,5,"");
			$this->cell(5,5,strtoupper($tb->fields["telben"]));
			$this->ln(-1.8);
			$this->ln(8);
			$this->cell(145,5,"");
			$this->cell(5,5,strtoupper($tb->fields["orden"]));
			$this->ln(-8);
			$this->ln(14);
			$this->sql2="select max(a.refcom) as ref
						  from cpcompro a,cpimpcau b
						  where
						  b.refcau='".$tb->fields["orden"]."' and
						  b.refere=a.refcom";
			 $tb2=$this->bd->select($this->sql2);

			$this->cell(154,5,"");
			$this->cell(10,5,strtoupper($tb2->fields["ref"]));
			$this->ln(-14);
			$this->ln(12);
			$this->cell(5,5,"");
			$this->cell(5,5,substr(strtoupper($tb->fields["dirben"]),0,75));
			$this->ln(-12);
			$this->ln(20);
			$this->setFont("Arial","",7);
			$this->cell(2,5,"");
			$this->cell(30,5,"FACTURAS No.");
			$this->ln(-6);
			$this->cell(136,5,"");
			$this->cell(5,5,"CONTRATO:");
			$this->ln(11.5);
			$this->setFont("Arial","",8);
			$this->sql3="select numord, numfac from opfactur where numord='".$tb->fields["orden"]."'";
			$tb3=$this->bd->select($this->sql3);

			while (!$tb3->EOF)
			{
			$this->cell(5,5,"");
			$this->cell(10,5,$tb3->fields["numfac"]);
			$this->Line(10,$this->GetY(),10,$this->GetY()+6);
			$this->Line(200,$this->GetY(),200,$this->GetY()+6);
			$this->ln(4);
			$tb3->MoveNext();
			}
			$this->ln(2);
			$this->Line(10,$this->GetY(),200,$this->GetY());
			$this->ln(3);
			//Cuadro 2
			$this->setFont("Arial","B",9);
			$this->cell(180,5,"POR CONCEPTO DE RETENCION",0,0,"C");
			// y = 88
			$this->Rect(10,$this->GetY()+6,190,45);
			$this->Line(10,$this->GetY()+19,200,$this->GetY()+19);
			$this->Line(10,$this->GetY()+32,200,$this->GetY()+32);
			$this->Line(105,$this->GetY()+6,105,$this->GetY()+19);
			$this->Line(55,$this->GetY()+6,55,$this->GetY()+32);
			$this->Line(150,$this->GetY()+6,150,$this->GetY()+19);
			$this->ln(6);
			$this->setFont("Arial","",7);
			$this->cell(5,5,"");
			$this->cell(49,5,"BASE IMPONIBLE Bs.");
			$this->cell(48,5,"MONTO RETENIDO Bs.");
			$this->cell(40,5,"% DE LA RETENCION");
			$this->cell(30,5,"FECHA:");
			$this->ln(13);
			$this->cell(5,5,"");
			$this->cell(42,5,"CHEQUE O N/C No.");
			$this->cell(49,5,"BANCO:");
			$this->ln(13);
			$this->cell(5,5,"");
			$this->cell(42,5,"POR CONCEPTO DE:");
			$this->ln(-20);
			$this->setFont("Arial","",8);
			$this->sql4="select monret,codtip from opretord where numord='".$tb->fields["orden"]."'";
			$tb4=$this->bd->select($this->sql4);
			$this->sql5="select porret as tar, porsus as sustra from optipret where codtip='".$tb4->fields["codtip"]."' ";
			$tb5=$this->bd->select($this->sql5);

			if ($tb5->fields["sustra"]<>0)
			{
				$tarifa=$tb5->fields["sustra"];
			}
			else
			{
				$tarifa=$tb5->fields["tar"];
	  		}

			$baseimp=((100*$tb4->fields["monret"])/$tarifa);

			$this->cell(44,5,number_format($baseimp,2,'.',','),0,0,"C");
			$this->cell(50,5,number_format($tb4->fields["monret"],2,'.',','),0,0,"C");
			$this->cell(46,5,number_format($tarifa,0,'.',',')." %",0,0,"C");
			$this->cell(48,5,$tb->fields["fecemi"],0,0,"C");
			$this->ln(13);
			$this->cell(52,5,$tb->fields["numche"],0,0,"C");
			$this->cell(52,5,strtoupper($tb->fields["nomcue"]),0,0,"L");

			$this->ln(-6);
			$this->cell(59,5,"");
			$this->cell(52,5,$tb->fields["numcue"]);
			$this->ln(6);

			$this->ln(13);
			$this->cell(5,5,"");
			$this->Multicell(150,4,strtoupper($tb->fields["desord"]),0,"L");
			$this->ln(11);

			//Cuadro3
			$this->setFont("Arial","B",9);
			$this->cell(180,5,"DATOS DEL AGENTE DE RETENCION",0,0,"C");
			//143
			$this->Rect(10,$this->GetY()+6,190,26);
			$this->Line(10,$this->GetY()+19,200,$this->GetY()+19);
			$this->Line(130,$this->GetY()+19,130,$this->GetY()+32);
			$this->Line(165,$this->GetY()+6,165,$this->GetY()+32);

			$this->ln(7);
			$this->setFont("Arial","",7);
			$this->cell(5,5,"");
			$this->cell(151,5,"NOMBRE O RAZON SOCIAL:");
			$this->cell(49,5,"No R.I.F.:");
			$this->ln(13);
			$this->cell(5,5,"");
			$this->cell(116,5,"DIRECCION:");
			$this->cell(35,5,"CIUDAD:");
			$this->cell(30,5,"TELF:");
			$this->ln(-8);
			$this->setFont("Arial","",8);

			$this->cell(7,5,"");
			$this->cell(155,5,"HIDROLOGICA DEL CENTRO C.A. (HIDROCENTRO)");
			$this->cell(30,5,"J-075737393");
			$this->ln(13);
			$this->cell(7,5,"");
			$this->cell(121,5,"AV. PAEZ C.C. GUACARA LOCALES 96-106 GUACARA  EDO  CARABOBO");
			$this->cell(30,5,"GUACARA");
			$this->cell(30,5,"0245-5601907 / 1839");

			//Elab
			$this->SetY(225);
			$this->Rect(15,225,180,25);
			$this->Line(75,225,75,250);
			$this->Line(135,225,135,250);
			$this->cell(7,5,"");
			$this->cell(60,5,"ELABORADO POR:");
			$this->cell(60,5,"CONFORME POR:");
			$this->cell(30,5,"RECIBIDO POR:");
			$this->ln(20);
			$this->cell(23,5,"");
			$this->cell(60,5,"FIRMA Y FECHA");
			$this->cell(60,5,"FIRMA Y FECHA");
			$this->cell(60,5,"FIRMA Y FECHA");

		 $this->ln(300);
		 $tb->MoveNext();
		 }
	$this->bd->closed();
		}

	}
?>
HA");
			$this->cell(60,5,"FIRMA Y FECHA");

		 $this->ln(300);
		 $tb->MoveNext();
		 }
	$thi