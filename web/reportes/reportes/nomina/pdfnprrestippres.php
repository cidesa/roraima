<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Nprrestippres.class.php");

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
			$this->codtipdes=H::GetPost("codtipdes");
			$this->codtiphas=H::GetPost("codtiphas");
			$this->nprrestippres= new Nprrestippres();
		    $this->arrp=$this->nprrestippres->sqlp($this->codtipdes,$this->codtiphas);



		}


		function Header()
		{

			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","n");
			$this->ln(2);
			$this->setFont("Arial","B",9);
			$this->setWidths(array(30,160));
			$this->setAligns(array('L','L'));
			$this->rowM(array("Código Tipo","Nombre"));
			$this->ln(2);
			$this->setWidths(array(30,50,30,30,30,30,30,30));
			$this->setAligns(array('L','L','C','C','C','C','C','C'));
			$this->rowM(array("Código Empleado","Nombre del Empleado","Fecha Prestamo","Monto Prestamo","Monto Cuota","Saldo Actual","Nro. de Cuotas","Nro. Cuotas por Pagar"));
			$this->ln(2);
			$this->Line(10,$this->getY(),270,$this->getY());
			$this->ln(4);
			$this->setWidths(array(30,50,30,30,30,30,30,30));
			$this->setAligns(array('C','L','C','R','R','R','C','C'));



		}

		function Cuerpo()
		{

			foreach($this->arrp as $dato){

				$this->setFont("Arial","B",9);
				$this->setWidths(array(30,60,70,30));
				$this->setAligns(array('C','L','C','C'));
				$this->rowM(array($dato["codtippre"],$dato["destippre"]));
				//$this->ln(2);
				$this->Line(10,$this->getY(),270,$this->getY());
				$this->ln(2);

				$codtip=$dato["codtippre"];
				$this->destippre=$dato["destippre"];
				$this->arrdet=$this->nprrestippres->sqldet($codtip);
				$this->total=0;

				foreach($this->arrdet as $dato){

				$this->setFont("Arial","",8);
				$this->setWidths(array(30,50,30,30,30,30,30,30));
				$this->setAligns(array('C','L','C','R','R','R','C','C'));
				$this->monto=$this->nprrestippres->sqlmonto($dato["codemp"],$dato["codtippre"]);
				//H::printR($this->monto);exit;
				$this->saldo=$this->nprrestippres->sqlsaldo($dato["codemp"],$dato["codtippre"]);
				$pos=count($this->saldo);
				//$this->setBorder(1);
				$this->rowM(array($dato["codemp"],$dato["nomemp"],$dato["fecini"],H::FormatoMonto($dato["monto"]),H::FormatoMonto(abs($dato["cuota"])),H::FormatoMonto($dato["acumulado"]),round($dato["monto"]/$dato["cuota"]),round($dato["acumulado"]/$dato["cuota"])));

				$this->destip=$dato["codtippre"];
				$this->total+=$dato["monto"];

				}
				$this->ln(2);
				$this->setFont("Arial","B",9);
				$this->cell(100,5,"TOTAL ".$this->destippre.": ".H::FormatoMonto($this->total));
				$this->ln();
				$this->ln();

			}
		}
	}
?>