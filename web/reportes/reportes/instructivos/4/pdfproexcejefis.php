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
			$this->fpdf($this->conf,"mm","letter");
			$this->bd=new basedatosAdo();			
			$this->codemp=$_POST["codemp"];
			$this->nomemp=$_POST["nomemp"];
			$this->fecha=date("d/m/Y");
			$this->proyecto=$_POST["proyecto"];
			$this->accesp=$_POST["accesp"];
			$this->fuefin=$_POST["fuefin"];			
			$this->titulo=$_POST["titulo"];		
			$this->meshas=$_POST["hasta"];
			//$this->sql="select rtrim(codpre) as codpre from cpdefrep where nomrep='".$this->titulo."'";	
			
		$this->cab=new cabecera();
		}
		

		function Header()
		{
			//$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setTextcolor(0,0,0);
			$this->SetFont("Arial","B",8);
			$this->setLinewidth(0.7);
			//Tres cuadros principales
			$this->rect(10,9,260,37);
			//$this->line(10,17,270,17);
			$this->rect(10,50,260,150);
			$this->rect(10,50,260,28);
			$this->Image("../../img/logo_1.jpg",20,10,25);
			$this->setXY(8,32);
			$this->MultiCell(45,3,'
			'.$this->codemp.'  -  
			'.$this->nomemp,0,'C',0);
					$this->SetFont("Arial","B",6.6);
			$this->setXY(60,21);			
			$this->sql0=("select codpro,nompro from fordefpry where rtrim(codpro)=rtrim('".$this->proyecto."')");
			$tb0=$this->bd->select($this->sql0);
			$this->MultiCell(150,3,'PROYECTO:  '.$tb0->fields["codpro"].'  ---  '.$tb0->fields["nompro"]);

			$this->setXY(60,27);			
			$this->sql0=("select codaccesp,desaccesp from fordefaccesp where rtrim(codaccesp)=rtrim('".$this->accesp."')");
			$tb0=$this->bd->select($this->sql0);
			$this->MultiCell(150,3,'ACCIÓN ESPECÍFICA:  '.$tb0->fields["codaccesp"].'  ---  '.$tb0->fields["desaccesp"]);
			
			$this->setXY(60,33);			
			$this->sql0=("select codfin,nomext from fortipfin where rtrim(codfin)=rtrim('".$this->fuefin."')");
			$tb0=$this->bd->select($this->sql0);
			$this->Cell(60,10,'FUENTE DE FINANCIAMIENTO:  '.$tb0->fields["codfin"].'  ---  '.$tb0->fields["nomext"]);
										
			$this->SetFont("Arial","B",10);					
			$this->setXY(80,12);
			$this->setTextcolor(0,0,150);
			$this->MultiCell(140,3,$this->titulo,0,'C',0);
			$this->setXY(140,32);
			//$this->Cell(20,10,'(Bolivares)');						
			$this->setTextcolor(0,0,0);
			$this->SetFont("Arial","B",8);
			
			$this->setXY(250,16);
			$this->Cell(15,10,'FECHA');
			$this->setLinewidth(0);
			//lineas fecha
			$this->line(245,27,263,27);
			$this->line(245,24,245,27);
			$this->line(263,24,263,27);
			$this->line(250,24,250,27);
			$this->line(255,24,255,27);
			
			$this->setXY(245,18);
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
			$this->line(227,58,227,200);
			$this->line(232,50,232,200);
			$this->line(264,58,264,200);
			//linea quinta
			//$this->line(263,50,263,200);
			//lineas corta -H
			$this->line(108,58,270,58);
			//$this->line(200,66,270,66);
						
			$this->Formato();
		}
		
		function Formato()
		{
			$this->setXY(17,55);
			$this->SetFont("Arial","B",7);
			$this->Cell(10,10,'COD.');
			$this->setXY(49,55);
			$this->SetFont("Arial","B",10);
			$this->Cell(10,10,'DENOMINACIÓN');	
			$this->SetFont("Arial","B",8);		
			$this->setXY(113,50);
			$this->Cell(10,10,'PROGRAMADO');
			$this->setXY(163,50);
			$this->Cell(10,10,'EJECUTADO');
			$this->setXY(204,50);
			$this->Cell(10,10,'VARIACIÓN MES');
			$this->setXY(232,50);
			$this->Cell(10,10,'VARIACIÓN ACUMULADA');
			$this->setXY(116,60);
			$this->SetFont("Arial","",8);
			$this->Cell(15,10,'MES');			
			$this->Cell(10,10,'ACUMULADO');
			$this->setXY(162,60);
			$this->Cell(15,10,'MES');			
			$this->Cell(10,10,'ACUMULADO');
			$this->setXY(196,48);
			
			$this->setXY(228,60);
			$this->Cell(21,10,'%');
			$this->setXY(205,60);
			$this->Cell(22,10,'ABSOLUTA');
			$this->setXY(265,60);
			$this->Cell(22,10,'%');
			$this->setXY(238,60);
			$this->Cell(22,10,'ABSOLUTA');
			$this->setXY(230,34);
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
			$this->Cell(30,15,'Periodo: '.$this->meshas.' - '.$mes[$este],0,0,'R');
		   	$this->setXY(10,80);$this->SetFont("Arial","B",7);
		}
		
		
		
		function Cuerpo()
		{	
			//$this->Cell(10,10,'prueba');
			$this->SetFont("Arial","B",6.8);	
			
			$this->sql="select a.codpar,a.codpre,						
						c.nomparegr
						from fordetpryaccespmet a,cpasiini b, fordefparegr c
						where rtrim(a.codpre)=rtrim(b.codpre)
						and rtrim(a.codpar)=rtrim(c.codparegr)
						and (b.monasi-b.moncau<0)
						and b.perpre='00'						
						";			
			$tb=$this->bd->select($this->sql);
			$this->setY(80);
			$tot_pro=0;
			$tot_pro_acu=0;
			
			$tot_eje=0;
			$tot_eje_acu=0;
			
			$tot_var=0;
			$tot_var_acu=0;
			while (!$tb->EOF)
			{
		
				
					$this->setX(12);
					$this->cell(20,5,$tb->fields["codpar"]);
					$this->setX(35);
					$this->cell(20,5,$tb->fields["nomparegr"]);					
					
					$this->sql2="select sum(a.monasi) as monasi,sum(a.moncau) as moncau from cpasiini a
								where rtrim(a.codpre)=rtrim('".$tb->fields["codpre"]."')
								and a.perpre='".$this->meshas."' ";				
					$tb2=$this->bd->select($this->sql2);
					
					$this->sql3="select sum(a.monasi) as summonasi,sum(a.moncau) as summoncau from cpasiini a
								where rtrim(a.codpre)=rtrim('".$tb->fields["codpre"]."')
								and a.perpre>'00' and a.perpre<='".$this->meshas."' ";				
					$tb3=$this->bd->select($this->sql3);
					
						$this->setX(110);
						$this->cell(20,5,number_format($tb2->fields["monasi"],2,'.',','),0,0,'R');
						$this->setX(134);
						$this->cell(20,5,number_format($tb3->fields["summonasi"],2,'.',','),0,0,'R');
						
						$this->setX(156);
						$this->cell(20,5,number_format($tb2->fields["moncau"],2,'.',','),0,0,'R');
						$this->setX(180);
						$this->cell(20,5,number_format($tb3->fields["summoncau"],2,'.',','),0,0,'R');
						$auxmonasi=$tb2->fields["monasi"]-$tb2->fields["moncau"];
						$auxsummonasi=$tb3->fields["summonasi"]-$tb3->fields["summoncau"];
						$porc1=abs($auxmonasi*100)/$tb2->fields["monasi"];
						$porc2=abs($auxsummonasi*100)/$tb3->fields["summonasi"];
						
						$this->setX(207);
						if ($auxmonasi<0)
						$this->SetTextColor(255,0,0);						
						$this->cell(20,5,number_format($auxmonasi,2,'.',','),0,0,'R');
						$this->SetTextColor(0,0,0);
						$this->cell(5,5,number_format($porc1,0),0,0,'C');
						
						$this->setX(244);
						if ($auxsummonasi<0)
						$this->SetTextColor(255,0,0);
						$this->cell(20,5,number_format($auxsummonasi,2,'.',','),0,0,'R');
						$this->SetTextColor(0,0,0);
						$this->cell(5,5,number_format($porc2,0),0,0,'C');
						
						$tot_pro=$tot_pro + $tb2->fields["monasi"];
						$tot_pro_acu=$tot_pro_acu + $tb3->fields["summonasi"];
						
						$tot_eje=$tot_eje + $tb2->fields["moncau"];
						$tot_eje_acu=$tot_eje_acu + $tb3->fields["summoncau"];
						
						$tot_var=$tot_var + $auxmonasi;
						$tot_var_acu=$tot_var_acu + $auxsummonasi;
							
				
				//print $this->sql3;
				$this->ln();
				$tb->MoveNext();				
			}
				$this->SetAutoPageBreak(false);
				$this->setY(195);
				
				$this->setX(45);
				$this->cell(60,5,'TOTALES ',0,0,'C');
				
				$this->setX(110);
				$this->cell(20,5,number_format($tot_pro,2,'.',','),0,0,'R');
				
				$this->setX(134);
				$this->cell(20,5,number_format($tot_pro_acu,2,'.',','),0,0,'R');
				
				$this->setX(156);
				$this->cell(20,5,number_format($tot_eje,2,'.',','),0,0,'R');
				
				$this->setX(180);
				$this->cell(20,5,number_format($tot_eje_acu,2,'.',','),0,0,'R');
				
				$this->setX(207);
				$this->cell(20,5,number_format($tot_var,2,'.',','),0,0,'R');
				
				$this->setX(244);
				$this->cell(20,5,number_format($tot_var_acu,2,'.',','),0,0,'R');
				$this->SetAutoPageBreak(true,15);
							
		}		
	}
?>