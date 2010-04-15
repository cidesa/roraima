<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/presupuesto/Libranza.class.php");

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
	 $this->consolidado= new Libranza();
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
	 $this->titulos[]="CODIGO PRESUPUESTARIO";
	 $this->titulos[]="DESCRIPCION";
	  $this->titulos[]="TIPMOV";
	 $this->titulos[]="FECHA";
	 $this->titulos[]="NRO. MOVIMIENTO";
	 $this->titulos[]="BENEFICIARIO";
	 $this->titulos[]="MODIF.";
	 $this->titulos[]="PRECOMPR.";
	 $this->titulos[]="COMPROM.";
	 $this->titulos[]="CAUSADO";
	 $this->titulos[]="PAGADO";
	 //$this->titulos[]="STATUS";
	 $this->titulos[]="SALDO";

	 //$this->titulos[]="DISPONIBILIDAD:";
	 //$this->titulos[]="REFEENCIAS";

	}

	function Header()
	{
	 $mesdes=H::ObtenerMesenLetras($this->perdesde);
	 $meshas=H::ObtenerMesenLetras($this->perhasta);
	 $y=$this->getY();
	 $this->setxy(10,52);
	 $this->SetTextColor(0,0,0);
	 $this->setFont("Arial","B",7);
	 $this->cell(60,5,'Desde : '.$mesdes.'   Hasta:  '.$meshas);
	 $this->setFont("Arial","B",9);
	 $this->sety($y);
	 $this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s");
	 //$this->getCabecera(H::GetPost("titulo"),'');
	 $this->ln(4);
	 $this->setFont("Arial","B",9);
	$this->SetWidths(array(15,15,25,50,25,25,25,25,25,25));
      	$this->SetAligns(array("L","C","L","L","R","R","R","R","R"));
     $this->SetX(10);

	 $this->RowM((array_slice($this->titulos,2,10)));

	 $this->ln();
	 $this->Line($this->GetX(),$this->GetY()-1,$this->GetX()+255,$this->GetY()-1);
	 $this->ln(6);
    }


	function Cuerpo()
	{

	 $cf_disper=0;
	 $es_primero=1;
	 $tot_prc = 0;
	 $tot_com = 0;
	 $tot_cau = 0;
	 $tot_pag = 0;
	 $tot_mod = 0;
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
	   $this->SetXY(15,58);
	   $this->SetTextColor(0,0,150);
	   $this->cell(75,6,$datos["codpreasiini"]);
	   $this->cell(100,6,$datos["nompreasiini"]);
	   $this->SetTextColor(150,0,0);
	   $this->SetXY(160,52);
	   $dis=$this->consolidado->sql_cuerpo_disponibilidad($datos["codpreasiini"],$this->ano,$this->comodin);
	   $this->setFont("Arial","B",9);
	   $this->cell(80,5,'ASIGNACION INICIAL:      '.H::FormatoMonto($asignacion[0][0]),0,0,'R');
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
		if ($datos2["refpag"]=='NULO') {
			if($datos2["refcau"]=='NULO')
			{
				if($datos2["refcom"]=='NULO')
					$pre=$datos2["refprc"];
				else
					$pre=$datos2["refcom"];
			}else
				$pre=$datos2["refcau"];
		}
		else
			$pre=$datos2["refpag"];

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
		 {//print $disponible."-".$datos2["monmov"];exit;
		  $disponible=$disponible-$datos2["monmov"];
		 }
		 else
		 {
		  $disponible=$disponible+$datos2["monmov"];
		 }
		}
//print $disponible;exit;
		$this->SetWidths(array(15,15,25,50,25,25,25,25,25,25));
      	$this->SetAligns(array("L","C","L","L","R","R","R","R","R"));
      	$this->SetX(10);
      	$this->setFont("Arial","",7);
      		$this->SetAligns(array("L","C","L","L","R","R","R","R","R"));
		$this->RowM(array($datos2["tipmov"],$datos2["fecmov"],$pre,$datos2["bene"],H::FormatoMonto($datos2["monmod"]),H::FormatoMonto($datos2["monprc"]),
							H::FormatoMonto($datos2["moncom"]),H::FormatoMonto($datos2["moncau"]),H::FormatoMonto($datos2["monpag"]),
							H::FormatoMonto($disponible)));
								$this->SetAligns(array("L","C","L","L","R","R","R","R","R"));
		//Sumatorias
		$tot_prc += $datos2["monprc"];
		$tot_com += $datos2["moncom"];
		$tot_cau += $datos2["moncau"];
		$tot_pag += $datos2["monpag"];
		$tot_mod += $datos2["monmod"];

	}
	$this->ln(7);

	$this->SetX(250);
	$this->SetTextColor(0,0,150);
	$this->setFont("Arial","B",9);
	/*if($entro==false){
	$this->cell(20,6,H::FormatoMonto($asignacion[0][0]));
	}else{
	$this->cell(20,6,H::FormatoMonto($disponible));
	}*/
	$this->ln();

    $puntero=$puntero + 1;
	if ($totreg!=$puntero) {
		//TOTALES
	$this->RowM(array("","","TOTALES",H::FormatoMonto($tot_mod),H::FormatoMonto($tot_prc),
							H::FormatoMonto($tot_com),H::FormatoMonto($tot_cau),H::FormatoMonto($tot_pag),
							H::FormatoMonto($disponible)));

		$this->AddPage();
			$this->SetAligns(array("L","C","L","L","R","R","R","R","R"));
		/*$this->setFont("Arial","B",9);
		$this->SetX(15);
		$this->cell(50,6,$datos["codpreasiini"]);
		$this->SetX(87);
		$this->multicell(90,6," ".$datos["nompreasiini"]);
		$this->SetTextColor(0,0,0);*/
		}

	}

	//TOTALES
	$this->RowM(array("","","TOTALES",H::FormatoMonto($tot_mod),H::FormatoMonto($tot_prc),
							H::FormatoMonto($tot_com),H::FormatoMonto($tot_cau),H::FormatoMonto($tot_pag),
							H::FormatoMonto($disponible)));
   }
 }
?>