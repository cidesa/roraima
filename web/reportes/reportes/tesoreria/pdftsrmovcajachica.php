<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/tesoreria/Tsrmovcajachica.class.php");



	class pdfreporte extends fpdf
	{

	var $bd;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new Cabecera();
			$this->coddes=H::GetPost("ref1");
			$this->codhas=H::GetPost("ref2");
			$this->fecha1 = H::GetPost("fechades");
			$this->fecha2 = H::GetPost("fechahas");

			$this->bd=new basedatosAdo();
			$this->chica = new Tsrmovcajachica();
		    $this->arrp = $this->chica->sqlp($this->coddes,$this->codhas,$this->fecha1,$this->fecha2);
		    $this->llenartitulosmaestro();
			$this->llenaranchos();
}

	function llenartitulosmaestro()
		{

				$this->titulos[0]="CÉDULA";
				$this->titulos[1]="NOMBRE DEL EMPLEADO";
				$this->titulos[2]="CUENTA";
				$this->titulos[3]="MONTO A DEPOSITAR";
		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=60;
		$this->anchos[1]=60;
		$this->anchos[2]=35;
		$this->anchos[3]=35;

	}

	function PutLink($URL,$txt)
		{
		    //Escribir un hiper-enlace
		    $this->SetTextColor(0,0,255);
		    $this->SetStyle('U',true);
		    $this->Write(5,$txt,$URL);
		    $this->SetStyle('U',false);
		    $this->SetTextColor(0);
		}

		function SetStyle($tag,$enable)
		{
		    //Modificar estilo y escoger la fuente correspondiente
		    $this->$tag+=($enable ? 1 : -1);
		    $style='';
		    foreach(array('B','I','U') as $s)
		        if($this->$s>0)
		            $style.=$s;
		    $this->SetFont('',$style);
		}


		function Header()
    {
         $this->setFont("Arial","B",9);
         $this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
         $this->setFont("Arial","",9);
         $this->Ln(10);



    }

function Cuerpo()

  {
	$cuantos = count($this->arrp);
	$reg = 0;
	foreach ($this->arrp as $dato)
	{
		$reg ++;
		$codigo = $dato["refsal"];
		$this->setFont("Arial","B",12);
	    $this->SetWidths(array(180));
		$this->SetAligns(array("C"));
		//$this->SetFillColor(230,230,230);
		//$this->SetFillTable(1);
		//$this->SetBorder(1);
		$this->Row(array("DATOS DE LA SALIDA DE CAJA CHICA"));
		//$this->SetBorder(0);
		//$this->SetFillTable(0);

		$this->setFont("Arial","",10);
	    $this->SetWidths(array(90,40,50));
		$this->SetAligns(array("L","L","L"));
		//$this->SetFillColor(230,230,230);
		//$this->SetFillTable(1);
		//$this->SetBorder(1);
		$this->Row(array("COMPROBANTE NÙMERO: ".$dato["refsal"],"","FECHA: ". $dato["fecsal"]));
		//$this->SetBorder(0);
		//$this->SetFillTable(0);

		$this->setFont("Arial","",10);
	    $this->SetWidths(array(50,40,90));
		$this->SetAligns(array("L","L","L"));
		//$this->SetFillColor(230,230,230);
		//$this->SetFillTable(1);
		//$this->SetBorder(1);
		$this->Row(array("C.I/R.I.F: ".$dato["cedrif"],"","BENEFICIARIO: ". $dato["nompro"]));
		//$this->SetBorder(0);
		//$this->SetFillTable(0);

		//VIENE EL DETALLE
		$this->setFont("Arial","B",12);
	    $this->SetWidths(array(180));
		$this->SetAligns(array("C"));
		//$this->SetFillColor(230,230,230);
		//$this->SetFillTable(1);
		//$this->SetBorder(1);
		$this->Row(array("DETALLE DE LA SALIDA DE CAJA CHICA"));
		//$this->SetBorder(0);
		//$this->SetFillTable(0);

		//VIENE EL DETALLE
		$this->arrp1 = $this->chica->detalle($codigo);
		$this->setFont("Arial","B",10);
	    $this->SetWidths(array(45,45,45,45));
		$this->SetAligns(array("C","C","C","C"));
		//$this->SetFillColor(230,230,230);
		//$this->SetFillTable(1);
		//$this->SetBorder(1);
		$this->Row(array("IMPUTACIÒN PRESUPUESTARIA","MONTO NETO","IVA", "MONTO TOTAL"));
		//$this->SetBorder(0);
		//$this->SetFillTable(0);
		foreach($this->arrp1 as $dato1)
		{
			$this->setFont("Arial","",10);
		    $this->SetWidths(array(45,45,45,45));
			$this->SetAligns(array("C","C","C","C"));
			//$this->SetFillColor(230,230,230);
			//$this->SetFillTable(1);
			//$this->SetBorder(1);
			$this->Row(array($dato1["codpar"],H::FormatoMonto($dato1["monsal"]),H::FormatoMonto(""), H::FormatoMonto($dato1["monsal"])));
			//$this->SetBorder(0);
			//$this->SetFillTable(0);

		}
       $this->ln(8);

       if($reg >= $cuantos)
       {
       	 $this->addpage();
       }




	}

  }
}