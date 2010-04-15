<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atlisuni.class.php");

	class pdfreporte extends fpdf
	{
		var $codunides = '';
		var $codunihas = '';

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->codunides=H::GetPost("codunides");
			$this->codunihas=H::GetPost("codunihas");

			$this->atlisuni = new atlisuni();


		    $this->arrp = $this->atlisuni->sqlp($this->codunides,$this->codunihas);

			$this->llenartitulosmaestro();
			$this->llenaranchos();

		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="Uni";
				$this->titulos[1]="Descripción";
				$this->titulos[2]="Dirección";
				$this->titulos[3]="Teléfono";
				$this->titulos[4]="Nombre/Contacto";
				$this->titulos[5]="Tlf/Contacto";
				$this->titulos[6]="C.Electrónico";
				$this->titulos[7]="Horario";


		}

	    function llenaranchos()
		{
			$this->anchos=array();
			$this->anchos[0]=10;
			$this->anchos[1]=30;
			$this->anchos[2]=30;
			$this->anchos[3]=30;
			$this->anchos[4]=30;
			$this->anchos[5]=25;
			$this->anchos[6]=26;
			$this->anchos[7]=25;
		}

		function Header()
		{
			//$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->getCabecera(H::GetPost("titulo"),"");


			$this->setFont("Arial","B",9);
			for($i=0;$i<=count($this->titulos);$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}

			$this->Line(10,45,270,45);
			$this->ln();

		}

		function Cuerpo()
		{
			$this->SetWidths(array(10,30,30,30,30,25,26,25));
     		$this->SetAligns(array("L","L","L","L","L","L","L","L"));
     		foreach($this->arrp as $dato)
			{
    	    $this->Row(array($dato["coduni"],$dato["desuni"],$dato["diruni"],$dato["telfuni"],$dato["percon"],$dato["telpercon"],$dato["mailpercon"],$dato["horario"]));
			}
			unset($this->atlisuni);
		}
	}
?>