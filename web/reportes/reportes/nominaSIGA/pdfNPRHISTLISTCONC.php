<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $acum1=0;
		var $acum2=0;
		var $acum3=0;				
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
		var $pf_10;
		var $codempdes;
		var $codemphas;
		var $codcardes;
		var $codcarhas;
		var $codcondes;
		var $codconhas;
		var $fecreg1;
		var $fecreg2;
		var $codnom;		
		
						
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->pf_10=$_POST["pf_10"];
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->codcardes=$_POST["codcardes"];			
			$this->codcarhas=$_POST["codcarhas"];
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
			$this->fecreg1=$_POST["fecreg1"];
			$this->fecreg2=$_POST["fecreg2"];
			$this->codnom=$_POST["codnom"];			


				if ($this->pf_10=='t')
				{									
				$this->sql="SELECT A.CODEMP, D.NOMCON, A.CODCON, A.CODCAR,sum(A.monto) as saldo, A.CODNOM, C.NOMEMP, C.CEDEMP, C.CODBAN, E.NOMBAN,
							B.NOMCAR, D.OPECON, D.CODCON, D.IMPCPT 
							FROM NPhiscon A, NPCARGOS B,  NPDEFCPT D, NPHOJINT C LEFT OUTER JOIN NPBANCOS E ON (C.CODBAN=E.CODBAN)
							WHERE
							A.CODCON=D.CODCON AND
							A.CODEMP=C.CODEMP AND
							A.CODCAR=B.CODCAR AND
							C.CODBAN=E.CODBAN AND
							A.monto<>0.00 AND
							--D.CONACT='S' AND
							--D.IMPCPT='S' AND
							A.CODEMP >= RTRIM('".$this->codempdes."') AND A.CODEMP <= RTRIM('".$this->codemphas."') AND
							A.CODCAR >= RTRIM('".$this->codcardes."') AND A.CODCAR <= RTRIM('".$this->codcarhas."') AND
							A.CODCON >= RTRIM('".$this->codcondes."') AND A.CODCON <= RTRIM('".$this->codconhas."') AND
							A.fecnom >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.fecnom <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND																					
							A.CODNOM = '".$this->codnom."' 
							group by
							A.CODEMP,d.NOMCON,A.CODCON,A.CODCAR,A.CODNOM,C.NOMEMP,C.CEDEMP,C.CODBAN,E.NOMBAN,B.NOMCAR,D.OPECON,D.CODCON,D.IMPCPT
							ORDER BY A.CODCON,A.CODEMP";														
			}
		else
			{
				$this->sql="SELECT A.CODEMP, D.NOMCON, A.CODCON, A.CODCAR,sum(A.monto) as saldo, A.CODNOM, C.NOMEMP, C.CEDEMP, C.CODBAN, E.NOMBAN,
							B.NOMCAR, D.OPECON, D.CODCON, D.IMPCPT 
							FROM NPhiscon A, NPCARGOS B,  NPDEFCPT D, NPHOJINT C LEFT OUTER JOIN NPBANCOS E ON (C.CODBAN=E.CODBAN)
							WHERE
							A.CODCON=D.CODCON AND
							A.CODEMP=C.CODEMP AND
							A.CODCAR=B.CODCAR AND
							C.CODBAN=E.CODBAN AND
							A.monto<>0.00 AND
							--D.CONACT='S' AND
							--D.IMPCPT='S' AND
							A.CODEMP >= RTRIM('".$this->codempdes."') AND A.CODEMP <= RTRIM('".$this->codemphas."') AND
							A.CODCAR >= RTRIM('".$this->codcardes."') AND A.CODCAR <= RTRIM('".$this->codcarhas."') AND
							A.CODCON >= RTRIM('".$this->codcondes."') AND A.CODCON <= RTRIM('".$this->codconhas."') AND
							A.fecnom >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.fecnom <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND																					
							A.CODNOM = '".$this->codnom."' AND
							D.OPECON = '".$this->pf_10."' 
							group by
							A.CODEMP,d.NOMCON,A.CODCON,A.CODCAR,A.CODNOM,C.NOMEMP,C.CEDEMP,C.CODBAN,E.NOMBAN,B.NOMCAR,D.OPECON,D.CODCON,D.IMPCPT
							ORDER BY A.CODCON,A.CODEMP";														
			}
			
//			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);			
			
		}

