<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/tesoreria/Tsrmovimiento_cc.class.php");

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
			$this->fpdf("l","mm","Letter");
			//$this->bd=new basedatosAdo();
			$this->bd=new Tsrmovimiento_cc();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numchedes=str_replace('*',' ',H::GetPost("numchedes"));
			$this->numchehas=str_replace('*',' ',H::GetPost("numchehas"));
			$this->numcuedes=str_replace('*',' ',H::GetPost("numcuedes"));
			$this->numcuehas=str_replace('*',' ',H::GetPost("numcuehas"));
			$this->bendes=str_replace('*',' ',H::GetPost("bendes"));
			$this->benhas=str_replace('*',' ',H::GetPost("benhas"));
			$this->fechades=str_replace('*',' ',H::GetPost("fechades"));
			$this->fechahas=str_replace('*',' ',H::GetPost("fechahas"));
			$this->arrp=$this->bd->sqlp($this->numchedes,$this->numchehas,$this->bendes,$this->benhas,$this->fechades,$this->fechahas,$this->numcuedes,$this->numcuehas);
			$this->empresa = $this->bd->empresa();
            $this->i=0;
		}



		function Header()
		{
			$this->setFont("Arial","B",12);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			$this->Image("../../img/logo_1.jpg",10,10,30);
			$this->SetY(15);
			//$this->cell(270,4,'CONTRALORIA MUNICIPAL DE CHACAO',0,0,'C');
			$this->ln();
			$this->cell(270,4,'DIRECCION DE ADMINISTRACION Y FINANZAS',0,0,'C');
			$this->ln();
			$this->cell(270,4,'GERENCIA DE FINANZAS',0,0,'C');
			$this->setFont("Arial","B",9);
			$this->SetY(20);
			$fecha=date("d/m/Y");
      		$this->Cell(470,5,'Fecha: '.$fecha,0,0,'C');
			$this->ln(14);
			$this->setFont("Arial","B",9);
			$this->Cell(20,4,'MOVIMIENTO DEL '.$this->fechades.' AL '.$this->fechahas); //$this->y=$this->GetY();
         	$this->ln();
			$this->Cell(200,4,'CUENTA Nro.:  '.$this->arrp[$this->i]["numcue"]);
			$this->ln();
			//$this->Cell(20,4,'CUENTA GASTOS AÑO ' );
		    $this->Cell(20,4,'DESCRIPCION : '.$this->arrp[$this->i]["nomcue"] );
			$this->ln(12);
			$this->setFont("Arial","B",9);
			$this->Cell(20,3,'Asiento');
			$this->Cell(28,3,'Imputacion');
			$this->Cell(22,3,'Monto');
			$this->Cell(20,3,'Fecha');
			$this->Cell(30,3,'Cheque');
			$this->Cell(60,3,'Descripcion');
			$this->Cell(30,3,'Debe');
			$this->Cell(30,3,'Haber');
			$this->Cell(25,3,'Saldo');
			$this->line(10,$this->GetY()-5,270,$this->GetY()-5);
			$this->line(10,$this->GetY()+5,270,$this->GetY()+5);

		}

		function Cuerpo()
		{
			$contador=1;
			$this->setFont("Arial","B",9);
			$this->setWidths(array(0,13,25,26,23,20,65,25,25,25));
			$this->setAligns(array("L","C","R","R","C","C","L","R","R","R"));
			$this->SetY(62);
			$ref="";
			$ref2=$this->arrp[$this->i]["numcue"];
			$prim=true;
			foreach($this->arrp as $op)
			{
                $this->i++;
				if($ref!=$op["numche"])
				{
					$this->setFont("Arial","",8);
					$this->line(10,$this->GetY()+3,270,$this->GetY()+3);
					$this->SetXY(75,$this->GetY()+5);
					$this->Cell(23,5,date("d/m/Y",strtotime($op["feclib"])),0,0,'C');
					$this->SetX(95);
					$this->Cell(25,5,$op["numche"],0,0,'C');
					$this->SetX(182);
					$this->Cell(25,5,H::FormatoMonto($op["deber"]),0,0,'R');
					$this->SetX(210);
					$this->Cell(25,5,H::FormatoMonto($op["haber"]),0,0,'R');
					$this->SetX(116);
					$this->multiCell(65,3,trim($op["nomben"]),0,'J',0);

					$this->ln();
					$this->SetY($this->GetY()-7);
				}

			  	$this->setFont("Arial","",8);
				$this->Row(array('',(string)$contador,$op["partida"],H::FormatoMonto($op["monimp"])));
				$monret=$monret+$op["monimp"];



				$y=$this->GetY();
				$this->line(10,49,10,$y-4);
				$this->line(23,49,23,$y-4);
				$this->line(50,49,50,$y-4);
				$this->line(75,49,75,$y-4);
				$this->line(95,49,95,$y-4);
				$this->line(116,49,116,$y-4);
				$this->line(182,49,182,$y-4);
				$this->line(210,49,210,$y-4);
				$this->line(240,49,240,$y-4);
				$this->line(270,49,270,$y-4);
				$contador++;

					if ($ref2!=$op["numcue"]){
						$this->line(10,49,10,$y+3);
						$this->line(23,49,23,$y+3);
						$this->line(50,49,50,$y+3);
						$this->line(75,49,75,$y+3);
						$this->line(95,49,95,$y+3);
						$this->line(116,49,116,$y+3);
						$this->line(182,49,182,$y+3);
						$this->line(210,49,210,$y+3);
						$this->line(240,49,240,$y+3);
						$this->line(270,49,270,$y+3);
						$this->line(10,$this->GetY()+3,270,$this->GetY()+3);
						$this->ln();
						$this->setFont("Arial","B",10);
						$this->SetX(120);
						$this->Cell(30,3,'TOTAL Cuenta:'.$op["numcue"]);
						$this->SetX(187);
						$this->Cell(30,3,H::FormatoMonto($monret));
						$monret=0;
						$this->ln(25);
						$ref2=$op["numcue"];
				    	$this->addpage();
				}

				if($y>=180)
				{   $this->line(10,49,10,$y+3);
					$this->line(23,49,23,$y+3);
					$this->line(50,49,50,$y+3);
					$this->line(75,49,75,$y+3);
					$this->line(95,49,95,$y+3);
					$this->line(116,49,116,$y+3);
					$this->line(182,49,182,$y+3);
					$this->line(210,49,210,$y+3);
					$this->line(240,49,240,$y+3);
					$this->line(270,49,270,$y+3);
					$this->line(10,$this->GetY()+3,270,$this->GetY()+3);
					$this->AddPage();
					$this->SetY(62);
				}
				$ref=$op["numche"];

			}
			        $this->line(10,49,10,$y+3);
					$this->line(23,49,23,$y+3);
					$this->line(50,49,50,$y+3);
					$this->line(75,49,75,$y+3);
					$this->line(95,49,95,$y+3);
					$this->line(116,49,116,$y+3);
					$this->line(182,49,182,$y+3);
					$this->line(210,49,210,$y+3);
					$this->line(240,49,240,$y+3);
					$this->line(270,49,270,$y+3);
					$this->line(10,$this->GetY()+3,270,$this->GetY()+3);
			$this->ln();
			$this->setFont("Arial","B",10);
			$this->SetX(120);
			$this->Cell(30,3,'TOTAL: ');
			$this->SetX(187);
			$this->Cell(30,3,H::FormatoMonto($monret));
			$this->ln(25);


		}
	}
?>
