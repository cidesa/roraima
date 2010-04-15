<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");

	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $tb;
		var $cab;
		var $titulos;
	
		var $periododes;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->bd=new basedatosAdo();		
			$this->periododes=$_POST["periododes"];


      		$this->sql=  "select 
					substr(b.codpre,12,12) as cod,
					b.nompre, 
					a.salprgper, 
					(a.totdeb - a.totcre) as ejemes, 
					a.salact
					from contabb1 as a, cpdeftit as b, cpdefrep as c
					where
					c.codpre like 'cod%'
					and a.codcta = b.codcta 
					and a.pereje = '".$this->periododes."' 
					and c.nomrep = 'INVERSIONES' 
					order by b.codpre";
			
			
		$this->cab=new cabecera();		
		}
				
		function Header()
		{

			$this->SetLineWidth(0.5);
			$this->Rect(10,10,195,22);
			$this->SetTextColor(0,0,0);
			$this->SetFont("Arial","",7);
			$this->SetXY(10,10);	
			$this->Cell(10,5,'CÓDIGO DEL ENTE',0,0,'L');
			$this->SetXY(10,14);	
			$this->Cell(10,5,'DENOMINACIÓN',0,0,'L');
			$this->SetXY(10,18);	
			$this->Cell(10,5,'ÓRGANO DE ADSCRIPCIÓN',0,0,'L');

			$this->SetXY(180,10);	
			$this->Cell(10,5,'FECHA',0,0,'L'); 
			$this->SetXY(179,14);	
			$this->Cell(10,5,date("d"),0,0,'L');
			$this->SetX(183);
			$this->Cell(10,5,date("m"),0,0,'L');
			$this->SetX(187);
			$this->Cell(10,5,date("y"),0,0,'L');						
			$this->SetLineWidth(0);
			$this->Line(179,18,191,18);
			$this->Line(179,16,179,18);
			$this->Line(183,17,183,18);
			$this->Line(187,17,187,18);
			$this->Line(191,16,191,18);

			$this->SetFont("Arial","B",13);
			$this->SetXY(105,20);	
			$this->Cell(10,5,'I N V E R S I O N E S',0,0,'C');
			$this->SetXY(105,25);	
			$this->SetFont("Arial","",7);			
			$this->Cell(10,5,'(Bolívares)',0,0,'C');

			$this->ln();
			$this->SetLineWidth(0.5);
			$this->Rect(10,33,195,17);
			$this->SetFont("Arial","",6.5);						
			$this->SetXY(38,33);
			$this->Cell(7,5,'PARTIDAS                                                  PROGRAMADO                    EJECUTADO                                             VARIACIÓN                                  INVERSIÓN');
			$this->SetLineWidth(0);
			$this->Line(10,38,187,38);
			$this->SetXY(143,38);
			$this->Cell(7,5,'           MES                  ACUMULADO            PRÓXIMO');
			$this->Line(139,43,187,43);
			$this->SetXY(13,43);
			$this->Cell(7,5,'CÓD.                                        DENOMINACIÓN                         MES         ACUMULADO         MES            ACUMULADO                                                                                       MES');
			$this->SetXY(139,45);
			$this->Cell(7,5,'ABSOLUTA         %        ABSOLUTA      %');
			
			$this->SetLineWidth(0.5);
			$this->Line(10,50,10,258);
			$this->Line(205,50,205,258);
			$this->SetLineWidth(0);
			$this->Line(33,38,33,258); 		//cod
			$this->Line(73,33,73,258);		//des
			$this->Line(89,38,89,258);		//mes
			$this->Line(106,33,106,258);		// acum
			$this->Line(122,38,122,258);		//mes
			$this->Line(139,33,139,258);		//acum
			$this->Line(156,43,156,258);		//abs
			$this->Line(163,38,163,258); 	//%
			$this->Line(180,43,180,258);  // abs
			$this->Line(187,33,187,258);  //%
			
			$this->Line(10,258,205,258);
			
			
			$this->ln();

		}
		
		
		function Cuerpo()
		{
	
		$tb=$this->bd->select($this->sql);
		$this->SetFont("Arial","",5.5);

		while (!$tb->EOF)
		{
		
		$this->Cell(62,4,$tb->fields["codcta"]);
		$this->Cell(17,4,number_format($tb->fields["salprgper"],2,',','.'),0,'R',0);
		$total_pm += $tb->fields["salprgper"];
		/* programado acumulado*/								
		$prgacum=0;
		if ($this->periododes = '01')
		{
		$prgacum = $tb->fields["salprgper"];
		//$this->Cell(17,4,number_format($prgacum,2,',','.'),0,'R',0);		
		}
		else
		{
		$tba=$this->bd->select("select salprgper, pereje from contabb1 where trim(codcta) = '".$tb->fields["codcta"]."' order by pereje");
		while ((!$tba->EOF) || ($tba->fields["pereje"] == $this->periododes ))
		{
		$prgacum += $tba->fields["salprgper"]; 
		} //fin del while pereje
		
		}
		
		$this->Cell(17,4,number_format($prgacum,2,',','.'),0,'R',0);						 
		$total_pa += $prgacum;
		$this->Cell(17,4,number_format($tb->fields["ejemes"],2,',','.'),0,'R',0);
		$this->Cell(17,4,number_format($tb->fields["salact"],2,',','.'),0,'R',0);
		$total_em +=$tb->fields["ejemes"];
		$total_ea += $tb->fields["salact"];		
		// variacion //
		$varmes=0;
		$varmes= abs($tb->fields["salprgper"]-$tb->fields["ejemes"]);
		$this->Cell(17,4,number_format($varmes,2,',','.'),0,'R',0);
		
		$varrelmes=0;		
		if ($tb->fields["salprgper"] != 0)
		{	$varrelmes= ($tb->fields["ejemes"]*100)/$tb->fields["salprgper"]; 	}
		$this->Cell(7,4,number_format($varrelmes,2,',','.'),0,'R',0);	
			
		$varacum=0;
		$varacum= abs($prgacum-$tb->fields["salact"]);
		$this->Cell(17,4,number_format($varacum,2,',','.'),0,'R',0);
		$varrelacum=0;
		if ($prgacum != 0)		
		{	$varrelacum= ($tb->fields["salact"]*100)/$prgacum;	}
		$this->Cell(7,4,number_format($varrelacum,2,',','.'),0,'R',0);
		
		$this->SetX(33);		
		$this->MultiCell(40,4,$tb->fields["descta"]);
	    $this->ln(2);	
		$tb->MoveNext();
		} //fin while EOF
		
		$this->SetX(65);
		$this->Cell(6,7,'Total...');
		$this->Cell(17,7,number_format($total_pm,2,',','.'),0,'R',0);
		$this->Cell(17,7,number_format($total_pa,2,',','.'),0,'R',0);
		$this->Cell(17,7,number_format($total_em,2,',','.'),0,'R',0);
		$this->Cell(17,7,number_format($total_ea,2,',','.'),0,'R',0);		
		$this->ln(2);
   
		$this->SetFont("Arial","B",6);
		$this->SetTextColor(0,0,0);	
		$this->Cell(6,10,'PROGRAMACION DE LOS GASTOS POR CONCEPTO DE TRANSFERENCIAS DE CAPITAL');
		$this->ln(7);
		/*
		$this->SetXY(10,$this->getY());
		$this->SetFont("Arial","",6);		
		$this->Cell(6,4,'4-07-03-01-00');
		$this->SetX(33);
		$this->MultiCell(40,4,'Transferencias de Capital Internas al Sector Privado');		
		$this->SetXY(10,$this->getY());
		$this->Cell(6,4,'4-07-03-03-00');
		$this->SetX(33);
		$this->MultiCell(40,4,'Transferencias de Capital Internas al Sector Público');		
		$this->SetXY(10,$this->getY());
		$this->Cell(6,4,'4-07-02-01-00');
		$this->SetX(33);
		$this->MultiCell(40,4,'Transferencias Corrientes al Exterior');		
		*/
		
		$this->SetFont("Arial","B",6);
		$this->ln(2);
		$this->Cell(6,10,'Línea de Verificación de las Ventas y/o Desincorporación de Activos');
		$this->ln(7);
		
/*		$this->SetFont("Arial","",6);	
		$this->SetXY(10,$this->getY());	
		$this->Cell(6,4,'3-06-01-00-00');
		$this->SetX(33);
		$this->MultiCell(40,4,'Venta y/o Desincorporación de Activos Fijos');		
		$this->SetXY(10,$this->getY());
		$this->Cell(6,4,'3-06-02-00-00');
		$this->SetX(33);
		$this->MultiCell(40,4,'Venta de Activos Intangibles');		
		$this->SetXY(10,$this->getY());
		$this->Cell(6,4,'3-07-01-00-00');
		$this->SetX(33);
		$this->MultiCell(40,4,'Venta de Títulos y Valores de Corto Plazo');
		$this->SetXY(10,$this->getY());
		$this->Cell(6,4,'3-07-02-00-00');
		$this->SetX(33);
		$this->MultiCell(40,4,'Venta de Títulos y Valores de Largo Plazo');		
		$this->SetXY(10,$this->getY());
		$this->Cell(6,4,'3-08-01-00-00');
		$this->SetX(33);
		$this->MultiCell(40,4,'Ventas de Acciones y Participaciones de Capital');		
	*/
	
		$this->SetFont("Arial","B",6);
		$this->ln(2);
		$this->Cell(6,10,'Línea para Detallar la Recuperación de Prestamos');
		$this->ln(7);
	
	/*	$this->SetXY(10,$this->getY());
		$this->SetFont("Arial","",6);		
		$this->Cell(6,4,'3-09-00-00-00');
		$this->SetX(33);
		$this->MultiCell(40,4,'Recuperación de Prestamos de Corto Plazo');		
		$this->SetXY(10,$this->getY());
		$this->Cell(6,4,'3-10-00-00-00');
		$this->SetX(33);
		$this->MultiCell(40,4,'Recuperación de Prestamos de Largo Plazo');			
		*/

		}
	}
?>