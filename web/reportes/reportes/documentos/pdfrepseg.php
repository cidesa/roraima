<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  //require_once("../../lib/general/cabecera.php");
  require_once("../../lib/modelo/business/documentos.class.php");
  require_once("../../lib/modelo/sqls/documentos/Repseg.class.php");


  class pdfreporte extends fpdf
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
      $this->codigodes=H::GetPost("codigodes");
      $this->codigohas=H::GetPost("codigohas");
      $this->tipo=H::GetPost("tipo");
      $this->estado=H::GetPost("estado");
      $this->anulado=H::GetPost("anulado");
      $this->fechahas=H::GetPost("fechahas");
      $this->fechades=H::GetPost("fechades");
      $this->fechadochas=H::GetPost("fechadochas");
      $this->fechadocdes=H::GetPost("fechadocdes");
      $this->fechaatehas=H::GetPost("fechaatehas");
      $this->fechaatedes=H::GetPost("fechaatedes");
      $this->titulo=H::GetPost("titulo");

      $this->repseg = new Repseg();

      $this->arrp = $this->repseg->sqlp($this->tipo, $this->fechades, $this->fechahas, $this->codigodes, $this->codigohas, $this->estado, $this->anulado, $this->fechaatedes, $this->fechaatehas);

    }


    function Header()
    {
      $this->getCabecera('Seguimiento de Documentos');

      /*titulos*/
      $this->SetDrawColor(255,255,255);
      $this->SetFillColor(200,200,250);
      $this->SetLineWidth(0.2);
      //$this->cuadros(10,50,32.5,13,8,1,'FD');

      $this->SetXY(2,50);
      $this->SetFont("times","B",12);
      $this->MultiCell(32,5,"
      Codigo",0,'C',0);
      
      $this->SetXY(28,47);
      $this->MultiCell(32,5,"
      Tipo
      Documento",0,'C',0);
      
      $this->SetXY(56,47);
      $this->MultiCell(32,5,"
      Unidad
      Origen",0,'C',0);
      
      $this->SetXY(82,47);
      $this->MultiCell(32,5,"
      Unidad
      Destino",0,'C',0);
      
      $this->SetXY(110,47);
      $this->MultiCell(35,5,"
      Dias
      Planificados",0,'C',0);
      
      $this->SetXY(142,47);
      $this->MultiCell(34,5,"
      Fecha
      Recepcion",0,'C',0);
      
      $this->SetXY(180,47);
      $this->MultiCell(30,5,"
      Fecha
      Atencion",0,'C',0);
      
      $this->SetXY(212  ,47);
      $this->MultiCell(32,5,"
      Días
      Consumidos",0,'C',0);
      
      $this->SetXY(238,50);
      $this->MultiCell(32,5,"
      Estado",0,'C',0);

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
      $coddoc = $this->arrp[0]["coddoc"];
      $sumtotdia = 0;
      $sumdiadoc = 0;
      $this->SetXY(40,38);
      $this->Cell(10,4,'Tipo de Documento '.$tipod);
      $this->SetY(63);
      $this->Line(10,$this->GetY(),270,$this->GetY());
      $this->SetFont("times","",10);

      foreach($this->arrp as $dato)
      {
        $this->SetX(5);

        if($coddoc != $dato["coddoc"]){
          $this->Line(10,$this->GetY(),270,$this->GetY());

          $this->SetX(95);
          $this->SetFont("times","B",10);
          $this->Cell(20.5,8,"Total Dias Planificados",$cuadros,0,'C');
          $this->Cell(28.5,8,$sumdiadoc,$cuadros,0,'C');

          $this->SetX(196);
          $this->Cell(20.5,8,"Total Dias Consumidos",$cuadros,0,'C');
          if($sumtotdia > $sumdiadoc) $this->SetTextColor(255,0,0);
          $this->Cell(28.5,8,$sumtotdia,$cuadros,0,'C');     
          if($sumtotdia > $sumdiadoc) $this->SetTextColor(0,0,0);     

          $dif = $sumtotdia - $sumdiadoc;
          $this->SetX(240);
          $this->Cell(15.5,8,"Diferencia",$cuadros,0,'C');
          if($dif>0) $this->SetTextColor(255,0,0);
          $this->Cell(10.5,8,$dif,$cuadros,0,'C');     
          if($dif>0) $this->SetTextColor(0,0,0);     

          $this->Ln(8);
          $this->Line(10,$this->GetY(),270,$this->GetY());
          $this->SetX(5);
          $this->SetFont("times","",10);
          $sumtotdia = 0;
          $sumdiadoc = 0;
          $coddoc = $dato["coddoc"];
        }
        
        
        if($tipod != $dato["tipdoc"])
        {
          $this->AddPage();
          $this->Line(10,$this->GetY(),270,$this->GetY());
          $tipod = $dato["tipdoc"];
        }
        
        $aquiy=$this->GetY();
        if($paginactual != $this->PageNo())
        {
          $paginactual = $this->PageNo();
          $this->SetFont("times","",20);
          $this->SetXY(40,38);
          $this->Cell(10,4,'Tipo de Documento '.$dato["tipdoc"]);
          $this->SetY($aquiy);
          $this->SetX(5);
          $this->SetFont("times","",10);
        }
        
        $o = '';
        $totdia = $dato["totdia"];
        $sumtotdia += $totdia;
        $diadoc = $dato["diadoc"];
        $sumdiadoc += $diadoc;
        
        #$this->cuadros(10,$this->GetY(),32.5,13,8,1,'FD');
        $this->Cell(26.5,8,$dato["coddoc"],$cuadros,0,'C');
        $this->Cell(26.5,8,$dato["tipdoc"],$cuadros,0,'C');
        $o=Documentos::getNomuni($dato["origen"]);
        $this->Cell(28.5,8,$o[0],$cuadros,0,'C');
        $o=Documentos::getNomuni($dato["destino"]);;
        $this->Cell(28.5,8,$o[0],$cuadros,0,'C');
        $this->Cell(28.5,8,$diadoc,$cuadros,0,'C');
        $this->Cell(36.5,8,date('d/m/Y H:i:s',strtotime($dato["fecrec"])),$cuadros,0,'C');
        $fecate = date('d/m/Y H:i:s',strtotime($dato["fecate"]));
        if($fecate=='31/12/1969 20:00:00') $fecate='Sin Atender';
        $this->Cell(36.5,8,$fecate,$cuadros,0,'C');
        if($totdia > $diadoc) $this->SetTextColor(255,0,0);
        $this->Cell(28.5,8,$totdia,$cuadros,0,'C');
        if($totdia > $diadoc) $this->SetTextColor(0,0,0);
        $this->Cell(20.5,8,$dato["estado"],$cuadros,0,'C');
        $this->Ln(8);
        //$tb->MoveNext();


      }
      $this->Line(10,$this->GetY(),270,$this->GetY());

      $this->SetX(95);
      $this->SetFont("times","B",10);
      $this->Cell(20.5,8,"Total Dias Planificados",$cuadros,0,'C');
      $this->Cell(28.5,8,$sumdiadoc,$cuadros,0,'C');

      $this->SetX(196);
      $this->Cell(20.5,8,"Total Dias Consumidos",$cuadros,0,'C');
      if($sumtotdia > $sumdiadoc) $this->SetTextColor(255,0,0);
      $this->Cell(28.5,8,$sumtotdia,$cuadros,0,'C');     
      if($sumtotdia > $sumdiadoc) $this->SetTextColor(0,0,0);     

      $dif = $sumtotdia - $sumdiadoc;
      $this->SetX(240);
      $this->Cell(15.5,8,"Diferencia",$cuadros,0,'C');
      if($dif>0) $this->SetTextColor(255,0,0);
      $this->Cell(10.5,8,$dif,$cuadros,0,'C');     
      if($dif>0) $this->SetTextColor(0,0,0);     

      $this->Ln(8);
      $this->Line(10,$this->GetY(),270,$this->GetY());
      $this->SetX(5);
      $this->SetFont("times","",10);      
    }/*final del cuerpo*/
}
?>
