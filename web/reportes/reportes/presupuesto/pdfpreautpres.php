<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

    class pdfreporte extends fpdf
	{

		var $bd;
		var $cab;
		var $titulo;
		var $feccom1;
		var $feccom2;
		var $numcom1;
		var $numcom2;
		var $bendes;
		var $benhas;
		var $tipcom1;
		var $tipcom2;
		var $estado;
		var $stacom;
		var $codpre1;
		var $codpre2;
		var $condicion;
		var $conf;
		var $comodin;

		function pdfreporte()
		{
		  $this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->bd=new basedatosAdo();



			if($_GET["numcom1"]!="")
			{
				$this->numcom1=str_replace('*',' ',$_GET["numcom1"]);
				$this->numcom2=str_replace('*',' ',$_GET["numcom2"]);
				$this->sql="SELECT A.refcom as referencia,
							A.refprc as refprc,
							A.tipcom as tipo,
							to_char(A.feccom,'dd/mm/yyyy') as fecha,
							A.CEDRIF,
							(CASE WHEN A.STACOM='A' THEN 'Activo' WHEN A.STACOM='N' THEN 'Anulado' ELSE '' END) as STATUS2,
							A.FECANU,
							a.stacom,
							RTRIM(A.descom) as descripcion,
							RTRIM(B.CodPre ) as codigo,
							substr(RTRIM(C.NomPre),1,60) as nombre,
							B.monimp as imputado,
							B.moncau,
							B.monpag,
							B.monaju as ajuste,
							(B.monimp-B.monaju) as mon_aju,
							substr(D.NOMBEN,1,50) as beneficiario,
							D.cedrif as cedben
						FROM CPCOMPRO A LEFT OUTER JOIN OPBENEFI D ON A.CEDRIF=D.CEDRIF ,CPIMPCOM B, CPDEFTIT C
						WHERE
							A.REFCOM = B.REFCOM AND
               				B.CodPre = C.CodPre  AND
               				((A.REFCOM)>=RPAD('".$this->numcom1."',8,' ')  AND
                			(A.REFCOM) <=RPAD('".$this->numcom2."',8,' ') )
						ORDER BY A.REFCOM ";
			}
			else
			{

			$this->feccom1=$_POST["feccom1"];
			$this->feccom2=$_POST["feccom2"];
			$this->stacom=$_POST["estado"];
			$this->numcom1=$_POST["numcom1"];
			$this->numcom2=$_POST["numcom2"];
			$this->bendes=$_POST["bendes"];
			$this->benhas=$_POST["benhas"];
			$this->tipcom1=$_POST["tipcom1"];
			$this->tipcom2=$_POST["tipcom2"];
			$this->codpre1=$_POST["codpre1"];
			$this->codpre2=$_POST["codpre2"];
			$this->fecordhas=$_POST["fecordhas"];
			$this->comodin=$_POST["comodin"];
			$this->status=$this->stacom;




			if($this->stacom=="Todos"){
			$this->sql="SELECT A.refcom as referencia,
							A.refprc as refprc,
							A.tipcom as tipo,
							to_char(A.feccom,'dd/mm/yyyy') as fecha,
							A.CEDRIF,
							(CASE WHEN A.STACOM='A' THEN 'Activo' WHEN A.STACOM='N' THEN 'Anulado' ELSE '' END) as STATUS2,
							A.FECANU,
							a.stacom,
							RTRIM(A.descom) as descripcion,
							RTRIM(B.CodPre ) as codigo,
							substr(RTRIM(C.NomPre),1,60) as nombre,
							B.monimp as imputado,
							B.moncau,
							B.monpag,
							B.monaju as ajuste,
							(B.monimp-B.monaju) as mon_aju,
							substr(D.NOMBEN,1,50) as beneficiario,
							D.cedrif as cedben
						FROM CPCOMPRO A LEFT OUTER JOIN OPBENEFI D ON A.CEDRIF=D.CEDRIF ,CPIMPCOM B, CPDEFTIT C
						WHERE
							A.REFCOM = B.REFCOM AND
               				B.CodPre = C.CodPre  AND
               				((A.REFCOM)>=RPAD('".$this->numcom1."',8,' ')  AND
                			(A.REFCOM) <=RPAD('".$this->numcom2."',8,' ') ) AND
               				(A.FECCOM>=to_date('".$this->feccom1."','dd/mm/yyyy') AND
               				A.FECCOM<=to_date('".$this->feccom2."','dd/mm/yyyy')) AND
               				((B.CODPRE) >=RPAD('".$this->codpre1."',32,' ') AND
                			(B.CODPRE) <=RPAD('".$this->codpre2."',32,' ')) AND
               				((A.TIPCOM) >= RPAD('".$this->tipcom1."',4,' ') AND
                			(A.TIPCOM) <= RPAD('".$this->tipcom2."',4,' ')) AND
							trim(A.CEDRIF) >=trim('".$this->bendes."') AND
                			trim(A.CEDRIF) <=trim('".$this->benhas."') AND
               				UPPER(D.NOMBEN) LIKE UPPER(RTRIM('".$this->comodin."'))
						ORDER BY A.REFCOM ";


			}else{
			if($this->stacom=="Activo"){$this->stacom="A";}
			else{ $this->stacom="N";}
			$this->sql="SELECT A.refcom as referencia,
							A.refprc as refprc,
							A.tipcom as tipo,
							to_char(A.feccom,'dd/mm/yyyy') as fecha,
							A.CEDRIF,
							(CASE WHEN A.STACOM='A' THEN 'Activo' WHEN A.STACOM='N' THEN 'Anulado' ELSE '' END) as STATUS2,
							A.FECANU,
							a.stacom,
							RTRIM(A.descom) as descripcion,
							RTRIM(B.CodPre ) as codigo,
							substr(RTRIM(C.NomPre),1,60) as nombre,
							B.monimp as imputado,
							B.moncau,
							B.monpag,
							B.monaju as ajuste,
							(B.monimp-B.monaju) as mon_aju,
							substr(D.NOMBEN,1,50) as beneficiario,
							D.cedrif as cedben
						FROM CPCOMPRO A LEFT OUTER JOIN OPBENEFI D ON A.CEDRIF=D.CEDRIF,CPIMPCOM B, CPDEFTIT C
						WHERE
							A.REFCOM = B.REFCOM AND
               				B.CodPre = C.CodPre  AND
               				((A.REFCOM)>=RPAD('".$this->numcom1."',8,' ')  AND
                			(A.REFCOM) <=RPAD('".$this->numcom2."',8,' ') ) AND
               				(A.FECCOM>=to_date('".$this->feccom1."','dd/mm/yyyy') AND
               				A.FECCOM<=to_date('".$this->feccom2."','dd/mm/yyyy')) AND
               				((B.CODPRE) >=RPAD('".$this->codpre1."',32,' ') AND
                			(B.CODPRE) <=RPAD('".$this->codpre2."',32,' ')) AND
               				((A.TIPCOM) >= RPAD('".$this->tipcom1."',4,' ') AND
                			(A.TIPCOM) <= RPAD('".$this->tipcom2."',4,' ')) AND
							A.STACOM='".$this->stacom."' AND
							trim(A.CEDRIF) >=trim('".$this->bendes."') AND
                			trim(A.CEDRIF) <=trim('".$this->benhas."') AND
               				UPPER(D.NOMBEN) LIKE UPPER(RTRIM('".$this->comodin."'))
						ORDER BY A.REFCOM ";
				$this->cab=new cabecera();

			}
		}
			//print $this->sql;
		}


		function Header()
		{
			//$this->cab->poner_cabecera('Autorizacion de Pre-Compromiso',$this->conf,"s","s");
			$this->SetFont("Arial","",9);
			$this->Formato();
		}


		function Formato()
		{
		   $this->SetXY(20,10);
		   //$this->Cell(15,5,'CONTRALORIA DE CHACAO');
		   $this->SetXY(20,15);
		   $this->Cell(15,3,'Oficina de Planificación y Presupuesto');
		   $this->SetFont("Arial","B",12);
		   $this->SetXY(100,30);
		   $this->Cell(15,3,'AUTORIZACION PRESUPUESTARIA');
		   //$this->Rect(163,11,40,12);
		   $this->SetXY(220,12);
		   $this->SetFont("Arial","B",8);
		   $fecha=date("d/m/Y");
		   $this->Cell(20,5,' Fecha: '.$fecha,0,0,'C');
		   $this->SetXY(214,17);
		   $this->SetFont("Arial","",8);
		   if($this->conf=="l")
			{
			$this->Cell(20,5,'Página: '.$this->PageNo(),0,0,'C');
			}



		   //Marco de la Página
		   $this->Rect(15,35,190,22);
		   //Beneficiario
		   $this->SetXY(17,37);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(15,5,'BENEFICIARIO:');
		   //Descripcion
		   $this->SetXY(17,42);
		   $this->SetFont("Arial","B",8);
		   $this->MultiCell(100,5,'DESCRIPCION:');
		   //Rectangulos de la derecha
		   $this->Rect(210,35,54,22);
		   $this->SetXY(212,37);
		   $this->SetFont("Arial","B",10);
		   $this->Cell(5,4,'Número:');

		   $this->SetXY(212,42);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(5,4,'Referencia:');

		   $this->SetXY(212,47);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(5,4,'Fecha:');

		    $this->SetXY(212,52);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(5,4,'Página:');


		   //Ponemos el Color en Gris
		   $this->SetFillColor(200);
		   //N1
		   $this->Rect(15,65,10,7,'DF');
		   $this->SetXY(15,65);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,7,'N1',0,0,'C');
		   //N2
		   $this->Rect(25,65,10,7,'DF');
		   $this->SetXY(25,65);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,7,'N2',0,0,'C');
		   //N3
		   $this->Rect(35,65,10,7,'DF');
		   $this->SetXY(35,65);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,7,'N3',0,0,'C');
		   //N4
		   $this->Rect(45,65,10,7,'DF');
		   $this->SetXY(45,65);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(10,7,'N4',0,0,'C');
		   //Cuenta
		   $this->Rect(55,65,50,7,'DF');
		   $this->SetXY(55,65);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(30,7,'CUENTA',0,0,'C');
		   //Descripcion
		   $this->Rect(85,65,115,7,'DF');
   		   $this->SetXY(85,65);
		   $this->SetFont("Arial","B",8);
		   $this->MultiCell(60,7,'DESCRIPCIÓN',0,0,'C');
		   //Monto
		   $this->Rect(180,65,28,7,'DF');
		   $this->SetXY(180,65);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(22,7,'MONTO BS.',0,0,'C');
		   //Ajuste
		   $this->Rect(208,65,28,7,'DF');
		   $this->SetXY(208,65);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(22,7,'AJUSTE',0,0,'C');
		   //Total
		   $this->Rect(236,65,28,7,'DF');
		   $this->SetXY(236,65);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(22,7,'TOTAL',0,0,'C');

		   //Total Autorizacion
		   $this->Rect(15,170,249,5);
		   $this->SetXY(150,170);
		   $this->SetFont("Arial","B",8);
		   $this->Cell(12,7,'TOTAL AUTORIZACION',0,0,'C');
		   $this->SetFont("Arial","",8);


		   //Lineas Divisoras del Detalle de la Orden
		   $this->Line(15,66,15,170);
		   $this->Line(25,66,25,170);
		   $this->Line(35,66,35,170);
		   $this->Line(45,66,45,170);
		   $this->Line(55,66,55,170);
		   $this->Line(85,66,85,170);
		   $this->Line(180,66,180,175);
		   $this->Line(208,66,208,175);
		   $this->Line(236,66,236,175);
		   $this->Line(264,66,264,170);

		   //Cuadros de Firma
		   //Gerencia de Planificacion y Presupuesto
		   $this->Rect(15,180,125,22);
		   $this->SetXY(15,183);
		   $this->SetFont("Arial","B",12);
		   $this->Cell(120,5,'GERENCIA DE PLANIFICACION Y PRESUPUESTO',0,0,'C');

		   //Gerencia de Administracion
		   $this->Rect(140,180,124,22);
		   $this->SetXY(140,183);
		   $this->SetFont("Arial","B",12);
		   $this->Cell(120,5,'GERENCIA DE ADMINISTRACION',0,0,'C');


		}


		function Cuerpo()
		{
		    $tb=$this->bd->select($this->sql);
			$tb1=$tb;
			$ref="";
			$y=75;
			$primeravez=true;
			//$acum_pre=0;
			//$acum_aju=0;
			//$acum_a=0;
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

					 $this->setFont("Arial","",8);
					 $this->SetXY(40,37);
					 $this->cell(40,5,$tb->fields["beneficiario"]);
					 $this->SetXY(40,42);
					 $this->Multicell(150,4,$tb->fields["descripcion"]);
					 $this->SetXY(228,37);
					 $this->Cell(50,5,$tb->fields["referencia"]);
					 $this->SetXY(230,42);
					 $this->Cell(50,5,$tb->fields["refprc"]);
					 $this->SetXY(223,47);
					 $this->Cell(50,5,$tb->fields["fecha"]);
					 $this->SetXY(223,52);
					 $this->Cell(20,5,$this->PageNo(),0,0,'C');
				}
				$ref=$tb->fields["referencia"];
				$this->setFont("Arial","",8);


				//Detalle

				$this->SetY(75);
				while(!$tb1->EOF and $ref==$tb1->fields["referencia"])
				{

					$this->SetX(18);
					$codigo=explode("-",$tb1->fields["codigo"]);
					$this->cell(10,4,$codigo[0]);
					$this->cell(10,4,$codigo[1]);
					$this->cell(10,4,$codigo[2]);
					$this->cell(10,4,$codigo[3]);
					$this->cell(10,4,$codigo[4].'-'.$codigo[5].'-'.$codigo[6]);
					$this->SetX(87);
					$this->setFont("Arial","",6.5);
					$this->cell(100,4,$tb1->fields["nombre"]);
					$this->setFont("Arial","",8);
					$this->SetX(188);
					$this->cell(20,4,number_format($tb1->fields["imputado"],2,'.',','),0,0,'R');
					$this->SetX(205);
					$this->cell(30,4,number_format($tb1->fields["ajuste"],2,'.',','),0,0,'R');
					$this->SetX(233);
					$this->cell(30,4,number_format($tb1->fields["mon_aju"],2,'.',','),0,0,'R');
					$acum_pre += $tb1->fields["imputado"];
					$acum_aju += $tb1->fields["ajuste"];
					$acum_a += $tb1->fields["mon_aju"];
					$tb1->MoveNext();
					$this->ln(4);
					$y=$this->GetY();

					if($y>=165)
					{
					 $this->AddPage();
					 $this->setFont("Arial","",8);
					 $this->SetXY(40,37);
					 $this->cell(40,5,$tb->fields["beneficiario"]);
					 $this->SetXY(40,42);
					 $this->Multicell(150,4,$tb->fields["descripcion"]);
					 $this->SetXY(228,37);
					 $this->Cell(50,5,$tb->fields["referencia"]);
					 $this->SetXY(230,42);
					 $this->Cell(50,5,$tb->fields["refprc"]);
					 $this->SetXY(223,47);
					 $this->Cell(50,5,$tb->fields["fecha"]);
					 $this->SetXY(223,52);
					 $this->Cell(20,5,$this->PageNo(),0,0,'C');

					 $this->SetY(75); //Posicionando el Y para el detalle de la pag nueva
					}
				}

				$tb->MoveNext();
			$this->setFont("Arial","",8);
			$this->SetXY(188,169);
			$this->cell(19,8,number_format($acum_pre,2,'.',','),0,0,'R');
			$acum_pre=0;
			$this->SetXY(205,169);
			$this->cell(30,8,number_format($acum_aju,2,'.',','),0,0,'R');
			$acum_aju=0;
			$this->SetXY(233,169);
			$this->cell(30,8,number_format($acum_a,2,'.',','),0,0,'R');
			$acum_a=0;

			//$acum_pre='';
			//$acum_aju='';
			//$acum_a='';


		}


		$this->bd->closed();
	  }
	}
?>