<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/bienes/Bnrrescuebie.class.php");

	class pdfreporte extends fpdf
	{
		var $total_activo=0;
		var $acum_activo=0;
		var $acum2=0;
		var $acum3=0;
		var $result=0;
		var $result2=0;
		var $result3=0;
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
		var $codubi;
		var $codactdes;
		var $codacthas;
		var $codmuedes;
		var $codmuehas;
		var $fecregdes;
		var $fecreghas;
		var $prenom;
		var $precar;
		var $confnom;
		var $confcar;
		var $apronom;
		var $aprocar;
		var $i=0;

		function pdfreporte()
		{
			//$this->fpdf("l","mm","Letter");
			parent::FPDF("L");
			$this->bd        = new basedatosAdo();
			$this->titulos   = array();
			$this->titulos2  = array();
			$this->campos    = array();
			$this->anchos    = array();
			$this->anchos2   = array();
			//$this->codubi    = H::GetPost("codubi");
			$this->codubides = H::GetPost("codubides");
			$this->codubihas = H::GetPost("codubihas");
			$this->codmuedes = H::GetPost("codmuedes");
			$this->codmuehas = H::GetPost("codmuehas");
			$this->codinmdes = H::GetPost("codinmdes");
			$this->codinmhas = H::GetPost("codinmhas");
			$this->fecdes = H::GetPost("fecdes");
			$this->fechas = H::GetPost("fechas");
			$this->fecdesinm = H::GetPost("fecdesinm");
			$this->fechasinm = H::GetPost("fechasinm");
			$this->prepardes = H::GetPost("prepardes");
			$this->preparhas = H::GetPost("preparhas");
			$this->confordes = H::GetPost("confordes");
			$this->conforhas = H::GetPost("conforhas");
			$this->aprobades = H::GetPost("aprobades");
			$this->aprobahas = H::GetPost("aprobahas");

			$this->bnrrescuebie = new Bnrrescuebie();
		    $this->arrp=$this->bnrrescuebie->sqlp($this->codubides,$this->codubihas,$this->codmuedes,$this->codmuehas,$this->codinmdes,$this->codinmhas,$this->fecdes,$this->fechas,$this->fecdesinm,$this->fechasinm);

		    //h::printR($this->arrp);

			$this->llenartitulosmaestro();
			$this->cab = new cabecera();
			$this->SetAutoPageBreak(true,40);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo";
				$this->titulos[1]="Descripcion";
				$this->titulos[2]="Existencia Anterior";
				$this->titulos[3]="Incorporaciones";
				$this->titulos[4]="Desincorporaciones";
				$this->titulos[5]="Existencia Actual";
		}

		function Header()
		{

			$this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s");
	        $Y=$this->GetY();
	        $this->setFont("Arial","B",6);
	        $this->SetXY(45,19);
	   	    $this->Cell(180,5,"DEPARTAMENTO DE BIENES REGIONALES",0,0,'L');
	   	     $this->SetXY(146,8);
	   	     $this->setFont("Arial","B",10);
	         $this->Cell(120,5,'FORMULARIO BM-IV',0,0,'R');
	   	    $this->sety($Y);

			$this->SetTextColor(150,0,0);
			$this->setWidths(array(30,85,35,35,35,35));
			$this->setaligns(array("L","L","R","R","R","R"));
			$this->SetLineWidth(0.2);
		    $this->setFont("Arial","B",11);
 		    $this->SetTextColor(150,0,0);
 		    if ($this->arrp[$this->i]["tipo"]=="M")
 		    	$this->cell(20,4,"BIENES MUEBLES");
 		    else
 		       $this->cell(20,4,"BIENES INMUEBLE");
		    $this->ln(6);
		    $this->setFont("Arial","B",9);
 		    $this->SetTextColor(150,0,0);
 		    $this->ln();
		    $this->Line(10,$this->GetY()-2,270,$this->GetY()-2);
		    $this->cell(20,4,"Unidad de Trabajo:   ");
		    $this->SetTextColor(0,0,0);
		    $this->ln(4);
			$this->SetTextColor(150,0,0);
			$this->setWidths(array(30,90,35,35,35,35));
			$this->setaligns(array("L","L","C","C","C","C"));
			$this->Row(array($this->titulos[0],$this->titulos[1],$this->titulos[2],$this->titulos[3],$this->titulos[4],$this->titulos[5]));
			$this->setWidths(array(30,85,35,35,35,35));
			$this->setaligns(array("L","L","R","R","R","R"));
			$this->SetTextColor(0,0,0);
			$this->ln(5);
			$this->Line(10,$this->GetY()-3,270,$this->GetY()-3);
		}

		function Footer()
		{
			$this->sety(170);
			 $this->ln();
 			 $this->Line(110,$this->GetY(),270,$this->GetY());
	 		 $this->setFont("Arial","B",8);
	 		 $this->SetTextColor(0,0,150);
	 		 $this->setX(130);
	 		 $this->cell(35,6,"Existencia Anterior",0,0,'C');
	 		 $this->cell(35,6,"Incorporaciones",0,0,'C');
	 		 $this->cell(35,6,"Desincorporaciones",0,0,'C');
		     $this->cell(35,6,"Existencia Actual",0,0,'C');
		     $this->ln();
	 		 $this->setFont("Arial","",8);
	 		 $this->SetTextColor(0,0,150);
	 		 $this->setX(125);
			$this->cell(35,6,H::FormatoMonto($this->tot_exi_ant),0,0,"R");
	 		$this->cell(35,6,H::FormatoMonto($this->tot_inc),0,0,"R");
	 		$this->cell(35,6,H::FormatoMonto($this->tot_des),0,0,"R");
		    $this->cell(35,6,H::FormatoMonto(($this->tot_exi_ant+$this->tot_inc)-$this->tot_des),0,0,"R");
		    $this->ln();
			/*$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->Line(10,$this->GetY(),10,$this->GetY()+25);
			$this->Line(100,$this->GetY(),100,$this->GetY()+25);
			$this->Line(180,$this->GetY(),180,$this->GetY()+25);
			$this->Line(270,$this->GetY(),270,$this->GetY()+25);*/
			$this->SetTextColor(150,0,0);
			$this->setFont("Arial","",11);
			$this->cell(90,5,"Contralor Municipal");
			$this->ln();
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","",10);
			$this->cell(90,5,"Nombre:     ".$this->prepardes);
			$this->cell(80,5,$this->confordes,0,0,'L');
			$this->cell(90,5,$this->aprobades,0,0,'L');
			$this->ln();
			$this->Line(10,$this->GetY(),140,$this->GetY());
			$this->cell(90,7,"Cargo:      ".$this->preparhas);
			$this->cell(80,7,$this->conforhas,0,0,'L');
			$this->cell(90,7,$this->aprobahas,0,0,'L');
			$this->ln();
			$this->Line(10,$this->GetY(),140,$this->GetY());
			$this->cell(0,8,"Firma:");
			$this->ln();
			$this->Line(10,$this->GetY(),140,$this->GetY());
		}

		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
			$acodubi="";
			$this->tot_exi_ant = 0;
            $this->tot_des  = 0;
            $this->tot_inc=0;
			$tipo = $this->arrp[$this->i]["tipo"];
			foreach($this->arrp as $arrp)
			{
				 if ($tipo!=$arrp["tipo"])
				 {
					$this->addpage();
					$this->tot_exi_ant = 0;
		            $this->tot_des  = 0;
		            $this->tot_inc=0;
				 }
				 $this->SetLineWidth(0.2);
 				 $this->setFont("Arial","",8);
 				 $arrexistencia = $this->bnrrescuebie->sqlexistencia($arrp["acodmue"],$this->fecdes);
	 		 	 if (!empty($arrexistencia))
	 		      	$exi_ant = $arrexistencia[0]["existencia_ant"];

 				 $this->Row(array($arrp["acodubi"],$arrp["desubi"],H::FormatoMonto($exi_ant),H::FormatoMonto($arrp["inc"]),H::FormatoMonto($arrp["des"]),H::FormatoMonto(($exi_ant+$arrp["inc"])-$arrp["des"])));

				 $this->tot_exi_ant+= $exi_ant;
 				 $this->tot_des+=$arrp["des"];
 				 $this->tot_inc+=$arrp["inc"];
 				 $tipo = $arrp["tipo"];
 				 $this->i++;
			}


		}

	}

?>