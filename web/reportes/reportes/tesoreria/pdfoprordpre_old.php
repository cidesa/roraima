<?
	require_once("fpdfadds.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");

	class pdfreporte extends PDF_ADDS
	{

		var $bd;
		var $cab;
		var $titulo;
		var $ordpagdes;
		var $ordpaghas;
		var $codprodes;
		var $codprohas;
		var $tiporddes;
		var $tipordhas;
		var $fecorddes;
		var $fecordhas;
		var $status;
		var $condicion;
		var $decreto;
		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->bd=new basedatosAdo();
			$this->ordpagdes=$_POST["ordpagdes"];
			$this->ordpaghas=$_POST["ordpaghas"];
			$this->codprodes=$_POST["codprodes"];
			$this->codprohas=$_POST["codprohas"];
			$this->tiporddes=$_POST["tiporddes"];
			$this->tipordhas=$_POST["tipordhas"];
			$this->fecorddes=$_POST["fecorddes"];
			$this->fecordhas=$_POST["fecordhas"];
			$this->status=$_POST["status"];
			$this->decreto=$_POST["decreto"];
			if ($this->status=="Todas"){$this->condicion=" (A.STATUS='A' OR A.STATUS='I' OR A.STATUS='N')";}
			elseif ($this->status=="Pagadas"){$this->condicion=" (A.STATUS='I' OR A.STATUS='I' OR A.STATUS='I')";}
			elseif ($this->status=="No Pagadas"){$this->condicion=" (A.STATUS='N' OR A.STATUS='N' OR A.STATUS='N')";}
			else { $this->condicion=" (A.STATUS='A' OR A.STATUS='A' OR A.STATUS='A')";}
			$this->sql="SELECT
						A.NUMORD AS ORDEN,
						A.NUMORD AS NUMORD,
						A.CEDRIF,
						E.NITBEN,
						A.NOMBEN,
						A.DESORD,
						TO_CHAR(A.FECEMI,'DD/MM/YYYY') AS FECEMI,
						TO_CHAR(A.FECEMI,'YYYY') AS ANOEMI,
						A.NUMCOM,
						(A.MONORD-A.MONRET-A.MONDES) AS NETO,
						(CASE WHEN A.STATUS='I' THEN 'Pagadas' WHEN A.STATUS='N' THEN 'En Finanazas' WHEN A.STATUS='A' THEN 'Anuladas' END) AS STAORD,
						B.NOMEXT
						FROM OPORDPAG A,CPDOCCAU B,OPBENEFI E
						WHERE A.NUMORD >= '".$this->ordpagdes."' AND
						A.NUMORD <= '".$this->ordpaghas."' AND
						A.FECEMI >= TO_DATE('".$this->fecorddes."','DD/MM/YYYY') AND
						A.FECEMI <= TO_DATE('".$this->fecordhas."','DD/MM/YYYY') AND
						".$this->condicion." AND
						A.TIPCAU>='".$this->tiporddes."' AND
						A.TIPCAU<='".$this->tipordhas."' AND
						A.TIPCAU=B.TIPCAU AND
						trim(A.CEDRIF)=trim(E.CEDRIF) AND
						E.NOMBEN >= '".$this->codprodes."' AND
						E.NOMBEN <= '".$this->codprohas."'
						ORDER BY A.NUMORD";

			$this->cab=new cabecera();

		}


		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->SetFont("Arial","B",9);
			$this->Formato();
		}

		function Formato()
		{
		   //Marco de la P�gina
		   $this->Rect(10,35,200,230);
		   //Tipo de Orden de Pago
		   $this->Rect(10,35,100,7);
		   $this->SetXY(10,35);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,5,'Tipo de Orden de Pago:');
		   //Compromisos
		   $this->Rect(110,35,70,7);
		   $this->SetXY(110,35);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,5,'Compromisos:');
		   //A�o
		   $this->Rect(180,35,30,7);
		   $this->SetXY(180,35);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(5,5,'Año:');
		   //Beneficiario
		   $this->Rect(10,42,150,14);
		   $this->SetXY(10,42);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,5,'Beneficiario:');
		   //Cedula o Rif del Beneficiario
		   $this->Rect(160,42,50,7);
		   $this->SetXY(160,42);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,5,'Cédula o RIF:');
		   //Nit del Beneficiario
		   $this->Rect(160,49,50,7);
		   $this->SetXY(160,49);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,5,'NIT:');
		   //Monto Letras
		   $this->Rect(10,56,200,18);
		   $this->SetXY(10,56);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(15,5,'Por la Cantidad de:');
		   //Monto
		   $this->Rect(150,69,60,5);
		   $this->SetXY(150,69);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,5,'Monto Bs.');
		   //Concepto de la Orden
		   $this->Rect(10,74,200,18);
		   $this->SetXY(10,74);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,5,'CONCEPTO:');
		   //Ponemos el Color en Gris
		   $this->SetFillColor(200);
		   //Dibujamos el rectangulo de las imputaciones presupuestarias
		   $this->Rect(10,88,200,60);
		   $this->Rect(10,88,200,7,'DF');
		   $this->SetXY(10,88.5);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(170,3,'CONTROL PRESUPUESTARIO',0,0,'C');

		   //C�digo Presupuestario
		   //$this->Rect(10,88,34,7);
		   $this->SetXY(10,90);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(34,4,'Código Presupuestario',0,0,'C');
		   //Descripci�n
		   //$this->Rect(44,88,66,7);
		   $this->SetXY(44,91);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(66,4,'Descripción',0,0,'C');
		   //Monto Bruto
		   //$this->Rect(110,88,25,7);
   		   $this->SetXY(110,91);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(25,4,'Monto Bruto',0,0,'C');
		   //Monto Retenci�n
		   //$this->Rect(135,88,25,7);
  		   $this->SetXY(135,91);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(25,4,'Monto Retención',0,0,'C');
		   //Monto Descuento
		   //$this->Rect(160,88,25,7);
		   $this->SetXY(160,90.2);
		   $this->SetFont("Arial","B",8);
		   $this->MultiCell(25,2,'Monto Descuento',0,'C',0);
		   //Monto Neto
		   //$this->Rect(185,88,25,7);
		   $this->SetXY(185,91);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(25,4,'Monto Neto',0,0,'C');

		   //Dibujamos el rectangulo de Control de retenciones
		   $this->Rect(10,148,200,45);
		   $this->Rect(10,148,200,7,'DF');
		   $this->SetXY(10,148.5);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(200,3,'CONTROL DE RETENCIONES',0,0,'C');
		   $this->SetXY(10,151.5);
		   $this->SetFont("Arial","B",7);
		   $this->Cell(200,3,'Según Decreto Nro. '.$this->decreto,0,0,'C');
		   //C�digo
		   //$this->Rect(10,88,34,7);
		   $this->SetXY(10,151);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(20,4,'Código',0,0,'C');
		   //Descripci�n
		   //$this->Rect(44,88,66,7);
		   $this->SetXY(20,151);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(100,4,'Descripción',0,0,'C');
		   //Monto
		   //$this->Rect(110,88,25,7);
   		   $this->SetXY(150,151);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(30,4,'Monto',0,0,'C');

           //Dibujamos el rectangulo del control conatble
		   $this->Rect(10,193,200,42);
		   $this->Rect(10,193,200,7,'DF');
		   $this->SetXY(10,193.5);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(200,3,'CONTROL CONTABLE',0,0,'C');
		   //C�digo Contable
		   //$this->Rect(10,88,34,7);
		   $this->SetXY(10,196);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(34,4,'Código Contable',0,0,'C');
		   //Descripci�n
		   //$this->Rect(44,88,66,7);
		   $this->SetXY(44,196);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(90,4,'Descripción',0,0,'C');
		   //Debe
		   //$this->Rect(110,88,25,7);
   		   $this->SetXY(134,196);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(33,4,'Debe',0,0,'C');
		   //Haber
		   //$this->Rect(135,88,25,7);
  		   $this->SetXY(167,196);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(33,4,'Haber',0,0,'C');


		   //Cuadros de Firma
		   //Presupuesto
		   $this->Rect(10,233,40,5,'DF');
		   $this->SetXY(10,233);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(40,5,'Presupuesto',0,0,'C');
		   $this->Rect(10,238,40,22);
		   //Contabilidad
		   $this->Rect(50,233,40,5,'DF');
		   $this->SetXY(50,233);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(40,5,'Contabilidad',0,0,'C');
		   $this->Rect(50,238,40,22);
		   //Gerencia de Administraci�n
		   $this->Rect(90,233,40,5,'DF');
		   $this->SetXY(90,233);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(40,5,'Gerenecia de Administración',0,0,'C');
		   $this->Rect(90,238,40,22);
		   //Contralor�a Interna
		   $this->Rect(130,233,40,5,'DF');
		   $this->SetXY(130,233);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(40,5,'Contraloría Interna',0,0,'C');
		   $this->Rect(130,238,40,22);
		   //Presidencia
		   $this->Rect(170,233,40,5,'DF');
		   $this->SetXY(170,233);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(40,5,'Presidencia',0,0,'C');
		   $this->Rect(170,238,40,22);
		}

		function Cuerpo()
		{
			$tbgen=$this->bd->select($this->sql);
			$primeravez=true;
			while (!$tbgen->EOF)
			{
				$adicionapagina=true;

				$sqltb="select
						C.CODPRE,
						SUBSTR(LTRIM(RTRIM(D.NOMPRE)),1,50) AS NOMPRE,
						C.MONCAU,
						C.MONDES,
						C.MONRET
						FROM OPDETORD C,CPDEFTIT D
						WHERE C.NUMORD='".$tbgen->fields["numord"]."' AND
						C.CODPRE=D.CODPRE
						ORDER BY C.CODPRE;";

				$tb=$this->bd->select($sqltb);
				//if (!$tb->EOF)
				//{
				   $sqlret="SELECT  RTRIM(B.NUMORD) AS ORDRET,B.CODTIP,C.DESTIP,C.PORRET,SUM(B.MONRET) AS SUMRET
							FROM  OPRETORD B, OPTIPRET C
							WHERE B.NUMORD='".$tbgen->fields["numord"]."' AND
							RTRIM(B.CODTIP)=RTRIM(C.CODTIP)
							GROUP BY
							RTRIM(B.NUMORD),
							B.CODTIP,
							C.DESTIP,
							C.PORRET
							ORDER BY RTRIM(B.CODTIP);";
					$tbret=$this->bd->select($sqlret);



					$sqlcon="SELECT
							B.NUMCOM AS ORDCON,
							B.CODCTA,
							C.DESCTA,
							(CASE WHEN B.DEBCRE='D' THEN B.MONASI ELSE 0 END) AS DEBITOS,
							(CASE WHEN B.DEBCRE='C' THEN B.MONASI ELSE 0 END) AS CREDITOS
							FROM  CONTABC1 B, CONTABB C
							WHERE
							B.NUMCOM='".$tbgen->fields["numcom"]."' AND
							B.CODCTA = C.CODCTA
							ORDER BY  B.DEBCRE DESC ,B.CODCTA;";
					$tbcon=$this->bd->select($sqlcon);
				//}
				$tb->MoveFirst();
				while((!$tb->EOF)||(!$tbret->EOF)||(!$tbcon->EOF))
				{
				  if ($adicionapagina)
				  {
					 if (!$primeravez)
					 {
					   $this->AddPage();
					 }
					 $primeravez=false;
					 $adicionapagina=false;

					 //Colocamos el Sello de ANULADA
					 if ($tbgen->fields["staord"]=='Anuladas')
					 {
					    $this->SetLineWidth(1);
						$this->SetDrawColor(100,1,1);
						$this->SetFont("Arial","B",84);
						$this->SetTextColor(100,1,1);
						$this->SetAlpha(0.5);
						$this->Rotate(45,40,160);
					    $this->RoundedRect(40, 160, 150, 25, 2.5, 'D');
						$this->Text(42,183,'ANULADA');
						$this->Rotate(0);
						$this->SetDrawColor(0);
						$this->SetTextColor(0);
						$this->SetAlpha(1);
						$this->SetLineWidth(0);
					 }
					 else
					 {
					    $this->SetAlpha(1);
					 }
					 ///////////////////////////////////////////

					 $this->SetXY(170,25);
					 $this->SetFont("Arial","B",12);
					 $this->Cell(20,5,"Número:".$tbgen->fields["numord"]);
					 $this->SetXY(170,30);
					 $this->Cell(20,5,"Fecha: ".$tbgen->fields["fecemi"]);
					 $this->SetFont("Arial","",8);
					 $this->SetXY(43,36);
					 $this->MultiCell(67,3,$tbgen->fields["nomext"]);
					 //buscamos los  compromisos a que hace referencia la orden
					 $sqlcom="SELECT DISTINCT(REFERE) AS REFERE FROM CPIMPCAU WHERE REFCAU='".$tbgen->fields["numord"]."' AND REFERE<>'NULO'";
					 $tbcom=$this->bd->select($sqlcom);
					 $compromisos="";
					 while(!$tbcom->EOF)
					 {
						if ($compromisos=="")
						{
						   $compromisos=$tbcom->fields["refere"];
						}
						else
						{
						   $compromisos=$compromisos.', '.$tbcom->fields["refere"];
						}
						$tbcom->MoveNext();
					 }
					 $this->SetXY(131,36);
					 $this->MultiCell(39,3,$compromisos);
					 $this->SetXY(190,35);
					 $this->Cell(30,5,$tbgen->fields["anoemi"]);
					 $this->SetXY(30,43);
					 $this->MultiCell(130,3,$tbgen->fields["nomben"]);
					 $this->SetXY(180,42);
					 $this->Cell(30,5,$tbgen->fields["cedrif"]);
					 $this->SetXY(170,49);
					 $this->Cell(30,5,$tbgen->fields["nitben"]);
					 $this->SetXY(40,57);
					 $this->MultiCell(182,3,montoescrito($tbgen->fields["neto"],$this->bd));
					 $this->SetXY(165,69);
					 $this->Cell(45,5,number_format($tbgen->fields["neto"],2,".",","),0,0,"L");
					 $this->SetFont("Arial","B",6);
					 $this->SetXY(28,75);
					 $this->MultiCell(182,3,$tbgen->fields["desord"]);
					 $this->SetXY(20,229);
					 $this->SetFont("Arial","B",8);
					 $this->Cell(200,4,"Numero de Comprobante:  ".$tbgen->fields["numcom"]);
					 $this->SetFont("Arial","",8);
					 $this->SetXY(10,95);
					 $yimp=95;
					 $yret=155;
					 $ycon=200;
					 $cuantasimp=0;
					 $cuantasret=0;
					 $cuantascon=0;
				  }//end del if primeravez
				  if (($cuantasimp<13) && (!$tb->EOF))
				  {
					 $this->SetXY(10,$yimp);
					 $this->Cell(34,4,$tb->fields["codpre"]);

					 //$this->CellFitScale(66,4,$tb->fields["nompre"]);
					 //$this->Cell(66,4,$tb->fields["nompre"]);
					 $this->SetXY(110,$yimp);
					 $this->Cell(25,4,number_format($tb->fields["moncau"],2,".",","),0,0,"R");
					 $this->SetXY(135,$yimp);
					 $this->Cell(25,4,number_format($tb->fields["monret"],2,".",","),0,0,"R");
					 $this->SetXY(160,$yimp);
					 $this->Cell(25,4,number_format($tb->fields["mondes"],2,".",","),0,0,"R");
					 $this->SetXY(185,$yimp);
					 $this->Cell(25,4,number_format(($tb->fields["moncau"]-$tb->fields["monret"]-$tb->fields["mondes"]),2,".",","),0,0,"R");
					 $this->SetXY(60,$yimp);
					 $this->multicell(50,3,$tb->fields["nompre"]);
					 $this->ln(2);
					 $yimp=$this->GetY();
					 $cuantasimp=$cuantasimp+1;
					 $tb->MoveNext();
				   }

				  if (($cuantasret<9) && (!$tbret->EOF))
				  {
					 $this->SetXY(10,$yret);
					 $this->Cell(20,4,$tbret->fields["codtip"]);
					 $this->SetXY(30,$yret);
					 $this->CellFitScale(100,4,$tbret->fields["destip"]);
					 //$this->Cell(100,4,$tbret->fields["destip"]);
					 $this->SetXY(150,$yret);
					 $this->Cell(30,4,number_format($tbret->fields["sumret"],2,".",","),0,0,"R");
					 $this->ln(4);
					 $yret=$this->GetY();
					 $cuantasret=$cuantasret+1;
					 $tbret->MoveNext();
				   }

				  if (($cuantascon<7) && (!$tbcon->EOF))
				  {
					 $this->SetXY(10,$ycon);
					 $this->Cell(34,4,$tbcon->fields["codcta"]);
					 $this->SetXY(44,$ycon);
					 $this->CellFitScale(90,4,$tbcon->fields["descta"]);
					 //$this->Cell(90,4,$tbcon->fields["descta"]);
					 if($tbcon->fields["debitos"]<>0)
					 {
					   $this->SetXY(134,$ycon);
					   $this->Cell(33,4,number_format($tbcon->fields["debitos"],2,".",","),0,0,"R");
					 }
					 if($tbcon->fields["creditos"]<>0)
					 {
					   $this->SetXY(167,$ycon);
					   $this->Cell(33,4,number_format($tbcon->fields["creditos"],2,".",","),0,0,"R");
					 }
					 $this->ln(4);
					 $ycon=$this->GetY();
					 $cuantascon=$cuantascon+1;
					 $tbcon->MoveNext();
				   }

				  if (($cuantasimp==13) || ($cuantasret==9) || ($cuantascon==7))
				  {
					 if ($cuantasimp==13)
					 {
						if (($tbret->EOF) || (($cuantasret==9)&&(!$tbret->EOF)))
						{
						   $adicionapagina=true;

						   if (($tbcon->EOF) || (($cuantascon==7)&&(!$tbcon->EOF)))
						   {
						      $adicionapagina=true;
						   }
						   else
						   {
						      $adicionapagina=false;
						   }
						}
					 }
					 elseif	($cuantasret==9)
					 {
						if (($tb->EOF) || (($cuantasimp==13)&&(!$tb->EOF)))
						{
						   $adicionapagina=true;
						   if (($tbcon->EOF) || (($cuantascon==7)&&(!$tbcon->EOF)))
						   {
						      $adicionapagina=true;
						   }
						   else
						   {
						      $adicionapagina=false;
						   }
						}
					 }
					 elseif	($cuantascon==7)
					 {
						if (($tb->EOF) || (($cuantasimp==13)&&(!$tb->EOF)))
						{
						   $adicionapagina=true;

						   if (($tbret->EOF) || (($cuantasret==9)&&(!$tbret->EOF)))
						   {
						      $adicionapagina=true;
						   }
						   else
						   {
						      $adicionapagina=false;
						   }
						}
					 }
				  }

				} //End del WHILE
				$tbgen->MoveNext();
			}//End del While Principal
		}

	}
?>