/*		function llenartitulosmaestro()
		{
				$this->titulos[0]="Tipo";
				$this->titulos[1]="Número Cheque ";
				$this->titulos[2]="Beneficiario";
				$this->titulos[3]="Orden de Pago";
				$this->titulos[4]="Fecha Emision";
				$this->titulos[5]="Monto Cheque";
	
		}*/

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i]);
			}
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],7,$this->titulos2[$i]);
			}

		}
		
		
				
			function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["codcon"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8); 
	 			 $this->SetTextColor(0,0,128);  				 
			//-----------------------sql2--------------------------
			 $this->sql2="SELECT NOMNOM as nombre FROM NPNOMINA WHERE
			 codnom='".$this->codnom."'";
			 $tb2b=$this->bd->select($this->sql2);
			 $this->cell(80,5,"Nómina: ".$tb2->fields["codnom"]."      ".strtoupper($tb2b->fields["nombre"]));
			//-----------------------fin--------------------------				 
				 $this->cell(45,5,"            Del:".$this->fecreg1);
 				 $this->cell(45,5,"            Al:".$this->fecreg2);			
 				 $this->SetTextColor(0,0,0);				 
				 $this->ln();
 				 $this->Line(10,$this->GetY(),200,$this->GetY());
				 $this->setFont("Arial","",8);				 				 
				 $this->cell(50,4,"   Código Concepto  ");
				 $this->cell(100,4,"   Descripción Concepto  ");
				 $this->ln();				 				 
				 $this->cell(50,4,"   ".strtoupper($tb2->fields["codcon"]));				 
				 $this->cell(100,4,"   ".strtoupper($tb2->fields["nomcon"]));
				 $this->ln();
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());
				 $this->cell(30,4,"Cédula");
				 $this->cell(65,4,"Nombre");
				 $this->cell(70,4,"Cargo");
				 $this->cell(23,4,"Monto Concepto");
				 $this->ln();				 
	 			 $this->SetLineWidth(0.4);
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());				 
			}
			while(!$tb->EOF)
			{
				if($tb->fields["codcon"]!=$ref)
				{
			 $this->SetLineWidth(0.2);
				 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","",8); 
				 $this->cell(20,8,"         TOTAL CONCEPTO:  ".strtoupper($tb->fields["codcon"]."      ".strtoupper($tb2->fields["nomcon"])));				 
 		  		 $this->Line(175,$this->GetY(),199,$this->GetY());
				 $this->ln(1);
				 $this->ln(-1);				 
 				 $this->cell(30,8,"");
				 $this->cell(65,8,"");
				 $this->cell(70,8,"");
				 $this->cell(23,8,"".number_format($this->acum2,2,'.',','),0,0,"R");
				 $this->ln();				 
				 $this->cell(20,4,"         CANTIDAD TRABAJADORES:         ".$this->cont);
				 $this->ln(200);
 				 $this->cell(20,4,"");				 
				 $this->cont=0;
				 $this->acum2=0;
 //		  		 $this->Line(10,$this->GetY(),200,$this->GetY());				 				 	
				 $this->ln(1);
				 $this->ln(-1);				 
		 		 $this->setFont("Arial","B",8); 				 
	 			 $this->SetTextColor(0,0,128);  				 
			//-----------------------sql2--------------------------
			 $this->sql2="SELECT NOMNOM as nombre FROM NPNOMINA WHERE
			 codnom='".$this->codnom."'";
			 $tb2b=$this->bd->select($this->sql2);
			 $this->cell(80,5,"Nómina: ".$tb->fields["codnom"]."      ".strtoupper($tb2b->fields["nombre"]));
			//-----------------------fin--------------------------				 
				 $this->cell(45,5,"            Del:".$this->fecreg1);
 				 $this->cell(45,5,"            Al:".$this->fecreg2);			
 				 $this->SetTextColor(0,0,0);				 
				 $this->ln();
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());				 
				 $this->setFont("Arial","",8);
				 $this->cell(50,4,"   Código Concepto  ");
				 $this->cell(100,4,"   Descripción Concepto  ");
				 $this->ln();				 				 
				 $this->cell(50,4,"   ".$tb->fields["codcon"]);				 
				 $this->cell(100,4,"   ".$tb->fields["nomcon"]);
				 $this->ln();				 
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());
				 $this->cell(30,4,"Cédula");
				 $this->cell(65,4,"Nombre");
				 $this->cell(70,4,"Cargo");
				 $this->cell(23,4,"Monto Concepto");
				 $this->ln();				 
	 			 $this->SetLineWidth(0.4);
 		  		 $this->Line(10,$this->GetY(),200,$this->GetY());				 
		        }
				$ref=$tb->fields["codcon"];
				$this->setFont("Arial","",8);
				//Detalle
				 $aux=$tb->fields["anomben"];				
				 $this->cell(30,5,$tb->fields["codemp"]);
				 $this->cell(65,5,$tb->fields["nomemp"]);				 
				 $this->cell(70,5,$tb->fields["nomcar"]);
				 $this->cell(23,5,"".number_format($tb->fields["saldo"],2,'.',','),0,0,"R");				 
				 $this->cont=($this->cont+1);
				 $this->cont1=($this->cont1+1);				 
 				 $this->acum2=($this->acum2+$tb->fields["saldo"]);
				 $this->ln();
				 $tb->MoveNext();
		
		 
			 }
				 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","",8); 
				 $this->cell(20,8,"         TOTAL CONCEPTO:  ".strtoupper($tb->fields["codcon"]."      ".strtoupper($tb2->fields["nomcon"])));				 
 		  		 $this->Line(175,$this->GetY(),199,$this->GetY());
				 $this->ln(1);
				 $this->ln(-1);				 
 				 $this->cell(30,8,"");
				 $this->cell(65,8,"");
				 $this->cell(70,8,"");
				 $this->cell(23,8,"".number_format($this->acum2,2,'.',','),0,0,"R");
				 $this->ln();				 
				 $this->cell(20,4,"         CANTIDAD TRABAJADORES:         ".$this->cont);

		}
		

	}
?>