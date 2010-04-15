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
		var $perdes;
		var $perhas;
			
		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","letter");
			$this->bd=new basedatosAdo();
			$this->perdes=$_POST["perdes"];
			$this->perhas=$_POST["perhas"];
			$this->titulo=$_POST["titulo"];			
		}
		

		function Header()
		{
			$this->SetLinewidth(0.5);
			$this->Line(20,$this->GetY(),263,$this->GetY());
			$this->Line(20,$this->GetY(),20,58);
			$this->Line(263,$this->GetY(),263,58);
			$this->Image("../../img/logo_1.jpg",27,11,23);
			$this->SetLinewidth(0);
			//Logo de la Empresa
			$this->SetFont("Arial","B",6);
			//fecha actual
			$fecha=date("d/m/Y");
			$this->Cell(225,10,' ');
			$this->Cell(15,10,'FECHA');
			$this->setLinewidth(0);
			//lineas fecha
			$this->line(235,22,253,22);
			$this->line(235,19,235,22);
			$this->line(253,19,253,22);
			$this->line(245,19,245,22);
			$this->line(240,19,240,22);
			$this->setXY(235,13);
			$this->Cell(5,15,substr($fecha,0,2));
			$this->Cell(5,15,substr($fecha,3,2));
			$this->Cell(10,15,substr($fecha,6,4));
			
			
			$this->ln(8);
			//Paginas
			$this->Cell(470,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
			$this->ln(5);
			
			$this->sql0="SELECT codemp, nomemp, ciuemp from empresa"; 
			$tb0=$this->bd->select($this->sql0);
			$this->Cell(15,5,'');				
			$this->Cell(50,10,'CODIGO DEL ENTE: '.$tb0->fields["codemp"],0,0,'L');	
			$this->ln(3);  $this->Cell(15,5,'');
			$this->Cell(50,10,'DENOMINACIÓN: '.$tb0->fields["nomemp"],0,0,'L');
			$this->ln(10);
			$this->SetFont("Arial","B",12);
				$this->SetTextColor(0,0,128);
			$this->Cell(240,5,'EJECUCIÓN FINANCIERA DE LAS ACCIONES ESPECIFICAS DEL ENTE',0,0,'C');
			$this->Ln(7);
			
			$this->SetLinewidth(0.5);
			$this->Line(20,$this->GetY(),263,$this->GetY());
			$this->Ln(5);
			
			$this->Line(20,$this->GetY(),263,$this->GetY());
			$this->Ln(0);
			$this->Line(20,$this->GetY(),20,200);//VERT 1 BORDE
			$this->SetLinewidth(0);
			$this->Line(35,$this->GetY(),35,200);//VERT2
			$this->Line(80,$this->GetY()+5,223,$this->GetY()+5);//HORIZ 1 
			$this->Line(80,$this->GetY(),80,200);//VERT3
		//	$this->Line(183,$this->GetY()+9,243,$this->GetY()+9);//HORIZ 2
			$this->Line(100,$this->GetY()+5,100,200); //VERT 4
			$this->Line(120,$this->GetY(),120,200); //VERT 5
			$this->Line(143,$this->GetY()+5,143,200); //VERT 6
			$this->Line(163,$this->GetY(),163,200); //VERT 7
			$this->Line(183,$this->GetY()+5,183,200); //VERT 8
			$this->Line(193,$this->GetY(),193,200); //VERT 9
			$this->Line(213,$this->GetY()+5,213,200); //VERT 10
			$this->Line(223,$this->GetY(),223,200); //VERT 11
			$this->Line(243,$this->GetY(),243,200); //VERT 12
			$this->SetLinewidth(0.5);
			$this->Line(263,$this->GetY(),263,200); //VERT 12
			$this->Line(20,200,263,200);
		//	$this->Ln(9);
			$this->setFont("Arial","B",6);
			$this->Cell(85,5,' 			',0,0,'L');
			$this->Cell(30,5,'PROGRAMADO',0,0,'L');
			$this->Cell(35,5,'EJECUTADO',0,0,'C');
			$this->Cell(31,5,'VARIACIÓN MES',0,0,'C');
			$this->Cell(33,5,'VARIACIÓN ACUMULADA',0,0,'C');
			$this->Cell(23,5,'RESPONSABLE',0,0,'L');
			$this->Cell(28,5,'PREVISIÓN ',0,0,'L');
			$this->Ln(4);
			$this->Cell(212,5,' 		',0,0,'C');
			$this->Cell(22,5,'DE LA EJECUCION',0,0,'L');
			$this->Cell(28,5,'ACTUALIZADA',0,0,'L');
			$this->Ln(4);
			$this->Cell(10,5,'');
			$this->Cell(15,5,'	CÓDIGO',0,0,'L');
			$this->Cell(50,5,'DENOMINACIÓN',0,0,'C');
			$this->Cell(18,5,'MENSUAL',0,0,'L');
			$this->Cell(20,5,'ACUMULADA',0,0,'L');
			$this->Cell(20,5,'MENSUAL',0,0,'L');
			$this->Cell(21,5,'ACUMULADA',0,0,'L');
			$this->Cell(20,5,'ABSOLUTA',0,0,'L');
			$this->Cell(10,5,'%',0,0,'L');
			$this->Cell(20,5,'ABSOLUTA',0,0,'L');
			$this->Cell(29,5,'%',0,0,'L');
			$this->Cell(28,5,'PROXIMO MES',0,0,'L');
			$this->Ln(5);
			$this->SetLinewidth(0.5);
			$this->Line(20,$this->GetY(),263,$this->GetY());
			$this->Ln(5);
			
		}
	

	
		function Cuerpo()
		{
			$tb2=$this->bd->select("select desaccesp, hasaccesp, lonaccesp from fordefegrgen");
			$a=$tb2->fields["desaccesp"];
			$b=$tb2->fields["lonaccesp"];
			$this->sql= "select
						 distinct(b.codpre) as cod,
						  a.codpre as codpre,
						  a.perpre,
						  a.moncau,
						  (a.monasi+a.montra+a.monadi-a.montrn-a.mondim) as progrmen,
						  b.nompre 
						  from cpasiini as a, cpdeftit as b, cpdefrep as c
						where
						substr(a.codpre,$a,$b) = c.codpre and
						trim(b.codpre) = c.codpre and 
						perpre>='".$this->perdes."' and
						perpre<='".$this->perhas."'"; 

	
			$tb= $this->bd->select($this->sql);			
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","B",6);
			$codigo=$tb->fields["cod"];
			$this->setX(25);
			$this->Cell(59,7,$codigo);
			$tprogmensual=0;
			$tprogacumula=0;			
			$tejecmensual=0;			
			$tejecacumula=0;
			$tvarm=0;
			$trelm=0;
			$tvara=0;
			$trela=0;
			while (!$tb->EOF)  
			{
			$progmensual=0;
			$progacumula=0;			
			$ejecmensual=0;			
			$ejecacumula=0;	
			$descripcion='';
		
 				while (($codigo==$tb->fields["cod"]) && (!$tb->EOF))
				{
				$progacumula+=$tb->fields["progrmen"];
				$ejecacumula+=$tb->fields["moncau"];
				if ($tb->fields["perpre"]==$this->perhas) {
				$progmensual+=$tb->fields["progrmen"];
				$ejecmensual+=$tb->fields["moncau"];
				}
				
				$descripcion=$tb->fields["nompre"];
				$tb->MoveNext();				
				} //fin del while codigo
			$this->Cell(16,7,number_format($progmensual,2,',','.'),0,0,'R');
			$this->Cell(20,7,number_format($progacumula,2,',','.'),0,0,'R');
			$this->Cell(23,7,number_format($ejecmensual,2,',','.'),0,0,'R');
			$this->Cell(20,7,number_format($ejecacumula,2,',','.'),0,0,'R');		
			$var= abs($progmensual-$ejecmensual);
			$this->Cell(20,7,number_format($var,2,',','.'),0,0,'R');
			$rel= $ejecmensual*100/$progmensual;
			$this->Cell(10,7,number_format($rel,2,',','.'),0,0,'R');
			$tvarm+=$var;
			$trelm+=$rel;
			$var= abs($progacumula-$ejecacumula);
			$this->Cell(20,7,number_format($var,2,',','.'),0,0,'R');
			$rel= $ejecacumula*100/$progacumula;
			$this->Cell(10,7,number_format($rel,2,',','.'),0,0,'R');		
			$tvara+=$var;
			$trela+=$rel;			
			$tprogmensual+=$progmensual;
			$tprogacumula+=$progacumula;			
			$tejecmensual+=$ejecmensual;			
			$tejecacumula+=$ejecacumula;

			$this->SetXY(35,$this->GetY()+1.5);
			$this->MultiCell(44,4,$descripcion);

			if (!$tb->EOF)
			 	{
				$codigo= $tb->fields["cod"];
				$this->setX(25);
				$this->Cell(59,7,$codigo);
				}
			} // fin del while
			
			$this->Line(20,$this->GetY(),263,$this->GetY());
			$this->SetX(70);
			$this->Cell(14,7,'Total...');
			$this->Cell(16,7,number_format($tprogmensual,2,',','.'),0,0,'R');
			$this->Cell(20,7,number_format($tprogacumula,2,',','.'),0,0,'R');
			$this->Cell(23,7,number_format($tejecmensual,2,',','.'),0,0,'R');
			$this->Cell(20,7,number_format($tejecacumula,2,',','.'),0,0,'R');		
			$this->Cell(20,7,number_format($tvarm,2,',','.'),0,0,'R');
			$this->Cell(10,7,number_format($trelm,2,',','.'),0,0,'R');
			$this->Cell(20,7,number_format($tvara,2,',','.'),0,0,'R');
			$this->Cell(10,7,number_format($trela,2,',','.'),0,0,'R');

		}
	}?>