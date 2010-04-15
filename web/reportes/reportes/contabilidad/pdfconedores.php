<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/contabilidad/Conedores.class.php");
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
		var $auxnivel2;
		var $nrorup;
		var $comodin;

		var $loniv1;
		var $fecha_ini;
		var $fecha_cie;
		var $nivel;
		var $fechainicio;
		var $total;
		var $saldo;
		var $cuenta_resultado;
		var $resultado;
		var $Total_Resultado;


		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->campos    = array();
			$this->anchos    = array();
			$this->titulos   = array();
			$this->codcta1   = H::GetPost('codcta1');
			$this->codcta2   = H::GetPost('codcta2');
			$this->periodo   = H::GetPost('periodo');
			$this->auxnivel  = H::GetPost('auxnivel');
			$this->auxnivel2 = H::GetPost('auxnivel2');
			$this->comodin   = H::GetPost('comodin');
			$this->nrorup    = H::GetPost('nrorup');
			$this->nrorup2   = H::GetPost('nrorup2');
			$this->status   = H::GetPost('status');
			$this->obtenerFecha();

 			$objConedores = new Conedores();
 			$this->arrp = $objConedores->SQLP($this->status,$this->periodo, $this->fecha_ini, $this->fecha_cie, $this->nivel, $this->codcta1, $this->codcta2, $this->comodin);

 			$this->arrp_detalles = $this->arrp;

			$this->llenartitulosmaestro();
		}

	function fecha(){
			  $tb36=$this->bd->select("SELECT to_char(B.FECDES,'dd/mm/yyyy') as fecperdes
									  FROM
									  	CONTABA A, CONTABA1 B
									  WHERE A.FECINI = B.FECINI AND
											A.FECCIE = B.FECCIE AND
											B.PEREJE = '".$this->periodo."'");
					if (!$tb36->EOF){  $this->fecperdes=$tb36->fields["fecperdes"]; }

				 $tb36=$this->bd->select("SELECT to_char(B.FECHAS,'dd/mm/yyyy') as fecperhas
									FROM CONTABA A, CONTABA1 B
									WHERE A.FECINI = B.FECINI AND
											A.FECCIE = B.FECCIE AND
											B.PEREJE = '".$this->periodo."'");

					if (!$tb36->EOF){  $this->fecperhas=$tb36->fields["fecperhas"]; }
	         //Calcular el Periodo Anterior = perant
  			  ///////////////////
		} // Return

		function obtenerFecha()
		{
			$temp = new Conedores();
			$this->arrp2 = $temp->SQLContaba();

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
					$this->cuenta_resultado = $this->arrp2[0]["cuenta_resultado"];
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


			////// AUXNIVEL 2   ////////

			  if ($this->auxnivel2==$this->nrorup)
			   {
			   			$this->arrp2 = $temp->SQLContaba_nivel();

						if ($this->arrp2)
						{
							$this->nivel2=$this->arrp2[0]["nivel"];
						}			 //EndIf
			   }	  //EndIf
			   else
			   {
	 			    $this->valor=H::instr($this->forcta,'-',0,$this->auxnivel2);
	 			    $this->arrp2 = $temp->SQLContaba_nivel2($this->valor);

						if ($this->arrp2)
						{
							$this->nivel2=$this->arrp2[0]["nivel"];
						}					//EndIf
			   } //EndIf


		  unset($temp);
		}

		function llenartitulosmaestro()
		{
				$this->anchos[0]=140;
				$this->anchos[1]=40;
				$this->anchos[2]=40;
				$this->anchos[3]=140;
		}

		function Header()
		{  if ($this->status=='S')
			{
			$acum='Acumulado';
			}
			else
			{
				$acum='';
			}
			$this->getCabecera(H::GetPost("titulo"),"");
			$this->fecha();
			$this->setFont("Arial","B",9);
			$year = substr($this->fecha_ini,0,4);
			$mes = substr($this->fecha_ini,5,2);
			$dia = substr($this->fecha_ini,8,2);
			$this->cell(40,10,"Desde: ".$this->fecperdes);

			$year = substr($this->fecha_cie,0,4);
			$mes = substr($this->fecha_cie,5,2);
			$dia = substr($this->fecha_cie,8,2);
			$this->cell(40,10,"Hasta: ".$this->fecperhas."                  ".$acum);
                     ///////////

                     $this->SETXY(190,37); 
                     $this-> cell(40,10,"DEBE             HABER     ");
///////////// 
			$this->Line(10,48,265,48);
			$this->ln();
		}


		function Cuerpo()
		{
			for ($i=1;$i<2;$i++){ $this->Datos($i);	 }
			$this->cell(220,10,'ESTADO DE GANACIAS Y PERDIDAS                                                                                                        ');
			$resultado=$this->ingresos-$this->gastos;
			$this->cell($this->anchos[2]-10,10,H::FormatoMonto($resultado),0,0,'R');//exit;

		}


	function Datos($i){
		$objConedores = new Conedores();

		 if ($i==1)
		 {
		 	$this->arrp;
		 }
		 else
		 {
		 	$this->arrp=$this->arrp_detalles;
		 }

	        $sw=1;
			foreach ($this->arrp as $arrp)
			{
				if($arrp["titulo"]!=" ")
				{
				 $this->setFont("Arial","",8);

						/////////////////////////////////////////////
								$palabra=$arrp["cuenta"];
								$tamano=strlen($palabra);
								$niv=1;
								for ($qi=0;$qi<=$tamano;$qi++){
									if ($palabra[$qi]=='-'):
										$niv=$niv+1;
									endif;
								}
								//print "    ".$niv." - ";
								//print $this->nrorup."<br>";
						///////////////////////////////////////////// TOTALES

					 if ((ltrim(rtrim($arrp["titulo"]))=='TOTAL') and (trim($arrp["saldo"]<>0))) {
  					    $this->setX(35);
						$this->setFont("Arial","B",8);
				 		 $descta=strtoupper(str_pad(' ',strlen(rtrim($arrp["cuenta"]))*2,' ',STR_PAD_RIGHT).substr($arrp["titulo"]." ".$arrp["nombre"],0,75));
						  $this->cell($this->anchos[0],10,$descta);
						 $sw=0;
					 } elseif ((trim($arrp["saldo"]<>0))) {
						$this->setX(10);
						$this->cell($this->anchos[0],10,$arrp["cuenta"]);
  					    $this->setX(35);
  					    $this->setFont("Arial","",8);
						 $descta=strtoupper(str_pad(' ',strlen(rtrim($arrp["cuenta"]))*2,' ',STR_PAD_RIGHT).substr($arrp["nombre"],0,80));
						$this->cell($this->anchos[0],10,$descta);
						 $sw=1;
					 }   //EndIF

				$this->CalcularIngresoYEgreso();


						/////////////////////////////////////////////
								$palabra=$arrp["cuenta"];
								$tamano=strlen($palabra);
								$niv=1;
								for ($wi=0;$wi<=$tamano;$wi++){
									if ($palabra[$wi]=='-'):
										$niv=$niv+1;
									endif;
								}
						/////////////////////////////////////////////
						  $tb_temp=$this->bd->select("SELECT CARGAB as mov FROM CONTABB  WHERE RTRIM(CODCTA)=RTRIM('".$arrp["cuenta"]."')");
						    if (!empty($tb_temp->fields["mov"])){ $mov=$tb_temp->fields["mov"]; }

			  if (((trim($arrp["cargable"]=='C')) and (trim($arrp["saldo"]<>0))) ){

						 $this->cell($this->anchos[2]-10,10,H::FormatoMonto($arrp["saldo"]),0,0,'R');
						  }

				   if ((trim($arrp["titulo"]=='TOTAL')) and (trim($arrp["saldo"]<>0))){
	                            if (strlen(trim($arrp["cuenta"]))==5)
	                            {
	                            $this->cell($this->anchos[2]+9,10,H::FormatoMonto($arrp["saldo"]),0,0,'R');
								$this->Line(186,$this->GetY()+2,204,$this->GetY()+2);
	                            }
	                            else if ((strlen(trim($arrp["cuenta"]))==3))
	                            {
	                            $this->cell($this->anchos[2]+26,10,H::FormatoMonto($arrp["saldo"]),0,0,'R');
								$this->Line(205,$this->GetY()+2,223,$this->GetY()+2);
	                            }
	                            else if ((strlen(trim($arrp["cuenta"]))==1))
	                            {
	                            	if (trim($arrp["cuenta"])==5)
	                            	{
	                            		$this->ingresos=$arrp["saldo"];
	                            	}
	                            	else
	                            	{
	                            		$this->gastos=$arrp["saldo"];
	                            	}

	                            $this->cell($this->anchos[2]+46,10,H::FormatoMonto($arrp["saldo"]),0,0,'R');
								$this->Line(223,$this->GetY()+2,241,$this->GetY()+2);
	                            }
	                            else
	                            {
								$this->cell($this->anchos[2]-10,10,H::FormatoMonto($arrp["saldo"]),0,0,'R');
								$this->Line(186,$this->GetY()+2,204,$this->GetY()+2);
  	                            }
				   }

/*			   if (((trim($arrp["titulo"]=='TOTAL')) )  and   (trim($arrp["cargable"]=='C')) and (trim($arrp["saldo"]<>0))  )
				   {
				   	if ((strlen(rtrim($arrp["cuenta"])))){
								$this->cell($this->anchos[1],10," ");
								$this->cell($this->anchos[2],10,H::FormatoMonto($arrp["saldo"]),0,0,'R');
								 }
					}

				   if ((trim($arrp["titulo"]=='TOTAL')) and (trim($arrp["saldo"]<>0)) ){
								$this->cell($this->anchos[1],10," ");
								$this->cell($this->anchos[2],10,H::FormatoMonto($arrp["saldo"]),0,0,'R');
								$this->Line($this->GetX()+3,$this->GetY()+2,$this->GetX()-30,$this->GetY()+2);
				   }*/
				   /*elseif (trim($arrp["saldo"]<>0))
					   {
								$this->cell($this->anchos[1],10," ");
								$this->cell($this->anchos[2],10,H::FormatoMonto($arrp["saldo"]),0,0,'R');
								//$this->Line($this->GetX()+3,$this->GetY()+2,$this->GetX()-30,$this->GetY()+2);

					   }*/
				if (trim($arrp["saldo"]<>0))
				{
				 $this->ln(5);
				}


		        }  //EndIF


			}

	}


	function CalcularResultado()
	{
		$temp = new Conedores();
		$tb = $temp->SQLContaba2();

		if ($tb)
		{
			$cuenta_pasivo    = $tb[0]["cuenta_pasivo"];
			$cuenta_capital   = $tb[0]["cuenta_capital"];
			$cuenta_resultado = $tb[0]["cuenta_resultado"];
		}

		if (!$tb = $temp->SQLContabb1_pasivo($this->periodo))
		{
			   if (rtrim($cuenta_capital) == rtrim($cuenta_pasivo))
			   {
			   		$capital = 0;
			   }else{
					if ($tb = $temp->SQLContabb1_capital($this->periodo))
					{
						$capital = $tb[0]["capital"];
					}else{ $capital=0; }
			   }

				if ($tb = $temp->SQLContabb1_ingreso($this->periodo))
				{
					$ingreso = $tb[0]["ingreso"];
				}else{ $ingreso=0; }

				if ($tb = $temp->SQLContabb1_egreso($this->periodo))
				{
					$egreso = $tb[0]["egreso"];
				}else{ $egreso=0; }

			   if ((rtrim($cuenta_resultado)==rtrim($cuenta_pasivo)))
			   {
			   		$resultado = 0;
			   }else{
					if ($tb = $temp->SQLContabb1_resultado($this->periodo))
					{
						$resultado = $tb[0]["resultado"];
					}
				}
//FALTA BUSCAR LA VARIABLE PASIVO
			   if (abs($ingreso) > abs($egreso))
			   {
			   		$this->Total_Resultado=(abs($pasivo+$capital+$resultado-(abs($ingreso)-abs($egreso))));
			   }else{
			   		$this->Total_Resultado=(abs($pasivo+$capital+$resultado-(abs($ingreso)-abs($egreso))));
			   }

			}
		}

	function CalcularIngresoYEgreso(){
		$temp = new Conedores();
		if ($tb = $temp->SQLContabb1_ingreso($this->periodo))
		{
			$Tingreso = $tb[0]["ingreso"];

		}else{ $Tingreso = 0; }

		if ($tb = $temp->SQLContabb1_egreso($this->periodo))
		{
			$Tegreso = $tb[0]["egreso"];

		}else{ $Tegreso = 0; }


		$this->total=(abs((abs($Tingreso)-abs($Tegreso))*-1));
		$this->saldo=$this->saldo + ((abs($Tingreso)-abs($Tegreso))*-1);

			}
	}
?>