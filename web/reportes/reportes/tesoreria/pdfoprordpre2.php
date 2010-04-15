<?
//Definiciones de Funciones
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/tesoreria/Oprordpre2.class.php");
    require_once("../../lib/modelo/business/presupuesto.class.php");


	class pdfreporte extends fpdf
	{
		//Def de Variables a utilizar
		var $bd;
		var $cf_montocuotas;
		var $monto;
		var $cs;
		var $cs2;
		var $montocuotas;
		var $numorddes;
		var $numordhas;
		var $bendes;
		var $benhas;
		var $fechades;
		var $fechahas;
		var $tipcaudes;
		var $tipcauhas;
		var $lugar_pago;
		var $cod_lugar;
		var $numcont;
		var $antic;
		var $valuac;
		var $fecha;
		var $numord;
		var $fecord;
		var $numserv;
		var $fecserv;
		var $proy;
		var $tb1;
		var $tb3;
		var $pase="vacio";
		var $i;


		function pdfreporte()
		{
			$this->conf = "p";
	    	$this->fpdf($this->conf, "mm", "Letter");
			$this->bd=new basedatosAdo();
			$this->cab=new cabecera();


			if($_GET["NUMORDDES"]!="")
			{
				$this->numorddes=str_replace('*',' ',$_GET["NUMORDDES"]);
				$this->numordhas=str_replace('*',' ',$_GET["NUMORDHAS"]);
				$this->oprordpre= new Oprordpre2();
				$this->arrp=$this->oprordpre->sqlp1($this->numorddes,$this->numordhas);
			}
			else
			{
			//Recibir las variables por el Post
			$this->numorddes=H::GetPost("NUMORDDES");
			$this->numordhas=H::GetPost("NUMORDHAS");
			$this->bendes=H::GetPost("BENDES");
			$this->benhas=H::GetPost("BENHAS");
			$this->ces=H::GetPost("ces");
			$this->fechades=H::GetPost("FECHADES");
			$this->fechahas=H::GetPost("FECHAHAS");
			$this->tipcaudes=H::GetPost("TIPCAUDES");
			$this->tipcauhas=H::GetPost("TIPCAUHAS");
			$this->oprordpre= new Oprordpre2();
	        $this->arrp=$this->oprordpre->sqlp2($this->numorddes,$this->numordhas,$this->bendes,$this->benhas,$this->fechades,$this->fechahas,$this->tipcaudes,$this->tipcauhas);
			}
		//H::PrintR($this->arrp);exit;
		$this->i=0;
		$i=0;
		//$this->SetAutoPageBreak(true,200);
		}

			function Header() {

				$this->setFont("Arial","B",8);
				//Logo de la Empresa
				$this->Image("../../img/logo_1.jpg",10,8,18);
				$this->ln(5);
				$this->formato();
        					}

   	function formato()
		{
		$this->SetFont("Arial", "B", 12);
		$this->SetY(36);
		$this->Cell(200,4,"COMPROBANTE DE PAGO",0,0,'C');
		$this->line(10, 40, 210, 40);

		//Marco de la P�gina
		$this->Rect(10, 35, 200, 225);
		//TIPO DE ORDEN

		//Nombre BENEFICIARIO
		$this->SetXY(10, 44);
		$this->SetFont("Arial", "B", 8);
		$this->Cell(115, 5, 'NOMBRE DEL BENEFICIARIO',0,0,'C');
		$this->Cell(100, 5, 'CEDULA DE IDENTIDAD/RIF',0,0,'C');
		$this->line(10, 44, 210, 44);
		$this->line(140, 44, 140, 57);
		$this->line(10, 48, 210, 48);

		//NOMBRE DEL BENEFICIARIO
		$this->SetFont("Arial", "", 8);
		$this->SetXY(160, 49);
		//$this->Cell(10, 5, 'C. DE I. O NRO. DE RIF:');
		$this->line(10, 57, 210, 57);
		$this->SetXY(10, 58);
		$this->SetFont("Arial", "B", 8);
		$this->Cell(200, 5, 'LA CANTIDAD DE: ',0,0,'L');
		$this->line(10, 66, 210, 66);
		$this->line(10, 70, 210, 70);

		//Descripcion
		$this->SetXY(10, 71);
		$this->SetFont("Arial", "B", 8);
		$this->Cell(70, 5, 'IMPUTACION PRESUPUESTARIA',0,0,'C');
		$this->line(10,75, 81, 75);

		//Codigo presupuestario
		$this->SetFont("Arial", "B", 7);
		$this->SetXY(11, 75);
		$this->Cell(16, 5, 'AÑO');
		$this->line(21, 75, 21, 150);
		$this->SetXY(21, 75);
		$this->Cell(16, 5, 'FON');
		$this->line(29, 75, 29, 150);
		$this->SetXY(29, 75);
		$this->Cell(16, 5, 'SEC');
		$this->line(36, 75, 36, 150);
		$this->SetXY(36, 75);
		$this->Cell(16, 5, 'PRO');
		$this->line(43, 75, 43, 150);
		$this->SetXY(43, 75);
		$this->Cell(16, 5, 'ACT');
		$this->line(50, 75, 50, 150);
		$this->SetXY(52, 75);
		$this->Cell(16, 5, 'PAR');
		$this->line(60, 75, 60, 150);
		$this->SetXY(60, 75);
		$this->Cell(16, 5, 'GEN');
		$this->line(67, 75, 67, 150);
		$this->SetXY(67, 75);
		$this->Cell(16, 5, 'ESP');
		$this->line(74, 75, 74, 150);
		$this->SetXY(74, 75);
		$this->Cell(16, 5, 'SUB');
		$this->line(81, 70, 81, 150);
		$this->SetXY(90, 75);
		$this->Cell(66, 5, 'DENOMINACION',0,0,'C');
		$this->line(170 ,70,170, 177);
		$this->SetXY(165, 75);
		$this->Cell(50, 5, 'MONTO (Bs.)',0,0,'C');

		$this->line(10,80, 210, 80);
		$this->SetFont("Arial", "", 8);
		$this->SetXY(145, 151);
		$this->Cell(20,4,'TOTAL Bs.',0,0,'R');
		$this->line(170 ,155,210, 155);
		$this->SetXY(145, 156);
		$this->Cell(20,4,'RET I.V.A',0,0,'R');
		$this->line(170 ,160,210, 160);
		$this->SetXY(145, 161);
		$this->Cell(20,4,'RET I.S.L.R',0,0,'R');
		$this->line(170 ,165,210, 165);
		$this->SetXY(145, 166);
		$this->Cell(20,4,'RET Imp. 1x1000',0,0,'R');
		$this->line(170 ,170,210, 170);
		$this->SetXY(145, 171);
		$this->Cell(20,4,'NETO A PAGAR Bs.',0,0,'R');


		$this->line(10,150, 210, 150);
		$this->line(10,177, 210, 177);
		$this->line(10,182, 210, 182);
		$this->SetFont("Arial", "B", 8);
		$this->SetY(177);
		$this->Cell(200, 5, 'CONCEPTO DE PAGO / OBSERVACIONES',0,0,'C');



		//3z$this->line(150 ,101,150, 106);//factura
		$this->line(10,197, 210, 197);
		$this->line(10,200, 210, 200);

		//FIRMAS
		$this->SetXY(10, 200);
		$this->SetFont("Arial", "B", 8);
		$this->Cell(200, 5, 'PARA USO DE LA OFICINA DE PLANIFICACION Y PRESUPUESTO',0,0,'C');
		$this->line(10,205, 210, 205);
		$this->SetFont("Arial", "B", 7);
		$this->SetXY(10, 225);
		$this->Cell(20, 5, 'Nro. _______________');
		$this->SetXY(17, 221);
		$this->Cell(20, 5, 'COMPROMISO');
		$this->SetFont("Arial", "", 8);
		$this->SetXY(60, 225);
		$this->Cell(20, 5, 'ANALISTA DE PRESUPUESTO');
		$this->line(50,225, 110, 225);
		$this->SetX(120);
		$this->Cell(20, 5, 'JEFE DE LA OFICINA');
		$this->line(115,225, 160, 225);
		$this->SetX(165);
		$this->Cell(20, 5, 'FECHA: ___________________');


		$this->SetFont("Arial", "", 8);
		$this->line(10,230, 210, 230);
		$this->line(10,235, 210, 235);
		$this->SetXY(10, 235);
		$this->Cell(200, 5, 'PARA USO DE LA DIRECCION DE ADMINISTRACION Y FINANZAS',0,0,'C');

		$this->line(10,251, 50, 251);
		$this->SetXY(10, 251);
		$this->Cell(20, 5, '            FINANZAS');
		$this->line(75,251, 140, 251);
		$this->SetXY(80, 251);
		$this->Cell(20, 5, 'DIRECTOR(A) DE ADMINISTRACION');
		$this->SetXY(95, 254);
		$this->Cell(20, 5, 'Y FINANZAS');
		$this->line(155,251, 200, 251);
		$this->SetXY(160, 251);
		$this->Cell(20, 5, 'CONTRALOR MUNICIPAL');
		}

		function Cuerpo()
		{$i=0;
			foreach ($this->arrp as $this->arrp[$this->i])
			{
				$eof=count($this->arrp);
				$i++;
				$this->SetXY(170,26);
				$this->SetFont("Arial", "B", 9);
				$this->Cell(40,5,"Nro. ".$this->arrp[$this->i]["orden"],0,0,'');
				$this->SetFont("Arial", "", 8);
				$this->SetXY(170, 30);
				$this->Cell(20,4,"FECHA: ".$this->arrp[$this->i]["fecemi"],0,0,'');
				$this->SetFont("Arial", "", 10);
				$this->SetXY(40, 50);
				$this->MultiCell(120,4,$this->arrp[$this->i]["nomben"],0,'J',0);
				$this->SetXY(166,50);
				$this->Cell(65,4,$this->arrp[$this->i]["cedrif"],0,0,'');
				/////MONTO
				$this->SetFont('Arial','',8);
				$this->SetXY(40,58);
				$this->MultiCell(140,4,montoescrito($this->arrp[$this->i]["monord"]-$this->arrp[$this->i]["monret"],$this->bd),0,'J',0);
				$this->SetXY(10,183);
				$this->MultiCell(200,3,$this->arrp[$this->i]["desord"],0,'J',0);

				//////////Hasta aqui el encabezado
			    $a=0;$b=0;$c=0;$d=0;$e=0;$f=0;$g=0;$h=0;
				if($this->arrp[$this->i]["orden"]!=$this->pase)
				{
					$this->pase=$this->arrp[$this->i]["orden"];
					$presupuesto=new Presupuesto();
                    $misql=$presupuesto->ObtenerCodPreporNiveles();
                    $this->sql3="SELECT B.NUMORD as ORDPRE, B.CODPRE, B.REFCOM,  to_char(D.FECCOM,'dd/mm/yyyy') as feccom,
							to_char(D.FECCOM,'yyyy') as ano,".$misql." ,RTRIM(C.NOMPRE) as nompre, B.moncau,b.monret as monret,
									(CASE WHEN  B.REFCOM!='NULO'THEN '1' END) as STAORD
							FROM OPDETORD as B, CPDEFTIT as C, CPCOMPRO D
							WHERE
							B.NUMORD = ('".$this->arrp[$this->i]["orden"]."') and
							B.CODPRE = C.CODPRE and
							B.REFCOM = D.REFCOM
							ORDER BY B.CODPRE";
					//	print '<pre>';	print $this->sql3; exit;
					$this->tb3=$this->bd->select($this->sql3);

                    $p=count($this->tb3);
					 $this->sql4="select b.codpre , ".$misql.", b.moncau as moncau ,b.monret as monret,RTRIM(C.NOMPRE) as nompre, substr(a.fecemi,1,4) as fecemi
					 			  from opordpag as a,OPDETORD as b, CPDEFTIT as c
                                  WHERE B.NUMORD = ('".$this->arrp[$this->i]["orden"]."') and b.CODPRE = C.CODPRE and
									a.numord = b.numord
								order by b.codpre";
                         //     	print $this->sql4; exit;
                     $this->tb4=$this->bd->select($this->sql4);

					 $this->sql5="select d.codtip,d.monret as monret, b.destip
									from opretord d, opordpag a, optipret b
									where
									a.NUMORD = ('".$this->arrp[$this->i]["orden"]."') and
									a.numord=d.numord and
									b.codtip=d.codtip
									order by d.codtip";
					 $this->tb5=$this->bd->select($this->sql5);


				}
				$this->SetFont("Arial","",8);
				$this->SetXY(25, 225);
				$this->Cell(65,4,$this->tb3->fields["refcom"],0,0,'');
				$this->cont++;
				$var=0;
	            $this->SetXY(10,86);
                $x=1;

				while(!$this->tb4->EOF)
				{
							$this->setFont("Arial","",8);
							$this->SetXY(10,$this->getY()-4);
							$this->cell(10,4,$this->tb4->fields["fecemi"],0,0,'C');
							$this->SetX(20);
							$this->cell(10,4,'00',0,0,'C');
							$this->SetX(28);
							$this->cell(10,4,$this->tb4->fields[1],0,0,'C');
							$this->SetX(35);
							$this->cell(10,4,$this->tb4->fields[2],0,0,'C');
							$this->SetX(41);
							$this->cell(10,4,$this->tb4->fields[3],0,0,'C');
							$this->SetX(50);
							$this->cell(10,4,$this->tb4->fields[4],0,0,'C');
							$this->SetX(59);
							$this->cell(10,4,$this->tb4->fields[5],0,0,'C');
							$this->SetX(66);
							$this->cell(10,4,$this->tb4->fields[6],0,0,'C');
							$this->SetX(72);
							$this->cell(10,4,'00',0,0,'C');
							$this->setFont("Arial","",7);

							//$this->Cell(60,4,$p,0,0,'');
							$this->SetX(170);
							$this->setFont("Arial","",9);
							$this->Cell(35,4,number_format($this->tb4->fields["moncau"],2,',','.'),0,0,'R');
							$subtotal=$subtotal+$this->tb4->fields["moncau"];
							$subtotalret=$subtotalret+$this->tb4->fields["monret"];
							$this->setFont("Arial","",7);
							$this->SetX(82);
							$this->multiCell(80,4,$this->tb4->fields["nompre"]);
							  if ($this->getY()>=150)//agregar pagina si el detalle pasa de getY 180
									{
										$this-> AddPage();
										$this->SetXY(170,26);
										$this->SetFont("Arial", "B", 9);
										$this->Cell(40,5,"Nro. ".$this->arrp[$this->i]["orden"],0,0,'');
										$this->SetFont("Arial", "", 8);
										$this->SetXY(170, 30);
										$this->Cell(20,4,"FECHA: ".$this->arrp[$this->i]["fecemi"],0,0,'');
										$this->SetFont("Arial", "", 10);
										$this->SetXY(40, 50);
										$this->MultiCell(120,4,$this->arrp[$this->i]["nomben"],0,'J',0);
										$this->SetXY(166,50);
										$this->Cell(65,4,$this->arrp[$this->i]["cedrif"],0,0,'');
										/////MONTO
										$this->SetFont('Arial','',8);
										$this->SetXY(40,58);
										$this->MultiCell(140,4,montoescrito($this->arrp[$this->i]["monord"]-$this->arrp[$this->i]["monret"],$this->bd),0,'J',0);
										$this->SetXY(10,183);
										$this->MultiCell(200,3,$this->arrp[$this->i]["desord"],0,'J',0);
										//inicio del detalle
										$this->SetXY(10,83);
									}

				    	$this->tb4->MoveNext();
						$var++;
						$x++;
						$this->ln(4);
			   }

					 $this->SetY(156);
					 while(!$this->tb5->EOF)
					 {
					 	 $this->SetFont('Arial','',9);
						 $this->SetX(185);
						 $this->Cell(20,3,number_format($this->tb5->fields["monret"],2,',','.'),0,0,'R');
						 $this->ln(5);

						$this->tb5->MoveNext();
					 }

					 $this->SetFont('Arial','',9);
					/* $this->SetXY(140,130);
					 $this->Cell(15,3,'SUB-TOTAL       ',0,0,'R');
					 $this->Cell(30,3,' ');
					 $this->Cell(20,3,number_format($subtotal,2,',','.'),0,0,'R');*/

					 $this->SetXY(185,151);
					 $this->Cell(20,3,number_format($subtotal,2,',','.'),0,0,'R');
					 $this->SetXY(185,172);
					 $this->Cell(20,3,number_format($subtotal-$subtotalret,2,',','.'),0,0,'R');
					 $subtotal=0;
					 $subtotalret=0;
					 if ($i<$eof)
					 {
						$this-> AddPage();
					 }
					 else
						$this->i++;
			}
			unset($this->oprordpre2);



}//grande


}
?>
