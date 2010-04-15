<?
//Definiciones de Funciones
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");


	class pdfreporte extends fpdf
	{
		//Def de Variables a utilizar
		var $bd;
		var $titulo;
		var $codigo1;
		var $codigo2;
		var $periodo1;
		var $periodo2;
		var $veces;
		var $disponible;
		var $m;


		function pdfreporte()
		{   $this->m=0;
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			//$this->bd->validar();
			//Recibir las variables por el Post
			$this->codigo1=trim($_POST["codigo1"]);
			$this->codigo2=trim($_POST["codigo2"]);
			$this->periodo1=trim($_POST["periodo1"]);
			$this->periodo2=trim($_POST["periodo2"]);
			$this->cab=new cabecera();

		}


		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",8);
			//$this->TextColor='1 g';
			$fecha=date("d/m/Y");
			$this->Cell(30,6,'Al: '.$fecha,0,0,'C');
			$this->cell(15,6,'Periodo: '.$this->periodo1);
			$this->cell(6,6,'  Al '.$this->periodo2);
			$this->ln();
			if ($this->m!=0)
			{
			/*//titulo del cuadro
				$this->TextColor='0 g';
				$this->setFont("Arial","B",9);
				$this->line($this->GetX(),$this->GetY(),270,$this->GetY());
				$this->cell(160,6,"CODIGO PRESUPUESTARIO");
				$this->cell(50,6,"CREDITOS PRESUPUESTARIOS");
				$this->cell(50,6,"CREDITOS PRESUPUESTARIOS");
				$this->ln();
				$this->cell(170,1,"DESCRIPCI�N");
				$this->cell(50,1,"MONTO ORIGINAL");
				$this->cell(50,1,"MONTO ACTUAL");
				$this->ln();
			 	$this->Line(10,$this->GetY()+2,270,$this->GetY()+2);
				$this->ln();*/

				//techo del cuadro
				$this->line($this->GetX(),$this->GetY(),270,$this->GetY());

			//primera linea
			$this->cell(45,6,"    ");
			$this->cell(100,6,"DETALLE");
			$this->cell(55,6,"MONTO");
			$this->cell(50,6,"Saldo para");
			$this->ln();
			$this->Line(10,$this->GetY()-1,208,$this->GetY()-1);

			//segunda linea
			$this->cell(20,1,"Precomp.");
			$this->cell(20,1,"Comprom.");
			$this->cell(20,1,"Causado");
			$this->cell(20,1,"Pagado");
			$this->cell(40,1,"Descripción");
			$this->cell(20,1,"Precomp.");
			$this->cell(20,1,"Comprom.");
			$this->cell(20,1,"Causado");
			$this->cell(20,1,"Pagado");
			$this->cell(25,1,"comprometer");
			$this->cell(17,1,"Fecha");
			$this->cell(20,1,"Diferencia");
			$this->ln();
			//horizontales
				$this->Line(10,$this->GetY()+2,270,$this->GetY()+2);
				$this->ln();
		}

		}


		function Cuerpo()
		{
		$this->m=1;
		$this->sql1= "SELECT DISTINCT(CODPRE),nompre,SUM(MONASI) as monasi,
					SUM(MONASI+MONADI+MONTRA-MONDIM-MONTRN) as TOTASIMOD
							FROM cpasiini
							WHERE CODPRE >=('".$this->codigo1."')
							and codpre <=('".$this->codigo2."')
							and	CODPRE=RTRIM(CODPRE)
							AND PERPRE='00'
							group by cpasiini.CODPRE,cpasiini.nompre
							ORDER BY cpasiini.CODPRE";

			$tb1=$this->bd->select($this->sql1);
			while(!$tb1->EOF)
			{
				$this->TextColor='0 g';
				$this->setFont("Arial","B",9);
				$this->line($this->GetX(),$this->GetY(),270,$this->GetY());
				$this->cell(160,6,"CODIGO PRESUPUESTARIO");
				$this->cell(50,6,"CREDITOS PRESUPUESTARIOS");
				$this->cell(50,6,"CREDITOS PRESUPUESTARIOS");
				$this->ln();
				$this->cell(170,1,"DESCRIPCIÓN");
				$this->cell(50,1,"MONTO ORIGINAL");
				$this->cell(50,1,"MONTO ACTUAL");
				$this->ln();
			 	$this->Line(10,$this->GetY()+2,270,$this->GetY()+2);
				$this->ln();
				//codigo y nombre
				$this->cell(13,10,$tb1->fields["codpre"]);
				$this->ln(4);
				$this->cell(172,10,substr($tb1->fields["nompre"],0,70));
				$this->cell(50,10,number_format($tb1->fields["monasi"],2,'.',','));
				$this->cell(14,10,number_format($tb1->fields["totasimod"],2,'.',','));
				$tb1->MoveNext();

				$this->ln(4);
				$this->line(10,$this->GetY()+3,270,$this->GetY()+3);
				$this->ln(8);
				//techo del cuadro
				$this->line($this->GetX(),$this->GetY(),270,$this->GetY());

			//primera linea
			$this->cell(45,6,"    ");
			$this->cell(100,6,"DETALLE");
			$this->cell(55,6,"MONTO");
			$this->cell(50,6,"Saldo para");
			$this->ln();
			$this->Line(10,$this->GetY()-1,208,$this->GetY()-1);

			//segunda linea
			$this->cell(20,1,"Precomp.");
			$this->cell(20,1,"Comprom.");
			$this->cell(20,1,"Causado");
			$this->cell(20,1,"Pagado");
			$this->cell(40,1,"Descripción");
			$this->cell(20,1,"Precomp.");
			$this->cell(20,1,"Comprom.");
			$this->cell(20,1,"Causado");
			$this->cell(20,1,"Pagado");
			$this->cell(25,1,"comprometer");
			$this->cell(17,1,"Fecha");
			$this->cell(20,1,"Diferencia");
			$this->ln();
			//horizontales
				$this->Line(10,$this->GetY()+2,270,$this->GetY()+2);
				$this->ln();
		$this->sql0="SELECT A.CODPRE, rtrim(A.nompre) as nompre, A.mondis,
							A.MONTRA, A.MONADI, A.MONASI, A.MONDIM, A.MONTRN,
							(A.MONASI+A.MONTRA+A.MONADI-A.MONDIM-A.MONTRN) as MONTONETO,
							A.REF, to_char(A.FECHA,'DD/MM/YYYY') as FECHA, A.TIPO, RTRIM(A.DESCRIP) as DESCRIP,
							A.MONIMP, A.STATUS,
							CASE WHEN (A.STATUS='P') THEN A.MONIMP ELSE 0 END AS MONPRC,
							CASE WHEN (A.STATUS='C') THEN A.MONIMP	ELSE 0 END AS MONCOM,
							CASE WHEN (A.STATUS='A') THEN A.MONIMP	ELSE 0 END AS MONCAU,
							CASE WHEN (A.STATUS='G') THEN A.MONIMP ELSE 0 END AS MONPAG,
							CASE WHEN (A.STATUS='P') THEN A.MONAJU ELSE 0 END AS AJUPRC,
							CASE WHEN (A.STATUS='C') THEN A.MONAJU	ELSE 0 END AS AJUCOM,
							CASE WHEN (A.STATUS='A') THEN A.MONAJU ELSE 0 END AS AJUCAU,
							CASE WHEN (A.STATUS='G') THEN A.MONAJU ELSE 0 END AS AJUPAG
							FROM CPCONEJE AS A
							ORDER BY A.CODPRE,FECHA,STATUS";
							//print '<pre>'; print $this->sql0; exit;
			$tb0=$this->bd->select($this->sql0);

			$cs_monprc=0;
			$cs_moncom=0;
			$cs_moncau=0;
			$cs_monpag=0;
			$cs_mondis=0;
			$cs_difere=0;

			while(!$tb0->EOF)
			 {
				// detalle
				$status=$tb0->fields["status"];
				If ($status=='P')
					{	$this->cell(80,10,substr($tb0->fields["ref"],0,15));
					}
				else
				If ($status=='C')
					{$this->cell(80,10,'                        '.substr($tb0->fields["ref"],0,15));
					}
				else
				If ($status=='A')
					{$this->cell(80,10,'                                                '.substr($tb0->fields["ref"],0,15));
					}
				else
				If ($status=='G')
					{$this->cell(80,10,'                                                                        '.substr($tb0->fields["ref"],0,15));

					}


				//descripcion
				$this->cell(43,10,substr($tb0->fields["descrip"],0,18));
				//montos
				$this->cell(20,10,number_format($tb0->fields["monprc"],1,'.',','));
				$this->cell(20,10,number_format($tb0->fields["moncom"],1,'.',','));
				$this->cell(20,10,number_format($tb0->fields["moncau"],1,'.',','));
				$this->cell(20,10,number_format($tb0->fields["monpag"],1,'.',','));
				$cs_monprc=$cs_monprc+($tb0->fields["monprc"]);
				$cs_moncom=$cs_moncom+($tb0->fields["moncom"]);
				$cs_moncau=$cs_moncau+($tb0->fields["moncau"]);
				$cs_monpag=$cs_monpag+($tb0->fields["monpag"]);
				$cs_mondis=($tb0->fields["MONTONETO"])-$cs_monprc;
				$cs_difere=$cs_moncom-$cs_moncau;
				//saldo para comprometer
				If ($veces=0)
					{
					$disponible=($tb0->fields["MONTONETO"])-($tb0->fields["MONPRC"]);
					$veces=$veces+1;
					}
				else{
				$disponible=$disponible-($tb0->fields["MONPRC"]);
				}

				$this->cell(20,10,number_format($disponible,1,'.',','));
				//fecha
				$this->cell(15,10,$tb0->fields["fecha"]);
				//resto de la descripcion
				$this->ln(4);
				$j=18;
				for ($i=0;$i<8;$i++)
				{
					$this->cell(30,10,'                                                                                          '.substr($tb0->fields["descrip"],$j+1,18));
					$this->ln(4);
					$j=$j+18;
				}
				$this->ln(4);
				$tb0->MoveNext();
				if ($this->GetY()>=170){
					$this->AddPage();
				}
			} //fin del archivo tb0

		//linea de separacion de totales
		$this->line(128,$this->GetY(),270,$this->GetY());
		$this->ln(4);
		$this->cell(119,10,'                        ');
		$this->cell(20,10,number_format($cs_monprc,1,'.',','));$this->cell(1,10,' ');
		$this->cell(20,10,number_format($cs_moncom,1,'.',','));$this->cell(1,10,' ');
		$this->cell(20,10,number_format($cs_moncau,1,'.',','));$this->cell(1,10,' ');
		$this->cell(20,10,number_format($cs_monpag,1,'.',','));$this->cell(1,10,' ');
		$this->cell(30,10,number_format($cs_mondis,1,'.',','));$this->cell(1,10,' ');
		$this->cell(20,10,number_format($cs_difere,1,'.',','));
		$this->ln(8);
		$this->AddPage();
		$this->m=0;
			}//fin archivo tb1
		$this->bd->closed();
	}

	}

?>