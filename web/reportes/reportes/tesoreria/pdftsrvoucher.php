<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/tesoreria/Tsrvoucher.class.php");

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
			$this->bd=new Tsrvoucher();
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
			$this->contotal = count($this->arrp4);
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
			$this->setFont("Arial","B",10);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);


			$this->setFont("Arial","B",10);

		}

		function Cuerpo()
		{
			$this->setFont("Arial","B",9);
			$i=0;
			$a=0;
			$b=0;
			$cont=0;
			$this->esta='';
			//------------------------------------------------------------------------------------------------
			foreach($this->arrp as $cheque)//while
			{
				$this->numcom=$cheque["numcom"];
				$this->setFont("","B",10);
				$this->SetXY(156,79);//55
				$this->cell(30,2,str_pad($cheque["monchestr"], 26, "*", STR_PAD_LEFT));
				$this->setFont("","B",10);
				$this->SetXY(50,92);//60
				$this->cell(130,2,'***'.strtoupper($cheque["nomben"]).'***'.'       '.$cheque[""],0,0,'L');
                            //cedrif
				$this->SetXY(53,95);//66
				$this->MultiCell(140,7,(str_pad(H::obtenermontoescrito($cheque["monche"]),80,"*",STR_PAD_RIGHT)).' ');
				$this->setFont("","B",10);
				$this->SetXY(35,109);//78
				$this->cell(30,4,"CARACAS,   ");
				$this->cell(20,4,$cheque["dia"]."/".$cheque["mes"]);
				$this->cell(20,4,"       ".$cheque["ano"]);
				$this->SetXY(35,125);//84
				$this->cell(10,4,'                                                                              CADUCA A LOS 60 DIAS     -     NO ENDOSABLE');
			   	$cheques["numcom"]=$cheque["numcom"];
                $this->ch=$cheque["monche"];
				$y1=165;
				$cont=0;
				$y2=$this->GetY();
				$this->setFont("Arial","",10);
				$this->SetxY(17,163);
				$this->cell(75,6,trim($cheque["nomcue"]),0,0,'l');
				$this->SetxY(111,163);
				$this->cell(45,6,trim($cheque["numcue"]),0,0,'l');
				$this->SetxY(162,163);
				$this->cell(45,6,trim($cheque["numche"]),0,0,'L');
				$op["numche"]=$cheque["numche"];
				$y3=$y1;
				$yy=87;
				$vv=0;
				$total=0;
				foreach ($this->arrp3 as $op)
			    {
					if($cheque["numche"]==$op["numche"])
					{
						if($vv==0)
						{
						  $this->setFont("Arial","",10);
						  $this->SetXY(35,168);
						  $this->MultiCell(165,5,strtoupper($op["deslib"]),0,'J',0);

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
				$this->SetY(196);

				foreach ($this->arrp4 as $imp)
				{
					if($cheque["numche"]==$imp["numche"])
					{
						if ($this->gety()>228){ //si tiene muchas imputaciones
						    $this->Setx(171);
						    $this->cell(38,3,"Van.....                ". number_format($total,2,',','.'),0,0,'R');
						    $this->esta='Vienen...';
							$this->addpage();
							$this->setFont("Arial","",10);
							$this->SetxY(17,163);
							$this->cell(75,6,trim($cheque["nomcue"]),0,0,'l');
							$this->SetxY(111,163);
							$this->cell(45,6,trim($cheque["numcue"]),0,0,'l');
							$this->SetxY(162,163);
							$this->cell(45,6,trim($cheque["numche"]),0,0,'L');

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
						  $this->setFont("Arial","",10);
						  $this->SetXY(35,168);
						  $this->MultiCell(165,5,strtoupper($op["deslib"]),0,'J',0);

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

			    $this->Setxy(171,195);
				$this->cell(38,3,$this->esta.'                     '. number_format($total,2,',','.'),0,0,'R');
				$this->SetY(199);

						}//fin si tiene muchas imputaciones
						$this->setFont("Arial","",9);
						$this->SetX(15);
						$this->cell(17,3,$imp["codpre"],0,0,'C');
						$this->SetX(32);
						$this->cell(23,3,$imp["numcom"],0,0,'C');
						$this->SetX(54);
						$this->cell(29,3,$imp["numord"],0,0,'R');
						$this->SetX(182);
						$this->cell(24,3,number_format($imp["montopag"],2,',','.'),0,0,'R');
						$this->setx(84);
						$this->multicell(100,3,$imp["nompre"],0,'L');
						$total=$total+$imp["montopag"];
						$this->ln(2);
					}

				}
	    $this->sql = "select   numord from   opordche      where  trim(numche) = '".trim($cheque["numche"])."' ";
        $tbdesord = $this->bd->select($this->sql);
        $this->cont = count( $tbdesord);
		$ordenes=array();
	    $this->numord=array();
        $this->i=0;
        $this->SetXY(84,199);
        foreach($tbdesord as $desor)
        {
				   $this->sqlret="select b.destip , a.monret from opretord a join optipret b on a.codtip=b.codtip where numord='".$desor["numord"]."'";
                   $tbdret = $this->bd->select($this->sqlret);
			        foreach($tbdret as $ret)
			        {
			           $this->ret+=$ret["monret"];
			      	}
	                $this->numord=explode("-",trim($desor["numord"]));

                       /* if ($this->contotal==0){
                        	$this->setx(84);
                        	$this->multicell(25,3, $desor["numord"],0,'L',0);
                        	$this->ln(2);
				                               }*/

        }
              /* if ($this->contotal==0){
					$total= $this->ch;
					$this->SetXY(100,231);
					$a=1;


				}*/
				$i++;
				$this->SetXY(48,231);
				$this->cell(133,5,"",0,0,'C');
				$this->cell(25,5,number_format($total,2,',','.'),0,0,'R');

				$this->esta='';
			    $this->SetXY(48,237);
				$this->cell(133,5,"",0,0,'C');
				$this->cell(25,4,number_format( $this->ret,2,',','.'),0,0,'R');
				$this->SetXY(48,241);
				$this->cell(133,5,"",0,0,'C');
				$this->cell(25,5,number_format($total-$this->ret,2,',','.'),0,0,'R');
				$total=0;
				$this->ret=0;
				$this->ch=0;
				if($i < count($this->arrp))
				{
					$this->AddPage();
				}
			}
		}
	}
?>
