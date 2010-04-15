<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/nomina/Nprregaseg.class.php");

class pdfreporte extends fpdf
{
	function pdfreporte()
	{
		 $this->fpdf("p","mm","Letter");
		 $this->codemp=H::GetPost("codemp");
		 $this->numseg=H::GetPost("numseg");
		 $this->numemp='D24530261';
		 $this->fecha=H::GetPost("fecha");
	     $this->causa=H::GetPost("causa");//
	     $this->suc=H::GetPost("suc");//suc

		 $this->objeto = new Nprregaseg();

		 $this->arrp = $this->objeto->sqlp($this->codemp);
	}

	function Header()
	{
	  $this->formato();
	  /*$this->setautopagebreak(false);
	  $this->ln();
	  $this->ln();
	  $this->formato();*/
	}

	function Formato()
	{
		$this->setFont("arial",B,6);
		$this->Image("../../img/1826_ivss.jpg",20,$this->GetY(),12);
		$Y=$this->GetY();
		$this->setXY(160,$this->GetY());
		$this->cell(40,2,"Forma 14 - 02");
		$this->getY($Y);
		$this->setx(20);
		$this->multicell(100,2.5,"MINISTERIO DEL TRABAJO\nINSTITUTO VENEZOLANO DE LOS SEGUROS SOCIALES\nDIRECCION GENERAL DE AFILIACION \nY PRESTACIONES EN DINERO",0,'C');
		$this->setFont("arial",B,11);
		$this->setX(20);
		$this->cell(0,9,H::GetPost("titulo"),0,0,'C');
		$this->ln(5);
		$this->setFont("arial","",7);
		$this->cell(0,5,"(INSERTE UNA EQUIS (X) EN EL RECUADRO DE CORRESPONDA)",0,0,'C');
		$this->ln();
        $this->setX(20);
		$this->SetWidths(array(47.5,47.5,47.5,40.5));
	    $this->SetAligns(array("C","C","C","C"));
	    $this->SetBorder(1);
	    $this->setFont("arial","B",7);
	    $this->Row(array("INSCRIPCION DE TRABAJADOR\nEN EL IVSS","MODIFICACION DE DATOS","CAMBIO DE NUMERO\nDE CEDULA DE IDENTIDAD","RELACION DE\nFAMILIARES"));
	    $this->SetBorder(0);
	    $this->setJump(3);
	    $this->setFont("arial","",7);
	    $this->setX(20);
	    $y=$this->gety();
	    $this->Row(array("LLENE LAS CASILLAS\n1 AL 14","LLENE ENTRE LAS CASILLAS\n1 AL 14, LOS DATOS QUE\nDESEA MODIFICAR","EXTRANJERO A VENEZOLANO\nLLENA LAS CASILLAS 1,2,3 Y\nEL Nº DE ASEGURADO\nANTERIOR","LLENA LAS CASILLAS\n3,4,6,15,16,17,18 Y 19\nSOLO FIRMA EL ASEGURADO"));
        $this->SetBorder(1);
        $this->setXY(20,$y);
        $this->setJump(18);
	    $this->Row(array("","","",""));
	    //INSCRIPCION
	    if ($this->causa=='1'){
	    	  $this->rect(55.5,$y+6,6,6);
	    	  $this->rect(61.5,$y+6,6,6,'DF');
	    }else{
	    	 $this->rect(55.5,$y+6,6,6);
	    	 $this->rect(61.5,$y+6,6,6);
	    }

	    //
	    $this->rect(20,$y+12,12,6);
	    $this->rect(32,$y+12,23.5,6);
	    $this->rect(55.5,$y+12,12,6);
	    //MODIFICACION
	     if ($this->causa=='2'){
	    	   $this->rect(103,$y+12,6,6);
	           $this->rect(109,$y+12,6,6,'DF');
	    }else{
	    	 $this->rect(103,$y+12,6,6);
	         $this->rect(109,$y+12,6,6);
	    }

	    //CAMBIO
	     if ($this->causa=='3'){
	    	 $this->rect(150.5,$y+12,6,6);
	         $this->rect(156.5,$y+12,6,6,'DF');
	    }else{
	    	  $this->rect(150.5,$y+12,6,6);
	          $this->rect(156.5,$y+12,6,6);
	    }

	    //RELACION
	     if ($this->causa=='4'){
	    	   $this->rect(191,$y+12,6,6);
	           $this->rect(197,$y+12,6,6,'DF');
	    }else{
	    	 $this->rect(191,$y+12,6,6);
	         $this->rect(197,$y+12,6,6);
	    }


        $xx=$this->getx();
        $yy=$this->gety();

	    $this->setFont("arial","B",9);
	    $this->setxy(55.5,$y+6);
	    $this->cell(6,6,'A',0,0,'C');
	    $this->setxy(103,$y+12);
	    $this->cell(6,6,'B',0,0,'C');
	    $this->setxy(150.5,$y+12);
	    $this->cell(6,6,'C',0,0,'C');
	    $this->setxy(191,$y+12);
	    $this->cell(6,6,'D',0,0,'C');
	    $this->setFont("arial","B",5);
	    $this->setxy(20,$y+12);
        $this->SetWidths(array(12,23.5,12));
	    $this->SetAligns(array("C","C","C"));
	    $this->SetBorder(0);
	    $this->setJump(2);
	    $this->Row(array("NO","TRABAJA PARA\nVARIOS\nPATRONOS","SI"));


	    $this->setFont("arial","B",6.5);

		$this->setxy($xx,$yy);
		$this->ln();
		$this->setX(20);
		$this->cell(147,6,'1.                             RAZON SOCIAL DE LA EMPRESA O NOMBRE DEL PRATRONO',1,0,'L');
		//$this->cell(3);
		$this->multicell(36,6,'2. NUMERO DE LA EMPRESA',1,'L');
		$emp = $this->objeto->sqlempresa();
		$this->setFont("arial","",9);
		$this->setX(20);
		$this->cell(147,5,substr($emp[0]["nomemp"],0,150),1,0,'C');
	//	$this->cell(3);
		$this->cell(4,5,substr($this->numemp,0,1),1,0,'C');
		$this->cell(4,5,substr($this->numemp,1,1),1,0,'C');
		$this->cell(4,5,substr($this->numemp,2,1),1,0,'C');
		$this->cell(4,5,substr($this->numemp,3,1),1,0,'C');
		$this->cell(4,5,substr($this->numemp,4,1),1,0,'C');
		$this->cell(4,5,substr($this->numemp,5,1),1,0,'C');
		$this->cell(4,5,substr($this->numemp,6,1),1,0,'C');
		$this->cell(4,5,substr($this->numemp,7,1),1,0,'C');
		$this->cell(4,5,substr($this->numemp,8,1),1,0,'C');
		//3 al 5

        $this->setXY(20,$this->gety()+10);
		$this->SetWidths(array(7,7,47,43,43,36));
	    $this->SetAligns(array("C","C","C","C","C","C"));
	    $this->SetBorder(0);
	    $this->setFont("arial","B",7);
	    $this->rect(20,$this->gety(),61,4);
	    $this->rect(81,$this->gety(),43,12);
	    $this->rect(124,$this->gety(),79,4);
	    $this->line(20,$this->gety()+12,203,$this->gety()+12);
	     $this->line(20,$this->gety()+4,20,$this->gety()+12);
	      $this->line(203,$this->gety()+4,203,$this->gety()+12);
	        $this->line(27,$this->gety(),27,$this->gety()+12);
	         $this->line(34,$this->gety(),34,$this->gety()+12);
	          $this->line(167,$this->gety(),167,$this->gety()+12);
	    $this->setJump(3);
	    $this->Row(array("V","E","3.  CEDULA DE IDENTIDAD Nº","","4. NUMERO DE ASEGURADO"," 5.  SUC. DPTO. DPCIA."));
	    $this->SetBorder(0);
	    $this->setJump(7);
	    $this->setFont("arial","",7);
	    $this->setX(20);
	    $y1=$this->gety();
	    if ($this->numseg=='')
		{
			$this->numseg=$this->codemp;
		}
		if ($this->arrp[0]["nacemp"]=='V'){
			 $this->Row(array("X","",$this->arrp[0]["cedemp"]," ",$this->numseg,$this->suc));
		}else
	        $this->Row(array("","X",$this->arrp[0]["cedemp"]," ",$this->numseg,$this->suc));

        $this->setxy(85,$y1-2);
	    $this->setFont("arial","B",6);
	    $this->multicell(35,2,"EL NUMERO DE ASEGURADO SE CONFROMA CON \"1\" SI ES VENEZOLANO, \"2\" SI ES EXTRANJERO Y EL NUKERO DE CEDULA DE IDENTIDAD",0,'C');


       /// casillas 6 - 8
        $this->setXY(20,$this->gety()+5);
		$this->SetWidths(array(98,45,40));
	    $this->SetAligns(array("L","L","C"));
	    $this->SetBorder(1);
	    $this->setFont("arial","B",7);
	    $this->Row(array("6.                      APELLIDOS Y NOMBRES DEL TRABAJADOR","7.    FECHA DE NACIMIENTO","8.     CONDICION\nTRABAJADOR"));
        $this->setXY(20,$this->gety());
		$this->SetWidths(array(98,15,15,15,40));
	    $this->SetAligns(array("L","C","C","C","C"));
	    $this->SetBorder(1);
	    $this->setFont("arial","",7);
	    $this->setJump(8);
	    $this->Row(array($this->arrp[0]["nomemp"],$this->arrp[0]["dia"],$this->arrp[0]["mes"],$this->arrp[0]["ano"],""));
	    $this->setxy(123,$this->gety()-8);
	    $this->setFont("arial","B",6);
	    $this->multicell(45,3,"DIA                  MES                    AÑO");

	    $this->setxy(168,$this->gety()-2);
	    $this->setFont("arial","B",6);
	    $this->multicell(45,3,"PENSIONADO");
	    if ($this->arrp[0]["codnom"]=='003'){
	    	 $this->rect(185,$this->gety()-3,5,2,'DF');
	    }else   $this->rect(185,$this->gety()-3,5,2);
	    $this->setxy(168,$this->gety()+1);
	    $this->setFont("arial","B",6);
	    $this->multicell(45,3,"JUBILADO");
	     if ($this->arrp[0]["codnom"]=='004'){
	     	  $this->rect(185,$this->gety()-3,5,2,'DF');
	     }else  $this->rect(185,$this->gety()-3,5,2);


		//casillas de la 9 a a 13
        $this->setXY(20,$this->gety()+5);
		$this->SetWidths(array(12.25,24.5,41.25,20,65,20));
	    $this->SetAligns(array("L","L","L","C","L","C"));
	    $this->SetBorder(1);
	    $this->setFont("arial","B",7);
	    $this->Row(array("9. SEXO","10. ZURDO","11. INGRESO A EMPRESA","12. SALARIO SEMANAL","13. OCUPACION U OFICIO"," COD. OCUPACION"));
        $this->setXY(20,$this->gety());
		$this->SetWidths(array(6.125,6.125,8,8.5,8,13.75,13.75,13.75,20,65,20));
	    $this->SetAligns(array("C","C","C","C","C","C","C","C","C","L","C"));
	    $this->SetBorder(1);
	    $this->setFont("arial","",7);
	    $this->setJump(8);
	    $this->sueldo = $this->objeto->sueldomanual($this->arrp[0]["codemp"],$this->arrp[0]["codnom"]);
	    if($this->arrp[0]["sexemp"]=='F' and $this->arrp[0]["derzur"]='D'){
			$this->Row(array("","X","","X","",$this->arrp[0]["dian"],$this->arrp[0]["mesn"],$this->arrp[0]["anon"],$this->sueldo[0]["monto"],$this->arrp[0]["nomcar"],""));
	    }else if($this->arrp[0]["sexemp"]=='F' and $this->arrp[0]["derzur"]<>'D'){
	    	$this->Row(array("","X","X","","",$this->arrp[0]["dian"],$this->arrp[0]["mesn"],$this->arrp[0]["anon"],$this->sueldo[0]["monto"],$this->arrp[0]["nomcar"],""));
	    }
	        if($this->arrp[0]["sexemp"]=='M' and $this->arrp[0]["derzur"]='D'){
			$this->Row(array("X","","","X","",$this->arrp[0]["dian"],$this->arrp[0]["mesn"],$this->arrp[0]["anon"],$this->sueldo[0]["monto"],$this->arrp[0]["nomcar"],""));
	    }else if($this->arrp[0]["sexemp"]=='M' and $this->arrp[0]["derzur"]<>'D'){
	    	$this->Row(array("X","","X","","",$this->arrp[0]["dian"],$this->arrp[0]["mesn"],$this->arrp[0]["anon"],$this->sueldo[0]["monto"],$this->arrp[0]["nomcar"],""));
	    }
	     $this->setxy(20,$this->gety()-7.5);
	    $this->SetWidths(array(6.125,6.125,8,8.5,8,13.75,13.75,13.75));
	    $this->SetAligns(array("C","C","C","C","C","C","C","C"));
	    $this->SetBorder(0);
	     $this->setJump(2);
	    $this->setFont("arial","B",6);
	    $this->Row(array("M","F","SI","NO","COD","DIA","MES","AÑO"));

	    //casilla 14

        $this->setXY(20,$this->gety()+10);
		$this->SetWidths(array(143,25,15));
	    $this->SetAligns(array("L","C","L"));
	    $this->SetBorder(1);
	    $this->setFont("arial","B",7);
	    $this->Row(array("14.                      DOMICILIO Y DIRECCION EXACTA DEL TRABAJADOR","COD. CENTRO ASISTENCIAL","CN.CT."));
        $this->setXY(20,$this->gety());
		$this->SetWidths(array(143,25,15));
	    $this->SetAligns(array("L","C","C"));
	    $this->SetBorder(1);
	    $this->setFont("arial","",7);
	    $this->setJump(4);
	    $this->Row(array($this->arrp[0]["dirhab"],"","3"));


	    //casilla 14 - 19
	    $this->setx(20);
	    $this->setFont("arial","B",7);
	    $this->multicell(183,5,"DECLARACION DE FAMILIARES",1,'C');

	    //casilla 15  -  19

        $this->setXY(20,$this->gety());
		$this->SetWidths(array(24,37,13,76,33));
	    $this->SetAligns(array("C","C","C","C","C"));
	    $this->SetBorder(1);
	    $this->setFont("arial","B",7);
	    $this->Row(array("15. PARENTESCO","16. CEDULA DE\nIDENTIDAD Nº","17. SEXO","18. APELLIDOS Y NOMBRES DEL FAMILIAR","19. FECHA DE NACIMIENTO"));
	    $this->familiar = $this->objeto->familiar($this->arrp[0]["codemp"],$this->arrp[0]["codnom"]);
        $this->setXY(20,$this->gety());
		$this->SetWidths(array(24,37,6.5,6.5,76,11,11,11));
	    $this->SetAligns(array("C","C","C","C","L","C","C","C"));
	    $this->SetBorder(0);
	    $this->setFont("arial","",7);
	    $this->setJump(4);
	    $aa=$this->gety();
	    $this->setXY(20,$this->gety()+1);
	    if ($this->causa=='4'){


	    foreach ($this->familiar as $familiar){
	    		$this->setx(20);
            if ( $familiar["sexfam"]=='F'){
 			$this->Row(array($familiar["despar"],$familiar["cedfam"],"","X",$familiar["nomfam"],$familiar["dia"],$familiar["mes"],$familiar["ano"]));
	        }else   if ( $familiar["sexfam"]=='M'){
	        $this->Row(array($familiar["despar"],$familiar["cedfam"],"X","",$familiar["nomfam"],$familiar["dia"],$familiar["mes"],$familiar["ano"]));
            }
	      }
          }
            $this->setFont("arial","B",5);
            $this->setxy(83,$aa);
            $this->multicell(33,2,"M          F",0,'L');

            $this->setFont("arial","B",5);
            $this->setxy(174,$aa);
            $this->multicell(33,2,"D                    M                 A",0,'L');

		$this->setxy(20,$aa);
		$this->SetBorder(1);
		$this->Row(array("","","","","","","","",));
		$i=1;
		$this->setJump(4);
			while($i<=10)
			{
				$this->setx(20);
				$this->Row(array("","","","","","","","",));
				$i++;
			}

			//firmas
			$m=15;//parametro para subir todo lo que apartir de la firma

			$this->line(20,230-$m,105,230-$m);
			$this->line(118,230-$m,203,230-$m);
			$this->setxy(20,230-$m);
			$this->multicell(90,5,"SELLO DE LA EMPRESA Y FIRMA DEL PATRONO",0,'C');
			$this->setxy(118,230-$m);
			$this->multicell(90,5,"FIRMA DEL TRABAJADOR",0,'C');

			//casilla 20 - 21
			$this->setFont("arial","B",7);
			$this->setxy(20,238-$m);
            $this->multicell(106.5,5,"20.                        RECIBIDO EN EL IVSS",1,'L');
            //DETALLE
            $this->setxy(20,243-$m);
            $this->multicell(80,15,"",1,'L');
            $this->setxy(100,243-$m);
            $this->multicell(26.5,5,"FECHA",1,'C');
            $this->setxy(100,248-$m);
            $this->multicell(8.8,10,"",1,'C');
            $this->setxy(108.8,248-$m);
            $this->multicell(8.9,10,"",1,'C');
            $this->setxy(117.9,248-$m);
            $this->multicell(8.6,10,"",1,'C');

            $this->setxy(136.5,238-$m);
            $this->multicell(66.5,5,"21.                        ACTA DE FISCALIZACION",1,'L');
            //DETALLE
            $this->setxy(136.5,243-$m);
            $this->multicell(13,5,"SIGLA",1,'C');
            $this->setxy(149.5,243-$m);
            $this->multicell(13,5,"AÑO",1,'C');
            $this->setxy(162.5,243-$m);
            $this->multicell(14,5,"NUMERO",1,'C');
            $this->setxy(136.5,248-$m);
            $this->multicell(13,10,"",1,'C');
            $this->setxy(149.5,248-$m);
            $this->multicell(13,10,"",1,'C');
            $this->setxy(162.5,248-$m);
            $this->multicell(14,10,"",1,'C');

            $this->setxy(176.5,243-$m);
            $this->multicell(26.5,5,"FECHA",1,'C');
            $this->setxy(176.5,248-$m);
            $this->multicell(8.8,10,"",1,'C');
            $this->setxy(185.3,248-$m);
            $this->multicell(8.9,10,"",1,'C');
            $this->setxy(194.2,248-$m);
            $this->multicell(8.8,10,"",1,'C');

            $this->setxy(20,258-$m);
            $this->multicell(0,5,"Este Formulario está autorizado por el IVSS y válido únicamente para ser consignado en las oficinas administrativas",0,'C');
            $this->setxy(20,263-$m);
            $this->setFont("arial","B",9);
            $this->multicell(0,5,"EL FORMULARIO Y SU TRAMITACION SON COMPLETAMENTE GRATUITOS\nwww.ivss.gov.ve",0,'C');

            $this->setFont("arial","B",6);
            $this->setxy(100,248-$m);
            $this->multicell(26.5,3,"D           M          A",1,'C');

            $this->setFont("arial","B",6);
            $this->setxy(176.5,248-$m);
            $this->multicell(26.5,3,"D           M          A",1,'C');

            $this->setFont("arial","B",6);
            $this->setxy(20,255-$m);
            $this->multicell(80,3,"FIRMA Y SELLO",0,'C');




	}

	function Cuerpo()
	{

    }
}
?>