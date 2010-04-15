<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/tesoreria/Tsrrepfoncaj.class.php");

	class pdfreporte extends fpdf
	{

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->fecdes=H::GetPost("fecdes");
			$this->fechas=H::GetPost("fechas");
			$this->elaborado=H::GetPost("elaborado");
			$this->cielaborado=H::GetPost("cielaborado");
			$this->autorizado=H::GetPost("autorizado");
			$this->ciautorizado=H::GetPost("ciautorizado");
			$this->tsrrepfoncaj= new Tsrrepfoncaj();
			$this->llenarTitulosAnchos();
			$this->cab=new cabecera();

		    $this->arrp = $this->tsrrepfoncaj->sqlp($this->fecdes,$this->fechas);
		    $this->reg=count($this->arrp);


		}

		function llenarTitulosAnchos()
		{
			$this->titulos[0]="Funcionario responsable";      $this->anchos[0] = 190;
			$this->titulos[1]="Apellido(s) y Nombre(s)";      $this->anchos[1] = 130;
			$this->titulos[2]="C.I Nro.";     $this->anchos[2] = 60;
			$this->titulos[3]="La cantidad de:";      $this->anchos[3] = 190;
			$this->titulos[4]="Monto Bs.:";      $this->anchos[4] = 190;
			$this->titulos[5]="Firmas";     $this->anchos[5] = 190;


		}


		function Header()
		{

			//$this->getCabecera(H::GetPost("titulo"),"");
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->ln(-1);
			$this->setFont("Arial","B",9);

		}


		function Cuerpo()
		{
			$reg=1;
             foreach($this->arrp as $dato)
                {
                $reg++;
                $this->rect(10,8,190,140);
                $this->SetWidths(array($this->anchos[0]));
				$this->SetAligns(array("C"));
			    $this->SetBorder(1);
				$this->Row(array(""));
				$this->setFont("Arial","B",9);
				$this->Row(array($this->titulos[0]));
				$this->SetWidths(array($this->anchos[1],$this->anchos[2]));
				$this->SetAligns(array("C","C"));
			    $this->SetBorder(1);
				$this->Row(array($this->titulos[1],$this->titulos[2]));
				$this->setFont("Arial","",9);
				$this->Row(array($dato["nomben"],$dato["cedrif"]));
				$this->SetWidths(array($this->anchos[0]));
				$this->SetAligns(array("C"));
			    $this->SetBorder(1);
				$this->Row(array(""));
				$y1=$this->getY();
				$this->setFont("Arial","B",9);
				$this->cell(30,5,"La Cantidad de: ",0,0,'L');
				$this->setFont("Arial","",9);
				$this->Multicell(160,5,H::obtenermontoescrito($dato["montot"]),0,'L');
				$this->rect(10,$y1,190,$this->getY()-$y1);
				$this->setFont("Arial","B",9);
				$this->cell(30,5,"Monto Bs.: ",0,0,'L');
				$this->cell(160,5,H::FormatoMonto($dato["montot"]),0,0,'L');
				$this->ln();
				$this->SetWidths(array($this->anchos[0]));
				$this->SetAligns(array("C"));
			    $this->SetBorder(1);
			    $this->Row(array(""));
				$this->Row(array($this->titulos[5]));
				$this->setFont("Arial","B",8);
				$this->SetWidths(array(105,85));
				$this->SetAligns(array("L","L"));
				$this->Row(array("",""));
			    $this->Row(array("Elaborado por:","Responsable de la Caja Chica:"));
				$this->Row(array("Apellidos y Nombres:  ".$this->elaborado,"Apellidos y Nombres:  ".$dato["nomben"]));
				$this->Row(array("C.I Nro.:  ".$this->cielaborado,"C.I Nro.:  ".$dato["cedrif"]));
				$this->Row(array("",""));
				$this->Row(array("_____________________________________","_____________________________________"));
				$this->Row(array("                                 Firma","                                 Firma"));
				$this->Row(array("",""));$this->Row(array("",""));
				$this->SetAligns(array("L","L"));
				$this->Row(array("Autorizado por:  ",""));
				$this->Row(array("Apellidos y Nombres:  ".$this->autorizado,""));
				$this->Row(array("C.I Nro.:  ".$this->ciautorizado,""));
				$this->Row(array("",""));
				$this->Row(array("_____________________________________",""));
				$this->Row(array("                                 Firma",""));


                if ($reg<=$this->reg){
                	$this->addPage();
                }
                }
               unset($this->tsrrepfoncaj);
            }
	}
