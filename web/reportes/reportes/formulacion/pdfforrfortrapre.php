<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $sqla;
		var $sqla2;
		var $sqlb;
		var $sqlg;
		var $rep;
		var $cab;
		var $titulo;
		var $agr;
		var $agr2;
		var $filtro;
		var $filtro2;
		var $ord;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;
		var $cantcat=0;
		var $loncat=0;
		var $cancat=0;
		var $lonpar=0;
		var $canpar=0;
		var $nombre=array();
		var $nombre2=array();
		var $lon=array();
		var $lon2=array();

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->agr=$_POST["agr"];
			if ($this->agr==""){
				$this->agr=0;
			}
			$this->filtro=$_POST["filtro"];
			$this->filtro1=$_POST["filtro1"];
			$this->filtro2=$_POST["filtro2"];
            $this->titulo=$_POST["titulo"];
			//buscamos nombre del grupo
			$sq="select nomext,lonniv from forniveles where catpar='C' and consec <= ".$this->agr." order by consec";
			$t=$this->bd->select($sq);
			$i=0;
			while (!$t->EOF)
			{
				$this->nombre[$i] = $t->fields["nomext"];
				$this->lon[$i] = $t->fields["lonniv"];

			$i++;
			$t->MoveNext();
			}
			$desde=count($this->nombre);

			//sacamos cuanto es la longitud de la cat y cuantas son
			$this->sqla="select sum(lonniv) + (count(catpar)-1) as suma, count(catpar) as cont
						from forniveles
						where catpar='C'";
			$tba=$this->bd->select($this->sqla);
			$this->loncat=$tba->fields["suma"];
			$this->cancat=$tba->fields["cont"];

			// sacamos hasta donde vamos a agrupar las categorias
			$this->sqlb="select sum(lonniv) + (count(catpar)-1) as agrup
						from forniveles
						where catpar='C' and consec <= '".$this->agr."'";
			$tbb=$this->bd->select($this->sqlb);
			$this->agrup=$tbb->fields["agrup"];
			$this->falta=$this->loncat - $this->agrup - 1;
			//////////////////////////////////////////////////////////
			if ($tbb->fields["agrup"]==""){
				$this->agrup=0;
			}

			$this->sqlg="select
						substr(x.cat,1,".$this->agrup.") as cat,
						x.par as par,
						x.codorg as codorg,
						x.monto as monto

						from

						(select codcat as cat, codparegr as par, codorg, monto
						from forotrdistra

						union

						select distinct(b.codcat) as cat, a.codparegr as par,
						a.codorg as codorg, a.monto as monto
						from formetdistra a, forasipreact b
						where
						a.codmet=b.codmet and a.codparegr=b.codparegr) x, fordeforgpub y

						where

						x.codorg=y.codorg and
						x.par >= ('".$this->filtro1."') and x.par <= ('".$this->filtro2."') and
						substr(x.cat,1,".$this->agrup.") like ('".$this->filtro."%')


						group by substr(x.cat,1,".$this->agrup."),x.par,x.codorg,x.monto

						order by substr(x.cat,1,".$this->agrup.")";

						//H::printR($this->sqlg);exit;
						}


		function Header()
		{
			/////////////////////
			$sql="select nomext from forniveles where consec=".$this->agr." ";
			$tb=$this->bd->select($sql);

			$this->Image("../../img/logo_1.jpg",12,12,15);
			/////////////////////

			$this->Rect(10,10,190,30);
			$this->setFont("Arial","",6);
			$this->SetY(11);
			//$this->SetX(45);
			//$this->cell(5,5,"JOSE FELIX RIBAS");
			$this->SetY(13);
			$this->SetX(45);
			//$this->cell(5,5,"DIRECCION DE PRESUPUESTO");
			$this->SetY(11);
			$this->SetX(175);
			$this->cell(10,5,"FECHA");
			$this->setFont("Arial","",7);
			//$this->SetY(15);
			//$this->SetX(183);
			$this->cell(20,5,date('d/m/y'));
			$this->setFont("Arial","B",14);
			$this->SetY(25);
			$this->SetX(62);
			$this->cell(5,5,$this->titulo);
			$this->setFont("Arial","",7);
			$this->SetY(35);
			$this->SetX(90);
			$this->cell(5,5,"PRESUPUESTO   ");
			$this->setFont("Arial","B",7);
			$this->SetX(110);
			$this->cell(5,5,date('Y'));
			$this->setFont("Arial","",7);

			$this->SetY(16);
			$this->SetX(175);
			$this->cell(5,5,'Pagina ' . $this->PageNo() . ' de {nb}');

	        $this->SetY(35);
			$this->setFont("Arial","B",7);
			$this->SetTextColor(140,0,0);
			$this->SetX(140);
			$this->cell(5,5,"Agrupado por: ");
			$this->SetX(160);
			$this->SetTextColor(0,0,0);
			$this->cell(5,5,trim($tb->fields["nomext"]));
			/////////////////////

			$this->ln(10);

		}
		function Cuerpo()
		{

		    $tbg=$this->bd->select($this->sqlg);
			$tbg2=$this->bd->select($this->sqlg);
			$this->setFont("Arial","B",7);
			$acum=0;

			if (!$tbg2->EOF)
			{
				$cate=$tbg->fields["cat"];
				$this->SetX(10);

				//pinta titulos
				$i=count($this->nombre);
				$categoria= array();
				$categoria=split("-",trim($tbg2->fields["cat"]));
				$cat="";
				$x=32;
				for ($j=0;$j<$i;$j++)
				{
					if ($j==0)
					{
						$cat=$categoria[$j];
						$this->setFont("Arial","B",7);
					}
					else
					{
						$cat=$cat."-".$categoria[$j];
						$this->setFont("Arial","",7);
					}
					$this->cell(5,5,strtoupper($this->nombre[$j]).": ");
					$sql="select codcat,nomcat from fordefcatpre where trim(codcat)=trim('".$cat."')";
					$tb=$this->bd->select($sql);
					$this->SetX($x);
					$this->cell(5,5,trim(substr($tb->fields["codcat"],strlen(trim($tb->fields["codcat"]))-$this->lon[$j],strlen(trim($tb->fields["codcat"]))))."    ".strtoupper($tb->fields["nomcat"]));
					$this->ln(3);
					$x=$x+5;
				}
				$this->ln();

			}

			while (!$tbg->EOF)
			{

				if ($tbg->fields["cat"] != $cate)
				{

						$this->line(165,$this->GetY(),192,$this->GetY());
						$this->SetX(185);
						$this->setFont("Arial","B",7);
						$this->cell(5,5,number_format($acum,2,'.',','),0,0,"R");

						$this->AddPage();
						$acum=0;

						//pinta titulos
						$i=count($this->nombre);
						$categoria= array();
						$categoria=split("-",trim($tbg->fields["cat"]));
						$cat="";
						$x=32;
						for ($j=0;$j<$i;$j++)
						{
							if ($j==0)
							{
								$cat=$categoria[$j];
								$this->setFont("Arial","B",7);
							}
							else
							{
								$cat=$cat."-".$categoria[$j];
								$this->setFont("Arial","",7);
							}
							$this->cell(5,5,strtoupper($this->nombre[$j]).": ");
							$sql="select codcat,nomcat from fordefcatpre where trim(codcat)=trim('".$cat."')";
							$tb=$this->bd->select($sql);
							$this->SetX($x);
							$this->cell(5,5,trim(substr($tb->fields["codcat"],strlen(trim($tb->fields["codcat"]))-$this->lon[$j],strlen(trim($tb->fields["codcat"]))))."    ".strtoupper($tb->fields["nomcat"]));
							$this->ln(3);
							$x=$x+5;
						}
						$this->ln();



				}

			//DETALLE
			$cate= $tbg->fields["cat"];

			$this->setFont("Arial","",7);

			$this->SetX(12);
			$this->cell(5,5,$tbg->fields["par"]);

			$sql="Select nomorg from fordeforgpub where codorg = '".$tbg->fields["codorg"]."'";
			$tb=$this->bd->select($sql);
			$this->SetX(37);
			$this->cell(5,5,$tb->fields["nomorg"]);

			$this->SetX(185);
			$this->cell(5,5,number_format($tbg->fields["monto"],2,'.',','),0,0,"R");

			$acum = $acum + $tbg->fields["monto"];

			$this->Ln(4);

			$tbg->MoveNext();
			}

			$this->line(165,$this->GetY(),192,$this->GetY());
			$this->SetX(185);
			$this->setFont("Arial","B",7);
			$this->cell(5,5,number_format($acum,2,'.',','),0,0,"R");
		}
	}
?>
