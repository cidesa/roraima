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
		var $codempdes;
		var $codemphas;
		var $codcondes;
		var $codconhas;
		var $tipnomdes;


						
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
			$this->tipnomdes=$_POST["tipnomdes"];
	
				$this->sql="SELECT SUBSTR(RTRIM(B.CODCAT)||'-'||RTRIM(C.CODPAR)||'                                ',1,32) as codpre,
							SUM(CASE WHEN A.ASIDED='a' THEN coalesce(A.SALDO,0) ELSE 0 END) as asigna,
							SUM(CASE WHEN A.ASIDED='d' THEN coalesce(A.SALDO,0) ELSE 0 END) as deduci,
							SUM(CASE WHEN A.ASIDED='p' THEN coalesce(A.SALDO,0) ELSE 0 END) as aporte							
							FROM NPNOMCAL A,NPASICAREMP B,NPDEFCPT C WHERE
 					  	    RTRIM(A.CODEMP)=RTRIM(B.CODEMP) AND
   						    RTRIM(A.CODCAR)=RTRIM(B.CODCAR) AND
    					    RTRIM(A.CODCON)=RTRIM(C.CODCON) AND
  						    --RTRIM(B.STATUS)='V' AND
							RTRIM(A.CODEMP) >= RTRIM('".$this->codempdes."') AND RTRIM(A.CODEMP) <= RTRIM('".$this->codemphas."') AND							
							RTRIM(A.CODCON) >= RTRIM('".$this->codcondes."') AND RTRIM(A.CODCON) <= RTRIM('".$this->codconhas."') AND														
							RTRIM(A.CODNOM) >= RTRIM('".$this->tipnomdes."') AND
							A.SALDO>0 AND A.CODCON<>'XXX'
							GROUP BY SUBSTR(RTRIM(B.CODCAT)||'-'||RTRIM(C.CODPAR)||'                                ',1,32)";
							
									

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,52);
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código Presupuestario";
				$this->titulos[1]="Descripción";				
				$this->titulos[2]="Asignación";
				$this->titulos[3]="Deducción";
				$this->titulos[4]="Aportes";

		
	
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
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
			$this->Line(10,48,200,48);
			$this->SetLineWidth(0.5);
			$this->Line(10,55,200,55);
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
				 $this->cell($this->anchos[2],7,$tb->fields["asigna"]);
				 $this->cell($this->anchos[3],7,$tb->fields["deduci"]);
				 $this->cell($this->anchos[4],7,$tb->fields["aporte"]);
				 $this->acum1=($this->acum1+$tb->fields["asigna"]);
				 $this->acum2=($this->acum2+$tb->fields["deduci"]);				 				 				 
				 $this->acum3=($this->acum3+$tb->fields["aporte"]);				 
				 $this->ln();
				$tb->MoveNext();
				}
				$this->SetLineWidth(0.5);
  			    $this->Line(119,$this->GetY(),200,$this->GetY());
				$this->SetLineWidth(0.2);				
				$this->setFont("Arial","B",8);
			    $this->cell($this->anchos[0],7," ");				
			    $this->cell($this->anchos[1],7,"                                         TOTALES           ");				
				$this->cell($this->anchos[2],7,"".number_format($this->acum1,2,'.',''));
				$this->cell($this->anchos[2],7,"".number_format($this->acum2,2,'.',''));
				$this->cell($this->anchos[3],7,"".number_format($this->acum3,2,'.',''));												

		//	}	
		}

		
	}
?>