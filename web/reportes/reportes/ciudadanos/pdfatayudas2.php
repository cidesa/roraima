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

			    $this->titulosm[100]="La Fundación Oro Negro, Fundación sin fines de lucro originalmente inscrita en la Oficina Subalterna del Tercer Circuito de Registro del Municipio Libertador del Distrito Capital, bajo el Nº 20, folio 63, tomo 13, protocolo primero, de fecha: ";
			    $this->titulosm[200]="cuya última modificación estatutaria quedó registrada en la misma oficina de registro, en fecha: ";
			    $this->titulosm[300]="bajo el Nº 6, tomo 55, protocolo primero, representada en este acto por su presidente el ciudadano: ";
				$this->titulosm[0]="venezolano, mayor de edad, de éste domicilio y titular de la Cédula de Identidad No.: ";
				$this->titulosm[1]="de nacionalidad venezolana, portador de la Cédula de Identidad Nº";
				$this->titulosm[2]="(en  lo  adelante LA FUNDACIÓN), a través de la presente  se hace constar que se otorga una";
				$this->titulosm[3]="la cantidad de Bs.F. ";
				$this->titulosm[4]="por medio de cheque Nº: ";
				$this->titulosm[5]="de fecha: ";
				$this->titulosm[6]="a nombre de: ";

				$this->titulosm[7]="para ser destinados a cubrir gastos de: ";
				$this->titulosm[7]="yo ";
				$this->titulosm[7]="antes  identificado,  declaro: Que recibo ";
				$this->titulosm[7]="la Donación que me ha sido otorgada y que la misma será destinada para a cancelar los gastos médicos indicados al momento de solicitar la ayuda social.: ";
				//$this->titulosm[7]="para ser destinados a cubrir gastos de: ";





				$this->titulosm[8]="Caracas,";
				$this->titulosm[10]="Nro: ";
				$this->titulosm[20]="Recibi Conforme, : ";

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
    	        $this->Row(array('   '.$this->titulosm[4]." <@".$dato["proveedor"]."<,>arial,B,10,0,0,0@> ".$this->titulosm[5]." <@"."FACTURA"."<,>arial,B,10,0,0,0@> ".$this->titulosm[6]." <@"."FECHA"."<,>arial,B,10,0,0,0@> ".$this->titulosm[7]." <@".$dato["monto"]."<,>arial,B,10,0,0,0@> "));
                $nroexp=$dato["nroexp"];
                $this->Ln();


                $this->SetY(175);
                $this->setFont("Arial","",12);
    	        $this->SetWidths(array($this->anchos[0]));
    	        $this->SetAligns(array("L"));
    	        $this->setBorder();
    	        $this->Row(array('         '.$this->titulosm[8]." <@".fechaenletras($fecha)."<,>arial,B,10,0,0,0@> "));
    	        $this->Ln(2);
    	        $this->setFont("Arial","",11);
    	        $this->SetWidths(array($this->anchos[0]));
    	        $this->SetAligns(array("L"));
    	        $this->setBorder();
    	        $this->Row(array('         '.$this->titulosm[20]));
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