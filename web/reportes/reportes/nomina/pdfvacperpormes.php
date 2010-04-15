<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Vacperpormes.class.php");


class pdfreporte extends fpdf
{
	function pdfreporte()
	{
	 $this->fpdf("p","mm","Letter");
	 $this->codempdes=H::GetPost("codempdes");
	 $this->codemphas=H::GetPost("codemphas");
     //$this->tipo=H::GetPost("tipo");
	 $this->mes=H::GetPost("mes");

	 $this->cab = new Cabecera();

	 $this->objclass = new Vacperpormes();
	 $this->arrp= $this->objclass->SQLp($this->codempdes,$this->codemphas,$this->mes);
	 $this->anofis = $this->objclass->sqlanofis();
	 $this->llenartitulosmaestro();
	 $this->setAutoPageBreak(true,25);
	}

	function llenartitulosmaestro()
	{
		$this->titulos[]="CODIGO EMPLEADO";
		 $this->anchos[]=25;
		 $this->align[]='C';
		 $this->titulos[]="FUNCIONARIO";
		 $this->anchos[]=100;
		 $this->align[]='L';
		 $this->titulos[]="FECHA DE SALIDA";
		 $this->anchos[]=25;
		 $this->align[]='C';
		 $this->titulos[]="FECHA DE REINTEGRO";
		 $this->anchos[]=25;
		 $this->align[]='C';
		 $this->titulos[]="DIAS DE DISFRUTE";
		 $this->anchos[]=20;
		 $this->align[]='C';
	}

	function Header()
	{
		 $this->cab->poner_cabecera($this,'VACACIONES MES DE '.strtoupper(H::obtenermesenletras($this->mes)).' AÑO '.$this->anofis ,"p","p","s");
		 $this->setFont("Arial","B",8);
		 $this->setWidths($this->anchos);
		 $this->setAligns('C');
		 $this->setBorder(true);
		 $this->row($this->titulos);
		 $this->setAligns($this->align);
		 $this->setFont("Arial","",8);
	}

	function Cuerpo()
	{
		$con1=0;
		$con2=0;
		foreach($this->arrp as $r)
		{
			$this->rowm($r);
			$r[4]=='' ? $con1++ : $con2++ ;
		}
		$this->setFont("Arial","B",8);
		$this->ln();
		$this->multicell(180,4,'TOTAL PERSONAL SIN SOLICITUD DE VACACIONES: '.$con1);
		$this->multicell(180,4,'TOTAL PERSONAL QUE YA SOLICITÓ VACACIONES : '.$con2);
		$this->multicell(180,4,'TOTAL PERSONAL QUE LE CORRESPONDE VACACIONES : '.($con1+$con2));
    }
}
?>