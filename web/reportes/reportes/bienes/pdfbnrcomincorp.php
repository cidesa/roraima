<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/bienes/Bnrcomincorp.class.php");

	class pdfreporte extends fpdf
	{
		var $iddes = '';
		var $idhas = '';

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->fecdes=H::GetPost("fecdes");
			$this->fechas=H::GetPost("fechas");
			$this->ubides=H::GetPost("ubides");
			$this->ubihas=H::GetPost("ubihas");
			$this->nombre=H::GetPost("nombre");
			$this->cedula=H::GetPost("cedula");
			$this->cargo=H::GetPost("cargo");
			$this->bnrcomincorp= new Bnrcomincorp();
			$this->llenarTitulosAnchos();
			$this->SetAutoPageBreak(true,25);

		    $this->arrp = $this->bnrcomincorp->sqlp($this->ubides,$this->ubihas,$this->fecdes,$this->fechas);
		    //$this->reg=count($this->arrp);


		}

		function llenarTitulosAnchos()
		{
			$this->titulos[0]="Bienes Muebles";      $this->anchos[0] = 260;
			$this->titulos[1]="Materiales";      $this->anchos[1] = 260;
			$this->titulos[2]="Unidad Administradora";     $this->anchos[2] = 50;
			$this->titulos[3]="Dependencia Usuaria";      $this->anchos[3] = 150;
			$this->titulos[4]="Almacen";      $this->anchos[4] = 260;
			$this->titulos[5]="Responsable";     $this->anchos[5] = 180;
			$this->titulos[6]="Nombre y Apellido";      $this->anchos[6] = 180;
			$this->titulos[7]="C.I";      $this->anchos[7] = 80;
			$this->titulos[8]="Cargo";     $this->anchos[8] = 80;
			$this->titulos[9]="Cantidad";      $this->anchos[9] = 20;
			$this->titulos[10]="Código del Catalogo";      $this->anchos[10] = 40;
			$this->titulos[11]="Nro. del Inventario del Bien (solo para bienes Muebles)";      $this->anchos[11] = 30;
			$this->titulos[12]="Descripción";     $this->anchos[12] = 70;
			$this->titulos[13]="Incorporación";      $this->anchos[13] = 60;
			$this->titulos[14]="Valor";      $this->anchos[14] = 40;
			$this->titulos[15]="Código".chr(10)." ";     $this->anchos[15] = 20;
			$this->titulos[16]="Concepto";      $this->anchos[16] = 40;
			$this->titulos[17]="Unitario";      $this->anchos[17] = 15;
			$this->titulos[18]="Total";     $this->anchos[18] = 25;
			$this->titulos[19]="Responsable Patrimonial Primario";      $this->anchos[19] = 260;
			$this->titulos[20]="Apellidos y Nombres";      $this->anchos[20] = 120;
			$this->titulos[21]="Cédula de Identidad";     $this->anchos[21] = 60;
			$this->titulos[22]="Cargo";      $this->anchos[22] = 80;


		}


		function Header()
		{

			$this->getCabecera(H::GetPost("titulo"),"");
			$this->setFont("Arial","B",9);
				//Título Unidad Administradora
    			$this->setFont("Arial","B",10);
			    $this->SetWidths(array(80,15,50,15,100));
				$this->SetAligns(array("C","C","L","C","L"));
			    $this->SetBorder(1);
				$this->Row(array("","",$this->titulos[0],"",$this->titulos[1]));
				$this->SetFillTable(0);
				$this->SetBorder(0);
				//Título Unidad Administradora
    			$this->setFont("Arial","B",10);
			    $this->SetWidths(array($this->anchos[0]));
				$this->SetAligns(array("C"));
			    $this->SetBorder(1);
				$this->Row(array($this->titulos[2]));
				$this->Row(array(""));
				$this->SetFillTable(0);
				$this->SetBorder(0);
				//Titulos Almacen
				$this->setFont("Arial","B",10);
			    $this->SetWidths(array($this->anchos[1]));
				$this->SetAligns(array("C"));
			    $this->SetBorder("TL");
				$this->Row(array($this->titulos[3]));
				$this->Row(array(""));
				$this->SetBorder(1);
				//Detalles Responsable, Nombre y Apellido, CI
				$this->setFont("Arial","B",10);
			    $this->SetWidths(array($this->anchos[4]));
				$this->SetAligns(array("C"));
				$this->SetBorder(1);
				$this->Row(array($this->titulos[4]));
				$this->SetBorder(0);
				//Detalles reponsable
				$this->setFont("Arial","",10);
			    $this->SetWidths(array($this->anchos[5],$this->anchos[7]));
				$this->SetAligns(array("L","L"));
				$this->SetBorder(0);
				$this->line(10,60,10,70);
				$this->line(270,60,270,70);
				$this->Row(array($this->titulos[5],$this->titulos[7]));
				$this->Row(array($this->titulos[6],$this->titulos[8]));
				$this->SetBorder(0);
				$y=$this->getY();
				//Titulos Catalogo,Tipo Movimiento,Entradas,Salidas,Existencias
				$this->setFont("Arial","B",8);
			    $this->SetWidths(array($this->anchos[9], $this->anchos[10],$this->anchos[11],$this->anchos[12]));
				$this->SetAligns(array("C","C","C","C"));
			    $this->SetBorder(1);
				$this->Row(array($this->titulos[9], $this->titulos[10],$this->titulos[11],$this->titulos[12]));
				$this->setXY(170,$y);
				$this->SetWidths(array($this->anchos[13], $this->anchos[14]));
				$this->SetAligns(array("C","C"));
			    $this->SetBorder(1);
				$this->Row(array($this->titulos[13], $this->titulos[14]));
				$this->SetBorder(0);
				//Titulos Código,Tipo Movimiento,Entradas,Salidas,Existencias
				$this->setFont("Arial","B",8);
				$this->setXY(170,$y+4);
			    $this->SetWidths(array($this->anchos[15], $this->anchos[16],$this->anchos[17],$this->anchos[18]));
				$this->SetAligns(array("C","C","C","C"));
			    $this->SetBorder(1);
				$this->Row(array($this->titulos[15], $this->titulos[16],$this->titulos[17],$this->titulos[18]));
				$this->SetBorder(0);


		}


		function Cuerpo()
		{
				$reg=1;
				$registro=count($this->arrp);
				foreach ($this->arrp as $dato){

				$reg++;
				$this->setFont("Arial","",8);
			    $this->SetWidths(array($this->anchos[9], $this->anchos[10],$this->anchos[11],$this->anchos[12],$this->anchos[15], $this->anchos[16],$this->anchos[17],$this->anchos[18]));
				$this->SetAligns(array("C","C","C","L","C","L","R","R"));
			    $this->SetBorder(1);
				$this->Row(array($dato["cantidad"],$dato["codact"],$dato["codmue"],$dato["desmue"],$dato["coddis"],$dato["desdis"],H::FormatoMonto($dato["valini"]),H::FormatoMonto($dato["valini"]*$dato["cantidad"])));
				$this->SetBorder(0);


				if ($reg<=$registro){
					$this->addPage();
				}

				}

				//Titulo reponsable patrimonial
				$this->setFont("Arial","B",10);
			    $this->SetWidths(array($this->anchos[19]));
				$this->SetAligns(array("C"));
			    $this->SetBorder(1);
				$this->Row(array($this->titulos[19]));
				$this->setFont("Arial","",10);
			    $this->SetWidths(array($this->anchos[20],$this->anchos[21],$this->anchos[22]));
				$this->SetAligns(array("L","L","L"));
			    $this->SetBorder(1);
				$this->Row(array($this->titulos[20].chr(10)."            ".$this->nombre,$this->titulos[21].chr(10)."            ".$this->cedula,$this->titulos[22].chr(10)."            ".$this->cargo));

               unset($this->bnrcomincorp);
            }
	}
