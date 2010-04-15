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
		var $bendesde;
		var $benhasta;
				
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numcom1=$_POST["numcom1"];
			$this->numcom2=$_POST["numcom2"];
			$this->feccom1=$_POST["feccom1"];
			$this->feccom2=$_POST["feccom2"];
			$this->stacom=$_POST["estado"];
			$this->tipcom1=$_POST["tipcom1"];
			$this->tipcom2=$_POST["tipcom2"];
			$this->codpre1=$_POST["codpre1"];
			$this->codpre2=$_POST["codpre2"];
			$this->comodin=$_POST["comodin"];
			$this->bendesde=$_POST["bendes"];
			$this->benhasta=$_POST["benhas"];
			
			
			if($this->stacom=="Todos"){
			$this->sql="SELECT A.refcom as referencia,
							A.tipcom as tipo,
							to_char(A.feccom,'dd/mm/yyyy') as fecha,
							A.CEDRIF,
							(CASE WHEN A.STACOM='A' THEN 'Activo' WHEN A.STACOM='N' THEN 'Anulado' ELSE '' END) as STATUS2,
							A.FECANU,
							a.stacom,
							substr(RTRIM(A.descom),1,50) as descripcion,
							RTRIM(B.CodPre ) as codigo,
							substr(RTRIM(C.NomPre),1,45) as nombre,
							B.monimp as imputado,
							B.moncau,
							B.monpag,
							B.monaju as ajuste,
							(B.monimp-B.monaju) as mon_aju,
							substr(D.NOMBEN,1,50) as beneficiario,
							D.cedrif as cedben 
						FROM CPCOMPRO A,CPIMPCOM B, CPDEFTIT C, OPBENEFI D
						WHERE 
							A.REFCOM = B.REFCOM AND
               				B.CodPre = C.CodPre  AND 
							D.CEDRIF=A.CEDRIF AND 
               				((A.REFCOM)>=RPAD('".$this->numcom1."',8,' ')  AND
                			(A.REFCOM) <=RPAD('".$this->numcom2."',8,' ') ) AND
               				(A.FECCOM>=to_date('".$this->feccom1."','dd/mm/yyyy') AND
               				A.FECCOM<=to_date('".$this->feccom2."','dd/mm/yyyy')) AND 
               				((B.CODPRE) >=RPAD('".$this->codpre1."',32,' ') AND 
                			(B.CODPRE) <=RPAD('".$this->codpre2."',32,' ')) AND
               				((A.TIPCOM) >= RPAD('".$this->tipcom1."',4,' ') AND
                			(A.TIPCOM) <= RPAD('".$this->tipcom2."',4,' ')) AND
							trim(A.CEDRIF) >=trim('".$this->bendesde."') AND 
                			trim(A.CEDRIF) <=trim('".$this->benhasta."') AND
               				 B.CODPRE LIKE RTRIM('".$this->comodin."') 
						ORDER BY D.cedrif,A.REFCOM,A.FECCOM,B.CODPRE,A.TIPCOM ";								
			
			}else{
			if($this->stacom=="Activo"){$this->stacom="A";}
			else{ $this->stacom="N";}
			$this->sql="SELECT A.refcom as referencia,
							A.tipcom as tipo,
							to_char(A.feccom,'dd/mm/yyyy') as fecha,
							A.CEDRIF,
							(CASE WHEN A.STACOM='A' THEN 'Activo' WHEN A.STACOM='N' THEN 'Anulado' ELSE '' END) as STATUS2,
							A.FECANU,
							a.stacom,
							substr(RTRIM(A.descom),1,50) as descripcion,
							RTRIM(B.CodPre ) as codigo,
							substr(RTRIM(C.NomPre),1,45) as nombre,
							B.monimp as imputado,
							B.moncau,
							B.monpag,
							B.monaju as ajuste,
							(B.monimp-B.monaju) as mon_aju,
							substr(D.NOMBEN,1,50) as beneficiario,
							D.cedrif as cedben
						FROM CPCOMPRO A,CPIMPCOM B, CPDEFTIT C, OPBENEFI D
						WHERE 
							A.REFCOM = B.REFCOM AND
               				B.CodPre = C.CodPre  AND 
							D.CEDRIF=A.CEDRIF AND 
               				((A.REFCOM)>=RPAD('".$this->numcom1."',8,' ')  AND
                			(A.REFCOM) <=RPAD('".$this->numcom2."',8,' ') ) AND
               				(A.FECCOM>=to_date('".$this->feccom1."','dd/mm/yyyy') AND
               				A.FECCOM<=to_date('".$this->feccom2."','dd/mm/yyyy')) AND 
               				((B.CODPRE) >=RPAD('".$this->codpre1."',32,' ') AND 
                			(B.CODPRE) <=RPAD('".$this->codpre2."',32,' ')) AND
               				((A.TIPCOM) >= RPAD('".$this->tipcom1."',4,' ') AND
                			(A.TIPCOM) <= RPAD('".$this->tipcom2."',4,' ')) AND
							A.STACOM='".$this->stacom."' AND 
							trim(A.CEDRIF) >=trim('".$this->bendesde."') AND 
                			trim(A.CEDRIF) <=trim('".$this->benhasta."') AND
               				 B.CODPRE LIKE RTRIM('".$this->comodin."')
						ORDER BY D.cedrif,A.REFCOM,A.FECCOM,B.CODPRE,A.TIPCOM";		
					}
			//print $this->sql;	
			$this->llenartitulosmaestro();
			$this->llenartitulosdetalle();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="REFERENCIA";
				$this->titulos[1]="TIPO";
				$this->titulos[2]="FECHA";
				$this->titulos[3]="DESCRIPCION";
			//	$this->titulos[4]="BENEFICIARIO";
				$this->anchos[0]=25;
				$this->anchos[1]=15;
				$this->anchos[2]=20;
				$this->anchos[3]=100;
				$this->anchos[4]=80;
				$this->anchos[5]=30;
				$this->anchos[6]=30;
			}
		function llenartitulosdetalle()
		{
				$this->titulos2[0]="				Imputaciones Presupuestarias";
				$this->titulos2[1]="				";
				$this->titulos2[2]="Comprometido";
				$this->titulos2[3]="Ajustado";
				$this->titulos2[4]="Monto Ajustado";		
				$this->titulos2[5]="Causado";	
				$this->titulos2[6]="Pagado";		
				$this->anchos2[0]=43;
				$this->anchos2[1]=80;
				$this->anchos2[2]=30;
				$this->anchos2[3]=30;
				$this->anchos2[4]=30;
				$this->anchos2[5]=30;
				$this->anchos2[6]=30;
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$this->cell(270,5,'Del '.$this->feccom1.' Al '.$this->feccom2,0,0,'C');
			$this->ln(5);
			$this->Line(10,$this->getY(),270,$this->getY());
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			$this->cell(30,10,"BENEFICIARIO");
			$this->ln(5); 
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(5); 
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}
			$this->ln(8); 
			$this->Line(10,$this->getY(),270,$this->getY());
			$this->ln(5); 
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
			$acum5=0;
			$totacum1=0;
			$totacum2=0;
			$totacum3=0;
			$totacum4=0;
			$totacum5=0;
			$acumBen1=0;
			$acumBen2=0;
			$acumBen3=0;
			$acumBen4=0;
			$acumBen5=0;
			$totacumBen1=0;
			$totacumBen2=0;
			$totacumBen3=0;
			$totacumBen4=0;
			$totacumBen5=0;
			if(!$tb2->EOF)
			{
				$this->setFont("Arial","B",8); 
				$ref=$tb2->fields["referencia"];				
				$ben=trim($tb2->fields["cedben"]);
				 $this->setFont("Arial","B",9); 
				 $this->cell($this->anchos[4],10,$tb2->fields["beneficiario"]);
 				 $this->ln(5);
				  $this->setFont("Arial","B",8); 
				 $this->cell($this->anchos[0],10,$tb2->fields["referencia"]);
				 $this->cell($this->anchos[1],10,$tb2->fields["tipo"]);
				 $this->cell($this->anchos[2],10,$tb2->fields["fecha"]);
				 $this->cell($this->anchos[3],10,$tb2->fields["descripcion"]);				
				 $this->ln(3);
			}
			while(!$tb->EOF)
			{			
			 $this->setFont("Arial","B",8); 
				if($tb->fields["referencia"]!=$ref)
				{	
				//Totales
				 $this->ln(6);
				 $this->line(100,$this->getY(),270,$this->getY());
				 $this->cell($this->anchos2[0],5,'');
				 $this->cell($this->anchos2[1],5,'');
				 $this->cell($this->anchos2[2],5,number_format($acum1,2,'.',','));
				 $totacum1=$totacum1+$acum1;
				 $this->cell($this->anchos2[3],5,number_format($acum2,2,'.',','));
				 $totacum2=$totacum2+$acum2;
				 $this->cell($this->anchos2[4],5,number_format($acum3,2,'.',','));
				 $totacum3=$totacum3+$acum3;
				 $this->cell($this->anchos2[5],5,number_format($acum4,2,'.',','));
				 $totacum4=$totacum4+$acum4;
				 $this->cell($this->anchos2[6],5,number_format($acum5,2,'.',','));
				 $totacum5=$totacum5+$acum5;
				 $acum1=0;
				 $acum2=0;
				 $acum3=0;
				 $acum4=0;
				 $acum5=0;
				//
				$ref=$tb->fields["referencia"];
				if(trim($tb->fields["cedben"])!=trim($ben))
				{	
				//Totales
				 $this->setFont("Arial","B",8); 
				 $this->ln(6);
				 $this->line(100,$this->getY(),270,$this->getY());
				 $this->cell($this->anchos2[0],5,'TOTALES POR BENEFICIARIO');
				 $this->cell($this->anchos2[1],5,'');
				 $this->cell($this->anchos2[2],5,number_format($acumBen1,2,'.',','));
				 $totacumBen1=$totacumBen1+$acumBen1;
				 $this->cell($this->anchos2[3],5,number_format($acumBen2,2,'.',','));
				 $totacumBen2=$totacumBen2+$acumBen2;
				 $this->cell($this->anchos2[4],5,number_format($acumBen3,2,'.',','));
				 $totacumBen3=$totacumBen3+$acumBen3;
				 $this->cell($this->anchos2[5],5,number_format($acumBen4,2,'.',','));
				 $totacumBen4=$totacumBen4+$acumBen3;
				 $this->cell($this->anchos2[6],5,number_format($acumBen5,2,'.',','));
				 $totacumBen5=$totacumBen5+$acumBen5;
				 $acumBen1=0;
				 $acumBen2=0;
				 $acumBen3=0;
				 $acumBen4=0;
				 $acumBen5=0;
				//
				 $this->ln(5);
				 if ($this->getY()>170 )
				 {
				   $this->Addpage();
				 }
				 $this->setFont("Arial","B",9); 
				 $this->cell($this->anchos[4],10,$tb->fields["beneficiario"]);
				 $this->ln(5);
		        }
            	$ben=$tb->fields["cedben"];
              ///
				$this->ln(5);
				$this->setFont("Arial","B",8); 
				if ($this->getY()>170 )
				 {
				   $this->Addpage();
				 }
				 $this->cell($this->anchos[0],10,$tb->fields["referencia"]);
				 $this->cell($this->anchos[1],10,$tb->fields["tipo"]);
				 $this->cell($this->anchos[2],10,$tb->fields["fecha"]);
				 $this->cell($this->anchos[3],10,$tb->fields["descripcion"]);
//				 $this->cell($this->anchos[4],10,$tb->fields["beneficiario"]);
				 $this->ln(3);
		        }
			    
				$this->setFont("Arial","",8);
				//Detalle
				$this->cell($this->anchos2[0],10,$tb->fields["codigo"]);
				$this->cell($this->anchos2[1],10,$tb->fields["nombre"]);
				$this->cell($this->anchos2[2],10,number_format($tb->fields["imputado"],2,'.',','));
				$acum1=$acum1+$tb->fields["imputado"];
				$acumBen1=$acumBen1+$tb->fields["imputado"];
				$t=$this->bd->select("SELECT coalesce(SUM(B.MONAJU),0) as SALDOAJU 
										FROM CPAJUSTE A,CPMOVAJU B,CPDOCAJU C
   										WHERE A.REFAJU=B.REFAJU AND
         								A.REFERE='".$tb->fields["referencia"]."' AND  
         								A.FECAJU>=to_date('".$this->feccom1."','dd/mm/yyyy') AND
         								A.FECAJU<=to_date('".$this->feccom2."','dd/mm/yyyy') AND
         								(A.STAAJU='A' OR (A.STAAJU='N' AND A.FECANU>to_date('".$this->feccom2."','dd/mm/yyyy'))) AND
         								A.TIPAJU=C.TIPAJU AND
         								C.REFIER='C' AND
         								B.CODPRE=RPAD('".$tb->fields["codigo"]."',32,' ')");
				if(!$t->EOF)
				{
					$saldoAjustado=$t->fields["saldoaju"];
				}					  
				$this->cell($this->anchos2[3],10,number_format($saldoAjustado,2,'.',','));
				$acum2=$acum2+($saldoAjustado);
				$acumBen2=$acumBen2+($saldoAjustado);
				$this->cell($this->anchos2[4],10,number_format(($tb->fields["imputado"]-$saldoAjustado),2,'.',','));
				$acum3=$acum3+($tb->fields["imputado"]-$saldoAjustado);
				$acumBen3=$acumBen3+($tb->fields["imputado"]-$saldoAjustado);
				$p=$this->bd->select("SELECT coalesce(SUM(B.MONIMP),0) as SALDOCAU 
										FROM CPCAUSAD A,CPIMPCAU B
   										WHERE A.REFCAU=B.REFCAU AND
         								B.REFERE='".$tb->fields["referencia"]."' AND  
         								A.FECCAU>=to_date('".$this->feccom1."','dd/mm/yyyy') AND
         								A.FECCAU<=to_date('".$this->feccom2."','dd/mm/yyyy') AND
        								(A.stacau='A' Or (A.StaCau='N' And FecAnu>to_date('".$this->feccom2."','dd/mm/yyyy'))) And
         								B.CODPRE=RPAD('".$tb->fields["codigo"]."',32,' ')");
				if(!$p->EOF)
				{
					$saldcau=$p->fields["saldocau"];
				}
				$aj=$this->bd->select("SELECT coalesce(SUM(D.MONAJU),0) as AJUSTECAU 
    								  FROM CPIMPCAU A,CPCAUSAD B,CPAJUSTE C,CPMOVAJU D,CPDOCAJU E
    								  WHERE A.REFCAU=B.REFCAU AND
    								  A.REFCAU=C.REFERE AND   
    			 					  A.REFERE=D.REFCOM AND 
    								  A.REFERE='".$tb->fields["referencia"]."' AND  
    								  C.REFAJU=D.REFAJU AND
         							  A.CODPRE=D.CODPRE and
	        						  E.TIPAJU=C.TIPAJU AND
          							  E.REFIER='A' AND
          							  C.FECAJU>=to_date('".$this->feccom1."','dd/mm/yyyy') AND 
          							  C.FECAJU<=to_date('".$this->feccom2."','dd/mm/yyyy') AND
         							 (C.STAAJU='A' OR (C.STAAJU='N' AND C.FECANU>to_date('".$this->feccom2."','dd/mm/yyyy'))) AND
         							  D.CODPRE=RPAD('".$tb->fields["codigo"]."',32,' ') AND
          							  B.FECCAU<=to_date('".$this->feccom2."','dd/mm/yyyy') AND 
   									 ((A.STAIMP)='A' OR ((A.STAIMP)='N' AND B.FECANU>to_date('".$this->feccom2."','dd/mm/yyyy')))");
				if(!$aj->EOF)
				{
					$ajucau=$aj->fields["ajustecau"];
				}
				$this->cell($this->anchos2[5],10,number_format(abs($saldcau-$ajucau),2,'.',','));
				$acum4=$acum4+(abs($saldcau-$ajucau));
				$acumBen4=$acumBen4+(abs($saldcau-$ajucau));
				$b=$this->bd->select("SELECT coalesce(SUM(B.MONIMP),0) as SALDOPAG 
										FROM CPPAGOS A,CPIMPPAG B
   										WHERE A.REFPAG=B.REFPAG AND
         								B.REFCOM='".$tb->fields["referencia"]."' AND  
         								A.FECPAG<=to_date('".$this->feccom2."','dd/mm/yyyy') AND
         								A.FECPAG>=to_date('".$this->feccom1."','dd/mm/yyyy') AND
        								(B.staIMP='A' Or (b.staimp='N' And A.FecAnu>to_date('".$this->feccom2."','dd/mm/yyyy'))) And B.CODPRE=RPAD('".$tb->fields["codigo"]."',32,' ')");
				if(!$b->EOF)
				{
					$saldpag=$b->fields["saldopag"];
				}
				$tsql="SELECT coalesce(SUM(D.MONAJU),0) as AJUSTEPAG 
    					 FROM CPIMPPAG A,CPPAGOS B, CPAJUSTE C,CPMOVAJU D,CPDOCAJU E
   						 WHERE A.REFPAG=B.REFPAG AND
   			 			 A.REFPAG=C.REFERE AND
   			 			 A.REFCOM=D.REFCOM AND
   			   			 A.REFCOM='".$tb->fields["referencia"]."' AND  
   			  			 C.REFAJU=D.REFAJU AND
   			 			 A.REFERE=D.REFCAU AND      
         				 D.CODPRE=A.CODPRE AND   
         				 E.TIPAJU=C.TIPAJU AND
         				 E.REFIER='G' AND
         				 C.FECAJU>=to_date('".$this->feccom1."','dd/mm/yyyy') AND 
         				 C.FECAJU<=to_date('".$this->feccom2."','dd/mm/yyyy') AND
        				 (C.STAAJU='A' OR (C.STAAJU='N' AND C.FECANU>to_date('".$this->feccom2."','dd/mm/yyyy'))) AND
         				 D.CODPRE=RPAD('".$tb->fields["codigo"]."',32,' ') AND
         				 B.FECPAG<=to_date('".$this->feccom2."','dd/mm/yyyy') AND 
   			 			 ((A.STAIMP)='A'OR ((A.STAIMP)='N' AND B.FECANU>to_date('".$this->feccom2."','dd/mm/yyyy')))";
				//print $tsql;
				$r=$this->bd->select($tsql);
				if(!$r->EOF)
				{
					$ajustepag=$r->fields["ajustepag"];
				}
				$this->cell($this->anchos2[6],10,number_format(abs($saldpag-$ajustepag),2,'.',','));
				$acum5=$acum5+(abs($saldpag-$ajustepag));
				$acumBen5=$acumBen5+(abs($saldpag-$ajustepag));
				$tb->MoveNext();
			    $this->ln(3);
			}	
				//Totales
				 $this->ln(6);
				 $this->line(100,$this->getY(),270,$this->getY());
				 $this->cell($this->anchos2[0],5,'');
				 $this->cell($this->anchos2[1],5,'');
				 $this->cell($this->anchos2[2],5,number_format($acum1,2,'.',','));
				 $totacum1=$totacum1+$acum1;
				 $totacumBen1=$totacumBen1+$acum1;
				 $this->cell($this->anchos2[3],5,number_format($acum2,2,'.',','));
				 $totacum2=$totacum2+$acum2;
 				 $totacumBen2=$totacumBen2+$acum2;
				 $this->cell($this->anchos2[4],5,number_format($acum3,2,'.',','));
				 $totacum3=$totacum3+$acum3;
 				 $totacumBen3=$totacumBen3+$acum3;
				 $this->cell($this->anchos2[5],5,number_format($acum4,2,'.',','));
				 $totacum4=$totacum4+$acum4;
 				 $totacumBen4=$totacumBen4+$acum4;
				 $this->cell($this->anchos2[6],5,number_format($acum5,2,'.',','));
				 $totacum5=$totacum5+$acum5;
				 $totacumBen5=$totacumBen5+$acum5;				 
				 $acum1=0;
				 $acum2=0;
				 $acum3=0;
				 $acum4=0;
				 $acum5=0;
				 $acumBen1=0;
				 $acumBen2=0;
				 $acumBen3=0;
				 $acumBen4=0;
				 $acumBen5=0;
				 $this->ln(6);
				 $this->line(100,$this->getY(),270,$this->getY());
				 $this->cell($this->anchos2[0],5,'TOTALES');
				 $this->cell($this->anchos2[1],5,'');
				 $this->cell($this->anchos2[2],5,number_format($totacum1,2,'.',','));
				 $this->cell($this->anchos2[3],5,number_format($totacum2,2,'.',','));
				 $this->cell($this->anchos2[4],5,number_format($totacum3,2,'.',','));
				 $this->cell($this->anchos2[5],5,number_format($totacum4,2,'.',','));
				 $this->cell($this->anchos2[6],5,number_format($totacum5,2,'.',','));
				 $this->ln(10);
				 $g=$this->bd->select("SELECT coalesce(SUM(B.MONIMP),0) as CAUCOM 
				 					   FROM CPCAUSAD A,CPIMPCAU B, CPDOCCAU C
   									   WHERE A.REFCAU=B.REFCAU AND
         							   A.TIPCAU=C.TIPCAU AND
         							   C.AFECOM='S' AND
         							   A.FECCAU>=to_date('".$this->feccom1."','dd/mm/yyyy') AND
         							   A.FECCAU<=to_date('".$this->feccom2."','dd/mm/yyyy') AND
         							   B.CODPRE>=RPAD('".$this->codpre1."',32,' ') AND 
         							   B.CODPRE<=RPAD('".$this->codpre2."',32,' ') AND
         							   B.CODPRE LIKE RTRIM('".$this->comodin."')  AND         
        							  (A.stacau='A' Or (A.StaCau='N' And FecAnu>to_date('".$this->feccom2."','dd/mm/yyyy')))");
				 if(!$g->EOF)
				 {
				 	$totcaucom=$g->fields["caucom"];
				 }
				 $this->setFont("Arial","B",8); 
				 $this->cell(60,10,'TOTAL DE CAUSADOS QUE COMPROMETEN:			'.number_format($totcaucom,2,'.',','));
				 $this->ln(4);
				 $h=$this->bd->select("SELECT coalese(SUM(B.MONIMP),0) as PAGCOM 
				 						FROM CPPAGOS A,CPIMPPAG B, CPDOCPAG C
   										WHERE A.REFPAG=B.REFPAG AND
         								A.TIPPAG=C.TIPPAG AND
         								C.AFECOM='S' AND
         								A.FECPAG>=to_date('".$this->feccom1."','dd/mm/yyyy') AND
         								A.FECPAG<=to_date('".$this->feccom2."','dd/mm/yyyy') AND
         								B.CODPRE>=RPAD('".$this->codpre1."',32,' ') AND 
         								B.CODPRE<=RPAD('".$this->codpre2."',32,' ') AND
         								B.CODPRE LIKE RTRIM('".$this->comodin."')  AND
         								(A.staPAG='A' Or (A.StaPAG='N' And FecAnu>to_date('".$this->feccom2."','dd/mm/yyyy')))");
				 if(!$h->EOF)
				 {
				 	$totpagcom=$h->fields["pagcom"];
				 }
				 $this->cell(60,10,'TOTAL DE PAGADOS QUE COMPROMETEN: 	 		 '.number_format($totpagcom,2,'.',','));
				 $this->ln(3);
				 $this->cell(100,10,'_______________________',0,0,'R');
				 $this->ln(4);
				 $this->cell(60,10,'TOTAL GENERAL DE COMPROMISOS       	 						'.number_format(($totcaucom+$totpagcom+$totacum3),2,'.',','));
				//
		}
	}
?>