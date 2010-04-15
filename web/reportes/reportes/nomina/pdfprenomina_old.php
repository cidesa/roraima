<?php

require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Cabecera.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/general/Herramientas.class.php");
require_once("../../lib/modelo/sqls/nomina/Prenomina.class.php");

class pdfreporte extends fpdf
{

	function pdfreporte()
	{
	  parent::FPDF("L","mm","legal");
	  $this->cabe='s';
      $this->index=0;
      $this->codempdes= H::GetPost('codempdes');
      $this->codemphas= H::GetPost('codemphas');
      $this->codcardes= H::GetPost('codcardes');
      $this->codcarhas= H::GetPost('codcarhas');
      $this->codnomdes= H::GetPost('codnomdes');
      $this->codnomhas= H::GetPost('codnomhas');
	  $this->especial= H::GetPost('especial');

	  $this->consecutivo=strtoupper(H::GetPost('consedes'));

      $this->objPrenomina = new Prenomina();
      $this->arrp = $this->objPrenomina->SQLp($this->especial,$this->codnomdes,$this->codnomhas,$this->codempdes,$this->codemphas,$this->codcardes,$this->codcarhas);


     //print "hola";exit;
	// print_r($this->arrp);exit;

	  $this->SetAutoPageBreak(true,32);
	}

	 function llenartitulosmaestro()
	  {

     $this->setFont("Arial","B",7);
	 $this->titulos[0]="CI";
	 $this->titulos[1]="NOMBRE DE EMPLEADOS";
	 $this->titulos[2]="COD";
	 $this->titulos[3]="DESCRIPCIÓN CARGO";
     $this->asig = $this->objPrenomina->sql_asig($this->especial,$this->codnomhas);
	 $asig=array();
//	 print "<pre>";
	 $asig=$this->asig;
	 $ncampos = count($asig);
	 for($i=0;$i<=$ncampos;$i++)
	 {
	  $this->titulos[$i+4]=$asig[$i]['nomcon'];
      $this->columna[$i]=$asig[$i]['codcon'];
     }
     //print "<pre>";
	 //print_r($this->columna);exit;
	 $this->titulos[$ncampos+4]="SUELDO QUINCENAL";
	 $this->titulos[$ncampos+5]="TOTAL DESCUENTO X TRABAJADOR";
	 $this->titulos[$ncampos+6]="TOTAL SUELDO QUINCENAL CON DTOS.";
//	 $this->titulos[$ncampos+7]="";

	 $this->anchos[0]=10;
	 $this->anchos[1]=47;
     $this->anchos[2]=8;
	 $this->anchos[3]=70;

	  }
	function Header()
	{
	 $dir = parse_url($_SERVER["HTTP_REFERER"]);
	 $parte = explode("/",$dir["path"]);
	 $ubica = count($parte)-2;
	 $this->getCabecera(H::GetPost("titulo"),"","l","l");
	 $this->setFont("Arial","B",7);
	 $this->llenartitulosmaestro();
	 $ncampos=count($this->titulos);

	 for($i=0;$i<$ncampos;$i++)
	 {if ($i>3)
	 	{$y=($i*24)+15;
	 	 $this->setXY($y,38);
	 	 $this->Multicell(25,3,$this->titulos[$i],0,'C');
	 	}else
	 	{
	 	 $this->cell($this->anchos[$i],5,$this->titulos[$i]);
	 	}

     }
	 $this->ln(2);
	 $this->Line(10,53,325,53);
	 //$this->ln(5);

	}


		function Cuerpo()
		{
         $this->setFont("Arial","",7);
			$ced=0;
			$codcon=0;
			$codnom=0;
			$i=0;
			//$j=0;
			$ncampos=count( $this->columna);
			foreach($this->arrp as $datos)
			{  $j=0;
				while ($j<= $ncampos)
				{//print "hola";exit;
					$arreglo[$i][$j]=$this->objPrenomina->sql_datos($this->especial,$datos['codemp'], $this->columna[$j],$this->codnomhas);
				$j++;
				}
			   $i++;
			}

			$i=0;
			foreach($this->arrp as $datos)
			{	$this->setX(5);
				$this->Cell(12,11,$datos['cedemp'],0,0,'L');
				$this->Cell(50,11,substr($datos['nomemp'],0,30),0,0,'L');
				$this->Cell(8,11,$datos['codemp'],0,0,'L');
				$this->Cell(40,11,substr($datos['nomcar'],0,29),0,0,'L');
				$j=0;
				$suma=0;
				while ($j<= $ncampos-2)
				{
					if ($j==0)
					{
						$y=20;
					}else{$y=24;}
					$this->Cell($y,11,H::FormatoMonto($arreglo[$i][$j][0]['saldo']),0,0,'R');
					$suma=$suma+$arreglo[$i][$j][0]['saldo'];
					//$total[$j]=$total[$j]+$arreglo[$j][$i][0]['saldo'];
				$j++;
				}
				$this->Cell(24,11,H::FormatoMonto($suma),0,0,'R');
				$descuento[$i]=$this->objPrenomina->sql_dtos($this->especial,$datos['codemp'],$this->codnomhas);
				$this->Cell(24,11,H::FormatoMonto($descuento[$i][0][0]),0,0,'R');
				$this->Cell(24,11,H::FormatoMonto($suma-$descuento[$i][0][0]),0,0,'R');

			 	$this->ln(4);
			$i++;
			}
/*	 		$ncampos=count($this->titulos);

			 for($i=0;$i<$ncampos;$i++)
			 {if ($i>3)
			 	{$y=($i*24)+15;
			 	 $this->setXY($y,38);
			 	 $this->Multicell(25,3,$this->titulos[$i],0,'C');
			 	}else
			 	{
			 	 $this->cell($this->anchos[$i],5,$this->titulos[$i]);
			 	}

     }*/

//				$this->Cell(24,11,H::FormatoMonto($descuento[$i][0][0]),0,0,'R');

				//sql_total($especial,$cod,$codnom);
//				print "<pre>";
//				print_r($this->total);exit;

		}



	}
?>