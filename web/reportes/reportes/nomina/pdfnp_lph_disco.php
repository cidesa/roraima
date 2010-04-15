<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");


/*
AYUDA:
Cell(with,healt,Texto,border,linea,align,fillm-Fondo,link)
AddFont(family,style,file)
ln() -> Salto de Linea
*/
	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $ancho;
		var $campos;
		var $sql;
		
		var $disco;
		var $codempdes;
		var $codemphas;
		var $tipnomhas;		
		
		var $cont_trab;
		var $sueldo_total;
		var $retenciones;
		var $aportes;		

				
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->acum_mon=0;
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->ancho=array();
			$this->disco=$_POST["disco"];
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->tipnomhas=$_POST["tipnomhas"];
			
	
			$this->sql="SELECT
							DISTINCT
							rtrim(A.CODEMP) as codemp,
							D.CODTIPAPO,
							A.CODNOM,
							rtrim(A.CODCAR) as codcar,
							(A.SALDO) as CF_MONRETENCION,
							to_char(B.fecing,'dd/mm/yyyy') as fecing,
							B.NOMEMP,
							E.CODTIPAPO as codtip,
							E.DESTIPAPO,
							E.PORAPO,
							E.PORRET,
							F.CODNOM as CODNOMAPO,
							G.NOMNOM,
							to_char(G.ULTFEC,'dd/mm/yyyy') as FDESDE,
							to_char(G.PROFEC,'dd/mm/yyyy') as FHASTA
							 FROM
							   NPNOMCAL A,
							   NPHOJINT B,
							   NPASICAREMP C,
							   NPCONTIPAPORET D,
							   NPTIPAPORTES E,
							   NPCONTIPAPORET F,
							   NPNOMINA G
							 WHERE
							
							C.CODNOM=A.CODNOM AND
							C.CODCAR=A.CODCAR AND
							C.CODEMP=A.CODEMP AND
							B.CODEMP=A.CODEMP AND
							B.CODEMP >=  RPAD('".$this->codempdes."',16,' ') AND
							B.CODEMP <= RPAD('".$this->codemphas."',16,' ') AND	
							A.CODCON = D.CODCON AND
							upper(D.TIPO)='R' AND
							F.CODNOM=G.CODNOM AND
							E.CODTIPAPO=F.CODTIPAPO AND
							D.CODTIPAPO=E.CODTIPAPO AND
							A.CODNOM=F.codnom AND
							E.CODTIPAPO='0002' AND
							
							F.CODNOM>='".$this->tipnomdes."' AND 
							F.CODNOM<='".$this->tipnomhas."' 
							GROUP BY D.CODTIPAPO,A.CODEMP,A.CODNOM,A.CODCAR,B.NOMEMP,B.FECING,C.CODCAT,E.CODTIPAPO,E.DESTIPAPO,E.PORAPO,E.PORRET,F.CODNOM,G.NOMNOM,G.ULTFEC,G.PROFEC,A.SALDO
							ORDER BY A.CODNOM,b.nomemp";
