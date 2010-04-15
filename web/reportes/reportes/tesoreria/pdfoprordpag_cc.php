<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/tesoreria/Oprordpag_cc.class.php");

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
			$this->bd=new Oprordpag_cc();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numorddes=str_replace('*',' ',H::GetPost("numorddes"));
			$this->numordhas=str_replace('*',' ',H::GetPost("numordhas"));
			$this->bendes=str_replace('*',' ',H::GetPost("bendes"));
			$this->benhas=str_replace('*',' ',H::GetPost("benhas"));
			$this->fechades=str_replace('*',' ',H::GetPost("fechades"));
			$this->fechahas=str_replace('*',' ',H::GetPost("fechahas"));
			$this->apro=str_replace('*',' ',H::GetPost("apro"));
			$this->revi=str_replace('*',' ',H::GetPost("revi"));
			$this->elab=str_replace('*',' ',H::GetPost("elab"));
			$this->arrp=$this->bd->sqlp($this->numorddes,$this->numordhas,$this->bendes,$this->benhas,$this->fechades,$this->fechahas);
                        $this->arrpemp = $this->bd->empresa();   

		}



		function Header()
		{
			$this->setFont("Arial","B",12);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			$this->Image("../../img/logo_1.jpg",10,10,30);
			$this->SetY(15);
			$this->cell(270,5,'REPORTE MENSUAL POR ORDENES DE PAGO',0,0,'C');
			$this->setFont("Arial","B",9);
			$this->SetY(20);
			$fecha=date("d/m/Y");
      		$this->Cell(470,5,'Fecha: '.$fecha,0,0,'C');
			$this->ln(14);
			$this->setFont("Arial","B",9);
			$this->Cell(20,5,'NOMBRE DEL ENTE PUBLICO: '.$this->arrpemp[0][nomemp]);
			$this->ln();
			$this->Cell(200,5,'DIRECCION: '.$this->arrpemp[0][diremp]);
			$this->ln();
			$this->Cell(20,5,'PERIODO DEL '.$this->fechades.' AL '.$this->fechahas);
			$this->ln();
			$this->Cell(20,5,'Nro PLANILLA(S) BANCARIAS: ');
			$this->ln();
			//$this->Cell(20,5,'RIF: G-20000239-5');
			$this->Cell(20,5,'RIF: ');
			$this->ln(10);

			$this->setFont("Arial","B",9);

			$this->Cell(25,3,'Fecha Orden');
			$this->Cell(33,3,'Numero Orden');
			$this->Cell(50,3,'Nombre del Contribuyente');
			$this->Cell(30,3,'C.I O RIF');
			$this->Cell(30,3,'Monto de');
			$this->Cell(30,3,'Monto del');
			$this->Cell(30,3,'Municipio');
			$this->Cell(30,3,'Observaciones');
			$this->ln();
			$this->Cell(25,3,'  de Pago');
			$this->Cell(33,3,'  de Pago');
			$this->Cell(50,3,'');
			$this->Cell(30,3,'');
			$this->Cell(30,3,'la Operacion');
			$this->Cell(30,3,' Impuesto');
			$this->Cell(30,3,'donde se emitio');
			$this->line(10,$this->GetY()-5,270,$this->GetY()-5);
			$this->line(10,$this->GetY()+5,270,$this->GetY()+5);
			//$this->ln(3);

		}

		function Cuerpo()
		{
			$this->setFont("Arial","B",9);
			$this->setWidths(array(0,25,25,50,5,28,25,30,30,30));
			$this->setAligns(array("C","L","C","C","J","L","C","R","R","C","J"));
			//$this->setBorder(array(1,1,1,1,1,1,1,1,1));
$this->i=0;
			$this->SetY(80);
			foreach($this->arrp as $op)
			{
			  	$this->setFont("Arial","",9);
				$this->Row(array('',date("d/m/Y",strtotime($op["fecemi"])),$op["numord"],trim($op["nomben"]),'',$op["cedrif"],H::FormatoMonto($op["monord"]),H::FormatoMonto($op["monret"]),'CHACAO'));
				$this->line(10,$this->GetY(),270,$this->GetY());
				$monord=$monord+$op["monord"];
				$monret=$monret+$op["monret"];
				$this->ln();
				$this->i++;
				$y=$this->GetY();
				$this->line(10,62,10,$y-4);
				$this->line(35,62,35,$y-4);
				$this->line(60,62,60,$y-4);
				$this->line(115,62,115,$y-4);
				$this->line(140,62,140,$y-4);
				$this->line(170,62,170,$y-4);
				$this->line(200,62,200,$y-4);
				$this->line(235,62,235,$y-4);
				$this->line(270,62,270,$y-4);
				if($y>=180)
				{
					$this->AddPage();
					$this->SetY(80);
				}
			}
			//$this->ln();
			$this->setFont("Arial","B",10);
				$this->SetX(70);
			$this->Cell(30,3,'N# de ordenes: '. $this->i);//$monord
			$this->SetX(120);
			$this->Cell(30,3,'TOTAL: ');//$monord
				$this->SetX(140);
			$this->Cell(30,3,H::FormatoMonto($monord),0,'R',0);
			$this->SetX(170);
			$this->Cell(30,3,H::FormatoMonto($monret),0,'R',0);
			$this->ln(25);
			$this->SetX(20);
			$this->Cell(30,5,'Aprobado por: ');
			$this->line(15,$this->GetY(),65,$this->GetY());
			$this->SetX(100);
			$this->Cell(30,5,'Revisado por: ');
			$this->line(95,$this->GetY(),150,$this->GetY());
			$this->SetX(180);
			$this->Cell(30,5,'Elaborado por: ');
			$this->line(175,$this->GetY(),225,$this->GetY());
			$this->ln(4);
			$this->setFont("Arial","",10);
			$this->SetX(20);
			$this->Cell(30,4,$this->apro);
			$this->SetX(100);
			$this->Cell(30,4,$this->revi);
			$this->SetX(180);
			$this->Cell(30,4,$this->elab);

		}
	}
?>
