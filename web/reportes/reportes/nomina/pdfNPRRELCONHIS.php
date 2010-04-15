<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql;
		var $sql2;
		var $sqla;
		var $sqlax;
		var $sqlb;
		var $sqlc;
		var $sqlx;
		var $sqlt;
		var $rep;
		var $numero;
		var $cab;
		var $con1;
		var $con2;
		var $car1;
		var $car2;
		var $niv1;
		var $niv2;
		var $emp1;
		var $emp2;
		var $nom;
		var $nombre;

		var $tipcon;

		var $fecha1;
		var $fecha2;
		var $fechae1;
		var $fechae2;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;
		var $netototal=0;
		var $neto=0;
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->con1=$_POST["con1"];
			$this->con2=$_POST["con2"];
			$this->concepto1=$_POST["concepto1"];
			$this->concepto2=$_POST["concepto2"];
			$this->tipcon=$_POST["tipcon"];

			$this->sqlz= "SELECT " .
					"A.CODNOM as codnom,
					 --A.NOMNOM as nomnom,
					 B.OPECON as asided,
					 A.CODCON AS CODCON,
					 B.NOMCON as nomcon,
					 SUM(CASE WHEN A.MONTO=0 THEN 0 ELSE 1 END ) AS CANT,
					 SUM(CASE WHEN B.OPECON='D' THEN A.CANTIDAD ELSE 0 END) AS CANTIDAD,
					 SUM(CASE WHEN B.OPECON='A' THEN A.MONTO ELSE 0 END) AS ASIGNA,
					 SUM(CASE WHEN B.OPECON='D' THEN A.MONTO ELSE 0 END) AS DEDUC ,
					 SUM(CASE WHEN B.OPECON='P' THEN A.MONTO ELSE 0 END ) AS APORTE ,
					 B.IMPCPT, b.codpar
					 FROM NPHISCON A, NPDEFCPT B
  					 WHERE   (A.CODNOM) >= TRIM('".$this->con1."') AND
					         (A.CODNOM) <= TRIM('".$this->con2."') AND
                             (CASE WHEN '".$this->tipcon."'='T' THEN 'T' ELSE B.OPECON END)='".$this->tipcon."' AND
                             A.fecnom >= to_date('".$this->fecha1."','dd/mm/yyyy')
                             AND A.fecnom <= to_date('".$this->fecha2."','dd/mm/yyyy')
                             AND A.MONTO > 0
						     AND (B.CODCON) = (A.CODCON)
						     GROUP BY A.CODNOM,
						     --A.NOMNOM,
						     B.OPECON,
						     A.CODCON,
						     B.NOMCON,
						     B.IMPCPT,b.codpar
						     ORDER BY A.CODNOM,B.OPECON,A.CODCON";

