<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/tesoreria/Tsrvoucher_n.class.php");

	class pdfreporte extends fpdf
	{
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $sql1;
		var $sql1b;
		var $sql1c;
		var $sql2;
		var $sql3;
		var $sqlb;
		var $che1;
		var $che2;
		var $hecho;
		var $revi;
		var $conta;
		var $audi;

		var $mes;
		var $ano;
		var $apro;
		var $ela;
		var $cod1;
		var $cod2;
		var $deb;
		var $cre;
		var $status;
		var $auxd=0;
		var $car;
		var $acumsalant=0;
		var $acumdeb=0;
		var $acumlib=0;
		var $acumban=0;
		var $acumlib2=0;
		var $acumban2=0;
		var $sal=0;
		var $fecha;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Legal");
			//$this->bd=new basedatosAdo();
			$this->bd=new Tsrvoucher_n();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numchedes=str_replace('*',' ',H::GetPost("numchedes"));
			$this->numchehas=str_replace('*',' ',H::GetPost("numchehas"));
			$this->hecho=str_replace('*',' ',H::GetPost("hecho"));
			$this->revi=str_replace('*',' ',H::GetPost("revi"));
			$this->apro=str_replace('*',' ',H::GetPost("apro"));
			$this->conta=str_replace('*',' ',H::GetPost("conta"));
			$this->audi=str_replace('*',' ',H::GetPost("audi"));
			$this->arrp=$this->bd->sqlp($this->numchedes,$this->numchehas);
			$this->arrp2=$this->bd->sqlp2($this->numchedes,$this->numchehas);
			$this->arrp3=$this->bd->sqlpx($this->numchedes,$this->numchehas);
			$this->arrp4=$this->bd->sqlpz($this->numchedes,$this->numchehas);
			$this->llenartitulosmaestro();
		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="";
				$this->titulos[1]="Cuenta";
				$this->titulos[2]="Uso";
				$this->titulos[3]="Saldo Anterior";
				$this->titulos[4]="Débitos";
				$this->titulos[5]="Créditos";
				$this->titulos[6]="Saldo Segun Libros";

		}

		function Header()
		{
			$this->setFont("Arial","B",11);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);


			$this->setFont("Arial","B",11);

		}

		function Cuerpo()
		{
			$this->setFont("Arial","B",9);
			$i=0;
			$a=0;
			$b=0;
			$cont=0;
			//------------------------------------------------------------------------------------------------
			foreach($this->arrp as $cheque)//while
			{
				$this->numcom=$cheque["numcom"];
				$this->setFont("Arial","B",10);
				$this->SetXY(160,55);//13
				$this->cell(30,2,str_pad($cheque["monchestr"], 20, "*", STR_PAD_LEFT));
				$this->setFont("Arial","B",10);
				$this->SetXY(43,60);//28
				$this->cell(130,5,'***'.strtoupper($cheque["nomben"]).'***'.'       '.$cheque["cedrif"],0,0,'L');
				$this->SetXY(43,66);//35
				$this->MultiCell(170,6,(str_pad(H::obtenermontoescrito($cheque["monche"]),100," ",STR_PAD_RIGHT)).'--------------');
				$this->setFont("Arial","B",10);
				$this->SetXY(35,78);//49
				$this->cell(30,5,"CARACAS,   ");
				$this->cell(20,5,$cheque["dia"]."/".$cheque["mes"]);
				$this->cell(20,5,"       ".$cheque["ano"]);
				$this->SetXY(35,84);//55
				$this->cell(10,5,'CADUCA A LOS 60 DIAS              NO ENDOSABLE');
				$this->SetXY(40,86);//55
				//$this->MultiCell(130,5,strtoupper($cheque["desord"]),0,'',0);
				//$y1=$this->GetY();
			   	$cheques["numcom"]=$cheque["numcom"];


				$y1=165;
				$cont=0;
				$y2=$this->GetY();
				$this->setFont("Arial","B",9);

				$this->SetxY(35,214);
				$this->cell(45,6,trim($cheque["nomcue"]),0,0,'R');
				$this->setFont("Arial","B",9);
				$this->cell(45,6,trim($cheque["numcue"]),0,0,'R');
				$this->cell(45,6,trim($cheque["numche"]),0,0,'R');
				$this->setFont("Arial","B",9);


				$op["numche"]=$cheque["numche"];

				$y3=$y1;
				$yy=87;
				$vv=0;
				foreach ($this->arrp3 as $op)
			    {
					if($cheque["numche"]==$op["numche"])
					{
						if($vv==0)
						{
						  $this->setFont("Arial","B",12);
						  $this->SetXY(80,$yy+18);
						  $this->ln();
						  $this->ln(40);
						  $this->setFont("Arial","B",10);
						  $this->SetX(35);
						  $this->MultiCell(165,5,strtoupper($op["deslib"]),0,'J',0);
						  $this->ln(20);
						  $this->SetXY(30,191);
						  $this->MultiCell(175,5,H::obtenermontoescrito($cheque["monche"]).'   Bs. ',0,'J',0);
						  $this->setFont("Arial","B",10);
  						  $this->SetXY(160,189+7);
						  $this->MultiCell(25,5,number_format($cheque["monche"],2,',','.'),0,0,'R');
						  $this->setFont("Arial","B",9);

						}
						$yy=$this->GetY();
						$this->SetXY(20,$y3+35);
						$this->cell(30,5,'');
						$this->cell(40,5,'');
						$this->cell(40,5,'');
						$b++;
						$vv++;
						$y3=$this->GetY()-30;
					}
				}
				$this->SetY(230);

				foreach ($this->arrp4 as $imp)
				{
					if($cheque["numche"]==$imp["numche"])
					{
						$this->setFont("Arial","B",10);
						$this->SetX(20);
						$this->cell(15,5,$imp["par"],0,0,'C');
						$this->cell(20,5,$imp["gen"],0,0,'C');
						$this->cell(25,5,$imp["es"],0,0,'C');
						$this->cell(25,5,$imp["subes"],0,0,'C');
						$this->cell(20,5,$imp["cre"],0,0,'C');
						$this->cell(40,5,'',0,0,'C');
						$this->cell(15,5,$imp["refere"],0,0,'C');
						$this->cell(27,5,number_format($imp["monimp"],2,',','.'),0,0,'R');
						$total=$total+$imp["monimp"];
						$this->ln();
					}
				}
				$i++;
				$this->SetXY(48,265);
				$this->cell(133,5,"",0,0,'C');
				$this->cell(25,4,number_format($total,2,',','.'),0,0,'R');
				$this->SetXY(48,269);
				$this->cell(133,5,"",0,0,'C');
				$this->cell(25,4,number_format($ret,2,',','.'),0,0,'R');
				$this->SetXY(48,273);
				$this->cell(133,4,"",0,0,'C');
				$this->cell(25,4,number_format($total-$ret,2,',','.'),0,0,'R');
				$total=0;
				if($i < count($this->arrp))
				{
					$this->AddPage();
				}
			}
		}
	}
?>
