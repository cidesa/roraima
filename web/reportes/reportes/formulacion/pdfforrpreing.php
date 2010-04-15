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
			$this->agr2=$_POST["agr2"];
			$this->filtro=$_POST["filtro"];
            $this->titulo=$_POST["titulo"];
//para que corra sin datos
            if ($this->agr2=="")
            {
            	$this->agr2=0;
            }


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
			$tb=$this->bd->select($sql);
			$this->formato=$tb->fields["forpre"];

			//////////////////////////////////////////////////////////
			$j=0;
		//para que corra sin datos
            if ( $this->lon2[$j]=="")
            {
            	 $this->lon2[$j]=0;
            }
				$this->sqlg1="
					select
					substr(codparing,1,".$this->lon2[$j].") as buscar2, sum(montoing) as monto
					from forparing
					where substr(codparing,1,".$this->lon2[$j].") like '".$this->filtro."%'
					group by
					substr(codparing,1,".$this->lon2[$j].")
					having substr(codparing,1,".$this->lon2[$j].") is not null and sum(montoing)<>0 ";

			$j=1;
			$this->sqlg2="";
			$lon=$this->lon2[0];
			while ($j<$i)
			{
		//para que corra sin datos
            if ( $this->lon2[$j]=="")
            {
            	 $this->lon2[$j]=0;
            }
				$lon= $lon + $this->lon2[$j]+1;
				$this->sqlg2= $this->sqlg2." union
					select
					substr(codparing,1,".$lon.") as buscar2,sum(montoing) as monto
					from forparing
					where substr(codparing,1,".$lon.") like '".$this->filtro."%'
					group by
					substr(codparing,1,".$lon.")
					having substr(codparing,1,".$lon.") is not null and sum(montoing)<>0";
					$j++;
			}
			 $this->sqlg = $this->sqlg1.$this->sqlg2;

 /*print $this->sqlg;
			 exit ;*/

		}


		function Header()
		{
			$this->Image("../../img/logo_1.jpg",10,8,33);
			/////////////////////
			$sql="select nomext from forniveles where consec=".$this->agr2." ";
			$tb=$this->bd->select($sql);

			$this->Rect(10,10,190,30);
			$this->setFont("Arial","",6);
			$this->SetY(11);
			$this->SetX(45);
			$this->cell(5,5,"JOSE FELIX RIBAS");
			$this->SetY(13);
			$this->SetX(45);
			$this->cell(5,5,"DIRECCION DE PRESUPUESTO");
			$this->setFont("Arial","",7);
			$this->SetY(11);
			$this->SetX(184);
			$this->cell(5,5,"FECHA");
			$this->setFont("Arial","",8);
			$this->SetY(15);
			$this->SetX(183);
			$this->cell(5,5,date('d/m/y'));
			$this->setFont("Arial","B",14);
			$this->SetY(25);
			$this->SetX(62);
			$this->cell(5,5,$this->titulo);
			$this->setFont("Arial","",7);
			$this->SetY(35);
			$this->SetX(10);
			$this->cell(5,5,"PRESUPUESTO   ");
			$this->setFont("Arial","B",7);
			$this->SetX(30);
			$this->cell(5,5,date('Y'));
			$this->setFont("Arial","",7);
			$this->SetY(35);
			$this->SetX(185);
			$this->cell(5,5,"Pag. ".$this->PageNo());

			$this->SetY(35);
			$this->setFont("Arial","B",7);
			$this->SetTextColor(140,0,0);
			$this->SetX(100);
			$this->cell(5,5,"Agrupado por: ");
			$this->SetX(120);
			$this->SetTextColor(0,0,0);
			$this->cell(5,5,$tb->fields["nomext"]);
			/////////////////////

			$this->ln(10);

		}
		function Cuerpo()
		{

		    $tbg=$this->bd->select($this->sqlg);
			$this->setFont("Arial","",7);
			$this->formato=str_replace("#","0",$this->formato);


			while (!$tbg->EOF)
			{

				$par=trim($tbg->fields["buscar2"]);

				$sql="select nomparing from fordefparing where trim(codparing)='".$par."' ";
				$tb=$this->bd->select($sql);


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

				$this->SetX(40);
				$this->cell(5,5,substr(strtoupper($tb->fields["nomparing"]),0,80));

				$this->SetX(190);
				$this->cell(5,5,number_format($tbg->fields["monto"],2,'.',','),0,0,"R");

				$this->ln(4);

			$tbg->MoveNext();
			}


		}
	}
?>
