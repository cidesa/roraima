<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Nprpresemp.class.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $numcuedes;
		var $numcuehas;
		var $meses;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->codempdes=H::GetPost("codempdes");
			$this->codemphas=H::GetPost("codemphas");
			$this->nprpresemp= new Nprpresemp();
		    $this->arrp=$this->nprpresemp->sqlp($this->codempdes,$this->codemphas);
		    $this->setAutoPageBreak(true,25);



		}


		function Header()
		{

			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","n");
			$this->ln(3);
			$this->setFont("Arial","B",8);
			$this->setWidths(array(30,100,100,30));
			$this->setAligns(array('C','L','L','C'));
			$this->rowM(array("Código Empleado","Nombre","Tipo Prestamo","Monto"));
			$this->ln(3);
			$this->Line(10,$this->getY(),270,$this->getY());
			$this->ln(3);
			$this->setWidths(array(30,90,30,30,30,20,20));
			$this->setAligns(array('C','L','R','R','R','C','C'));



		}

		function Cuerpo()
		{

			$codemp=$this->arrp[0]["codemp"];
			$codtippre=$this->arrp[0]["codtippre"];
			$this->arrdet=$this->nprpresemp->sqldet($this->arrp[0]["codtippre"],$this->arrp[0]["codemp"]);
			$this->setFont("Arial","B",8);
			$this->setWidths(array(30,100,100,30));
			$this->setAligns(array('C','L','L','R'));
			$this->rowM(array($this->arrp[0]["codemp"],$this->arrp[0]["nomemp"],$this->arrp[0]["codtippre"]." - ".$this->arrp[0]["destippre"],H::FormatoMonto($this->arrdet[0]["monto"])."     "));
			$this->ln(2);
			$this->SetFillColor(195,195,195);
			$this->cell(260,5,"Cuotas Canceladas y Saldo",0,0,'C',1);
			$this->ln();
			$this->ln(2);
			$this->setWidths(array(30,90,30,30,30,20,20));
			$this->setAligns(array('C','L','R','R','R','C','C'));
			//$this->setBorder(1);
			$this->rowM(array("Fecha","Descripción","Monto Prestamo","Cuota Prestamo","Saldo Prestamo","Nro. Cuotas","Nro.Cuotas Pendientes"));
			$this->ln(2);
			$this->Line(10,$this->getY(),270,$this->getY());
			$this->ln(2);




			foreach($this->arrp as $dato){

				if ($codemp==$dato["codemp"] and $codtippre==$dato["codtippre"]){

				$this->arrdet=$this->nprpresemp->sqldet($dato["codtippre"],$dato["codemp"]);
				$this->setFont("Arial","",7);
				$this->setWidths(array(30,90,30,30,30,20,20));
				$this->setAligns(array('C','L','R','R','R','C','C'));

				//Nro de Cuotas= monto prestamo/monto cuota -> $this->arrdet[0]["monto"]/$this->arrdet[0]["cuota"]
				//Nro de Cuotas Pendientes= saldo prestamo/monto cuota -> $dato["saldo"]/$this->arrdet[0]["cuota"]
				$this->rowM(array($dato["fechispre"],$dato["deshispre"],H::FormatoMonto($this->arrdet[0]["monto"]),H::FormatoMonto(abs($dato["monpre"])),H::FormatoMonto($dato["saldo"])."     ",round($this->arrdet[0]["monto"]/$this->arrdet[0]["cuota"]),round($dato["saldo"]/$this->arrdet[0]["cuota"])));

				$codemp=$dato["codemp"];
				$codtippre=$dato["codtippre"];
				$this->total=$dato["saldo"];

				}elseif($codemp!=$dato["codemp"] or $codtippre!=$dato["codtippre"]){

					$this->ln(2);
					$this->setFont("Arial","B",8);
					$this->cell(160,5,"Total Saldo: ",0,0,'R');
					$this->cell(30,5,H::FormatoMonto($this->total),0,0,'R');
					$this->ln();
					$this->Line(10,$this->getY(),270,$this->getY());
					if ($this->getY()>=170){
						$this->addPage();
					}
					$this->arrdet=$this->nprpresemp->sqldet($dato["codtippre"],$dato["codemp"]);
					$this->ln(3);
					$this->setFont("Arial","B",8);
					$this->setWidths(array(30,100,100,30));
					$this->setAligns(array('C','L','L','R'));
					$this->rowM(array($dato["codemp"],$dato["nomemp"],$dato["codtippre"]." - ".$dato["destippre"],H::FormatoMonto($this->arrdet[0]["monto"])."     "));
					$this->ln(2);
					$this->SetFillColor(195,195,195);
					$this->cell(260,5,"Cuotas Canceladas y Saldo",0,0,'C',1);
					$this->ln();
					$this->ln(2);
					$this->setWidths(array(30,90,30,30,30,20,20));
					$this->setAligns(array('C','L','C','C','C','C','C'));
					$this->rowM(array("Fecha","Descripción","Monto Prestamo","Cuota Prestamo","Saldo Prestamo","Nro. Cuotas","Nro.Cuotas Pendientes"));
					$this->ln(2);
					$this->Line(10,$this->getY(),270,$this->getY());
					$this->ln(2);
					$this->setWidths(array(30,90,30,30,30,20,20));
					$this->setAligns(array('C','L','R','R','R','C','C'));
					$this->setFont("Arial","",7);

					//Nro de Cuotas= monto prestamo/monto cuota -> $this->arrdet[0]["monto"]/$this->arrdet[0]["cuota"]
					//Nro de Cuotas Pendientes= saldo prestamo/monto cuota -> $dato["saldo"]/$this->arrdet[0]["cuota"]
					$this->rowM(array($dato["fechispre"],$dato["deshispre"],H::FormatoMonto($this->arrdet[0]["monto"]),H::FormatoMonto(abs($dato["monpre"])),H::FormatoMonto($dato["saldo"])."     ",round($this->arrdet[0]["monto"]/$this->arrdet[0]["cuota"]),round($dato["saldo"]/$this->arrdet[0]["cuota"])));
					//$this->setWidths(array(30,90,30,30,30,20,20));
					//$this->setAligns(array('C','L','R','R','R','C','C'));
					$codemp=$dato["codemp"];
					$codtippre=$dato["codtippre"];
					$this->total=$dato["saldo"];

				}

			}
					$this->ln(2);
					$this->setFont("Arial","B",8);
					$this->cell(160,5,"Total Saldo: ",0,0,'R');
					$this->cell(30,5,H::FormatoMonto($this->total),0,0,'R');
		}
	}
?>