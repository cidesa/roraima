<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $tipo;
		var $referencia;
		var $sql;
		var $tbg;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			#$this->tipo=H::GetPost("tipo");
			$this->referencia=H::GetPost("referencia");

			$this->sql="select distinct c.codpre as codpre,b.anoing as anoing, b.tipmov as tipmov, b.ctaban as ctaban,
			b.desliq as desliq,to_char(b.fecliq,'dd/mm/yyyy') as fecha,a.destip as destip ,b.refliq as refliq
			from citiping a, cireging b, ciimping c where
			b.codtip = a.codtip and
			b.refing = c.refing and
			trim(b.refliq) = trim('".$this->referencia."') and a.starei  like('N')";

			$this->sql2="select c.montot as montot,c.codpre as codpre ,b.desing as desing,b.anoing as anoing, b.tipmov as tipmov, b.ctaban as ctaban,
			b.desliq as desliq,to_char(b.fecliq,'dd/mm/yyyy') as fecha,a.destip as destip ,b.refliq as refliq, b.refing as refing,TRIM(b.reflib) as reflib
			from citiping a, cireging b, ciimping c where
			b.codtip = a.codtip and
			b.refing = c.refing and
			b.fecing = c.fecing and
			trim(b.refliq) = trim('".$this->referencia."') and a.starei  like('N')";

			//print $this->sql2;exit;

			$this->cab=new cabecera();
			$this->tbg = $this->bd->select($this->sql);
			$this->tbg2 = $this->bd->select($this->sql2);
		}


		function cuadros($posx, $posy, $ancho, $alto, $cantidadh, $cantidadv, $estilo)
		{
			/*******************************************/
			/****ESTA FUNCION ES PARA PINTAR CUADROS****/
			/*******************************************/
			for($x=0;$x < $cantidadh;$x++)
			{
				for($y=0;$y < $cantidadv;$y++)
				{
					$forx=$posx+($x*$ancho);
					$fory=$posy+($y*$alto);
					$this->Rect($forx,$fory,$ancho,$alto,$estilo);
				}
			}
		}

		function Header()
		{
			$this->SetAutoPageBreak(false);
			$this->Image("../../img/logotesoreria.jpg",4,4,40,40);
			$tb3=$this->bd->select("select * from empresa where codemp='001'");
			if(!$tb3->EOF)
			{
				$this->ln();
				$nombre=strtoupper($tb3->fields["nomemp"]);
				$direccion=strtoupper($tb3->fields["diremp"]);
				$telef=strtoupper($tb3->fields["tlfemp"]);
				$fax=strtoupper($tb3->fields["faxemp"]);
			}
	    	//Titulo Descripcion de la Empresa
			$this->setFont("Arial","B",7);
		/*	$a1=60;
			$a2=50;
    		$this->SetXY($a1,$a2);
    		$this->Cell(45,5,$direccion,0,0,'C');
    		$this->SetXY($a1,$a2+3);
    		$this->Cell(45,5,'Tlf:'.$telef,0,0,'C');
    		$this->SetXY($a1,$a2+6);
    		$this->Cell(45,5,'Fax:'.$fax,0,0,'C');
		*/
			$this->cuadros(115,14,70,10,1,3,'D');
			$this->SetXY(115,14);
			$this->setFont("Arial","B",12);
			$this->Cell(70,10,$_POST["titulo"],0,0,'C');
			$this->SetXY(115,24);
			$this->Cell(70,10,"No.  ".$this->referencia);
			$this->SetXY(115,34);
			$this->Cell(70,6,"RAMO:");
			$this->SetXY(115,38);
			$this->Cell(70,6,$this->tbg->fields["destip"],0,0,'C');
			$this->SetXY(115,50);
			$mes = array("01" => "Enero",
						 "02" => "Febrero",
						 "03" => "Marzo",
						 "04" => "Abril",
						 "05" => "Mayo",
						 "06" => "Junio",
						 "07" => "Julio",
						 "08" => "Agosto",
						 "09" => "Septiembre",
						 "10" => "Octubre",
						 "11" => "Noviembre",
						 "12" => "Diciembre");
			$this->setFont("Arial","B",10);
			$fecha = explode("/",$this->tbg->fields["fecha"]);
			$this->Cell(1,5,"San Cristobal, ".$fecha[0]." de ".$mes[$fecha[1]]." de ".$fecha[2]);
			$this->SetY(58);
			$this->setFont("Arial","B",10);
			$this->Cell(25,5,"CIUDADANO:");
			$this->Ln(5);
			$this->Cell(30,5,"TESORERO GENERAL DEL ESTADO");
			$this->Ln(5);
			$this->Cell(40,5,"SIRVASE RECIBIR DE:");
			$this->Ln(6);
			$this->Rect(10,$this->GetY(),195,195);
			$this->Cell(1,5,"CONSIGNATARIO:");
			$this->ln(5);
		}

		function Cuerpo()
		{
		 $montotal=0;
		 $refdep="";
		foreach ($this->tbg2 as $datos)
		{
		  $montotal=$montotal+$datos["montot"];
		  $refdep=$datos["reflib"].", ".$refdep;
		}
		$codpre = explode("-",trim($this->tbg->fields["codpre"]));
			for($co=1;$co<=2;$co++)
			{
				$this->setFont("Arial","B",10);
				$this->SetX(30);
				$this->Multicell(150,4,"Tesoreria General del Estado Tachira");
				$this->Ln(2);
				$this->Line(10,$this->GetY()-1,205,$this->GetY()-1);
				$this->Cell(190,4,"CANTIDAD: ");
				$this->SetX(10);
				$this->setFont("Arial","",10);
				$this->Multicell(190,4,"                     ".ucwords(strtolower(montoescrito($montotal,$this->bd))));
				$this->Ln(2);
				$this->Line(10,$this->GetY()-1,205,$this->GetY()-1);
				$this->setFont("Arial","B",10);
				$this->Cell(145,4,"Bs. ",0,0,'R');
				$this->setFont("Arial","B",10);
				$this->Cell(160,4,number_format($montotal,2,'.',','));
				$this->Ln(6);
				$this->Line(10,$this->GetY()-1,205,$this->GetY()-1);
				$this->setFont("Arial","B",10);
				$this->Cell(190,4,"CORRESPONDIENTE: ");
				$this->SetX(10);
				$this->setFont("Arial","",10);

				$this->Multicell(190,4,"                                        ".strtoupper($this->tbg->fields["desliq"]));
				$this->Ln(2);
				$this->Line(10,$this->GetY()-1,205,$this->GetY()-1);
				/*AHORA VIENE EL CUADRITO DE ADENTRO*/
/*				$this->Ln(4);
				$this->SetX(13);
				$this->Cell(13,6,"Ano",1,0,'C');
				$this->Cell(20,6,"Sector",1,0,'C');
				$this->Cell(20,6,"Prog.",1,0,'C');
				$this->Cell(20,6,"Actividad",1,0,'C');
				$this->Cell(20,6,"Partida",1,0,'C');
				$this->Cell(38,6,"Generica-Especifica",1,0,'C');
				$this->Cell(20,6,"Numeral",1,0,'C');
				$this->Cell(38,6,"",1,0,'C');
				$this->Ln(6);
				$this->setFont("Arial","",8);
				$this->SetX(13);
				$this->Cell(13,15,$this->tbg->fields["anoing"],1,0,'C');
				$this->Cell(20,15,"",1,0,'C');
				$this->Cell(20,15,"",1,0,'C');
				$this->Cell(20,15,"",1,0,'C');
				$this->Cell(20,15,"",1,0,'C');
				$this->Cell(38,15,$this->tbg->fields["codpre"],1,0,'C');
				$this->Cell(20,15,"",1,0,'C');
				$this->Cell(38,15,"",1,0,'C');*/
				$this->Ln(4);
				$this->SetX(13);
				$this->Cell(13,8,"Ano",1,0,'C');
				$codpretit = $this->bd->select("select consec, nomabr,nomext from ciniveles order by consec");
				$this->setFont("Arial","",6);
				$cont=0;
				while(!$codpretit->EOF)
				{
					$this->Cell(25,8,$codpretit->fields["nomext"],1,0,'C');
					$cont++;
					$codpretit->MoveNext();
				}
				$this->Cell(48,8,"",1,0,'C');
				$this->Ln(8);
				$this->setFont("Arial","",8);
				$this->SetX(13);
				$this->Cell(13,14,$this->tbg->fields["anoing"],1,0,'C');
				$cont=0;
				$codpretit->MoveFirst();
				while(!$codpretit->EOF)
				{
					$this->Cell(25,14,$codpre[$codpretit->fields["consec"]-1],1,0,'C');
					$cont++;
					$codpretit->MoveNext();
				}
				$this->Cell(48,14,"",1,0,'C');
				/*FIN DEL CUADRITO DE ADENTRO*/
				$this->Ln(50);
				$this->Line(15,$this->GetY(),82,$this->GetY());
				$this->Line(125,$this->GetY(),200,$this->GetY());
				$this->setFont("Arial","B",10);
				$this->SetX(15);
				$this->Cell(65,5,"LIC.MAYELA CANTOR DE VALERA",0,0,'C');
				$this->Cell(50);
				$this->Cell(65,5,"LIC. JESANIT Y. GUERRERO VALERO",0,0,'C');
				$this->Ln(5);
				$this->SetX(15);
				$this->Cell(65,5,"LIQUIDADOR",0,0,'C');
				$this->Cell(50);
				$this->Cell(65,5,"Tesorera General del Estado(E)",0,0,'C');
				$this->Ln(20);
				$this->Cell(30,5,"BANCO:");
				$this->Cell(65,5,"BANFOANDES");
				$this->Ln(10);
				$this->Cell(30,5,"CUENTA No. ");
				$this->Cell(65,5,$this->tbg->fields["ctaban"]);
				$this->Ln(10);
				$this->Cell(30,5,"DEPOSITO:");
				$this->MultiCell(160,5,$refdep);
				$this->SetXY(12,255);
				$this->Cell(65,5,"CC.CONTABILIDAD");
				$this->SetXY(90,160);
				$this->Cell(65,5,"RECIBI CONFORME:");
				$this->SetTextColor(200,50,50);
				$this->SetDrawColor(200,50,50);
				$this->SetXY(50,256);
				$this->setFont("Arial","B",26);
				if($co==1)
				{
					$this->Cell(58,11,"ORIGINAL",1,0,'C');
				}
				else
				{
					$this->Cell(40,11,"COPIA",1,0,'C');
				}
				$this->SetDrawColor(0,0,0);
				$this->SetTextColor(0,0,0);
				if($co==1)
				{
					$this->AddPage();
				}



			}

		}
	}
?>
