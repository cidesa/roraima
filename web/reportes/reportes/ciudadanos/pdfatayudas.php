<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atayudas.class.php");
    require_once("../../lib/general/funciones.php");



	class pdfreporte extends fpdf
	{

	var $bd;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new Cabecera();
			$this->coddes=H::GetPost("codmin");
			$this->codhas=H::GetPost("codmax");
			$this->bd=new basedatosAdo();
			$this->atayudas = new Atayudas();
		    $this->arrp = $this->atayudas->sqlp($this->coddes,$this->codhas);
			$this->llenartitulosmaestro();
			$this->llenaranchos();
}

	function llenartitulosmaestro()
		{

			    $this->titulosm[100]="Por medio del presente se hace constar que, la Oficina de Gestión y Acción Social, de la Fundación Oro Negro ente adscrito al Ministerio del Poder Popular Para la Energía y Petróleo, dirigida a atender casos  individuales en el área de  salud; otorga en respuesta a ";
			    $this->titulosm[200]="la solicitud efectuada a esta Fundación de fecha: ";
			    $this->titulosm[300]="una  donación  de: ";
				$this->titulosm[0]="al (a) ciudadano(a): ";
				$this->titulosm[1]="de nacionalidad venezolana, portador de la Cédula de Identidad Nº";
				$this->titulosm[2]="de";
				$this->titulosm[3]="años de edad";
				$this->titulosm[4]="Dicha donación se efectua a travez de cheque Nº:";
				$this->titulosm[5]="de Fecha: ";
				$this->titulosm[6]="por un monto de Bs.: ";
				$this->titulosm[7]="a favor de: ";
				$this->titulosm[8]="Caracas,";
				$this->titulosm[10]="Nro: ";

				$this->titulosm[11]='"Patria, Socialismo o Muerte"';
				$this->titulosm[12]="Av. Libertador con calle El Empalme. Ministerio del Poder Popular para la Energía y el Petróleo.";
				$this->titulosm[13]="Torre Oeste, Piso 2. Fundación Oro Negro. La Campiña, Caracas-Venezuela.";
				$this->titulosm[14]="Tlf: (0212)708 7576  Fax: (0212) 708 7959.";

		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=190;
		$this->anchos[1]=190;
		$this->anchos[2]=120;
		$this->anchos[3]=170;
		$this->anchos[4]=150;
		$this->anchos[5]=120;
		$this->anchos[6]=110;
		$this->anchos[7]=100;
        $this->anchos[8]=50;
        $this->anchos[9]=20;
        $this->anchos[10]=10;

	}

		function Header()
		{
                $this->cab->poner_cabecera($this,$_POST["titulo"],"p");
		       //$this->getCabecera('',"");
		     //  $this->setFont("Arial","B",12);
               /* $this->setFont("Arial","B",10);
				$this->cell(200,5, $this->titulosm[100],0,0,'C');
				$this->Ln();
				$this->cell(200,5, $this->titulosm[200],0,0,'C');
				$this->Ln();
				$this->setFont("Arial","",7);
				$this->cell(200,5, $this->titulosm[300],0,0,'C');
				$this->Ln();
				$this->Ln();
				$this->setFont("Arial","",7);
				$this->SetWidths(array($this->anchos[16],$this->anchos[7],$this->anchos[16]));
    	        $this->SetAligns(array("C","C","C","C","C"));
    	        $this->setBorder(1);
                $this->Row(array($this->titulosm[0],$this->titulosm[1],$this->titulosm[4]));*/

		}

function Cuerpo()

		{

	    $reg=1;
		$nroexp="";
		$registro=count($this->arrp);
		$fecha=date("d/m/Y");

		foreach($this->arrp as $dato)
            {
            	$reg++;

			 if($dato["nroexp"]!=$nroexp)

                $this->SetXY(100,10);
                $this->setFont("Arial","",12);
                $this->cell(150,5,$this->titulosm[10],0,0,'R');
                 $this->cell(20,5,$this->setFont("Arial","B",12).$dato["expediente"],1,0,'C');
                $this->Ln();
                $this->Ln();
                $this->setFont("Arial","",12);
    	        $this->SetWidths(array($this->anchos[0]));
    	        $this->SetAligns(array("L"));
    	        $this->setBorder();
    	        $this->Row(array('   '.$this->setFont("Arial","",11).$this->titulosm[100].$this->titulosm[200]." <@".fechaenletras($dato["fecha"])."<,>arial,B,10,0,0,0@> ".$this->titulosm[300]." <@".$dato["ayuda"]."<,>arial,B,10,0,0,0@> ".$this->titulosm[0]." <@".$dato["nombre"]."<,>arial,B,10,0,0,0@> ".$this->titulosm[1]." <@".$dato["cedula"]."<,>arial,B,10,0,0,0@> ".$this->titulosm[2]." <@".$dato["edad"]."<,>arial,B,10,0,0,0@> ".$this->titulosm[3]));
    	        $this->Ln();
    	        $this->setFont("Arial","",11);
    	        $this->SetWidths(array($this->anchos[0]));
    	        $this->SetAligns(array("L"));
    	        $this->setBorder();
    	        $this->Row(array('   '.$this->titulosm[4]." <@"."CHEQUE"."<,>arial,B,10,0,0,0@> ".$this->titulosm[5]." <@"."FECHA"."<,>arial,B,10,0,0,0@> ".$this->titulosm[6]." <@".$dato["monto"]."<,>arial,B,10,0,0,0@> ".$this->titulosm[7]." <@"."BENEFICIARIO"."<,>arial,B,10,0,0,0@> "));
                $nroexp=$dato["nroexp"];
                $this->Ln();


                $this->SetY(180);
                $this->setFont("Arial","",12);
    	        $this->SetWidths(array($this->anchos[0]));
    	        $this->SetAligns(array("L"));
    	        $this->setBorder();
    	        $this->Row(array('         '.$this->titulosm[8]." <@".fechaenletras($fecha)."<,>arial,B,10,0,0,0@> "));
                $this->Ln(8);
                $this->setFont("Arial","",10);
                $this->cell(100,4,"Nombres y Apellidos:  _______________________________ ");
                $this->Ln(6);
                $this->cell(100,4,"Cédula de Identidad:   _______________________________ ");
                $this->Ln(6);
                $this->cell(100,4,"Telefonos:                   _______________________________ ");
                $this->Ln(6);
                $this->cell(100,4,"Firma:                          _______________________________ ");
                $this->Ln(20);
                $this->setFont("Arial","",12);
                $this->cell(200,5,$this->titulosm[11],0,0,'C');
                $this->Ln(5);
                $this->setFont("Arial","",10);
                $this->cell(200,5,$this->titulosm[12],0,0,'C');
                $this->Ln(5);
                $this->cell(200,5,$this->titulosm[13],0,0,'C');
                $this->Ln(5);
                $this->cell(200,5,$this->titulosm[14],0,0,'C');
				 if ($reg<=$registro)
		        {
		        	$this->addpage();
		       }
				}




		}
}