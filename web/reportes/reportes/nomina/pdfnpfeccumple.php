<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/Cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/nomina/Npfeccumple.class.php");
    //require_once("../../lib/general/mc_table.php");

  class pdfreporte extends fpdf
  {

//DECLARACION DE VARIABLES GLOBALES AQUI

    function pdfreporte()
    {
      $this->fpdf("l","mm","Letter");
      //CODIGO DE LAS CUENTAS
      $this->ced1=H::GetPost("ced1");
      $this->ced2=H::GetPost("ced2");
      //PERIODO
      $this->mes1=H::GetPost("mes1");
      $this->mes2=H::GetPost("mes2");

      $this->dia1=H::GetPost("dia1");
      $this->dia2=H::GetPost("dia2");

//print $this->mes2;exit;

      $this->feccumple= new Npfeccumple();
      $this->cabecera = new Cabecera ();
      $this->llenartitulosmaestro();
      //$this->arrp=$this->feccumple->sqlp($this->ced1,$this->ced2,$this->mes1,$this->mes2,$this->dia1,$this->dia2);
      $this->arrp=$this->feccumple->sqlp($this->ced1,$this->ced2,$this->mes1,$this->mes2,$this->dia1,$this->dia2);


        }// fin del pdf

function llenartitulosmaestro()
    {
        $this->titulos[0]="CÉDULA";
        $this->titulos[1]="NOMBRE";
        $this->titulos[2]="FECHA DE NACIMIENTO";
        $this->titulos[3]="EDAD";

  }




    function Header()
    {
      $this->cabecera->poner_cabecera($this,H::GetPost("titulo"),"p","S","");
      $this->ln(5);
      $this->SetFillColor(230,230,230);
      $this->setFont("Arial","B",12);
		$this->SetWidths(array(30,150,40,40));
		$this->SetAligns(array("C","C","C","C"));
		$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array($this->titulos[0],$this->titulos[1],$this->titulos[2],$this->titulos[3]));
		$this->SetBorder(0);
		$this->SetFillTable(0);


    }

    function Cuerpo()
    {
      //  $this->ln(30);

        //CODIGO DEL ENTE
               $registro=count($this->arrp);
       $reg = 0;
   /* $y = $this->getY();
   $this->setXY(3,$y);*/
   foreach($this->arrp as $dato)
   {
        $this->setFont("Arial","",10);
		$this->SetWidths(array(30,150,40,40));
		$this->SetAligns(array("L","L","C","R"));
		$this->SetBorder(1);
		$this->Row(array($dato["cedula"],$dato["nombre"],$dato["fecha"],$dato["edad"]));
		$this->SetBorder(0);
		$this->SetFillTable(0);

       $reg++;


       if ($this->gety() >= 180)
       {
       	  $this->addpage();
       }

   }
//totales


  }

 }
?>
