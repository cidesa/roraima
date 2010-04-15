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
			$this->fpdf($this->conf,"mm","A4");
			$this->bd=new basedatosAdo();			
			$this->codemp=$_POST["codemp"];
			$this->nomemp=$_POST["nomemp"];
			$this->fecha=date("d/m/Y");
			$this->orgads=$_POST["orgads"];
			$this->titulo=$_POST["titulo"];		
			$this->meshas=$_POST["hasta"];
			$this->sql="select rtrim(codpre) as codpre from cpdefrep where nomrep='".$this->titulo."'";	
			
		$this->cab=new cabecera();
		}
		

		function Header()
		{
			//$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setTextcolor(0,0,0);
			$this->SetFont("Arial","B",7);
			$this->setLinewidth(0.7);
			//Tres cuadros principales
			$this->rect(10,9,190,37);
			$this->rect(10,50,190,240);
			$this->rect(10,50,190,20);
			$this->Image("../../img/logo_1.jpg",24,10,25);
			$this->setXY(04,32);
			$this->MultiCell(60,3,'
			'.$this->codemp.'
			'.$this->nomemp,0,'C',0);						
			$this->SetFont("Arial","B",9);
			$this->setXY(40,30);
			$this->setTextcolor(0,0,150);
			$this->MultiCell(140,3,$this->titulo,0,'C',0);
			$this->setXY(50,30);
			$this->Cell(120,10,'- ENTES DESENTRALIZADOS SIN FINES EMPRESARIALES -',0,0,'C');
			$this->setXY(50,30);
			$this->Cell(120,18,'(Bolivares)',0,0,'C');						
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
			$this->line(30,50,30,290);
			//lineas segundas 
			$this->line(88,50,88,290);
			
			//lineas tercera -V
			$this->line(116,50,116,290);
		
			//lineas cuarta
			$this->line(144,50,144,290);
			
			//linea quinta
			$this->line(172,50,172,290);
			//lineas corta -H
			//$this->line(108,58,263,58);
			//$this->line(200,66,263,66);
						
			$this->Formato();
		}
		
		function Formato()
		{
			$this->setXY(17,55);
			$this->SetFont("Arial","B",7);
			$this->Cell(10,10,'COD.');
			$this->setXY(40,55);
			$this->SetFont("Arial","B",8);
			$this->Cell(10,10,'CONCEPTO');	
						
			$this->setXY(90,55);
			$this->Cell(10,10,'PROGRAMADO');
			$this->setXY(120,55);
			$this->Cell(10,10,'EJECUTADO');
			$this->setXY(142,57);
			$this->MultiCell(30,2,'
			VARIACIÓN 
			
			ABSOLUTA',0,'C',0);
			$this->setXY(177,55);
			$this->Cell(10,10,'VARIACIÓN');
			$this->setX($this->GetX()-4);
			$this->Cell(10,18,'%');
			
			$this->setXY(180,34);
			
			$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$numero= array("","01","02","03","04","05","06","07","08","09","10","11","12");
			for ($i=0;$i<=12;$i++)
			{
				if ($numero[$i] == $this->meshas)
			{
				$este=$i;
				break;
			}
	
			}
			$this->Cell(10,18,'Periodo: '.$this->meshas.' - '.$mes[$este],0,0,'R');
		   	$this->setXY(10,75);
		}
		
		function Cuerpo()
		{	
			
			$this->SetFont("Arial","B",6);	
			$tb=$this->bd->select($this->sql);		
		
			while (!$tb->EOF)
			{
				
				$this->sql2="select descta from contabb where rtrim(codcta)=rtrim('".$tb->fields["codpre"]."')";
				$tb2=$this->bd->select($this->sql2);
								
				//$ing=substr($tb->fields["codpre"],0,1);
				
				$this->sql3="select sum(salprgper) as salprgper from contabb where rtrim(codcta)=rtrim('".$tb->fields["codpre"]."')";
				$tb3=$this->bd->select($this->sql3);
				$mon_prog=$tb3->fields["salprgper"];
				
				$this->sql4="select sum(salact) as salact from contabb1 where pereje>'00' and pereje<='".$this->meshas."' and rtrim(codcta)=rtrim('".$tb->fields["codpre"]."')";
				$tb4=$this->bd->select($this->sql4);
				$mon_ejec=abs($tb4->fields["salact"]);
				
				$mon_var=$mon_prog-$mon_ejec;
				
				$this->Cell(15,3,$tb->fields["codpre"],0,0,'L');
				$this->Cell(65,3,'',0,0,'L');
				$this->Cell(25,3,number_format($mon_prog,2,'.',','),0,0,'R');
				$this->Cell(1);
				$this->Cell(27,3,number_format($mon_ejec,2,'.',','),0,0,'R');
				$this->Cell(1);				
				if ($mon_prog>0)
				{
					$porc=abs(($mon_var*100)/$mon_prog);
				}
				
				
				if ($mon_var<0)
				{
					$this->setTextcolor(255,0,0);					
				}
				$this->Cell(27,3,number_format($mon_var,2,'.',','),0,0,'R');
				$this->setTextcolor(0,0,0);
				$this->Cell(27,3,number_format($porc,0),0,0,'C');
				//al obtener campo calcular su total//					
				$this->setX(30);
				$this->MultiCell(60,3,$tb2->fields["descta"],0,'L',0);
			
							 
				$tb->MoveNext();
			}
								
		}		
	}
?>