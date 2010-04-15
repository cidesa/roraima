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
		var $sqla;
		var $sqlb;
		var $numcue;
		var $salant;
		var $antban;
		var $rep;
		var $numero;
		var $cab;
		var $cta1;
		var $cta2;
		var $mov1;
		var $mov2;
		var $ref1;
		var $ref2;
		var $fecham1;
		var $fecham2;
		var $cod1;
		var $cod2;
		var $deb;
		var $cre;
		var $status;
		var $auxd=0;
		var $car;
		var $acumsalant=0;
		var $acumdeb=0;
		var $acumcre=0;
		var $acumsal=0;
		var $sal=0;

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
			$this->mov1=$_POST["mov1"];
			$this->mov2=$_POST["mov2"];
			$this->ref1=$_POST["ref1"];
			$this->ref2=$_POST["ref2"];
			$this->fecham1=$_POST["fecham1"];
			$this->fecham2=$_POST["fecham2"];
			$this->status=strtoupper($_POST["status"]);

			if ($this->status=='T')
			{
				$this->sql="select a.numcue,a.nomcue,rtrim(b.tipmov) as tipmov,b.refban,b.desban,to_char(b.fecban,'dd/mm/yyyy') as fecban,c.orden,
						c.debcre, coalesce(b.monmov,0) as mon, a.antban
						from tsdefban a, tsmovban b, tstipmov c
						where rtrim(a.numcue) = rtrim(b.numcue) and rtrim(b.tipmov) = rtrim(c.codtip) and
						rtrim(b.numcue) >= rtrim('".$this->cta1."') and rtrim(b.numcue) <= rtrim('".$this->cta2."') and
						rtrim(b.tipmov) >= rtrim('".$this->mov1."')  and rtrim(b.tipmov) <= rtrim('".$this->mov2."')  and
						b.fecban >= to_date('".$this->fecham1."','dd/mm/yyyy') and b.fecban <= to_date('".$this->fecham2."','dd/mm/yyyy') and
						rtrim(b.refban) >= rtrim('".$this->ref1."') and rtrim(b.refban) <= rtrim('".$this->ref2."')
						order by b.numcue, b.fecban, c.orden, b.tipmov, b.refban";
			}
			else
			{
				$this->sql="select a.numcue,a.nomcue,rtrim(b.tipmov) as tipmov,b.refban,b.desban,to_char(b.fecban,'dd/mm/yyyy') as fecban,c.orden,
						c.debcre, coalesce(b.monmov,0) as mon, a.antban
						from tsdefban a, tsmovban b, tstipmov c
						where rtrim(a.numcue) = rtrim(b.numcue) and rtrim(b.tipmov) = rtrim(c.codtip) and
						rtrim(b.numcue) >= rtrim('".$this->cta1."') and rtrim(b.numcue) <= rtrim('".$this->cta2."') and
						rtrim(b.tipmov) >= rtrim('".$this->mov1."')  and rtrim(b.tipmov) <= rtrim('".$this->mov2."')  and
						b.fecban >= to_date('".$this->fecham1."','dd/mm/yyyy') and b.fecban <= to_date('".$this->fecham2."','dd/mm/yyyy') and
						rtrim(b.refban) >= rtrim('".$this->ref1."') and rtrim(b.refban) <= rtrim('".$this->ref2."') and
						b.status='".$this->status."'
						order by b.numcue, b.fecban, c.orden, b.tipmov, b.refban";
			}


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
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			/*for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln();
			/*for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}*/
			//$this->ln();
			//$this->Line(10,50,270,50);
			}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$this->bd->validar();

			$this->setFont("Arial","B",8);
			$this->SetTextColor(0,0,129);
			$this->cell(25,5,"Del  ".$this->fecham1."   -    ");
			$this->cell(25,5,"Al  ".$this->fecham2);
			$this->ln();
			$this->ln();
			$this->SetTextColor(0,0,0);
//primero
			if (!$tb2->EOF)
			{
				$this->numcue=$tb2->fields["numcue"];
				$this->antban=$tb2->fields["antban"];
				$ref=$tb2->fields["numcue"];
				$this->setFont("Arial","B",8);
				$this->Line(10,$this->GetY(),200,$this->GetY());
				$this->cell(25,5,"Banco            ".strtoupper($tb2->fields["nomcue"]));
				$this->ln();
				$this->cell(25,5,"Nro. Cuenta   ".$tb2->fields["numcue"]);
				$this->ln();

			$this->Line(10,$this->GetY(),200,$this->GetY());
				$this->cell(10,5,"Tipo");
				$this->cell(17,5,"Refer.");
				$this->cell(60,5,"Descripción");
				$this->cell(20,5,"Fecha");
				$this->cell(30,5,"Débitos");
				$this->cell(30,5,"Créditos");
				$this->cell(30,5,"Saldo Act.");
				$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
				$this->ln();
				$this->sqla="select coalesce(b.monmov,0) as mon, a.debcre
				     from tstipmov a, tsmovban b, contaba c
					 where rtrim(a.codtip) = rtrim(b.tipmov) and
					 rtrim(b.numcue) = rtrim('".$this->numcue."') and
					 b.fecban<to_date('".$this->fecham1."','dd/mm/yyyy') and b.fecban>=c.fecini";
					 $tba=$this->bd->select($this->sqla);
					 $this->deb=0;
					 $this->cre=0;
					 while (!$tba->EOF)
					 {
					 	if (strtoupper($tba->fields["debcre"])=='D')
						{
							$this->deb=$this->deb+$tba->fields["mon"];
						}
					 	if (strtoupper($tba->fields["debcre"])=='C')
						{
							$this->cre=$this->cre+$tba->fields["mon"];
						}

					 $tba->MoveNext();
					 }
					 $this->salant=$this->antban+$this->deb-$this->cre;

			}
