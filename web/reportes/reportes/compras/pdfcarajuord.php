<?
require_once ("../../lib/general/fpdfadds.php");
require_once ("../../lib/bd/basedatosAdo.php");
require_once ("../../lib/general/cabecera.php");
require_once ("../../lib/general/funciones.php");

class pdfreporte extends PDF_ADDS {

	var $bd;
	var $cab;
	var $titulo;
	var $ordcomdes;
	var $ordcomhas;
	var $codprodes;
	var $codprohas;
	var $codartdes;
	var $codarthas;
	var $fecorddes;
	var $fecordhas;
	var $unidad;
	var $partida;
	var $status;
	var $condicion;
	var $conf;

	function pdfreporte() {
		$this->conf = "p";
		$this->fpdf($this->conf, "mm", "Letter");

	$this->arrp=array("no_vacio");
			$this->bd = new basedatosAdo();
		if ($_GET["ordcomdes"] != "") {
			$this->ordcomdes = $_GET["ordcomdes"];
			$this->ordcomhas = $_GET["ordcomhas"];
			$this->sql = "SELECT DISTINCT
			A.ORDCOM,FECORD AS FECHA,TO_CHAR(A.FECORD,'DD/MM/YYYY') AS FECORD,A.CODPRO,E.NOMPRO,E.DIRPRO,E.TELPRO,E.RIFPRO,
			E.NITPRO,LOWER(E.EMAIL) AS EMAIL,E.TELPRO,B.CODCAT,A.DESORD,
			(CASE WHEN A.CRECON='CT' THEN 'Contado' WHEN A.CRECON='CR' THEN 'Crédito' ELSE 'Desconocido' END) AS CRECON,
			A.PLAENT,A.TIECAN,A.MONORD,A.DTOORD,
			(CASE WHEN A.STAORD='A' THEN 'Activo' WHEN A.STAORD='N' THEN 'Anulado' ELSE 'Desconocido' END) AS STAORD,
			A.TIPORD,B.CODART,B.DTOART,C.CODPAR,
			B.CANORD AS CANORD,F.CANAJU AS CANAJU,F.CANREC AS CANREC,F.CANTOT AS CANTOT,
			F.COSTO AS PREART,F.RGOART AS RGOART,F.TOTART AS TOTART,(C.DESART) AS DESART,B.UNIMED AS UNID,
			F.DESRES, A.NOTORD , j.nomrgo
			FROM CAORDCOM A, CAARTAOC B, CAREGART C,CAPROVEE E, CARESORDCOM F, CAAJUOC I,
			NPCATPRE G,cadisrgo h join carecarg j on substring(h.codpre,19,12)=rtrim(j.codpre)
			WHERE
			A.ORDCOM>='" . $this->ordcomdes . "' AND
			A.ORDCOM<='" . $this->ordcomhas . "' AND
			A.ORDCOM = I.ORDCOM AND
			A.ORDCOM = F.ORDCOM AND
			A.CODPRO = E.CODPRO AND
			B.CODART = C.CODART AND
			I.AJUOC = B.ajuoc AND
			B.CODCAT=G.CODCAT
			ORDER BY A.FECORD,A.ORDCOM,B.CODCAT";
		//print '<pre>';	print				$this->sql; exit;
		} else {
			$this->ordcomdes = H::GetPost("ordcomdes");
			$this->ordcomhas = H::GetPost("ordcomhas");
			$this->codprodes = H::GetPost("codprodes");
			$this->codprohas = H::GetPost("codprohas");
			$this->codartdes = H::GetPost("codartdes");
			$this->codarthas = H::GetPost("codarthas");
			$this->fecorddes = H::GetPost("fecorddes");
			$this->fecordhas = H::GetPost("fecordhas");
			$this->unidad = H::GetPost("unidad");
			$this->partida = H::GetPost("partida");
			$this->status = H::GetPost("status");
			if ($this->status == "Activas") {
				$this->condicion = " a.staord='A'";
			}
			elseif ($this->status == "Ambos") {
				$this->condicion = " (a.staord='A' or a.staord='N')";
			} else {
				$this->condicion = " a.staord='N'";
			}
			$this->sql = "SELECT DISTINCT
			A.ORDCOM,FECORD AS FECHA,TO_CHAR(A.FECORD,'DD/MM/YYYY') AS FECORD,A.CODPRO,E.NOMPRO,E.DIRPRO,E.TELPRO,E.RIFPRO,
			LOWER(E.EMAIL) AS EMAIL,E.TELPRO,B.CODCAT,A.DESORD,
			(CASE WHEN A.CRECON='CT' THEN 'Contado' WHEN A.CRECON='CR' THEN 'Credito' ELSE 'Desconocido' END) AS CRECON,
			A.PLAENT,A.TIECAN,A.MONORD,A.DTOORD,
			(CASE WHEN A.STAORD='A' THEN 'Activo' WHEN A.STAORD='N' THEN 'Anulado' ELSE 'Desconocido' END) AS STAORD,
			A.TIPORD,B.CODART,C.CODPAR,--B.DTOART,
			I.MONAJU AS MONAJU,F.CANAJU AS CANAJU,F.CANREC AS CANREC,F.CANORD AS CANTOT,
			F.COSTO AS PREART,F.RGOART AS RGOART,F.TOTART AS TOTART,(C.DESART) AS DESART,--B.UNIMED AS UNID,
			F.DESRES, A.NOTORD--,substring(h.codpre,19,12) as partiva, h.monrgo , j.nomrgo
			FROM CAORDCOM A, CAARTAOC B, CAREGART C,CAPROVEE E, CARESORDCOM F, CAAJUOC I,
			NPCATPRE G--,cadisrgo h join carecarg j on substring(h.codpre,19,12)=rtrim(j.codpre)
			WHERE --a.ordcom=h.reqart and
			A.ORDCOM>='" . $this->ordcomdes . "' AND
			A.ORDCOM<='" . $this->ordcomhas . "' AND
			A.FECORD >=TO_DATE('" . $this->fecorddes . "','DD/MM/YYYY') AND
			A.FECORD <=TO_DATE('" . $this->fecordhas . "','DD/MM/YYYY') AND " . $this->condicion . " AND
			B.CODCAT LIKE '" . $this->unidad . "%' AND
			E.CODPRO >='" . $this->codprodes . "' AND
			E.CODPRO <='" . $this->codprohas . "' AND
			C.CODART >='" . $this->codartdes . "' AND
			C.CODART <='" . $this->codarthas . "' AND
			A.ORDCOM = I.ORDCOM AND
			A.ORDCOM = F.ORDCOM AND
			A.CODPRO = E.CODPRO AND
			B.CODART = C.CODART AND
			I.AJUOC = B.ajuoc AND
			B.CODCAT=G.CODCAT
			ORDER BY A.FECORD,A.ORDCOM,B.CODCAT";
         //  print '<pre>';print				$this->sql; exit;

			/*
			$this->sql="SELECT DISTINCT ";
			$this->sql=$this->sql."A.ORDCOM,FECORD AS FECHA,TO_CHAR(A.FECORD,'DD/MM/YYYY') AS FECORD,A.CODPRO,E.NOMPRO,E.DIRPRO,E.TELPRO,E.RIFPRO,";
			$this->sql=$this->sql."E.NITPRO,LOWER(E.EMAIL) AS EMAIL,E.TELPRO,B.CODCAT,A.DESORD,";
			$this->sql=$this->sql."(CASE WHEN A.CRECON='CT' THEN 'Contado' WHEN A.CRECON='CR' THEN 'Crédito' ELSE 'Desconocido' END) AS CRECON,";
			$this->sql=$this->sql."A.PLAENT,A.TIECAN,A.MONORD,A.DTOORD,";
			$this->sql=$this->sql."(CASE WHEN A.STAORD='A' THEN 'Activo' WHEN A.STAORD='N' THEN 'Anulado' ELSE 'Desconocido' END) AS STAORD,";
			$this->sql=$this->sql."A.TIPORD,B.CODART,B.DTOART,C.CODPAR,";
			$this->sql=$this->sql."B.CANORD AS CANORD,F.CANAJU AS CANAJU,F.CANREC AS CANREC,F.CANTOT AS CANTOT,";
			$this->sql=$this->sql."F.COSTO AS PREART,F.RGOART AS RGOART,F.TOTART AS TOTART,(C.DESART) AS DESART,B.UNIMED,";
			$this->sql=$this->sql."F.DESRES, A.NOTORD ";
			$this->sql=$this->sql."FROM CAORDCOM A, CAARTORD B, CAREGART C,CAPROVEE E, CARESORDCOM F, CPIMPCOM G ";
			$this->sql=$this->sql."WHERE ";
			$this->sql=$this->sql."A.ORDCOM = B.ORDCOM AND ";
			$this->sql=$this->sql."A.ORDCOM = F.ORDCOM AND ";
			$this->sql=$this->sql."A.CODPRO = E.CODPRO AND ";
			$this->sql=$this->sql."B.CODART  = C.CODART AND ";
			$this->sql=$this->sql."B.CODART = F.CODART AND ";
			$this->sql=$this->sql."A.REFCOM = G.REFCOM AND ";
			$this->sql=$this->sql."A.ORDCOM>='".$this->ordcomdes."' AND ";
			$this->sql=$this->sql."A.ORDCOM<='".$this->ordcomhas."' AND ";
			$this->sql=$this->sql."A.FECORD >=TO_DATE('".$this->fecorddes."','DD/MM/YYYY') AND ";
			$this->sql=$this->sql."A.FECORD <=TO_DATE('".$this->fecordhas."','DD/MM/YYYY') AND".$this->condicion." AND ";
			$this->sql=$this->sql."B.CODCAT LIKE '".$this->unidad."%' AND ";
			$this->sql=$this->sql."E.NOMPRO >='".$this->codprodes."' AND ";
			$this->sql=$this->sql."E.NOMPRO <='".$this->codprohas."' AND ";
			$this->sql=$this->sql."C.DESART >='".$this->codartdes."' AND ";
			$this->sql=$this->sql."C.DESART <='".$this->codarthas."' AND ";
			$this->sql=$this->sql."SUBSTR(G.CODPRE,16,35) LIKE '%".$this->partida."%' ";

			$this->sql=$this->sql."ORDER BY A.FECORD,A.ORDCOM,B.CODCAT";*/
			//print				$this->sql; exit;
		}
		//AND".$this->condicion." AND ";


		$this->cab = new cabecera();
	}

