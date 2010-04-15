<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");

	class pdfreporte extends fpdf
	{
		var $tb;
		var $bd;					
		var $titulo;
		var $coddes;
		var $codhas;
			
		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","letter");
			$this->bd=new basedatosAdo();
			$this->coddes=$_POST["coddes"];
			$this->codhas=$_POST["codhas"];
			$this->titulo=$_POST["titulo"];			
		}
		

		function Header()
		{
			$this->SetLinewidth(0.5);
			$this->Line(15,$this->GetY(),205,$this->GetY());
			$this->Line(15,$this->GetY(),15,58);
			$this->Line(205,$this->GetY(),205,58);
			$this->SetLinewidth(0);
			//Logo de la Empresa
			$this->SetFont("Arial","B",6);
			//fecha actual
			$fecha=date("d/m/Y");
			$this->SetXY(173,11);
			$this->Cell(15,10,'FECHA');
			$this->setLinewidth(0);
			//lineas fecha
			$this->line(185,17,203,17);
			$this->line(185,14,185,17);
			$this->line(203,14,203,17);
			$this->line(195,14,195,17);
			$this->line(190,14,190,17);
			$this->setXY(185,8.3);
			$this->Cell(5,15,substr($fecha,0,2));
			$this->Cell(5,15,substr($fecha,3,2));
			$this->Cell(10,15,substr($fecha,6,4));
			
			$this->SetXY(173,17);
			//Paginas
			$this->Cell(20,10,'Pagina '.$this->PageNo().' de {nb}');
			
			$this->sql0="SELECT codemp, nomemp, ciuemp from empresa"; 
			$tb0=$this->bd->select($this->sql0);
			$this->SetXY(20,13);
			$this->Cell(50,5,'CODIGO DEL ENTE: '.$tb0->fields["codemp"],0,0,'L');	
			$this->SetXY(20,18);
			$this->Cell(50,5,'DENOMINACIÓN: '.$tb0->fields["nomemp"],0,0,'L');
			$this->SetFont("Arial","B",12);
			$this->SetTextColor(0,0,128);
			$this->SetXY(20,35);
			$this->Cell(190,5,'RELACION DE TRANSEFERENCIAS OTORGADAS',0,0,'C');
			$this->SetXY(20,40);
			$this->Cell(190,5,'A ENTES DEL SECTOR PRIVADO',0,0,'C');
			$this->SetXY(20,45);
			$this->Cell(190,5,'(En Bolivares)',0,0,'C');
			$this->Ln(7);
			
			$this->SetLinewidth(0.5);
			$this->Line(15,$this->GetY(),205,$this->GetY());
			$this->Ln(5);
			
			$this->Line(15,$this->GetY(),205,$this->GetY());
			$this->Ln(0);
			$this->Line(15,$this->GetY(),15,260);//VERT 1 BORDE
			$this->SetLinewidth(0);
			$this->Line(40,$this->GetY(),40,260);//VERT2
			$this->Line(130,$this->GetY(),130,260); //VERT 7
			$this->Line(155,$this->GetY(),155,260); //VERT 9
			$this->Line(180,$this->GetY(),180,260); //VERT 11

			$this->SetLinewidth(0.5);
			$this->Line(205,$this->GetY(),205,260); //VERT 12
			$this->Line(15,260,205,260);


			$this->setFont("Arial","B",11);
			$this->SetXY(135,60);
			$this->Cell(25,5,'REAL',0,0,'L');
			$this->Cell(25,5,'ULTIMO',0,0,'L');
			$this->Cell(20,5,'MONTO',0,0,'L');	
			$this->SetXY(18,66);			
			$this->Cell(50,5,'	CÓDIGO',0,0,'L');
			$this->Cell(68,5,'DENOMINACIÓN',0,0,'L');
			$this->Cell(21,5,'2005',0,0,'L');
			$this->Cell(28,5,'ESTIMADO',0,0,'L');
			$this->Cell(20,5,'ANUAL',0,0,'L');
			$this->SetXY(162,72);
			$this->Cell(25,5,'2006',0,0,'L');
			$this->Cell(32,5,'2007',0,0,'L');

			$this->Ln(5);
			$this->SetLinewidth(0.5);
			$this->Line(15,$this->GetY(),205,$this->GetY());
			$this->Ln(5);
			
		}
	

	
		function Cuerpo()
		{

			$this->sql= "select b.codpar, a.nomparegr,
						sum(b.monpre) as monto
						from fordefparegr a, fordetpryaccespmet b, cpdefrep c
						where (b.codpar=c.codpre)
						and (c.nomrep='RELTRAENTSECPRI')
						and (b.codpar=a.codparegr)
						and trim(b.codpar)>= '".$this->coddes."'
						and trim(b.codpar)<= '".$this->codhas."'
						group by codpar, nomparegr
						order by codpar ";

			$tb= $this->bd->select($this->sql);			
			$this->SetFont("Arial","",9.5);
			$this->SetY(80);
			$total=0;

			while (!$tb->EOF)  
			{
				$this->SetX(17);
				$this->Cell(167,5,$tb->fields["codpar"]);
				$this->Cell(20,5, number_format($tb->fields["monto"],2,',','.'),0,'R',0);
				$this->SetXY(41,$this->GetY());
				$this->MultiCell(88,5,$tb->fields["nomparegr"]);
				$total+= $tb->fields["monto"];
				$this->ln(2);
				$tb->MoveNext();
			}

			$this->Line(15,$this->GetY(),205,$this->GetY());
			$this->SetX(70);
			$this->Cell(114,7,'Total...');
			$this->Cell(20,7,number_format($total,2,',','.'),0,0,'R');


		}
	}?>