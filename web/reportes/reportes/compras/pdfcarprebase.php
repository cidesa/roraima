<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/compras/Carprebase.class.php");

	class pdfreporte extends fpdf
	{

		var $i=0;
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codreqdes;
		var $codreqhas;
		var $analizado;
		var $evaluado;
		var $autorizado;
		var $conf;
		var $tb2;
		var $footer=false;
		var $mes=array(
				"01"=>"ENERO",
				"02"=>"FEBRERO",
				"03"=>"MARZO",
				"04"=>"ABRIL",
				"05"=>"MAYO",
				"06"=>"JUNIO",
				"07"=>"JULIO",
				"08"=>"AGOSTO",
				"09"=>"SEPTIEMBRE",
				"10"=>"OCTUBRE",
				"11"=>"NOVIEMBRE",
				"12"=>"DICIEMBRE"
				);

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->codreqdes=str_replace('*',' ',H::GetPost("codreqdes"));
			$this->codreqhas=str_replace('*',' ',H::GetPost("codreqhas"));
			$this->director=str_replace('*',' ',H::GetPost("director"));
			$this->representante=str_replace('*',' ',H::GetPost("representante"));
			$this->bd = new Carprebase();
			$this->Carprebase = new Carprebase();
			$this->arrp = $this->bd->sqlp($this->codreqdes,$this->codreqhas);

			$this->SetAutoPageBreak(true,10);
			$this->llenartitulosmaestro();
			$this->llenaranchos();
$this->cab=new cabecera();
			$this->Carprebase = new Carprebase();
			//$this->arrp = $this->Carprebase->sqlp($this->codreqdes, $this->codreqhas, $this->codcatdes, $this->codcathas, $this->codesde, $this->codhasta, $this->fechadesde, $this->fechahasta, $sta1, $sta2);

		}

		function llenartitulosmaestro()
		{
				$this->titulosm[0]='BIENES MUEBLES';
				$this->titulosm[1]='MATERIALES Y SUMINISTROS';
				$this->titulosm[2]='TIPO DE REQUISICION';
				$this->titulosm[3]='FECHA ESTIMADA';
				$this->titulosm[4]='SOLICITUD';
				$this->titulosm[5]='ANULACION';
				$this->titulosm[6]='Nro. Original';
				$this->titulosm[7]='LUGAR DE ENTREGA';
				$this->titulosm[8]='CONTRALORIA MUNICIPAL DE CHACAO';

				$this->titulosm[9]='RENGLON';
				$this->titulosm[10]='AÑO';
				$this->titulosm[11]='FON';
				$this->titulosm[12]='SEC';
				$this->titulosm[13]='PRO';
				$this->titulosm[14]='ACT';
				$this->titulosm[15]='PAR';
				$this->titulosm[16]='GEN';
				$this->titulosm[17]='ESP';
				$this->titulosm[18]='SUB';
				$this->titulosm[19]='CODIGO';
				$this->titulosm[20]='DESCRIPCION';
				$this->titulosm[21]='UNI.MED';
				$this->titulosm[22]='CANTIDAD';
				$this->titulosm[23]='PREC. UNIT';
				$this->titulosm[24]='TOTAL';

				$this->titulosm[25]='OBSERVACIONES';
				$this->titulosm[26]='SUBTOTAL';
				$this->titulosm[27]='IVA';
				$this->titulosm[28]='TOTAL';

				$this->titulosm[29]='OBSERVACIONES';
				$this->titulosm[30]='RECIBIDO EN COMPRAS';
				$this->titulosm[31]='OFICINA DE PLANIFICACION Y PRESUPUESTO';
				$this->titulosm[32]='GERENCIA DE LOGISTICA';
				$this->titulosm[33]='DIRECCION DE ADMINISTRACION Y FINANZAS';
				$this->titulosm[34]='CONTRALOR MUNICIPAL';
				$this->titulosm[35]='FIRMA Y SELLO';

				$this->titulosm[100]='Centro Comercial Plaza, Nivel Francisco de Miranda, Torre C, Piso 20, Municipio Chacao, Estado Miranda. Tlf 285.19.66/285.32.10 Fax 285.32.60';


		}


	    function llenaranchos()
	     {
		    $this->anchos=array();
			$this->anchos[0]=195;
			$this->anchos[1]=150;
			$this->anchos[2]=100;
			$this->anchos[3]=95;
			$this->anchos[4]=90;
			$this->anchos[5]=80;
			$this->anchos[6]=52;
			$this->anchos[7]=50;
			$this->anchos[8]=35;
			$this->anchos[9]=30;
			$this->anchos[10]=20;
			$this->anchos[11]=10;
	     }


		function Header()
		{
			$this->cab->poner_cabecera_f2($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",9);

			/*$this->SetWidths(array($this->anchos[0]));
    	    $this->SetAligns(array("L"));
    	    $this->setBorder(1);
    	    $this->RowM(array($this->titulosm[1]));

			$this->SetWidths(array(20,25,35,115));
			$this->SetBorder(true);
			$this->SetAligns(array('C','C','C','C'));
			$this->Row(array('Cantidad','Unidad','Codigo Articulos','Descripcion'));
			$this->SetAligns(array('C','L','L','L'));*/
		}

		function Cuerpo()
		{
                     $contador=1;
			$tot_mon=0;
			$tot_moniva=0;
			$eof=count($this->arrp);
			$listcodpre=array();
			$detalles=array();
			$ref=$this->arrp[$this->i]["reqart"];
			$this->arrp2 =$this->bd->sql_codpre($reqart);
		    $reqart='';
		    $tot_mon=0;
		    $precio=0;
		    $tot_moniva=0;
			foreach ($this->arrp as $dato)
			{
				if ($reqart!=$dato["reqart"])
				{
                     if ($reqart)
					 {
						     $this->SetX(230);    $y=$this->gety();
							 $this->SetWidths(array($this->anchos[10],$this->anchos[10]));
				        	 $this->SetAligns(array("C","R"));
				             $this->setBorder(1);
				             $this->RowM(array($this->titulosm[26],H::FormatoMonto($tot_mon)));
				             $this->SetX(230);
				             $this->SetWidths(array($this->anchos[10],$this->anchos[10]));
				        	 $this->SetAligns(array("C","R"));
					         $this->setBorder(1);
				             $this->RowM(array($this->titulosm[27],H::FormatoMonto($tot_moniva)));
				             $this->SetX(230);
				             $this->SetWidths(array($this->anchos[10],$this->anchos[10]));
				        	 $this->SetAligns(array("C","R"));
				             $this->setBorder(1);
				             $this->RowM(array($this->titulosm[28],H::FormatoMonto($tot_mon+$tot_moniva)));
				             $this->SetXY(10,$y+1);
						     $this->multiCell(220,3,$this->titulosm[25].': '.$this->obs,0,'L',0);
						     $this->SetXY(10,$y);
						     $this->multiCell(220,12,"",1,'L',0);
						     $this->SetXY(10,185);
			                 $this->Cell(220,4,"Forma 032");
						     $this->setFont("Arial","",7);
							 $this->SetXY(10,$y+12);
							 $this->Cell(220,4,"Precio estimado para la elaboración del presupuesto base");
							 $this->setFont("Arial","",9);
					         $this->SetY(168);
							 $this->SetWidths(array(86,88,86));
					    	 $this->SetAligns(array("C","C","C"));
					         $this->setBorder(1);
					         $this->RowM(array($this->titulosm[30],$this->titulosm[31],$this->titulosm[33]));
					         $this->SetX(10);
							 $this->Cell(260,12,"",1,0,'L');
							$tot_mon=0;
							$tot_moniva=0;
							$this->AddPage();
						    $contador=1;
				  	 }
					 $this->SetX(180);
					 $this->SetWidths(array($this->anchos[10],$this->anchos[10]));
		        	 $this->SetAligns(array("C","C"));
		             $this->setBorder(1);
		             $this->RowM(array("Nº","FECHA"));
		             $this->Ln(2);
		             $this->SetX(180);
		             $this->SetWidths(array($this->anchos[10],$this->anchos[10]));
		        	 $this->SetAligns(array("C","C"));
		             $this->setBorder(1);
		             $this->RowM(array($dato["reqart"],$dato["fecreq"]));
		             $this->ln();
		             $this->SetWidths(array($this->anchos[2]+10,$this->anchos[1]));
		        	 $this->SetAligns(array("C","C"));
		             $this->setBorder(1);
		             $this->RowM(array("IMPUTACION PRESUPUESTARIA","ESPECIFICACIONES"));
		             $this->Ln(2);
		             $this->SetWidths(array($this->anchos[10],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[10],$this->anchos[7],$this->anchos[10],$this->anchos[10],$this->anchos[10],$this->anchos[10]));
		        	 $this->SetAligns(array("C","C","C","C","C","C","C","C","C","C","C","C","C","C","C","C"));
		             $this->setBorder(1);
		             $this->RowM(array($this->titulosm[9],$this->titulosm[10],$this->titulosm[11],$this->titulosm[12],$this->titulosm[13],$this->titulosm[14],$this->titulosm[15],$this->titulosm[16],$this->titulosm[17],$this->titulosm[18],$this->titulosm[19],$this->titulosm[20],$this->titulosm[21],$this->titulosm[22],$this->titulosm[23],$this->titulosm[24]));
		             $this->Ln(1);
					}
			 $this->setFont("Arial","",9);
	         $codigo=array();
             $codigo1=array();
             $codigo=split( "-", $dato["codcat"],3 );
             $codigo1=split( "-", $dato["codpar"],4 );
             $precio=$dato["canreq"]*$dato["costo"];
             $this->SetWidths(array($this->anchos[10],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[10],$this->anchos[7],$this->anchos[10],$this->anchos[10],$this->anchos[10],$this->anchos[10]));
             $this->SetAligns(array("C","C","C","C","C","C","C","C","C","C","L","L","C","C","R","R"));
             $this->setBorder(1);
             $this->RowM(array($contador,$dato["ano"],'00',(string)$codigo[0],(string)$codigo[1],(string)$codigo[2],(string)$codigo1[0],(string)$codigo1[1],(string)$codigo1[2],(string)$codigo1[3],$dato["codart"],$dato["desart"],$dato["unimed"],$dato["canreq"],H::FormatoMonto($dato["costo"]),H::FormatoMonto($dato["canreq"]*$dato["costo"])));
             $contador++;
             $tot_mon+=$dato["canreq"]*$dato["costo"];
		     $tot_moniva+=$dato["monrgo"];
			 $reqart=$dato["reqart"];
		     $this->setFont("Arial","",9);

            if ($this->gety()>145){
			         $this->SetX(230);    $y=$this->gety();
					 $this->SetWidths(array($this->anchos[10],$this->anchos[10]));
		        	 $this->SetAligns(array("C","R"));
		             $this->setBorder(1);
		             $this->RowM(array("Sub-Tot/Pag",H::FormatoMonto($tot_mon)));
		             $this->SetX(230);
		             $this->SetWidths(array($this->anchos[10],$this->anchos[10]));
		        	 $this->SetAligns(array("C","R"));
			         $this->setBorder(1);
		             $this->RowM(array($this->titulosm[27],H::FormatoMonto($tot_moniva)));
		             $this->SetX(230);
		             $this->SetWidths(array($this->anchos[10],$this->anchos[10]));
		        	 $this->SetAligns(array("C","R"));
		             $this->setBorder(1);
		             $this->RowM(array($this->titulosm[28],H::FormatoMonto($tot_mon+$tot_moniva)));
		             $this->SetXY(10,$y+1);
				     $this->multiCell(220,3,$this->titulosm[25].': '.$this->obs,0,'L',0);
				     $this->SetXY(10,$y);
				     $this->multiCell(220,12,"",1,'L',0);
					 $this->obs='';
					 $this->SetY(168);
					 $this->SetWidths(array(86,88,86));
		        	 $this->SetAligns(array("C","C","C"));
		             $this->setBorder(1);
		             $this->RowM(array($this->titulosm[30],$this->titulosm[31],$this->titulosm[33]));
		             $this->SetX(10);
		             $this->setFont("Arial","",7);
					 $this->Cell(260,12,"",1,0,'L');
				     $this->SetXY(10,185);
			         $this->Cell(220,4,"Forma 032");
			 		 $this->SetXY(10,$y+12);
					 $this->Cell(220,4,"Precio estimado para la elaboración del presupuesto base");

					 $this->setFont("Arial","",9);
                     $this->addpage();//agrego la pagina
                     $this->SetX(180);
					 $this->SetWidths(array($this->anchos[10],$this->anchos[10]));
    	        	 $this->SetAligns(array("C","C"));
    	             $this->setBorder(1);
    	             $this->RowM(array("Nº","FECHA"));
    	             $this->Ln(2);
    	             $this->SetX(180);
    	             $this->SetWidths(array($this->anchos[10],$this->anchos[10]));
    	        	 $this->SetAligns(array("C","C"));
    	             $this->setBorder(1);
    	             $this->RowM(array($dato["reqart"],$dato["fecreq"]));
    	             $this->Ln();
    	             $this->SetWidths(array($this->anchos[2]+10,$this->anchos[1]));
    	        	 $this->SetAligns(array("C","C"));
    	             $this->setBorder(1);
    	             $this->RowM(array("IMPUTACION PRESUPUESTARIA","ESPECIFICACIONES"));
    	             $this->Ln(2);
    	             $this->SetWidths(array($this->anchos[10],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[11],$this->anchos[10],$this->anchos[7],$this->anchos[10],$this->anchos[10],$this->anchos[10],$this->anchos[10]));
    	        	 $this->SetAligns(array("C","C","C","C","C","C","C","C","C","C","C","C","C","C","C","C"));
    	             $this->setBorder(1);
    	             $this->RowM(array($this->titulosm[9],$this->titulosm[10],$this->titulosm[11],$this->titulosm[12],$this->titulosm[13],$this->titulosm[14],$this->titulosm[15],$this->titulosm[16],$this->titulosm[17],$this->titulosm[18],$this->titulosm[19],$this->titulosm[20],$this->titulosm[21],$this->titulosm[22],$this->titulosm[23],$this->titulosm[24]));
    	             $this->Ln(1);
              }//si es mayor a 145
            $this->obs=$dato["obsreq"];
			$this->bdm=new basedatosAdo();
			$this->sql= "select distinct codpre from cadisrgo where reqart='".$this->arrp[$this->i]["reqart"]."' ";
			$tb1=$this->bdm->select($this->sql);
			}
	       //  $this->SetXY(195,159);
		    // $this->cell(30,4,$tb1->fields["codpre"],0,0,'L');//aqui
         //    $this->SetY(155);
             $this->SetX(230);    $y=$this->gety();
			 $this->SetWidths(array($this->anchos[10],$this->anchos[10]));
        	 $this->SetAligns(array("C","R"));
             $this->setBorder(1);
             $this->RowM(array($this->titulosm[26],H::FormatoMonto($tot_mon)));
             $this->SetX(230);
             $this->SetWidths(array($this->anchos[10],$this->anchos[10]));
        	 $this->SetAligns(array("C","R"));
	         $this->setBorder(1);
             $this->RowM(array($this->titulosm[27],H::FormatoMonto($tot_moniva)));
             $this->SetX(230);
             $this->SetWidths(array($this->anchos[10],$this->anchos[10]));
        	 $this->SetAligns(array("C","R"));
             $this->setBorder(1);
             $this->RowM(array($this->titulosm[28],H::FormatoMonto($tot_mon+$tot_moniva)));
             $this->SetXY(10,$y+1);
		     $this->multiCell(220,3,$this->titulosm[25].': '.$this->obs,0,'L',0);
		     $this->SetXY(10,$y);
		     $this->multiCell(220,12,"",1,'L',0);
			 $this->obs='';
			 $this->SetY(168);
			 $this->SetWidths(array(86,88,86));
        	 $this->SetAligns(array("C","C","C"));
             $this->setBorder(1);
             $this->RowM(array($this->titulosm[30],$this->titulosm[31],$this->titulosm[33]));
             $this->SetX(10);
                $this->setFont("Arial","",7);
			 $this->Cell(260,12,"",1,0,'L');
			 $this->SetXY(10,185);
			 $this->Cell(220,4,"Forma 032");
			 $this->SetXY(10,$y+12);
			 $this->Cell(220,4,"Precio estimado para la elaboración del presupuesto base");

			 $this->setFont("Arial","",9);
		}
	}
?>
