<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atlisaud.class.php");

	class pdfreporte extends fpdf
	{
		var $ceddes      = '';
		var $cedhas      = '';
		var $codunides   = '';
		var $codunihas   = '';
		var $fechades    = '';
		var $fechahas    = '';
		var $fechaades   = '';
		var $fechaahas   = '';
		var $fechardes   = '';
		var $fecharhas   = '';
		var $combostatus = '';
		var $combofecha  = '';
		var	$posicion_x  = '';
		var	$posicion_y  = '';


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->ceddes      = H::GetPost("ceddes");
			$this->cedhas      = H::GetPost("cedhas");
			$this->codunides   = H::GetPost("codunides");
			$this->codunihas   = H::GetPost("codunihas");
			$this->fechades    = H::GetPost("fechades");
			$this->fechahas    = H::GetPost("fechahas");
			$this->fechaades   = H::GetPost("fechaades");
			$this->fechaahas   = H::GetPost("fechaahas");
			$this->fechardes   = H::GetPost("fechardes");
			$this->fecharhas   = H::GetPost("fecharhas");
			$this->combostatus = H::GetPost("combostatus");
			$this->combofecha  = H::GetPost("combofecha");

			$this->atlsaud  = new Atlisaud();

		    $this->arrp = $this->atlsaud->SQLp($this->ceddes,$this->cedhas,$this->codunides,$this->codunihas,$this->fechades,$this->fechahas,$this->fechaades,$this->fechaahas,$this->fechardes,$this->fecharhas,$this->combostatus,$this->combofecha);

			$this->llenartitulosmaestro();
			$this->llenaranchos();

		}

		function llenartitulosmaestro()
		{
			$this->titulos[0]="Persona";
			$this->titulos[1]="Audiencia";
			$this->titulos[2]="Atención";
			$this->titulos[3]="Registro";
			$this->titulos[4]="Motivo";
			$this->titulos[5]="Lugar";
			$this->titulos[6]="Observación";
		}

	    function llenaranchos()
		{
			$this->anchos=array();
			$this->anchos[0]=40;
			$this->anchos[1]=20;
			$this->anchos[2]=20;
			$this->anchos[3]=20;
			$this->anchos[4]=30;
			$this->anchos[5]=30;
			$this->anchos[6]=40;
		}

		function Header()
		{
			//$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->getCabecera(H::GetPost("titulo"),"");
			//$this->top();
		}

		function top($sw='1')
		{
			$this->setFont("Arial","B",9);

			if (($sw=='1') or ($sw==''))
			{
	//Datos del Solicitante:
				$this->cell(20,5,"Datos del Solicitante");
				$this->ln(4);
				$this->cell(10,5,"   Cédula : ");
				$this->posicion_x=$this->GetX()+8;
				$this->posicion_y=$this->GetY();
				$this->ln(4);
				$this->cell(10,5,"   Nombre :  ");

			}else if (($sw=='2')){
		//Datos del la Unidad:
					$this->ln(7);
					$this->cell(30,5,"Datos del la Unidad");
					$this->ln(4);
					$this->cell(10,5,"   Código/Descripción:");
				$this->posicion_x=$this->GetX()+5;
				$this->posicion_y=$this->GetY();

					$this->ln(4);


				for($i=0;$i<=count($this->titulos);$i++)
				{
					$this->cell($this->anchos[$i],10,$this->titulos[$i]);
				}
				$this->ln(8);
				$this->Line(10,$this->GetY(),200,$this->GetY());
				$this->ln();
			}
			$this->setFont("Arial","",9);
		}

		function Cuerpo()
		{
			global $unidad;
			global $cedula;

			foreach($this->arrp as $datos)
			{
				if ($cedula!=$datos["cedula"])
				{
					$this->top();
					$cedula=$datos["cedula"];
					$this->SetXY($this->posicion_x,$this->posicion_y);
					$this->cell(10,5,$datos["cedula"]);
					$this->ln(4);
					$this->SetX($this->posicion_x);
					$this->cell(30,5,$datos["nombre"]);
				}
				if ($unidad!=$datos["coduni"])
				{

					$this->top('2');
					$this->SetXY($this->posicion_x,$this->posicion_y);
					$unidad=$datos["coduni"];
					$this->SetX($this->posicion_x+20);
					$this->cell(10,5,$datos["coduni"]);
					$this->cell(30,5,$datos["desuni"]);
				}

				$this->ln(14);
	  			$this->SetWidths(array(40,20,20,20,30,30,40));
	     		$this->SetAligns(array("L","L","L","L","L","L","L"));
	    	    $this->Row(array($datos["persona"],$datos["fecha"],$datos["fechaa"],$datos["fechar"],$datos["motaud"],$datos["lugar"],$datos["observacion"]));

			}
		unset($this->atlisaud);
		}
	}
?>
