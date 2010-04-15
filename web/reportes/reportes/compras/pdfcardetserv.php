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
		var $acum4=0;
		var $acum5=0;
		var $acum1t=0;
		var $acum2t=0;
		var $acum3t=0;
		var $acum4t=0;
		var $acum5t=0;
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
		var $sql3;
		var $rep;
		var $numero;
		var $cab;
		var $nrord1;
		var $nrord2;
		var $codart1;
		var $codart2;
		var $codpro1;
		var $codpro2;
		var $fecreg1;
		var $fecreg2;
		var $status;
		var $unidad;
		var $partida;

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
			$this->nrord1=H::GetPost("nrord1");
			$this->nrord2=H::GetPost("nrord2");
			$this->codart1=H::GetPost("codart1");
			$this->codart2=H::GetPost("codart2");
			$this->codpro1=H::GetPost("codpro1");
			$this->codpro2=H::GetPost("codpro2");
			$this->fecreg1=H::GetPost("fecreg1");
			$this->fecreg2=H::GetPost("fecreg2");
			$this->status=H::GetPost("status");
			$this->unidad=H::GetPost("unidad");
			$this->partida=H::GetPost("partida");

				if ($this->status=='t')
				{

			 	$this->sql=" SELECT
			 				A.ORDCOM as aordcom,
			 				to_char(A.FECORD,'DD/MM/YYYY') as afecord,
							A.CODPRO as acodpro,
							E.NOMPRO as enompro,
							E.RIFPRO as erifpro,
							B.CODCAT as bcodcat,
							D.NOMCAT as dnomcat,
							c.codpar as fcodpar,
							A.DESORD as adesord,
							A.CRECON as acrecon,
							A.PLAENT as aplaent,
							A.TIECAN as atiecan,
							A.MONORD as amonord,
							A.STAORD as staord,
							B.CODART as bcodart,
							B.CANORD as bcanord,
							B.CANAJU as bcanaju,
							B.CANREC as bcanrec,
							B.CANTOT as bcantot,
							B.PREART as bpreart,
							(B.PREART*B.CANTOT) as totpre,
							B.DTOART as bdtoart,
							B.RGOART as brgoart,
							B.TOTART as btotart,
							C.DESART as bdesart
							FROM CAORDCOM A, CAARTORD B, CAREGART C, npcatpre D, CAPROVEE E
							WHERE
							A.ORDCOM LIKE 'O%'
							AND (A.ORDCOM) = (B.ORDCOM)
							AND (A.CODPRO) = (E.CODPRO)
							AND	(B.CODCAT) = (D.CODCAT)
							AND (B.CODART) = (C.CODART) and
							(A.ORDCOM) >= ('".$this->nrord1."') AND
							(A.ORDCOM) <= ('".$this->nrord2."') AND
							(E.CODPRO) >= ('".$this->codpro1."') AND
							(E.CODPRO) <= ('".$this->codpro2."') AND
							(B.CODART) >= ('".$this->codart1."') AND
							(B.CODART) <= ('".$this->codart2."') AND
							A.FECORD >= to_date('".$this->fecreg1."','dd/mm/yyyy')
							AND A.FECORD <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND
							B.CODCAT LIKE '".$this->unidad."%' AND
							c.codpar  LIKE '%".$this->partida."%'
							GROUP BY A.ORDCOM , A.FECORD, A.CODPRO, E.NOMPRO,
							E.RIFPRO, B.CODCAT, D.NOMCAT, c.codpar, A.DESORD,
							A.CRECON, A.PLAENT, A.TIECAN, A.MONORD,
							A.STAORD, B.CODART, B.CANORD, B.CANAJU, B.CANREC,
							B.CANTOT, B.PREART, B.DTOART, B.RGOART,
							B.TOTART, C.DESART";// print $this->sql;exit;

			}


		else
			{
					$this->sql=" SELECT
			 				A.ORDCOM as aordcom,
			 				to_char(A.FECORD,'DD/MM/YYYY') as afecord,
							A.CODPRO as acodpro,
							E.NOMPRO as enompro,
							E.RIFPRO as erifpro,
							B.CODCAT as bcodcat,
							D.NOMCAT as dnomcat,
							c.codpar as fcodpar,
							A.DESORD as adesord,
							A.CRECON as acrecon,
							A.PLAENT as aplaent,
							A.TIECAN as atiecan,
							A.MONORD as amonord,
							A.STAORD as staord,
							B.CODART as bcodart,
							B.CANORD as bcanord,
							B.CANAJU as bcanaju,
							B.CANREC as bcanrec,
							B.CANTOT as bcantot,
							B.PREART as bpreart,
							(B.PREART*B.CANTOT) as totpre,
							B.DTOART as bdtoart,
							B.RGOART as brgoart,
							B.TOTART as btotart,
							C.DESART as bdesart
							FROM CAORDCOM A, CAARTORD B, CAREGART C, npcatpre D, CAPROVEE E
							WHERE
							A.ORDCOM LIKE 'O%'
							AND (A.ORDCOM) = (B.ORDCOM)
							AND (A.CODPRO) = (E.CODPRO)
							AND	(B.CODCAT) = (D.CODCAT)
							AND (B.CODART) = (C.CODART) and
							(A.ORDCOM) >= ('".$this->nrord1."') AND
							(A.ORDCOM) <= ('".$this->nrord2."') AND
							(E.CODPRO) >= ('".$this->codpro1."') AND
							(E.CODPRO) <= ('".$this->codpro2."') AND
							(B.CODART) >= ('".$this->codart1."') AND
							(B.CODART) <= ('".$this->codart2."') AND
							A.FECORD >= to_date('".$this->fecreg1."','dd/mm/yyyy')
							AND A.FECORD <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND
							B.CODCAT LIKE '".$this->unidad."%' AND
							c.codpar  LIKE '%".$this->partida."%'
							AND A.STAORD = '".$this->status."'
							GROUP BY A.ORDCOM , A.FECORD, A.CODPRO, E.NOMPRO,
							E.RIFPRO, B.CODCAT, D.NOMCAT, c.codpar, A.DESORD,
							A.CRECON, A.PLAENT, A.TIECAN, A.MONORD,
							A.STAORD, B.CODART, B.CANORD, B.CANAJU, B.CANREC,
							B.CANTOT, B.PREART, B.DTOART, B.RGOART,
							B.TOTART, C.DESART"; //print $this->sql;exit;
			 }
			 		//
