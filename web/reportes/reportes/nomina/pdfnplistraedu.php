<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/general/Herramientas.class.php");
  require_once("../../lib/modelo/sqls/nomina/Nplistraedu.class.php");

  class pdfreporte extends fpdf
  {
    function pdfreporte()
    {
      $this->fpdf("l","mm","Letter");
      $this->ced1=H::GetPost("ced1");
      $this->ced2=H::GetPost("ced2");
      $this->mincodniv=H::GetPost("mincodniv");
      $this->maxcodniv=H::GetPost("maxcodniv");
      $this->mincodprofes=H::GetPost("mincodprofes");
      $this->maxcodprofes=H::GetPost("maxcodprofes");
      $this->nplistraedu= new Nplistraedu();
      $this->cab = new Cabecera ();
      $this->llenartitulosmaestro();
      $this->arrp=$this->nplistraedu->sqlp($this->ced1,$this->ced2,$this->mincodniv,$this->maxcodniv,$this->mincodprofes,$this->maxcodprofes);
    }// fin del pdf

function llenartitulosmaestro()
    {
        $this->titulos[0]="CÉDULA";
        $this->titulos[1]="NOMBRE";
        $this->titulos[2]="NIVEL ACADEMICO";
  }

    function Header()
    {
	     $this->cab->poner_cabecera_f($this,$_POST["titulo"],$this->conf,"s","s");
	    $this->ln(5);
	    $this->SetFillColor(230,230,230);
	    $this->setFont("Arial","B",12);
		$this->SetWidths(array(26,86+30,88+30));
		$this->SetAligns(array("C","C","C"));
		$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array($this->titulos[0],$this->titulos[1],$this->titulos[2]));
		$this->SetBorder(0);
		$this->SetFillTable(0);
		$this->ln();
		$this->SetFillColor(230,230,230);
	    $this->setFont("Arial","B",12);
	    $this->SetWidths(array(22,84,82,42,30));
		$this->SetAligns(array("C","C","C","C","C","C"));
		$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array("Codigo","Profesión","Nombre del Instituto","Duracion","Año de Culm."));
		$this->SetBorder(0);
	    $this->ln();
    }

    function Cuerpo()
    {
    	$ref="";
        foreach($this->arrp as $dato)
       {
	       	if ($ref!=$dato["cedemp"]){
	       	$this->line(10,$this->gety(),270,$this->gety());
	       	$this->ln();
	       	$ref=$dato["cedemp"];
	        $this->setFont("Arial","B",10);
			$this->SetWidths(array(26,86+30,88+30));
			$this->SetAligns(array("L","L","L"));
			$this->SetBorder(0);
			$this->Row(array($dato["cedemp"],$dato["nomemp"],$dato["desniv"]));
			$this->SetBorder(1);
			$this->SetFillTable(0);
			$this->ln();

			}
        $this->setFont("Arial","",10);
        $this->SetWidths(array(22,84,82,42,30));
		$this->SetAligns(array("C","L","L","L","L","L"));
		$this->Row(array($dato["codprofes"],$dato["nomtit"],$dato["instit"],$dato["durcur"],$dato["anocul"]));
        $this->ln();


	       if ($this->gety() >= 185)
	       {
	       	  $this->addpage();
	       }
       }//FOREACH
     }//CUERPO

 }
?>
