<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		var $acum=0;
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
		var $codact1;
		var $codact2;
		var $codsem1;
		var $codsem2;
		var $numpol1;		
		var $numpol2;
		var $fecreg1;
		var $fecreg2;

						
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codubi=$_POST["codubi"];
			$this->codact1=$_POST["codact1"];
			$this->codact2=$_POST["codact2"];
			$this->codsem1=$_POST["codsem1"];
			$this->codsem2=$_POST["codsem2"];
			$this->numpol1=$_POST["numpol1"];
			$this->numpol2=$_POST["numpol2"];
			$this->fecreg1=$_POST["fecreg1"];
			$this->fecreg2=$_POST["fecreg2"];
						
						

									
						
				$this->sql="SELECT SUBSTR(A.CODACT,1,10) as acodact,A.CODSEM as acodsem,B.DESSEM as adessem,A.NROSEGSEM as anrosegsem,A.NOMSEGSEM as anomsegsem,to_char(A.FECSEGSEM,'dd/mm/yyyy') as afecsegsem,A.COBSEGSEM as acobsegsem,A.MONSEGSEM as amonsegsem,
							to_char(A.FECSEGVEN,'DD/MM/YYYY') as afecsegven,A.PROSEGSEM as aprosegsem,A.OBSSEGSEM as aobssegsem FROM BNSEGSEM A, BNREGSEM B 
							WHERE A.CODACT >= '".$this->codact1."' AND A.CODACT <= '".$this->codact2."' AND A.CODACT=B.CODACT AND A.CODSEM=B.CODSEM AND 
							RTRIM(A.CODSEM) >= RTRIM('".$this->codsem1."') AND RTRIM(A.CODSEM) <= RTRIM('".$this->codsem2."') AND 
							RTRIM(A.NROSEGSEM) >= RTRIM('".$this->numpol1."') AND RTRIM(A.NROSEGSEM) <= RTRIM('".$this->numpol2."') ORDER BY A.NROSEGSEM"; 	
									
			$this->llenartitulosmaestro();
			$this->llenartitulosdetalle();			
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO DEL ACTIVO";
				$this->titulos[1]="DESCRIPCION";				
				$this->titulos[2]="Nro DE POLIZA";
				$this->titulos[3]="FECHA";
				$this->titulos[4]="NOMBRE DE SEGURO";
				$this->titulos[5]="COBERTURA";
				$this->titulos[6]="MONTO";				
			
				
		}
		function llenartitulosdetalle()
		{
				$this->titulos2[0]="";
				$this->titulos2[1]="PROMOTOR";				
				$this->titulos2[2]="FECHA DE VENCIMIENTO";				
				$this->titulos2[3]="OBSERVACIONES";
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
			$this->ln(); 
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}
			$this->ln(); 
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
				 $this->cell($this->anchos[0],7,$tb->fields["acodact"]."-".$tb->fields["acodsem"]);
				 $this->cell($this->anchos[1],7,$tb->fields["adessem"]);
				 $this->cell($this->anchos[2],7,$tb->fields["anrosegsem"]);
				 $this->cell($this->anchos[3],7,$tb->fields["afecsegsem"]);
				 $this->cell($this->anchos[4],7,$tb->fields["anomsegsem"]);
				 $this->cell($this->anchos[5],7,$tb->fields["acobsegsem"]);
				 $this->cell($this->anchos[6],7,$tb->fields["amonsegsem"]);				 				 
			 	 $this->ln();
				 $aux=$tb->fields["aprosegsem"];
 				 
				 $this->cell($this->anchos2[0],7,"");
				 $this->cell($this->anchos2[1],7,substr($aux,0,50));				 
				 $this->cell($this->anchos2[2],7,$tb->fields["afecsegven"]);
				 $this->cell($this->anchos2[3],7,$tb->fields["aobssegsem"]);
				 $this->acum=($this->acum+$tb->fields["amonsegsem"]);
				 $this->ln();
				$tb->MoveNext();
				}
				$this->setFont("Arial","B",8);
				$this->cell(20,10,"                                                                                                                                                                                                                                                                                              TOTAL...   ".number_format($this->acum,2,'.',''));
		//	}	
		}
	}
?>