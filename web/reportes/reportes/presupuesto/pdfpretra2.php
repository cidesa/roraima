<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/modelo/sqls/presupuesto/Pretra2.class.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $ancho;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $reftra1;
		var $reftra2;
		var $fectra1;
		var $fectra2;
		var $pertra1;
		var $pertra2;
		var $stacom;
		var $codpre1;
		var $codpre2;
		var $comodin;
		var $acum_mon;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");

				$this->bd=new basedatosAdo();
			$this->acum_mon=0;
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->ancho=array();
			$this->reftra1=H::GetPost("codtrades");
			$this->reftra2=H::GetPost("codtrahas");
			$this->fectra1=H::GetPost("fecdes");
			$this->fectra2=H::GetPost("fechas");
			$this->estado=H::GetPost("combodes");
			$this->pertra1=H::GetPost("pertrades");
			$this->pertra2=H::GetPost("pertrahas");

			 $this->llenartitulosmaestro();
			//$this->llenartitulosdetalle();
			$this->pretra2 = new Pretra2();
			$this->cab=new cabecera();
			$this->arrp = $this->pretra2->sqlp($this->reftra1,$this->reftra2,$this->pertra1,$this->pertra2,$this->fectra1,$this->fectra2,$this->estado);

$this->i=0;
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="PERIODO";
				$this->titulos[1]="REFERENCIA";
				$this->titulos[2]="FECHA";
				$this->titulos[3]="DESCRIPCION";
				$this->anchos[0]=20;
				$this->anchos[1]=30;
				$this->anchos[2]=25;
				$this->anchos[3]=130;
				$this->anchos[4]=30;
				$this->anchos[5]=30;
				$this->anchos[6]=30;
				$this->anchos[7]=30;
				$this->anchos[8]=30;
				$this->anchos[9]=30;
				$this->anchos[10]=30;
				$this->anchos[11]=30;


		}
		function llenartitulosdetalle()
		{
				$this->titulos2[0]="Código Emisor";
				$this->titulos2[1]="Descripción";
				$this->titulos2[2]="Codigo Receptor";
				$this->titulos2[3]="Descripcion";
				$this->titulos2[4]="Monto";
				$this->ancho[0]=60;
				$this->ancho[1]=40;
				$this->ancho[2]=60;
				$this->ancho[3]=75;
				$this->ancho[4]=40;
				$this->ancho[5]=50;
		}

		function Header()
		{
			if($this->reftra1==$this->reftra2)
			{	$titulo=$this->tb->fields["tipo"];
				if(strtoupper($titulo)=='TRASLADO')
					$titulo="TRASPASO";
			}
			else
				$titulo=H::GetPost("titulo");



			/*$this->setFont("Arial","B",6);
			$this->SetWidths(array(30,70,20,20,20,20,20,20,20,20));
			$this->SetAligns(array("R","L","R","R","R","R","R","R","R","R"));
			$this->SetBorder(1);
			$this->Row(array($cuenta,$descripcion,"","","","","","","",""));
			$this->SetBorder(0);
			$this->SetFillTable(0);*/


		//	$this->cab->poner_cabecera2($this,strtoupper($titulo)." (".$this->estado."s)","l","l","","n");
			$this->cab->poner_cabecera2($this,strtoupper($titulo)." (".$this->estado."s)","l","s",$this->arrp[$this->i]["fecha"]);

			$this->setXY(245,52);
			$this->cell(10,4,"Ref. ".$this->arrp[$this->i]["reftra"]);

			$this->ln(4);

			$this->setFont("Arial","B",9);
         //   $this->Rect(10,$this->getY(),260,15);

			$this->setFont("Arial","B",8);
			$this->SetWidths(array(65,65,65,65));
			$this->SetAligns(array("L","L","L","L"));
			//$this->SetBorder(1);
		//	$this->Row(array("Insubsistencia: ".$this->Rect(strlen("Insubsistencia: ")+20,$this->getY()+1,2,2),"Reducción: ".$this->Rect(strlen("Reducción: ")+85,$this->getY()+1,2,2),"Recursos Adicionales: ","Traspaso: "));
			//$this->SetBorder(0);
			$this->SetFillTable(0);
            /*$this->setxy(215,62);
            $this->cell(2,4,"x");*/
			$this->setFont("Arial","B",8);
			$this->SetWidths(array(65,65,65,65));
			$this->SetAligns(array("L","L","L","L"));
			//$this->SetBorder(1);
			//$this->Row(array("","","Crédito Adicional: ".$this->Rect(strlen("Crédito Adicional: ")+150,$this->getY()+1,2,2),"Gastos Corrientes: ".$this->Rect(strlen("Gastos Corrientes: ")+215,$this->getY()+1,2,2,"F")));
			//$this->SetBorder(0);
			$this->SetFillTable(0);
			$this->setFont("Arial","B",8);
			$this->SetWidths(array(65,65,65,65));
			$this->SetAligns(array("L","L","L","L"));
			//$this->SetBorder(1);
		//	$this->Row(array("","","Rectificación: ".$this->Rect(strlen("Rectificación: ")+154,$this->getY()+1,2,2),"Gastos de Capital: ".$this->Rect(strlen("Gastos de Capital: ")+215,$this->getY()+1,2,2)));
			//$this->SetBorder(0);
			$this->SetFillTable(0);
			$this->ln(5);
			$this->setFont("Arial","B",10);
			$this->SetWidths(array(130,130));
			$this->SetAligns(array("C","C"));
			$this->SetBorder(1);
			$this->Row(array("IMPUTACIÓN PRESUPUESTARIA",""));
			$this->SetBorder(0);
			$this->SetFillTable(0);
			$this->setFont("Arial","B",10);
			$this->SetWidths(array(30,20,20,20,20,20,100,30));
			$this->SetAligns(array("C","C","C","C","C","C","C"));
			$this->SetBorder(1);
			$this->sqlniv="SELECT
		    		  CATPAR,
		    		  CONSEC,
		    		  NOMABR,
		    		  NOMEXT,
		    		  LONNIV,
		    		  STANIV
		    		  FROM CPNIVELES ORDER BY CONSEC";

       $tbniv=$this->bd->select($this->sqlniv);
	   $ancho=130/7;
    		     foreach($tbniv as $regniv)
		      {
		        $this->Cell($ancho,5,$regniv["nomabr"],1,0,'C');
		      }
		        $this->Cell(100,5,"DENOMINACIÓN",1,0,'C');
		        $this->Cell(30,5,"BS",1,0,'C');
		        $this->ln();
			//$this->Row(array("PROYECTO O ACCIÓN CENTRALIZADA","ACCIÓN ESP.","PART","GEN","ESP","SUB ESP.","DENOMINACIÓN","BS"));
			$this->SetBorder(0);
			$this->SetFillTable(0);
           //


          //print $this->gety();exit;


				}


        function Footer(){
        	$this->sety(180);
	                $this->setFont("Arial","B",6);
                 	$this->SetWidths(array(130,130));
					$this->SetAligns(array("C","C"));
					$this->SetBorder(1);
					$this->Row(array("DIRECCION DE PLANIFICACION Y PRESUPUESTO","CONTRALOR"));
					$this->setJump(8);
					$this->Row(array("",""));
        }

		function Cuerpo()
		{
$cuenta=count($this->arrp);
//$this->cell(103,5,$cuenta);
		    foreach ($this->arrp as $dato)
            {


                //H::PrintR($dato["referencia"]);
                //print H::PrintR($ref);print $dato["referencia"];


                    $this->arrp1 = $this->pretra2->codori($dato["referencia"]);
                    //CICLO PARA LAS CUENTAS DE ORIGEN
                    $acunori = 0;
					$this->setxy(10,$this->gety());
					$this->setFont("Arial","",8);
                 	$this->SetWidths(array(130,100,30));
					$this->SetAligns(array("C","L","C"));
					$this->SetBorder(1);
					$this->Row(array("","De: ",""));
					$this->SetBorder(0);
					$this->SetFillTable(0);

					foreach($this->arrp1 as $dato1)
					{
			        //division del codigo presupuestario de origen

						$proy1 = substr($dato1["origen"],0,2);
						$accesp1 = substr($dato1["origen"],3,2);
						$part1 = substr($dato1["origen"],6,3);
						$gen1 = substr($dato1["origen"],10,2);
						$esp1 = substr($dato1["origen"],13,2);
						$subesp1 = substr($dato1["origen"],16,2);
						$d=$this->bd->select("SELECT NOMPRE as NOMBRE FROM CPDEFTIT WHERE CODPRE=('".$dato1["origen"]."')");

						if(!$d->EOF)
						{
							$nomori=$d->fields["nombre"];
						}


					    $this->setxy(10,$this->gety());
				        $this->setFont("Arial","",7);
						$this->SetWidths(array(30,20,20,20,20,20,100,30));
						$this->SetAligns(array("C","C","C","C","C","C","L","R"));
						$this->SetBorder(1);
						//$this->Row(array($proy1,$accesp1,$part1,$gen1,$esp1,$subesp1,$nomori,H::FormatoMonto($dato1["monto"])));

					  $this->sqlniv="SELECT
		    		  CATPAR,
		    		  CONSEC,
		    		  NOMABR,
		    		  NOMEXT,
		    		  LONNIV,
		    		  STANIV
		    		  FROM CPNIVELES ORDER BY CONSEC";
                      $tbniv=$this->bd->select($this->sqlniv);
					  $partecodpre=explode("-",trim($dato1["origen"]));
		              $i=0;
		              $ancho=130/7;
				      foreach($tbniv as $regniv)
				      {
				        $this->Cell($ancho,5,$partecodpre[$i],1,0,'C');
				        $i++;
				      }
				        $this->Cell(100,5,"",1,0,'L');
				        $this->Cell(30,5,H::FormatoMonto($dato1["monto"]),1,0,'R');
				        $this->setx(140);
				        $this->multiCell(100,5,$nomori,1,'L');
				          if ($this->gety()>170){
                         $this->addpage();
                           }
				        $this->ln();

						$this->SetBorder(0);
						$this->SetFillTable(0);
						$acunori = $acunori + $dato1["monto"];

					}

  if ($this->gety()>170){
                         $this->addpage();
                           }
					//totales origen
					$this->setxy(10,$this->gety());
					$this->setFont("Arial","B",7);
                 	$this->SetWidths(array(130,100,30));
					$this->SetAligns(array("C","L","R"));
					$this->SetBorder(1);
					$this->Row(array("","Total Cedentes ",H::FormatoMonto($acunori)));
					$this->SetBorder(0);
					$this->SetFillTable(0);

                    $this->setxy(10,$this->gety());
					$this->setFont("Arial","",8);
                 	$this->SetWidths(array(130,100,30));
					$this->SetAligns(array("C","L","C"));
					$this->SetBorder(1);
					$this->Row(array("","Para: ",""));
					$this->SetBorder(0);
					$this->SetFillTable(0);


                    $this->arrp2 = $this->pretra2->coddes($dato["referencia"]);
                    //CICLO PARA LAS CUENTAS DE ORIGEN
                    $acudes = 0;
					foreach($this->arrp2 as $dato2)
					{
			        //division del codigo presupuestario de origen

						$proy2 = substr($dato2["destino"],0,2);
						$accesp2 = substr($dato2["destino"],3,2);
						$part2 = substr($dato2["destino"],6,3);
						$gen2 = substr($dato2["destino"],10,2);
						$esp2 = substr($dato2["destino"],13,2);
						$subesp2 = substr($dato2["destino"],16,2);
   						$s=$this->bd->select("SELECT NOMPRE as NOMBRE FROM CPDEFTIT WHERE CODPRE=('".$dato2["destino"]."')");
						if(!$s->EOF)
						{
							$nomdes=$s->fields["nombre"];
						}


						//imprimimos la partida de destino
						$this->setxy(10,($this->gety()));
	                    $this->setFont("Arial","",7);
						$this->SetWidths(array(30,20,20,20,20,20,100,30));
						$this->SetAligns(array("C","C","C","C","C","C","L","R"));
						$this->SetBorder(1);
						//$this->Row(array($proy2,$accesp2,$part2,$gen2,$esp2,$subesp2,$nomdes,H::FormatoMonto($dato2["monto"])));

						/////////////////////////////////////////
						  $partecodpre=explode("-",trim($dato2["destino"]));
		              $i=0;
		              $ancho=130/7;
				      foreach($tbniv as $regniv)
				      {
				        $this->Cell($ancho,5,$partecodpre[$i],1,0,'C');
				        $i++;
				      }

				        $this->Cell(100,5,"",1,0,'L');
				        $this->Cell(30,5,H::FormatoMonto($dato2["monto"]),1,0,'R');
				        $this->setx(140);
				        $this->multiCell(100,5,$nomdes,1,'L');
				        if ($this->gety()>170){
                         $this->addpage();
                           }
				        $this->ln();

						$this->SetBorder(0);
						$this->SetFillTable(0);
						$acunori = $acunori + $dato1["monto"];



						///////////////////////////////////////////


						$this->SetBorder(0);
						$this->SetFillTable(0);
	        			$acundes = $acundes + $dato2["monto"];

					}

					//totales destino
					$this->setxy(10,$this->gety());
					$this->setFont("Arial","B",7);
                 	$this->SetWidths(array(130,100,30));
					$this->SetAligns(array("C","L","R"));
					$this->SetBorder(1);
					$this->Row(array("","Total Receptoras ",H::FormatoMonto($acundes)));

					if($acunori==$acundes){
						$acundes=$acundes;
					}else $acundes=$acunori-$acundes;
					$this->Row(array("","TOTAL ",H::FormatoMonto($acundes)));

					$acundes=0;// no lo estaba inicializando
					$this->SetBorder(0);
					$this->SetFillTable(0);
                   //TOTAL GENERAL
                    $this->setxy(10,$this->gety());
					$this->setFont("Arial","B",6);
                 	$this->SetWidths(array(130,100,30));
					$this->SetAligns(array("C","L","R"));
					$this->SetBorder(1);

					$this->SetBorder(0);
					$this->SetFillTable(0);

					//FIRMAS
					$this->ln();


					$this->SetBorder(0);
					$this->SetFillTable(0);
                    $this->i++;
                    if ($cuenta!=$this->i){
                     $this->addpage();
                    }


            }

		}
	}
?>