	function Header() {
		$this->setFont("Arial","B",8);
			//Logo de la Empresa
			$this->Image("../../img/logo_1.jpg",10,8,18);

			$this->ln(5);
			//Paginas

//			$this->Cell(350,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'C');

		$this->SetFont("Arial", "B", 9);
		$this->Formato();
	}

	function Formato() {
		//Marco de la P�gina
		$this->Rect(10, 35, 200, 230);
		//Nombre Proveedor
		$this->Rect(10, 35, 200, 14);
		$this->SetXY(10, 35);
		$this->SetFont("Arial", "B", 8);
		$this->Cell(200, 5, 'PROVEEDOR',0,0,'C');
		$this->line(10, 40, 210, 40);
		//C�digo del Proveedor
		$this->Rect(128, 40, 43, 9);
		$this->SetXY(128, 42);
		$this->SetFont("Arial", "", 8);
		$this->Cell(10, 5, 'Nro. Registro:');
		//Rif del Proveedor
		$this->Rect(171, 40, 39, 9);
		$this->SetXY(171, 42);
		$this->SetFont("Arial", "", 8);
		$this->Cell(5, 5, 'RIF:');
		//Direccion del Proveedor
		$this->Rect(10, 49, 150, 15);
		$this->SetXY(10, 49);
		$this->SetFont("Arial", "", 8);
		$this->Cell(10, 5, 'DIRECCIÓN:');
		//Nit del Proveedor
		$this->Rect(160, 49, 50, 5);
		$this->SetXY(160, 49);
		$this->SetFont("Arial", "", 8);
		$this->Cell(5, 5, 'NIT:');
		//Telf del Proveedor
		$this->Rect(160, 54, 50, 5);
		$this->SetXY(160, 54);
		$this->SetFont("Arial", "", 8);
		$this->Cell(10, 5, 'TELEFONO:');
		//Email del Proveedor
		$this->Rect(160, 59, 50, 5);
		$this->SetXY(160, 59);
		$this->SetFont("Arial", "", 8);
		$this->Cell(7, 5, 'E-MAIL:');
		//Forma de Entrega
		$this->Rect(10, 64, 200, 5);
		$this->SetXY(15, 64);
		$this->SetFont("Arial", "B", 8);
		$this->Cell(200, 5, 'UNIDAD SOLICITANTE',0,0,'C');
		//No tiene nada
	//	$this->Rect(110, 64, 100, 5);
		//Codigo presupuestario
		$this->Rect(10, 69, 200, 10);
		$this->SetXY(15, 69);
		$this->SetFont("Arial", "B", 7);
		$this->Cell(88, 5, 'CODIGO PRESUSPUESTARIO',0,0,'C');
		$this->line(10, 73, 98, 73);
		$this->line(98, 64, 98, 79);
		$this->SetXY(10, 72);
		$this->SetFont("Arial", "B", 5);
		$this->Cell(21, 5, 'SECTOR',0,0,'C');
		$this->line(32, 73, 32, 79);

		$this->Cell(21, 5, 'PROGRAMA',0,0,'C');
		$this->line(54, 73, 54, 79);

		$this->Cell(21, 5, 'PROYECTO',0,0,'C');
		$this->line(76, 73, 76, 79);

		$this->Cell(21, 5, 'ACTIVIDAD',0,0,'C');

		//direccion de entrega
		$this->Rect(10, 79, 200, 15);
		$this->SetXY(10, 79);
		$this->SetFont("Arial", "B", 8);
		$this->Cell(15, 5, 'Direccion de Entrega:');
		//Descripcion
		//$this->Rect(10,89,200,10);
		$this->SetXY(10, 96);
		$this->SetFont("Arial", "B", 8);
		$this->Cell(200, 5, 'DESCRIPCION DE LOS MATERIALES O EQUIPOS',0,0,'C');
		//Ponemos el Color en Gris
		$this->SetFillColor(200);
		//Unidad Ejecutora del Articulo
		//$this->Rect(10,99,25,7,'DF');
		$this->SetXY(10, 102);
		$this->SetFont("Arial", "B", 8);
		$this->MultiCell(25, 4, 'PARTIDA', 1, 'C', 1);
		//Partida del Art�culo
		//$this->Rect(35,99,32,7,'DF');
		$this->SetXY(35, 102);
		$this->MultiCell(30, 4, 'CANT. AJUSTADA', 1, 'C', 1);
		//Descripcion del Art�culo
		//$this->Rect(67,99,75,7,'DF');
		$this->SetXY(65, 102);
		$this->Multicell(22, 4, 'MON. AJUS', 1,'C', 1);
		//Cantidad del Art�culo
		//$this->Rect(142,99,12,7,'DF');
		$this->SetXY(84, 102);
		$this->Multicell(70, 4, 'DENOMINACIÓN', 1,'C', 1);
		//Precio del Art�culo
		//$this->Rect(154,99,28,7,'DF');
		$this->SetXY(154, 102);
		$this->MultiCell(28, 4, 'PRECIO ', 1, 'C', 1);
		//Total del Art�culo
		//$this->Rect(182,99,28,7,'DF');
		$this->SetXY(182, 102);
		$this->MultiCell(28, 4, 'MONTO', 1, 'C', 1);

		//SubTotal, Descuentos e IVA

		$this->SetXY(160, 180);
		//  		   $this->Rect(10,$this->GetY(),200,20);
		$this->SetFont("Arial", "B", 8);
/*
		$this->SetXY(5, 220);
		$this->Rect(10, $this->GetY(), 200, 5);
		$this->Cell(200, 5, 'PROVEEDOR', 0, 0, 'C');
		$this->ln();

		$this->Rect(10, $this->GetY(), 200, 10);
		$this->SetFont("Arial", "B", 6);
		$this->ln(2);
		$this->MultiCell(200, 3, "EL PROVEEDOR SE COMPROMETE A ENTREGAR LOS MATERIALES Y BIENES INDICADOS EN LA PRESENTE ORDEN EN UN LAPSO DE DIAS HABILES CONTADOS A PARTIR DE LA FECHA DE RECEPCION. EL INCUMPLIMIENTO ORIGINAL UNA MULTA EQUIVALENTE AL 0,05% DEL MONTO TOTAL DE LA ORDEN, POR CADA DIA DE ATRASO O LA ANULACION DE LA ORDEN.");
*/
	}

