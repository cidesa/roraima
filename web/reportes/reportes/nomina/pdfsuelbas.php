<?php

require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Cabecera.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/general/Herramientas.class.php");
require_once("../../lib/modelo/sqls/nomina/Nprsuelbas.class.php");

class pdfreporte extends fpdf
{

	function pdfreporte()
	{
	  parent::FPDF("L","mm","legal");
	  //$this->cabe='s';
	  $this->cab = new Cabecera();
      $this->index=0;
      $this->codempdes= H::GetPost('codempdes');
      $this->codemphas= H::GetPost('codemphas');
      $this->codcardes= H::GetPost('codcardes');
      $this->codcarhas= H::GetPost('codcarhas');
      $this->codnomdes= H::GetPost('codnomdes');
      $this->codnomhas= $this->codnomdes;//H::GetPost('codnomhas');
	  $this->especial= H::GetPost('especial');
	  $this->elaborado= H::GetPost('elaborado');
	  $this->revisado= H::GetPost('revisado');
	  $this->autorizado= H::GetPost('autorizado');
	  $this->observ= H::GetPost('observ');

//	  $this->consecutivo=strtoupper(H::GetPost('consedes'));

      $this->objPrenomina = new Prenomina();
      $this->arrp = $this->objPrenomina->SQLp($this->especial,$this->codnomdes,$this->codnomhas,$this->codempdes,$this->codemphas,$this->codcardes,$this->codcarhas);
      $this->llenartitulosmaestro();

	 // $this->SetAutoPageBreak(true,32);
	}

	 function llenartitulosmaestro()
	 {

    	 $this->setFont("Arial","B",7);
		 $this->titulos[0]="CI";
		 $this->titulos[1]="NOMBRE DE EMPLEADO";
		 $this->titulos[2]="DESCRIPCIÓN CARGO";
		 $this->titulos[3]="FECHA\nINGRESO";
		 $this->anchos[0]=15;
		 $this->anchos[1]=40;
	     $this->anchos[2]=40;
		 $this->anchos[3]=15;
		 $this->alinea[0]="C";
		 $this->alinea[1]="C";
	     $this->alinea[2]="C";
		 $this->alinea[3]="C";

		 $this->asig = $this->objPrenomina->sql_asig($this->codnomhas);
	     $asig=array();
	//	 print "<pre>";
		 $asig=$this->asig;
		 $ncampos = count($asig);
		 //print $ncampos;exit;
		 for($i=0;$i<=$ncampos-1;$i++)
		 {
		 	$this->titulos[$i+4]=$asig[$i]['nomcon'];
		  	$this->anchos[$i+4]=14;
            $this->alinea[$i+4]="C";
	     }


     /*
     //print "<pre>";
	 //print_r($this->columna);exit;


//	 $this->titulos[$ncampos+7]="";

*/

	  }

	function Header()
	{
		 $this->cab->poner_cabecera($this,H::GetPost("titulo"),"p","S","");
	     $this->ln(10);
		 $this->setFont("Arial","B",7);
		 $ncampos=count($this->titulos);
	     $this->setXY(2,$this->getY());
	     $this->setwidths($this->anchos);
	     $this->setAligns($this->alinea);
	     $this->SetBorder(1);
	     $this->rowm($this->titulos);
	     $this->SetBorder(0);
		$this->SetFillTable(0);

		 $this->setx(2);
		 /*$this->setwidths($this->anchos);
		 $this->setAligns(array("C","L","C","C","R","R","R","R","R","R","R","R","R","R","R","R","R","R","R"));*/


	}


		function Cuerpo()
		{
        	$this->setFont("Arial","",7);
        	$reg = 0;
        	$registro = count($this->arrp);
            $arrdetalle = array ();
            $arrancho = array();
            $arralinea = array();
        	foreach($this->arrp as $dato)
        	{
        		$cedula = $dato["codemp"];
        		$nombre = $dato["nomemp"];
        		$cargo =  $dato["nomcar"];
        		$fecingreso = $dato["fecing"];
        		$arrdetalle[0] = $cedula;
        		$arrdetalle[1] = $nombre;
        		$arrdetalle[2] = $cargo;
        		$arrdetalle[3] = $fecingreso;
                $arrancho[0] = 15;
				$arrancho[1] = 40;
				$arrancho[2] = 40;
				$arrancho[3] = 15;
				$arralinea[0]= "L";
				$arralinea[1]= "L";
				$arralinea[2]= "L";
				$arralinea[3]= "L";


        		$this->asigna = $this->objPrenomina->sql_datos($cedula,$this->codnomdes,$this->especial,$this->codnomhas);
        		$i = 0;
        		foreach ($this->asigna as $asig)
        		{
        			$arrdetalle[$i+4] = H::FormatoMonto($asig["monto"]);
        			$arrancho[$i+4] = 14;
        			$arralinea[$i+4]= "R";
        			$i++;
        		}
        		$this->setx(2);
        		$this->setwidths($arrancho);
	     	    $this->setAligns($arralinea);
				$this->SetBorder(1);
				$this->Row($arrdetalle);
				$this->SetBorder(0);
				$this->SetFillTable(0);

                if (($this->gety())> 170 )
                {
                	$this->addpage();
                }

        	}

		}

	}
?>