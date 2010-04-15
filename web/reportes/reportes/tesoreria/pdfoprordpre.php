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
     // $empresa = H::getEmpresa();


      //$this->tipcom=str_replace('*',' ',H::GetPost("tipcom"));
      $this->ordpagdes=str_replace('*',' ',H::GetPost("ordpagdes"));
      $this->ordpaghas=str_replace('*',' ',H::GetPost("ordpaghas"));
      $this->codprodes=str_replace('*',' ',H::GetPost("codprodes"));
      $this->codprohas=str_replace('*',' ',H::GetPost("codprohas"));
      $this->tiporddes=str_replace('*',' ',H::GetPost("tiporddes"));
      $this->tipordhas=str_replace('*',' ',H::GetPost("tipordhas"));
      $this->fecorddes=str_replace('*',' ',H::GetPost("fecorddes"));
      $this->fecordhas=str_replace('*',' ',H::GetPost("fecordhas"));
      $this->elaborado=str_replace('*',' ',H::GetPost("elaborado"));
      $this->conformado=str_replace('*',' ',H::GetPost("conformado"));
      $this->aprobado=str_replace('*',' ',H::GetPost("aprobado"));
      $this->presidencia=str_replace('*',' ',H::GetPost("presidencia"));
	  $this->responsable=str_replace('*',' ',H::GetPost("responsable"));
     // $this->decreto=str_replace('*',' ',H::GetPost("decreto"));




      if ( $this->status=="") {$this->condicion=" (A.STATUS='A' OR A.STATUS='I' OR A.STATUS='N')";}
      elseif ($this->status=="Todas" ){$this->condicion=" (A.STATUS='A' OR A.STATUS='I' OR A.STATUS='N')";}
      elseif ($this->status=="Pagadas"){$this->condicion=" (A.STATUS='I' OR A.STATUS='I' OR A.STATUS='I')";}
      elseif ($this->status=="No Pagadas"){$this->condicion=" (A.STATUS='N' OR A.STATUS='N' OR A.STATUS='N')";}
      else { $this->condicion=" (A.STATUS='A' OR A.STATUS='A' OR A.STATUS='A')";}
  if ($this->tiporddes!="" and $this->tipordhas!="")
  {
    $tipcom="A.TIPCAU>='".$this->tiporddes."' AND A.TIPCAU<='".$this->tipordhas."' AND";
  }
  else
  {
    $tipcom=" ";

  }

  if ($this->fecorddes!="" and $this->fecordhas!=""){
    $fechas = " A.FECEMI >= TO_DATE('".$this->fecorddes."','DD/MM/YYYY') AND
              A.FECEMI <= TO_DATE('".$this->fecordhas."','DD/MM/YYYY') AND ";
  }else{
    $fechas = "";
  }


			if($_GET["ordpagdes"]!="")
			{
				$this->ordpagdes=str_replace('*',' ',$_GET["ordpagdes"]);
				$this->ordpaghas=str_replace('*',' ',$_GET["ordpaghas"]);
			 $this->sql="SELECT
            A.NUMORD AS ORDEN,
            A.NUMORD AS NUMORD,
            A.CEDRIF AS CEDRIF,
            E.NITBEN,
            A.NOMBEN,
            A.DESORD,
            TO_CHAR(A.FECEMI,'DD/MM/YYYY') AS FECEMI,
            TO_CHAR(A.FECEMI,'YYYY') AS ANOEMI,
            A.NUMCOM,
            (A.MONORD-A.MONRET-A.MONDES) AS NETO,
            (CASE WHEN A.STATUS='I' THEN 'Pagadas' WHEN A.STATUS='N' THEN 'En Finanazas' WHEN A.STATUS='A' THEN 'Anuladas' END) AS STAORD,
            B.NOMEXT,C.codpro, C.nrocei,C.telpro, C.dirpro, A.obsord, A.TIPCAU, b.afeprc, b.afecom, b.afecau, b.afedis
            FROM OPORDPAG A,CPDOCCAU B,OPBENEFI E left outer join  CAPROVEE C on e.cedrif=c.codpro
            WHERE  A.NUMORD >= '".$this->ordpagdes."' AND
            A.NUMORD <= '".$this->ordpaghas."' and
            A.TIPCAU=B.TIPCAU AND
            trim(A.CEDRIF)=trim(E.CEDRIF)
            ORDER BY A.NUMORD";
			}
			else
			{
      $this->sql="SELECT
            A.NUMORD AS ORDEN,
            A.NUMORD AS NUMORD,
            A.CEDRIF AS CEDRIF,
            E.NITBEN,
            A.NOMBEN,
            A.DESORD,
            TO_CHAR(A.FECEMI,'DD/MM/YYYY') AS FECEMI,
            TO_CHAR(A.FECEMI,'YYYY') AS ANOEMI,
            A.NUMCOM,
            (A.MONORD-A.MONRET-A.MONDES) AS NETO,
            (CASE WHEN A.STATUS='I' THEN 'Pagadas' WHEN A.STATUS='N' THEN 'En Finanazas' WHEN A.STATUS='A' THEN 'Anuladas' END) AS STAORD,
            B.NOMEXT,C.codpro, C.nrocei,C.telpro, C.dirpro, A.obsord, A.TIPCAU, b.afeprc, b.afecom, b.afecau, b.afedis
            FROM OPORDPAG A,CPDOCCAU B,OPBENEFI E left outer join  CAPROVEE C on e.cedrif=c.codpro
            WHERE  A.NUMORD >= '".$this->ordpagdes."' AND
            A.NUMORD <= '".$this->ordpaghas."' AND ".$fechas."
            ".$this->condicion." AND
            ".$tipcom."
            A.TIPCAU=B.TIPCAU AND
            trim(A.CEDRIF)=trim(E.CEDRIF) AND
            E.CEDRIF >= RTRIM('".$this->codprodes."') AND
            E.CEDRIF <= RTRIM('".$this->codprohas."')
            ORDER BY A.NUMORD";
			}
          //  print '<pre>'; print $this->sql;exit;

      $this->arrp = $this->sql;


      $this->cab=new cabecera();


    }


    function Header()
    {

			$this->SetFont("Arial","",8);
			$this->Image("../../img/logo_1.jpg",8, 4, 33);
			$this->SetXY(39,8);
			$this->Cell(10,3,'REPUBLICA BOLIVARIANA DE VENEZUELA');
			$this->ln();
			$this->SetX(39);
			$this->Cell(10,3,$this->Empresa('nombre'));
			$this->ln();
			$this->SetX(39);
			$this->Cell(10,3,'DIRECCIÓN DE ADMINISTRACIÓN Y FINANZAS');
			$this->ln();
			$this->SetX(39);
			$this->Cell(10,3,'');
			$this->SetFont("Arial","",7);
			$this->SetXY(50,22);
		//	$this->MultiCell(100,3,$this->Empresa('direccion'),0,'C',0);
			//$this->Line(10,38,205,38);//LINEA HORIZONTAL
			$this->SetFont("Arial","B",12);
			$this->SetXY(55,22);
			$this->Cell(100,5,"ORDEN DE PAGO",0,0,'C');
			 $this->ln(5);
        $this->SetFont("Arial", "B", 9);
        $this->SetFont("Arial","B",8);
        $this->SetXY(175,9);

        $this->formato();
    }

