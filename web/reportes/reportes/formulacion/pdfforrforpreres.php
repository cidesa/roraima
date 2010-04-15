<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $sqla;
		var $sqla2;
		var $sqlg;
		var $sqlg1;
		var $sqlg2;
		var $rep;
		var $cab;
		var $titulo;
		var $formato;
		var $agr;
		var $agr2;
		var $filtro;
		var $ord;
		var $auxd=0;
		var $car;
		var $hasta;
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
			if ($_POST["agr2"]==""){
				$this->agr2=0;
			}
			else $this->agr2=$_POST["agr2"];
			$this->filtro=$_POST["filtro"];

			if ($_POST["gasto"]=="")
				$this->gasto='T';
			else $this->gasto=$_POST["gasto"];
						$this->titulo=$_POST["titulo"];


			//sacamos cuanto es la longitud de la cat
			$this->sqla="select sum(lonniv) + (count(catpar)-1) as suma, count(catpar) as cont
						from forniveles
						where catpar='C'";
			$tba=$this->bd->select($this->sqla);
			$this->loncat=$tba->fields["suma"];
			$this->cancat=$tba->fields["cont"];
			$desde=$tba->fields["cont"];

			//sacamos cuanto es la longitud de la cat
			$this->sqla="select sum(lonniv) + (count(catpar)-1) as suma
						from forniveles
						where catpar='P'";
			$tba=$this->bd->select($this->sqla);
			$this->lonpar=$tba->fields["suma"];

			//buscamos nombre y longitudes de partidas
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
			$i=count($this->lon2);


			// hasta donde agrupo partidas, para ponerlas negritas
			if ($this->agr2 == ($this->cancat+1) )
			{
				$this->sqla="select sum(lonniv) + (count(catpar)-1) as suma
						from forniveles
						where catpar='P' and consec <= ".$this->agr2." ";
				$tba=$this->bd->select($this->sqla);
				$this->hasta=$tba->fields["suma"];
				//$this->hasta=1;
			}
			else
			{
				$this->sqla="select sum(lonniv) + (count(catpar)-1) as suma
						from forniveles
						where catpar='P' and consec < ".$this->agr2." ";
				$tba=$this->bd->select($this->sqla);
				$this->hasta=$tba->fields["suma"];
			}

			/////////////////////////////////////
			$sql="select substr(forpre,".$this->loncat."+2,".$this->lonpar.") as forpre from fordefniv";
			//H::printR($sql);exit;
			$tb=$this->bd->select($sql);
			$this->formato=$tb->fields["forpre"];

			//////////////////////////////////////////////////////////
			if (trim($this->gasto)=="T")
			{
				$j=0;
					$this->sqlg1="select codpre as buscar2,sum(monto) as monto
						from forasiini where perpre='00' and codpre like '".$this->filtro."%'
						group by codpre
						having codpre is not null and sum(monto)<>0 ";

				$j=1;
				$this->sqlg2="";
				$lon=$this->lon2[0];
				while ($j<$i)
				{
					//$lon= $lon+$this->lon2[$j]+1;

					$this->sqlg2= $this->sqlg2." union select codpre as buscar2,sum(monto) as monto
						from forasiini where perpre='00' and codpre like '".$this->filtro."%'
						group by codpre
						having codpre is not null and sum(monto)<>0";
						$j++;
				}
				 $this->sqlg = $this->sqlg1.$this->sqlg2;
				 //H::printR($this->sqlg);exit;
			}
			else
			{
				$j=0;
					$this->sqlg1="select codpre as buscar2,sum(monto) as monto
						from forasiini where perpre='00' and codtip='".$this->gasto."'
						and codpre like '".$this->filtro."%'
						group by codpre
						having codpre is not null and sum(monto)<>0 ";

				$j=1;
				$this->sqlg2="";
				$lon=$this->lon2[0];
				while ($j<$i)
				{

					//$lon= $lon+$this->lon2[$j]+1;


				$this->sqlg2= $this->sqlg2." union select codpre as buscar2 ,sum(monto) as monto
						from forasiini where perpre='00' and codtip='".$this->gasto."'
						and codpre like '".$this->filtro."%'
						group by codpre
						having codpre is not null and sum(monto)<>0";
						$j++;

				}
				$this->sqlg = $this->sqlg1.$this->sqlg2;
				//exit;

					/*


					$lon= $lon+$this->lon2[$j]+1;


				$this->sqlg2= $this->sqlg2." union select substr(codpre,".$this->loncat."+2,".$lon.") as buscar2,sum(monto) as monto
						from forasiini where perpre='00' and codtip='".$this->gasto."'
						and substr(codpre,".$this->loncat."+2,".$lon.") like '".$this->filtro."%'
						group by substr(codpre,".$this->loncat."+2,".$lon.")
						having substr(codpre,".$this->loncat."+2,".$lon.") is not null and sum(monto)<>0";
						$j++;*/

			}

		}

		function Header()
		{

			/////////////////////
			$sql="select nomext from forniveles where consec=".$this->agr2." ";
			$tb=$this->bd->select($sql);
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
				$this->cell(5,5,$tb->fields["nomext"]." y ".$tb3->fields["destip"]);
			}
			else
			{
				$this->cell(5,5,$tb->fields["nomext"]." y TODAS");
			}
			/////////////////////

			$this->setFont("Arial","B",8);
			$this->SetXY(10,45);
			$this->cell(30,3,"CODIGO");
			$this->SetXY(60,45);
			$this->cell(30,3,"DENOMINACION");
			$this->SetXY(170,45);
			$this->cell(10,3,"MONTO");
			$this->Line(10,49,200,49);
			$this->ln(15);


		}
		function Cuerpo()
		{

				$tbg=$this->bd->select($this->sqlg);

				//print($this->sqlg);
			$this->setFont("Arial","",7);
			$this->formato=str_replace("#","0",$this->formato);


			while (!$tbg->EOF)
			{

				$par=substr($tbg->fields["buscar2"],9);

				$sql="select nomparegr as nom from fordefparegr where trim(codparegr)=trim('".$par."')";
				$tb=$this->bd->select($sql);

					$y=$this->GetY();
				if ($y>=250)
				{
					$this->ln(500);
					$this->cell(1,5,"");
				}

				if ( strlen($par) <= $this->hasta )
				{
					$this->setFont("Arial","B",7);
				}
				else
				{
					$this->setFont("Arial","",7);
				}

				$resta = $this->lonpar - strlen($par);
				$concat=substr($this->formato,strlen($par),$resta);
				$par= $par.$concat;

				$this->SetX(12);
				$this->cell(5,5,$par);

				$this->SetX(180);
				$this->cell(5,5,number_format($tbg->fields["monto"],2,'.',','),0,0,"R");

				$this->SetX(40);
				$this->multicell(90,5,(strtoupper($tb->fields["nom"])));

				$this->ln(4);


			$tbg->MoveNext();
			}


		}
	}
?>