//print $this->sql;exit;

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
		$anchos[0]=20;
		$anchos[1]=50;
		$anchos[2]=25;
		$anchos[3]=25;
		$anchos[4]=50;
		$anchos[5]=35;
		$anchos[6]=35;
		$anchos[7]=35;


		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=25;
		$anchos2[1]=40;
		$anchos2[2]=25;
		$anchos2[3]=25;
		$anchos2[4]=25;
		$anchos2[5]=25;
		$anchos2[6]=25;
		$anchos2[7]=25;
		$anchos2[8]=25;
		$anchos2[9]=30;


		return $anchos2[$pos];
	}


		function llenartitulosmaestro()
		{
				$this->titulos[0]="Nro Orden";
				$this->titulos[1]="Descripción Orden";
				$this->titulos[2]="Fecha";
				$this->titulos[3]="Status";
				$this->titulos[4]="Proveedor";
				$this->titulos[5]="Unidad Solicitante";
				$this->titulos[6]="Crédito/Contado";
				$this->titulos[7]="Plazo Entrega";
		}

	function llenartitulos2()
		{
				$this->titulos2[0]="Código Partida";
				$this->titulos2[1]="Desc. Artículo";
				$this->titulos2[2]="Cant. Ordenada";
				$this->titulos2[3]="Cant. Ajustada";
				$this->titulos2[4]="Cant. Recibida";
				$this->titulos2[5]="Cant. Total";
				$this->titulos2[6]="Precio Articulo";
				$this->titulos2[7]="Dscto. Articulo";
				$this->titulos2[8]="Recargo Articulo";
				$this->titulos2[9]="Total Articulo";
		}

		function Header()
		{
			if(eregi("OC",$this->nrord1) and eregi("OC",$this->nrord2))
			$this->cab->poner_cabecera($this,H::GetPost("titulo")." DE COMPRA (Bolivares Fuertes)","l","s");
			elseif(eregi("OC",$this->nrord1) and eregi("OS",$this->nrord2))
			$this->cab->poner_cabecera($this,H::GetPost("titulo")." DE COMPRA Y SERVICIO (Bolivares Fuertes)","l","s");
			elseif(eregi("OS",$this->nrord1) and eregi("OS",$this->nrord2))
			$this->cab->poner_cabecera($this,H::GetPost("titulo")." DE SERVICIO (Bolivares Fuertes)","l","s");
			else
			$this->cab->poner_cabecera($this,H::GetPost("titulo")."ES (Bolivares Fuertes)","l","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);

				$this->ln(-2);
				$this->cell($this->anchos[0],7,$this->titulos[0]);
				$this->cell($this->anchos[1],7,$this->titulos[1]);
				$this->ln(2);
				$this->cell($this->anchos[0]+$this->anchos[1]);
				$this->cell($this->anchos[2],7,$this->titulos[2]);
				$this->cell($this->anchos[3],7,$this->titulos[3]);
				$this->cell($this->anchos[4]+$this->anchos[5],7,$this->titulos[5]);
				$this->cell($this->anchos[6],7,$this->titulos[6]);
				$this->cell($this->anchos[7],7,$this->titulos[7]);
				$this->ln(2);
				$this->cell($this->anchos[0],7,$this->titulos[4]);
				$this->ln(-2);

			 $this->ln();
 			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","",8);
				$this->cell($this->anchos2[0]+5,7,$this->titulos2[0],0,0,'C');
				$this->cell($this->anchos2[1]+5,7,$this->titulos2[1],0,0,'L');
				$this->cell($this->anchos2[2],7,$this->titulos2[2],0,0,'C');
				$this->cell($this->anchos2[3]-4,7,$this->titulos2[3],0,0,'C');
				$this->cell($this->anchos2[4]-3,7,$this->titulos2[4],0,0,'C');
				$this->cell($this->anchos2[5]-3,7,$this->titulos2[5],0,0,'C');
				$this->cell($this->anchos2[6],7,$this->titulos2[6],0,0,'C');
				$this->cell($this->anchos2[7],7,$this->titulos2[7],0,0,'C');
				$this->cell($this->anchos2[8],7,$this->titulos2[8],0,0,'C');
				$this->cell($this->anchos2[9],7,$this->titulos2[9],0,0,'C');
#			for($i=0;$i<$ncampos2;$i++)
#			{
#				$this->cell($this->anchos2[$i],7,$this->titulos2[$i],0,0,'C');
#			}
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
			$tb2=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["aordcom"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","",8);
		 		 $yy=$this->GetY();
		 		 $this->SetAutoPageBreak("false");
				 $this->Line(10,$this->GetY(),270,$this->GetY());
				 $this->cell($this->anchos[0],4," ".$tb2->fields["aordcom"]);
//				 $this->Multicell($this->anchos[1],4," ".$tb->fields["adesord"]);
				 $this->Multicell(240,4,trim($tb->fields["adesord"]));
				 $this->cell($this->anchos[0],4," ".$tb2->fields["acodpro"]);
				 $this->Multicell(240,4,trim($tb->fields["enompro"]));
				 $y2=$this->GetY();
				 $xx=$this->GetX()+$this->anchos[0]+$this->anchos[1];
				 $this->SetXY($xx,$y2);
				 $this->cell($this->anchos[2],4," ".$tb2->fields["afecord"]);

				 if	($tb2->fields["staord"] == 'A')
				 {
				 $this->cell($this->anchos[3],4,"Activa");
				 }
				 elseif	($tb2->fields["staord"] == 'N')
				 {
				 $this->cell($this->anchos[3],4,"Anulada");
				 }
				 else
				 {
				 $this->cell($this->anchos[3],4,"no definida");
				 }
				 $retro=$this->GetX();
				 $this->cell($this->anchos[4]-15+$this->anchos[5]+20);
//-----------------------sql2--------------------------
				 $this->sql2="SELECT A.DESCONPAG as desconpag FROM CACONPAG A, CAORDCONPAG B WHERE
				 B.ORDCOM='".$tb2->fields["aordcom"]."' AND B.CODCONPAG = A.CODCONPAG";
				 $tb2b=$this->bd->select($this->sql2);
				 $this->cell($this->anchos[6],4," ".$tb2b->fields["desconpag"]);
//-----------------------sql3--------------------------
				 $this->sql3="SELECT A.DESFORENT as desforent FROM CAFORENT A, CAORDFORENT B WHERE
				 B.ORDCOM='".$tb2->fields["aordcom"]."' AND (B.CODFORENT = A.CODFORENT)";
				 $tb2c=$this->bd->select($this->sql3);
				 $this->cell($this->anchos[7],4," ".$tb2c->fields["desforent"]);
//-----------------------fin--------------------------
				 $this->SetX($retro);
				 $this->multicell($this->anchos[4]-15+$this->anchos[5]+20,4," ".trim($tb->fields["dnomcat"]));
				 $this->SetAutoPageBreak("true");
				 $this->ln();
				 $this->ln();
				  $this->SetY($y2+7);
			}
		while(!$tb->EOF)
			{
				if($tb->fields["aordcom"]!=$ref)
				{
			 $this->SetLineWidth(0.2);
//				 $this->ln();
			 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","B",8);
		    	 $this->Line(60,$this->GetY(),270,$this->GetY());
				 $this->cell($this->anchos2[0]+5,5,"");
				 $this->cell($this->anchos2[1]+5,5,"TOTAL ORDEN");
				 $this->cell($this->anchos2[2],5,"".H::FormatoMonto($this->acum1),0,0,'R');
				 $this->cell($this->anchos2[3]-4,5,"".H::FormatoMonto($this->acum2),0,0,'R');
				 $this->cell($this->anchos2[4]-3,5,"".H::FormatoMonto($this->acum3),0,0,'R');
				 $this->cell($this->anchos2[5]-3,5,"".H::FormatoMonto($this->acum4),0,0,'R');
				 $this->cell($this->anchos2[6],5,"");
				 $this->cell($this->anchos2[7],5,"");
				 $this->cell($this->anchos2[8],5,"");
				 $this->cell($this->anchos2[9]-8,5,"".H::FormatoMonto($this->acum5),0,0,'R');
 		 		 $this->setFont("Arial","",8);
//				 $this->ln();
	//	    	 $this->Line(0,$this->GetY(),270,$this->GetY());
				 $this->acum1=0;
				 $this->acum2=0;
				 $this->acum3=0;
				 $this->acum4=0;
				 $this->acum5=0;
				 $this->ln();
				 $this->SetLineWidth(0.2);
				 $this->Line(10,$this->GetY(),270,$this->GetY());
 				 $yy=$this->GetY();
		 		 $this->SetAutoPageBreak("false");
				 $this->cell($this->anchos[0],4," ".$tb->fields["aordcom"]);
//				 $this->Multicell($this->anchos[1],4," ".$tb->fields["adesord"]);
				 $this->Multicell(240,4,trim($tb->fields["adesord"]));
				 $this->cell($this->anchos[0],4," ".$tb->fields["acodpro"]);
				 $this->Multicell(240,4,trim($tb->fields["enompro"]));
				 $y2=$this->GetY();
				 	 $xx=$this->GetX()+$this->anchos[0]+$this->anchos[1];
				 $this->SetXY($xx,$y2);
				 $this->cell($this->anchos[2],4," ".$tb->fields["afecord"]);
				 if	($tb->fields["staord"] == 'A')
				 {
				 $this->cell($this->anchos[3],4,"Activa");
				 }
				 elseif	($tb->fields["staord"] == 'N')
				 {
				 $this->cell($this->anchos[3],4,"Anulada");
				 }
				 else
				 {
				 $this->cell($this->anchos[3],4,"no definida");
				 }
				 $retro=$this->GetX();
				 $this->cell($this->anchos[4]-15+$this->anchos[5]+20);
//-----------------------sql2--------------------------
				 $this->sql2="SELECT A.DESCONPAG as desconpag FROM CACONPAG A, CAORDCONPAG B WHERE
				 B.ORDCOM='".$tb->fields["aordcom"]."' AND B.CODCONPAG = A.CODCONPAG";
				 $tb2b=$this->bd->select($this->sql2);
				 $this->cell($this->anchos[6],4," ".$tb2b->fields["desconpag"]);
//-----------------------sql3--------------------------
				 $this->sql3="SELECT A.DESFORENT as desforent FROM CAFORENT A, CAORDFORENT B WHERE
				 B.ORDCOM='".$tb->fields["aordcom"]."' AND (B.CODFORENT = A.CODFORENT)";
				 $tb2c=$this->bd->select($this->sql3);
				 $this->cell($this->anchos[7],4," ".$tb2c->fields["desforent"]);
//-----------------------fin--------------------------
				 $this->SetX($retro);
				 $this->multicell($this->anchos[4]-15+$this->anchos[5]+20,4," ".trim($tb->fields["dnomcat"]));
				 $this->SetAutoPageBreak("true");
				 $this->ln();
				 $this->ln();
				 $this->SetY($y2+7);
		        }

				$this->setFont("Arial","",8);
				$ref=$tb->fields["aordcom"];
				//Detalle
				 $this->cell($this->anchos2[0]+5,5,"".$tb->fields["fcodpar"]);
				 $this->cell($this->anchos2[1]+5,5,"".substr($tb->fields["bdesart"],0,30));
				 $this->cell($this->anchos2[2],5,"".H::FormatoMonto($tb->fields["bcanord"]),0,0,'R');
				 $this->cell($this->anchos2[3]-4,5,"".H::FormatoMonto($tb->fields["bcanaju"]),0,0,'R');
				 $this->cell($this->anchos2[4]-3,5,"".H::FormatoMonto($tb->fields["bcanrec"]),0,0,'R');
				 $this->cell($this->anchos2[5]-3,5,"".H::FormatoMonto($tb->fields["bcantot"]),0,0,'R');
				 $this->cell($this->anchos2[6],5,"".H::FormatoMonto($tb->fields["bpreart"]),0,0,'R');
				 $this->cell($this->anchos2[7],5,"".H::FormatoMonto($tb->fields["bdtoart"]),0,0,'R');
				 $this->cell($this->anchos2[8],5,"".H::FormatoMonto($tb->fields["brgoart"]),0,0,'R');
				 $this->cell($this->anchos2[9]-8,5,"".H::FormatoMonto($tb->fields["btotart"]),0,0,'R');
				 $this->acum1=($this->acum1+$tb->fields["bcanord"]);
				 $this->acum2=($this->acum2+$tb->fields["bcanaju"]);
				 $this->acum3=($this->acum3+$tb->fields["bcanrec"]);
				 $this->acum4=($this->acum4+$tb->fields["bcantot"]);
				 $this->acum5=($this->acum5+$tb->fields["btotart"]);
				 $this->acum1t=($this->acum1t+$tb->fields["bcanord"]);
				 $this->acum2t=($this->acum2t+$tb->fields["bcanaju"]);
				 $this->acum3t=($this->acum3t+$tb->fields["bcanrec"]);
				 $this->acum4t=($this->acum4t+$tb->fields["bcantot"]);
				 $this->acum5t=($this->acum5t+$tb->fields["btotart"]);
				 $this->ln();
				 $tb->MoveNext();
				 if($this->GetY()>=170){
				 	$this->AddPage();
				 }


			 }
			 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","B",8);
		    	 $this->Line(60,$this->GetY(),270,$this->GetY());
				 $this->cell($this->anchos2[0]+5,5,"");
				 $this->cell($this->anchos2[1]+5,5,"TOTAL ORDEN");
				 $this->cell($this->anchos2[2],5,"".H::FormatoMonto($this->acum1),0,0,'R');
				 $this->cell($this->anchos2[3]-4,5,"".H::FormatoMonto($this->acum2),0,0,'R');
				 $this->cell($this->anchos2[4]-3,5,"".H::FormatoMonto($this->acum3),0,0,'R');
				 $this->cell($this->anchos2[5]-3,5,"".H::FormatoMonto($this->acum4),0,0,'R');
				 $this->cell($this->anchos2[6],5,"");
				 $this->cell($this->anchos2[7],5,"");
				 $this->cell($this->anchos2[8],5,"");
				 $this->cell($this->anchos2[9]-8,5,"".H::FormatoMonto($this->acum5),0,0,'R');
				 $this->ln();
		    	 $this->Line(10,$this->GetY(),270,$this->GetY());
 				 $this->SetLineWidth(0.5);
				 $this->ln();
				 $this->cell($this->anchos2[0]+5,4,"");
				 $this->cell($this->anchos2[1]+5,5,"TOTALES");
				 $this->cell($this->anchos2[2],4,"".H::FormatoMonto($this->acum1t),0,0,'R');
				 $this->cell($this->anchos2[3]-4,4,"".H::FormatoMonto($this->acum2t),0,0,'R');
				 $this->cell($this->anchos2[4]-3,4,"".H::FormatoMonto($this->acum3t),0,0,'R');
				 $this->cell($this->anchos2[5]-3,4,"".H::FormatoMonto($this->acum4t),0,0,'R');
				 $this->cell($this->anchos2[6],4,"");
				 $this->cell($this->anchos2[7],4,"");
				 $this->cell($this->anchos2[8],4,"");
				 $this->cell($this->anchos2[9]-8,4,"".H::FormatoMonto($this->acum5t),0,0,'R');

	 		}

	}
?>