function formato()
    {
      //Marco de la Página
    $this->Rect(10, 29, 195, 226);
    $r=11;
    $this->r=11;
    //TIPO DE ORDEN
      $this->SetXY(10,35);
  //  $this->Cell(20,4,"TIPO ORDEN",0,0,'');
    $this->SetXY(10,39);
    $this->Cell(65,4," ",0,0,'');
      $this->SetXY(110,35);
      // $this->Cell(10,5,'COMPROMISOS:');
      $this->SetXY(165,35);
      $this->Cell(5,5,' ');
    //lineas de la cabecera
    //$this->line(10, 40, 205, 40);
    $this->line(10, 45-$r, 205, 45-$r);
    $this->line(10, 50-$r, 205, 50-$r);
    $this->line(10, 54, 205, 54);//linea debajo de concepto
    $this->line(10, 60, 205, 60);//linea debajo de monto en letra
    $this->line(10, 65, 205, 65);
    $this->line(10, 70, 205, 70);
    $this->line(10, 75, 205, 75);
    $this->line(10, 80, 205, 80);
    $this->line(10, 85, 205, 85);

    //Nombre BENEFICIARIO
    $this->SetXY(10, 40-$r);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'BENEFICIARIO:',0,0,'L');
  //Nombre RIF
    $this->SetXY(10, 45-$r);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'RIF:',0,0,'L');
  //Nombre RNC
    $this->SetXY(58, 45-$r);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'RNC:',0,0,'L');
  //Nombre TELEFONI
    $this->SetXY(107, 45-$r);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'TELÉFONO:',0,0,'L');
  //Nombre CODIGO
    $this->SetXY(167, 45-$r);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'CÓDIGO POSTAL: 1040',0,0,'L');


  //Nombre DIRECCION
    $this->SetXY(10, 50-$r);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'DIRECCIÓN:',0,0,'L');
    //NOMBRE DEL NOMBRE

    $this->SetXY(10, 66-$this->r);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'MONTO EN LETRAS:',0,0,'L');

    $this->SetXY(10, 60);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'COMPROMISO:',0,0,'L');

    $this->SetXY(12,65);
    $this->SetFont("Arial", "B", 8);
  //  $this->Cell(10, 5, 'FECHA',0,0,'L');

    $this->SetXY(12, 65);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'TIPO DE ORDEN DE PAGO',0,0,'L');

    $this->SetXY(100, 65);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'MONTO BRUTO',0,0,'L');

    $this->SetXY(130, 65);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'DEDUCCIÓN',0,0,'L');

    $this->SetXY(154 , 65);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'RETENCIONES',0,0,'L');
    $this->SetXY(178, 65);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'MONTO NETO',0,0,'L');


    //MONTO TOTAL

    $this->SetXY(160, 66-$this->r);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'Bs:',0,0,'C');
    //LINEA

    $this->line(162,54,162,60 );//linea que divide el monto en letras con los bs

    //NOMBRE CONCEPTO

    $this->SetXY(10, 55-$r);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(10, 5, 'CONCEPTO:');

    //DETALLE DEL COMPROMISO


    $this->line(10, 55-$r, 205,55-$r );//linea despues de la direccion


    $this->line(58, 45-$r, 58, 50-$r);
    $this->line(107, 45-$r, 107, 50-$r);
    $this->line(167, 45-$r, 167, 50-$r);

    //$this->line(30, 65, 30, 75);
   // $this->line(64, 65, 64, 75);
    $this->line(99, 65, 99, 75);
    $this->line(125, 65, 125, 75);
    $this->line(151, 65, 151, 75);
    $this->line(178, 65, 178, 75);


	$this->SetXY(10, 75);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(120, 5, 'UNIDAD SOLICITANTE');
	$this->Cell(25, 5, 'RESPONSABLE');
	$this->SetFont("Arial", "", 8);
	$this->Cell(40,4,$this->responsable,0,0,'L');


    //Descripcion
    $this->SetXY(10, 80);
    $this->SetFont("Arial", "B", 8);
    $this->Cell(200, 5, 'IMPUTACIÓN PRESUPUESTARIA',0,0,'C');


    //C�digo Presupuestario
      //$this->Rect(10,88,34,7);
      $this->SetXY(14,85);
      $this->SetFont("Arial","B",7);
      //$this->Cell(34,4,'CÓDIGO PRESUPUESTARIO',0,0,'C');
		$this->sqlniv="SELECT
		    		  CATPAR,
		    		  CONSEC,
		    		  NOMABR,
		    		  NOMEXT,
		    		  LONNIV,
		    		  STANIV
		    		  FROM CPNIVELES ORDER BY CONSEC";
       $this->setx(10);
       $tbniv=$this->bd->select($this->sqlniv);
     //  $ancho=count($tbniv);
	   $this->Cell(8,5,"AÑO",1,0,'C');
	   $this->Cell(8,5,"FON",1,0,'C');
	   $ancho=55/7;
    		     foreach($tbniv as $regniv)
		      {
		        $this->Cell($ancho,5,$regniv["nomabr"],1,0,'C');
		      }


      //Descripci�n
      //$this->Rect(44,88,66,7);
      $this->SetXY(90,85);
      $this->line(81 ,85,81, 130);
      $this->SetFont("Arial","B",8);
      $this->Cell(66,4,'DENOMINACIÓN',0,0,'C');


      //Monto Neto
      //$this->Rect(185,88,25,7);
      $this->SetXY(183,85);
      $this->line(185 ,85,185, 135);
      $this->SetFont("Arial","B",8);
      $this->Cell(25,4,'MONTO',0,0,'C');
	   $this->line(10,90, 205, 90);


    //linea final de detalle
    $this->SetFont("Arial", "B", 8);
    $this->line(10,130, 205, 130);
    $this->line(10,135, 205, 135);
    $this->SetXY(10, 135);
    $this->Cell(180, 5, 'CÓDIGOS CONTABLES',0,0,'C');
    $this->SetXY(15, 140);
    $this->Cell(20, 5, 'CUENTA',0,0,'C');
    $this->SetXY(40, 140);
    $this->Cell(20, 5, 'DESCRIPCIÓN',0,0,'C');
    $this->SetXY(130, 140);
    $this->Cell(20, 5, 'DEBE',0,0,'C');
    $this->SetXY(168, 140);
    $this->Cell(20, 5, 'HABER',0,0,'C');
    $this->SetXY(164, 130);
    $this->Cell(20, 5, 'TOTAL IMPUTACIÓN PRESUPUESTARIA',0,0,'R');
    $this->SetFont("Arial", "B", 6);


          $this->line(65,190, 65, 195);
          $this->SetXY(100,190);
          $this->SetFont("Arial","B",8);
          $this->Cell(20,5,'TOTAL COMPROBANTE CONTABLE',0,0,'R');

       //CODIGOS CONTABLES
       $this->line(10,140, 205, 140);
       $this->line(10,145, 205, 145);

       $this->line(10,135, 205, 135);
       //$this->line(10,135, 205, 135);

       $this->line(40,140, 40, 190);
       $this->line(130,140, 130, 195);
       $this->line(165,195, 165, 225);//retetencio
       $this->line(167.5,140, 167.5, 195);
       $this->line(175,195, 175, 225);//retetencio


    // Cabecera Retenciones
    $this->line(10,190, 205, 190);
    $this->line(10,195, 205, 195);
    $this->line(10,200, 205, 200);

       //RETENCIÓN
    //$this->SetXY(145, 200);
    //$this->Cell(20, 5, 'TOTAL',0,0,'R');
    $this->SetXY(10, 195);
    $this->Cell(170, 5, 'DESCRIPCIÓN RETENCIONES DE LEY',0,0,'L');
    $this->SetXY(165, 195);
    $this->Cell(100, 5, 'COD',0,0,'L');
    $this->SetXY(185, 195);
    $this->Cell(170, 5, 'MONTO',0,0,'L');



    $this->SetXY( 130, 225);
    $this->Cell(30, 5, 'TOTAL RETENCIONES',0,0,'R');
        $this->line(10,225, 205, 225);
          $this->SetXY( 130, 230);
          $this->SetFont("Arial","B",9);
    $this->Cell(30, 5, 'TOTAL NETO A PAGAR',0,0,'R');

   //     $this->line(110,210,110, 225);

    //FIRMAS
    $this->line(10,230, 205, 230);
    $this->line(10,234, 205, 234);
    $this->line(10,241, 205, 241);
    $this->SetFont("Arial","B",6);
    $this->SetXY(10,238);
    $this->Cell(75,4,'PARA USO DE LA OFICINA DE PLANIFICACIÓN Y PRESUPUESTO',0,0,'C');
    $this->Cell(65,4,'PARA USO DE LA DIRECCION DE ADMINISTRACION Y FINANZAS',0,0,'C');
    $this->Cell(60,4,'',0,0,'C');

    $this->line(10,238, 205, 238);//DEBAJO DE OBSERVACIONES
	$this->line(46,241,46,255);//la primera
	 $this->SetLineWidth(0.4);
	$this->line(82,238,82,255);
	$this->SetLineWidth(0.2);
	$this->line(118,241,118,255);
	 $this->SetLineWidth(0.4);
	$this->line(154,238,154,255);//la ultima
	 $this->SetLineWidth(0.2);
                //FIRMAS
				$this->SetXY(10,241);
				$this->setFont("Arial","B",5);
            	              $this->Cell(36,4,'ANALISTA ',0,0,'C');
				$this->Cell(36,4,'DIRECTOR ',0,0,'C');
				$this->Cell(36,4,'ANALISTA ',0,0,'C');
				$this->Cell(36,4,'DIRECTOR ',0,0,'C');
				$this->Cell(53,4,'CONTRALOR MUNICIPAL ',0,0,'C');


				$this->setFont("Arial","",6);
				$this->ln();
				$this->Cell(36,4,$this->responsable,0,0,'C');
				$this->Cell(36,4,$this->elaborado,0,0,'C');
				$this->Cell(36,4,$this->conformado,0,0,'C');
				$this->Cell(36,4,'ESTHER NORELIA PEREZ',0,0,'C');
				$this->Cell(52,4,'RAFAEL SAEZ',0,0,'C');
				$this->SetXY(10,255);
				$this->setFont("Arial","B",6);
            	$this->Cell(36,4,'FORMA 035 ',0,0,'L');
              $this->Cell(160,4,'EA / RR / LVF / LVR / FT/ LR ',0,0,'R');
			;

                  }

    function Cuerpo()
    {
      $tbgen=$this->bd->select($this->sql);
      $primeravez=true;
      $total=0;
      $tota=0;
      $monret=0;
      $mondes=0;
      $monnet=0;
      $deb=0;
      $cre=0;
      $impxpag=8;
      $retxpag=8;
      $codconxpag=10;
     //  $this->impt=0;
      while (!$tbgen->EOF)
      {
        $adicionapagina=true;
         if ($tbgen->fields["afeprc"]=='N' and  $tbgen->fields["afecom"]=='N' and  $tbgen->fields["afecau"]=='N' and  $tbgen->fields["afedis"]=='N' ){
       	   $sqltb="select '' as CODPRE, '' AS NOMPRE, C.monord as MONCAU, C.MONDES, C.MONRET
	  		 FROM opordpag C
			 WHERE C.NUMORD='".$tbgen->fields["numord"]."'  ;";
       }else{
        $sqltb="select
            C.CODPRE,
            SUBSTR(LTRIM(RTRIM(D.NOMPRE)),1,120) AS NOMPRE,
            C.MONCAU,
            C.MONDES,
            C.MONRET
            FROM OPDETORD C,CPDEFTIT D
            WHERE C.NUMORD='".$tbgen->fields["numord"]."' AND
            C.CODPRE=D.CODPRE
            ORDER BY C.CODPRE;";

       }
       $this->afeprc=$tbgen->fields["afeprc"];
       $this->afecom=$tbgen->fields["afecom"];
       $this->afecau=$tbgen->fields["afecau"];
       $this->afedis=$tbgen->fields["afedis"];
// print $sqltb;exit();

        $tb=$this->bd->select($sqltb);


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
              //print $sqlret;exit();
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


		  $sqlubi="select b.codubi, b.desubi
					from opordpag a, bnubica b
					where
					a.coduni=b.codubi and
					a.numord='".$tbgen->fields["numord"]."'";

		 $tbubi=$this->bd->select($sqlubi);


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
//ENCABEZADO
            $this->SetXY(168,15);
            $this->SetFont("Arial","B",12);
            $this->Cell(20,5,"Nro:       ".$tbgen->fields["numord"]);
            $this->SetXY(168,20);
            $this->Cell(20,5,"Fecha: ".$tbgen->fields["fecemi"]);
            $this->SetFont("Arial","",8);
            $this->SetXY(30,37);
            //$this->MultiCell(180,3,$tbgen->fields["nomext"]);
            //buscamos los  compromisos a que hace referencia la orden

            $sqlcom2="select DISTINCT(b.refere),(CASE WHEN b.refere='NULO' THEN 'NO APLICA'  else b.refere END) AS refere2, to_char(a.feccau,'DD-MM-YYYY') as feccau, c.nomext, c.tipcau  from cpcausad a, CPIMPCAU b, CPDOCCAU c WHERE a.refcau=b.refcau and a.tipcau=c.tipcau and b.REFCAU='".$tbgen->fields["numord"]."'";
         //   print '<pre>'; print $sqlcom2; exit;
            $tbcom2=$this->bd->select($sqlcom2);
            $compromisos2="";
            $fecha="";
            $tipo="";


            while(!$tbcom2->EOF)
            {
              if ($compromisos2=="")
              {
                $compromisos2=$tbcom2->fields["refere2"];
                $fecha=$tbcom2->fields["feccau"];
                $tipo=$tbcom2->fields["tipcau"].' - '.$tbcom2->fields["nomext"];
              }
              else
              {
                $compromisos2=$compromisos2.', '.$tbcom2->fields["refere2"];
                $fecha=$tbcom2->fields["feccau"];
                $tipo=$tbcom2->fields["tipcau"].' - '.$tbcom2->fields["nomext"];
              }
              $tbcom2->MoveNext();
            }
            $this->SetXY(33,60);
            $this->MultiCell(180,5,$compromisos2);
            $this->SetXY(10,70);
           // $this->MultiCell(43,4,$fecha);
            $this->SetXY(10,71);
            $this->SetFont("Arial","",6);
            $this->MultiCell(80,3,$tipo);
            $this->SetFont("Arial","B",9);
            $this->SetXY(168,24);
            $this->Cell(30,5,"Presupuesto Año:".$tbgen->fields["anoemi"]);//año del presupuesto
            $this->fecemi=$tbgen->fields["anoemi"];
            $this->SetFont("Arial","",10);
            $this->SetXY(35,40-$this->r);
            $this->Cell(130,5,$tbgen->fields["nomben"]);
			$this->SetFont("Arial","",8);
            $this->SetXY(20,45-$this->r);
            $this->Cell(30,5,$tbgen->fields["cedrif"]);
            $this->SetXY(65,45-$this->r);
            $this->Cell(30,5,$tbgen->fields["nrocei"]);
            $this->SetXY(127,45-$this->r);
            $this->Cell(30,5,$tbgen->fields["telpro"]);
            $this->SetXY(30,50-$this->r);
            $this->Cell(30,5,$tbgen->fields["dirpro"]);
			$this->SetFont("Arial","",8);
			$this->SetXY(45, 75);
            $this->Cell(60,5,$tbubi->fields["desubi"]);//unidad solicitante
            // MONTO ESCRITO
            $this->SetXY(40,66-$this->r);
            $this->SetFont("Arial","",7);
                if ($tbgen->fields["tipcau"]<>'C/PE' ){
            $this->MultiCell(120,2,montoescrito($tbgen->fields["neto"],$this->bd));
			$this->SetXY(170,66-$this->r);
            $this->SetFont("Arial","B",8);
			$this->Cell(45,5,number_format($tbgen->fields["neto"],2,",","."),0,0,"L");}
			$this->tipcau=$tbgen->fields["tipcau"];
            /////////////////////////////////////////////////
            $this->SetFont("Arial","",5);
            $this->SetXY(10,234);
            $this->multiCell(200,3,"OBSERVACIONES: ".$tbgen->fields["obsord"]);


            $this->SetFont("Arial","B",6);
            $this->SetXY(29,56-$this->r);
            $this->MultiCell(170,3,$tbgen->fields["desord"]);//concepto
            $this->SetXY(10,190);
            $this->SetFont("Arial","B",8);
            $this->Cell(190,4,"Comprobante Contable:  ".$tbgen->fields["numcom"]);
            $this->SetFont("Arial","",7);
            $this->SetXY(10,95);
            $yimp=91;
            $yret=200;
            $ycon=146;
            $cuantasimp=0;
            $cuantasret=0;
            $cuantascon=0;
         //   $imp=0;//ojo lo coloque en comentario porq cuando hay salto de paginas porq el numero de retenciones es mayor a 9
          }//end del if primeravez

          if (($cuantasimp<$impxpag) && (!$tb->EOF))
          {
          		$this->sqlniv="SELECT
		    		  CATPAR,
		    		  CONSEC,
		    		  NOMABR,
		    		  NOMEXT,
		    		  LONNIV,
		    		  STANIV
		    		  FROM CPNIVELES ORDER BY CONSEC";
           $tbniv=$this->bd->select($this->sqlniv);
           $this->SetXY(10,$yimp);
           $this->Cell(8,5,$this->fecemi,0,0,'C');
	       $this->Cell(8,5,"00",0,0,'C');
              //  $this->Cell(34,4, $this->fecemi.'-00-'.$tb->fields["codpre"]);
              // $codigo=$this->fecemi.'-00-'.$tb->fields["codpre"];
              $partecodpre=explode("-",trim($tb->fields["codpre"]));
              $i=0;
              $ancho=55/7;
        foreach($tbniv as $regniv)
        {
          $this->Cell($ancho,5,$partecodpre[$i],0,0,'C');
          $i++;
        }

            $this->SetXY(180,$yimp);
            $this->Cell(25,4,number_format($tb->fields["moncau"],2,",","."),0,0,"R");
            $ver=$tb->fields["moncau"]-$tb->fields["monret"]-$tb->fields["mondes"];
            $ver2+=$ver;
            $this->SetXY(60,$yimp);
            $tota+=$tb->fields["moncau"];
            $monret+=$tb->fields["monret"];
            $mondes+=$tb->fields["mondes"];
            $monnet+=($tb->fields["mdoncau"]-$tb->fields["monret"]-$tb->fields["mondes"]);
            $this->SetXY(82,$yimp+1,9);
            $this->multiCell(105,2,($tb->fields["nompre"]),0,'L');  //
            $this->ln(1);
            $yimp=$this->GetY();
            $cuantasimp=$cuantasimp+1;
            $tb->MoveNext();
          }


          if (($cuantasret<$retxpag) && (!$tbret->EOF))
          {
            $this->SetFont("Arial", "", 6);
            $this->SetXY(10,$yret);
            $this->CellFitScale(135,5,$tbret->fields["destip"]);
            $this->SetXY(165,$yret);
            $this->Cell(10,5,$tbret->fields["codtip"],0,0,"C");
            $this->SetFont("Arial", "", 7);
            $this->SetXY(168,$yret);
            $this->Cell(30,5,number_format($tbret->fields["sumret"],2,",","."),0,0,"R");
            $imp+=$tbret->fields["sumret"];
            $this->impt+=$tbret->fields["sumret"];
            $this->ln(3);
            $yret=$this->GetY();
            $cuantasret=$cuantasret+1;
            $tbret->MoveNext();
          }


          if (($cuantascon<$codconxpag) && (!$tbcon->EOF))
          {
            $this->SetXY(10,$ycon);
            $this->Cell(34,4,$tbcon->fields["codcta"]);
            $this->SetXY(40,$ycon);
            $this->CellFitScale(90,4,$tbcon->fields["descta"]);
            //$this->Cell(90,4,$tbcon->fields["descta"]);
            if($tbcon->fields["debitos"]<>0)
            {
              $this->SetXY(134,$ycon);
              $this->Cell(33,4,number_format($tbcon->fields["debitos"],2,",","."),0,0,"R");
              $deb+=$tbcon->fields["debitos"];
            }
            if($tbcon->fields["creditos"]<>0)
            {
              $this->SetXY(167,$ycon);
              $this->Cell(33,4,number_format($tbcon->fields["creditos"],2,",","."),0,0,"R");
              $cre+=$tbcon->fields["creditos"];
            }
            $this->ln(4);
            $ycon=$this->GetY();
            $cuantascon=$cuantascon+1;
            //print '$cuantascon='.$cuantascon.'<br>';
            $tbcon->MoveNext();
          }

          if (($cuantasimp==$impxpag) || ($cuantasret==$retxpag) || ($cuantascon==$codconxpag))
          {
            if ($cuantasimp==$impxpag)
            {
              if (($tbret->EOF) || (($cuantasret==$retxpag)&&(!$tbret->EOF)))
              {
                $adicionapagina=true;


                if (($tbcon->EOF) || (($cuantascon==$codconxpag)&&(!$tbcon->EOF)))
                {
                    $adicionapagina=true;
                }
                else
                {
                    $adicionapagina=false;
                }
              }
            }
            elseif  ($cuantasret==$retxpag)
            {
              if (($tb->EOF) || (($cuantasimp==$impxpag)&&(!$tb->EOF)))
              {
                $adicionapagina=true;
                if (($tbcon->EOF) || (($cuantascon==$codconxpag)&&(!$tbcon->EOF)))
                {
                    $adicionapagina=true;
                }
                else
                {
                    $adicionapagina=false;
                }
              }
            }
            elseif  ($cuantascon==$codconxpag)
            {
              if (($tb->EOF) || (($cuantasimp==$impxpag)&&(!$tb->EOF)))
              {
                $adicionapagina=true;

                if (($tbret->EOF) || (($cuantasret==$retxpag)&&(!$tbret->EOF)))
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
        $this->SetXY(160,130);
        $this->SetFont("Arial","B",8);
        //total de imputacion presupuestaria
        $this->Cell(45,5,number_format($tota,2,",","."),0,0,"R");
        $this->SetXY(153, 225);
        //monto total de retenciones
        $this->Cell(45,5,number_format($imp,2,",","."),0,0,"R");//monto de la retencion
        $this->Cell(45,5,number_format( $this->impt,2,",","."),0,0,"R");//monto de la retencion

        //monto de la parte superior
        $this->SetXY(73,70);
        $this->Cell(45,5,number_format($tota,2,",","."),0,0,"R");
        $this->SetXY(100,70);
        $this->Cell(45,5,number_format($mondes,2,",","."),0,0,"R");
        $this->SetXY(125,70);
        $this->Cell(45,5,number_format($monret,2,",","."),0,0,"R");
		$this->SetFont("Arial","B",10);
        $this->SetXY(157,70);
        $this->Cell(45,5,number_format($tota-$imp-$mondes,2,",","."),0,0,"R");//aqui imprime el monto total

        $this->SetXY(153, 230);
        //monto total neto a pagar
        $this->Cell(45,5,number_format($tota-$imp-$mondes,2,",","."),0,0,"R");

        //monto en letras si es extrapresupuesto
        $this->SetXY(40,66-$this->r);
        $this->SetFont("Arial","",7);

        if ( $this->afeprc=='N' and    $this->afecom=='N' and   $this->afecau=='N' and   $this->afedis=='N' ){
        $this->MultiCell(120,2,montoescrito($tota-$imp-$mondes,$this->bd));
        $this->SetXY(170,66-$this->r);
        $this->SetFont("Arial","B",10);
	    $this->Cell(45,5,number_format($tota-$imp-$mondes,2,",","."),0,0,"L");}

        //TOTAL COMPROBANTE
        $this->SetXY(134,190);
        $this->Cell(33,5,number_format($deb,2,",","."),0,0,"R");
        $this->SetXY(167,190);
        $this->Cell(33,5,number_format($cre,2,",","."),0,0,"R");

        $tota=0;
        $deb=0;
        $cre=0;
        $monret=0;
        $mondes=0;
        $monnet=0;
        $total=0;
        $imp=0;
        $tbgen->MoveNext();
      }//End del While Principal
    }

  }
?>