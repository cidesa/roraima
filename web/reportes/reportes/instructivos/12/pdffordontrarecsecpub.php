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
			$this->sql="select rtrim(codpre) as codpre from cpdefrep where nomrep='".$this->titulo."'";	
			/*$this->sql="SELECT distinct(a.codpre),b.nomparegr,sum(c.monpre) as monpre
			from cpdefrep a,fordefparegr b, fordetpryaccespmet c
			where rtrim(a.codpre)=rtrim(b.codparegr)
			and rtrim(a.codpre)=rtrim(c.codpar)
			group by a.codpre,b.nomparegr";*/
		$this->cab=new cabecera();
		}
		

		function Header()
		{
			
			$this->setTextcolor(0,0,0);
			$this->SetFont("Arial","B",7);
			$this->setLinewidth(0.7);
			//Tres cuadros principales
			$this->rect(10,9,190,37);
			$this->rect(10,46,140,5);
			$this->rect(10,46,190,220);
			$this->rect(10,46,190,20);
			$this->Image("../../img/logo_1.jpg",22,10,24);
			$this->setXY(04,32);
			$this->MultiCell(60,3,'
			'.$this->codemp.'
			'.$this->nomemp,0,'C',0);						
			$this->SetFont("Arial","B",9);
			$this->setXY(40,30);
			$this->setTextcolor(0,0,150);
			$this->MultiCell(140,3,$this->titulo,0,'C',0);			
			$this->setXY(50,30);
			$this->Cell(120,10,'(Bolivares)',0,0,'C');						
			$this->setTextcolor(0,0,0);
			$this->SetFont("Arial","B",7);
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
			//lineavertical primera 
			$this->line(31,51,31,266);
			//lineas segundas 
			$this->line(150,46,150,266);
			
			//lineas tercera -V
			$this->line(175,46,175,266);
	
			$this->Formato();
		}
		
		function Formato()
		{
			$this->setXY(12,53);
			$this->SetFont("Arial","B",8);
			$this->Cell(10,10,'C O D I G O');
			
			$this->setXY(80,53);		
			$this->Cell(10,10,'D E N O M I N A C I O N');
			$this->setXY(70,44);		
			$this->Cell(10,10,'P A R T I D A S');
				
						
			$this->setXY(157,50);
			$this->Cell(10,4,'ULTIMO',0,0,'C');
			$this->setXY(157,50);
			$this->Cell(10,10,'ESTIMADO',0,0,'C');
			$this->setXY(157,50);
			$this->Cell(10,16,'2006',0,0,'C');
			$this->setXY(183,50);
			$this->Cell(10,4,'PRESUPUESTO',0,0,'C');
			$this->setXY(183,50);
			$this->Cell(10,10,'2007',0,0,'C');
			$this->setY(68);
		}
		
		function Cuerpo()
		{	
			
			
			
			
			$this->SetFont("Arial","B",6);	
			$tb=$this->bd->select($this->sql);		
			$tot_pre=0;
			$tot_est=0;
			while (!$tb->EOF)
			{
				
				$this->sql2="SELECT b.nomparing,sum(c.montoing) as montoing
					from fordefparing b, forparing c
					where rtrim('".$tb->fields["codpre"]."')=rtrim(b.codparing)
					and rtrim('".$tb->fields["codpre"]."')=rtrim(c.codparing)
					group by b.nomparing";
				$tb2=$this->bd->select($this->sql2);
				
				$this->setX(12);
				$this->cell(15,5,$tb->fields["codpre"]);
				$this->setX(32);
				$this->cell(15,5,$tb2->fields["nomparing"]);
				$this->setX(150);
				$this->cell(25,5,number_format(0,2,'.',','),0,0,'R');
				$this->setX(175);
				$this->cell(25,5,number_format($tb2->fields["montoing"],2,'.',','),0,0,'R');
				$tot_est=$tot_est + 0;
				$tot_pre=$tot_pre + $tb2->fields["montoing"];
				//print $this->sql2;	
				$this->ln();
				$tb->MoveNext();
			}
				
			$this->SetAutoPageBreak(false);	
			$this->setXY(125,257);
			$this->SetFont("Arial","B",8);	
			$this->cell(20,10,'TOTALES');
			$this->SetFont("Arial","B",6.5);	
			$this->setX(150);
			$this->cell(25,10,number_format($tot_est,2,'.',','),0,0,'R');
			$this->setX(175);
			$this->cell(25,10,number_format($tot_pre,2,'.',','),0,0,'R');
		}		
	}
?>