<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
		require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
		var $acum1t=0;
		var $acum2t=0;
		var $acum3t=0;
		var $cont=0;
		var $cont1=0;
		var $result=0;
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
		var $dphart1;
		var $dphart2;
		var $codart1;
		var $codart2;
		var $fecreg1;
		var $fecreg2;
		var $status;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");

	$this->arrp=array("no_vacio");
				$this->bd=new basedatosAdo();
			$this->bd->validar();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->dphart1=H::GetPost("dphart1");
			$this->dphart2=H::GetPost("dphart2");
			$this->codart1=H::GetPost("codart1");
			$this->codart2=H::GetPost("codart2");
			$this->fecreg1=H::GetPost("fecreg1");
			$this->fecreg2=H::GetPost("fecreg2");
			$this->status=H::GetPost("status");

				if ($this->status=='T')
				{

				$this->sql="SELECT A.DPHART as adphart, to_char(A.FECDPH,'DD/MM/YYYY') as afecdph, A.REQART  as areqart, D.DESREQ as ddesreq,
							A.DESDPH as adesdph, A.CODORI as acodori, E.NOMCAT as nomori, A.STADPH as stadph, B.CODART as bcodart, B.CANDPH as bcandph,
							B.CANDEV as bcandev, B.CANTOT as bcantot, B.CODCAT as bcodcat, E.NOMCAT as nomdes, C.DESART as cdesart
							FROM CADPHART A, CAARTDPH B, CAREGART C, CAREQART D, npcatpre E WHERE
							(A.DPHART) = (B.DPHART) AND (B.CODART)  = (C.CODART)  AND
							(A.REQART) = (D.REQART) AND (B.CODCAT)  = (E.CODCAT)  AND
							(A.DPHART) >= ('".$this->dphart1."') AND (A.DPHART) <= ('".$this->dphart2."') AND
							(B.CODART) >= ('".$this->codart1."') AND (B.CODART) <= ('".$this->codart2."') AND
							A.FECDPH >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.FECDPH <= to_date('".$this->fecreg2."','dd/mm/yyyy')
							GROUP BY A.DPHART, A.FECDPH, A.REQART, D.DESREQ,
							A.DESDPH, A.CODORI, E.NOMCAT, A.STADPH, B.CODART, B.CANDPH,
							B.CANDEV, B.CANTOT, B.CODCAT, E.NOMCAT, C.DESART";
			}
		else
			{
				$this->sql="SELECT A.DPHART as adphart, to_char(A.FECDPH,'DD/MM/YYYY') as afecdph, A.REQART  as areqart, D.DESREQ as ddesreq,
							A.DESDPH as adesdph, A.CODORI as acodori, E.NOMCAT as nomori, A.STADPH as stadph, B.CODART as bcodart, B.CANDPH as bcandph,
							B.CANDEV as bcandev, B.CANTOT as bcantot, B.CODCAT as bcodcat, E.NOMCAT as nomdes, C.DESART as cdesart
							FROM CADPHART A, CAARTDPH B, CAREGART C, CAREQART D, npcatpre E WHERE
							(A.DPHART) = (B.DPHART) AND (B.CODART)  = (C.CODART)  AND
							(A.REQART) = (D.REQART) AND (B.CODCAT)  = (E.CODCAT)  AND
							(A.DPHART) >= ('".$this->dphart1."') AND (A.DPHART) <= ('".$this->dphart2."') AND
							(B.CODART) >= ('".$this->codart1."') AND (B.CODART) <= ('".$this->codart2."') AND
							A.FECDPH >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.FECDPH <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND
							A.STADPH = '".$this->status."' GROUP BY A.DPHART, A.FECDPH, A.REQART, D.DESREQ,
							A.DESDPH, A.CODORI, E.NOMCAT, A.STADPH, B.CODART, B.CANDPH,
							B.CANDEV, B.CANTOT, B.CODCAT, E.NOMCAT, C.DESART";

			 }



			$this->llenartitulosmaestro();
			$this->llenartitulos2();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);

  for($i=0;$i<count($this->titulos);$i++)
  {
    $this->anchos[$i]=$this->getAncho($i);
  }
  for($i=0;$i<count($this->titulos2);$i++)
  {
    $this->anchos2[$i]=$this->getAncho2($i);
  }
		}

	function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=30;
		$anchos[1]=60;
		$anchos[2]=20;
		$anchos[3]=15;
		$anchos[4]=25;
		$anchos[5]=30;
		$anchos[6]=60;
		$anchos[7]=25;
		$anchos[8]=25;
		$anchos[9]=30;
		$anchos[10]=30;
		$anchos[11]=30;

		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=25;
		$anchos2[1]=85;
		$anchos2[2]=25;
		$anchos2[3]=50;
		$anchos2[4]=25;
		$anchos2[5]=25;
		$anchos2[6]=25;
		$anchos2[7]=25;


		return $anchos2[$pos];
	}


		function llenartitulosmaestro()
		{
				$this->titulos[0]="Nro Despacho";
				$this->titulos[1]="Descripción Despacho";
				$this->titulos[2]="Fecha";
				$this->titulos[3]="Status";
				$this->titulos[4]="Número Req.";
				$this->titulos[5]="Unidad Origen";
				$this->titulos[6]="Descripción Origen";
		}

	function llenartitulos2()
		{
				$this->titulos2[0]="Código Artículo";
				$this->titulos2[1]="Descripción Artículo";
				$this->titulos2[2]="Unidad Origen";
				$this->titulos2[3]="Descripción Origen";
				$this->titulos2[4]="Cant. Despachada";
				$this->titulos2[5]="Cant. Devuelta";
				$this->titulos2[6]="Cant. Total";




		}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);

			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i]);
			}
			 $this->ln();
 			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","",8);
			for($i=0;$i<$ncampos2-2;$i++)
			{
				$this->cell($this->anchos2[$i],7,$this->titulos2[$i]);
			}
			$this->cell($this->anchos2[$i],7,$this->titulos2[5],0,0,'R');
			$this->cell($this->anchos2[$i],7,$this->titulos2[6],0,0,'R');
			$this->Line(10,50,270,50);

   		    $this->ln();

		}



			function Cuerpo()
		{
			$fec=date("d/m/Y");
 			$this->SetTextColor(0,0,128);
			$this->cell(45,5,"Al:  ".$fec);
    		$this->ln();
 			$this->SetTextColor(0,0,0);
		    $tb=$this->bd->select($this->sql);
		    $this->tb2=$tb;
			$this->setFont("Arial","",8);
			if(!$tb->EOF)
			{
				$ref=$tb->fields["adphart"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","",8);
		 		   $yy=$this->GetY();
		 		 $this->SetAutoPageBreak("false");
				 $this->Line(10,$this->GetY(),270,$this->GetY());
				 $this->cell($this->anchos[0],5," ".$tb->fields["adphart"]);
				 $this->Multicell($this->anchos[1],5," ".$tb->fields["adesdph"]);
				  $y2=$this->GetY();
				 $xx=$this->GetX()+$this->anchos[0]+$this->anchos[1];
				 $this->SetXY($xx,$yy);
				 $this->cell($this->anchos[2],5," ".$tb->fields["afecdph"]);
				 if	($tb->fields["stadph"] == 'A')
				 {
				 $this->cell($this->anchos[3],5,"Activas");
				 }
				 if	($tb->fields["stadph"] == 'N')
				 {
				 $this->cell($this->anchos[3],5,"Anuladas");
				 }
				 $this->cell($this->anchos[4],5," ".$tb->fields["areqart"]);
				 $this->cell($this->anchos[5],5," ".$tb->fields["acodori"]);
				 $this->cell($this->anchos[6],5," ".$tb->fields["nomori"]);
//				 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
				  $this->SetAutoPageBreak("true");
				 $this->ln();
				 $this->ln();
				 	 $this->SetY($y2+2);
			}
		while(!$tb->EOF)
			{
				if($tb->fields["adphart"]!=$ref)
				{
			 $this->SetLineWidth(0.2);
//				 $this->ln();
			 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","B",8);
		    	 $this->Line(185,$this->GetY(),270,$this->GetY());
				 $this->cell($this->anchos2[0],5,"");
				 $this->cell($this->anchos2[1],5,"");

				  $this->cell($this->anchos2[2],5,"                                                                   TOTAL DESPACHO");
				 $this->cell($this->anchos2[3],5,"");
				 $this->cell($this->anchos2[4],5,"".H::FormatoMonto($this->acum1),0,0,'R');
				 $this->cell($this->anchos2[5],5,"".H::FormatoMonto($this->acum2),0,0,'R');
				 $this->cell($this->anchos2[6],5,"".H::FormatoMonto($this->acum3),0,0,'R');
 		 		 $this->setFont("Arial","",8);
//				 $this->ln();
	//	    	 $this->Line(0,$this->GetY(),270,$this->GetY());
				 $this->acum1=0;
				 $this->acum2=0;
				 $this->acum3=0;
				 $this->ln();
				 $this->SetLineWidth(0.2);
				 $this->Line(10,$this->GetY(),270,$this->GetY());
				 $this->cell($this->anchos[0],5," ".$tb->fields["adphart"]);
				 $yy=$this->GetY();
				 $this->SetAutoPageBreak("false");
				 $this->Multicell($this->anchos[1],5," ".$tb->fields["adesdph"]);
				   $y2=$this->GetY();
				 $xx=$this->GetX()+$this->anchos[0]+$this->anchos[1];
				 $this->SetXY($xx,$yy);
				 $this->cell($this->anchos[2],5," ".$tb->fields["afecdph"]);
				 if	($tb->fields["stadph"] == 'A')
				 {
				 $this->cell($this->anchos[3],5,"Activas");
				 }
				 if	($tb->fields["stadph"] == 'N')
				 {
				 $this->cell($this->anchos[3],5,"Anuladas");
				 }
				 $this->cell($this->anchos[4],5," ".substr($tb->fields["areqart"],0,55));
				 $this->cell($this->anchos[5],5," ".$tb->fields["acodori"]);
				 $this->cell($this->anchos[6],5," ".$tb->fields["nomori"]);
	//			 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
 	 			 $this->SetTextColor(0,0,0);
				  $this->SetAutoPageBreak("true");
				 $this->ln();
				 $this->ln();
				 $this->SetY($y2+2);

		        }
				$this->setFont("Arial","",8);

				//Detalle
				 $this->cell($this->anchos2[0],5,"".$tb->fields["bcodart"]);
				 $this->cell($this->anchos2[1],5,"".substr($tb->fields["cdesart"],0,80));
				 $this->cell($this->anchos2[2],5,"".$tb->fields["bcodcat"]);
				 $this->cell($this->anchos2[3],5,"".$tb->fields["nomdes"]);
				 $this->cell($this->anchos2[4],5,"".H::FormatoMonto($tb->fields["bcandph"]),0,0,'R');
				 $this->cell($this->anchos2[5],5,"".H::FormatoMonto($tb->fields["bcandev"]),0,0,'R');
				 $this->cell($this->anchos2[6],5,"".H::FormatoMonto($tb->fields["bcantot"]),0,0,'R');
				 $this->acum1=($this->acum1+$tb->fields["bcandph"]);
				 $this->acum2=($this->acum2+$tb->fields["bcandev"]);
				 $this->acum3=($this->acum3+$tb->fields["bcantot"]);
				 $this->acum1t=($this->acum1t+$tb->fields["bcandph"]);
				 $this->acum2t=($this->acum2t+$tb->fields["bcandev"]);
				 $this->acum3t=($this->acum3t+$tb->fields["bcantot"]);
				 $this->ln();
				 $ref=$tb->fields["adphart"];
				 $tb->MoveNext();
				  if($this->GetY()>=170){
				 	$this->AddPage();
				 }


			 }
			 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","B",8);
		    	 $this->Line(185,$this->GetY(),270,$this->GetY());
				 $this->cell($this->anchos2[0],5,"");
				 $this->cell($this->anchos2[1],5,"");
				 $this->cell($this->anchos2[2],5,"                                                                   TOTAL DESPACHO");
				 $this->cell($this->anchos2[3],5,"");
				 $this->cell($this->anchos2[4],5,"".H::FormatoMonto($this->acum1),0,0,'R');
				 $this->cell($this->anchos2[5],5,"".H::FormatoMonto($this->acum2),0,0,'R');
				 $this->cell($this->anchos2[6],5,"".H::FormatoMonto($this->acum3),0,0,'R');
				 $this->ln();
		    	 $this->Line(10,$this->GetY(),270,$this->GetY());
 				 $this->SetLineWidth(0.5);
				 $this->ln();
				 $this->cell($this->anchos2[0],4,"");
				 $this->cell($this->anchos2[1],4,"");
				 $this->cell($this->anchos2[2],4,"");
				 $this->cell($this->anchos2[3],5,"                                           TOTALES");
				 $this->cell($this->anchos2[4],4,"".H::FormatoMonto($this->acum1t),0,0,'R');
				 $this->cell($this->anchos2[5],4,"".H::FormatoMonto($this->acum2t),0,0,'R');
				 $this->cell($this->anchos2[6],4,"".H::FormatoMonto($this->acum3t),0,0,'R');
				$this->bd->closed();
	 		}

	}
?>