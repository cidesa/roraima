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
			if ($_POST["agr"]==""){
				$this->agr=0;
			}
			else $this->agr=$_POST["agr"];
			if ($_POST["agr2"]==""){
				$this->agr2=0;
			}
			else $this->agr2=$_POST["agr2"];
			$this->filtro=$_POST["filtro"];
			$this->filtro2=$_POST["filtro2"];
			$this->gasto=$_POST["gasto"];
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
			//buscamos nombre del grupo 2
			$sq="select nomext,lonniv from forniveles where catpar='P' and consec>".$desde." and consec <= ".$this->agr2." order by consec";
			$t=$this->bd->select($sq);
			$i=0;
			while (!$t->EOF)
			{
				$this->nombre2[$i] = $t->fields["nomext"];
				$this->lon2[$i] = $t->fields["lonniv"];

			$i++;
			$t->MoveNext();
			}


			//sacamos cuanto es la longitud de la cat y cuantas son
			$this->sqla="select sum(lonniv) + (count(catpar)-1) as suma, count(catpar) as cont
						from forniveles
						where catpar='C'";
			$tba=$this->bd->select($this->sqla);
			$this->loncat=$tba->fields["suma"];
			$this->cancat=$tba->fields["cont"];
			//sacamos cuanto es la longitud de la par y cuantas son
			$this->sqla="select sum(lonniv) + (count(catpar)-1) as suma, count(catpar) as cont
						from forniveles
						where catpar='P'";
			$tba=$this->bd->select($this->sqla);
			$this->lonpar=$tba->fields["suma"];
			$this->canpar=$tba->fields["cont"];


			//sacamos cuanto es la longitud de la part
			$this->sqla2="select sum(lonniv) + (count(catpar)-1) as suma
						from forniveles
						where catpar='P'";
			$tba2=$this->bd->select($this->sqla2);
			$this->lonpar=$tba2->fields["suma"];
			//////////////////////////////////////////////////////////
			// sacamos hasta donde vamos a agrupar las categorias
			$this->sqlb="select sum(lonniv) + (count(catpar)-1) as agrup
						from forniveles
						where catpar='C' and consec <= '".$this->agr."'";
			$tbb=$this->bd->select($this->sqlb);
			if ($tbb->fields["agrup"]==""){
				$this->agrup=0;
			}
			else $this->agrup=$tbb->fields["agrup"];
			$this->falta=$this->loncat - $this->agrup - 1;
			//////////////////////////////////////////////////////////
			// sacamos hasta donde vamos a agrupar las partidas
			$this->sqlb="select sum(lonniv) + (count(catpar)-1) as agrup
						from forniveles
						where catpar='P' and consec>'".$desde."' and consec <= '".$this->agr2."'";
			$tbb=$this->bd->select($this->sqlb);
			if ($tbb->fields["agrup"]==""){
				$this->agrup2=0;
			}
			else $this->agrup2=$tbb->fields["agrup"];
			$this->falta2=$this->lonpar - $this->agrup2 - 1;
			//////////////////////////////////////////////////////////

			if (trim($this->gasto)=="T")
			{
				$this->sqlg="select
						substr(codpre,1,".$this->agrup.") as buscar,
						substr(codpre,".$this->loncat."+2,".$this->agrup2.") as buscar2,
						sum(monto) as monto

						from forasiini

						where perpre='00' and
						substr(codpre,".$this->loncat."+2,".$this->agrup2.") like '".trim($this->filtro)."%' and
						substr(codpre,1,".$this->agrup.") like '".trim($this->filtro2)."%'

						group by
						substr(codpre,1,".$this->agrup."),
						substr(codpre,".$this->loncat."+2,".$this->agrup2.")

						order by substr(codpre,1,".$this->agrup."),
						substr(codpre,".$this->loncat."+2,".$this->agrup2.") ";
			}
			else
			{
				$this->sqlg="select
						substr(codpre,1,".$this->agrup.") as buscar,
						substr(codpre,".$this->loncat."+2,".$this->agrup2.") as buscar2,
						sum(monto) as monto

						from forasiini

						where perpre='00' and
						substr(codpre,".$this->loncat."+2,".$this->agrup2.") like '".trim($this->filtro)."%' and
						substr(codpre,1,".$this->agrup.") like '".trim($this->filtro2)."%' and
						codtip='".$this->gasto."'

						group by
						substr(codpre,1,".$this->agrup."),
						substr(codpre,".$this->loncat."+2,".$this->agrup2.")

						order by substr(codpre,1,".$this->agrup."),
						substr(codpre,".$this->loncat."+2,".$this->agrup2.") ";

			}

			//H::printR($this->sqlg);exit;

		}


		function Header()
		{

			/////////////////////
			$sql="select nomext from forniveles where consec=".$this->agr." ";
			$tb=$this->bd->select($sql);
			$sql2="select nomext from forniveles where consec=".$this->agr2." ";
			$tb2=$this->bd->select($sql2);
			$sql3="select destip from fortiptit where codtip='".$this->gasto."' ";
			$tb3=$this->bd->select($sql3);

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
			if ($this->gasto!="T")
			{
				$this->cell(5,5,trim($tb->fields["nomext"]).", ".trim($tb2->fields["nomext"])." y ".trim($tb3->fields["destip"]));
			}
			else
			{
				$this->cell(5,5,trim($tb->fields["nomext"]).", ".trim($tb2->fields["nomext"])." y TODAS");
			}
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
				$cod=$tbg->fields["buscar"];
				$this->SetX(10);

				//pinta titulos
				$i=count($this->nombre);
				$categoria= array();
				$categoria=split("-",trim($tbg2->fields["buscar"]));
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

				//$tbg->MoveNext();
				//$tbg2->MoveNext();
			}

			while (!$tbg->EOF)
			{

				//cuando pase de nivel1
				if ( (trim($tbg->fields["buscar"])) != (trim($cod)))
				{
					$this->SetX(190);
					$this->Line(175,$this->GetY(),195,$this->GetY());
					$this->cell(5,5,number_format($acum,2,'.',','),0,0,"R");

					$acum=0;
					$this->AddPage();


					//pinta titulos
					$i=count($this->nombre);
					$categoria= array();
					$categoria=split("-",trim($tbg->fields["buscar"]));
					$cat="";
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
			$cod=$tbg->fields["buscar"];

			$this->setFont("Arial","",7);
			$this->SetX(15);
			$this->cell(5,5,$tbg->fields["buscar2"]);
			$sqlc="select nomparegr as nompar from fordefparegr where trim(codparegr) = trim('".$tbg->fields["buscar2"]."') ";
			$tbc=$this->bd->select($sqlc);
			$this->SetX(40);
			$this->cell(5,5,substr(strtoupper($tbc->fields["nompar"]),0,80));

			$this->SetX(190);
			$this->cell(5,5,number_format($tbg->fields["monto"],2,'.',','),0,0,"R");
			$acum=$acum+$tbg->fields["monto"];
			$this->ln(4);

				if ($this->GetY()>=240)
				{
					$this->AddPage();
					$this->SetX(10);

					//pinta titulos
					$i=count($this->nombre);
					$categoria= array();
					$categoria=split("-",trim($tbg->fields["buscar"]));
					$cat="";
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

			$tbg->MoveNext();
			}

			$this->SetX(190);
			$this->Line(175,$this->GetY(),195,$this->GetY());
			$this->cell(5,5,number_format($acum,2,'.',','),0,0,"R");


		}
	}
?>
