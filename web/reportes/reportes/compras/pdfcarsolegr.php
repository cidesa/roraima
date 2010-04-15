<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");

class pdfreporte extends fpdf
{

	var $bd;
	var $titulos;
	var $titulos2;
	var $anchos;
	var $anchos2;
	var $campos;
	var $sql1;
	var $sql2;
	var $rep;
	var $numero;
	var $cab;
	var $codreqdes;
	var $codreqhas;
	var $analizado;
	var $evaluado;
	var $autorizado;
	var $conf;

	function pdfreporte()
	{
		$this->conf="l";
		$this->fpdf($this->conf,"mm","Letter");
		$this->cab=new cabecera();
		$this->bd=new basedatosAdo();
		$this->titulos=array();
		$this->titulos2=array();
		$this->campos=array();
		$this->anchos=array();
		$this->anchos2=array();
		$this->codreqdes=$_POST["codreqdes"];
		$this->ela=$_POST["ela"];
		$this->revis=$_POST["rev"];
		$this->apro=$_POST["apro"];


	$this->sql="	SELECT
			A.REQART as reqart,
			to_char(A.FECREQ,'dd/mm/yyyy') as fecreq,
			A.DESREQ as desreq,
			(CASE WHEN A.VALMON = 0 THEN 0 ELSE A.MONREQ/A.VALMON END) as MONREQ,
			(CASE WHEN A.VALMON = 0 THEN 0 ELSE A.MONDES/A.VALMON END) as MONDES,
			 A.MOTREQ as motreq,
			  B.CODART as codart,
			  B.CODCAT as codcat,
			   B.CANREQ as canreq,
			   (CASE WHEN A.VALMON = 0 THEN 0 ELSE B.COSTO/A.VALMON END) as COSTO,
			   (CASE WHEN A.VALMON = 0 THEN 0 ELSE B.MONRGO/A.VALMON END) as MONRGO,
			   (CASE WHEN A.VALMON = 0 THEN 0 ELSE B.MONTOT/A.VALMON END) as MONTOT,
			   C.UNIMED as unimed,
			   C.DESART as desart,
			    A.VALMON as valmon,
			     A.TIPMON as tipmon, d.nomcat
			        FROM
			        CASOLART A,
			         CAARTSOL B left outer join npcatpre D on  B.CODCAT= D.CODCAT ,
			         CAREGART C
			          WHERE
			          A.REQART ='".$this->codreqdes."'
			           AND A.REQART=B.REQART
			           AND B.CODART=C.CODART
			              ORDER BY A.REQART,B.CODART";
		//echo "<pre>{$this->sql}</pre>"; exit;

		// ------------------------ DATOS REPETITIVOS -----------------------------------
		$this->tb=$this->bd->select($this->sql);
		$c=$this->bd->select("SELECT NOMMON as nombre FROM TSDESMON WHERE CODMON='".$this->tb->fields["tipmon"]."'");
		$this->moneda = (!$c->EOF) ? $c->fields["nombre"] : "";
	}

