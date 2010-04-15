<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");

    class pdfreporte extends fpdf
	{

		var $bd;
		var $cab;
		var $titulo;
		var $fecprc1;
		var $fecprc2;
		var $tipprc1;
		var $tipprc2;
		var $estado;
		var $stacom;
		var $codpre1;
		var $codpre2;
		var $condicion;
		var $conf;
		var $comodin;

		function pdfreporte()
		{
		    $this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->bd=new basedatosAdo();



			if($_GET["refprc1"]!="")
			{
				$this->refprc1=str_replace('*',' ',$_GET["refprc1"]);
				$this->refprc2=str_replace('*',' ',$_GET["refprc2"]);

				$this->sql="SELECT A.REFPRC as referencia,A.DESPRC as descripcion,A.TIPPRC as tipo,to_char(A.FECPRC,'dd/mm/yyyy') as fecha,
							A.STAPRC as status,B.CODPRE as codigo,C.NOMPRE as nombre,B.MONIMP as imputado,B.MonCom as comprometido,
							B.MonCau as causado,B.MonPag as pagado,B.MonAju as Ajuste,(B.MonImp-B.MonAju) as Mon_Aju,
							substr(b.codpre,1,11) as partida
							FROM CPPRECOM as A, CPIMPPRC as B, CPDEFTIT as C
							WHERE
							A.REFPRC = B.REFPRC  AND
							B.CodPre = C.CodPre AND
							(A.REFPRC >= RPAD('".$this->refprc1."',8,' ') AND
							A.REFPRC<= RPAD('".$this->refprc2."',8,' '))
							ORDER BY A.FECPRC,A.REFPRC,B.CODPRE,A.TIPPRC limit 3000";
			}
			else
			{
					$this->refprc1=$_POST["refprc1"];
			$this->refprc2=$_POST["refprc2"];
			$this->fecprc1=$_POST["fecprc1"];
			$this->fecprc2=$_POST["fecprc2"];
			$this->stacom=$_POST["estado"];
			$this->tipprc1=$_POST["tipprc1"];
			$this->tipprc2=$_POST["tipprc2"];
			$this->codpre1=$_POST["codpre1"];
			$this->codpre2=$_POST["codpre2"];
			$this->fecordhas=$_POST["fecordhas"];
			$this->comodin=$_POST["comodin"];

			if($this->stacom=="Todos")
			{
				$this->sql="SELECT A.REFPRC as referencia,A.DESPRC as descripcion,A.TIPPRC as tipo,to_char(A.FECPRC,'dd/mm/yyyy') as fecha,
							A.STAPRC as status,B.CODPRE as codigo,C.NOMPRE as nombre,B.MONIMP as imputado,B.MonCom as comprometido,
							B.MonCau as causado,B.MonPag as pagado,B.MonAju as Ajuste,(B.MonImp-B.MonAju) as Mon_Aju,
							substr(b.codpre,1,11) as partida
							FROM CPPRECOM as A, CPIMPPRC as B, CPDEFTIT as C
							WHERE
							A.REFPRC = B.REFPRC  AND
							B.CodPre = C.CodPre AND

							(A.REFPRC >= RPAD('".$this->refprc1."',8,' ') AND
							A.REFPRC<= RPAD('".$this->refprc2."',8,' ')) AND
							(A.FECPRC >=to_date('".$this->fecprc1."','dd/mm/yyyy') AND
							A.FECPRC <=to_date('".$this->fecprc2."','dd/mm/yyyy')) AND
							(A.TIPPRC >= RPAD('".$this->tipprc1."',4,' ') AND
							A.TIPPRC<= RPAD('".$this->tipprc2."',4,' ')) AND
							(B.CODPRE >=RPAD('".$this->codpre1."',32,' ') AND
							B.CODPRE<=RPAD('".$this->codpre2."',32,' ')) AND
							B.CODPRE LIKE RTRIM('".$this->comodin."')
							ORDER BY A.FECPRC,A.REFPRC,B.CODPRE,A.TIPPRC limit 3000";
			}
			else
			{
				if($this->stacom=="Activo"){$this->stacom="A";}
				elseif ($this->stacom=="Anulado"){ $this->stacom="N";}

					$this->sql="SELECT A.REFPRC as referencia,A.DESPRC as descripcion,A.TIPPRC as tipo,to_char(A.FECPRC,'dd/mm/yyyy') as fecha,
								A.STAPRC as status,B.CODPRE as codigo,C.NOMPRE as nombre,B.MONIMP as imputado,B.MonCom as comprometido,
								B.MonCau as causado,B.MonPag as pagado,B.MonAju as Ajuste,(B.MonImp-B.MonAju) as Mon_Aju,
								substr(b.codpre,1,11) as partida
								FROM CPPRECOM as A, CPIMPPRC as B, CPDEFTIT as C
								WHERE
								A.REFPRC = B.REFPRC  AND
								B.CodPre = C.CodPre AND

								(A.REFPRC >= RPAD('".$this->refprc1."',8,' ') AND
								A.REFPRC<= RPAD('".$this->refprc2."',8,' ')) AND
								(A.FECPRC >=to_date('".$this->fecprc1."','dd/mm/yyyy') AND
								A.FECPRC <=to_date('".$this->fecprc2."','dd/mm/yyyy')) AND
								(A.TIPPRC >= RPAD('".$this->tipprc1."',4,' ') AND
								A.TIPPRC<= RPAD('".$this->tipprc2."',4,' ')) AND
								A.STAPRC='".$this->stacom."' AND
								(B.CODPRE >=RPAD('".$this->codpre1."',32,' ') AND
								B.CODPRE<=RPAD('".$this->codpre2."',32,' ')) AND
								B.CODPRE LIKE RTRIM('".$this->comodin."')
								ORDER BY A.FECPRC,A.REFPRC,B.CODPRE,A.TIPPRC";
				$this->cab=new cabecera();
			}
		  }
			//print $this->sql;
		}


		function Header()
		{
				$this->Image("../../img/logo_1.jpg",10,10,20);
		//	$this->cab->poner_cabecera('Autorizacion de Pre-Compromiso',$this->conf,"s","s");
			$this->cab->poner_cabecera_f($this,"","p","n","n");
			$this->SetFont("Arial","B",9);
			$this->Formato();
		}


		function Formato()
		{
		   $this->SetXY(35,10);
		   $this->Cell(15,5,'');
		   $this->SetXY(35,15);
		   $this->Cell(15,3,'');
		   $this->SetFont("Arial","",8);
		   $this->SetXY(35,19);
		   $this->Cell(15,3,'');
		   $this->SetFont("Arial","B",12);
		   $this->SetXY(65,30);
		   $this->Cell(15,3,'AUTORIZACION DE PRE-COMPROMISO');
		   $this->Rect(163,11,40,12);
		   $this->SetXY(165,12);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(20,5,"Número:");
		   $this->SetXY(165,17);
		   $this->SetFont("Arial","",8);
		   $this->Cell(20,5,"Fecha: ");


		   //Marco de la Página
		   $this->Rect(10,35,200,225);
		   //Unidad Solicitante de la Orden
		   $this->Rect(10,35,200,10);
		   $this->SetXY(10,35);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(15,5,'UNIDAD SOLICITANTE:');
		   //Tipo
		   $this->Rect(10,40,120,5);
		   $this->SetXY(10,40);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(5,5,'TIPO:');
		   //Rectangulos dentro de tipo
		   $this->Rect(30,41,5,3);
		   $this->SetXY(35,41);
		   $this->SetFont("Arial","",8);
		   $this->Cell(5,4,'Bienes');

		   $this->Rect(55,41,5,3);
		   $this->SetXY(60,41);
		   $this->SetFont("Arial","",8);
		   $this->Cell(5,4,'Servicios');

		   $this->Rect(85,41,5,3);
		   $this->SetXY(90,41);
		   $this->SetFont("Arial","",8);
		   $this->Cell(5,4,'Honorarios profesionales');
		   //Status
		   $this->Rect(130,40,80,5);
		   $this->SetXY(130,40);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,5,'STATUS:');
		   //Observaciones
		   $this->Rect(10,45,200,25);
		   $this->SetXY(10,45);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,5,'OBSERVACIONES:');
		   //Imputacion Presupuestaria
		   $this->Rect(10,60,200,5);
		   $this->SetXY(10,60);
		   $this->SetFont("Arial","B",8);
		//   $this->Cell(130,5,'BENEFICIARIO:',0,0,'L');
		 //  $this->Line(160,60,160,65);
		   $this->SetX(160);
		//   $this->Cell(40,5,'RIF:',0,0,'L');
		   //Beneficiario
		   $this->Rect(10,65,200,5);
		   $this->SetXY(10,65);
		   $this->SetFont("Arial","B",8);
		//   $this->Cell(200,5,'IMPUTACIÓN PRESUPUESTARIA',0,0,'C');


		   //Ponemos el Color en Gris
		   $this->SetFillColor(200);
		   //N1
		 /*  $this->Rect(10,70,10,7,'DF');
		   $this->SetXY(10,70);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,7,'N1',0,0,'C');
		   //N2
		   $this->Rect(20,70,10,7,'DF');
		   $this->SetXY(20,70);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,7,'N2',0,0,'C');*/
		   //Cuenta
		   $this->Rect(10,70,50,7,'DF');
		   $this->SetXY(20,70);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(30,7,'IMPUTACIÓN PRESUPUESTARIA',0,0,'C');
		   //Descripcion
		   $this->Rect(60,70,122,7,'DF');
   		   $this->SetXY(60,70);
		   $this->SetFont("Arial","B",8);
		   $this->MultiCell(70,7,'DESCRIPCIÓN',0,0,'C');
		   //Monto
		   $this->Rect(182,70,28,7,'DF');
		   $this->SetXY(182,70);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(22,7,'MONTO BS.',0,0,'C');
		   //Total
		   $this->Rect(10,220,200,5);
  		   $this->SetXY(10,220);
		   $this->SetFont("Arial","B",8);
		   $this->MultiCell(110,5,'Total',0,0,'C');
		   //Bolivares en letras
		   $this->Rect(10,225,200,15);
  		   $this->SetXY(10,225);
		   $this->SetFont("Arial","B",8);
		   $this->MultiCell(150,5,'Bolivares en letras:');

		   //Lineas Divisoras del Detalle de la Orden
		//   $this->Line(20,70,20,220);
		 //  $this->Line(30,70,30,220);
		   $this->Line(60,70,60,220);
		   $this->Line(182,70,182,220);
		   //Cuadros de Firma
		   //Gerencia de Planificacion y Presupuesto
		   $this->Rect(10,235,100,5,'DF');
		   $this->SetXY(10,235);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(100,5,'Oficina de Planificación y Presupuesto',0,0,'C');
		   $this->Rect(10,240,100,20);
		   $this->SetFont("Arial","",8);
		   $this->SetXY(10,242);
		   $this->Cell(10,2,'Sello y Firma:');
		   $this->SetXY(10,255);
		   $this->Cell(10,2,'Fecha:');
		   //Gerencia de Administracion
		   $this->Rect(110,235,100,5,'DF');
		   $this->SetXY(110,235);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(100,5,'Direcciòn de Administración y Finanzas',0,0,'C');
		   $this->Rect(110,240,100,20);
		   $this->SetFont("Arial","",8);
		   $this->SetXY(110,242);
		   $this->Cell(10,2,'Sello y Firma:');
		   $this->SetXY(110,255);
		   $this->Cell(10,2,'Fecha:');

		}


		function Cuerpo()
		{
		    $tb=$this->bd->select($this->sql);
			$ref="";
			$total=0;
			$y=80;
			$primeravez=true;
			while(!$tb->EOF)
			{
				if($tb->fields["referencia"]!=$ref)
				{
				     $ref=$tb->fields["referencia"];
					 if (!$primeravez)
					 {
					   $this->AddPage();
					 }
					 $primeravez=false;
					 $this->setFont("Arial","B",8);
					 $this->SetXY(180,12);
					 $this->cell(50,5,$tb->fields["referencia"]);
					 $this->setFont("Arial","",8);
					 $this->SetXY(180,17);
					 $this->Cell(50,5,$tb->fields["fecha"]);
					 $this->SetXY(145,40);
					 $estado=$tb->fields["status"];
					 $partida=$tb->fields["partida"];
					 if($estado == 'A')
					 {
						$this->cell(50,5,'Aprobado');
					 }
					 $this->SetXY(40,46);
					 $this->Multicell(170,4,$tb->fields["descripcion"]);
					/* $this->SetXY(35,61);
					 $this->cell(70,4,$tb->fields["beneficiario"]);
					 $this->SetX(170);
					 $this->cell(30,4,$tb->fields["rif"]);*/


				}

				$ref=$tb->fields["referencia"];
				$this->setFont("Arial","",8);
				//Detalle
				//$this->SetXY(25,75);
				$this->setY($y);
				while(!$tb->EOF and $ref==$tb->fields["referencia"])
				{
					$this->setX(10);
					$codigo=explode("-",$tb->fields["codigo"]);
					//$this->cell(10,4,$codigo[0]);
					//$this->cell(10,4,$codigo[1]);
					$this->cell(50,4,$codigo[0].'-'.$codigo[1].'-'.$codigo[2].'-'.$codigo[3].'-'.$codigo[4].'-'.$codigo[5].'-'.$codigo[6],0,0,'C');
					$this->SetX(190);
					$this->cell(19,4,number_format($tb->fields["imputado"],2,',','.'),0,0,'R');
					$this->SetX(60);
					$this->MultiCell(130,3,($tb->fields["nombre"]));

					$total=$total+$tb->fields["imputado"];
					$tb->MoveNext();
					$this->ln(2);
				}
					 $sqluni="SELECT A.CODPRE, B.NOMCAT as nomcat FROM CPIMPPRC A,NPCATPRE B
                         WHERE A.REFPRC='".$ref."' AND RPAD('".$partida."',32,' ')=RPAD(B.CODCAT,32,' '); ";

					//print $sqluni;
		 		    $tbuni=$this->bd->select($sqluni);
					 $this->SetXY(45,35);
					 $this->Cell(50,4,$tbuni->fields["nomcat"]);
					$this->SetXY(180,221);
					$this->cell(30,4,number_format($total,2,',','.'),0,0,'R');
					$this->SetXY(40,226);
					$this->Cell(50,3,montoescrito($total,$this->bd),0,0,'L');
				$total=0;
			    if ($this->GetY()>=230)
				{
			    	$this->AddPage();
			    }
			}
		}
	}
?>