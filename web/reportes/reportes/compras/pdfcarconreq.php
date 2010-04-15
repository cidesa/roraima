<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/compras/Carconreq.class.php");

	class pdfreporte extends fpdf
	{
		var $indice=0;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");

	$this->arrp=array("no_vacio");
				$this->cabe='s';
			$this->index=0;
			$this->numreqdes= H::GetPost('numreqdes');
			$this->numreqhas= H::GetPost('numreqhas');
			$this->fecreqdes= H::GetPost('fecreqdes');
			$this->fecreqhas= H::GetPost('fecreqhas');
			$this->unides= H::GetPost('unides');
			$this->unihas= H::GetPost('unihas');

			$this->objCarconreq = new Carconreq();
			$this->arrp = $this->objCarconreq->sqlp($this->numreqdes,$this->numreqhas,$this->fecreqdes,$this->fecreqhas,$this->unides,$this->unihas);

		}

		function header()
		{
			$this->getCabecera(H::GetPost("titulo"),"");
			$this->setFont("Arial","B",8);
			$this->Ln(-1);
			$this->SetWidths(array(20,25,52,20,20,20,20,18));
			$this->SetAligns(array('C','C','C','C','C','C','C','C'));
			$this->SetBorder(true);
			$this->SetJump(5);
			$this->RowM(array("No. de Requisicion","Unidad","Descripcion","Fecha Requisicion","No. de Certificacion","Fecha Certificacion","No. de\nOrden","Fecha\nOrden"));
			$this->SetAligns(array('C','C','L','C','C','C','C','C'));
			$this->SetJump(4);
			//$this->SetBorder();

		}

		function Cuerpo()
		{
			foreach($this->arrp as $registro)
			{
				$this->RowM(array($registro["reqart"],ucwords(strtolower($registro["unidad"])),strtolower($registro["desreq"]),$registro["fecreq"],$registro["certificado"],$registro["feccer"],$registro["ordcom"],$registro["fecord"]));
			}
		}

	}