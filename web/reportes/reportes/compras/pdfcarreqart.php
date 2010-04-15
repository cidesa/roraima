<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
		require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $cent=0;
		var $acum0=0;
		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
		var $acum0t=0;
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
		var $reqart1;
		var $reqart2;
		var $codcat1;
		var $codcat2;
		var $fecreg1;
		var $fecreg2;
		var $codart1;
		var $codart2;
		var $status;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");

	$this->arrp=array("no_vacio");
				$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->reqart1=H::GetPost("reqart1");
			$this->reqart2=H::GetPost("reqart2");
			$this->codcat1=H::GetPost("codcat1");
			$this->codcat2=H::GetPost("codcat2");
			$this->fecreg1=H::GetPost("fecreg1");
			$this->fecreg2=H::GetPost("fecreg2");
			$this->codart1=H::GetPost("codart1");
			$this->codart2=H::GetPost("codart2");
			$this->status=H::GetPost("status");

				if ($this->status=='T')
				{

				$this->sql="SELECT A.REQART as areqart, to_char(A.FECREQ,'DD/MM/YYYY') as afecreq, A.DESREQ as adesreq, B.CODCAT as bcodcat, E.NOMCAT as enomcat, A.MONREQ as amonreq, A.STAREQ as STAREQ,
							B.CODART as bcodart, D.DESART as ddesart, D.COSULT as dcosult, B.CANREQ as bcanreq, B.CANREC as bcanrec, B.MONTOT as bmontot
							FROM CAREQART A, CAARTREQ B, CAREGART D, npcatpre E
							WHERE
							(B.CODCAT)=(E.CODCAT) AND (A.REQART)=(B.REQART) AND (B.CODART)= (D.CODART) AND
							(A.REQART) >= ('".$this->reqart1."') AND (A.REQART) <= ('".$this->reqart2."') AND
							(B.CODCAT) >= ('".$this->codcat1."') AND (B.CODCAT) <= ('".$this->codcat2."') AND
							(B.CODART) >= ('".$this->codart1."') AND (B.CODART) <= ('".$this->codart2."') AND
							A.FECREQ >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND
							A.FECREQ <= to_date('".$this->fecreg2."','dd/mm/yyyy')
							ORDER BY A.REQART";
			}
		else
			{
				$this->sql="SELECT A.REQART as areqart, to_char(A.FECREQ,'DD/MM/YYYY') as afecreq, A.DESREQ as adesreq, B.CODCAT as bcodcat, E.NOMCAT as enomcat, A.MONREQ as amonreq, A.STAREQ as STAREQ,
							B.CODART as bcodart, D.DESART as ddesart, D.COSULT as dcosult, B.CANREQ as bcanreq, B.CANREC as bcanrec, B.MONTOT as bmontot
							FROM CAREQART A, CAARTREQ B, CAREGART D, npcatpre E
							WHERE
							(B.CODCAT)=(E.CODCAT) AND (A.REQART)=(B.REQART) AND (B.CODART)= (D.CODART) AND
							(A.REQART) >= ('".$this->reqart1."') AND (A.REQART) <= ('".$this->reqart2."') AND
							(B.CODCAT) >= ('".$this->codcat1."') AND (B.CODCAT) <= ('".$this->codcat2."') AND
							(B.CODART) >= ('".$this->codart1."') AND (B.CODART) <= ('".$this->codart2."') AND
							A.FECREQ >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND
							A.FECREQ <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND
							upper(A.STAREQ) = '".strtoupper($this->status)."' ORDER BY A.REQART";

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
		$anchos[1]=105;
		$anchos[2]=25;
		$anchos[3]=20;
		$anchos[4]=30;
		$anchos[5]=40;
		$anchos[6]=25;
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
		$anchos2[0]=30;		
		$anchos2[1]=45;
		$anchos2[2]=25;
		$anchos2[3]=45;
		$anchos2[4]=25;
		$anchos2[5]=30;
		$anchos2[6]=30;
		$anchos2[7]=30;
/*		$anchos2[7]=30;
		$anchos2[8]=30;
		$anchos2[9]=30;
		$anchos2[10]=30;
		$anchos2[11]=30;*/
		
		return $anchos2[$pos];	
	}	


		function llenartitulosmaestro()
		{
				$this->titulos[0]="Nro Requisicion";
				$this->titulos[1]="Descripcion Requisicion";
				$this->titulos[2]="Fecha";
				$this->titulos[3]="Status";
		}

	function llenartitulos2()
		{
				$this->titulos2[0]="Codigo Articulo";
				$this->titulos2[1]="Descripcion Articulo";
				$this->titulos2[2]="Cod. Unidad";
				$this->titulos2[3]="Descripcion Unidad";
				$this->titulos2[4]="             Cant. Req.";
				$this->titulos2[5]="               Cant. Rec.";
				$this->titulos2[6]="         Costo Unitario";
				$this->titulos2[7]="         Monto Total";



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
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],7,$this->titulos2[$i]);
			}
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
			$tb2=$tb;//his->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["areqart"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);
				 $this->Line(10,$this->GetY(),270,$this->GetY());
				 if	($tb2->fields["stareq"] == 'N')
				 {
				 $estado="Anulada";
				 }
				 elseif	($tb2->fields["stareq"] == 'A')
				 {
				 $estado="Activa";
				 }
				 else
				 {
				 $estado="No Especifica";
				 }
				 $this->SetWidths($this->anchos);
				 $this->RowM(array($tb2->fields["areqart"],$tb2->fields["adesreq"],$tb2->fields["afecreq"],$estado));
