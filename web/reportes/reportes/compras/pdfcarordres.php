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
			$this->codpro1=H::GetPost("codpro1");
			$this->codpro2=H::GetPost("codpro2");
			$this->fecreg1=H::GetPost("fecreg1");
			$this->fecreg2=H::GetPost("fecreg2");
			$this->status=H::GetPost("status");
			$this->unidad=H::GetPost("unidad");
			$this->partida=H::GetPost("partida");

				if ($this->status=='t')
				{

			 	$this->sql= "select
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
							B.ORDCOM LIKE 'O%'
							AND (A.ORDCOM) = (B.ORDCOM)
							AND (A.CODPRO) = (E.CODPRO)
							AND	(B.CODCAT) = (D.CODCAT)
							AND (B.CODART) = (C.CODART) and
							(A.ORDCOM) >= ('".$this->nrord1."') AND
							(A.ORDCOM) <= ('".$this->nrord2."') AND
							(E.CODPRO) >= ('".$this->codpro1."') AND
							(E.CODPRO) <= ('".$this->codpro2."') AND
							A.FECORD >= to_date('".$this->fecreg1."','dd/mm/yyyy')
							AND A.FECORD <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND
							B.CODCAT LIKE '".$this->unidad."%' AND
							c.codpar  LIKE '%".$this->partida."%'
							GROUP BY A.ORDCOM , A.FECORD, A.CODPRO, E.NOMPRO,
							E.RIFPRO, B.CODCAT, D.NOMCAT, c.codpar, A.DESORD,
							A.CRECON, A.PLAENT, A.TIECAN, A.MONORD,
							A.STAORD, B.CODART, B.CANORD, B.CANAJU, B.CANREC,
							B.CANTOT, B.PREART, B.DTOART, B.RGOART,
							B.TOTART, C.DESART";//H::PrintR($this->sql);exit;

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
//print '<pre>'; print $this->sql;exit;

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
	function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=20;
		$anchos[1]=50;
		$anchos[2]=25;
		$anchos[3]=25;
		$anchos[4]=50;
		$anchos[5]=50;
		$anchos[6]=35;
		$anchos[7]=35;
		return $anchos[$pos];
	}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="Nro Orden";
				$this->titulos[1]="Descripción Orden";
				$this->titulos[2]="Fecha";
				$this->titulos[3]="Status";
				$this->titulos[4]="Proveedor";
				$this->titulos[5]="Unidad Solicitante";
				$this->titulos[7]="Total";
		}


		function Header()
		{
			if(eregi("OC",$this->nrord1) and eregi("OC",$this->nrord2))
			$this->cab->poner_cabecera($this,"LISTADO RESUMEN DE ORDENES DE COMPRAS","l","s");
			elseif(eregi("OC",$this->nrord1) and eregi("OS",$this->nrord2))
			$this->cab->poner_cabecera($this,H::GetPost("titulo")." DE COMPRA Y SERVICIO (Bolivares Fuertes)","l","s");
			elseif(eregi("OS",$this->nrord1) and eregi("OS",$this->nrord2))
			$this->cab->poner_cabecera($this,"LISTADO RESUMEN DE ORDENES DE SERVICIO","l","s");
			else
			$this->cab->poner_cabecera($this,"LISTADO RESUMEN DE ORDENES","l","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);

				$this->ln(-2);
				$this->cell(20,7,$this->titulos[0]);
				$this->cell(80,7,$this->titulos[1]);
				$this->cell(20,7,$this->titulos[2]);
				$this->cell(20,7,$this->titulos[3]);
				$this->cell(50,7,$this->titulos[5]);
				$this->cell(50,7,$this->titulos[4]);
				$this->cell(35,7,$this->titulos[7]);


		//	 $this->ln();

			//$this->Line(10,50,270,50);

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
				 if	($tb2->fields["staord"] == 'A')
				 {
				 $tb2->fields["staord"]="Activa";
				 }
				 else if	($tb2->fields["staord"] == 'N')
				 {
				  $tb2->fields["staord"]="Anulada";
				 }
				 else
				 {
				 $tb2->fields["staord"]="no definida";
				 }


				 $ref=$tb2->fields["aordcom"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","",8);
		 		 $yy=$this->GetY();
		 		 $this->SetAutoPageBreak("false");
				 $this->Line(10,$this->GetY(),270,$this->GetY());

	 $this->SetWidths(array(20,80,20,20,35,50,35));
	 $this->Setaligns(array('C','l','C','C','l','l','R'));
	 $this->Row(array($tb2->fields["aordcom"],trim($tb->fields["adesord"]),$tb2->fields["afecord"], $tb2->fields["staord"],trim($tb->fields["dnomcat"]),trim($tb->fields["enompro"]),H::FormatoMonto($tb->fields["amonord"])));
	 $this->ln();
			}
		while(!$tb->EOF)
			{
				if($tb->fields["aordcom"]!=$ref)
				{

				 $this->acum1=0;
				 $this->acum2=0;
				 $this->acum3=0;
				 $this->acum4=0;
				 $this->acum5=0;

				 $this->SetLineWidth(0.2);
				 $this->Line(10,$this->GetY(),270,$this->GetY());
 				 $yy=$this->GetY();
		 		 $this->SetAutoPageBreak("false");

				  if	($tb->fields["staord"] == 'A')
				 {
				 $tb->fields["staord"]="Activa";
				 }
				 else if	($tb->fields["staord"] == 'N')
				 {
				  $tb->fields["staord"]="Anulada";
				 }
				 else
				 {
				 $tb->fields["staord"]="no definida";
				 }


	 $this->SetWidths(array(20,80,20,20,35,50,35));
	 $this->Setaligns(array('C','l','C','C','l','l','R'));
	 $this->Row(array($tb->fields["aordcom"],trim($tb->fields["adesord"]),$tb->fields["afecord"], $tb->fields["staord"],trim($tb->fields["dnomcat"]),trim($tb->fields["enompro"]),H::FormatoMonto($tb->fields["amonord"])));

				 $this->SetAutoPageBreak("true");
				 $this->ln();

				// $this->SetY($y2+7);
		        }

				$this->setFont("Arial","",8);
					$ref=$tb->fields["aordcom"];
				//Detalle
				$this->acum5=($this->acum5+$tb->fields["btotart"]);
			    $this->acum5t=($this->acum5t+$tb->fields["btotart"]);
							 $tb->MoveNext();
				 if($this->GetY()>=170){
				 	$this->AddPage();
				 }


			 }
			 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","B",8);


		    	 $this->Line(10,$this->GetY(),270,$this->GetY());
 				 $this->SetLineWidth(0.5);
				 $this->ln();

				 $this->cell($this->anchos2[1]+5,5,"TOTAL GENERAL");

				 $this->cell($this->anchos2[9]-8,4,"".H::FormatoMonto($this->acum5t),0,0,'R');

	 		}

	}
?>