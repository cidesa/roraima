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
		var $sql1;
		var $sql2;
		var $sql3;
		var $sql4;
		var $sql5;
		var $sqla;
		var $numcue;
		var $antlib;
		var $salant;
		var $sal;
		var $rep;
		var $numero;
		var $cab;
		var $fecha1;
		var $fecha2;
		var $cta1;
		var $cta2;
		var $mov;
		var $cod1;
		var $cod2;
		var $filtro;
		var $ref1;
		var $ref2;
		var $deb;
		var $cre;
		var $mes;
		var $status;
		var $auxd=0;
		var $car;
		var $acumsalant=0;
		var $acumdeb=0;
		var $acumcre=0;
		var $acumseg=0;
		var $cont=0;
		var $cont2=0;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cta1=$_POST["cta1"];
			$this->cta2=$_POST["cta2"];
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->mov=$_POST["mov"];
			$this->filtro=$_POST["filtro"];
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];

				$this->sqla="SELECT DESTIP as nomtip FROM TSTIPMOV WHERE CODTIP=RPAD('".$this->mov."',4,' ')";


				$this->sql="select a.reflib,a.deslib,a.feclib,a.numcue,a.monmov,b.nomcue, c.refpag,c.codpre,c.monimp,d.nompre
						from tsmovlib a, tsdefban b, cpimppag c, cpdeftit d, cppagos e
						where
						substr(a.reflib,1,8) = rpad(c.refpag,8,' ')
						and a.feclib >=to_date('".$this->fecha1."','dd/mm/yyyy') and a.feclib <= to_date('".$this->fecha2."','dd/mm/yyyy') and
						a.feclib=e.fecpag and (e.stapag= 'a' or (e.stapag='n'  and e.fecanu>to_date('".$this->fecha2."','dd/mm/yyyy'))) and
						a.tipmov = rpad('".$this->mov."',4,' ') and a.numcue = b.numcue and
						a.numcue >= rpad('".$this->cta1."',20,' ') and a.numcue <= rpad('".$this->cta2."',20,' ') and
						c.refpag=e.refpag and c.codpre = d.codpre and
						c.codpre like '".$this->filtro."' and
						c.codpre >= rpad('".$this->cod1."',32,' ') and c.codpre <= rpad('".$this->cod2."',32,' ')";


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
			$tba=$this->bd->select($this->sqla);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			$this->cell(30,5,"Tipo Documento:");
			$this->cell(70,5,strtoupper($tba->fields["nomtip"]));
			$this->SetTextColor(0,0,0);
			$this->ln(7);

		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$tot=0;
			$monimp=0;
			$this->setFont("Arial","B",8);
			$this->cell(30,5,"Referencia");
			$this->cell(100,5,"Descripción en Libros");
			$this->cell(35,5,"Fecha Emisión");
			$this->cell(35,5,"Monto Cheque");
			$this->ln();
			$this->Line(10,$this->GetY(),200,$this->GetY());
			$this->Line(10,$this->GetY()-5,200,$this->GetY()-5);
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->Line(10,$this->GetY()-5,10,$this->GetY()+5);
			$this->Line(200,$this->GetY()-5,200,$this->GetY()+5);
			$this->cell(45,5,"Codigo Presupuestario");
			$this->cell(120,5,"Nombre Presupuestario");
			$this->cell(45,5,"Monto Imputado");
			$this->ln(8);

			if (!$tb2->EOF)
			{
			$ref=$tb2->fields["numcue"];
			$this->setFont("Arial","B",8);
			$this->cell(30,5,"Numero Cuenta:    ".$tb2->fields["numcue"]);
			$this->ln();
			$this->cell(40,5,"Banco:                   ".$tb2->fields["nomcue"]);
			$this->ln();
			$this->cell(30,5,$tb2->fields["reflib"]);
			$this->setFont("Arial","",8);
			$this->cell(100,5,$tb2->fields["deslib"]);
			$this->cell(35,5,$tb2->fields["feclib"]);
			$this->setFont("Arial","B",8);
			$this->cell(35,5,number_format($tb2->fields["monmov"],2,'.',','));
			$this->setFont("Arial","",8);
			$this->ln();

			}

			while (!$tb->EOF)
			{
				if ($tb->fields["numcue"]!=$ref)
				{
				$this->setFont("Arial","B",8);
				$this->cell(100,5,"");
				$this->cell(35,5,"Total Imputado por Banco:");
				$this->cell(30,5,$monimp);
				$monimp=0;
				$this->ln(7);
				$this->setFont("Arial","B",8);
				$this->cell(30,5,"Numero Cuenta:    ".$tb->fields["numcue"]);
				$this->ln();
				$this->cell(40,5,"Banco:                   ".$tb->fields["nomcue"]);
				$this->ln();
				$this->cell(30,5,$tb->fields["reflib"]);
				$this->setFont("Arial","",8);
				$this->cell(100,5,$tb->fields["deslib"]);
				$this->cell(35,5,$tb->fields["feclib"]);
				$this->setFont("Arial","B",8);
				$this->cell(35,5,number_format($tb->fields["monmov"],2,'.',','));
				$this->setFont("Arial","",8);
				$this->ln();

				}
			//Detalle
			$ref=$tb->fields["numcue"];
			$this->cell(45,5,$tb->fields["codpre"]);
			$this->cell(120,5,$tb->fields["nompre"]);
			$this->cell(45,5,number_format($tb->fields["monimp"],2,'.',','));
			$monimp=$monimp+$tb->fields["monimp"];
			$tot=$tot+$tb->fields["monimp"];
			$this->ln();
			$tb->MoveNext();
			}


			$this->setFont("Arial","B",8);
			$this->SetTextColor(0,0,128);
			$this->cell(100,5,"");
			$this->cell(35,5,"TOTAL IMPUTADO");
			$this->cell(30,5,number_format($tot,2,'.',','));
		}
	}
?>
