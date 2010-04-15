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
		var $condes;
		var $conhas;
		var $fecini;
		var $fecdes;
		var $codpredes;
		var $codprehas;

						
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->condes=$_POST["condes"];
			$this->conhas=$_POST["conhas"];
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->fecini=$_POST["fecini"];
			$this->fecdes=$_POST["fecdes"];
			$this->codpredes=$_POST["codpredes"];
			$this->codprehas=$_POST["codprehas"];
	
				$this->sql="SELECT 
 				SUBSTR(RTRIM(CASE WHEN D.CODCAT is null then B.CODCAT ELSE D.CODCAT END)||'-'||RTRIM(C.CODPAR)||' ',1,50) as codpre,
				SUM(CASE WHEN A.ASIDED='A' THEN coalesce(A.SALDO,0) ELSE 0 END) as asigna,
				SUM(CASE WHEN A.ASIDED='D' THEN coalesce(A.SALDO,0) ELSE 0 END) as deduci,
 				SUM(CASE WHEN A.ASIDED='P' THEN coalesce(A.SALDO,0) ELSE 0 END) as aporte				
				FROM 
				NPNOMCAL as A left outer join NPCONCEPTOSCATEGORIA as D on (A.CODCON=D.CODCON),
				NPASICAREMP B,
				(SELECT Z.CODCON,Z.ORDPAG,Z.OPECON,Z.IMPCPT,
				coalesce(Y.CODPRE,Z.CODPAR) as codpar, coalesce(Y.CODNOM,'XXX') as codnom
 				FROM NPDEFCPT Z left outer join NPASICODPRE Y on (Z.CODCON=Y.CODCON)
 				ORDER BY OPECON,Z.CODCON ) as C
  				WHERE
 				RTRIM(A.CODEMP)=RTRIM(B.CODEMP) AND
				RTRIM(A.CODNOM)=RTRIM(B.CODNOM) AND
  				RTRIM(A.CODCAR)=RTRIM(B.CODCAR) AND
 				RTRIM(A.CODCON)=RTRIM(C.CODCON) AND
 				A.CODNOM=(CASE WHEN C.CODNOM='XXX' THEN A.CODNOM ELSE C.CODNOM END) AND
				RTRIM(A.CODCON) >= RTRIM('".$this->condes."') AND RTRIM(A.CODCON) <= RTRIM('".$this->conhas."') AND														
				RTRIM(A.CODNOM) >= RTRIM('".$this->tipnomdes."') AND
				A.CODNOM=(CASE WHEN C.CODNOM='XXX' THEN A.CODNOM ELSE C.CODNOM END) AND
 				A.SALDO>0 and C.ORDPAG='S' AND B.STATUS='V'
				GROUP BY
				SUBSTR(RTRIM(CASE WHEN D.CODCAT is null then B.CODCAT ELSE D.CODCAT END)||'-'||RTRIM(C.CODPAR)||' ',1,50)
				order by codpre";
	//echo $this->sql;exit;
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,52);
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo Presupuestario";
				$this->titulos[1]="                                                             Descripcion";				
				$this->titulos[2]="                                        Total Causado";
			
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			$this->SetTextColor(0,0,128);  
			//-----------------------sql2--------------------------
			 $this->sql2="SELECT DISTINCT(nomnom) as nombre FROM NPNOMCAL WHERE codnom='".$this->tipnomdes."'";
			 $tb2b=$this->bd->select($this->sql2);
			 $this->cell(45,5,"Nomina: ".$this->tipnomdes." - ".strtoupper($tb2b->fields["nombre"]));
			//-----------------------fin--------------------------
			$this->ln(); 			
			//-----------------------sql3--------------------------
 			$this->sql3="SELECT to_char(ULTFEC,'DD/MM/YYYY') as fecha FROM NPNOMINA WHERE CODNOM='".$this->tipnomdes."'"; 
			 $tb2c=$this->bd->select($this->sql3);		
			// print $this->sql3;		 
			 $this->cell(45,5,"Desde: ".$tb2c->fields["fecha"]);
			//-----------------------fin--------------------------
			//-----------------------sql4--------------------------
			 $this->sql4="SELECT to_char(PROFEC,'DD/MM/YYYY') as fecha2 FROM NPNOMINA WHERE CODNOM='".$this->tipnomdes."'"; 
			 $tb2d=$this->bd->select($this->sql4);				 
			 //print $this->sql4;
			 $this->cell(45,5,"Hasta: ".$tb2d->fields["fecha2"]);
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
			
			while(!$tb->EOF)
			{
	  	 		
				 $this->sql5="SELECT NOMPRE as nombre FROM CPDEFTIT 
				WHERE RTRIM(CODPRE)=RTRIM('".$tb->fields["codpre"]."')";
			     $tb2e=$this->bd->select($this->sql5);				 
		
				 if(!$tb2e->fields["nombre"]=='')
				 {
				 $this->setFont("Arial","",8); 
				 $this->cell($this->anchos[0],7,$tb->fields["codpre"]);
			     $this->setX(150);
			     $this->total=($tb->fields["asigna"]);
				 $this->cell($this->anchos[2],4,"".number_format($this->total,2,'.',','));
				 $this->setX(70);
				 $this->Multicell($this->anchos[1],4,strtoupper($tb2e->fields["nombre"]),0,'L',0);				 
				 $this->acum1=($this->acum1+$tb->fields["asigna"]);
				 $this->ln(5);
				} 
				$tb->MoveNext();
				}
				$this->SetLineWidth(0.5);
  			    $this->Line(119,$this->GetY(),200,$this->GetY());
				$this->SetLineWidth(0.2);				
				$this->setFont("Arial","B",8);
			    $this->cell($this->anchos[0],7," ");				
			    $this->cell($this->anchos[1],7,"                                         TOTALES           ");	
				$this->setX(145);			
				$this->monto_total=($this->acum1);
				$this->cell($this->anchos[2],7,"".number_format($this->monto_total,2,'.',','));
			
				 
		}

		
	}
?>