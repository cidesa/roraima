<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/modelo/sqls/documentos/Repasitab.class.php");


  class pdfreporte extends fpdf
  {

    var $titulo;
    var $sql;

    function pdfreporte()
    {
      $this->fpdf('l','mm','letter');
      $this->bd=new basedatosAdo();

      $this->titulo=$_POST["titulo"];

      $this->repasitab = new Repasitab();

      $this->arrp = $this->repasitab->sqlp();

//ECHO $this->sql;
    }


    function Header()
    {
      $this->getCabecera('Asignación de Tablas');

      /*titulos*/
      $this->SetDrawColor(255,255,255);
      $this->SetFillColor(200,200,250);
      $this->SetLineWidth(0.2);
      $this->cuadros(10,50,29,13,9,1,'FD');

      $this->SetXY(9,47);
      $this->SetFont("times","B",12);
      $this->MultiCell(33,5,"
      Tipo
      Documento",0,'C',0);
      $this->SetXY(38,47);
      $this->MultiCell(29,5,"
      Nombre
      Tabla",0,'C',0);
      $this->SetXY(67,47);
      $this->MultiCell(29,5,"
      Vida
      Util",0,'C',0);
      $this->SetXY(96,47);
      $this->MultiCell(29,5,"
      Clave
      Primaria",0,'C',0);
      $this->SetXY(125,47);
      $this->MultiCell(29,5,"
      Clave
      Foranea",0,'C',0);
      $this->SetXY(154,47);
      $this->MultiCell(29,5,"
      Monto",0,'C',0);
      $this->SetXY(183,47);
      $this->MultiCell(29,5,"
      Fecha",0,'C',0);
      $this->SetXY(210,47);
      $this->MultiCell(32,5,"
      Descripcion",0,'C',0);
      $this->SetXY(240,47);
      $this->MultiCell(29,5,"
      Status",0,'C',0);
      $this->SetDrawColor(0,0,0);
      $this->SetFillColor(0,0,0);
      $this->SetY(63);

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
      $this->SetFont("times","",12);

      foreach($this->arrp as $dato)
      {
        $this->Cell(29,8,$dato["tipdoc"],$cuadros,0,'C');
        $this->Cell(29,8,$dato["nomtab"],$cuadros,0,'C');
        $this->Cell(29,8,$dato["vidutil"],$cuadros,0,'C');
        $this->Cell(29,8,$dato["clvprm"],$cuadros,0,'C');
        $this->Cell(29,8,$dato["clvfrn"],$cuadros,0,'C');
        $this->Cell(29,8,$dato["mondoc"],$cuadros,0,'C');
        $this->Cell(29,8,$dato["fecdoc"],$cuadros,0,'C');
        $this->Cell(29,8,$dato["desdoc"],$cuadros,0,'C');
        $this->Cell(29,8,$dato["stadoc"],$cuadros,0,'C');
        $this->Ln(8);
      }

    }/*final del cuerpo*/
}
?>