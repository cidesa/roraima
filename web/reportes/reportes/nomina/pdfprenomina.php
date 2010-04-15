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
	  //$this->cabe='s';
      $this->index=0;
      $this->codempdes= H::GetPost('codempdes');
      $this->codemphas= H::GetPost('codemphas');
      $this->codcardes= H::GetPost('codcardes');
      $this->codcarhas= H::GetPost('codcarhas');
      $this->codnomdes= H::GetPost('codnomdes');
      $this->codnomhas= H::GetPost('codnomhas');
	  $this->especial= H::GetPost('especial');
	  $this->elaborado= H::GetPost('elaborado');
	  $this->revisado= H::GetPost('revisado');

//	  $this->consecutivo=strtoupper(H::GetPost('consedes'));

      $this->objPrenomina = new Prenomina();
      $this->arrp = $this->objPrenomina->SQLp($this->especial,$this->codnomdes,$this->codnomhas,$this->codempdes,$this->codemphas,$this->codcardes,$this->codcarhas);

	 // $this->SetAutoPageBreak(true,32);
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

  public function getCabecera($titulo='',$departamento='')
  {
      $pdf = $this;
      $this->confcabecera = $this->getConfigCabecera();
      $this->conf = $this->getConfig();
      $ori = strtolower($pdf->getOrientation());
      $conf = $this->conf;
      $c = $this->confcabecera;
      $r = $this->conf;
//print $ori;exit;
       	if($ori='p')
      	{
	        $xtitulo = 330;
	        $xlinea = 330;
	        $xdetalles= 100;
	        $xpagina = 600;
      	}
      else
	      {
            $ori='p';
	        $xtitulo = 265;
	        $xlinea = 265;
	        $xdetalles= 180;
	        $xpagina = 480;
	      }

    $bd = new basedatosAdo();
    $tb3=$bd->select("select * from empresa where codemp='001'");
    if(!$tb3->EOF)
    {
      $nombre=trim($tb3->fields["nomemp"]);
      $direccion=$tb3->fields["diremp"];
      $telef=$tb3->fields["tlfemp"];
      $fax=$tb3->fields["faxemp"];
    }

    $pdf->setFont("Arial","B",8);
    //Logo de la Empresa
    $pdf->Image($c['logo']['img'],10,8,33);

    //fecha actual
    $fecha=date("d/m/Y");

    if($c['fecha']){
      $pdf->Cell($xpagina,10,'Fecha: '.$fecha,0,0,'C');
    }else{$pdf->Cell($xpagina,10,'',0,0,'C');}
    $pdf->ln(5);

    //Paginas
    if($c['nropagina'])
    {
      $pdf->Cell($xpagina,10,'Pagina '.$pdf->PageNo().' de {nb}',0,0,'C');
    }else{$pdf->Cell($xpagina,10,'',0,0,'C');}

    //Titulo Descripcion de la Empresa
    $pdf->Ln(-5);
    $tab = 50;

    $pdf->setX($c['empresa']['x'][$ori]);
    if($c['empresa']['y'][$ori]!='0') $pdf->setY($c['empresa']['y'][$ori]);
    $pdf->setFont($c['empresa']['fuente'],"B",11);
    $pdf->Cell($xdetalles,5,'República Bolivariana de Venezuela',0,0,$c['empresa']['pos']);

    // Detalles de la empresa
    $pdf->setFont($c['detemp']['fuente'],"B",$c['detemp']['tam']);
    $pdf->Ln(3);
    $pdf->setX($c['detemp']['x'][$ori]);
    if($c['detemp']['y'][$ori]!='0') $pdf->setY($c['detemp']['y'][$ori]);
    $pdf->Cell($xdetalles,5,'Ministerio del Poder Popular Para la Finanzas',0,0,$c['depemp']['pos']);
    $pdf->Ln(3);
    $pdf->setX($c['detemp']['x'][$ori]);
    $pdf->Cell($xdetalles,5,$nombre,0,0,$c['depemp']['pos']);
    $pdf->Ln(3);
    $pdf->setX($c['detemp']['x'][$ori]);
    $pdf->Cell($xdetalles,5,'',0,0,$c['depemp']['pos']);
    $pdf->Ln(8);

    //Departamento
    $pdf->setFont($c['departamento']['fuente'],"B",$c['departamento']['tam']);
    $pdf->setX($c['departamento']['x'][$ori]);
    if($c['departamento']['y'][$ori]!='0') $pdf->setY($c['departamento']['y'][$ori]);
    $pdf->Cell($xtitulo,10,$departamento,0,0,$c['departamento']['pos'],0);

    //Titulo del Reporte
    $pdf->setFont($c['titulo']['fuente'],"B",$c['titulo']['tam']);
    $pdf->setX($c['titulo']['x'][$ori]);
    if($c['titulo']['y'][$ori]!='0') $pdf->setY($c['titulo']['y'][$ori]);
    $pdf->Cell($xtitulo,10,$titulo,0,0,$c['titulo']['pos'],0);
    $pdf->ln(10);
    $pdf->Line(10,35,$xlinea,35);

    $pdf->setFont($r['fuente'],"",$conf['tamletra']);
  }


	function Header()
	{
	 $dir = parse_url($_SERVER["HTTP_REFERER"]);
	 $parte = explode("/",$dir["path"]);
	 $ubica = count($parte)-2;
	 $bd = new basedatosAdo();
     $sql="select nomnom from npnomina a where a.codnom='".$this->codnomhas."'";
     $nomnom=$bd->select($sql);
 	 $this->getCabecera(H::GetPost("titulo"),"".$nomnom->fields["nomnom"]."","l","l");
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
	 $this->Line(10,53,330,53);
	 $this->ln(3);

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
				{

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
				$this->Cell(40,11,substr($datos['nomcar'],0,26),0,0,'L');
				$j=0;
				$suma=0;
				while ($j<= $ncampos-2)
				{
					if ($j==0)
					{
						$y=20;
					}else{$y=24;}
					$this->Cell($y,11,H::FormatoMonto($arreglo[$i][$j][0]['saldo']),0,0,'R');
					$suma=$suma+$arreglo[$i][$j][0]['saldo'];//$arreglo[$i][$j]=$this->objPrenomina->sql_datos($datos['cedemp'], $this->columna[$i],$datos['codnom']);
				$j++;
				}
				$sueldoQ=$sueldoQ+$suma;
				$this->Cell(24,11,H::FormatoMonto($suma),0,0,'R');
				$descuento[$i]=$this->objPrenomina->sql_dtos($this->especial,$datos['codemp'],$this->codnomhas);
				$this->Cell(24,11,H::FormatoMonto($descuento[$i][0][0]),0,0,'R');
				$this->Cell(24,11,H::FormatoMonto($suma-$descuento[$i][0][0]),0,0,'R');
				$totalG=$totalG+($suma-$descuento[$i][0][0]);
				$descueG=$descueG+$descuento[$i][0][0];

			$this->ln(4);
			$i++;

			}
			$conceptos=count($this->columna);

			 for($i=0;$i<$conceptos;$i++)
			   {
			    $this->total[$i]=$this->objPrenomina->sql_total($this->especial,$this->columna[$i],$this->codnomhas);
			   }
               	$this->total[$i-1][0][0]=$sueldoQ;
			    $this->total[$i][0][0]=$descueG;
				$this->total[$i+1][0][0]=$totalG;
				//print "<pre>";
				//print_r($this->total);exit;
				 $this->setFont("Arial","B",8);

				 $cant=count($this->total);

				 $this->ln(6);
				 $this->setFont("Arial","B",10);
				 $this->setX(30);
				 $this->Cell(15,11,'TOTALES GENERALES',0,0,'L');
				 $this->SetFillColor(170,170,170);
				 $this->Rect(115,$this->GetY()+2,(24*($cant-1))+20,8,"F");
				 $this->setX(115);
				 $this->setFont("Arial","B",9);

				 for($i=0;$i<$cant;$i++)
				 {if ($i==0)
					{
						$y=20;
					}else{$y=24;}
					$this->Cell($y,11,H::FormatoMonto($this->total[$i][0][0]),0,0,'R');
					//$suma=$suma+$arreglo[$i][$j][0]['saldo'];
			     }$this->ln(8);
			      $this->line(70,180,120,180);
			      $this->line(220,180,270,180);
			      $this->setXY(73,180);
			      $this->cell(50,4,'Cordinadora de Recursos Humanos',0,0,'C');
			      $this->setXY(218,180);
			      $this->cell(50,4,'Gerente de Administración de Operaciones',0,0,'C');
			      $this->setXY(73,183);
			      $this->cell(50,4,$this->elaborado,0,0,'C');
			      $this->setXY(218,183);
			      $this->cell(50,4,$this->revisado,0,0,'C');

		}

	}
?>