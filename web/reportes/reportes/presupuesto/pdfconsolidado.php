<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/presupuesto/Consolidado.class.php");

	class pdfreporte extends fpdf
	{
		var $bd;
		var $sql;
		var $titulos;
		var $codpredesde;
		var $codprehasta;
		var $perdesde;
		var $perhasta;
		var $anopresup;
		var $comodin;
		var $codpreasiini;

	function pdfreporte()
	{
	 $this->fpdf("l","mm","Letter");

	$this->arrp=array("no_vacio");
		 $this->bd=new basedatosAdo();
	 $this->cab=new Cabecera();
	 $this->titulos=array();
	 $this->anopresup=H::GetPost("anopresup");
	 $this->perdesde=H::GetPost("perdesde");
	 $this->perhasta=H::GetPost("perhasta");
	 $this->codpredesde=H::GetPost("codpredesde");
	 $this->codprehasta=H::GetPost("codprehasta");
	 $this->comodin=H::GetPost("comodin");
	 $this->consolidado= new Consolidado();
	 $this->arr_cpasiini=$this->consolidado->sql_cpasiini($this->codpredesde,$this->codprehasta,$this->perdesde,$this->perhasta,$this->comodin);
     if ($this->perdesde=='00')
     {
       $this->periodos=$this->consolidado->sql_cpdefniv();
       $fechaini=$this->periodos[0][0];
       $fechacie=$this->periodos[0][1];
     }else
     {
       $this->periodo1=$this->consolidado->sql_cppereje($this->perdesde);
       $this->periodo2=$this->consolidado->sql_cppereje($this->perhasta);
       $fechaini=$this->periodo1[0]["fecini"];
       $fechacie=$this->periodo2[0]["feccie"];
     }
     $this->ano=substr($fechaini,0,4);
     $this->consolidado->sql_consolidado_nuevo();
     foreach ($this->arr_cpasiini as $datos)
     {
     	$this->consolidado->generaconsolidado($datos["codpre"],$datos["nompre"],$fechaini,$fechacie);
     }
     $this->arrp=$this->consolidado->sqlp($this->codpredesde,$this->codprehasta,$this->perdesde,$this->perhasta,$this->anopresup,$this->comodin);
	 $this->llenartitulosmaestro();

	}

	function llenartitulosmaestro()
	{
	 $this->titulos[0]="CODIGO PRESUPUESTARIO";
	 $this->titulos[1]="DESCRIPCION";
	 $this->titulos[2]="FECHA";
	 $this->titulos[3]="TIPO";
	 $this->titulos[4]="PRECOMPR.";
	 $this->titulos[5]="COMPROM.";
	 $this->titulos[6]="CAUSADO";
	 $this->titulos[7]="PAGADO";
	 $this->titulos[8]="STATUS";
	 $this->titulos[9]="SALDO";
	 $this->titulos[10]="MONTO";
	 $this->titulos[11]="DISPONIBILIDAD:";
	 $this->titulos[12]="REFEENCIAS";
	 $this->titulos[13]="BENEFICIARIO";
	}

	function Header()
	{
	 $mesdes=H::ObtenerMesenLetras($this->perdesde);
	 $meshas=H::ObtenerMesenLetras($this->perhasta);
	 $y=$this->getY();
	 $this->setxy(10,50);
	 $this->setFont("Arial","B",7);
	 $this->cell(60,5,'Desde : '.$mesdes.'   Hasta:  '.$meshas);
	 $this->setFont("Arial","B",6);
	 $this->sety($y);
	 //$this->getCabecera(H::GetPost("titulo"),'');
	 $this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s");
	 $this->ln(4);
	  $this->SetWidths(array(15,15,20,20,20,20,70,40,20,20));
     $this->SetAligns(array("L","L","C","C","C","C","L","L","R","R"));
      $this->setFont("Arial","B",7);
     $this->RowM(array($this->titulos[2],$this->titulos[3],$this->titulos[4],$this->titulos[5],$this->titulos[6],$this->titulos[7],$this->titulos[1],$this->titulos[13],$this->titulos[10],$this->titulos[9],));

	/* $this->cell(15,6,$this->titulos[2]);  //Fecha
	 $this->cell(15,6,$this->titulos[3]);	//Tipo
	 $this->cell(20,6,$this->titulos[4]);   //precompr
	 $this->cell(20,6,$this->titulos[5]);	//comprom
	 $this->cell(20,6,$this->titulos[6]);	//causado
	 $this->cell(20,6,$this->titulos[7]);	//pagado
	 $this->cell(70,6,$this->titulos[1]);	//descripcion
	 $this->cell(45,6,$this->titulos[13]);	//benefi
	 $this->cell(20,6,$this->titulos[10]);	//monto
	 $this->cell(20,6,$this->titulos[9]);	//Saldo*/
	 $this->ln();
	 $this->Line($this->GetX(),$this->GetY()+1,$this->GetX()+260,$this->GetY()+1);
	 $this->ln(6);
	 $this->SetWidths(array(15,15,20,20,20,20,70,40,20,20));
     $this->SetAligns(array("L","L","C","C","C","C","L","L","R","R"));
    }


	function Cuerpo()
	{

	 $cf_disper=0;
	 $es_primero=1;
	 $el_codigo="";
	 $totreg=count($this->arrp);
	 //$entro=false;

     foreach($this->arrp as $datos)
	 {
	 	$entro=false;
	   $this->setFont("Arial","",8);
       $asignacion=$this->consolidado->sql_cuerpo_cpasiini($datos["codpreasiini"],$this->comodin);
       $cf_trapos=$this->consolidado->sql_cuerpo_cpmovtrapos($datos["codpreasiini"],$this->perdesde,$this->perhasta);
	   $cf_traneg=$this->consolidado->sql_cuerpo_cpmovtraneg($datos["codpreasiini"],$this->perdesde,$this->perhasta);
	   $cf_adi=$this->consolidado->sql_cuerpo_cpmovadi($datos["codpreasiini"],$this->perdesde,$this->perhasta);
   	   $cf_dis=$this->consolidado->sql_cuerpo_cpmovadidis($datos["codpreasiini"],$this->perdesde,$this->perhasta);
 	   $cf_compro=$this->consolidado->sql_cuerpo_cpimpcom($datos["codpreasiini"],$this->perdesde,$this->perhasta);
       $cf_comcau=$this->consolidado->sql_cuerpo_cpimpcau($datos["codpreasiini"],$this->perdesde,$this->perhasta);
	   $cf_compag=$this->consolidado->sql_cuerpo_cpimppag($datos["codpreasiini"],$this->perdesde,$this->perhasta);
	   $cf_monajucom=$this->consolidado->sql_cuerpo_cpimpcomaju($datos["codpreasiini"],$this->perdesde,$this->perhasta);
	   $cf_monajucau=$this->consolidado->sql_cuerpo_cpimpcauaju($datos["codpreasiini"],$this->perdesde,$this->perhasta);
       $cf_monajupag=$this->consolidado->sql_cuerpo_cpimppagaju($datos["codpreasiini"],$this->perdesde,$this->perhasta);
	   $cf_disper=($asignacion[0][0] + ($cf_trapos[0][0] - $cf_traneg[0][0]) + ($cf_adi[0][0] - $cf_dis[0][0]) - ($cf_compro[0][0]+$cf_comcau[0][0]+$cf_compag[0][0])+($cf_monajucom[0][0]+$cf_monajucau[0][0]+$cf_monajupag[0][0]));
	   $this->setFont("Arial","B",9);
	   $this->SetXY(15,55);
	   $this->SetTextColor(0,0,150);
	   $this->cell(75,6,$datos["codpreasiini"]);
	   $this->cell(100,6,$datos["nompreasiini"]);
	   $this->SetTextColor(150,0,0);
	   $this->SetXY(160,50);
	   $dis=$this->consolidado->sql_cuerpo_disponibilidad($datos["codpreasiini"],$this->ano,$this->comodin);
	   $this->setFont("Arial","B",9);
	   $this->cell(80,5,'ASIG.INICIAL:      '.H::FormatoMonto($asignacion[0][0]),0,0,'R');
	   $this->ln(13);
       $arrp2=$this->consolidado->sql_cuerpo_consolidado_nuevo($datos["codpreasiini"],$this->comodin);
       $total_monmov=0;$total_dis=0;

       foreach ($arrp2 as $datos2)
       {
       	$entro=true;
       $t=$this->gety();
      /* if ($t>=45 and $t<=55){
       $this->setFont("Arial","B",9);
	   $this->SetTextColor(0,0,150);
	   $this->cell(75,6,$datos["codpreasiini"]);
	   $this->cell(100,6,$datos["nompreasiini"]);
	   $this->ln(7);
       	}*/
     	$this->setFont("Arial","",8);
		$this->SetTextColor(0,0,0);
		if ($datos2["refprc"]=='NULO') {
			$pre="";
		}
		else{
			$pre=$datos2["refprc"];
		}
		if ($datos2["refcom"]=='NULO') {
			$com="";
		}
		else{
			$com=$datos2["refcom"];
		}
		if ($datos2["refcau"]=='NULO') {
			$cau=" ";
		}
		else{
			$cau=$datos2["refcau"];
		}
		if ($datos2["refpag"]=='NULO') {
			$pag="";
		}
		else{$pag=$datos2["refpag"];
		}
		if ($es_primero==1)
		{
		$disponible=$asignacion[0][0];
		$el_codigo=$datos["codpreasiini"];
		 $es_primero=0;
		}
		else
		{
		 if ((trim($datos["codpreasiini"])) != (trim($el_codigo)))
		 {

		  $disponible=$asignacion[0][0];
		  $el_codigo=$datos["codpreasiini"];
		 }
		}

		if ($datos2["afedis"] != 'N')
		{
		 if ($datos2["afedis"] == 'R')
		 {
		  $disponible=$disponible-$datos2["monmov"];

		 }
		 else
		 {
		  $disponible=$disponible+$datos2["monmov"];
		 }
		}
		$this->SetWidths(array(15,15,20,20,20,20,70,40,20,20));
      	$this->SetAligns(array("L","L","C","C","C","C","L","L","R","R"));
      	$this->SetX(10);
      	$this->setFont("Arial","",7);
		$this->RowM(array($datos2["fecmov"],$datos2["tipmov"],$pre,$com,$cau,$pag,$datos2["desmov"],$datos2["bene"]." ".$datos2["cedrif"],H::FormatoMonto($datos2["monmov"]),H::FormatoMonto($disponible)));
		//Sumatorias
		//$total_monmov= $total_monmov + $datos2["monmov"];
		//$total_dis= $total_dis + $disponible;

	}
	$this->ln(7);

	$this->SetX(250);
	$this->SetTextColor(0,0,150);
	$this->setFont("Arial","B",9);
	if($entro==false){
	$this->cell(20,6,H::FormatoMonto($asignacion[0][0]));
	}else{
	$this->cell(20,6,H::FormatoMonto($disponible));
	}
	$this->setFont("Arial","B",9);
	$this->SetX(15);
	$this->cell(50,6,$datos["codpreasiini"]);
	$this->SetX(87);
	$this->multicell(90,6," ".$datos["nompreasiini"]);
	$this->SetTextColor(0,0,0);

    $puntero=$puntero + 1;
	if ($totreg!=$puntero) {
		$this->AddPage();
		}

	}

	/////////////////TOTALES////////////////////////////
	$cf_moncom=$this->consolidado->sql_total_comprometido($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);
	$cf_moncomcau=$this->consolidado->sql_total_comcausado($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);
	$cf_moncompag=$this->consolidado->sql_total_compagado($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);
	$cf_totcompro=($cf_moncom[0][0] + $cf_moncomcau[0][0] + $cf_moncompag[0][0]);

	$cf_moncau=$this->consolidado->sql_total_causado($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);
	$cf_totcau=$cf_moncau[0][0];

	$cf_pagado=$this->consolidado->sql_total_pagado($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);
	$cf_trades=$this->consolidado->sql_total_traslados($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);
	$cf_ajucom=$this->consolidado->sql_total_ajustecom($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);
	$cf_ajucau=$this->consolidado->sql_total_ajustecau($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);
    $cf_ajupag=$this->consolidado->sql_total_ajustepag($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);
    $cf_adici=$this->consolidado->sql_total_adiciones($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);


    $cf_dismin=$this->consolidado->sql_total_disminuciones($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);
   //H::PrintR($cf_dismin);

	$cf_adidis=$cf_adici[0][0]-$cf_dismin[0][0];
    $cf_ajucomcauaju=$this->consolidado->sql_total_ajucomcauaju($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);
    $cf_ajucompagaju=$this->consolidado->sql_total_ajucompagaju($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);

	//CF_comaju
	$cf_comaju=$cf_totcompro-$cf_ajucom[0][0]-$cf_ajucomcauaju[0][0]-$cf_ajucompagaju[0][0];

	//CF_cauaju
	$cf_cauaju=$cf_totcau-$cf_ajucau[0][0]-$cf_ajucompagaju[0][0];

	//CF_pagaju
	$cf_pagaju=$cf_pagado[0][0]-$cf_ajupag[0][0];

	$cf_traori=$this->consolidado->sql_total_trasori($this->perdesde,$this->perhasta,$this->codpredesde,$this->codprehasta);
    $cf_asirealpre=$this->consolidado->sql_total_asireal($this->codpredesde,$this->codprehasta);
	$cf_asireal=$cf_asirealpre[0][0]+($cf_trades[0][0]-$cf_traori[0][0]+$cf_adidis);

	$this->setFont("Arial","B",10);
	$this->SetTextColor(150,0,0);
	$this->SetXY(15,$this->GetY()+10);
	$this->Cell(80,3,'TOTAL COMPROMETIDO:    '.H::FormatoMonto($cf_totcompro),0,0,'J');
	$this->Cell(80,3,'TOTAL AJUSTES COMPROMISOS:    '.H::FormatoMonto($cf_ajucom[0][0]),0,0,'J');
	$this->Cell(80,3,'TOTAL COMPR. AJUSTADOS:    '.H::FormatoMonto($cf_comaju),0,0,'J');
	$this->Ln(6);
	$this->SetX(15);
	$this->Cell(80,3,'TOTAL CAUSADO:    '.H::FormatoMonto($cf_totcau),0,0,'J');
	$this->Cell(80,3,'TOTAL AJUSTES CAUSADOS:    '.H::FormatoMonto($cf_ajucau[0][0]),0,0,'J');
	$this->Cell(80,3,'TOTAL CAUSA AJUSTADOS:    '.H::FormatoMonto($cf_cauaju),0,0,'J');
	$this->Ln(6);
	$this->SetX(15);
	$this->Cell(80,3,'TOTAL PAGADOS:    '.H::FormatoMonto($cf_pagado[0][0]),0,0,'J');
	$this->Cell(80,3,'TOTAL AJUSTES PAGADOS:    '.H::FormatoMonto($cf_ajupag[0][0]),0,0,'J');
	$this->Cell(80,3,'TOTAL PAGOS AJUSTADOS:    '.H::FormatoMonto($cf_pagaju),0,0,'J');
	$this->Ln(6);
	$this->SetX(15);
	$this->Cell(80,3,'TOTAL TRANSFERENCIAS:    '.H::FormatoMonto($cf_trades[0][0]),0,0,'J');
	$this->Cell(80,3,'TOTAL ADICIONES:    '.H::FormatoMonto($cf_adidis),0,0,'J');
	$this->Cell(80,3,'TOTAL ASIGNACION REAL:    '.H::FormatoMonto($cf_asireal),0,0,'J');
   }
 }
?>