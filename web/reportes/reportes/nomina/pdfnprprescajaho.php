<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/Cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/nomina/Nprprescajaho.class.php");
    //require_once("../../lib/general/mc_table.php");

  class pdfreporte extends fpdf
  {

//DECLARACION DE VARIABLES GLOBALES AQUI

    function pdfreporte()
    {
      $this->fpdf("l","mm","Letter");
      //CODIGO DE LAS CUENTAS
      $this->ced1=H::GetPost("codempdes");
      $this->ced2=H::GetPost("codemphas");
      //PERIODO

      $this->nomina=H::GetPost("codnommin");

      $this->tippres=H::GetPost("codpremin");

      $this->Nprprescajaho= new Nprprescajaho();
      $this->cabecera = new Cabecera ();
      $this->llenartitulosmaestro();
      $this->arrp=$this->Nprprescajaho->sqlp($this->ced1,$this->ced2,$this->nomina,$this->tippres);


        }// fin del pdf

function llenartitulosmaestro()
    {
        $this->titulos[0]="CÉDULA";
        $this->titulos[1]="NOMBRE";
        $this->titulos[2]="TIPO DE PRESTAMO";
        $this->titulos[3]="MONTO PRESTADO";
        $this->titulos[4]="CUOTA";
        $this->titulos[5]="SALDO";



  }




    function Header()
    {
      $this->cabecera->poner_cabecera($this,H::GetPost("titulo"),"p","S","");
      $this->ln(5);


    }

    function Cuerpo()
    {
      //  $this->ln(30);

        //CODIGO DEL ENTE
        $this->setFont("Arial","B",12);
		$this->SetWidths(array(25,80,80,25,25,25));
		$this->SetAligns(array("C","C","C","C","C","C"));
		$this->SetBorder(1);
		$this->Row(array($this->titulos[0],$this->titulos[1],$this->titulos[2],$this->titulos[3],$this->titulos[4],$this->titulos[5]));
		$this->SetBorder(0);
		$this->SetFillTable(0);
       $registro=count($this->arrp);
       $reg = 0;
   /* $y = $this->getY();
   $this->setXY(3,$y);*/
   foreach($this->arrp as $dato)
   {
        $this->setFont("Arial","",12);
		$this->SetWidths(array(25,80,80,25,25,25));
		$this->SetAligns(array("L","L","L","R","R","R"));
		$this->SetBorder(1);
		$this->Row(array($dato["codemp"],$dato["nomemp"],$dato["nomcon"],H::FormatoMonto($dato["monto"]),H::FormatoMonto($dato["saldo"]),H::FormatoMonto($dato["acumulado"])));
		$this->SetBorder(0);
		$this->SetFillTable(0);

       $reg++;


       if ($reg >= $registro)
       {
       	  $this->addpage();
       }

   }
//totales


  }

 }
?>
