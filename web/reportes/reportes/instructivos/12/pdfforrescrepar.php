<?
	require_once("../../lib/general/fpdfadds.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $sql;		
		var $cab;
		var $titulo;
		//
		var $codemp;
		var $nomemp;
		var $fecha;
		var $orgads;
		
		function pdfreporte()
		{
		    $this->conf="P";
			$this->fpdf($this->conf,"mm","letter");
			$this->bd=new basedatosAdo();			
			$this->codemp=$_POST["codemp"];
			$this->nomemp=$_POST["nomemp"];
			$this->fecha=date("d/m/Y");
			$this->orgads=$_POST["orgads"];
			$this->titulo=$_POST["titulo"];		
			$this->meshas=$_POST["hasta"];
			$this->sql0="select lonniv from forniveles where catpar='P'";
			$tb0=$this->bd->select($this->sql0);
			$this->sql="select distinct(substr(codpar,1,'".$tb0->fields["lonniv"]."')) as codpar from fordetpryaccespmet";	
			
			$this->lonniv=$tb0->fields["lonniv"];
		$this->cab=new cabecera();
		}
		
		
		function partida($long,$codpar)
		{
			if ($long==3)
			{
				switch ($codpar) {
					 case '401':
						 {
						 	$despar='GASTOS DE PERSONAL';
							break;
						 }	
						
					 case '402':
						 {  
						 	$despar='MATERIALES, SUMINISTROS Y MERCANCIAS';
							break;
						 }
						
					 case '403':
						 {	
						 	$despar='SERVICIOS NO PERSONALES';
							break;
						 }
					  
					 case '404':
						 {	
						 	$despar='ACTIVOS REALES';
							break;
						 }
						
					 case '405':
						 {
						 	$despar='ACTIVOS FINANCIEROS';
							break;
						 }
						
					 case '406':
						 {	
						 	$despar='GASTOS DE DEFENSA Y SEGURIDAD DE ESTADO';	 
							break;
						 }
						 
					 case '407':
						 {
						 	$despar='TRANSFERENCIAS Y DONACIONES';
							break;
						 }
						
					 case '408':
						 {	
						 	$despar='OTROS GASTOS';
							break;
						 }
						 
					 case '411':
						 {
						 	$despar='DISMINUCION DE PASIVOS';	 
							break;
						 }
						 
					 case '412':
						 {
						 	$despar='DISMINUCION DE PATRIMONIO';	         
							break;
						 }
						 
						 };
			
			return $despar;			 
			}
		}

		function Header()
		{
			
			$this->setTextcolor(0,0,0);
			$this->SetFont("Arial","B",8);
			$this->setLinewidth(0.7);
			//Tres cuadros principales
			$this->rect(13,60,190,20);
			$this->rect(13,60,190,160);
			$this->rect(13,210,190,10);
			$this->Image("../../img/logo_1.jpg",22,10,24);
			//lines verticales
			$this->line(35,60,35,220);
			$this->line(120,60,120,220);
			$this->line(147,60,147,220);
			$this->line(174,60,174,220);
			$this->setXY(04,32);
			$this->MultiCell(60,3,'
			'.$this->codemp.'
			'.$this->nomemp,0,'C',0);						
			$this->SetFont("Arial","B",10);
			$this->setXY(40,45);
			$this->setTextcolor(0,0,150);
			$this->MultiCell(140,3,$this->titulo,0,'C',0);			
			$this->setXY(50,45);
			$this->Cell(120,10,'(Bolivares)',0,0,'C');						
			$this->setTextcolor(0,0,0);
			$this->SetFont("Arial","B",8);
			$this->setXY(12,20);
			//$this->Cell(60,10,$this->orgads);
			$this->setXY(180,10);
			$this->Cell(15,10,'FECHA');
			$this->setLinewidth(0);
			//lineas fecha
			$this->line(180,22,198,22);
			$this->line(180,19,180,22);
			$this->line(198,19,198,22);
			$this->line(185,19,185,22);
			$this->line(190,19,190,22);
			
			$this->setXY(180,13);
			$this->Cell(5,15,substr($this->fecha,0,2));
			$this->Cell(5,15,substr($this->fecha,3,2));
			$this->Cell(10,15,substr($this->fecha,6,4));
			
	
			$this->Formato();
		}
		
		function Formato()
		{
			$this->setXY(15,65);
			$this->SetFont("Arial","B",9);
			$this->Cell(10,10,'PARTIDA');
			
			$this->setXY(65,65);		
			$this->Cell(10,10,'DENOMINACION');	
			
			$this->setXY(128,65);
			$this->Cell(10,10,'REAL',0,0,'C');
						
			$this->setXY(157,65);
			$this->Cell(10,4,'ULTIMO',0,0,'C');
			$this->setXY(157,65);
			$this->Cell(10,10,'ESTIMADO',0,0,'C');
			$this->setXY(157,65);
			$this->Cell(10,16,'2006',0,0,'C');
			$this->setXY(183,65);
			$this->Cell(10,4,'PRESUPUESTO',0,0,'C');
			$this->setXY(183,65);
			$this->Cell(10,10,'2007',0,0,'C');
			$this->setY(82);
		}
		
		function Cuerpo()
		{	
			
			
			
			
			$this->SetFont("Arial","B",7.5);	
			$tb=$this->bd->select($this->sql);
			$tot_rea=0;		
			$tot_est=0;
			$tot_pre=0;
			while (!$tb->EOF)
			{
				
				$this->sql2="select sum(monpre) as monpre from fordetpryaccespmet where codpar like  '".$tb->fields["codpar"]."%' ";
				$tb2=$this->bd->select($this->sql2);
				
				$this->setX(20);
				$this->cell(15,5,$tb->fields["codpar"]);				
				$this->setX(38);
				$this->cell(15,5,$this->partida($this->lonniv,$tb->fields["codpar"]));
				$this->setX(120);
				$this->cell(25,5,number_format(0,2,'.',','),0,0,'R');
				$this->setX(147);
				$this->cell(25,5,number_format(0,2,'.',','),0,0,'R');
				$this->setX(175);
				$this->cell(25,5,number_format($tb2->fields["monpre"],2,'.',','),0,0,'R');
				$tot_rea=$tot_rea + 0;
				$tot_est=$tot_est + 0;
				$tot_pre=$tot_pre + $tb2->fields["monpre"];
				//print $this->sql2;	
				$this->ln();
				
				$tb->MoveNext();
			}
				
			$this->SetAutoPageBreak(false);	
			$this->setXY(90,210);
			$this->SetFont("Arial","B",9);	
			$this->cell(20,10,'TOTALES');
			$this->SetFont("Arial","B",8);	
			$this->setX(120);
			$this->cell(25,10,number_format($tot_rea,2,'.',','),0,0,'R');			
			$this->setX(148);
			$this->cell(25,10,number_format($tot_est,2,'.',','),0,0,'R');
			$this->setX(177);
			$this->cell(25,10,number_format($tot_pre,2,'.',','),0,0,'R');
		}		
	}
?>