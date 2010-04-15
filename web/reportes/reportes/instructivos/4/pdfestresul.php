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
		    $this->conf="l";
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
			$this->rect(10,9,280,37);
			$this->rect(10,50,280,150);
			$this->rect(10,50,280,28);
			$this->Image("../../img/logo_1.jpg",20,10,25);
			$this->setXY(10,32);
			$this->MultiCell(45,3,'
			'.$this->codemp.'
			'.$this->nomemp,0,'C',0);						
			$this->SetFont("Arial","B",10);
			$this->setXY(80,30);
			$this->setTextcolor(0,0,150);
			$this->MultiCell(140,3,$this->titulo,0,'C',0);
			$this->setXY(140,32);
			$this->Cell(20,10,'(Bolivares)');						
			$this->setTextcolor(0,0,0);
			$this->SetFont("Arial","B",8);
			$this->setXY(18,20);
			//$this->Cell(60,10,$this->orgads);
			$this->setXY(270,10);
			$this->Cell(15,10,'FECHA');
			$this->setLinewidth(0);
			//lineas fecha
			$this->line(265,22,283,22);
			$this->line(265,19,265,22);
			$this->line(283,19,283,22);
			$this->line(270,19,270,22);
			$this->line(275,19,275,22);
			
			$this->setXY(265,13);
			$this->Cell(5,15,substr($this->fecha,0,2));
			$this->Cell(5,15,substr($this->fecha,3,2));
			$this->Cell(10,15,substr($this->fecha,6,4));
			//lineavertical primera 
			$this->line(32,50,32,200);
			//lineas segundas 
			$this->line(108,50,108,200);
			$this->line(130,58,130,200);
			//lineas tercera -V
			$this->line(154,50,154,200);
			$this->line(176,58,176,200);
			//lineas cuarta
			$this->line(200,50,200,200);
			$this->line(225,58,225,200);
			$this->line(231,58,231,200);
			$this->line(257,66,257,200);
			//linea quinta
			$this->line(263,50,263,200);
			//lineas corta -H
			$this->line(108,58,263,58);
			$this->line(225,66,263,66);
						
			$this->Formato();
		}
		
		function Formato()
		{
			$this->setXY(17,55);
			$this->SetFont("Arial","B",7);
			$this->Cell(10,10,'COD.');
			$this->setXY(49,55);
			$this->SetFont("Arial","B",10);
			$this->Cell(10,10,'D E N O M I N A C I Ó N');	
			$this->SetFont("Arial","B",9);		
			$this->setXY(113,50);
			$this->Cell(10,10,'P R O G R A M A D O');
			$this->setXY(163,50);
			$this->Cell(10,10,'E J E C U T A D O');
			$this->setXY(220,50);
			$this->Cell(10,10,'V A R I A C I Ó N');
			$this->setXY(260,46);
			$this->MultiCell(30,5,'
			PREVISIÓN
			PRÓXIMO
			MES',0,'C',0);
			$this->setXY(116,60);
			$this->SetFont("Arial","",8);
			$this->Cell(15,10,'MES');			
			$this->Cell(10,10,'ACUMULADO');
			$this->setXY(162,60);
			$this->Cell(15,10,'MES');			
			$this->Cell(10,10,'ACUMULADO');
			$this->setXY(196,48);
			$this->MultiCell(30,10,'
			MES
			ABSOLUTA',0,'C',0);
			$this->setXY(225,68);
			$this->Cell(21,10,'%');
			$this->setXY(235,68);
			$this->Cell(22,10,'ABSOLUTA');
			$this->setXY(257,68);
			$this->Cell(22,10,'%');
			$this->setXY(239,58);
			$this->Cell(22,10,'ACUMULADO');
			$this->setXY(10,80);
			$this->setXY(245,34);
			$this->SetFont("Arial","B",9);
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
			$this->Cell(10,15,'Periodo: '.$this->meshas.' - '.$mes[$este]);
			$this->setXY(10,80);
			$this->SetFont("Arial","B",7);
		}
		
		function Cuerpo()
		{	
			//$this->Cell(10,10,'prueba');
			$this->SetFont("Arial","B",6.8);	
			$tb=$this->bd->select($this->sql);
			//$this->Cell(10,10,$this->titulo);
			$sw=0;
			$tot_ing_prog=0;
			$tot_egre_prog=0;
			while (!$tb->EOF)
			{
				
				$this->sql2="select descta from contabb where rtrim(codcta)=rtrim('".$tb->fields["codpre"]."')";
				$tb2=$this->bd->select($this->sql2);
								
				$ing=substr($tb->fields["codpre"],0,1);
				
				
				if ($ing==5)
				{						
					$this->sql3="select sum(coalesce(a.monasi,0)) as monasi from ciasiini a, cpdeftit b where rtrim(a.codpre)=rtrim(b.codpre) and  perpre>'00' and  perpre<='".$this->meshas."' and rtrim(b.codcta)=rtrim('".$tb->fields["codpre"]."')";
					$tb3=$this->bd->select($this->sql3);
					
					$this->sql31="select sum(coalesce(a.monasi,0)) as monasi from ciasiini a, cpdeftit b where rtrim(a.codpre)=rtrim(b.codpre) and  perpre='".$this->meshas."' and rtrim(b.codcta)=rtrim('".$tb->fields["codpre"]."')";
					$tb31=$this->bd->select($this->sql31);
					
					$mon_prog_acu=$tb3->fields["monasi"];
					
					
					
					$mon_prog=$tb31->fields["monasi"];
					if ($mon_prog_acu == null)  
					{
						$this->sql4="select sum(salprgper) as salprgper from contabb1 where pereje>'00' and pereje<='".$this->meshas."' and rtrim(codcta) =rtrim('".$tb->fields["codpre"]."')";
						$tb4=$this->bd->select($this->sql4);
						$mon_prog_acu=$tb4->fields["salprgper"];
						
						
						$this->sql41="select sum(salprgper) as salprgper from contabb1 where pereje='".$this->meshas."' and rtrim(codcta) =rtrim('".$tb->fields["codpre"]."')";
						$tb41=$this->bd->select($this->sql41);
						$mon_prog=$tb41->fields["salprgper"];						
					}
					
					$tot_ing_prog=$tot_ing_prog + $mon_prog_acu;					
				}else
				{
					$this->sql3="select sum(coalesce(a.monasi,0)) as monasi from cpasiini a, cpdeftit b where rtrim(a.codpre)=rtrim(b.codpre) and  perpre>'00' and  perpre<='".$this->meshas."' and rtrim(b.codcta)=rtrim('".$tb->fields["codpre"]."')";
					$tb3=$this->bd->select($this->sql3);
					
					$this->sql31="select sum(coalesce(a.monasi,0)) as monasi from cpasiini a, cpdeftit b where rtrim(a.codpre)=rtrim(b.codpre) and  perpre='".$this->meshas."' and rtrim(b.codcta)=rtrim('".$tb->fields["codpre"]."')";
					$tb31=$this->bd->select($this->sql31);
					
					$mon_prog_acu=$tb3->fields["monasi"];
					
					$tot_egre_prog=$tot_egre_prog + $mon_prog_acu;
					
					$mon_prog=$tb31->fields["monasi"];					
				}
				
				$this->sql5="select sum(salact) as salact from contabb1 where pereje>'00' and pereje<='".$this->meshas."' and rtrim(codcta)=rtrim('".$tb->fields["codpre"]."')";
				$tb5=$this->bd->select($this->sql5);
				
				$mon_ejec_acu=abs($tb5->fields["salact"]);
				
				if ($ing==5)
				{
					$tot_ing_ejec=$tot_ing_ejec + $mon_ejec_acu;
				}else
				{
					$tot_egre_ejec=$tot_egre_ejec + $mon_ejec_acu;
				}
				
				$this->sql51="select sum(salact) as salact from contabb1 where pereje='".$this->meshas."' and rtrim(codcta)=rtrim('".$tb->fields["codpre"]."')";
				$tb51=$this->bd->select($this->sql51);
				
				$mon_ejec=abs($tb51->fields["salact"]);
				
				$mon_var_acu=$mon_prog_acu-$mon_ejec_acu;
				
				
				if ($ing==5)
				{
					$tot_ing_var=$tot_ing_var + $mon_var_acu;
				}else
				{
					$tot_egre_var=$tot_egre_var + $mon_var_acu;
				}
				
				$mon_var=$mon_prog-$mon_ejec;				
				
				
				if (($sw==0))
				{
					$X=$this->GetX();
					$Y=$this->GetY();
					$this->setXY(32,80);
					$this->SetFont("Arial","B",9);					
					$this->Cell(10,10,'1. Ingresos Corrientes');
					$this->SetFont("Arial","",6.8);
					$sw=1;
					$this->ln();
					$this->setXY($X,$Y+6);
				}
				
				if (($sw==1) and ($ing==6))
				{
					$X=$this->GetX();
					$Y=$this->GetY();
					$this->setTextcolor(0,0,250);
					$this->setY($this->GetY()+8);
					$this->setX(129);
					$this->Cell(25,0,number_format($tot_ing_prog,2,'.',','),0,0,'R');
					$this->setX(170);
					$this->Cell(30,0,number_format($tot_ing_ejec,2,'.',','),0,0,'R');
					$this->setX(227);
					$this->Cell(30,0,number_format($tot_ing_var,2,'.',','),0,0,'R');
					$this->setTextcolor(0,0,0);
					
					
					$this->setXY(32,$Y);
					$this->SetFont("Arial","B",9);					
					$this->Cell(10,25,'2. Gastos Corrientes');
					$this->SetFont("Arial","",6.8);
					$sw=2;
					$this->ln();
					$this->setXY($X,$Y+16);
					$Y2=$this->GetY()-6;
				}
				
				
				$this->Cell(15,10,$tb->fields["codpre"],0,0,'L');
				
				$this->setX(110);
				$this->Cell(20,10,number_format($mon_prog,2,'.',','),0,0,'R');
				$this->Cell(24,10,number_format($mon_prog_acu,2,'.',','),0,0,'R');
				$this->Cell(22,10,number_format($mon_ejec,2,'.',','),0,0,'R');
				$this->Cell(24,10,number_format($mon_ejec_acu,2,'.',','),0,0,'R');
				
				if ($mon_var<0)
				{
					$this->setTextcolor(255,0,0);
				}				
				$this->Cell(25,10,number_format($mon_var),0,0,'R');
				$this->setTextcolor(0,0,0);
				
			   if ($mon_prog!=0)
				{
					$porc2=((((abs($mon_var))*100)/$mon_prog));
				}else
				{
					$porc2=0;
				}
				$this->Cell(5,10,number_format($porc2,0),0,0,'C');
				
				
				if ($mon_var_acu<0)
				{
					$this->setTextcolor(255,0,0);
				}
				$this->Cell(27,10,number_format($mon_var_acu,2,'.',','),0,0,'R');
				$this->setTextcolor(0,0,0);
				if ($mon_prog_acu!=0)
				{
					$porc=((((abs($mon_var_acu))*100)/$mon_prog_acu));
				}else
				{
					$porc=0;
				}
				$this->Cell(6,10,number_format($porc,0),0,0,'C');
				
				
				//monto prevision falta campo
				$this->Cell(25,10,number_format(0.00,2,'.',','),0,0,'R');
				//al obtener campo calcular su total//
				
				
				//colocar multicell
				$this->setX(33);
				$this->Cell(10,10,$tb2->fields["descta"],0,0,'L');
				$this->ln(5);
							 
				$tb->MoveNext();
			}
				
				$this->setTextcolor(0,0,250);
				$Y3=$this->GetY()+8;				
				$this->setY($Y3-6);
				$this->setX(129);
				$this->Cell(25,10,number_format($tot_egre_prog,2,'.',','),0,0,'R');
				$this->setX(170);
				$this->Cell(30,10,number_format($tot_egre_ejec,2,'.',','),0,0,'R');
				$this->setX(227);
				$this->Cell(30,10,number_format($tot_egre_var,2,'.',','),0,0,'R');		
				$this->ln();
				
				$total_prog= $tot_ing_prog - $tot_egre_prog; 
				
				$total_ejec= $tot_ing_ejec - $tot_egre_ejec;
				
				$total_var= $tot_ing_var - $tot_egre_var;
				
				
				$this->setXY(32,$this->GetY()-4);
				$this->SetFont("Arial","B",9);$this->setTextcolor(0,0,0);					
				$this->Cell(10,10,'3.  Resultado del Ejercicio');
				$this->SetFont("Arial","B",7);$this->setTextcolor(0,0,250);
				$this->setX(144);
				if ($total_prog<0)
				{
					$this->setTextcolor(255,0,0);
				}
				$this->Cell(10,10,number_format($total_prog,2,'.',','),0,0,'R');
				$this->setTextcolor(0,0,250);
				
				$this->setX(190);
				if ($total_ejec<0)
				{
					$this->setTextcolor(255,0,0);
				}
				$this->Cell(10,10,number_format($total_ejec,2,'.',','),0,0,'R');
				$this->setTextcolor(0,0,250);
	
				$this->setX(247);
				if ($total_var<0)
				{
					$this->setTextcolor(255,0,0);
				}
				$this->Cell(10,10,number_format($total_var,2,'.',','),0,0,'R');
				$this->setTextcolor(0,0,250);
				
							
		}		
	}
?>