	function Cuerpo() {

		$tb = $this->bd->select($this->sql);
		$ref = "";
		$primeravez = true;
		$subtotal = 0;
		$descuento = 0;
		$iva = 0;
		$total = 0;
		$i = 1;
		$this->iva2=0;
		//while($row=pg_fetch_array($tb))
		while (!$tb->EOF) {

			if ($tb->fields["ordcom"] != $ref) //Imprimimos encabezado
				{
				$ref = $tb->fields["ordcom"];
				if (!$primeravez) {
					$this->AddPage();
				}
				$primeravez = false;
				//Colocamos el Sello de ANULADA
				if ($tb->fields["staord"] == 'Anulado') {
					$this->SetLineWidth(1);
					$this->SetDrawColor(100, 1, 1);
					$this->SetFont("Arial", "B", 84);
					$this->SetTextColor(100, 1, 1);
					$this->SetAlpha(0.5);
					$this->Rotate(45, 40, 160);
					$this->RoundedRect(40, 160, 150, 25, 2.5, 'D');
					$this->Text(42, 183, 'ANULADA');
					$this->Rotate(0);
					$this->SetDrawColor(0);
					$this->SetTextColor(0);
					$this->SetAlpha(1);
					$this->SetLineWidth(0);
				} else {
					$this->SetAlpha(1);
				}
				/////////////////////////////////////////
				//el primero son columnas y el segundo filas
				$this->SetXY(10, 25);
				$this->SetFont("Arial", "B", 12);
				$this->t = $tb->fields["tipord"];
				if ($tb->fields["tipord"] != "S") {
					$this->Cell(150, 5, "AJUSTES A LA ORDEN", 0, 0, 'C');
				} else {
					$this->Cell(150, 5, "ORDEN DE SERVICIO", 0, 0, 'C');
				}
//rect(x(absisa de la esquina superior izquierda),y(ordenada de la esquina superior izquierda),w(ancho),h(alto))
//line(x1(absisa del primer punto),y1(ordenada del primer punto),x2(absisa del segundo punto),y2(ordenada del segundo punto))
//cuando x son iguales es horizontal |
// cuando y son iguales es vertical -----------------------
			 	$this->Rect(135, 6, 75, 24);
				$this->line(135, 14, 210, 14);
				$this->line(160, 6, 160, 14);
				$this->line(135, 22, 210, 22);
				$this->line(185, 6, 185, 14);
				$this->line(160, 22, 160, 30);
				//$this->line(185, 22, 185, 30);
				//$this->SetXY(172,22);
				$this->SetFont("Arial", "B", 8);
				$p = $this->AliasNbPages();
				$i;
				$this->SetXY(185,6);
				$this->Cell(20,5,"PAG");
				$this->SetXY(185,10);
				$this->Cell(20,5,$this->PageNo().'/'.$i ,0,0,'C');

				if ($tb->fields["tipord"] != "S") {
					$var = "OC";
					$var2="SOLICITUD DE COMPRA";
				} else {
					$var = "OS";
					$var2="SOLICITUD DE SERVICIO";
				}
				$this->SetXY(135, 6);
				$this->Cell(20, 5, "Número $var:");
				$this->SetXY(137, 10);
				$this->Cell(20, 5,$tb->fields["ordcom"]);
				//fecha actual
			$fecha=date("d/m/Y");
			$this->SetXY(160, 6);
			$this->Cell(20,5,'Fecha: ');
			$this->SetXY(167, 10);
			$this->Cell(20,5,$fecha,0,0,'C');
				$this->SetXY(135, 22);
				$this->Cell(20, 5,"Número");
				$this->SetXY(135, 26);
				$this->Cell(20, 5,$tb->fields["ordcom"]);
                $this->SetXY(157, 16);
                $this->Cell(20, 5,"$var2");
				$this->SetXY(160, 24);
				$this->Cell(20, 5, "Fecha $var: " . $tb->fields["fecord"]);
				$this->SetXY(10, 40);
				$this->SetFont("Arial", "", 8);
				$this->MultiCell(140, 3,"Nombre o Razon Social");
					$this->SetXY(10, 45);
					$this->SetFont("Arial", "B", 8);
				$this->MultiCell(140, 3, $tb->fields["nompro"]);
				$this->SetXY(148, 42);
				$this->Cell(10, 5, $tb->fields["codpro"]);
				$this->SetXY(178, 42);
				$this->Cell(10, 5, $tb->fields["rifpro"]);
				$this->SetXY(28, 50);
				$this->MultiCell(120, 3, $tb->fields["dirpro"]);
				$this->SetXY(168, 49);
				$this->Cell(10, 5, $tb->fields["nitpro"]);
				$this->SetXY(178, 54);
				$this->Cell(10, 5, substr($tb->fields["telpro"], 0, 20));
				$this->SetXY(171, 59);
				$this->SetFont("Arial", "B", 6);
				$this->Cell(10, 5, $tb->fields["email"]);
				$this->SetFont("Arial", "", 8);
					//CODIGO PRESUPUESTARIO
				$this->SetXY(10, 74);
				$sep=$tb->fields["codcat"];
				$sec=substr($sep,-17,2);
				$prog=substr($sep,-14,2);
				$proy=substr($sep,-11,2);
				$act=substr($sep,-8,2);
				$this->Cell(21, 5,$sec,0,0,'C' );
				$this->Cell(21, 5,$prog ,0,0,'C');
				$this->Cell(21, 5,$proy ,0,0,'C');
				$this->Cell(21, 5,$act ,0,0,'C');
				//vamos a buscar el iva
				$sqliva="select substring(h.codpre,19,12) as partiva,j.nomrgo , sum(h.monrgo) as total
				from cadisrgo H join carecarg j on substring(h.codpre,19,12)=rtrim(j.codpre)
				where reqart=rtrim('".$tb->fields["ordcom"]."')
				group by substring(h.codpre,19,12), j.nomrgo";
				//print '<pre>'; print $sqliva; exit;
			    $tbiva = $this->bd->select($sqliva);
			    if (!$sqliva->EOF) {
			    	$this->part=$tbiva->fields["partiva"];
		        	$this->nom=$tbiva->fields["nomrgo"];
			        $this->mon=$tbiva->fields["total"];
			        $this->iva2=$tbiva->fields["total"];

				} else {
					$forma = "";
				}
				//Vamosa buscar la Forma de Entrega
				$sqlfor = "SELECT A.DESFORENT  FROM CAFORENT A, CAORDFORENT B
				                         WHERE B.ORDCOM='" . $ref . "' AND B.CODFORENT=A.CODFORENT;";

				$tbfor = $this->bd->select($sqlfor);
				$forma = "";
				$sqlforpag="select b.desconpag from  caordconpag a, caconpag b where a.codconpag=b.codconpag and a.ordcom=rtrim('" . $ref . "')";
				//print $sqlforpag;
				$tbforpag = $this->bd->select($sqlforpag);
				//if($row2=pg_fetch_array($tbfor))
				if (!$tbfor->EOF) {
					$forma = $tbfor->fields["desforent"];
				} else {
					$forma = "";
				}
               if (!$tbforpag->EOF) {
					$forma2 = $tbforpag->fields["desconpag"];
				}
				$this->SetXY(15, 64);
				$this->Cell(62, 5,"Forma de Pago: ".$forma2);
			//	$this->SetXY(28, 70);
	        $this->line(10, 186, 210, 186);
			$this->SetXY(10, 187);
			$this->SetFont("Arial", "", 6);
			$this->MultiCell(200, 3,"OBSERVACIONES: ". trim($tb->fields["desord"]));
			$this->SetFont("Arial", "", 8);

				//Vamosa concatenar los nombres de unidad utilizados en la compra.
				$sqluni = "SELECT DISTINCT(A.CODCAT) AS CODCAT, B.NOMCAT FROM CAARTORD A,NPCATPRE B
				                         WHERE A.ORDCOM='" . $ref . "' AND A.CODCAT=B.CODCAT";
				$tbuni = $this->bd->select($sqluni);
				$unidades = "";
				$encontro = false;
				//while($row2=pg_fetch_array($tbuni))
				while (!$tbuni->EOF) {
					$encontro = true;
					if ($unidades == "") {

						$unidades = $tbuni->fields["nomcat"];
					} else {
						$unidades = $unidades . " - " . $tbuni->fields["nomcat"];
					}
					$tbuni->MoveNext();
				}
//				$this->SetXY(42, 79);
 				$this->SetXY(98, 73);
				$this->multicell(149, 3, $unidades);
				$this->SetXY(25, 90);
				$this->MultiCell(185, 3, trim($tb->fields["notord"]));
				$this->SetXY(10, 110);
				$MiY = 96;


			}
			//Ya esta posicionado en la primera fila y Columna para Empezar el detalle
			$this->SetFont("Arial", "", 8);
			$this->Cell(25, 5, $tb->fields["codpar"]);
			$this->SetX(25);
			$this->Cell(32, 5, H::FormatoMonto($tb->fields["canaju"], 2, ".", ","), 0, 0, "R");
			$this->SetX(68);
			$this->Cell(12, 5,$tb->fields["monaju"]);
			$this->SetX(154);
			$this->Cell(28, 5, H::FormatoMonto($tb->fields["preart"], 2, ".", ","), 0, 0, "R");
			$this->SetX(182);
			$this->Cell(28, 5, H::FormatoMonto(($tb->fields["cantot"] * $tb->fields["preart"]), 2, ".", ","), 0, 0, "R");
			$this->SetX(87);
			$this->MultiCell(70, 4, $tb->fields["desres"]);
			//$this->ln(5);
			$MiY = $this->GetY();
			//Acumulamos Totales
			$subtotal = $subtotal + ($tb->fields["cantot"] * $tb->fields["preart"]);
			$descuento = $descuento + $tb->fields["dtoart"];
			$iva = $iva + $tb->fields["rgoart"];


			$tb->MoveNext();

			if (($MiY > 170) && (!$tb->EOF)) {
				$ref = "";
				$this->SetFont("Arial", "", 7);
				$this->SetXY(180, 176);
				$this->Cell(28, 5, "continua...", 0, 0, "R");
				$i++;
				$this->SetXY(160, 180);
				$this->SetFillColor(200);
				$this->Rect(10, $this->GetY(), 200, 20);
				//Cuadros de Firma
				//Compras
				$this->SetXY(10, 195);
				$this->Rect(10, $this->GetY(), 70, 5);
				$this->SetFont("Arial", "B", 8);
				$this->Cell(40, 5, 'COMPRAS', 0, 0, 'C');
				$this->Rect(10, $this->GetY(), 70, 25);
				//Presupuesto
				//$this->Rect(60+20, $this->GetY(), 70, 5);
				$this->SetXY(60+20+10, 195);
				$this->SetFont("Arial", "B", 8);
				$this->Cell(50, 5, 'PRESUPUESTO', 0, 0, 'C');
				$this->Rect(60+20, $this->GetY(), 70, 25);
				//Finanzas
				$this->Rect(150, $this->GetY(), 60, 5);
				$this->SetXY(110+20+30, 195);
				$this->SetFont("Arial", "B", 8);
				$this->Cell(50, 5, 'ADMINISTRACION', 0, 0, 'C');
				//$this->Rect(110+16, $this->GetY(), 66, 25);

				//Informacion sobre Proveedor
				//$this->Rect(160,230,50,5,'DF');
				$this->SetXY(5, 220);
				$this->Rect(10, $this->GetY(), 200, 5);
				//			$this->Cell(200,5,'PROVEEDOR',0,0,'C');
				$this->ln();

				$this->Rect(10, $this->GetY(), 200, 10);
				$this->SetFont("Arial", "B", 6);
				$this->ln(2);
				$this->MultiCell(200, 3, "EL PROVEEDOR SE COMPROMETE A ENTREGAR LOS MATERIALES Y BIENES INDICADOS EN LA PRESENTE ORDEN EN UN LAPSO ".$forma." A PARTIR DE LA FECHA DE RECEPCION. EL INCUMPLIMIENTO ORIGINAL UNA MULTA EQUIVALENTE AL 0,05% DEL MONTO TOTAL DE LA ORDEN, POR CADA DIA DE ATRASO O LA ANULACION DE LA ORDEN.");
			//	$this->MultiCell(200, 3, "                                                                                                                                                                                                                                                                                                              ");
				$this->SetFont("Arial", "B", 8);

				$this->ln(2);
				$this->Cell(200, 5, 'RECIBIDO CONFORME', 0, 0, 'C');
				$this->ln();
				$this->Rect(10, $this->GetY(), 200, 5);
				$this->Cell(50, 5, 'Nombre y Apellidos', 0, 0, 'C');
				$this->Cell(50, 5, 'Firma', 0, 0, 'C');
				$this->Cell(50, 5, 'Cedula de Identidad', 0, 0, 'C');
				$this->Cell(50, 5, 'Fecha', 0, 0, 'C');

				/*	 $this->SetXY(182,215);
					 $this->Cell(28,5,H::FormatoMonto($descuento),0,0,"R");
					 $this->SetXY(182,220);
					 $this->Cell(28,5,H::FormatoMonto($iva),0,0,"R");
					 $this->SetXY(170,225);
					 $this->SetFont("Arial","B",8);
					 $this->Cell(40,5,H::FormatoMonto($total),0,0,"R");
					 */
				$subtotal = 0;
				$descuento = 0;
				$iva = 0;
				//$this->AddPage();
			}
			if (($tb->EOF) || (($ref != "") && ($ref != $tb->fields["ordcom"])))
			{
				////////////
	  		    $this->SetFont("Arial", "", 8);
			$this->Cell(25, 5, $this->part);
			$this->SetX(25);
			$this->Cell(32, 5, H::FormatoMonto('0.00', 2, ".", ","), 0, 0, "R");
			$this->SetX(68);
			$this->Cell(12, 5,"");
			$this->SetX(154);
			$this->Cell(28, 5,'0.00', 0, 0, "R");
			$this->SetX(182);
			$this->Cell(28, 5, H::FormatoMonto( $this->mon, 2, ".", ","), 0, 0, "R");

			$this->SetX(87);
			$this->MultiCell(70, 4,$this->nom );
	  		    /////////////
				$subtotal = $subtotal - $descuento; //+$iva;
				if ($descuento > 0) {
					//print 	$tb->fields["tipord"]; exit;
					if ($this->t !== "S") {
						$tipo = "ORDEN DE COMPRA";
					} else
						if ($this->t == "S") {
							$tipo = "ORDEN DE SERVICIO";
						}

					$this->Cell(172, 5, "DESCUENTO EN " . $tipo . " " . $ref);
					$this->Cell(28, 5, H::FormatoMonto($descuento, 2, '.', ','), 0, 0, 'R');
				}
				// monto en letras
				$this->SetXY(20, 181);
	  		    $this->Cell(10, 5, montoescrito($subtotal+$this->iva2, $this->bd) . "  BOLIVARES FUERTES.");

//$this->SetXY(182, 176);
//$this->Cell(28, 5,'I.V.A.: '. H::FormatoMonto($iva, 2, ".", ","), 0, 0, "R");
				$this->SetXY(182, 181);
				$this->Cell(28, 5, H::FormatoMonto($subtotal+$this->iva2, 2, ".", ","), 0, 0, "R");
				$this->iva2=0;
				$this->ln();


			//	$this->SetXY(182, 190);
			//	$this->MultiCell(182, 3, trim($tb->fields["desord"]));

				$this->SetXY(160, 180);
				$this->SetFillColor(200);
				$this->Rect(10, $this->GetY(), 200, 20);
				//Cuadros de Firma
				//Compras
				$this->SetXY(10, 195);
				$this->Rect(10, $this->GetY(), 70, 5);
				$this->SetFont("Arial", "B", 8);
				$this->Cell(40, 5, 'COMPRAS', 0, 0, 'C');
				$this->Rect(10, $this->GetY(), 70, 25);
				//Presupuesto
				//$this->Rect(60+20, $this->GetY(), 70, 5);
				$this->SetXY(60+20+10, 195);
				$this->SetFont("Arial", "B", 8);
				$this->Cell(50, 5, 'PRESUPUESTO', 0, 0, 'C');
				$this->Rect(60+20, $this->GetY(), 70, 25);
				//Finanzas
				$this->Rect(150, $this->GetY(), 60, 5);
				$this->SetXY(110+20+30, 195);
				$this->SetFont("Arial", "B", 8);
				$this->Cell(50, 5, 'ADMINISTRACION', 0, 0, 'C');
				//$this->Rect(110+16, $this->GetY(), 66, 25);

				//Informacion sobre Proveedor
				//$this->Rect(160,230,50,5,'DF');
				$this->SetXY(5, 220);
				$this->Rect(10, $this->GetY(), 200, 5);
				//			$this->Cell(200,5,'PROVEEDOR',0,0,'C');
				$this->ln();

				$this->Rect(10, $this->GetY(), 200, 10);
				$this->SetFont("Arial", "B", 6);
				$this->ln(2);
				$this->MultiCell(200, 3, "EL PROVEEDOR SE COMPROMETE A ENTREGAR LOS MATERIALES Y BIENES INDICADOS EN LA PRESENTE ORDEN EN UN LAPSO ".$forma." A PARTIR DE LA FECHA DE RECEPCION. EL INCUMPLIMIENTO ORIGINAL UNA MULTA EQUIVALENTE AL 0,05% DEL MONTO TOTAL DE LA ORDEN, POR CADA DIA DE ATRASO O LA ANULACION DE LA ORDEN.");
			//	$this->MultiCell(200, 3, "                                                                                                                                                                                                                                                                                                              ");
				$this->SetFont("Arial", "B", 8);

				$this->ln(2);
				$this->Cell(200, 5, 'RECIBIDO CONFORME', 0, 0, 'C');
				$this->ln();
				$this->Rect(10, $this->GetY(), 200, 5);
				$this->Cell(50, 5, 'Nombre y Apellidos', 0, 0, 'C');
				$this->Cell(50, 5, 'Firma', 0, 0, 'C');
				$this->Cell(50, 5, 'Cedula de Identidad', 0, 0, 'C');
				$this->Cell(50, 5, 'Fecha', 0, 0, 'C');

				/*	 $this->SetXY(182,215);
					 $this->Cell(28,5,H::FormatoMonto($descuento),0,0,"R");
					 $this->SetXY(182,220);
					 $this->Cell(28,5,H::FormatoMonto($iva),0,0,"R");
					 $this->SetXY(170,225);
					 $this->SetFont("Arial","B",8);
					 $this->Cell(40,5,H::FormatoMonto($total),0,0,"R");
					 */
				$subtotal = 0;
				$descuento = 0;
				$iva = 0;
			}
		} //End del WHILE

	}
}
?>