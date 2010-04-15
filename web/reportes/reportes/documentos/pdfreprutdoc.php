<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/modelo/sqls/documentos/Reprutdoc.class.php");


  class pdfreporte extends fpdf
  {
    var $titulo;
    var $sql;

    function pdfreporte()
    {
      $this->fpdf('l','mm','letter');
      $this->bd=new basedatosAdo();
      $this->titulo=$_POST["titulo"];
      $this->reprutdoc = new Reprutdoc();

      $this->arrp = $this->reprutdoc->sqlp();
    }


    function Header()
    {
      $this->getCabecera('Ruta de Documentos');
      /*titulos*/
      $this->SetDrawColor(255,255,255);
      $this->SetFillColor(200,200,250);
      $this->SetLineWidth(0.2);
      $sum = 30;
      $this->Rect($sum+10,50,55,8,'FD');
      $this->Rect($sum+65,50,80,8,'FD');
      $this->Rect($sum+125.5,50,40,8,'FD');
      $this->Rect($sum+165.5,50,40,8,'FD');

      $this->SetFont("times","B",12);

      $this->SetXY($sum+10,52);
      $this->Cell(55,5,"Tipo Documento",0,0,'C');

      $this->SetXY($sum+55,52);
      $this->Cell(80,5,"Unidades",0,0,'C');

      $this->SetXY($sum+125,52);
      $this->Cell(40,5,"Dias",0,0,'C');

      $this->SetXY($sum+165,52);
      $this->Cell(40,5,"Secuencia",0,0,'C');

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
        $this->SetX(50);
        $this->Cell(50,8,$dato["tipdoc"],$cuadros,0,'L');
        $this->Cell(70,8,$dato["nomuni"],$cuadros,0,'L');
        $this->Cell(40,8,$dato["diadoc"],$cuadros,0,'L');
        $this->Cell(40,8,$dato["rutdoc"],$cuadros,0,'L');
        $this->Ln(8);
      }
    }/*final del cuerpo*/
}
?>