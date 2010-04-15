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
			
			
		$this->cab=new cabecera();
		}
		

		function Header()
		{
			
			$this->setTextcolor(0,0,0);
			$this->SetFont("Arial","B",8);
			$this->setLinewidth(0.7);
			//Tres cuadros principales
			$this->rect(10,9,260,37);			
			$this->rect(10,50,260,150);
			$this->rect(10,50,260,28);
			$this->Image("../../img/logo_1.jpg",20,10,25);
			$this->setXY(8,32);
			$this->MultiCell(45,3,'
			'.$this->codemp.'  -  
			'.$this->nomemp,0,'C',0);
					$this->SetFont("Arial","B",6.6);
			$this->setXY(60,18);			
			$this->sql0=("select codpro,nompro,fecini,feccul from fordefpry where rtrim(codpro)=rtrim('".$this->proyecto."')");
			$tb0=$this->bd->select($this->sql0);
			$this->MultiCell(150,3,'PROYECTO:  '.$tb0->fields["codpro"].'  ---  '.$tb0->fields["nompro"]);

			$this->setXY(60,28);		
			$this->Cell(60,10,'FECHA DE INICIO:  '.$tb0->fields["fecini"]);
			$this->setXY(100,28);
			$this->Cell(60,10,'FECHA DE CULMINACION:  '.$tb0->fields["feccul"]);
			
			$this->setXY(60,24);			
			$this->sql0=("select codaccesp,desaccesp from fordefaccesp where rtrim(codaccesp)=rtrim('".$this->accesp."')");
			$tb0=$this->bd->select($this->sql0);
			$this->MultiCell(150,3,'ACCIÓN ESPECÍFICA:  '.$tb0->fields["codaccesp"].'  ---  '.$tb0->fields["desaccesp"]);	
			
										
			$this->setXY(60,33);			
			$this->sql0=("select sum(totpre) as totpre from forencpryaccespmet where rtrim(codpro)=rtrim('".$this->proyecto."')");
			$tb0=$this->bd->select($this->sql0);
			$this->Cell(60,10,'COSTO TOTAL Bs.: '.number_format($tb0->fields["totpre"],2,'.',','));
			
			
			$this->SetFont("Arial","B",10);					
			$this->setXY(80,12);
			$this->setTextcolor(0,0,150);
			$this->MultiCell(140,3,$this->titulo,0,'C',0);
			$this->setXY(140,32);
								
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
			$this->line(26,50,26,200);
			//lineas segundas 
			$this->line(70,50,70,200);
			$this->line(91.5,50,91.5,200);
			//LINEAS ULTIMAS
			$this->line(226,50,226,200);
			$this->line(248,50,248,200);
			
			//lineas Horizontales
			$this->line(91.5,55,225.5,55);
			$this->line(91.5,60,225.5,60);
			$this->line(91.5,65,225.5,65);
			
			
						
			$this->Formato();
		}
		
		function Formato()
		{
			$this->setXY(11,55);
			$this->SetFont("Arial","B",8);
			$this->Cell(10,10,'CODIGO');
			$this->setXY(40,55);
			//$this->SetFont("Arial","B",10);
			$this->Cell(10,10,'PARTIDA');	
			//$this->SetFont("Arial","B",8);		
			$this->setXY(72,55);
			$this->Cell(10,10,'ASIGNADO');
			$this->setXY(78,55);
			$ano=date("Y");
			$this->Cell(10,16,'AL');
			$this->setXY(72,55);
			$this->Cell(10,22,'31/12/'.($ano-1));
			$x=$this->GetX();
			$this->setXY(135,48);			
			$this->Cell(10,10,'FUENTE DE FINANCIAMIENTO');
			
			$this->setXY(151,48);
			$this->Cell(10,19,$ano);
			
			$this->setXY(233,55);
			$this->Cell(10,10,'2008');
			$x2=$this->GetX()-10;
			$this->setXY(255,55);
			$this->Cell(10,10,'Años');
			$this->setXY(251,55);
			$this->Cell(10,15,'Posteriores');
			
			//parte dinamica 
			
			$this->setXY(95,58);
			$this->Cell(40,10,'     Recursos Propios');
			$this->Cell(62,10,'Transferencias de la Republica');
			$this->Cell(25,10,'Otros');
			$this->line(135,60,135,200);
			$this->line(180,60,180,200);
			//partede recursos propios
			$this->line(108.5,65,108.5,200);
			$this->line(122.5,65,122.5,200);
			
			$this->SetFont("Arial","B",7);
			$this->setXY(95,68);
			$this->Cell(10,5,'Contratos');
			$this->Cell(15,5,'      Nuevos');
			$this->Cell(10,5,'      Otros');
			$this->setXY(95,68);
			$this->Cell(10,10,'Vigentes');
			$this->Cell(10,10,'     Contratos');
			
			//partede transferencias
			$this->setXY(137,68);
			$this->line(151,65,151,200);
			$this->line(166,65,166,200);
			
			$this->SetFont("Arial","B",7);
	
			$this->Cell(10,5,'Contratos');
			$this->Cell(15,5,'        Nuevos');
			$this->Cell(10,5,'        Otros');
			$this->setXY(137,68);
			$this->Cell(10,10,'Vigentes');
			$this->Cell(10,10,'       Contratos');
			
			//partede otros
			$this->setXY(180,68);
			$this->line(194,65,194,200);
			$this->line(208,65,208,200);
			
			$this->SetFont("Arial","B",7);
	
			$this->Cell(10,5,'Contratos');
			$this->Cell(15,5,'        Nuevos');
			$this->Cell(10,5,'        Otros');
			$this->setXY(180,68);
			$this->Cell(10,10,'Vigentes');
			$this->Cell(10,10,'      Contratos');
			
			$this->SetFont("Arial","B",8);
			$this->setY(80);
			
		}
		
		
		
		function Cuerpo()
		{	
			
			$this->SetFont("Arial","B",6.8);	
			
			$this->sql="select a.codpro,a.codpar,sum(a.monpre) as monpre,b.nomparegr from fordetpryaccespmet a,fordefparegr b
						where rtrim(a.codpro)=rtrim('".$this->proyecto."')
						and rtrim(a.codaccesp)=rtrim('".$this->accesp."')
						and rtrim(a.codpar)=rtrim(b.codparegr)
						group by a.codpro,a.codpar,b.nomparegr";			
			$tb=$this->bd->select($this->sql);
		
			
			
			if ($tb->EOF)
			{
					?>
						<script language="javascript">
							alert("No hay Informacion para Procesar este Reporte")
							location="proexcejefis.php"
						
						</script>					
					<?					
			}
			while (!$tb->EOF)
			{
		
				
					$this->setX(12);
					$this->cell(20,4,$tb->fields["codpro"]);
					$this->setX(27);
					$this->cell(20,4,'');
					
						$this->setX(72);
						$this->cell(20,4,number_format($tb->fields["monpre"],2,'.',','),0,0,'R');
												
					
						
						$this->setX(27);
						$this->multicell(40,4,$tb->fields["nomparegr"]);
			
				
				
				$this->ln(2);
				$tb->MoveNext();				
			}
				
							
		}		
	}
?>