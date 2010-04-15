<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $numcom1;
		var $numcom2;
		var $feccom1;
		var $feccom2;
		var $tipcom1;
		var $tipcom2;
		var $stacom;
		var $codpre1;
		var $codpre2;
		var $comodin;
				
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numcau1=$_POST["refcau1"];
			$this->numcau2=$_POST["refcau2"];
			$this->feccau1=$_POST["feccau1"];
			$this->feccau2=$_POST["feccau2"];
			$this->stacom=$_POST["estado"];
			$this->tipcau1=$_POST["tipcau1"];
			$this->tipcau2=$_POST["tipcau2"];
			$this->codpre1=$_POST["codpre1"];
			$this->codpre2=$_POST["codpre2"];
			$this->comodin=$_POST["comodin"];

			if ($this->stacom=="Todos"){
			 $this->sql="SELECT 
							A.REFCAU as referencia,
							A.DESCAU as descripcion,
							A.TIPCAU as tipo,
							to_char(A.FECCAU,'dd/mm/yyyy') as fecha,
							A.MONCAU as monto,
							B.REFERE,
							B.CODPRE as codigo,
							C.NOMPRE as nombre,
							B.MONIMP as imputado,
							B.monpag as pagado,
							B.monaju as ajuste,
							(B.monimp-B.monaju) as mon_aju,
							A.STACAU,
							to_char(A.FECANU,'dd/mm/yyyy') as fecanu,
							D.NOMBEN as beneficiario,
							D.CEDRIF as rif 
			 			FROM CPCAUSAD as A,CPIMPCAU as B, CPDEFTIT as C, OPBENEFI as D 
						WHERE 
							A.REFCAU = B.REFCAU AND 
							A.REFCAU >= RPAD('".$this->numcau1."',8,' ') AND 
							A.REFCAU <= RPAD('".$this->numcau2."',8,' ') AND 
			 				A.FECCAU >=to_date('".$this->feccau1."','dd/mm/yyyy') AND 
							A.FECCAU <=to_date('".$this->feccau2."','dd/mm/yyyy') AND 
							A.TIPCAU >= RPAD('".$this->tipcau1."',4,' ') AND 
							A.TIPCAU<= RPAD('".$this->tipcau2."',4,' ') AND 
							
			 				B.CodPre = C.CodPre  AND 
							A.CEDRIF= D.CEDRIF AND 
							B.CODPRE >=RPAD('".$this->codpre1."',32,' ') AND 
							B.CODPRE<=RPAD('".$this->codpre2."',32,' ') AND 
			 				B.CODPRE LIKE RTRIM('".$this->comodin."') 
						ORDER BY A.FECCAU,A.REFCAU,A.TIPCAU limit 2000";						
						
			}else{
				if($this->stacom=="Activo"){$this->stacom="A";}
				else{ $this->stacom="N";}
				
				 $this->sql="SELECT 
							A.REFCAU as referencia,
							A.DESCAU as descripcion,
							A.TIPCAU as tipo,
							to_char(A.FECCAU,'dd/mm/yyyy') as fecha,
							A.MONCAU as monto,
							B.REFERE,
							B.CODPRE as codigo,
							C.NOMPRE as nombre,
							B.MONIMP as imputado,
							B.monpag as pagado,
							B.monaju as ajuste,
							(B.monimp-B.monaju) as mon_aju,
							A.STACAU,
							to_char(A.FECANU,'dd/mm/yyyy') as fecanu,
							D.NOMBEN as beneficiario,
							D.CEDRIF as rif 
			 			FROM CPCAUSAD as A,CPIMPCAU as B, CPDEFTIT as C, OPBENEFI as D 
						WHERE 
							A.REFCAU = B.REFCAU AND 
							A.REFCAU >= RPAD('".$this->numcau1."',8,' ') AND 
							A.REFCAU <= RPAD('".$this->numcau2."',8,' ') AND 
			 				A.FECCAU >=to_date('".$this->feccau1."','dd/mm/yyyy') AND 
							A.FECCAU <=to_date('".$this->feccau2."','dd/mm/yyyy') AND 
							A.TIPCAU >= RPAD('".$this->tipcau1."',4,' ') AND 
							A.TIPCAU<= RPAD('".$this->tipcau2."',4,' ') AND 
							A.STACAU='".$this->stacom."' AND 
			 				B.CodPre = C.CodPre  AND 
							A.CEDRIF= D.CEDRIF AND 
							B.CODPRE >=RPAD('".$this->codpre1."',32,' ') AND 
							B.CODPRE<=RPAD('".$this->codpre2."',32,' ') AND 
			 				B.CODPRE LIKE RTRIM('".$this->comodin."') 
						ORDER BY A.FECCAU,A.REFCAU,A.TIPCAU limit 2000";
						}			
			//print $this->sql;
			$this->llenartitulosmaestro();
			$this->llenartitulosdetalle();
			
			//
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="REFERENCIA";
				$this->titulos[1]="TIPO";
				$this->titulos[2]="FECHA";
				$this->titulos[3]="DESCRIPCION";
				$this->titulos[4]="BENEFICIARIO";
				$this->anchos[0]=30;
				$this->anchos[1]=30;
				$this->anchos[2]=30;
				$this->anchos[3]=80;
				$this->anchos[4]=80;
				$this->anchos[5]=30;
				$this->anchos[6]=30;
				$this->anchos[7]=30;
				$this->anchos[8]=30;
				$this->anchos[9]=30;
				$this->anchos[10]=30;
				$this->anchos[11]=30;

		}
		function llenartitulosdetalle()
		{
				$this->titulos2[0]="                        Imputaciones Presupuestarias  ";
				$this->titulos2[1]="                     ";
				$this->titulos2[2]="																	Causado";
				$this->titulos2[3]="																			Ajustado";		
				$this->titulos2[4]="																			Monto Ajustado";	
				$this->titulos2[5]="																			Pagado";		
				$this->anchos2[0]=50;
				$this->anchos2[1]=30;
				$this->anchos2[2]=30;
				$this->anchos2[3]=30;
				$this->anchos2[4]=30;
				$this->anchos2[5]=30;
				$this->anchos2[6]=30;
				$this->anchos2[7]=30;
				$this->anchos2[8]=30;
				$this->anchos2[9]=30;
				$this->anchos2[10]=30;
				$this->anchos2[11]=30;

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
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(4); 
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}
			$this->ln(7); 
			$this->Line(10,$this->getY(),270,$this->getY());
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(2); 
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
		    $tb2=$this->bd->select($this->sql);
			$ref="";
			$acum1=0;
			$acum2=0;
			$acum3=0;
			$acum4=0;
			$totacum1=0;
			$totacum2=0;
			$totacum3=0;
			$totacum4=0;
			if(!$tb2->EOF)
			{
				$this->setFont("Arial","B",8); 
				$ref=$tb2->fields["referencia"];
				 $this->cell($this->anchos[0],4,$tb2->fields["referencia"]);
				 $this->cell($this->anchos[1],4,$tb2->fields["tipo"]);
				 $this->cell($this->anchos[2],4,$tb2->fields["fecha"]);
				 $y=$this->GetY();
				 $x=$this->GetX(); 
				 $this->Multicell($this->anchos[3],4,ucfirst(strtolower($tb2->fields["descripcion"])));
				 $this->SetXY($x+$this->anchos[3], $y);
				 $this->Multicell($this->anchos[4],4,$tb2->fields["beneficiario"]);
				 $this->ln(3);
			}
			while(!$tb->EOF)
			{
				if($tb->fields["referencia"]!=$ref)
				{	
				//Totales
				 $this->ln(6);
				 $this->line(100,$this->getY(),220,$this->getY());
				 $this->cell($this->anchos2[0],5,'');
				 $this->cell($this->anchos2[1],5,'');
				 $this->cell($this->anchos2[2],5,number_format($acum1,2,'.',','),0,0,'R');
				 $totacum1=$totacum1+$acum1;
				 $this->cell($this->anchos2[3],5,number_format($acum2,2,'.',','),0,0,'R');
				 $totacum2=$totacum2+$acum2;
				 $this->cell($this->anchos2[4],5,number_format($acum3,2,'.',','),0,0,'R');
				 $totacum3=$totacum3+$acum3;
				 $this->cell($this->anchos2[5],5,number_format($acum4,2,'.',','),0,0,'R');
				 $totacum4=$totacum4+$acum4;
				 $acum1=0;
				 $acum2=0;
				 $acum3=0;
				 $acum4=0;
				//
				$this->ln(10);
				$this->setFont("Arial","B",8); 
				 $this->cell($this->anchos[0],4,$tb->fields["referencia"]);
				 $this->cell($this->anchos[1],4,$tb->fields["tipo"]);
				 $this->cell($this->anchos[2],4,$tb->fields["fecha"]);
				 $y=$this->GetY();
				 $x=$this->GetX();
				 $this->MultiCell($this->anchos[3],4,ucfirst(strtolower($tb->fields["descripcion"])));
				 $y1=$this->getY();
				 $this->SetXY($x+$this->anchos[3], $y);
				 $this->MultiCell($this->anchos[4],4,$tb->fields["beneficiario"]);
				 $y2=$this->getY();	
				 if ($y1>$y2){$this->SetY($y1);}
				 else {$this->SetY($y2);}
				 $this->ln(3);
		        }
				$ref=$tb->fields["referencia"];
				$this->setFont("Arial","",8);
				//Detalle
				$this->cell($this->anchos2[0],4,$tb->fields["codigo"]);
				$x = $this->GetX();
				$this->Cell($this->anchos2[1]);
				$this->cell($this->anchos2[2],10,number_format($tb->fields["imputado"],2,'.',','),0,0,'R');
				$acum1=$acum1+$tb->fields["imputado"];
				$t=$this->bd->select("SELECT coalesce(SUM(B.MONAJU),0) as SALDOAJU 
    								  FROM CPAJUSTE A,CPMOVAJU B,CPDOCAJU C
   									  WHERE A.REFAJU=B.REFAJU AND
         							  A.REFERE='".$tb->fields["referencia"]."' AND 
         							  B.REFCOM='".$tb->fields["refere"]."' AND 
         							  A.FECAJU>=to_date('".$this->feccau1."','dd/mm/yyyy') AND
         							  A.FECAJU<=to_date('".$this->feccau2."','dd/mm/yyyy') AND
         							 (A.STAAJU='A' OR (A.STAAJU='N' AND A.FECANU>to_date('".$this->feccau2."','dd/mm/yyyy'))) AND
         							  A.TIPAJU=C.TIPAJU AND
         							  C.REFIER='A' AND
         							  B.CODPRE=RPAD('".$tb->fields["codigo"]."',32,' ')");
				if(!$t->EOF)
				{
					$saldoAjustado=$t->fields["saldoaju"];
				}					  
				$this->cell($this->anchos2[3],10,number_format($saldoAjustado,2,'.',','),0,0,'R');
				$acum2=$acum2+($saldoAjustado);
				$this->cell($this->anchos2[4],10,number_format(($tb->fields["imputado"]-$saldoAjustado),2,'.',','),0,0,'R');
				$acum3=$acum3+($tb->fields["imputado"]-$saldoAjustado);
				$p=$this->bd->select("SELECT coalesce(SUM(B.MONIMP),0) as SALDOPAG FROM CPPAGOS A,CPIMPPAG B
   									  WHERE A.REFPAG=B.REFPAG AND
         							  B.REFERE='".$tb->fields["referencia"]."' AND
         							  B.REFCOM='".$tb->fields["refere"]."' AND
         							  A.FECPAG<=to_date('".$this->feccau1."','dd/mm/yyyy') AND
         							  A.FECPAG>=to_date('".$this->feccau2."','dd/mm/yyyy') AND
        							 (A.staPag='A' Or (A.StaPag='N' And FecAnu>to_date('".$this->feccau2."','dd/mm/yyyy'))) And
         							  B.CODPRE=RPAD('".$tb->fields["codigo"]."',32,' ')");
				if(!$p->EOF)
				{
					$saldpag=$p->fields["saldopag"];
				}
				$tsql="SELECT coalesce(SUM(B.MONAJU),0) as AJUSTEPAG 
    									FROM CPAJUSTE A,CPMOVAJU B,CPIMPPAG C,CPDOCAJU D
   										WHERE A.REFAJU=B.REFAJU AND
         								C.REFPAG=A.REFERE AND
         								C.REFERE=B.REFCAU AND
         								C.REFCOM=B.REFCOM AND
         								C.REFERE='".$tb->fields["referencia"]."' AND
         								C.REFCOM='".$tb->fields["refere"]."' AND
         								C.CODPRE=B.CODPRE AND  
         								D.TIPAJU=A.TIPAJU AND
         								D.REFIER='G' AND
         								A.FECAJU>=to_date('".$this->feccau1."','dd/mm/yyyy') AND 
         								A.FECAJU<=to_date('".$this->feccau2."','dd/mm/yyyy') AND
        								(A.STAAJU='A' OR (A.STAAJU='N' AND FECANU>to_date('".$this->feccau2."','dd/mm/yyyy'))) AND
         								B.CODPRE=RPAD('".$tb->fields["codigo"]."',32,' ')";
				$r=$this->bd->select($tsql);
				if(!$r->EOF)
				{
					$ajustepag=$r->fields["ajustepag"];
				}
				$this->cell($this->anchos2[5],10,number_format(abs($saldpag-$ajustepag),2,'.',','),0,0,'R');
				$this->SetX($x);
				$this->MultiCell($this->anchos2[1],4,$tb->fields["nombre"]);



				$acum4=$acum4+(abs($saldpag-$ajustepag));
				$tb->MoveNext();
			    $this->ln(3);
			}	
				//Totales
				 $this->ln(6);
				 $this->line(100,$this->getY(),220,$this->getY());
				 $this->cell($this->anchos2[0],5,'');
				 $this->cell($this->anchos2[1],5,'');
				 $this->cell($this->anchos2[2],5,number_format($acum1,2,'.',','),0,0,'R');
				 $totacum1=$totacum1+$acum1;
				 $this->cell($this->anchos2[3],5,number_format($acum2,2,'.',','),0,0,'R');
				 $totacum2=$totacum2+$acum2;
				 $this->cell($this->anchos2[4],5,number_format($acum3,2,'.',','),0,0,'R');
				 $totacum3=$totacum3+$acum3;
				 $this->cell($this->anchos2[5],5,number_format($acum4,2,'.',','),0,0,'R');
				 $totacum4=$totacum4+$acum4;
				 $acum1=0;
				 $acum2=0;
				 $acum3=0;
				 $acum4=0;
				//
				$this->ln(5);
				 $this->line(100,$this->getY(),220,$this->getY());
				 $this->cell($this->anchos2[0],5,'TOTALES');
				 $this->cell($this->anchos2[1],5,'');
				 $this->cell($this->anchos2[2],5,number_format($totacum1,2,'.',','),0,0,'R');
				 $this->cell($this->anchos2[3],5,number_format($totacum2,2,'.',','),0,0,'R');
				 $this->cell($this->anchos2[4],5,number_format($totacum3,2,'.',','),0,0,'R');
				 $this->cell($this->anchos2[5],5,number_format($totacum4,2,'.',','),0,0,'R');				 
		}
	}
?>