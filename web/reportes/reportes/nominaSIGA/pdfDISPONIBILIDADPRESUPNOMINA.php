<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		var $acum1=0;		
		var $acum2=0;		
		var $acum3=0;						
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $sql3;
		var $sql4;
		var $sql5;				
		var $rep;
		var $numero;
		var $cab;
		var $tipnomdes;
		var $p_e;
		var $p_a;
		var $p_r;
		var $p_conf;								
						
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->p_e=$_POST["p_e"];
			$this->p_a=$_POST["p_a"];
			$this->p_r=$_POST["p_r"];
			$this->p_conf=$_POST["p_conf"];
	
				$this->sql="SELECT RPAD(RTRIM(D.CODCAT)||'-'||RTRIM(C.CODPAR),32,' ') as codpre
							FROM NPNOMCAL A, NPASICAREMP B, NPDEFCPT C,NPCONCEPTOSCATEGORIA D
							WHERE
							(A.CODNOM) = RPAD('".$this->tipnomdes."',3,' ')  AND 
							A.CODNOM=B.CODNOM AND
							A.CODEMP=B.CODEMP AND
							A.CODCAR=B.CODCAR AND
							A.CODCON=C.CODCON AND
							C.CODCON=D.CODCON AND
							D.CODCON=A.CODCON AND
							--B.STATUS='V' AND
							A.SALDO>0 
							UNION
							(SELECT RPAD(RTRIM(B.CODCAT)||'-'||RTRIM(C.CODPAR),32,' ') as codpre
							FROM NPNOMCAL A, NPASICAREMP B, NPDEFCPT C
							WHERE
							(A.CODNOM) = RPAD('".$this->tipnomdes."',3,' ')  AND 
							A.CODNOM=B.CODNOM AND
							A.CODEMP=B.CODEMP AND
							A.CODCAR=B.CODCAR AND
							A.CODCON=C.CODCON AND
							--B.STATUS='V' AND
							A.SALDO>0 AND
							A.CODCON NOT IN (SELECT CODCON FROM npconceptoscategoria))
							ORDER BY CODPRE";														


			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,20);
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código Presupuestario";
				$this->titulos[1]="Descripción";				
				$this->titulos[2]="Asignación Inicial";
				$this->titulos[3]="Saldo Actual";
				$this->titulos[4]="Saldo Pendiente O/PN";
				$this->titulos[5]="Total Disponible";
								

		
	
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			$this->SetTextColor(0,0,128);  
			//-----------------------sql2--------------------------
			 $this->sql2="SELECT DISTINCT(nomnom) as nombre FROM NPNOMCAL WHERE
			 codnom='".$this->tipnomdes."'";
			 $tb2b=$this->bd->select($this->sql2);
			 $this->cell(45,5,"Nómina: ".$this->tipnomdes." - ".strtoupper($tb2b->fields["nombre"]));
			//-----------------------fin--------------------------
			$this->ln(); 			
			//-----------------------sql3--------------------------
			 $this->sql3="SELECT ULTFEC as fecha FROM NPNOMINA WHERE CODNOM='001'"; 
			 $tb2c=$this->bd->select($this->sql3);				 
			 $this->cell(45,5,"Desde:".$tb2c->fields["fecha"]);
			//-----------------------fin--------------------------
			//-----------------------sql4--------------------------
			 $this->sql4="SELECT PROFEC as fecha2 FROM NPNOMINA WHERE CODNOM='001'"; 
			 $tb2d=$this->bd->select($this->sql4);				 
			 $this->cell(45,5,"Desde:".$tb2d->fields["fecha2"]);
			//-----------------------fin--------------------------
			$this->ln(); 						 
			$this->SetTextColor(0,0,0); 
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(); 
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}
			$this->Line(10,48,270,48);
			$this->SetLineWidth(0.5);
			$this->Line(10,55,270,55);
		}

		
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			

