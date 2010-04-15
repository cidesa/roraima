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
		var $sql2;
		var $sql3;
		var $sql4;
		var $sql5;
		var $apenom;
		var $rif1;
		var $rif2;
		var $rif3;
		var $nomraz;
		var $nomorg;
		var $fun;
		var $dire;
		var $ced1;
		var $ced2;
		var $ord1;
		var $ord2;
		var $ref;
		var $tip;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->apenom=$_POST["apenom"];
			$this->rif1=$_POST["rif1"];
			$this->rif2=$_POST["rif2"];
			$this->rif3=$_POST["rif3"];
			$this->nomraz=$_POST["nomraz"];
			$this->nomorg=$_POST["nomorg"];
			$this->fun=$_POST["fun"];
			$this->dire=$_POST["dire"];
			$this->ced1=$_POST["ced1"];
			$this->ced2=$_POST["ced2"];
			$this->ord1=$_POST["ord1"];
			$this->ord2=$_POST["ord2"];
			$this->ref=$_POST["ref"];
			$this->tip=$_POST["tip"];


				$this->sqla="select tipemp from empresa where codemp='001'";

				$this->sql="select distinct(d.numord),c.cedrif,c.nomben,c.dirben,c.telben ,c.codcta,c.nitben,c.codtipben,c.tipper,
							c.nacionalidad,c.residente,c.constituida,
							b.numche,b.monord ,c.cedrif as cedula
							from opordpag b,opbenefi c,opretord d
							where
							b.status<>'A' and (b.cedrif)=(c.cedrif) and
							b.numord=d.numord and
							b.numord>=rpad('".$this->ord1."',8,' ') and b.numord<=rpad('".$this->ord2."',8,' ') and
							(d.codtip >='008' and d.codtip <='018' )
							order by d.numord";

				$this->sqlx="select distinct(d.numord),c.cedrif,c.nomben,c.dirben,c.telben ,c.codcta,c.nitben,c.codtipben,c.tipper,
							c.nacionalidad,c.residente,c.constituida,
							b.numche,b.monord ,c.cedrif as cedula
							from opordpag b,opbenefi c,opretord d
							where
							b.status<>'A' and (b.cedrif)=(c.cedrif) and
							b.numord=d.numord and
							b.numord>=rpad('".$this->ord1."',8,' ') and b.numord<=rpad('".$this->ord2."',8,' ') and
							(d.codtip >='008' and d.codtip <='018' )
							order by d.numord";

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

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			//---------PRIMER CUADRO------------
			$tba=$this->bd->select($this->sqla);
			$this->setFont("Arial","B",7);
			$this->ln(4);
			$this->cell(30,5,"DATOS DEL AGENTE DE RETENCION");
			$this->ln(1);

			$this->Rect(33,47,5,6,"F");
			$this->SetDrawColor(255,255,255);
			$this->SetLineWidth(2.3);
			$this->Line(34,47,40,50);
			$this->SetFillColor(255,255,255);
			$this->Rect(35,46,3,2,"F");
			$this->Line(34,53,40,50);
			$this->Rect(35,52,3,2,"F");
			$this->SetDrawColor(0,0,0);
			$this->SetLineWidth(0.2);
			//--- marcas X
			if (strtoupper($tba->fields["tipemp"])=='N')
			{
			$this->Line(66,48,69,51);
			$this->Line(66,51,69,48);
			}
			if (strtoupper($tba->fields["tipemp"])=='J')
			{
			$this->Line(91,48,94,51);
			$this->Line(91,51,94,48);
			}
			if (strtoupper($tba->fields["tipemp"])=='P')
			{
			$this->Line(116,48,119,51);
			$this->Line(116,51,119,48);
			}

			//---
			$this->SetDrawColor(0,0,0);
			$this->SetLineWidth(0.2);
			$this->Rect(10,45,170,44);//el grande
			$this->Rect(66,48,3,3);
			$this->Rect(91,48,3,3);
			$this->Rect(116,48,3,3);
			$this->Rect(10,55,170,3);
			$this->Rect(10,58,12,25);
			$this->Rect(22,58,10,25);


			$this->Rect(22,58,118,6);
			$this->Rect(140,58,40,6);
			$this->Rect(22,64,118,6);
			$this->Rect(140,64,40,6);
			$this->Rect(32,70,108,6);
			$this->Rect(140,70,40,6);
			$this->Rect(32,76,108,7);
			$this->Rect(140,76,40,7);
			$this->Line(160,79,160,83);
			$this->Line(140,79,180,79);

			$this->ln(4);
			//--------
			$this->setFont("Arial","",5);
			$this->cell(2,5,"");
			$this->cell(40,5,"MARQUE EL TIPO");
			$this->cell(25,5,"1. PERSONA");
			$this->cell(25,5,"2. PERSONA");
			$this->cell(25,5,"3. ENTIDAD");
			$this->ln(2);
			$this->cell(3,5,"");
			$this->cell(40,5,"DE AGENTE");
			$this->cell(25,5,"NATURAL");
			$this->cell(25,5,"JURIDICA");
			$this->cell(25,5,"PUBLICA");
			$this->ln(2);
			$this->cell(2,5,"");
			$this->cell(40,5,"DE RETENCION");
			$this->ln(4);
			$this->cell(55,5,"");
			$this->cell(50,5,"UBIQUESE EN EL TIPO DE RETENCION Y SUMINISTRE LOS DATOS");
			$this->ln(12);
			$this->setFont("Arial","B",7);
			$this->cell(2,5,"");
			$this->cell(3,5,"TIPO");
			$this->ln(-8);
			$this->cell(15,5,"");
			$this->cell(3,5,"1");
			$this->ln(6);
			$this->cell(15,5,"");
			$this->cell(3,5,"2");
			$this->ln(8);
			$this->cell(15,5,"");
			$this->cell(3,5,"3");
			$this->ln(-15);
			$this->setFont("Arial","",5);
			$this->cell(22,5,"");
			$this->cell(109,5,"APELLIDO(S) Y NOMBRE(S)");
			$this->cell(3,5,"NUMERO R1");
			$this->ln(6);
			$this->cell(22,5,"");
			$this->cell(109,5,"NOMBRE O RAZON SOCIAL");
			$this->cell(3,5,"NUMERO R1");
			$this->ln(6);
			$this->cell(22,5,"");
			$this->cell(109,5,"NOMBRE DEL ORGANISMO");
			$this->cell(3,5,"NUMERO R1");
			$this->ln(6);
			$this->cell(22,5,"");
			$this->cell(111,5,"FUNCIONARIO AUTORIZADO PARA HACER LA RETENCION");
			$this->cell(3,5,"FECHA DE CIERRE DEL EJERCICIO");
			$this->ln(3);
			$this->setFont("Arial","",4);
			$this->SetTextColor(65,65,65);
			$this->cell(130,5,"");
			$this->cell(20,5,"DIA");
			$this->cell(15,5,"MES");
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","",5);
			$this->ln(4);
			$this->cell(1,5,"");
			$this->cell(111,5,"DIRECCION Y TELEFONO(S):");
			$this->ln(9);
			//---------PRIMER CUADRO------------
			//---------SEGUNDO CUADRO------------
			$this->setFont("Arial","B",7);
			$this->cell(30,5,"DATOS DEL BENEFICIARIO");
			$this->ln();
			$this->Rect(10,95,170,37);//el grande
			$this->Line(130,95,130,132);
			$this->Rect(10,95,170,12);//rect1
			$this->Rect(10,107,170,9);//rect2

			$this->Rect(147,102,5,2);//chikitos
			$this->Rect(169,102,5,2);
			$this->Rect(16,112,5,2);
			$this->Rect(27,112,5,2);
			$this->Rect(42,112,5,2);
			$this->Rect(56,112,5,2);
			$this->Rect(142,112,5,2);
			$this->Rect(161,112,5,2);

			$this->Line(130,127,180,127);

			$this->Line(35,107,35,116);
			$this->Line(65,107,65,116);
			//-----
			$this->setFont("Arial","B",6);
			$this->cell(2,5,"");
			$this->cell(40,5,"APELLIDO(S) Y NOMBRE(S)");
			$this->cell(80,5,"NOMBRE O RAZON SOCIAL");
			$this->cell(25,5,"TIPO DE PERSONA");
			$this->ln();
			$this->cell(124,5,"");
			$this->cell(40,5,"NATURAL                     JURIDICA");
			$this->ln(6);
			$this->cell(2,5,"");
			$this->cell(24,5,"NACIONALIDAD");
			$this->cell(30,5,"RESIDENTE EN EL PAIS");
			$this->cell(66,5,"CEDULA DE IDENTIDAD O RIF");
			$this->cell(40,5,"CONSTITUIDA EN EL PAIS");
			$this->ln(4);
			$this->cell(2,5,"");
			$this->cell(25,5,"V                E");
			$this->cell(100,5,"SI                  NO");
			$this->cell(24,5,"SI                          NO");
			$this->ln(5);
			$this->cell(3,5,"");
			$this->cell(119,5,"DIRECCION Y TELEFONO(S)");
			$this->cell(25,5,"PERIODO A QUE CORRESPONDEN LAS");
			$this->ln(2);
			$this->cell(127,5,"");
			$this->cell(30,5,"REMUNERACIONES PAGADAS");
			$this->ln(4);
			$this->cell(121,5,"");
			$this->cell(30,5,"DESDE:");
			$this->ln(5);
			$this->cell(121,5,"");
			$this->cell(30,5,"HASTA:");
			$this->ln(7);
			//---------SEGUNDO CUADRO------------
			//---------TERCER CUADRO------------
			$this->setFont("Arial","B",7);
			$this->cell(30,5,"INFORMACION DEL IMPUESTO RETENIDO");
			$this->ln(3);
			$this->Rect(10,138,170,55);//el grande
			$this->Rect(11,139,24,12);//medianos
			$this->Rect(36,139,19,12);//medianos
			$this->Rect(56,139,22,12);//medianos
			$this->Rect(79,139,29,12);//medianos
			$this->Rect(109,139,26,12);//medianos
			$this->Rect(136,139,15,12);//medianos
			$this->Rect(152,139,27,12);//medianos

			$this->Rect(11,146,8,5);//chikitos dia
			$this->Rect(19,146,8,5);//chikitos mes
			$this->Rect(27,146,8,5);//chikitos a�o

			$this->ln(1);
			//-----------
			$this->setFont("Arial","",5);
			$this->cell(4,5,"");
			$this->cell(30,5,"FECHA DE PAGO");
			$this->ln(2);
			$this->cell(5,5,"");
			$this->cell(30,5,"O ABONO EN");
			$this->ln(2);
			$this->cell(7,5,"");
			$this->cell(30,5,"CUENTA");
			$this->setFont("Arial","B",6);
			$this->ln(-1);
			$this->ln(1);
			$this->cell(28,5,"");
			$this->cell(20,5,"CODIGO DE");
			$this->cell(23,5,"  DOCUMENTO");
			$this->cell(30,5,"PAGADA O ABONADA");
			$this->cell(20,5,"CANTIDAD OBJETO");
			$this->ln(3);
			$this->cell(28,5,"");
			$this->cell(20,5,"RETENCION");
			$this->cell(28,5,"");
			$this->cell(27,5,"EN CUENTA");
			$this->cell(23,5,"DE RETENCION");
			$this->cell(17,5,"% O TARIFA");
			$this->cell(20,5,"IMPUESTO RETENIDO");
			$this->ln(1);
			$this->setFont("Arial","",5);
			$this->cell(2,5,"");
			$this->cell(30,5," DIA         MES         AÑO");
			$this->ln(49);

			//---------TERCER CUADRO------------
			$this->setFont("Arial","B",7);
			$this->cell(1,5,"");
			$this->cell(30,5,"Referencia:");
			$this->ln(6);
			$this->cell(1,5,"");
			$this->cell(30,5,"Enriquecimiento:");
			$this->ln(10);
			$this->setFont("Arial","B",5);
			$this->cell(60,5,"");
			$this->cell(30,5,"AGENTE DE RETENCION (SELLO, FECHA Y FIRMA)");
			$this->Rect(64,209,60,30);

		}
		function Cuerpo()
		{

			$tbx=$this->bd->select($this->sqlx);
			$tb=$this->bd->select($this->sql);

			$tbx->MoveLast();
			$ult=$tbx->fields["numord"];

		    while (!$tb->EOF)
			{
			//---------PRIMER CUADRO-------------
			$numord=$tb->fields["numord"];
			$this->SetY(60);
			//$this->ln(30);
			$this->setFont("Arial","",6);
			$this->cell(25,5,"");
			$this->cell(109,5,$this->apenom);
			$this->cell(3,5,$this->rif1);
			$this->ln(6);
			$this->cell(25,5,"");
			$this->cell(109,5,$this->nomraz);
			$this->cell(3,5,$this->rif2);
			$this->ln(6);
			$this->cell(25,5,"");
			$this->cell(109,5,$this->nomorg);
			$this->cell(3,5,$this->rif3);
			$this->ln(6);
			$this->cell(25,5,"");
			$this->cell(112,5,$this->fun);
			$this->ln(1);
			$this->cell(137,5,"");
			$this->sqldia="select to_char(feccie,'dd') as feccie from contaba";
			$tbdia=$this->bd->select($this->sqldia);
			$this->cell(21,5,$tbdia->fields["feccie"]);
			$this->sqlmes="select to_char(feccie,'mm') as feccie from contaba";
			$tbmes=$this->bd->select($this->sqlmes);
			$this->cell(15,5,$tbmes->fields["feccie"]);
			$this->ln(5.5);
			$this->cell(5,5,"");
			$this->cell(109,5,$this->dire);
			//---------PRIMER CUADRO-------------
			//---------SEGUNDO CUADRO------------
			$this->setFont("Arial","B",7);
			$this->ln(16);
			$this->cell(1,5,"");
			$this->cell(15,5,strtoupper($tb->fields["nomben"]));
			if (strtoupper($tb->fields["tipper"])=='N')
			{
			$this->Line(147,102,152,104);
			$this->Line(147,104,152,102);
			}
			if (strtoupper($tb->fields["tipper"])=='J')
			{
			$this->Line(169,102,174,104);
			$this->Line(169,104,174,102);
			}
			if (strtoupper($tb->fields["nacionalidad"])=='V')
			{
			$this->Line(16,112,21,114);
			$this->Line(16,114,21,112);
			}
			if (strtoupper($tb->fields["nacionalidad"])=='E')
			{
			$this->Line(27,112,32,114);
			$this->Line(27,114,32,112);
			}
			if (strtoupper($tb->fields["residente"])=='S')
			{
			$this->Line(42,112,47,114);
			$this->Line(42,114,47,112);
			}
			if (strtoupper($tb->fields["residente"])=='N')
			{
			$this->Line(56,112,61,114);
			$this->Line(56,114,61,112);
			}
			$this->ln(10);
			$this->cell(61,5,"");
			$this->cell(15,5,strtoupper($tb->fields["cedrif"]));

			if (strtoupper($tb->fields["constituida"])=='S')
			{
			$this->Line(142,112,147,114);
			$this->Line(142,114,147,112);
			}
			if (strtoupper($tb->fields["constituida"])=='N')
			{
			$this->Line(161,112,166,114);
			$this->Line(161,114,166,112);
			}
			$this->ln(10);
			$this->cell(15,5,strtoupper(substr($tb->fields["dirben"],0,78)));
			$this->ln(5);
			$this->cell(15,5,$tb->fields["telben"]);

			$this->ln(-3.5);
			$this->sqlb="SELECT TO_CHAR(fecini,'DD/MM/YYYY') as fechainicio FROM contaba";
			$tbb=$this->bd->select($this->sqlb);
			$this->cell(140,5,"");
			$this->cell(15,5,$tbb->fields["fechainicio"]);
			$this->ln(5);
			$this->sqlc="SELECT TO_CHAR(feccie,'DD/MM/YYYY') as fechacierre FROM contaba";
			$tbc=$this->bd->select($this->sqlc);
			$this->cell(140,5,"");
			$this->cell(15,5,$tbc->fields["fechacierre"]);
			$this->ln(24);
			//---------SEGUNDO CUADRO------------
			//---------TERCER CUADRO------------
			/*$this->sqld="select to_char(e.feclib,'dd') as diaent,
							to_char(e.feclib,'mm') as mesent,
							to_char(e.feclib,'yyyy') as anoent,
							b.numche,b.numord,b.monord ,d.monret,d.codtip
							from opordpag b,opbenefi c,opretord d,tsmovlib e
							where
							d.numord='".$numord."' and d.numord=b.numord and
							b.status<>'a' and (b.numche)=(e.reflib) and
							(d.codtip >='008' and d.codtip <='018' )
							order by b.numord";*/

			$this->sqld="select to_char(e.feclib,'dd') as diaent,
							to_char(e.feclib,'mm') as mesent,
							to_char(e.feclib,'yyyy') as anoent,
							b.numche,b.numord,b.monord ,d.monret,d.codtip
							from opordpag b,opretord d,tsmovlib e
							where
							d.numord='".$numord."' and d.numord=b.numord and
							b.status<>'a' and (b.numche)=(e.reflib) and
							(d.codtip >='008' and d.codtip <='018' )
							order by b.numord";


			$tbd=$this->bd->select($this->sqld);

			while (!$tbd->EOF)
			{
			$this->Rect(11,$this->GetY()+1,7,3);
			$this->Rect(19,$this->GetY()+1,7,3);
			$this->Rect(27,$this->GetY()+1,8,3);
			$this->Rect(36,$this->GetY()+1,19,3);
			$this->Rect(56,$this->GetY()+1,22,3);
			$this->Rect(79,$this->GetY()+1,29,3);
			$this->Rect(109,$this->GetY()+1,26,3);
			$this->Rect(136,$this->GetY()+1,15,3);
			$this->Rect(152,$this->GetY()+1,27,3);
			$this->cell(2,5,"");
			$this->cell(8,5,$tbd->fields["diaent"]);
			$this->cell(7,5,$tbd->fields["mesent"]);
			$this->cell(15,5,$tbd->fields["anoent"]);
			$this->cell(18,5,$tbd->fields["codtip"]);
			$codtip=$tbd->fields["codtip"];
			$this->cell(24,5,$tbd->fields["numche"]);
			$this->cell(20,5,number_format($tbd->fields["monord"],2,'.',','),0,'R',0);

			//---
			$this->sql3="select coalesce(sum(moncau),0) as moncau
					from opdetord where numord like '".$numord."'||'%' and
					monret<>0";
			$tb3=$this->bd->select($this->sql3);
			$this->cell(27,5,number_format($tb3->fields["moncau"],2,'.',','),0,'R',0);
			//---
			$this->sql2="select porret as tarifa, porsus as sustra
						from optipret
						where codtip='".$codtip."'";

			$tb2=$this->bd->select($this->sql2);
			if ($tb2->fields["sustra"]<>0)
			{
				$this->cell(17,5,$tb2->fields["sustra"],0,0,'R');
			}
			else
			{
				$this->cell(17,5,$tb2->fields["tarifa"],0,0,'R');
			}
			//---
			$this->cell(26,5,number_format($tbd->fields["monret"],2,'.',','),0,'R',0);

			$this->ln(4);
			$tbd->MoveNext();
			}
			//---------TERCER CUADRO------------
			$this->SetY(195);
			$this->cell(17,5,"");
			$this->cell(50,5,$this->ref);
			$this->ln(6);
			$this->cell(24,5,"");
			$this->cell(50,5,$this->tip);
			$this->ln(200);
			if ($tb->fields["numord"]==$ult)
			{

			}
			else
			{
				$this->cell(5,5,"");
			}
			$tb->MoveNext();
			}
		}
	}
/* ($tb->fields["numord"]==$ult)
			{

			}
			else
			{
				$this->cell*/
?>
