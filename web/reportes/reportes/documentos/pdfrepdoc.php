<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/modelo/sqls/documentos/Repdoc.class.php");


  class pdfreporte extends FPDF
  {
    var $codigodes;
    var $codigohas;
    var $tipo;
    var $estado;
    var $anulado;
    var $fechades;
    var $fechahas;
    var $titulo;
    var $sql;

    function pdfreporte()
    {
      $this->fpdf('l','mm','letter');
      $this->bd=new basedatosAdo();
      $this->codigodes=$_POST["codigodes"];
      $this->codigohas=$_POST["codigohas"];
      $this->tipo=$_POST["tipo"];
      $this->estado=$_POST["estado"];
      $this->anulado=$_POST["anulado"];
      $this->fechahas=$_POST["fechahas"];
      $this->fechades=$_POST["fechades"];
      $this->fechadochas=$_POST["fechadochas"];
      $this->fechadocdes=$_POST["fechadocdes"];
      $this->fechaatehas=$_POST["fechaatehas"];
      $this->fechaatedes=$_POST["fechaatedes"];
      $this->titulo=$_POST["titulo"];

      $this->repdoc = new Repdoc();

      $this->arrp = $this->repdoc->sqlp($this->tipo, $this->fechades, $this->fechahas, $this->codigodes, $this->codigohas, $this->estado, $this->anulado, $this->fechadocdes, $this->fechadochas, $this->fechaatedes, $this->fechaatehas);

//echo $this->sql;
    }


    function Header()
    {
      $this->getCabecera('Reporte de Documentos');

      /*titulos*/
      $this->SetDrawColor(255,255,255);
      $this->SetFillColor(200,200,250);
      $this->SetLineWidth(0.2);
      //$this->cuadros(10,50,32.5,13,8,1,'FD');

      $this->SetXY(5,50);
      $this->SetFont("times","B",12);
      $this->MultiCell(22,5,"
      Codigo",0,'C',0);

      $this->SetXY(24,47);
      $this->MultiCell(32,5,"
      Tipo
      Documento",0,'C',0);

      $this->SetXY(55,47);
      $this->MultiCell(32,5,"
      Descripción
      Documento",0,'C',0);

      $this->SetXY(116,47);
      $this->MultiCell(34,5,"
      Fecha
      Elaboración",0,'C',0);

      $this->SetXY(147,47);
      $this->MultiCell(32,5,"
      Ultima
      Atención",0,'C',0);

      $this->SetXY(169,47);
      $this->MultiCell(32,5,"
      Estado",0,'C',0);

      $this->SetXY(187,47);
      $this->MultiCell(32,5,"
      Unidad
      Actual",0,'C',0);

      $this->SetXY(206,47);
      $this->MultiCell(32,5,"
      Días
      Planif.",0,'C',0);

      $this->SetXY(224,47);
      $this->MultiCell(32,5,"
      Días
      Consum.",0,'C',0);

      $this->SetXY(240,47);
      $this->MultiCell(32,5,"
      Días
      Difer.",0,'C',0);

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
      $this->SetFont("times","",20);
      //$tb= $this->bd->select($this->sql);
      $paginactual = $this->PageNo();
      $tipod = $this->arrp[0]["tipdoc"];
      $this->SetXY(40,38);
      $this->Cell(10,4,'Tipo de Documento '.$tipod);
      $this->SetY(63);
      $this->SetFont("times","",10);

      
      foreach($this->arrp as $dato)
      {
        $this->SetX(5);
        if($tipod != $dato["tipdoc"])
        {
          $this->AddPage();
          $this->SetX(5);
          $tipod = $dato["tipdoc"];
        }
        #$this->cuadros(10,$this->GetY(),32.5,13,8,1,'FD');
        $doc= $dato["tipdoc"];
        $this->Cell(24.5,8,$dato["coddoc"],$cuadros,0,'C');

        $this->Cell(24.5,8,$dato["tipdoc"],$cuadros,0,'C');

        $y = $this->GetY();
        $this->SetFont("times","",8);
        $this->MultiCell(64.5,4,$dato["desdoc"]);
        $this->SetFont("times","",10);
        $this->SetXY(120,$y);

        $this->Cell(28.5,8,date('d/m/Y',strtotime($dato["fecdoc"])),$cuadros,0,'C');

        $this->Cell(32.5,8,date('d/m/Y H:i:s',strtotime($dato["ultate"])),$cuadros,0,'C');
        
        $this->SetXY(180,$y);
        $this->Cell(15,8,$dato["estado"],$cuadros,0,'C');
                
        $this->Cell(20,8,$dato["nomuni"],$cuadros,0,'C');
        
        $diadoc = $dato["diadoc"];
        $this->Cell(17,8,$diadoc,$cuadros,0,'C');        
        
        $totdia = $dato["totdia"];
        if($totdia>$diadoc) $this->SetTextColor(255,0,0);
        $this->Cell(17,8,$totdia,$cuadros,0,'C');
        if($totdia>$diadoc) $this->SetTextColor(0,0,0);
        
        $dif = $totdia - $diadoc;
        if($dif>0) $this->SetTextColor(255,0,0);
        $this->Cell(17,8,$dif,$cuadros,0,'C');
        if($dif>0) $this->SetTextColor(0,0,0);


        $this->Ln(8);
        //$tb->MoveNext();
        $aquiy=$this->GetY();
        if($paginactual != $this->PageNo())
        {
          $this->SetFont("times","",20);
          $paginactual = $this->PageNo();
          $this->SetXY(80,38);
          $this->Cell(10,4,'Tipo de Documento '.$dato["tipdoc"]);
          $this->SetY($aquiy);
          $this->SetFont("times","",10);
          $this->SetX(5);
        }

      }

    }/*final del cuerpo*/
}
?>