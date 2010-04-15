<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/modelo/sqls/documentos/Repuni.class.php");


  class pdfreporte extends fpdf
  {
    var $titulo;
    var $sql;

    function pdfreporte()
    {
      $this->fpdf('l','mm','letter');
      $this->bd=new basedatosAdo();
      $this->titulo=$_POST["titulo"];

      $this->repuni = new Repuni();

      $this->arrp = $this->repuni->sqlp();


    }


    function Header()
    {
      $this->getCabecera('Listado de Unidades');

      /*titulos*/
      $this->SetDrawColor(255,255,255);
      $this->SetFillColor(200,200,250);
      $this->SetLineWidth(0.2);
      $this->Rect(10,50,60,8,'FD');
      $this->Rect(70,50,201,8,'FD');

      $this->SetXY(10,52);
      $this->SetFont("times","B",12);
      $this->Cell(60,5,"Nombre",0,0,'C');
      $this->SetXY(60,52);
      $this->Cell(201,5,"Descripcion",0,0,'C');
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
        $this->Cell(60,5,$dato["nomuni"],$cuadros,0,'L');
        $this->MultiCell(201,5,$dato["desuni"],$cuadros,'L',0);
        $this->Ln(3);

      }
    }/*final del cuerpo*/
}
?>