// ciclo a partir del segundo

			while (!$tb->EOF)
			{
				if ($tb->fields["numcue"]!=$ref)
				{

					$this->Line(90,$this->GetY(),200,$this->GetY());
					$this->setFont("Arial","B",7);
					$this->cell(80,5,"");
					$this->cell(20,5,"TOTALES");
					$this->cell(30,5,number_format($this->acumdeb,2,',','.'),0,0,'R');
					$this->cell(29,5,number_format($this->acumcre,2,',','.'),0,0,'R');
					$this->cell(30,5,number_format($this->acumdeb-$this->acumcre,2,',','.'),0,0,'R');
					$this->ln();

					$this->acumdeb=0;
					$this->acumcre=0;
					$this->ln();
					$this->setFont("Arial","B",8);
					$this->Line(10,$this->GetY(),200,$this->GetY());
					$this->cell(25,5,"Banco            ".strtoupper($tb->fields["nomcue"]));
					$this->ln();
					$this->cell(25,5,"Nro. Cuenta   ".$tb->fields["numcue"]);
					$this->ln();
					$this->Line(10,$this->GetY(),200,$this->GetY());

					$this->cell(10,5,"Tipo");
					$this->cell(17,5,"Refer.");
					$this->cell(60,5,"Descripción");
					$this->cell(20,5,"Fecha");
					$this->cell(30,5,"Débitos");
					$this->cell(30,5,"Créditos");
					$this->cell(30,5,"Saldo Act.");
					$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
					$this->ln();
					$this->sqlb="select coalesce(b.monmov,0) as mon, a.debcre
				     from tstipmov a, tsmovban b, contaba c
					 where rtrim(a.codtip) = rtrim(b.tipmov) and
					 rtrim(b.numcue) = rtrim('".$this->numcue."') and
					 b.fecban<to_date('".$this->fecham1."','dd/mm/yyyy') and b.fecban>=c.fecini";
					 $tbb=$this->bd->select($this->sqlb);
					 $this->deb=0;
					 $this->cre=0;
					 while (!$tbb->EOF)
					 {
					 	if (strtoupper($tbb->fields["debcre"])=='D')
						{
							$this->deb=$this->deb+$tbb->fields["mon"];
						}
					 	if (strtoupper($tbb->fields["debcre"])=='C')
						{
							$this->cre=$this->cre+$tbb->fields["mon"];
						}

					 $tbb->MoveNext();
					 }
					  $this->salant=$this->antban+$this->deb-$this->cre;
				}
			//Detalle

			$this->setFont("Arial","",7);
			$ref=$tb->fields["numcue"];
			$this->cell(10,5,$tb->fields["tipmov"]);
			$this->cell(17,5,$tb->fields["refban"]);

			$this->cell(60,5,"         ");

			$this->cell(20,5,$tb->fields["fecban"]);



			if (strtoupper($tb->fields["debcre"])=='D')
			{
				$this->cell(21,5,number_format($tb->fields["mon"],2,',','.'),0,0,'R');
				$this->cell(30,5,number_format(0,2,',','.'),0,0,'R');
				$this->acumdeb=$this->acumdeb+$tb->fields["mon"];
				$deb=$tb->fields["mon"];
				$cre=0;
			}
			else

			{
				$this->cell(21,5,number_format(0,2,',','.'),0,0,'R');
				$this->cell(30,5,number_format($tb->fields["mon"],2,',','.'),0,0,'R');
				$this->acumcre=$this->acumcre+$tb->fields["mon"];
				$cre=$tb->fields["mon"];
				$deb=0;
			}

			$this->sal=$this->salant+$deb-$cre;
			$this->cell(30,5,number_format($this->sal,2,',','.'),0,0,'R');

			$this->SetX(35);
			$this->multicell(60,3,$tb->fields["desban"]);

			$this->acumsal=$this->acumsal+$this->sal;
			$this->salant=$this->sal;


			$this->ln();
			$tb->MoveNext();
			}
			$this->Line(90,$this->GetY(),200,$this->GetY());
					$this->setFont("Arial","B",7);
					$this->cell(80,5,"");
					$this->cell(20,5,"TOTALES");
					$this->cell(30,5,number_format($this->acumdeb,2,',','.'),0,0,'R');
					$this->cell(29,5,number_format($this->acumcre,2,',','.'),0,0,'R');
					$this->cell(30,5,number_format($this->acumdeb-$this->acumcre,2,',','.'),0,0,'R');


		}
	}
?>
