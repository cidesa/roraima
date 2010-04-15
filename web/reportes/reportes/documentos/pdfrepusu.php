<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/modelo/sqls/documentos/Repusu.class.php");

  class pdfreporte extends fpdf
  {
    var $tipo;
    var $titulo;
    var $sql;

    function pdfreporte()
    {
      $this->fpdf('l','mm','letter');
      $this->bd=new basedatosAdo();
      $this->unidad=H::GetPost("unidad");
      $this->titulo=H::GetPost("titulo");

      $this->repusu = new Repusu();

      $this->arrp = $this->repusu->sqlp($this->unidad);


      //ECHO $this->sql;
    }


    function Header()
    {
      $this->getCabecera('Listado de Usuarios');

      /*titulos*/
      $this->SetDrawColor(255,255,255);
      $this->SetFillColor(200,200,250);
      $this->SetLineWidth(0.2);
      $this->Rect(10,50,50,8,'FD');
      $this->Rect(60,50,115,8,'FD');
      $this->Rect(175,50,46,8,'FD');
      $this->Rect(221,50,50,8,'FD');

      $this->SetXY(10,52);
      $this->SetFont("times","B",12);
      $this->Cell(50,5,"Login",0,0,'C');
      $this->SetXY(60,52);
      $this->Cell(115,5,"Nombre",0,0,'C');
      $this->SetXY(175,52);
      $this->Cell(48,5,"No de Cedula",0,0,'C');
      $this->SetXY(221,52);
      $this->Cell(50,5,"Unidad",0,0,'C');
      $this->SetDrawColor(0,0,0);
      $this->SetFillColor(0,0,0);
      $this->SetY(58);

    }

    function cuadros($x,$y,$ancho,$alto,$nocolumnas,$nofilas,$estilo)
    {
      $yv=$y;
      for($i=1;$i <= $nofilas;$i++)
      {
        $xv=$x;
        for($ii=1;$ii <= $nocolumnas;$ii++)
        {
          $this->Rect($xv,$yv,$ancho,$alto,$estilo);
          $xv+=$ancho;
        }
        $yv+=$alto;
      }
    }

    function Cuerpo()
    {
      /*se coloca en cero si no se quiere colorcar cuadros por registros y uno para lo contrario*/
      $cuadros=0;
      $this->SetFont("arial","",10);

      foreach($this->arrp as $dato)
      {
        $this->Cell(50,8,$dato["loguse"],$cuadros,0,'C');
        $this->Cell(115,8,$dato["nomuse"],$cuadros,0,'L');
        $this->Cell(46,8,$dato["cedemp"],$cuadros,0,'C');

        $u=$this->repusu->getUnidad($dato["numuni"]);

        $this->Cell(50,8,$u[0]["nomuni"],$cuadros,0,'C');
        $this->Ln(8);

      }
    }/*final del cuerpo*/
}
?>