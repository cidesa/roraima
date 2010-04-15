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
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $periodo;
		var $filtro;
		var $fecperdes;
		var $fecperhas;
		var $perant;
		var $conf="p";
				
		function pdfreporte()
		{
			$this->fpdf($this->conf,"mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->periodo=$_POST["periodo"];
			$this->filtro=$_POST["filtro"];
			$this->EjecutarAntes($this->periodo);
			$this->sql="SELECT 
							A.CODCTA as codcta,
							A.DESCTA as descta,
							(B.SALACT*(-1)) as SALACT, 
							C.CODCTA as cuenta,
							C.DESCTA as descuenta,
							D.SALACT  as saldo   						
						FROM CONORIAPLFON A,CONTABB1 B,CONORIAPLFON C,CONTABB1 D 
						WHERE 
							A.CODCTA=B.CODCTA AND
							B.PEREJE='".$this->periodo."' AND
							A.ORDENFLU=0 AND
							A.FLUCAJ='S'  AND
							B.SALACT<>0 AND 
							C.CODCTA=D.CODCTA AND
							D.PEREJE='".$this->periodo."' AND
							C.ORDENFLU=1 AND
							C.FLUCAJ='S'  AND
							D.SALACT<>0
							ORDER BY A.ORDENFLU,A.CODCTA,C.ORDENFLU";		
						//print $this->sql;	
			$this->cab=new cabecera();
			
		}
		function EjecutarAntes($peri)
		{
			$g=$this->bd->select("SELECT to_char(B.FECDES,'dd/mm/yyyy') as fecperdes FROM CONTABA A, CONTABA1 B WHERE A.FECINI = B.FECINI AND A.FECCIE = B.FECCIE AND B.PEREJE = '".$peri."'");
			if(!$g->EOF)
			{
				$this->fecperdes=$g->fields["fecperdes"];
			}
			$h=$this->bd->select("SELECT to_char(B.FECHAS,'dd/mm/yyyy') as fecperhas FROM CONTABA A, CONTABA1 B WHERE A.FECINI = B.FECINI AND A.FECCIE = B.FECCIE AND B.PEREJE = '".$peri."'");
			if(!$h->EOF)
			{
				$this->fecperhas=$h->fields["fecperhas"];
			}
  			if( $peri=='01' ){
     			$this->perant='12';
  			}
  			else if( $peri=='02' ){
     			$this->perant='01';
  			}
  			else if( $peri=='03' ){
     			$this->perant='02';
  			}
  			else if( $peri=='04' ){
     			$this->perant='03';
  			}
  			else if( $peri=='05'){
     			$this->perant='04';
  			}
  			else if( $peri=='06' ){
     			$this->perant='05';
  			}
  			else if( $peri=='07' ){
     			$this->perant='06';
  			}
  			else if( $peri=='08' ){
     			$this->perant='07';
  			}
  			else if( $peri=='09'){
     			$this->perant='08';
  			}
  			else if( $peri=='10'){
     			$this->perant='09';
  			}
  			else if( $peri=='11') {
     			$this->perant='10';
  			}
  			else if( $peri=='12'){
     			$this->perant='11';
  			}
		}
		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","n");
			$this->setFont("Arial","B",8);
			$this->cell(30,5,'Del: '.$this->fecperdes);
			$this->cell(40,5,'Al: '.$this->fecperhas);
			$this->cell(40,5,'(Periodo:'.$this->periodo.')');
			$this->ln(4);
			$this->line(10,$this->getY(),200,$this->getY());
		}
		function Cuerpo()
		{
		    $tb=$this->bd->select($this->sql);
		    $tb2=$this->bd->select($this->sql);
			$ref="";
			$acum1=0;
			$acum2=0;
			$totacum=0;
			$this->cell(25,5,'Código Cuenta');
			$this->cell(130,5,'Descripción Cuenta');
			$this->cell(30,5,'Saldo Actual');
			$this->ln(4);
		    $this->line(10,$this->getY(),200,$this->getY());
			$this->cell(25,5,'');
			$this->cell(130,5,'SALDO INICIAL DE CAJA Y BANCO');
			if($this->periodo=='01')
			{
					$f=$this->bd->select("SELECT A.SALANT as saldo FROM CONTABB A, CONTABA B WHERE A.CODCTA=RPAD('1-01-01-01',32,' ') AND A.FECINI = B.FECINI AND A.FECCIE = B.FECCIE AND B.CODEMP='001'");
					if(!$f->EOF)
					{
						$saldocaj=$f->fields["saldo"];
					}
			}
			else
			{
					$s=$this->bd->select("SELECT B.SALACT as saldo FROM CONTABB1 B, CONTABA C WHERE B.CODCTA = RPAD('1-01-01-01',32,' ') AND  B.PEREJE = '".$this->perant."' AND B.FECINI = C.FECINI AND B.FECCIE = C.FECCIE AND C.CODEMP='001'");
					if(!$s->EOF)
					{
						$saldocaj=$s->fields["saldo"];
					}
			}
			$this->cell(30,5,number_format($saldocaj,2,'.',','));
			$this->ln(4);
			$this->cell(20,5,'INGRESOS');
			$this->ln(4);
			$this->setFont("Arial","",8);
			while(!$tb->EOF)
			{
				 $this->cell(25,5,$tb->fields["codcta"]);
				 $this->setFont("Arial","",7);
				 $this->cell(130,5,$tb->fields["descta"]);
				 $this->setFont("Arial","",8);
				 $this->cell(30,5,number_format($tb->fields["salact"],2,'.',','));
				 $acum1=$acum1+$tb->fields["salact"];
			     $this->ln(3);
				 if (!$tb->EOF) {$tb->MoveNext();}
			}
			$this->setFont("Arial","B",8);
			//Totales
			$this->ln(4);
			$this->line(100,$this->getY(),200,$this->getY());
			$this->cell(130,5,'SALDO INICIAL DE CAJA Y BANCO INGRESOS=DISPONIBLE');
			$this->cell(25,5,'');
			$this->cell(30,5,number_format(($saldocaj+$acum1),2,'.',','));
			$disponible=$saldocaj+$acum1;
			$this->ln(4);
			////
			$this->cell(20,5,'EGRESOS');
			$this->ln(4);
			$this->setFont("Arial","",8);
			while(!$tb2->EOF)
			{
				 $this->cell(25,5,$tb2->fields["codcuenta"]);
				 $this->setFont("Arial","",7);
				 $this->cell(130,5,$tb2->fields["descuenta"]);
				 $this->setFont("Arial","",8);
				 $this->cell(30,5,number_format($tb2->fields["saldo"],2,'.',','));
				 $acum2=$acum2+$tb2->fields["saldo"];
			     $this->ln(3);
				 if (!$tb2->EOF) {$tb2->MoveNext();}
			}
			$this->setFont("Arial","B",8);
			//Totales
			$this->ln(4);
			$this->line(100,$this->getY(),200,$this->getY());
			$this->cell(130,5,'TOTAL EGRESOS');
			$this->cell(25,5,'');
			$this->cell(30,5,number_format(($acum2),2,'.',','));
			$this->ln(4);
			//Totales totales
			$this->ln(4);
			$this->line(10,$this->getY(),200,$this->getY());
			$this->cell(130,5,'SALDO FINAL DE CAJA ');
			$this->cell(25,5,'');
			$this->cell(30,5,number_format(($disponible-$acum2),2,'.',','));
			$this->ln(4);
		}
	}
?>