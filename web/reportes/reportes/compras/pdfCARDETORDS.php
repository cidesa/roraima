<?
	require_once("../../lib/general/fpdf/fpdf.php");
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
						
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->nrord1=$_POST["nrord1"];
			$this->nrord2=$_POST["nrord2"];
			$this->codart1=$_POST["codart1"];
			$this->codart2=$_POST["codart2"];
			$this->codpro1=$_POST["codpro1"];
			$this->codpro2=$_POST["codpro2"];						
			$this->fecreg1=$_POST["fecreg1"];
			$this->fecreg2=$_POST["fecreg2"];
			$this->status=$_POST["status"];

				if ($this->status=='t')
				{									
						
				$this->sql= "SELECT A.ORDCOM as aordcom, to_char(A.FECORD,'DD/MM/YYYY') as afecord,
							A.CODPRO as acodpro, E.NOMPRO as enompro, E.RIFPRO as erifpro, B.CODCAT as bcodcat, D.NOMCAT as dnomcat, A.DESORD as adesord,
							A.CRECON as acrecon, A.PLAENT as aplaent, A.TIECAN as atiecan, A.MONORD as amonord, 
							A.STAORD as staord, B.CODART as bcodart, B.CANORD as bcanord, B.CANAJU as bcanaju, B.CANREC as bcanrec,
							B.CANTOT as bcantot, B.PREART as bpreart, (B.PREART*B.CANTOT) as totpre, B.DTOART as bdtoart, B.RGOART as brgoart,
							B.TOTART as btotart, B.DESART as bdesart FROM CAORDCOM A, CAARTORD B, CAREGART C, NPCATPRE D, CAPROVEE E WHERE
							A.ORDCOM LIKE 'os%' AND (A.ORDCOM) = (B.ORDCOM) AND (A.CODPRO) = (E.CODPRO) AND
							(B.CODCAT) = (D.CODCAT) AND (B.CODART) = (C.CODART) AND
							RTRIM(A.ORDCOM) >= RTRIM('".$this->nrord1."') AND RTRIM(A.ORDCOM) <= RTRIM('".$this->nrord2."') AND
							RTRIM(E.NOMPRO) >= RTRIM('".$this->codpro1."') AND RTRIM(E.NOMPRO) <= RTRIM('".$this->codpro2."') AND
							RTRIM(B.CODART) >= RTRIM('".$this->codart1."') AND RTRIM(B.CODART) <= RTRIM('".$this->codart2."') AND							
							A.FECORD >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.FECORD <= to_date('".$this->fecreg2."','dd/mm/yyyy')														
							ORDER BY RTRIM(A.ORDCOM)";
			}
		else
			{
				$this->sql= "SELECT A.ORDCOM as aordcom, to_char(A.FECORD,'DD/MM/YYYY') as afecord,
							A.CODPRO as acodpro, E.NOMPRO as enompro, E.RIFPRO as erifpro, B.CODCAT as bcodcat, D.NOMCAT as dnomcat, A.DESORD as adesord,
							A.CRECON as acrecon, A.PLAENT as aplaent, A.TIECAN as atiecan, A.MONORD as amonord, 
							A.STAORD as staord, B.CODART as bcodart, B.CANORD as bcanord, B.CANAJU as bcanaju, B.CANREC as bcanrec,
							B.CANTOT as bcantot, B.PREART as bpreart, (B.PREART*B.CANTOT) as totpre, B.DTOART as bdtoart, B.RGOART as brgoart,
							B.TOTART as btotart, B.DESART as bdesart FROM CAORDCOM A, CAARTORD B, CAREGART C, NPCATPRE D, CAPROVEE E WHERE
							A.ORDCOM LIKE 'os%' AND (A.ORDCOM) = (B.ORDCOM) AND (A.CODPRO) = (E.CODPRO) AND
							(B.CODCAT) = (D.CODCAT) AND (B.CODART) = (C.CODART) AND
							RTRIM(A.ORDCOM) >= RTRIM('".$this->nrord1."') AND RTRIM(A.ORDCOM) <= RTRIM('".$this->nrord2."') AND
							RTRIM(E.NOMPRO) >= RTRIM('".$this->codpro1."') AND RTRIM(E.NOMPRO) <= RTRIM('".$this->codpro2."') AND
							RTRIM(B.CODART) >= RTRIM('".$this->codart1."') AND RTRIM(B.CODART) <= RTRIM('".$this->codart2."') AND							
							A.FECORD >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.FECORD <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND														
							A.STAORD = '".$this->status."' ORDER BY RTRIM(A.ORDCOM)";
							
			 }
		
			$this->llenartitulosmaestro();
			$this->llenartitulos2();			
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);			
		
		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="Nro Orden";
				$this->titulos[1]="Descripción Orden";
				$this->titulos[2]="Fecha";
				$this->titulos[3]="Status";
				$this->titulos[4]="Proveedor";
				$this->titulos[5]="Unidad Solicitante";
				$this->titulos[6]="";				
				$this->titulos[7]="Plazo Entrega";																
		}
		
	function llenartitulos2()
		{
				$this->titulos2[0]="Código Artículo";
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
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
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
			$tb2=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["aordcom"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","",8); 
				 $this->Line(10,$this->GetY(),270,$this->GetY());				 
				 $this->cell($this->anchos[0],5," ".$tb2->fields["aordcom"]);
				 $this->cell($this->anchos[1],5," ".substr($tb->fields["adesord"],0,35));
				 $this->cell($this->anchos[2],5," ".$tb2->fields["afecord"]);
				 if	($tb2->fields["staord"] == 'a')
				 {
				 $this->cell($this->anchos[3],5,"Activas");				 				 
				 }			 
				 if	($tb2->fields["staord"] == 'n')
				 {
				 $this->cell($this->anchos[3],5,"Anuladas");				 				 
				 }
				 $this->cell($this->anchos[4],5," ".$tb2->fields["acodpro"]);
				 $this->cell($this->anchos[5],5," ".substr($tb->fields["dnomcat"],0,30));
				 $this->cell($this->anchos[6],5," ");				 
//-----------------------sql3--------------------------				 
				 $this->sql3="SELECT A.DESFORENT as desforent FROM CAFORENT A, CAORDFORENT B WHERE 
				 B.ORDCOM='".$tb2->fields["aordcom"]."' AND (B.CODFORENT = A.CODFORENT)";
				 $tb2c=$this->bd->select($this->sql3);				 
				 $this->cell($this->anchos[7],5," ".$tb2c->fields["desforent"]);
//-----------------------fin--------------------------				 
				 $this->ln();
				 $this->ln();				 				 
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
				 $this->cell($this->anchos2[0],5,"");
				 $this->cell($this->anchos2[1],5,"");
				 $this->cell($this->anchos2[2],5,"".number_format($this->acum1,2,'.',','));
				 $this->cell($this->anchos2[3],5,"".number_format($this->acum2,2,'.',','));
				 $this->cell($this->anchos2[4],5,"".number_format($this->acum3,2,'.',','));
				 $this->cell($this->anchos2[5],5,"".number_format($this->acum4,2,'.',','));
				 $this->cell($this->anchos2[6],5,"");
				 $this->cell($this->anchos2[7],5,"");
				 $this->cell($this->anchos2[8],5,"");				 				 				 
				 $this->cell($this->anchos2[9],5,"".number_format($this->acum5,2,'.',','));
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
				 $this->cell($this->anchos[0],5," ".$tb->fields["aordcom"]);
				 $this->cell($this->anchos[1],5," ".substr($tb->fields["adesord"],0,35));
				 $this->cell($this->anchos[2],5," ".$tb->fields["afecord"]);
				 if	($tb->fields["staord"] == 'a')
				 {
				 $this->cell($this->anchos[3],5,"Activas");				 				 
				 }			 
				 if	($tb->fields["staord"] == 'n')
				 {
				 $this->cell($this->anchos[3],5,"Anuladas");				 				 
				 }
				 $this->cell($this->anchos[4],5," ".$tb->fields["acodpro"]);
				 $this->cell($this->anchos[5],5," ".substr($tb->fields["dnomcat"],0,30));
				 $this->cell($this->anchos[6],5," ");				 
//-----------------------sql2--------------------------
//-----------------------sql3--------------------------				 
				 $this->sql3="SELECT A.DESFORENT as desforent FROM CAFORENT A, CAORDFORENT B WHERE 
				 B.ORDCOM='".$tb->fields["aordcom"]."' AND (B.CODFORENT = A.CODFORENT)";
				 $tb2c=$this->bd->select($this->sql3);				 
				 $this->cell($this->anchos[7],5," ".$tb2c->fields["desforent"]);
//-----------------------fin--------------------------				 
				 $this->ln();
				 $this->ln();				 				 
				 
		        }
				$this->setFont("Arial","",8);
				//Detalle
				 $this->cell($this->anchos2[0],5,"".$tb->fields["bcodart"]);
				 $this->cell($this->anchos2[1],5,"".substr($tb->fields["bdesart"],0,30));
				 $this->cell($this->anchos2[2],5,"".number_format($tb->fields["bcanord"],2,'.',','));
				 $this->cell($this->anchos2[3],5,"".number_format($tb->fields["bcanaju"],2,'.',','));
				 $this->cell($this->anchos2[4],5,"".number_format($tb->fields["bcanrec"],2,'.',','));				 				 				 
				 $this->cell($this->anchos2[5],5,"".number_format($tb->fields["bcantot"],2,'.',','));				 				 				 				 
				 $this->cell($this->anchos2[6],5,"".number_format($tb->fields["bpreart"],2,'.',','));
				 $this->cell($this->anchos2[7],5,"".number_format($tb->fields["bdtoart"],2,'.',','));
				 $this->cell($this->anchos2[8],5,"".number_format($tb->fields["brgoart"],2,'.',','));
				 $this->cell($this->anchos2[9],5,"".number_format($tb->fields["totpre"],2,'.',','));				 				 				 				 				 				 				 
				 $this->acum1=($this->acum1+$tb->fields["bcanord"]);
				 $this->acum2=($this->acum2+$tb->fields["bcanaju"]);
				 $this->acum3=($this->acum3+$tb->fields["bcanrec"]);
				 $this->acum4=($this->acum4+$tb->fields["bcantot"]);
				 $this->acum5=($this->acum5+$tb->fields["totpre"]);				 				 				 				 
				 $this->acum1t=($this->acum1t+$tb->fields["bcanord"]);
				 $this->acum2t=($this->acum2t+$tb->fields["bcanaju"]);
				 $this->acum3t=($this->acum3t+$tb->fields["bcanrec"]);
				 $this->acum4t=($this->acum4t+$tb->fields["bcantot"]);
				 $this->acum5t=($this->acum5t+$tb->fields["totpre"]);				 
				 $this->ln();
				 $tb->MoveNext();
		
		 
			 }
			 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","B",8); 
		    	 $this->Line(60,$this->GetY(),270,$this->GetY());				 
				 $this->cell($this->anchos2[0],5,"");
				 $this->cell($this->anchos2[1],5,"TOTAL ORDEN");
				 $this->cell($this->anchos2[2],5,"".number_format($this->acum1,2,'.',','));
				 $this->cell($this->anchos2[3],5,"".number_format($this->acum2,2,'.',','));
				 $this->cell($this->anchos2[4],5,"".number_format($this->acum3,2,'.',','));
				 $this->cell($this->anchos2[5],5,"".number_format($this->acum4,2,'.',','));
				 $this->cell($this->anchos2[6],5,"");
				 $this->cell($this->anchos2[7],5,"");
				 $this->cell($this->anchos2[8],5,"");				 				 				 
				 $this->cell($this->anchos2[9],5,"".number_format($this->acum5,2,'.',','));				 				 
				 $this->ln();				 
		    	 $this->Line(10,$this->GetY(),270,$this->GetY());				 
 				 $this->SetLineWidth(0.5);
				 $this->ln();				 			 
				 $this->cell($this->anchos2[0],4,"");
				 $this->cell($this->anchos2[1],5,"TOTALES");				 
				 $this->cell($this->anchos2[2],4,"".number_format($this->acum1t,2,'.',','));	
				 $this->cell($this->anchos2[3],4,"".number_format($this->acum2t,2,'.',','));
				 $this->cell($this->anchos2[4],4,"".number_format($this->acum3t,2,'.',','));
				 $this->cell($this->anchos2[5],4,"".number_format($this->acum4t,2,'.',','));
				 $this->cell($this->anchos2[6],4,"");
				 $this->cell($this->anchos2[7],4,"");
				 $this->cell($this->anchos2[8],4,"");				 				 				 
				 $this->cell($this->anchos2[9],4,"".number_format($this->acum5t,2,'.',','));				 				 

	 		}

	}
?>