	function Header()
	{
		//Borde Superior e Izquierdo
	//	$this->line(10,10,270,10);
		$this->line(10,35,10,190);
		//Logo
	$this->cab->poner_cabecera_f($this,$_POST["titulo"],$this->conf,"n","n");
	//	$this->Image("../../img/logo_1.jpg",13,11,18);
		//$this->ln(15);
		$this->setFont("Arial","B",16);
		//Titulo
		//$this->cell(270,10,$_POST["titulo"],0,0,'C');
		//numero y fecha
	//	$this->ln(15);
		$this->setFont("Arial","B",9);
		$this->setx(150);
		$this->cell(70,10,'Requisición Número: ');
		$this->cell(50,10,'Fecha: ');
		$this->ln(10);
		//cuadro superior
		$this->line(15,$this->getY(),265,$this->getY());
		$this->line(15,$this->getY(),15,70);
		$this->line(40,$this->getY(),40,70);
		$this->line(200,$this->getY(),200,70);
		$this->line(265,$this->getY(),265,70);
		$this->setXY(15,$this->getY());
		$this->setFont("Arial","B",7);
		$this->cell(20,10,'Descripción:');
		$this->ln();
	    $this->setXY(15,$this->getY());
		$this->cell(20,10,'Unidad Solicitante:');
		$this->setXY(15,$this->getY()+11);
		$this->setXY(200,50);
		$this->cell(20,5,'Monto');
		$this->line(200,55,265,55);
		$this->setXY(200,55);
		$this->cell(20,5,'Moneda');
		$this->line(200,60,265,60);
		$this->setXY(200,60);
		$this->cell(20,5,'Tasa');
		$this->line(200,65,265,65);
		$this->setXY(200,65);
		$this->cell(20,5,'Bolívares');
		$this->line(15,70,265,70);
		//Subtitulos
		$this->setXY(25,70);
		$this->setFont("Arial","B",6);
		$this->cell(110,4,'');
		$this->cell(50,4,'PRIORIDAD 1');
		$this->cell(50,4,'PRIORIDAD 2');
		$this->cell(50,4,'PRIORIDAD 3');
		$this->setFont("Arial","B",8);
		$this->setXY(25,71);
		$this->setFont("Arial","B",8);
		$this->cell(100,10,'CUADRO COMPARATIVO DE OFERTAS DE PROVEEDORES');
		//$this->ln();

		$this->line(15,81,265,81);
		$this->setXY(15,81);
		$this->setFont("Arial","B",8);
		$this->cell(15,5,'Código');
		$this->cell(55,5,'Descripción');
		$this->cell(20,5,'Unid. Medida');
		$this->cell(10,5,'Cant.');
		$this->cell(17,5,'Prec.Unit');
		$this->cell(6,5,'Pri.');
		$this->cell(10,5,'Cant.');

		$this->cell(17,5,'Prec.Total');
		$this->cell(17,5,'Prec.Unit');

		$this->cell(6,5,'Pri.');

		$this->cell(9,5,'Cant.');
		$this->cell(18,5,'Prec.Total');
		$this->cell(17,5,'Prec.Unit');
		$this->cell(6,5,'Pri.');

		$this->cell(10,5,'Cant');

		$this->cell(17,5,'Prec.Total');
		//cuadro inferior
		$this->line(15,86,265,86);
		$this->line(30,81,30,135);
		$this->line(85,81,85,135);
		$this->line(105,81,105,135);
		$this->line(132,81,132,135);
		$this->line(138,81,138,135);
		$this->line(148,81,148,135);
		$this->line(182,81,182,135);
		$this->line(188,81,188,135);
		$this->line(198,81,198,135);
		$this->line(232,81,232,135);
		$this->line(238,81,238,135);
		$this->line(248,81,248,135);
		$this->line(15,135,265,135);
		$this->setXY(85,135);
		$this->cell(30,4,'TOTAL',0,1,'R'); $this->setX(85);
	/*	$this->cell(30,4,'DESCUENTO',0,1,'R'); $this->setX(85);
		$this->cell(30,4,'IVA',0,1,'R'); $this->setX(85);
		$this->cell(30,4,'TOTAL NETO',0,1,'R');*/
		$this->line(115,70,115,151);
		$this->line(165,70,165,151);
		$this->line(215,70,215,151);
		$this->line(265,70,265,151);
		$this->line(15,70,15,151);
		$this->line(15,151,265,151);
		//Cuadro para la firma
	//	$this->setXY(145,159);
	$this->setX(40);
		$this->setY(170);
	$this->SetWidths(array(85,85,90));
	$this->SetAligns(array("C","C","C"));
	$this->SetBorder(1);
	$this->ln();
	$this->Row(array("ELABORADO","REVISADO","CONFORMADO"));
	// $this->ln();
	$this->setJump(15);
	$this->SetAligns(array("L","L","L"));
	$this->Row(array("Nombre: ".$this->ela,"Nombre: ".$this->revis,"Nombre: ".$this->apro));
	$this->setJump(2);
	$this->SetAligns(array("C","C","C"));
	$this->setFont("Arial","B",7);
	$this->Row(array("Firma","Firma","Firma"));
	/*$this->setXY(145,159);
		$this->cell(50,5,'ELABORADO');
		$this->cell(30,5,'REVISADO');
		$this->cell(30,5,'APROBADO');
		$this->setXY(135,159+6);
		$this->cell(45,5,'Nombre: '.$this->ela);
		$this->cell(45,5,'Nombre: '.$this->revis);
		$this->cell(30,5,'Nombre: '.$this->apro);
		$this->setXY(135,159+12);
		$this->cell(45,5,'Firma:_________________');
		$this->cell(45,5,'Firma:_________________');
		$this->cell(30,5,'Firma:_________________');
		$this->line(135,159,222,159);
		$this->line(135,159,135,179);
		$this->line(176,159,176,179);
		$this->line(220,159,220,179);
		$this->line(176,179,220,179);
		$this->line(221,159,264,159);
		//$this->line(221,159,221,179);
		$this->line(264,159,264,179);
		$this->line(135,179,264,179);*/
		////////////////////////////////////////////
		//Borde Inferior y Derecho
		$this->line(270,35,270,190);
	//	$this->line(10,205,270,205);
		////////////////////////////////////////////
		//Datos repetitivos
		$this->setXY(185,38);
		$this->setFont("Arial","B",11);
		$this->cell(48,5,$this->tb->fields["reqart"]);
		$this->cell(50,5,$this->tb->fields["fecreq"]);
		$this->setXY(41,53);
		$this->setFont("Arial","B",9);
		$this->multicell(135,3,($this->tb->fields["desreq"]));
		$this->setXY(41,63);
		$this->setFont("Arial","B",9);
		$this->multicell(135,3,($this->tb->fields["nomcat"]));
		// monto
		$this->setXY(220,50);
		$this->cell(30,5,number_format($this->tb->fields["monreq"],2,',','.'));
		//moneda
		$this->setXY(220,50+5);
		$this->cell(30,5,$this->moneda);
		//tasa
		$this->setXY(220,50+10);
		$this->cell(30,5,number_format($this->tb->fields["valmon"],2,',','.'));
		//bolivares
		$this->setXY(220,50+15);
		$this->cell(30,5,number_format($tb->fields["monreq"]*$tb->fields["valmon"],2,',','.'));
	}