//print $this->sql; 							E.CODTIPAPO<='0007' AND
			//print $this->sql;
			$this->cab=new cabecera();			
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}		
		}
		
		
		function Cuerpo()
		{   $this->setFont("Arial","B",9);
			$tb=$this->bd->select($this->sql);
			$sw=0;
			//$cod_nom=$tb->fields["codnomapo"];
			while (!$tb->EOF){
			
			   if ($cod_nom!=$tb->fields["codnomapo"]){
   	 			    $cod_nom=$tb->fields["codnomapo"];	
  				   if ($sw==1){
					   $this->ln();
					   $this->Imprimir_Totales();
				   		}
				   else{
 				    $sw=1; }
						$this->cont_trab=0;
						$this->sueldo_total=0;
						$this->retenciones=0;
						$this->aportes=0;
					$this->cell(15,10,"Nómina: ");
					$this->cell(7,10,$tb->fields["codnomapo"]);
					$this->cell(30,10,strtoupper($tb->fields["nomnom"]));
					$this->ln(4);
					$this->cell(23,10,"Fecha Desde: ");
					$this->cell(20,10,$tb->fields["fdesde"]);
					$this->cell(12,10,"Hasta: ");
					$this->cell(15,10,$tb->fields["fhasta"]);
					$this->ln();			
					$this->Line(10,$this->GetY(),270,$this->GetY());			
					$this->cell(20,10,"Cédula");
					$this->cell(70,10,"Empleado");
					$this->cell(30,10,"Sueldo");			
					$this->cell(30,10,"Fecha de Ingreso");			
					$this->cell(30,10,"Retención 1%");
					$this->cell(30,10,"Aporte 2%");
					$this->cell(30,10,"Total");			
					$this->ln();									
					$this->Line(10,$this->GetY(),270,$this->GetY()); 	
					} 
					/////////////  Detalles  ////////////
					$this->setFont("Arial","",9);
					 if ($tb->fields["codemp"]!="" and $ced_emp!=$tb->fields["codemp"]){	
					 //if ($tb->fields["codemp"]!="" and $tb->fields["codtipapo"]=='0002'){	
					 //CODTIPAPO
 					    $ced_emp=$tb->fields["codemp"];	
						$this->cell(20,10,$tb->fields["codemp"]);
						$this->cell(60,10,ucwords($tb->fields["nomemp"]));
						
  						 $tb2=$this->bd->select("SELECT 
														coalesce(SUM(MONTO),0) as VALOR 
													FROM 
														NPASICONEMP A,
														NPCONSALINT B 
													WHERE 
													  (CODEMP)=RPAD('".$tb->fields["codemp"]."',16,' ') AND 
													  (CODCAR)=RPAD('".$tb->fields["codcar"]."',16,' ') AND 
													  A.CODCON=B.CODCON");
													
						$this->cell(33,10,number_format($tb2->fields["valor"],2,'.',','),0,0,'R');
						
						$this->cell(30,10,$tb->fields["fecing"],0,0,'R');									
						$this->cell(30,10,number_format($tb->fields["cf_monretencion"],2,'.',','),0,0,'R');
							
							$tb1=$this->bd->select("SELECT coalesce(SUM(SALDO),0) as ELMONTO FROM NPNOMCAL A, NPHOJINT B, NPCONTIPAPORET C  WHERE rtrim(C.CODTIPAPO)='0002' AND  A.CODNOM=C.CODNOM AND A.CODCON=C.CODCON AND upper(trim(C.TIPO))='A' AND  B.CODEMP=A.CODEMP AND  trim(B.CODEMP)='".$tb->fields["codemp"]."'");		
							//print "SELECT coalesce(SUM(SALDO),0) as ELMONTO FROM NPNOMCAL A, NPHOJINT B, NPCONTIPAPORET C  WHERE C.CODTIPAPO='".$tb->fields["codtipapo"]."' AND  A.CODNOM=C.CODNOM AND A.CODCON=C.CODCON AND trim(C.TIPO)='a' AND  B.CODEMP=A.CODEMP AND  trim(B.CODEMP)='".$tb->fields["codemp"]."'"."           1";
						 $this->cell(33,10,number_format($tb1->fields["elmonto"],2,'.',','),0,0,'R');
						 $this->cell(33,10,number_format($tb1->fields["elmonto"]+$tb->fields["cf_monretencion"],2,'.',','),0,0,'R');
						 
						$this->ln(4);								
						
						$this->cont_trab=$this->cont_trab + 1;
						$this->sueldo_total=$this->sueldo_total+$tb2->fields["valor"];
						$this->retenciones=$this->retenciones+$tb->fields["cf_monretencion"];
						$this->aportes=$this->aportes+$tb1->fields["elmonto"];
						
						}//EndIf						
			  $tb->MoveNext();
			}				
			if ($tb->EOF){ $this->Ln(); $this->Imprimir_Totales(); }
		}
		
	function Imprimir_Totales(){
		$this->setFont("Arial","B",9);
		$this->cell(250,10,"RESUMEN DE TOTALES",0,0,'C');
		$this->ln();
		$this->Line(100,$this->GetY(),270,$this->GetY());
		//$this->cell(90,10,"TOTAL",0,0,'R');		
		$this->cell(100,10,"");			
		$this->cell(50,10,"TRABAJADORES",0,0,'C');		
		$this->cell(33,10,number_format($this->cont_trab),0,0,'R');		
		$this->ln(4);
		$this->cell(100,10,"");			
		$this->cell(50,10,"SUELDO TOTAL",0,0,'C');				
		$this->cell(33,10,number_format($this->sueldo_total,2,'.',','),0,0,'R');				
		$this->ln(4);		
		$this->cell(100,10,"");			
		$this->cell(50,10,"RETENCIONES",0,0,'C');		
		$this->cell(33,10,number_format($this->retenciones,2,'.',','),0,0,'R');		
		$this->ln(4);		
		$this->cell(100,10,"");					
		$this->cell(50,10,"APORTES",0,0,'C');				
		$this->cell(33,10,number_format($this->aportes,2,'.',','),0,0,'R');						
		$this->ln();
		$this->Line(10,$this->GetY(),270,$this->GetY());
	}		
	}
?>