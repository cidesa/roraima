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
		var $sql;
		var $sql2;
		var $sql3;
		var $rep;
		var $numero;
		var $cab;
		var $numcom;
		var $refpag;
		var $ord1;
		var $ord2;
		var $status;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->ord1=$_POST["ord1"];
			$this->ord2=$_POST["ord2"];



			 $this->sql="SELECT
						DISTINCT B.NUMORD as NUMORD,
						B.NUMORD2 as NUMORD2,
						to_char(B.fecemi,'dd/mm/yyyy') as fecemi,
						B.NOMBEN,
						B.MONORD-B.MONRET as MONTOT,
						B.CTABAN,
						B.TIPCAU as TIPCAU,
						B.NUMTIQ,
						A.FECENV
						FROM
						TMPORDPAGDES2 A,
						OPORDPAG B
						WHERE
						A.NUMORD=B.NUMORD AND
						B.numord >='".$this->ord1."' and
						B.numord <='".$this->ord2."'
						UNION
						SELECT DISTINCT D.REFAJU,
						D.REFAJU as NUMORD2,
						to_char(D.fecaju,'dd/mm/yyyy') as fecemi,
						E.NOMBEN,
						D.TOTAJU,
						E.CTABAN,
						D.TIPAJU,
						E.NUMTIQ,
						C.FECENV
						FROM
						TMPORDPAGDES2 C,
						CPAJUSTE D,
						OPORDPAG E
						WHERE
						D.REFERE=E.NUMORD AND
						C.NUMORD=D.REFAJU AND
						C.numord >='".$this->ord1."' and
						C.numord <='".$this->ord2."' and
						d.refaju not in (select numord from opordpag)
						ORDER BY NUMORD";


			$this->cab=new cabecera();

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",8);

			$this->Rect(10,35,190,12);
			$this->SetX(15);
			$this->cell(5,5,"Orden de");
			$this->SetX(50);
			$this->cell(5,5,"Nombre o Razon Social");
			$this->SetX(111);
			$this->cell(5,5,"Fecha");
			$this->SetX(132);
			$this->cell(5,5,"Nro.");
			$this->SetX(150);
			$this->cell(5,5,"Tipo Orden");
			$this->SetX(181);
			$this->cell(5,5,"Monto");
			$this->ln(3);
			$this->SetX(17);
			$this->cell(5,5,"Pago");
			$this->SetX(110);
			$this->cell(5,5,"Emision");
			$this->SetX(131);
			$this->cell(5,5,"Ticket");
			$this->SetX(183);
			$this->cell(5,5,"Bs.");

			$this->ln(8);

		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$contador=0;
			$acum=0;


			while(!$tb->EOF)
			{
				$this->setFont("Arial","",7);

				$this->SetX(14);
				$this->cell(5,5,$tb->fields["numord2"]);

				$this->SetX(35);
				$this->cell(5,5,$tb->fields["nomben"]);

				$this->SetX(109);
				$this->cell(5,5,$tb->fields["fecemi"]);

				$this->SetX(129);
				$this->cell(5,5,$tb->fields["numtiq"]);

				///////////////
				$sqla="select coalesce(count(tipcau),0) as contador
						from cpdoccau where trim(tipcau)=trim('".$tb->fields["tipcau"]."')";
				$tba=$this->bd->select($sqla);
				$contador=$contador+1;

				if ($tba->fields["contador"]!=0)
				{
					$sqlb="select nomext as nombre
						from cpdoccau where trim(tipcau)=trim('".$tb->fields["tipcau"]."')";
					$tbb=$this->bd->select($sqlb);
				}
				else
				{
					$sqlb="select coalesce(max(nomext),0) as nombre
						from cpdoccom where trim(tipcom)=trim('".$tb->fields["tipcau"]."')";
					$tbb=$this->bd->select($sqlb);
				}

				if ($tbb->fields["nombre"]!=" ")
				{
					$nombre=$tbb->fields["nombre"];
				}
				else
				{
					$sqlc="select nomext as nombre
						from cpdocaju where trim(tipaju)=trim('".$tb->fields["tipcau"]."')";
					$tbc=$this->bd->select($sqlc);

					$nombre=$tbc->fields["nombre"];
				}

				$this->SetX(143);
				$this->cell(5,5,$nombre);

				///////////////
				$this->SetX(193);
				$this->cell(5,5,number_format($tb->fields["montot"],2,'.',','),0,0,'R');
				$acum=$acum+$tb->fields["montot"];

				$this->ln(4);

			$tb->MoveNext();
			}

			$this->ln(2);
			$this->setFont("Arial","B",8);
			$this->Setx(13);
			$this->cell(5,5,"Total Ordenes:    ".$contador);

			$this->line(173,$this->GetY(),198,$this->GetY());
			$this->Setx(150);
			$this->cell(5,5,"TOTAL Bs.:");
			$this->Setx(193);
			$this->cell(5,5,number_format($acum,2,'.',','),0,0,'R');


		}
	}
?>
