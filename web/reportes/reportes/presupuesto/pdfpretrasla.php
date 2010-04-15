<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/presupuesto/Pretrasla.class.php");

	class pdfreporte extends fpdf
	{
		var $iddes = '';
		var $idhas = '';

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->refdes=H::GetPost("refdes");
			$this->refhas=H::GetPost("refhas");
			$this->fecdes=H::GetPost("fecdes");
			$this->fechas=H::GetPost("fechas");
			$this->revisado=H::GetPost("revisado");
			$this->conformado=H::GetPost("conformado");
$this->cab=new cabecera();
			$this->pretrasla= new Pretrasla();
			$this->llenarTitulosAnchos();

		    $this->arrp = $this->pretrasla->sqlp($this->refdes,$this->refhas,$this->fecdes,$this->fechas);
		    //$this->reg=count($this->arrp);


		}

		function llenarTitulosAnchos()
		{
			$this->titulos[0]="Nro. Traslado";      $this->anchos[0] = 20;
			$this->titulos[1]="Fecha";      $this->anchos[1] = 20;
			$this->titulos[2]="Partida(s) Cedente(s) ";     $this->anchos[2] = 60;
			$this->titulos[3]="Monto(Bs.)";      $this->anchos[3] = 20;
			$this->titulos[4]="Partida(s) Receptora(s)";      $this->anchos[4] = 50;
			$this->titulos[5]="Monto(Bs.)";     $this->anchos[5] = 30;
			$this->titulos[6]="Sector";      $this->anchos[6] = 8;
			$this->titulos[7]="Prog.";      $this->anchos[7] = 8;
			$this->titulos[8]="Act.";     $this->anchos[8] = 8;
			$this->titulos[9]="Part.";      $this->anchos[9] = 8;
			$this->titulos[10]="Gener.";      $this->anchos[10] = 8;
			$this->titulos[11]="Espec.";      $this->anchos[11] = 9;
			$this->titulos[12]="Sub-Esp.";     $this->anchos[12] = 11;
			$this->titulos[13]="Imputación Presupuestaria";      $this->anchos[13] = 50;


		}


		function Header()
		{

		$this->cab->poner_cabecera_f_b($this,$_POST["titulo"],$this->conf,"s","s");
		//	$this->getCabecera(H::GetPost("titulo"),"");
			$this->setFont("Arial","B",8);
			$this->cell(0,5,"Desde: ".$this->fecdes." Hasta: ".$this->fechas,0,0,'R');
			$this->ln();
			$this->ln();
			$this->setX(10);
			//Títulos
			$this->setFont("Arial","B",9);
		    $this->SetWidths(array($this->anchos[0],$this->anchos[1]));
			$this->SetAligns(array("C","C"));
		    $this->SetBorder(1);
		    $y=$this->getY();
			$this->Row(array($this->titulos[0].chr(10)." ",$this->titulos[1].chr(10)." "));
			$this->setXY(50,$y);
			$this->SetWidths(array($this->anchos[2]));
			$this->SetAligns(array("C"));
		    $this->SetBorder(1);
		    $this->Row(array($this->titulos[2]));
		    $this->setX(50);
		    $this->Row(array($this->titulos[13]));
		    $this->setX(50);
			$this->SetWidths(array($this->anchos[6],$this->anchos[7],$this->anchos[8],$this->anchos[9],$this->anchos[10],$this->anchos[11],$this->anchos[12]));
			$this->SetAligns(array("C","C","C","C","C","C","C"));
		    $this->SetBorder(1);
		    $this->setFont("Arial","",5);
		    $this->Row(array($this->titulos[6],$this->titulos[7],$this->titulos[8],$this->titulos[9],$this->titulos[10],$this->titulos[11],$this->titulos[12]));
			$this->setXY(110,$y);
			$this->setFont("Arial","B",9);
			$this->SetWidths(array($this->anchos[3]));
			$this->SetAligns(array("C"));
		    $this->SetBorder(1);
		    $this->Row(array($this->titulos[3].chr(10)." ".chr(10)." "));
			$this->setXY(130,$y);
			$this->SetWidths(array($this->anchos[2]));
			$this->SetAligns(array("C"));
		    $this->SetBorder(1);
		    $this->Row(array($this->titulos[4]));
		    $this->setX(130);
		    $this->Row(array($this->titulos[13]));
		    $this->setX(130);
			$this->SetWidths(array($this->anchos[6],$this->anchos[7],$this->anchos[8],$this->anchos[9],$this->anchos[10],$this->anchos[11],$this->anchos[12]));
			$this->SetAligns(array("C","C","C","C","C","C","C"));
		    $this->SetBorder(1);
		    $this->setFont("Arial","",5);
		    $this->Row(array($this->titulos[6],$this->titulos[7],$this->titulos[8],$this->titulos[9],$this->titulos[10],$this->titulos[11],$this->titulos[12]));
			$this->setXY(190,$y);
			$this->setFont("Arial","B",9);
			$this->SetWidths(array($this->anchos[3]));
			$this->SetAligns(array("C"));
		    $this->SetBorder(1);
		    $this->Row(array($this->titulos[3].chr(10)." ".chr(10)." "));
		    $this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[6],$this->anchos[7],$this->anchos[8],$this->anchos[9],$this->anchos[10],$this->anchos[11],$this->anchos[12],$this->anchos[3],$this->anchos[6],$this->anchos[7],$this->anchos[8],$this->anchos[9],$this->anchos[10],$this->anchos[11],$this->anchos[12],$this->anchos[3]));
			$this->SetAligns(array("C","C","C","C","C","C","C","C","C","R","C","C","C","C","C","C","C","R"));
			$this->SetBorder(1);


		}


		function Cuerpo()
		{

             foreach($this->arrp as $dato)
                {

				$this->arrdet = $this->pretrasla->sqldet($dato["reftra"]);
				$registros=count($this->arrdet);

				$reg=0;
				foreach($this->arrdet as $det)
                {
					$reg++;
					if ($reg==1){
					$a1=split("-",$det["codori"]);
					$a2=split("-",$det["coddes"]);
					$this->setFont("Arial","",7);
					$this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[6],$this->anchos[7],$this->anchos[8],$this->anchos[9],$this->anchos[10],$this->anchos[11],$this->anchos[12],$this->anchos[3],$this->anchos[6],$this->anchos[7],$this->anchos[8],$this->anchos[9],$this->anchos[10],$this->anchos[11],$this->anchos[12],$this->anchos[3]));
					$this->SetAligns(array("C","C","C","C","C","C","C","C","C","R","C","C","C","C","C","C","C","R"));
		    		$this->SetBorder(1);
		    		$this->Row(array($dato["reftra"],substr($dato["fectra"],8,2)."/".substr($dato["fectra"],5,2)."/".substr($dato["fectra"],0,4),$a1[0],$a1[1],$a1[2],$a1[3],$a1[4],$a1[5],$a1[6],H::FormatoMonto($det["monmov"]),$a2[0],$a2[1],$a2[2],$a2[3],$a2[4],$a2[5],$a2[6],H::FormatoMonto($det["monmov"])));
		    		$this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[6],$this->anchos[7],$this->anchos[8],$this->anchos[9],$this->anchos[10],$this->anchos[11],$this->anchos[12],$this->anchos[3],$this->anchos[6],$this->anchos[7],$this->anchos[8],$this->anchos[9],$this->anchos[10],$this->anchos[11],$this->anchos[12],$this->anchos[3]));
					$this->SetAligns(array("C","C","C","C","C","C","C","C","C","R","C","C","C","C","C","C","C","R"));
					}else{
					$a1=split("-",$det["codori"]);
					$a2=split("-",$det["coddes"]);
					$this->setFont("Arial","",7);
					$this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[6],$this->anchos[7],$this->anchos[8],$this->anchos[9],$this->anchos[10],$this->anchos[11],$this->anchos[12],$this->anchos[3],$this->anchos[6],$this->anchos[7],$this->anchos[8],$this->anchos[9],$this->anchos[10],$this->anchos[11],$this->anchos[12],$this->anchos[3]));
					$this->SetAligns(array("C","C","C","C","C","C","C","C","C","R","C","C","C","C","C","C","C","R"));
		    		$this->SetBorder(1);
		    		$this->Row(array("","",$a1[0],$a1[1],$a1[2],$a1[3],$a1[4],$a1[5],$a1[6],H::FormatoMonto($det["monmov"]),$a2[0],$a2[1],$a2[2],$a2[3],$a2[4],$a2[5],$a2[6],H::FormatoMonto($det["monmov"])));
		    		$this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[6],$this->anchos[7],$this->anchos[8],$this->anchos[9],$this->anchos[10],$this->anchos[11],$this->anchos[12],$this->anchos[3],$this->anchos[6],$this->anchos[7],$this->anchos[8],$this->anchos[9],$this->anchos[10],$this->anchos[11],$this->anchos[12],$this->anchos[3]));
					$this->SetAligns(array("C","C","C","C","C","C","C","C","C","R","C","C","C","C","C","C","C","R"));

					}

                }
                	$this->SetAligns(array("C","C","C","C","C","C","C","C","C","R","C","C","C","C","C","C","C","R"));
		    		$this->SetBorder(1);
		    		$this->setFont("Arial","B",7);
		    		$this->Row(array("","","","","","","","","",H::FormatoMonto($dato["tottra"]),"","","","","","","",H::FormatoMonto($dato["tottra"])));
		    		$total+=$dato["tottra"];

                 }
                    $this->SetWidths(array($this->anchos[0]+$this->anchos[1]+$this->anchos[6]+$this->anchos[7]+$this->anchos[8]+$this->anchos[9]+$this->anchos[10]+$this->anchos[11]+$this->anchos[12],$this->anchos[3],$this->anchos[6]+$this->anchos[7]+$this->anchos[8]+$this->anchos[9]+$this->anchos[10]+$this->anchos[11]+$this->anchos[12],$this->anchos[3]));
                    $this->SetAligns(array("C","R","C","R"));
		    		$this->SetBorder(1);
		    		$this->setFont("Arial","B",7);
		    		$this->Row(array("TOTAL",H::FormatoMonto($total),"",H::FormatoMonto($total)));
		    		$total=0;
               unset($this->pretrasla);
               $this->sety(240);
            $this->SetWidths(array(100,100));
		    $this->SetAligns(array("C","C"));
		    $this->SetBorder(1);
            $this->ln();
			$this->Row(array("REVISADO","CONFORMADO"));
			// $this->ln();
			$this->setJump(8);
		    $this->Row(array($this->revisado,$this->conformado));
		    $this->setJump(2);
		     $this->Row(array("Analista de Presupuesto","Director de la Oficina de Planificación y Presupuesto"));
            }
	}