//			if(!$tb->EOF)
	//		{
			while(!$tb->EOF)
			{
	
				$this->setFont("Arial","",8); 
				 $this->cell($this->anchos[0],7,$tb->fields["codpre"]);
  	 			 $this->sql5="SELECT NOMPRE as nombre FROM CPDEFTIT WHERE RTRIM(CODPRE)=RTRIM('".$tb->fields["codpre"]."')";
			     $tb2e=$this->bd->select($this->sql5);				 
				 $this->cell($this->anchos[1],7,substr(strtoupper($tb2e->fields["nombre"]),0,37));

   	 			 $this->sql6="SELECT MONASI as asiini FROM CPASIINI WHERE RPAD(CODPRE,32,' ')=RPAD('".$tb->fields["codpre"]."',32,' ') AND PERPRE='00'";				 
			     $tb2f=$this->bd->select($this->sql6);				 
				 $this->cell($this->anchos[2],7,$tb2f->fields["asiini"]);
				 
   	 			 $this->sql7="SELECT MONDIS as saldo_dis FROM CPASIINI WHERE RPAD(CODPRE,32,' ')=RPAD('".$tb->fields["codpre"]."',32,' ') AND PERPRE='00'";				 
			     $tb2g=$this->bd->select($this->sql7);				 
				 $this->cell($this->anchos[3],7,$tb2g->fields["saldo_dis"]);				 				 
				 
   	 			 $this->sql8="SELECT NVL(SUM(MONTO),0) as monto_cierre FROM NPCIENOM WHERE RPAD(CODPRE,32,' ')=RPAD('".$tb->fields["codpre"]."',32,' ') AND (ASIDED='A' OR ASIDED='P')";				 
			     $tb2h=$this->bd->select($this->sql8);				 
				 
   	 			 $this->sql9="SELECT NVL(SUM(B.MONRET),0) as monto_opret FROM OPORDPAG A,OPRETORD B WHERE A.NUMORD = B.NUMORD AND B.NUMRET = 'NOASIGNA' 
				 AND A.TIPCAU = 'OP/N' AND RPAD(B.CODPRE,32,' ')=RPAD('".$tb->fields["codpre"]."',32,' ')";
			     $tb2i=$this->bd->select($this->sql9);				 
				 $this->cell($this->anchos[4],7,"".number_format($tb2h->fields["monto_cierre"]+$tb2i->fields["monto_opret"],2,'.',','));				 
				 $res=$tb2h->fields["monto_cierre"]+$tb2i->fields["monto_opret"];
				 $this->cell($this->anchos[5],7,"".number_format($tb2g->fields["saldo_dis"]-$res,2,'.',','));
				 $res2=$tb2g->fields["saldo_dis"]-$res;
				 $this->acum1=($this->acum1+$tb2f->fields["asiini"]);
				 $this->acum2=($this->acum2+$tb2g->fields["saldo_dis"]);				 				 				 
				 $this->acum3=($this->acum3+$res);
				 $this->acum4=($this->acum4+$res2);				 				 
				 $this->ln();
				$tb->MoveNext();
				}
				$this->SetLineWidth(0.5);
  			    $this->Line(119,$this->GetY(),270,$this->GetY());
				$this->SetLineWidth(0.2);				
				$this->setFont("Arial","B",8);
			    $this->cell($this->anchos[0],7," ");				
			    $this->cell($this->anchos[1],7,"                                         TOTALES           ");				
				$this->cell($this->anchos[2],7,"".number_format($this->acum1,2,'.',''));
				$this->cell($this->anchos[3],7,"".number_format($this->acum2,2,'.',''));
				$this->cell($this->anchos[4],7,"".number_format($this->acum3,2,'.',''));
				$this->cell($this->anchos[5],7,"".number_format($this->acum4,2,'.',''));
  			    $this->ln();
   		        $this->ln();				
			//--------------pie de pagina	
			if ($this->GetY()>200)
			{
			$this->ln(100);
		    $this->cell(5,7," ");				

			}
			
			$this->SetY(155);
		    $this->cell(5,7," ");
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->Line(10,$this->GetY(),10,$this->GetY()+36);
			$this->Line(140,$this->GetY(),140,$this->GetY()+36);
			$this->Line(270,$this->GetY(),270,$this->GetY()+36);												
			$this->cell(0,5,"                                              DIRECCION DE RECURSOS HUMANOS                                                                                                             DIRECCION DE PRESUPUESTO");
			$this->ln();
			$this->Line(10,$this->GetY(),270,$this->GetY());			
			$this->cell(20,7,"");
			$this->cell(20,7,"");
			$this->cell(20,7,"");
			$this->ln();
			$this->ln();
			$this->ln();
			$this->Line(12,$this->GetY(),67,$this->GetY());
			$this->Line(74,$this->GetY(),125,$this->GetY());
			$this->Line(145,$this->GetY(),205,$this->GetY());
			$this->Line(215,$this->GetY(),265,$this->GetY());															
			$this->cell(70,5,"     OFICINA DE ADMINISTRACION Y ");
			$this->cell(80,5,"DIRECTOR DE LA UNIDAD ");			
			$this->cell(55,5,"DEPARTAMENTO DE");
			$this->cell(60,5,"     DIRECTOR DE LA UNIDAD ");									
			$this->ln();
  		    $this->cell(135,5,"                   GESTION INTERNA");
  		    $this->cell(100,5,"       CONTABILIDAD PRESUPUESTARIA");			
			$this->ln();									
			$this->Line(10,$this->GetY(),270,$this->GetY());																			

		//  PIE DE PAGINA	
		}

		
	}
?>