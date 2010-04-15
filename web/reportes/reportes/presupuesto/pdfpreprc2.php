<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/presupuesto/Preprc2.class.php");

	class pdfreporte extends fpdf
	{
		var $titulos;
		var $titulos2;
		var $pre1;
	    var $pre2;
		var $fecprc1;
		var $fecprc2;
		var $tipprc1;
		var $tipprc2;
		var $combodes;
		var $codpre1;
		var $codpre2;

		function pdfreporte()
		{
			$this->cab=new cabecera();
			$this->fpdf("l","mm","Letter");
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();

			// nro de compromiso
			$this->refprcdes=H::GetPost("refprcdes");
			$this->refprchas=H::GetPost("refprchas");
			// fecha del compromiso
			$this->fecprcdes=H::GetPost("fecprcdes");
			$this->fecprchas=H::GetPost("fecprchas");

			$this->codpredes=H::GetPost("codpredes");
			$this->codprehas=H::GetPost("codprehas");

			$this->elaborado=H::GetPost("elaborado");
			$this->revisado=H::GetPost("revisado");
			$this->registrado=H::GetPost("registrado");
			$this->conformado=H::GetPost("conformado");

		   	$this->preprc2= new Preprc2();
		    $this->arrp=$this->preprc2->sqlp($this->refprcdes,$this->refprchas,$this->fecprcdes,$this->fecprchas,$this->codpredes,$this->codprehas);
		//  H::printR($this->arrp);
     		$this->llenartitulosmaestro();
			$this->llenaranchos();
	}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="ACT";
				$this->titulos[1]="PART.";
				$this->titulos[2]="GEN";
				$this->titulos[3]="ESP";
				$this->titulos[4]="SUB-ESP";
				$this->titulos[5]="DENOMINACION";
				$this->titulos[6]="BENEFICIARIO";
				$this->titulos[7]="ASIGNACION INICIAL";
				$this->titulos[8]="PRE-COMPROMISO";
				$this->titulos[9]="DISPONIBILIDAD";
				$this->titulos[10]="DIRECCION DE ADMINISTRACION Y FINANZAS";
				$this->titulos[11]="OFICINA DE PLANIFICACION Y PRESUPUESTO";
		}



  function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=10;
		$this->anchos[1]=10;
		$this->anchos[2]=10;
		$this->anchos[3]=10;
		$this->anchos[4]=12;
		$this->anchos[5]=60;
		$this->anchos[6]=50;
		$this->anchos[7]=30;
		$this->anchos[8]=30;
		$this->anchos[9]=30;
		$this->anchos[10]=250;
		$this->anchos[11]=250;



	}


		function Header()
		{
			$this->cab->poner_cabecera_f_b($this,$_POST["titulo"],$this->conf,"s","s");
			//$this->getCabecera(H::GetPost("titulo"),"");
			$this->setFont("Arial","B",6);
			$this->ln();
			$this->setX(170);
			$this->cell(90,5,"SEGUN PRE-COMPROMISO",1,0,'C');
			$this->ln();
		    $this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[2],$this->anchos[3],$this->anchos[4],$this->anchos[5]+$this->anchos[6]-2,$this->anchos[7],$this->anchos[8],$this->anchos[9]));
			$this->SetAligns(array("C","C","C","C","C","C","C","C","C"));
		    $this->SetBorder(1);
			$this->Row(array($this->titulos[0],$this->titulos[1],$this->titulos[2],$this->titulos[3],$this->titulos[4],$this->titulos[5],$this->titulos[7],$this->titulos[8],$this->titulos[9]));
            $this->SetAligns(array("C","C","C","C","C","L","R","R","R"));

		}

		function Cuerpo()
		{
			$ref="";
			$acum1=0;
			$acum2=0;
			$acum3=0;

			foreach($this->arrp as $dato)
			{
			$aux=split("-",$dato["codpre"]);
			$this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[2],$this->anchos[3],$this->anchos[4],$this->anchos[5]+$this->anchos[6]-2,$this->anchos[7],$this->anchos[8],$this->anchos[9]));
			$this->SetAligns(array("C","C","C","C","C","L","R","R","R"));
		    $this->SetBorder(1);
			$this->Row(array($aux[2],$aux[3],$aux[4],$aux[5],$aux[6],$dato["desprc"],H::FormatoMonto($dato["monasi"]),H::FormatoMonto($dato["monimp"]),H::FormatoMonto($dato["monasi"]-$dato["monimp"])));
			$acum1+=$dato["monasi"];
			$acum2+=$dato["monimp"];
			$acum3+=$dato["monasi"]-$dato["monimp"];
			}
	        $this->SetWidths(array($this->anchos[0]+$this->anchos[1]+$this->anchos[2]+$this->anchos[3]+$this->anchos[4]+$this->anchos[5]+$this->anchos[6]-2,$this->anchos[7],$this->anchos[8],$this->anchos[9]));
			$this->SetAligns(array("R","R","R","R"));
		    $this->SetBorder(1);
			$this->Row(array("TOTALES",H::FormatoMonto($acum1),H::FormatoMonto($acum2),H::FormatoMonto($acum3)));

			$this->SetWidths(array(250));
			$this->SetAligns(array("C"));
		    $this->SetBorder(1);
		    if ($this->getY()>=160){
		    	$this->addPage();
		    	$this->setY(60);
		    	$this->SetWidths(array(250));
				$this->SetAligns(array("C"));
		    	$this->SetBorder(1);
		    }
			$this->Row(array("OFICINA DE PLANIFICACIÓN Y PRESUPUESTO"));
			$this->rect(10,$this->getY(),250,20);
			$this->SetWidths(array(170,80));
			$this->SetAligns(array("L","L"));
		    $this->SetBorder(0);
		    $this->Row(array("",""));
			$this->Row(array("                ELABORADO POR:","REVISADO POR:"));
			$this->SetWidths(array(170,80));
			$this->SetAligns(array("L","L"));
		    $this->SetBorder(0);
			$this->Row(array("                ".$this->elaborado,$this->revisado));
			//$this->Row(array("","DIRECCION ADMINISTRACION Y FINAZAS"));
			$this->SetWidths(array(250));
			$this->SetAligns(array("C"));
		    $this->SetBorder(1);
			$this->Row(array("DIRECCIÓN DE ADMINISTRACIÓN Y FINANZAS"));
			$this->rect(10,$this->getY(),250,20);
			$this->SetWidths(array(170,80));
			$this->SetAligns(array("L","L"));
		    $this->SetBorder(0);
		    $this->Row(array("",""));
			$this->Row(array("                REGISTRADO POR:","CONFORMADO POR:"));
			$this->SetWidths(array(170,80));
			$this->SetAligns(array("L","L"));
		    $this->SetBorder(0);
			$this->Row(array("                ".$this->registrado,$this->conformado));
			$this->SetWidths(array(170,80));
			$this->SetAligns(array("L","L"));
		    $this->SetBorder(0);
			//$this->Row(array("                ANALISTA DE PRESUPUESTO","JEFE DE OFICINA DE PLANIFICACION Y PRESUPUESTO"));



			//---------------------------------------------------------------------
				//unset($this->PrePrc);
		}
	}
?>