//				 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
				 $this->ln();
			}
		while(!$tb->EOF)
			{
				if($tb->fields["areqart"]!=$ref)
				{
				 $ref=$tb->fields["areqart"];
				 $this->SetLineWidth(0.2);
//				 $this->ln();
				 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","",8);
		    	 $this->Line(10,$this->GetY(),270,$this->GetY());
				 $this->SetWidths($this->anchos2);
				 $this->SetAligns(array('L','L','L','L','R','R','R','R'));
				 $this->RowM(array("","","","TOTAL REQUISICION:",H::FormatoMonto($this->acum0),H::FormatoMonto($this->acum1),H::FormatoMonto($this->acum2),H::FormatoMonto($this->acum3)));
//				 $this->ln();
	//	    	 $this->Line(0,$this->GetY(),270,$this->GetY());
				 $this->acum0=0;
				 $this->acum1=0;
				 $this->acum2=0;
				 $this->acum3=0;
		 		 $this->setFont("Arial","B",8);
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);
				 $this->Line(10,$this->GetY(),270,$this->GetY());
				 if	($tb2->fields["stareq"] == 'N')
				 {
				 $estado="Anulada";
				 }
				 elseif	($tb2->fields["stareq"] == 'A')
				 {
				 $estado="Activa";
				 }
				 else
				 {
				 $estado="No Especifica";
				 }
				 $this->SetWidths($this->anchos);
				 $this->RowM(array($tb->fields["areqart"],$tb->fields["adesreq"],$tb->fields["afecreq"],$estado));
	//			 $this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
 	 			 $this->SetTextColor(0,0,0);
				 $this->ln();

		        }
				$this->setFont("Arial","",8);
				//Detalle
				 $this->SetWidths($this->anchos2);
				 $this->SetAligns(array('L','L','L','L','R','R','R','R'));
				 $this->RowM(array($tb->fields["bcodart"],$tb->fields["ddesart"],$tb->fields["bcodcat"],$tb->fields["enomcat"],H::FormatoMonto($tb->fields["bcanreq"]),H::FormatoMonto($tb->fields["bcanrec"]),H::FormatoMonto($tb->fields["dcosult"]),H::FormatoMonto($tb->fields["bmontot"])));
				 $this->acum0=($this->acum0+$tb->fields["bcanreq"]);
				 $this->acum1=($this->acum1+$tb->fields["bcanrec"]);
				 $this->acum2=($this->acum2+$tb->fields["dcosult"]);
				 $this->acum3=($this->acum3+$tb->fields["bmontot"]);
				 $this->acum0t=($this->acum0t+$tb->fields["bcanreq"]);
				 $this->acum1t=($this->acum1t+$tb->fields["bcanrec"]);
				 $this->acum2t=($this->acum2t+$tb->fields["dcosult"]);
				 $this->acum3t=($this->acum3t+$tb->fields["bmontot"]);
				 //$this->ln();
				 $tb->MoveNext();


			 }
			 $this->SetLineWidth(0.3);
				 $this->SetAutoPageBreak(false);
 		 		 $this->setFont("Arial","",8);
		    	 $this->Line(10,$this->GetY(),270,$this->GetY());
				 $this->SetWidths($this->anchos2);
				 $this->SetAligns(array('L','L','L','L','R','R','R','R'));
				 $this->RowM(array("","","","TOTAL REQUISICION:",H::FormatoMonto($this->acum0),H::FormatoMonto($this->acum1),H::FormatoMonto($this->acum2),H::FormatoMonto($this->acum3)));
				 //$this->ln();
		    	 $this->Line(10,$this->GetY(),270,$this->GetY());
 				 $this->SetLineWidth(0.5);
				 //$this->ln();
		    	 $this->Line(150,$this->GetY(),270,$this->GetY());
				 $this->RowM(array("","","","TOTALES",H::FormatoMonto($this->acum0t),H::FormatoMonto($this->acum1t),H::FormatoMonto($this->acum2t),H::FormatoMonto($this->acum3t)));
				 $this->SetAutoPageBreak(true,32);
				 $this->bd->closed();
	 		}

	}
?>