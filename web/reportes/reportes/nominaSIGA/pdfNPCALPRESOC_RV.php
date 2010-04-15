<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");
	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $sqlx;
		var $rep;
		var $numero;
		var $cab;
		var $codempdes;
		var $codemphas;
		var $codcardes;
		var $codcarhas;
		var $codcatdes;
		var $codcathas;
		var $codcondes;
		var $codconhas;
		var $tipnom;
		var $e1;
		var $e2;
		var $e3;
		var $elaborado;
		var $revisado;
		var $autorizado;
		var $conf;
		var $nombre;
				
		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->codempdes=trim($_POST["codempdes"]);
			$this->codemphas=trim($_POST["codemphas"]);
			$this->e1=strtoupper(trim($_POST["e1"]));
			$this->e2=strtoupper(trim($_POST["e2"]));
			$this->e3=strtoupper(trim($_POST["e3"]));

			$this->sql="select a.*,to_char(a.feccor,'dd/mm/yyyy') as feccor,c.nomemp,to_char(b.feccal,'dd/mm/yyyy') as fecing 
					from NPPRESOCANT a, NPasiempcont b ,NPHOJINT c
					where 
					a.codemp=c.codemp and
					trim(a.codemp) >= trim('".$this->codempdes."') and  
					trim(a.codemp) <= trim('".$this->codemphas."') and 
					a.codemp=b.codemp";
			
			$this->sqlx="select a.*,to_char(a.feccor,'dd/mm/yyyy') as feccor,c.nomemp,to_char(b.feccal,'dd/mm/yyyy') as fecing 
					from NPPRESOCANT a, NPasiempcont b ,NPHOJINT c
					where 
					a.codemp=c.codemp and
					trim(a.codemp) >= trim('".$this->codempdes."') and  
					trim(a.codemp) <= trim('".$this->codemphas."') and 
					a.codemp=b.codemp";
			
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s");
			//$this->ln(5);
			
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$tbx=$this->bd->select($this->sqlx);
			$tbx->MoveLast();
			$ultimo=$tbx->fields["codemp"];
			
			
			while (!$tb->EOF)
			{
				$this->setFont("Arial","B",8);
				
				$this->SetFillColor(135,135,135);
				$this->Rect(10,$this->GetY(),25,3,'F');
				
				$this->ln(-1);
				$this->SetX(22);
				$this->cell(5,5,$tb->fields["codemp"],0,0,'C');
				$this->Rect(36,$this->GetY()+1,164,3,'F');

				$this->SetX(110);
				$this->cell(5,5,$tb->fields["nomemp"],0,0,'C');
				
				$this->ln(5);
				$this->setFont("Arial","B",7);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(10);
				$this->cell(5,5,"FECHA DE INGRESO:");
				$this->SetTextColor(0,0,0);
				$this->SetX(37);
				$this->cell(5,5,$tb->fields["fecing"],0,0,'L');
				//$this->ln(4);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(60);
				$this->cell(5,5,"FECHA DE CORTE:");
				$this->SetTextColor(0,0,0);
				$this->SetX(88);
				
				if (strtotime($tb->fields["fecing"]) < strtotime('18/06/1997'))
				{
					$cf_feccal=$tb1->fields["feccal"]-1;
				}
				else
				{
					$cf_feccal="";
				}
				$this->cell(5,5,$cf_feccal,0,0,'L');
			
				$this->ln(-1);
				$this->setFont("Arial","B",9);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(150);
				$this->cell(5,5,"TIEMPO DE SERVICIO:");
				$this->ln(4);
				$this->setFont("Arial","B",7);
				$this->SetTextColor(0,0,0);
				$this->SetX(150);
				$this->cell(5,5,"Años:",0,0,'L');
				$this->SetX(159);
				$this->cell(5,5,$tb->fields["anoser"],0,0,'L');
				$this->SetX(169);
				$this->cell(5,5,"Meses:",0,0,'L');
				$this->SetX(179);
				$this->cell(5,5,$tb->fields["messer"],0,0,'L');
				$this->SetX(187);
				$this->cell(5,5,"Días:",0,0,'L');
				$this->SetX(195);
				$this->cell(5,5,$tb->fields["diaser"],0,0,'L');
				
				$this->ln();
				
				// PRIMER RENGLON DEL EMPLEADO
				
				$this->Rect(10,$this->GetY(),190,8,'F');
				$this->ln(1);
				$this->setFont("Arial","",7);
				$this->Setx(40);
				$this->cell(5,5,'Del');
				$this->Setx(55);
				$this->cell(5,5,'Al');
				$this->Setx(102);
				$this->cell(5,5,'Devengado');
				$this->ln(-1);
				$this->Setx(85);
				$this->cell(5,5,'Años de');
				$this->Setx(125);
				$this->cell(5,5,'Antiguedad');
				$this->ln(3);
				$this->Setx(85);
				$this->cell(5,5,'Servicio');
				$this->Setx(125);
				$this->cell(5,5,'Acumulada');
				
				$this->ln(5);
				
				
					$sql2="select codemp,to_char(min(fecini),'dd/mm/yyyy') as f1,to_char(min(fecfin),'dd/mm/yyyy') as f2,
							anoser,salemp,antacum
							from npimppresocant
							where trim(codemp)=trim('".$tb->fields["codemp"]."')
							group by codemp,anoser,salemp,antacum
							order by min(fecini)";
					$tb2=$this->bd->select($sql2);
					
					$acumanti=0;
					$diasanti=0;
					$acumdiasanti=0;
					$diasadi=0;
					$acumdiasadi=0;
					$d108=0;
					$d108a=0;
					while (!$tb2->EOF)
					{
									
							$this->setFont("Arial","",6);
							$this->Setx(40);
							$this->cell(5,5,$tb2->fields["f1"],0,0,'C');
							$this->Setx(55);
							$this->cell(5,5,$tb2->fields["f2"],0,0,'C');
							$this->Setx(88);
							$this->cell(5,5,$tb2->fields["anoser"],0,0,'C');
							$this->Setx(111);
							$this->cell(5,5,number_format($tb2->fields["salemp"],2,'.',','),0,0,'R');
							$this->Setx(134);
							$this->cell(5,5,number_format($tb2->fields["antacum"],2,'.',','),0,0,'R');
										
							
							
							$this->Setx(34);
							//$this->cell(5,5,number_format($tb2->fields["salempdia"],2,'.',','),0,0,'R');
							$this->Setx(49);
							
							$this->ln(3);
					$tb2->MoveNext();
					}
				////////////////////////////////////////
				$this->ln(3);
				
				
				//4to renglon
				$this->Rect(10,$this->GetY()+3,190,17,'DF');
				$this->setFont("Arial","B",7);
				$this->SetTextColor(0,0,190);//azul
				$this->ln(5);
				$this->SetX(95);
				$this->cell(5,5,"ANTIGUEDAD PRESTACIONES SOCIALES (Régimen Viejo) Bs.:",0,0,'R');
				$this->SetTextColor(0,0,0);
				$this->SetX(155);
				$this->cell(5,5,number_format($tb->fields["antacu"],2,'.',','),0,0,'R');
				$this->ln(4);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(95);
				$this->cell(5,5,"COMPENSACION BONO DE TRANSFERENCIA Bs.:",0,0,'R');
				$this->SetTextColor(0,0,0);
				$this->SetX(155);
				$this->cell(5,5,number_format($tb->fields["bontra"],2,'.',','),0,0,'R');
				$this->ln(4);
				$this->SetTextColor(0,0,190);//azul
				$this->SetX(95);
				$this->cell(5,5,"TOTAL ANTIGUEDAD + COMPENSACION Bs.:",0,0,'R');
				$this->SetTextColor(0,0,0);
				$this->SetX(155);
				$this->cell(5,5,number_format($tb->fields["antacu"]+$tb->fields["bontra"],2,'.',','),0,0,'R');
				
				
				if ($ultimo!=$tb->fields["codemp"])
				{
					$this->AddPage();
				}
				else
				{
					$this->ln(10);
				}	
				
			$tb->MoveNext();
			}
			
			
			if ($this->GetY()>240)
			{
				$this->AddPage();
			}
			$this->setFont("Arial","B",7);
			$this->ln(5);
			$this->SetTextColor(0,0,190);//azul
			$this->line(15,$this->GetY(),55,$this->GetY());
			$this->line(80,$this->GetY(),120,$this->GetY());
			$this->line(155,$this->GetY(),195,$this->GetY());
			$this->ln(3);
			$this->SetX(25);
			$this->cell(5,5,"Elaborado por");
			$this->ln(-2);
			$this->SetX(97);
			$this->cell(5,5,"Jefe Dpto. de",0,0,'C');
			$this->SetX(173);
			$this->cell(5,5,"Director de Recursos",0,0,'C');
			$this->ln(3);
			$this->SetX(97);
			$this->cell(5,5,"Relaciones Laborales",0,0,'C');
			$this->SetX(173);
			$this->cell(5,5,"Humanos",0,0,'C');
			$this->ln(3);
			$this->SetX(97);
			$this->cell(5,5,"Revisado",0,0,'C');
			$this->SetX(173);
			$this->cell(5,5,"Autorizado",0,0,'C');
			
			$this->ln(-11);
			$this->SetTextColor(0,0,0);
			$this->SetX(32);
			$this->cell(5,5,$this->e1,0,0,'C');
			$this->SetX(97);
			$this->cell(5,5,$this->e2,0,0,'C');
			$this->SetX(173);
			$this->cell(5,5,$this->e3,0,0,'C');
			
		}
	}
?>