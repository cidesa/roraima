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
			$this->gasto=$_POST["gasto"];
            $this->titulo=$_POST["titulo"];

			if (trim($this->gasto)=="T")
			{
				$this->sqlg="select codtip,destip,
						(select sum(coalesce(monto,0)) from forasiini a where fortiptit.codtip=a.codtip) as monto

						from fortiptit


						order by codtip";
			}
			else
			{
				$this->sqlg="select codtip,destip,
						(select sum(coalesce(monto,0)) from forasiini a where fortiptit.codtip=a.codtip) as monto

						from fortiptit

						where codtip='".$this->gasto."'

						order by codtip";
			}
		//H::printR($this->sqlg);exit;
		}


		function Header()
		{
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
				$this->cell(5,5,$tb3->fields["destip"]);
			}
			else
			{
				$this->cell(5,5,"TODAS");
			}
			/////////////////////

			$this->ln(10);

		}
		function Cuerpo()
		{

		    $tbg=$this->bd->select($this->sqlg);
			$this->setFont("Arial","",7);


			while (!$tbg->EOF)
			{

				$this->setFont("Arial","",7);

				$this->SetX(15);
				$this->cell(5,5,$tbg->fields["codtip"]);

				$this->SetX(25);
				$this->cell(5,5,$tbg->fields["destip"]);

				$this->setFont("Arial","B",7);
				$this->SetX(130);
				$this->cell(5,5,number_format($tbg->fields["monto"],2,'.',','),0,0,"R");

				$this->ln(4);

			$tbg->MoveNext();
			}


		}
	}
?>
