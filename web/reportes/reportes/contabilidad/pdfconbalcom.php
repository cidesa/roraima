<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/modelo/sqls/contabilidad/Conbalcom.class.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/business/contabilidad.class.php");

	class pdfreporte extends fpdf
	{
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $ancho;
		var $campos;

		var $codcta1;
		var $codcta2;
		var $periodo;
 		var $auxnivel;
		var $comodin;
		var $archtxt;
		var $nrorup;
		var $actualizar;

		var $fecperdes;
		var $feccie;

		var $cuenta;
		var $perant;
		var $salant;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd        = new basedatosAdo();
			$this->campos    = array();
			$this->anchos    = array();
			$this->titulos   = array();
			$this->codcta1   = H::GetPost('codcta');
			$this->codcta2   = H::GetPost('codcta1');
			$this->periodo   = H::GetPost('periodo');
			$this->auxnivel  = H::GetPost('auxnivel');
			$this->comodin   = H::GetPost('comodin');
			$this->archtxt   = H::GetPost('archtxt');
			$this->nrorup    = H::GetPost('nrorup');
			$this->actualizar= H::GetPost('actualizar');

			//$this->ChequearActualizar();
			$this->obtenerFecha();

		    $objConbalcom = new Conbalcom();
            $this->arrp = $objConbalcom->SQLP($this->periodo, $this->fecha_ini, $this->fecha_cie, $this->nivel, $this->codcta1, $this->codcta2, $this->comodin);


			//print $this->sql;
			$this->llenartitulosmaestro();
		}

		function ChequearActualizar()
		{
		  if ($this->actualizar=='SI'){

		  	 $contabilidad = new Contabilidad();
			 $contabilidad->ReactualizarSaldosAnteriores();
			 $contabilidad->ActualizarMaestro();
			 $this->actualizar_balance = $objConbalcom->actualizar_balance();

		  } //EndIf;
		} //Return





		function obtenerFecha()
		{
			$temp = new Conbalcom();
			$this->arrp2 = $temp->SQLContaba1();

			if ($this->arrp2)
			{
				$this->fechainicio = $this->arrp2[0]["fechainic"];
				$this->forcta      = $this->arrp2[0]["forcta"];
			}

			$this->valor = H::instr($this->forcta,'-',0,1);

  		    $this->arrp2 = $temp->SQLContaba_loniv1($this->valor);

				if ($this->arrp2)
				{
					$this->loniv1    = $this->arrp2[0]["loniv1"];
					$this->fecha_ini = $this->arrp2[0]["fecha_ini"];
					$this->fecha_cie = $this->arrp2[0]["fecha_cie"];
				} //EndIf

			////// AUXNIVEL 1   ////////

			  if ($this->auxnivel==$this->nrorup)
			   {
			   			$this->arrp2 = $temp->SQLContaba_nivel();

						if ($this->arrp2)
						{
							$this->nivel=$this->arrp2[0]["nivel"];
						}			 //EndIf
			   }	  //EndIf
			   else
			   {
	 			    $this->valor=H::instr($this->forcta,'-',0,$this->auxnivel);
	 			    $this->arrp2 = $temp->SQLContaba_nivel2($this->valor);

						if ($this->arrp2)
						{
							$this->nivel=$this->arrp2[0]["nivel"];
						}					//EndIf
			   } //EndIf
		  unset($temp);
		}	//Return



		function llenartitulosmaestro()
		{
				$this->anchos[0]=120;
				$this->anchos[1]=40;
				$this->anchos[2]=40;
				$this->anchos[3]=45;
				$this->anchos[4]=75;
		}

		function Header()
		{
			$this->getCabecera(H::GetPost("titulo"),"");
			$this->setFont("Arial","B",9);
			$this->fecha();
			$this->cell(40,10,"Desde: ".$this->fecperdes."  ");
			$this->cell(20,10,"Hasta: ".$this->fecperhas);
			$this->ln(4);
			$this->cell($this->anchos[1],10,"Código de Cuenta");
			$this->cell($this->anchos[4],10,"Descripción de Cuenta");
//			$this->cell(22,10," ");
			$this->cell(20,10,"Saldo Anterior",0,0,'R');
			$this->cell(30,10,"Debe",0,0,'R');
			$this->cell(30,10,"Haber",0,0,'R');
			$this->cell(30,10,"Saldo del Mes",0,0,'R');
 			$this->cell(30,10,"Saldo Actual",0,0,'R');
			$this->Line(10,48,270,48);
			$this->ln();
		}

		function fecha(){
			$temp = new Conbalcom();
			        $this->arrp2 = $temp->SQLContaba_Fecperdes($this->periodo);
					if ($this->arrp2){  $this->fecperdes=$this->arrp2[0]["fecperdes"]; }

					$this->arrp2 = $temp->SQLContaba_Fecperhas($this->periodo);
					if ($this->arrp2){  $this->fecperhas=$this->arrp2[0]["fecperhas"]; }

	         //Calcular el Periodo Anterior = perant
					  if($this->periodo=='01'){  $this->perant='12'; }
					  if($this->periodo=='02'){  $this->perant='01'; }
					  if($this->periodo=='03'){  $this->perant='02'; }
					  if($this->periodo=='04'){  $this->perant='03'; }
					  if($this->periodo=='05'){  $this->perant='04'; }
					  if($this->periodo=='06'){  $this->perant='05'; }
					  if($this->periodo=='07'){  $this->perant='06'; }
					  if($this->periodo=='08'){  $this->perant='07'; }
					  if($this->periodo=='09'){  $this->perant='08'; }
					  if($this->periodo=='10'){  $this->perant='09'; }
					  if($this->periodo=='11'){  $this->perant='10'; }
					  if($this->periodo=='12'){  $this->perant='11'; }
  			  ///////////////////

  			  unset($temp);
		} // Return

		function Cuerpo()
		{
			$objConbalcom = new Conbalcom();
			//$tb=$this->bd->select($this->sql);

			//$sw=0;
			$acum_saldo_ant=0;
			$acum_debe=0;
			$acum_haber=0;
			$acum_saldo_act=0;
  		    $this->setFont("Arial","",8);

  		    foreach ($this->arrp as $arrp)
			{
				if ($arrp["titulo"]!=" "){
 				    $this->cuenta=$arrp["cuenta"];
					$this->Buscar_Saldo_Anterior();

					 if (ltrim(rtrim($arrp["titulo"]))=='TOTAL')
					 {
 					    $this->Line(119,$this->GetY(),270,$this->GetY());
						$this->cell($this->anchos[1],4," ");
						$this->setFont("Arial","B",8);
						$y=$this->GetY();
						$x=$this->GetX()+$this->anchos[4]-10;
						$this->Multicell($this->anchos[4],4,strtoupper($arrp["titulo"]." ".$arrp["nombre"]));
						$y1=$this->GetY();
						$this->SetXY($x,$y);
						$this->cell(30,4,H::FormatoMonto(abs($this->salant)),0,0,'R');
						$this->cell(30,4,H::FormatoMonto(abs($arrp["debito"])),0,0,'R');
						$this->cell(30,4,H::FormatoMonto(abs($arrp["credito"])),0,0,'R');
						$this->cell(30,4,H::FormatoMonto(abs($arrp["salper"])),0,0,'R');
						$this->cell(30,4,H::FormatoMonto(abs($arrp["saldo"])),0,0,'R');

					$this->setFont("Arial","",8);
					 }
					 else
					 {  $sw=0;
  					    $this->cell($this->anchos[1],4,$this->cuenta);
						$y=$this->GetY();
						$x=$this->GetX()+$this->anchos[4]-10;
						$this->MultiCell($this->anchos[4],4,strtoupper($arrp["nombre"]));
						$y1=$this->GetY();
					 }   //EndIF

					if ($arrp["cargable"]=='C')
					{
						$this->SetXY($x,$y);
						$this->cell(30,4,H::FormatoMonto(abs($this->salant)),0,0,'R');
						$this->cell(30,4,H::FormatoMonto(abs($arrp["debito"])),0,0,'R');
						$this->cell(30,4,H::FormatoMonto(abs($arrp["credito"])),0,0,'R');
						$this->cell(30,4,H::FormatoMonto(abs($arrp["salper"])),0,0,'R');
						$this->cell(30,4,H::FormatoMonto(abs($arrp["saldo"])),0,0,'R');
					}
					$this->SetY($y1);
					$this->ln();
				}  //EndIf
			}

			     ///Para buscar el total
			        $this->arrp1 = $objConbalcom->SQLContabb($this->periodo, $this->codcta1, $this->codcta2);
					if (!empty($this->arrp1[0]["total_deb"])){
							$this->setFont("Arial","B",9);
							$this->ln();
							$this->cell($this->anchos[1],10," ");
							 $this->cell($this->anchos[4],10,"TOTAL DEBITO  :");
							 $this->cell(35,10,H::FormatoMonto($this->arrp1[0]["total_deb"]),0,0,'R');
							 $this->ln(4);
							 $this->cell($this->anchos[1],10," ");
							 $this->cell($this->anchos[4],10,"TOTAL CREDITO:");
							 $this->cell(35,10,H::FormatoMonto($this->arrp1[0]["total_cre"]),0,0,'R');
							 }

		unset($objConbalcom);
		}


	function Buscar_Saldo_Anterior(){
		$temp = new Conbalcom();
			  if ($this->periodo == '01')
			  {
			    $this->arrp2 = $temp->SQLContabb2($this->cuenta, $this->perant);

		  	  }else{
		  	    $this->arrp2 = $temp->SQLContabb1($this->cuenta, $this->perant);

			  }
				if (!$this->arrp2)
				{
					$this->salant=$this->arrp2[0]["salant"];
				}else{
					$this->salant=0;
				}

		unset($temp);
	}  //Fin Return
}
?>