//print $this->sqlz;
		}


		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->cab=new cabecera();
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->SetXY(233.5,22);
			$this->setFont("Arial","B",8);
			$this->Cell(30,5,date("h:i:s a"));
	    	$this->SetY(37);
			//$this->ref=$this->tb->fields["codnom"];
			$this->setFont("Arial","B",8);
			$this->SetTextColor(0,0,0);
			//$this->cell(0,5,"NOMINA: ".$this->tb->fields["codnom"]." - ".$this->tb->fields["nomnom"],0,0,'C');
			$this->SetY(5);
			$this->cell(250,4,strtoupper(""),0,0,"C");
			$this->ln();
			$this->cell(250,4,"",0,0,"C");
			$this->ln();
			$this->cell(250,4,"",0,0,"C");
			$this->ln();
			$this->cell(250,4,"",0,0,"C");
			$this->ln();

			// calculo de fecha
			$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			if ( $this->fecha1>=10) {$femes=substr($this->fecha1,4,2);}
			else
			 $femes=substr($this->fecha1,4,1);
			 $me=$mes[$femes];
			//print $me=$mes[date('n')];
		    $nro=substr($this->fecha1,0,2);
		    $nro2=substr($this->fecha2,0,2);

		    if (($nro>1) and ($nro<15))
		    {	$quin="1ERA "." QUINCENA "; }
			else $quin="2DA "." QUINCENA ";
		    $fecha=strtoupper(strftime("$me"))."/".date("Y");
			///---------
			$this->setFont("Arial","B",7);
			$this->SetTextColor(128,0,0);
			$this->SetY(33);
			$this->ln();
			$this->Setx(5);
			$this->cell(50,4,"NOMINA: ",0,0,"C");
			$this->Setx(100);
			$this->cell(100,4,"Periodo del   : ".$this->fecha1."    Al:   ".$this->fecha2,0,0,"C");
			$this->ln();
			$this->Setx(5);
			$this->cell(50,4,"Nro trabajadores: ",0,0,"C");
			//$this->Setx(100);
			//$this->cell(100,4,$quin.$fecha,0,0,"C");
			$this->ln();
			$this->setFont("Arial","B",8);

			$this->Line(10,$this->GetY()+2,270,$this->GetY()+2);
			$this->SetTextColor(0,0,128);

			$this->SetxY(8,44);
			$this->Multicell(20,4,"
			Nro
			Trabajores
			",0,'L',0);

			$this->SetXY(25,49);
			$this->Cell(25,5,"Concepto",0,0,"L");

			$this->SetXY(50,49);
			$this->Cell(60,5,"Nombre del Concepto",0,0,"L");

			$this->SetXY(130,49);
			$this->Cell(40,5,"Partida Presupuestaria",0,0,"L");

			$this->SetXY(170,44);
			$this->multicell(20,4,"
			Monto
			Asignacion
			",0,'R',0);

			$this->SetXY(210,44);
			$this->multicell(20,4,"
			Monto
			Deduccion
			",0,'R',0);

			$this->SetXY(250,44);
			$this->multicell(20,4,"

			Aporte",0,'R',0);

			$this->SetTextColor(0,0,0);
			$this->Line(10,$this->GetY(),270,$this->GetY());
	    	$this->SetY(60);


	}

		function Cuerpo()
	{
		$tbz=$this->bd->select($this->sqlz);
		$anterior=$tbz->fields["codnom"];
		//$entro=false;
				//	if (!$tbz->EOF)
					//    {
						//$entro=true;
						$this->SetTextColor(0,0,0);
						$this->setFont("Arial","B",8);
						$this->SetXY(40,36);
			$rs=$this->bd->select("select nomnom as nombre from NPASICAREMP where codnom='".$this->con1."'");
			if(!$rs->EOF)
			{
				$this->nombre=$rs->fields["nombre"];
			}
						$this->cell(15,5,$tbz->fields["codnom"]."---".strtoupper($rs->fields["nombre"]));
						$this->sql="SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPHISCON WHERE (CODNOM)=('".$tbz->fields["codnom"]."') and
							  fecnom >= to_date('".$this->fecha1."','dd/mm/yyyy')
                             AND fecnom <= to_date('".$this->fecha2."','dd/mm/yyyy')";
						//print $this->sql; exit;
						$tbx=$this->bd->select($this->sql);
						$this->SetXY(40,41);
						$this->cell(20,5,$tbx->fields["numero"]);
						$this->SetY(60);
						$anterior=$tbz->fields["codnom"];
						//}

		while (!$tbz->EOF)
{
///////////////////////////////////////////////////////total
				if ($anterior!=$tbz->fields["codnom"])
				{
				$this->ln();
				$this->Line(10,$this->GetY(),260,$this->GetY());
				$this->Cell(1,5,"TOTAL DE ASIGNACIONES  DEDUCCIONES  Y APORTES:");
				$this->SetX(170);$this->cell(30,5,number_format($ASIGNACIONES,2,'.',','),0,0,'R');
				$this->SetX(205);$this->cell(30,5,number_format($DEDUCCIONES,2,'.',','),0,0,'R');
				$this->SetX(240);$this->cell(30,5,number_format($aporte,2,'.',','),0,0,'R');

				$this->ln();
				$this->SetX(200);
				$this->Line(10,$this->GetY(),260,$this->GetY());
				$this->setx(100);
				$this->sqlp="SELECT nomnom as nombre FROM NPHISCON WHERE (CODNOM)=('".$anterior."')";
				$tbp=$this->bd->select($this->sqlp);
				$this->Cell(200,5,"TOTAL NOMINA ".$anterior."---".strtoupper($tbp->fields["nombre"]));
				$this->ln();
				$this->setx(100);
				$this->Cell(20,5,"TOTAL NETO:");
				$this->cell(30,5,number_format($ASIGNACIONES-$DEDUCCIONES,2,'.',','),0,0,'R');

				$ASIGNACIONES=0;
		    	$DEDUCCIONES=0;
		    	$PATRONAL=0;
		    	$aporte=0;
				$anterior=$tbz->fields["codnom"];
				//$entro=false;
				$this->AddPage();
						$this->SetTextColor(0,0,0);
						$this->setFont("Arial","B",8);
						$this->SetXY(40,36);
						$this->cell(15,5,$tbz->fields["codnom"]."   ".strtoupper($rs->fields["nombre"]));
						$this->sql="SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPHISCON WHERE (CODNOM)=('".$tbz->fields["codnom"]."')";
						$tbx=$this->bd->select($this->sql);
						$this->SetXY(40,41);
						$this->cell(20,5,$tbx->fields["numero"]);
						$this->SetY(60);
						//$anterior=$tbz->fields["codnom"];
    	         }
    	         // detalle

						$this->setFont("Arial","",8);
						$this->ln();
     					$this->Setx(8);
     					$this->cell(15,5,$tbz->fields["cant"]);
     					$this->SetX(25);
     					$this->cell(15,5,$tbz->fields["codcon"]);
     					//brica la descripcion
						$this->SetX(130);
						$this->cell(120,5,strtoupper($tbz->fields["codpar"]));

						if (strtoupper($tbz->fields["asided"])=='A'){$this->SetX(170);;$this->cell(30,5,number_format($tbz->fields["asigna"],2,'.',','),0,0,'R');$ASIGNACIONES+=$tbz->fields["asigna"];}



					if (strtoupper($tbz->fields["asided"])=='D')
						{
						$this->sqlcon="SELECT A.CODCON FROM NPTIPPRE A WHERE A.CODCON='".$tbz->fields["codcon"]."'";
						$tbcon=$this->bd->select($this->sqlcon);
						if ($tbcon->fields["codcon"]==null){
						$this->SetX(205);
						$this->cell(30,5,number_format($tbz->fields["deduc"],2,'.',','),0,0,'R');$DEDUCCIONES+=$tbz->fields["deduc"];
						}
						else
						{
						$this->SetX(205);
						$this->cell(30,5,number_format($tbz->fields["cantidad"],2,'.',','),0,0,'R');$DEDUCCIONES+=$tbz->fields["cantidad"];
						}
						}


						if (strtoupper($tbz->fields["asided"])=='P'){$this->SetX(240);$this->cell(30,5,number_format($tbz->fields["aporte"],2,'.',','). " No suma",0,0,'R');$aporte+=$tbz->fields["aporte"];}
						$this->SetX(50);
						$this->multicell(70,3,strtoupper($tbz->fields["nomcon"]));
						//$this->SetX(250);

				$MiY=$this->GetY();
    			if (($MiY>190) && (!$tbz->EOF))
			    {
					$this->addpage();
			    }

					$tbz->MoveNext();
				}

				$this->ln();
				$this->Line(10,$this->GetY(),260,$this->GetY());
				$this->Cell(1,5,"TOTAL DE ASIGNACIONES  DEDUCCIONES  Y APORTES:");
				$this->SetX(170);$this->cell(30,5,number_format($ASIGNACIONES,2,'.',','),0,0,'R');
				$this->SetX(205);$this->cell(30,5,number_format($DEDUCCIONES,2,'.',','),0,0,'R');
				$this->SetX(240);$this->cell(30,5,number_format($aporte,2,'.',','),0,0,'R');

				$this->ln();
				$this->SetX(200);
				$this->Line(10,$this->GetY(),260,$this->GetY());
				$this->setx(100);
				$this->sqlp="SELECT nomnom as nombre FROM NPHISCON WHERE (CODNOM)=('".$anterior."')";
				$tbp=$this->bd->select($this->sqlp);
				$this->Cell(200,5,"TOTAL NOMINA ".$anterior."---".strtoupper($tbp->fields["nombre"]));
				$this->ln();
				$this->setx(100);
				$this->Cell(20,5,"TOTAL NETO:");
				$this->cell(30,5,number_format($ASIGNACIONES-$DEDUCCIONES,2,'.',','),0,0,'R');
		}


	}

?>
