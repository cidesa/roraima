<?
	require_once("../../lib/general/fpdfadds.php");
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/funciones.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");

	require_once("../../lib/modelo/sqls/compras/Carordpre.class.php");

	class pdfreporte extends PDF_ADDS
	{

		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
		var $acum4=0;
		var $acum5=0;
		var $acum1t=0;
		var $acum2t=0;
		var $acum3t=0;
		var $acum4t=0;
		var $acum5t=0;
		var $cont=0;
		var $cont1=0;
		var $result=0;
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $sql3;
		var $rep;
		var $numero;
		var $cab;
		var $nrord1;
		var $nrord2;
		var $codart1;
		var $codart2;
		var $codpro1;
		var $codpro2;
		var $fecreg1;
		var $fecreg2;
		var $status;

	function pdfreporte()
		{
			 $this->p= new Carordpre();
		    $this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->bd=new basedatosAdo();
			$this->ordcomdes=H::GetPost("ordcomdes");
			$this->ordcomhas=H::GetPost("ordcomhas");
			$this->codprodes=H::GetPost("codprodes");
			$this->codprohas=H::GetPost("codprohas");
			$this->codartdes=H::GetPost("codartdes");
			$this->codarthas=H::GetPost("codarthas");
			$this->fecorddes=H::GetPost("fecorddes");
			$this->fecordhas=H::GetPost("fecordhas");
			$this->status=H::GetPost("status");
			if ($this->status=="Activas"){$this->condicion=" a.staord='A'";}
			elseif ($this->status=="Ambos"){$this->condicion=" (a.staord='A' or a.staord='N')";}
			else { $this->condicion=" a.staord='N'";}

				$this->sql="SELECT
					A.ORDCOM,
					A.FECORD AS FECHA,
					TO_CHAR(A.FECORD,'DD/MM/YYYY') AS FECORD,
					A.CODPRO,
					E.NOMPRO,
					E.DIRPRO,
					E.TELPRO,
					E.RIFPRO,
					E.NITPRO,
					LOWER(E.EMAIL) AS EMAIL,
					E.TELPRO,
					A.DESORD,
					A.JUSTIF,
					(CASE WHEN A.CRECON='CT' THEN 'Contado'  WHEN A.CRECON='CR' THEN 'Credito' ELSE 'Desconocido' END) AS CRECON,
					A.PLAENT,
					A.TIECAN,
					A.MONORD,
					SUBSTR(A.NOTORD,1,22) AS NOTORD,
					(CASE WHEN A.STAORD='A' THEN 'Activo' WHEN A.STAORD='N' THEN 'Anulado' ELSE 'Desconocido' END) AS STAORD,
					A.TIPORD, E.DIRPRO as dir
					FROM
					CAORDCOM A
					,CAPROVEE E
					 WHERE
					 A.CODPRO = E.CODPRO
					AND".$this->condicion."
										and rtrim(A.ORDCOM)>=rtrim('".$this->ordcomdes."')
										and rtrim(A.ORDCOM)<=rtrim('".$this->ordcomhas."')
										and A.FECORD >=TO_DATE('".$this->fecorddes."','DD/MM/YYYY')
							            and A.FECORD <=TO_DATE('".$this->fecordhas."','DD/MM/YYYY')
							            and E.codPRO >='".$this->codprodes."'
							            and E.codPRO <='".$this->codprohas."'
					GROUP BY
					A.ORDCOM,
					A.FECORD ,
					TO_CHAR(A.FECORD,'DD/MM/YYYY') ,
					A.CODPRO,
					E.NOMPRO,
					E.DIRPRO,
					E.TELPRO,
					E.RIFPRO,
					E.NITPRO,
					LOWER(E.EMAIL),
					E.TELPRO,
					--B.CODCAT,
					A.DESORD,
					A.JUSTIF,
					CRECON,
					A.PLAENT,
					A.TIECAN,
					A.MONORD,
					SUBSTR(A.NOTORD,1,22),
					STAORD,
					A.TIPORD , E.DIRPRO";

				/*	 print '<pre>';
    print_r($this->sql);
    print '</pre>';*/




			$this->cab=new cabecera();



		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="Año";
				$this->titulos[1]="Uni. Ejecutora";
				$this->titulos[2]="Actividad";
				$this->titulos[3]="Programa";
				$this->titulos[4]="Partida";
				$this->titulos[5]="Generica";
				$this->titulos[6]="Epecifica";
				$this->titulos[7]="Sub-Especifica";

		}


 function header()

{

	//$this->cab->footer($this);

	$this->SetFillColor(230,230,230);

	$this->setFont("Arial","B",9);
	$this->sqla="select nomemp from empresa where codemp='001'";
	$tba=$this->bd->select($this->sqla);

	//LOGO
	//$this->Rect(10,10,60,20);
    $this->Image("../../img/logo_1.jpg",10,10,20);
    //$this->Image("../../img/logo_1.jpg",31,10,33);

	// primer reectangulo
	//$this->Rect(10,10,200,20);

	$this->setFont("Arial","B",9);
	$this->SetXY(70,15);
	$this->multicell(50,4,"ORDEN DE COMPRAS Y/O SERVICIOS",0,"C");

	$this->SetxY(120,10);
	//$this->cell(90,5,"ORDEN ",0,0,"C",1);
	$this->ln();
	$this->SetxY(120,15);
	$this->Cell(30,5,"NUMERO",0,0,'C');
	$this->Cell(30,5,"FECHA",0,0,'C');
	$this->Cell(30,5,"PÁG.",0,0,'C');
	$this->setFont("Arial","B",9);
	$this->Setxy(180,20);
	$this->Cell(30,10,$this->PageNo().' de {nb}',0,0,'C');
	$this->ln();
	$this->ln();
	$this->Sety(25);


	// segundo rectangulo
	$this->ln();
	$this->cell(30,5,"Plazo de Entrega",1,0,"",1);
	$this->cell(50,5,"Condiciones de Pago",1,0,"",1);
	$this->cell(90,5,"Proveedor",1,0,"",1);
	$this->cell(30,5,"R.I.F",1,0,"",1);
	$this->ln();


// TERCER RECTANGULO
	$this->Sety(51);

	$this->cell(100,5,"Dirección",1,0,"",1);
	$this->cell(40,5,"Unidad Solicitante",1,0,"",1);
	$this->cell(60,5,"Lugar de Entrega",1,0,"",1);

// NO BORRAR
	$this->ln();
	$this->ln();
	$this->ln();
	$this->ln(5);
    //$this->ln();

	$this->cell(200,5,"ESPECIFICACIONES DE LA COMPRA",1,0,"C",1);

	//sexto


    $this->setFont("Arial","B",5);
	$this->ln();
	$this->cell(9,10,"RENGLON",1,0,"C");
	$this->cell(20,10,"CANT.",1,0,"C");
	$this->cell(18,10,"TIPO UNIDAD",1,0,"C");
	$this->cell(83,10,"DESCRIPCION DEL BIEN O SERVICIO",1,0,"C");
	$this->cell(35,10,"PRECIO UNITARIO",1,0,"C");
	$this->cell(35,10,"TOTAL",1,0,"C");

	$this->ln();
	$this->cell(9,80,"",1,0,"C");
	$this->cell(20,80,"",1,0,"C");
	$this->cell(18,80,"",1,0,"C");
	$this->cell(83,80,"",1,0,"C");
	$this->cell(35,80,"",1,0,"C");
	$this->cell(35,80,"",1,0,"C");



// octavo cuadro de los totales
	$this->Rect(10,170,130,12);
	$this->ln();
	$this->Setx(10);
	$this->cell(130,4,"MONTO EN LETRAS:",1,0,"L");
	$this->totales =array(0=>"SUBTOTAL",1=>"DCTO",2=>"IVA 9 %",3=>"TOTAL Bs.");


	for ($i=0; $i<4; $i++){
		$this->Setx(140);
		$this->cell(35,4,$this->totales[$i],1,0,"R",1);
		$this->ln();
	}


	$this->cell(200,5," FIRMAS",1,1,"C",1);

	$this->cell(66,3," UNIDAD CONTRATANTE",1,0,"C",1);
	$this->cell(134,3," AUTORIZACIÓN",1,0,"C",1);
	H::cuadros(10,190,66,10,2,1);
	H::cuadros(142,190,68,10,1,1);
	$this->SetxY(10,200);
	$this->cell(66,3," UNIDAD DE COMPRAS",1,0,"C",1);
	$this->cell(134,3," GERENCIA DE SERVICIOS",1,0,"C",1);
	H::cuadros(10,203,66,10,1,1);
	H::cuadros(76,203,134,10,1,1);
	H::cuadros(10,213,50,10,4,1);
	$this->t =array(0=>"NOMBRE:",1=>"CEDULA DE IDENTIDAD N°.:",2=>"FECHA:",3=>"FIRMA:");
	$this->setFont("Arial","B",7);
	$this->SetxY(10,213);
	for ($i=0; $i<4; $i++){

		$this->cell(50,5,$this->t[$i],0,0,"L",0);
		}


//	 NOVENO CUADRO

	$this->SetxY(10,223);
	$this->cell(200,5," IMPUTACIÓN PRESUPUESTARIA",1,1,"C",1);

	$this->llenartitulosmaestro();
	$ncampos=count($this->titulos);
	$this->Setx(10);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell(20,4,$this->titulos[$i],1,0,"C");
			}
			$this->cell(40,4," MONTO BOLÍVARES",1,0,"C");
			$this->ln(4);
			// fila para las cantidades
			for($i=0;$i<$ncampos;$i++)
			{
			$this->cell(20,20,"",1,0,"C");
			}
			$this->cell(40,20,"",1,0,"C");

			$sum=0;$sueldo=0;
		    $this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);

			H::cuadros(130,252,40,5,2,1);
			$this->SetxY(130,252);
			$this->setFont("Arial","B",7);
			$this->cell(40,5," TOTAL Bs.",0,0,"R");



