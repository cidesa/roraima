<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/compras/Carplicompre.class.php");

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
		var $analizado;
		var $evaluado;
		var $autorizado;
		var $conf;
		var $a;
		var $b;


		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
	        $this->arrp=array("no_vacio");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
                        $this->codreqdes=H::GetPost("codreqdes");
			$this->rifpro=H::GetPost("rifpro");
			$this->asesor=H::GetPost("asesor");
			$this->analizado=H::GetPost("analizado");
			$this->revisado=H::GetPost("revisado");
			$this->autorizado=H::GetPost("autorizado");
	  	    $this->carplicompre= new Carplicompre();
		    $this->arrp2=$this->carplicompre->sqlp($this->codreqdes,$this->rifpro);

		}
		function Header()
		{

				$arriba=$this->GetY();
			    $this->SetDrawColor(255,255,255);
			    $this->cab->poner_cabecera($this,"","p","s");
			    $this->SetDrawColor(0,0,0);
                $this->SetY($arriba+5);
                	//Borde superior izquierdo
                $this->line(10,6,205,6);
				$this->line(10,6,10,260);
					//Borde Inferior y Derecho
			$this->line(205,6,205,260);
			$this->line(10,260,205,260);
				$this->ln(5);
				//Paginas
		//		$this->Cell(170,11,'',0,0,'C',0);
				$this->cell(205,10,'Solicitud de Cotización Nro: '.$this->arrp2[0]["reqart"],0,0,'C');


			///////////////////////////////////////////
			$this->ln(15);
			$this->setFont("Arial","B",8);
			$this->setx(15);
			$this->cell(160,10,				H::GetPost("titulo"),0,0,'C',0 );
			$this->ln(10);
			//cuadro 1
			$this->line(15,$this->getY(),200,$this->getY());
		    $this->line(15,$this->getY(),15,65);
			$this->line(200,$this->getY(),200,65);
			$this->setXY(15,$this->getY());
		    $y=$this->getY();
			$this->setFont("Arial","B",8);
			$this->cell(20,10,'Proveedor: ');
			$this->setXY(15,$this->getY()+5);
			$this->cell(20,10,'Direccion: ');
			$this->setXY(15,$this->getY()+5);
			$this->cell(20,10,'Atención:    '.$this->asesor);
			$this->setXY(141,$y);
			$this->cell(20,10,'Rif: ');
			$this->setXY(141,$this->getY()+5);
			$this->cell(20,10,'Telefono: ');
			$this->setXY(141,$this->getY()+5);
			$this->cell(20,10,'Fax: ');
			$this->line(15,$this->getY()+10,200,$this->getY()+10);

			//cuadro 2
		//	$this->line(15,71,200,71);
			$this->setXY(25,71);
			$this->setFont("Arial","",8);
			$this->multicell(170,3,'Me permito solicitarle informar a esta Institución en un tiempo no mayor a tres (03) días hábiles, de la fecha de la presente solicitud, sus mejores precios para los bienes y/o servicios que se describen a continuación, expresando lo siguiente:');
			$this->setXY(25,79);
			$this->setFont("Arial","B",8);
			$this->multicell(170,3,' Numero de Cotización o Presupuesto, Condiciones de Pago, Plazo de Entrega, Fecha, RIF, y VALIDEZ DE OFERTA,');
			$this->setXY(25,85);
			$this->cell(170,3,'Importante:');
			$this->setFont("Arial","",8);
			$this->setXY(42,85);
			$this->cell(170,3,'Caso Contrario no se tramitara la Oferta');
			$this->line(15,91,200,91);
			$this->setXY(15,91);
			$this->setFont("Arial","B",8);
			$this->cell(35,5,'Cantidad');
			$this->cell(60,5,'Unidad de Medida');
			$this->cell(100,5,'Descripción');
        	$this->line(15,96,200,96);
			$this->line(35,91,35,210);
			$this->line(100,91,100,210);
			$this->line(15,91,15,210);
			$this->line(200,91,200,210);
			$this->line(15,210,200,210);
			//cuadro 3
			$this->line(15,215,200,215);
			$this->line(15,215,15,230);
			$this->setXY(15,215);
			$this->multicell(190,5,'OBSERVACIONES:'.$this->arrp2[0]["obsreq"]);
			$this->line(200,215,200,230);
			$this->line(15,230,200,230);
			$this->setXY(15,247);
		/*	$this->cell(205,3,'Contraloria Metropolitana de Caracas, RIF. G-200017643',0,0,'C');
			$this->setXY(15,250);
			$this->cell(205,3,'Dirección Fiscal y de Despacho: Av. Urdaneta , entre esquinas de Animas a Plaza España, Centro Financiero Latino, piso 24',0,0,'C');
			$this->setXY(15,$this->gety()+3);
			$this->cell(205,3,'Telefax: (0212)564.03.89 / 564.97.81 / 564.25.84 / 564.96.32 / 564.47.06. ',0,0,'C' );
			$this->setXY(15,$this->gety()+3);
			$this->cell(205,3,' Correo Electronico: dcsg.cmc@gmail.com',0,0,'C' );
*/
			////////////////////////////////////////////cabecera
			 $this->setFont("Arial","B",8);
			       $this->setWidths(array(25,120,40));
			       $this->setAligns(array("L","L","C"));
			       $this->setXY(245,22);
				 $this->setFont("Arial","B",9);
				 //numero
				 $this->cell(30,5,$this->arrp2[0]["reqart"]);
				 $this->setFont("Arial","",9);
				 //proveedor
				 	$this->setXY(35,48);
				 $this->cell(30,5,$this->arrp2[0]["nompro"]);
				 	$this->setXY(150,48);
				 //rif
				 $this->cell(30,5,$this->arrp2[0]["rifpro"]);
					 $this->setXY(35,52);
				 //direccion
				 $this->multicell(100,3,$this->arrp2[0]["dirpro"]);
				 //telefono
					 $this->setXY(155,53);
				 $this->cell(30,5,$this->arrp2[0]["telpro"]);
				  $this->setXY(155,58);
				 $this->cell(30,5,$this->arrp2[0]["faxpro"]);
				 //venderdor
				    $this->setXY(35,58);
		}
		function Cuerpo()
		{  $y=98;
			 $y2=0;

			foreach($this->arrp2 as $dato)
			{
			     $this->setFont("Arial","",8);
                 $this->setXY(15,$y);
			     //$this->setwidths(array(35,50,150));
			     $this->setwidths(array(20,65,100));
			     $this->setaligns(array("R","C","L"));
			     $this->rowm(array($dato["canreq"],$dato["unimed"],$dato["desart"]));
				 $this->ln();

				  $y=$this->GetY();
				  $y2=$this->GetY();

					     if($y2>=210)
					     {
					     $this->AddPage();
					     $y=98;
					     $y2=0;

					     }//if

                 $this->setFont("Arial","B",8);
			//	 $this->AddPage();
			}//fin de foreach
           $this->setXY(15,231);
	       $this->cell(30,5,"ANALIZADO POR: ".H::GetPost("analizado"));
	       $this->setXY(15,$this->gety()+5);
	       $this->cell(30,5,"REVISADO POR: ".H::GetPost("revisado"));
	       $this->setXY(15,$this->gety()+5);
	       $this->cell(30,5,"AUTORIZADO POR: ".H::GetPost("autorizado"));

			}//funcion cuerpo
	}
?>