	function Cuerpo()
	{
		$tb =& $this->tb;
		//echo "<pre>".print_r($tb,true)."</pre>"; exit;
		$ref=$tb->fields["reqart"];
	//----------------------------------------------------------------------------------------------

		$provee_sql = "	SELECT A.NOMPRO as proveedor, refcot as refcot FROM CAPROVEE A,CACOTIZA B WHERE B.CODPRO=A.CODPRO AND B.REFSOL='".$ref."' order by refcot";
		//echo "<pre>$provee_sql</pre>"; exit;
		$proveedores=$this->bd->select($provee_sql);
		$npro = 0;

	//----------------------------------------------------------------------------------------------

		$this->setFont("Arial","B",6);
		$Y = 87; $H = 4;
		$this->sety($Y);
		while (!$tb->EOF)
		{
			$proveedores->moveFirst();
			while (!$proveedores->EOF) { //PROVEEDORES
	//------------------------------------------ Nombre Proveedor ----------------------------------
				$this->setXY(115+50*$npro,73);
				$proveedor=$proveedores->fields["proveedor"];
				$this->multicell(50,4,$proveedor);
	//----------------------------------------------------------------------------------------------

				$n_art = 0;
				$NLs = 0;
				$acum_totdet = 0;
				while(!$tb->EOF && $NLs + ($nl = $this->NbLines(55,$tb->fields["desart"])) <= 12)
				{
					$n_art++;
					$ref=$tb->fields["reqart"];

		//======================================= DETALLE =============================================

					if ($npro == 0){
						$this->setXY(15,$Y+$H*$NLs); $this->cell(15,$H,$tb->fields["codart"]);
						$this->setXY(30,$Y+$H*$NLs); $this->multicell(55,$H,$tb->fields["desart"],0,'L');
						$this->setXY(85,$Y+$H*$NLs); $this->cell(20,$H,$tb->fields["unimed"]);
						$this->setXY(105,$Y+$H*$NLs); $this->cell(10,$H,$tb->fields["canreq"]);
					}

					$rs_sql = "SELECT DISTINCT (coalesce(A.COSTO,0)) as precio, a.priori, totdet as totdet, canord , b.monrec FROM CADETCOT A,CACOTIZA B WHERE A.REFCOT=B.REFCOT AND  B.REFSOL='".$tb->fields["reqart"]."' AND  A.CODART='".$tb->fields["codart"]."' AND A.REFCOT ='".$proveedores->fields["refcot"]."'";
					//echo "<pre>$rs_sql</pre>"; exit;
					$rs=$this->bd->select($rs_sql);
					$this->setXY(115+50*$npro,$Y+$H*$NLs);
					$this->cell(17,$H,number_format($rs->fields["precio"],2,',','.'),0,0,"R");
					$this->cell(4,$H,$rs->fields["priori"],0,0,"R");
					$this->cell(12,$H,number_format($rs->fields["canord"],2,',','.'),0,0,"R");
					$this->cell(17,$H,number_format($rs->fields["totdet"],2,',','.'),0,0,"R");
					$acum_totdet += $rs->fields["totdet"];
                    $ivadig=$rs->fields["monrec"];
					//$this->ln();
					$NLs += $nl;
					$tb->moveNext();
				}
				$this->setXY(115+50*$npro,135);
				$this->cell(50,4,number_format($acum_totdet,2,',','.'),0,1,"R");//TOTAL
			/*	$descuento = 0;
				$this->setX(115+50*$npro); $this->cell(50,4,number_format($descuento,2,',','.'),0,1,"R");//DESCUENTO
                            $IVA=0;
				$IVA=((($acum_totdet-$descuento)*12)/100);

				$this->setX(115+50*$npro); $this->cell(50,4,number_format($IVA,2,',','.'),0,0,"R");//IVA

				$this->setX(115+50*$npro); $this->cell(50,12,number_format($acum_totdet-$descuento+$IVA,2,',','.'),0,0,"R");//TOTAL NETO
                         */   //
				$proveedores->moveNext();
				if (!$proveedores->EOF) {
					$tb->move($tb->currentRow()-$n_art);
					$npro++;
				}
				if (!$tb->EOF && ($npro == 3 || $proveedores->EOF)) {
					$npro = 0;
					$this->addpage();
				}
			}//CANTIDADA DE PROVEEDORES
		}
		$this->setFont("Arial","B",8);
		//totales generales
		$this->proc="select refcot from CACOTIZA  where REFSOL='".$this->codreqdes."'";
        $tb2=$this->bd->select($this->proc);
        $npro = 0;
        $this->setXY(85,139);
		$this->cell(30,4,'SUB-TOTAL',0,1,'R'); $this->setX(85);
		$this->cell(30,4,'IVA',0,1,'R'); $this->setX(85);
		$this->cell(30,4,'TOTAL NETO',0,1,'R');

         while (!$tb2->EOF) {
         	$this->setY(139);
         	$npro++;
		$total="SELECT
				sum(totdet) as totdet
				FROM
				CADETCOT A,
				CACOTIZA B
				WHERE
				A.REFCOT=B.REFCOT AND
				B.REFSOL='".$this->codreqdes."' AND
				A.REFCOT ='".$tb2->fields["refcot"]."'";
				//print $total;
			    $tot=$this->bd->select($total);



			$this->setX(65+50*$npro); $this->cell(50,4,number_format($tot->fields["totdet"],2,',','.'),0,1,"R");//DESCUENTO
                            $IVA=0;
			$IVA=((($tot->fields["totdet"])*12)/100);

			$this->setX(65+50*$npro); $this->cell(50,4,number_format($IVA,2,',','.'),0,0,"R");//IVA

			$this->setX(65+50*$npro); $this->cell(50,12,number_format($tot->fields["totdet"]+$IVA,2,',','.'),0,0,"R");//TOTAL NETO
                            //

				$tb2->moveNext();
         }

	}
}
?>