// decimo cuadro


	/*$this->PageBreakTrigger += 40;
	$this->SetxY(10,253);
	$this->setFont("Arial","Bi",6);
	$this->cell(50,2,"CONDICIONES PARA LA COMPRA:",0,1,"L");
	$this->setFont("Arial","i",5);
	$this->cell(50,2,"1. ES IMPORTANTE QUE INDIQUE EN SU FACTURA EL NUMERO DE LA ORDEN",0,1,"L");
	$this->cell(50,2,"2. ENVIE LA FACTURA POR DUPLICADO",0,1,"L");
	$this->cell(50,2,"3. USE UNA SOLA FACTURA PARA CADA ORDEN",0,1,"L");
	$this->cell(50,2,"4. LAS MARCAS DE EMBARQUE SERAN IGUAL AL NUEMRO DE LA ORDEN",0,1,"L");
    $this->PageBreakTrigger -= 40;*/
	}




function Cuerpo()
		{
		    $tb=$this->bd->select($this->sql);
			$ref="";
			$primeravez=true;
			$subtotal=0;
			$descuento=0;
			$iva=0;
			$total=0;
			$renglon=0;

while (!$tb->EOF)
		{

		$continua=true;
		$a=0;
		$renglon=0;
		$acum=0;
 while ($continua==true){
			$continua=false;

		  $ref=$tb->fields["ordcom"];
			    $a++;
			    if ($a==1){
			    	$acum=0;
			    	$ref1=$tb->fields["ordcom"];


			    				$sqlimp="
						SELECT substr(B.codpre,1,2) as pg,
						 substr(B.codpre,1,5) as ac,
						 substr(B.codpre,7,3) as par,
						 substr(B.codpre,11,2) as ge,
						substr(B.codpre,14,2) as es, substr(B.codpre,17,2) as se, (monimp-monaju) as monto FROM CAORDCOM A, CPIMPCOM B
                         WHERE rtrim(A.ORDCOM)=rtrim('".$ref1."') AND B.refcom=A.refcom";
//                         print $sqlimp; exit;

                $tbimp=$this->bd->select($sqlimp);

$this->sqldetalle="SELECT
A.CODART as codart,
SUBSTR(A.UNIMED,1,8) AS UNIMED,
sum(A.CANORD-A.CANAJU) AS CANORD,
sum(A.DTOART) as dtoart,
A.PREART AS PREART,
sum(A.RGOART) AS RGOART,
sum(A.TOTART) AS TOTAL
FROM CAARTORD A
WHERE rtrim(A.ORDCOM)=rtrim('".$ref1."')
GROUP BY
A.CODART,
SUBSTR(A.UNIMED,1,8),preart";




				$sql="SELECT A.DESCONPAG
	 		FROM CACONPAG A, CAORDCONPAG B
         	WHERE B.ORDCOM='".$ref1."' AND B.CODCONPAG=A.CODCONPAG";
         	$tbfp=$this->bd->select($sql);

         	$sql="select 	TO_CHAR(FECini,'YYYY') AS ano from cpdefniv";
         	$tbano=$this->bd->select($sql);
         	//print $sql; exit;



				$tbdet=$this->bd->select($this->sqldetalle);
				 $ref1='';
			    }

				if (!$primeravez)
				{$this->AddPage(); }
				$primeravez=false;

				if ($tb->fields["staord"]=='Anulado')
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
				/////////////////////////////////////////
				$this->SetFont("Arial","B",10);
				$this->SetxY(120,20);
			    $this->Cell(30,10,$tb->fields["ordcom"],0,0,"C");
			    $this->SetxY(150,20);
				$this->Cell(30,10,$tb->fields["fecord"],0,0,"C");

				 //Vamosa buscar la Forma de Entrega
				$sqlfor="SELECT A.DESFORENT  FROM CAFORENT A, CAORDFORENT B
                         WHERE B.ORDCOM='".$ref."' AND B.CODFORENT=A.CODFORENT";
				$tbfor=$this->bd->select($sqlfor);
				$forma="";
			    if (!$tbfor->EOF)
				{
				   $forma=$tbfor->fields["desforent"];
				}
				else
				{
				   $forma="";
				}
				if (!$tbfp->EOF){
					$fp=$tbfp->fields["desconpag"];

				} else
				$fp="";

     		     $this->SetXY(10,40);
     		     $this->setwidths(array(30,50,90,30));
				 $this->setaligns(array("C","C","L","C"));
				 $this->setborder(true);
				 $this->SetFont("Arial","B",7);
				 $this->rowM(array($forma,$fp,$tb->fields["nompro"],$tb->fields["rifpro"]));



	// Direccion del Proveedor ,Unida y Lugar de Entrega
				$this->Sety(56);
				$this->SetFont("Arial","B",7);
				 $this->setwidths(array(100,40,60));
				 $this->setaligns(array("L","L","L"));
				 $this->setborder(true);
				 $this->rowM(array($tb->fields["dir"],"ALMACEN","Barquisimeto, Edíficio Dirección Regional de Salud del Estado Lara"));



	 // monto en letras
				$this->SetXY(10,80);
     		    $monto=$tb->fields["monord"];
     		    $letras=montoescrito($monto,$this->bd);
			    $this->SetFont("Arial","B",8);
     		    $this->SetXY(10,170);
     		    $this->multicell(130,4,$letras,0,'L');

		//$MiY=96;
		$MiY=88; // 96
		$this->SetXY(10,$MiY);

		 while (!$tbdet->EOF && $MiY<170)
               {
			  $this->SetFont("Arial","",8);
			  $renglon++;
			  $this->SetX(10);
			  $this->Cell(25,4,$renglon);
			  $this->SetX(39);
			  $this->Cell(17,4,$tbdet->fields["unimed"],0,0,"L"); //unidad
			  $this->SetX(20);
			  $this->Cell(12,4,number_format($tbdet->fields["canord"],0,",","."),0,0,"L"); //cantida
			  $this->SetX(145);
			  $this->Cell(28,4,number_format($tbdet->fields["preart"],2,",","."),0,0,"R"); //precio
			  $this->SetX(182);
			  $this->Cell(28,4,number_format($tbdet->fields["total"],2,",","."),0,0,"R"); //total

			  $sql="select  B.desres as desart  from CARESORDCOM B where rtrim(B.codart)=rtrim('".$tbdet->fields["codart"]."   ') ";
			  //print $sql; exit;
			  $tbdes=$this->bd->select($sql);
 			  $this->SetX(58);
 			  $this->MultiCell(75,4,$tbdes->fields["desart"]); // desacripcion
			  $MiY=$this->GetY();
			 //Acumulamos Totales
			  //$subtotal=$subtotal+($tbdet->fields["preart"]*$tbdet->fields["canord"]); //total
			  $subtotal=$subtotal+($tbdet->fields["total"]); //total
			  $descuento=$descuento+$tbdet->fields["dtoart"]; // descuento
			  $iva=$iva+round($tbdet->fields["rgoart"],2); //iva
    		  $tbdet->MoveNext();
               }
         // imputacion

                //$otraY=201;
                  $otraY=233;

                $this->sety($otraY);

                while (!$tbimp->EOF && $otraY<250)
                {$this->SetFont("Arial","",8);

               	    $this->SetX(10);
               	    $this->Cell(20,2,$tbano->fields["ano"],0,0,"C");
               	    $this->Cell(20,2,"0503",0,0,"C");
               	    $this->Cell(20,2,$tbimp->fields["ac"],0,0,"C");
	     		    $this->Cell(20,2,$tbimp->fields["pg"],0,0,"C");
	     		    $this->Cell(20,2,$tbimp->fields["par"],0,0,"C");
	     		    $this->Cell(20,2,$tbimp->fields["ge"],0,0,"C");
	     		    $this->Cell(20,2,$tbimp->fields["es"],0,0,"C");
	     		    $this->Cell(20,2,$tbimp->fields["se"],0,0,"C");
	                $w=$this->getx();
         			$this->SetX($w);
         			//$this->setFont("Arial","B",10);
	     		    $this->Cell(40,4,number_format($tbimp->fields["monto"],2,".",","),0,0,"R");
	     		    $acum=$tbimp->fields["monto"]+$acum;
	     		    $this->ln();
	     		    $otraY=$this->GetY();
	     		    $tbimp->MoveNext(); }

		//	  VALIDACION DE LA PAGINA para los articulos
			  if ((($MiY>170) && (!$tbdet->EOF)) or ((!$tbimp->EOF) && ($otraY>250)))
			  {
			   	$continua=true;
			   	$ref="";
				$this->setFont("Arial","B",10);

				//$this->SetXY(175,168);
              	//$this->Cell(28,5,$subtotal,0,0,"R");
              	$this->SetXY(170,178);
              	$this->Cell(35,5,"VAN..".number_format($subtotal,2,",","."),l,0,0,"R");

              	$this->Setxy(170,252);
				$this->cell(35,5,"VAN..".number_format($acum,2,",","."),0,0,"R");


     			}

     		}  // fin del continua

 			 $tb->MoveNext();

			  if (($tb->EOF) || (($ref!="") && ($ref!=$tb->fields["ordcom"])))
			  {//TOTALES

			  	$this->setFont("Arial","B",10);
			     $total=$subtotal-$descuento+$iva;
		 		$this->a =array(0=>$subtotal,1=>$descuento,2=>$iva,3=>$total);
				 $this->SetY(166);
				 for ($i=0; $i<4; $i++){
					$this->Setx(175);
					$this->cell(35,4,number_format($this->a[$i],2,",","."),1,0,"R");
					$this->ln();
					}
					$this->Setxy(170,252);
					$this->cell(35,5,number_format($acum,2,",","."),0,0,"R");



				 $subtotal=0;
				 $descuento=0;
				 $iva=0; }
		} // fin del principal


		}//cuerpo
}//clase


?>
