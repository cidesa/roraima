<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/compras/Cardphpre.class.php");

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
		var $codesde;
		var $codhasta;
		var $coddphdes;
		var $coddphhas;
		var $fechadesde;
		var $fechahasta;
		var $estado;
		var $conf;
		var $nombre;
		var $direccion;
		var $telefono;
		var $sqlp=array();

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->coddphdes=H::GetPost("coddphdes");
			$this->coddphhas=H::GetPost("coddphhas");
			$this->coddesde=H::GetPost("codesde");
			$this->codhasta=H::GetPost("codhasta");
			$this->fechadesde=H::GetPost("fechadesde");
			$this->fechahasta=H::GetPost("fechahasta");
			$this->estado=H::GetPost("estado");
			$this->SetAutoPageBreak(false);

			if($this->estado=='Ambos')
			{
				$sta1='A';
				$sta2='N';
			}
			else if($this->estado=='Activas')
			{
				$sta1='A';
				$sta2='A';
			}
			else if($this->estado=='Anuladas')
			{
				$sta1='N';
				$sta2='N';
			}

            $this->cardphpre = new Cardphpre();
		    $this->sqlp=$this->cardphpre->sqlp($this->coddphdes,$this->coddphhas,$this->coddesde,$this->codhasta,$this->fechadesde,$this->fechahasta,$sta1,$sta2);
		    $this->arrp=$this->sqlp;
		    $this->otros();
		}

		function otros()
		{
			$otros=$this->cardphpre->otros();
			foreach($otros as $dato1)
			{
				$this->nombre=$dato1["nombre"];
				$this->direccion=$dato1["dir"];
				$this->telefono=$dato1["telf"];
			}
		}

		function Header()
		{


				$this->setFont("Arial","B",8);
				$this->line(10,10,200,10);
				$this->line(10,10,10,270);
				$this->setTextcolor(0,0,150);
				$this->Image("../../img/logo_1.jpg",13,12,20);
				$this->cell(200,10,'N° DESPACHO                                ',0,0,'R');
				$this->ln(5);
				$this->setTextcolor(0,0,0);
				$this->ln(6);
				$this->setTextcolor(0,0,150);
				$this->cell(200,10,'FECHA                                      		   ',0,0,'R');
				$this->ln(5);
				$this->setTextcolor(0,0,0);
				$this->ln(1);
				$this->setTextcolor(0,0,150);
			    $this->setFont("Arial","B",14);
				$this->cell(200,25,H::GetPost("titulo"),0,0,'C');
			    $this->setFont("Arial","B",8);
			    $this->ln(18);
			    $this->SetX(15);
			    $this->cell(20,5,'Num Requisicion:  ');
			     $this->ln(2);
			      $this->SetX(15);
			    $this->cell(50,10,'DESCRIPCION DESPACHO: ');
			    $this->setTextcolor(0,0,0);
				$this->line(15,45,195,45);
				//$this->line(15,65,195,65);
				$this->line(15,45,15,65);
				$this->line(195,45,195,65);
				$this->line(145,12,195,12);
				$this->line(145,12,145,35);
				$this->line(145,23.5,195,23.5);
				$this->line(195,12,195,35);
				$this->line(145,35,195,35);
				$this->ln(10);
				$this->SetXY(15,53);
				$this->cell(25,5,'Unidad de Origen:  ');
				$this->SetXY(15,57);
			//	$this->cell(25,5,'Unidad de Receptora:  ');
		//		$this->cell(20,5,'Num Requisicion:  ');

				$this->ln(8);
				$this->line(15,$this->getY(),195,$this->getY());
				//$this->line(42,$this->getY(),42,230);
				$this->line(15,$this->getY(),15,230);
				$this->line(195,$this->getY(),195,230);
				//$this->line(95,$this->getY(),95,230);
				//$this->line(120,$this->getY(),120,230);
				//$this->line(135,$this->getY(),135,230);
			//	$this->line(155,$this->getY(),155,230);
				//$this->line(175,$this->getY(),175,230);
				$this->setTextcolor(150,0,0);
				$this->SetX(15);

			 $this->setwidths(array(40,60,40,40));
			 $this->setaligns(array("C","C","C","C"));
			 $this->setBorder(1);
			 $this->rowm(array('Cod.Material','Descripcion Material','Cant.Solic','Cant.Entreg'));
			 $this->setBorder(0);

				/*
				$this->cell(38,5,'Cod.Material');
				$this->cell(52,5,'Descripcion Material');
				//$this->cell(20,5,'Destino');
				$this->cell(15,5,'Cant.Solic');
				$this->cell(19,5,'Cant.Entreg');
				//$this->cell(20,5,'Precio Unitario');
				//$this->cell(30,5,'Precio Total');*/
				$this->ln(5);
				$this->line(15,$this->getY(),195,$this->getY());
				$this->line(200,10,200,270);
				$this->line(10,270,200,270);
				$this->line(15,230,195,230);
				$this->line(15,235,195,235);
				$this->setXY(15,236);
				$this->SetTextColor(0,0,150);
				$this->cell(30,3,'							Observaciones:');
				$this->line(15,245,195,245);
				$this->setXY(15,246);
				$this->cell(60,3,'							RECIBIDO CONFORME:');
				$this->cell(65,3,'							ALMACEN:');
				$this->ln();
				$this->ln();
				$this->setX(20);
				$this->cell(60,1,'FIRMA Y SELLO:');
                $this->setX(80);
				$this->cell(60,1,'FIRMA Y SELLO:');

				$this->line(75,245,75,256);
				$this->line(15,256,195,256);
				$this->line(15,235,15,265);
				$this->line(195,235,195,265);
				$this->line(15,265,195,265);
				$this->SetTextColor(0,0,0);
				$this->setY(76);

		}
		function Cuerpo()
		{
			$this->setFont("Arial","",8);
			$ref=$this->sqlp[0]["dphact"];
			$acum1=0;
			$x=0;
			$this->setXY(15,13);
			$this->cell(167,10,$this->sqlp[0]["dphact"],0,0,'R');
			$this->setXY(15,27);
			$this->cell(164,5,$this->sqlp[0]['fecdph'],0,0,'R');
			$this->setXY(55,48.5);
    	    //$this->MultiCell(115,3,$this->sqlp[0]["desdph"]);
			$this->setXY(42,53);
			$this->cell(20,5,$this->sqlp[0]['ubicacion'],0,0,'L');
		    //$this->setXY(41,57);
	    	$this->setXY(40,45);
			$this->cell(40,5,$this->sqlp[0]['reqart'],0,0,'L');
			$this->setY(76);
			$ok=false;
			foreach($this->sqlp as $this->sqlp)
			{
			  if($this->sqlp["dphact"]!=$ref)
			  {
				$this->setXY(15,230);
				$this->setFont("Arial","B",8);
			  	#$this->cell(200,5,'TOTAL BOLIVARES:	'.number_format($acum1,2,'.',',').'																							',0,0,'R');
				$this->setFont("Arial","",8);
				$acum1=0;
				$this->setXY(15,268);
			  	//$this->cell(200,0,$this->direccion.'  -  '.$this->telefono,0,0,'C');
			  	$this->cell(200,0,"",0,0,'C');
			  	$this->AddPage();
				$ok=true;
			    $this->setXY(15,13);
			    $this->cell(170,10,$this->sqlp["dphact"],0,0,'R');
			    $this->setXY(15,27);
			    $this->cell(170,5,$this->sqlp['fecdph'],0,0,'R');
			    $this->setXY(53,50.5);
			    $this->MultiCell(115,3,$this->sqlp["desdph"]);
			    $this->setXY(42,53);
			    $this->cell(40,5,$this->sqlp['ubicacion'],0,0,'L');
			    $this->setXY(40,45);
			    $this->cell(40,5,$this->sqlp['reqart'],0,0,'L');

			    $this->setY(76);
				$temp=$ref;
			  }
			 $this->setX(13);
			 $this->setwidths(array(40,60,40,40));
			 $this->setaligns(array("C","L","C","C"));
			 $this->rowm(array($this->sqlp["codart"],$this->sqlp["desart"],number_format($this->sqlp["canreq"],0,'.',','),number_format($this->sqlp["candph"],0,'.',',')));


/*
			 $this->setFont("Arial","",6);

			 $this->cell(31,3,'					'.$this->sqlp["codart"]);
			 $this->cell(55,3,'');
			// $this->cell(26,3,$this->sqlp["codcat"]);
			$this->cell(18,3,number_format($this->sqlp["canreq"],0,'.',','));
			// $this->cell(13,3,number_format($this->sqlp["candph"],0,'.',','));
			// $this->cell(20,3,number_format($this->sqlp["cosult"],2,'.',','));
			 //$this->cell(20,3,number_format($this->sqlp["pretot"],2,'.',','));
			 $this->setX(44);
			 $this->MultiCell(45,3,$this->sqlp["desart"]);*/
			 $acum1=$acum1+$this->sqlp["pretot"];
			  if($this->getY()>=225)
			     {
			     	$this->addPage();
			     }
			 $ref=$this->sqlp["dphact"];

  		  }
		  $this->setXY(15,230);
		  $this->setFont("Arial","B",8);
	  	  #$this->cell(200,5,'TOTAL BOLIVARES:	'.number_format($acum1,2,'.',',').'																							',0,0,'R');
		  $this->setFont("Arial","",8);
		  $this->otros();
		  $this->setXY(15,268);
	 // 	  $this->cell(200,0,$this->direccion.'  -  '.$this->telefono,0,0,'C');
	  	  $this->cell(200,0,"",0,0,'C');
		}
	}
?>