<?
  require_once("../../lib/general/fpdfadds.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");


  class pdfreporte extends fpdf
  {

    var $bd;
    var $sql;
    var $cab;
    var $titulo;

    var $codpardesde;
    var $codparhasta;

    function pdfreporte()
    {
        $this->conf="L";
      $this->fpdf($this->conf,"mm","Legal");
      $this->bd=new basedatosAdo();
      $this->codpardesde=$_POST["codpardesde"];
      $this->codparhasta=$_POST["codparhasta"];
      $this->titulo=$_POST["titulo"];

      //////////////////////////////////////////////////////////////

 //////////////////////////////////////////////////////////////////////////////////

  $this->sql= ("select
        a.codparegr as partida,
        a.nomparegr
        from fordefparegr a
        where
        (a.codparegr in
        (select distinct(codpar) from forestcos) or
        a.codparegr in
        (select distinct(codparegr) from forotrcrepre)or
        a.codparegr in
        (select distinct(codparegr)from formetotrcre)) and
        a.codparegr>='".$this->codpardesde."' and
        a.codparegr<='".$this->codparhasta."'
        order by a.codparegr");


  $this->cab=new cabecera();
    }


    function Header()
    {
      $this->SetLineWidth(0.05);
      $this->Rect(10,10,335,35);
      //$this->image("../../img/escudo.jpg",12,12,22,22);
      $this->SetFont("Arial","B",8);
      $this->SetXY(40,13);
      $this->Cell(5,5,'OFICINA ESTADAL DE PRESUPUESTO');
      $emp = $this->bd->select("select nomemp as empres from empresa where codemp = '001'");
      $this->SetXY(40,18);
      //$this->Cell(5,5,$emp->fields["empres"]);
      $this->Cell(5,5,'GOBERNACIÓN DEL ESTADO AMAZONAS');


      $this->SetXY(310,13);
      $this->Cell(5,5,'Página:  '.$this->PageNo().'  de  {nb}');
      $this->SetXY(310,18);
      $this->Cell(5,5,'Fecha:  '.date("d/m/Y"));

      $an=$this->bd->select("select to_char(fecper,'yyyy') as ano
                    from fordefniv");
      $this->SetXY(11,38);
      $this->Cell(3,10,'PRESUPUESTO:  '.$an->fields["ano"]);


      $this->SetFont("Arial","B",18);
      $this->setXY(42,30);
      $this->MultiCell(240,5,$this->titulo."
        (En Bolivares)",0,'C',0);


      $this->Formato();

    }

    function Formato()
    {
      $this->SetFont("Arial","B",8);
      $this->Rect(10,50,335,145);

      $this->SetXY(12,54);
      $this->Cell(10,7,'Partida');
      $this->Line(27,50,27,195);
      $this->SetXY(30,54);
      $this->Cell(3,7,'Denominación');
      $this->Line(55,50,55,195);
      $this->SetXY(170,50);
      $this->Cell(3,4,'Sectores');
      $this->SetY(55);
      $this->SetX(55);
      $x=55;
      for ($i=1;$i<=16;$i++){
        if ($i==1) { $this->MultiCell(17,3,'Total Presup Año Ant.');
               $this->SetY(55);	 }
        else { $this->Cell(3,7,$i-1);}
        $x+=17;
        $this->Line($x,54,$x,195);
        $this->SetX($x+5);
      }

      $this->SetX(328);
      $this->Cell(3,7,'Total');

      $this->Line(55,54,345,54);
      $this->Line(10,65,345,65);

      $this->ln();


    }

    function Cuerpo()
    {

      $l1=$this->bd->select("SELECT coalesce(SUM(LONNIV),0) as lon1 FROM FORNIVELES
              WHERE CONSEC=1 AND CATPAR='C'");

      $tb=$this->bd->select($this->sql);
      $this->SetFont("Arial","",5);
      $this->SetY(68);
      $anterior=0;

      for ($i=0;$i<=15;$i++){
        $tsectores[$i] = 0;
      }


      while (!$tb->EOF)
      {

        $Y=$this->GetY();

        if ($Y>=185){
          $this->AddPage();
          $this->SetY(68);
          $Y=$this->GetY();
        }

        $this->SetX(10);
        $this->Cell(3,3,$tb->fields["partida"]);
        $this->SetX(55);
        $this->Cell(17,3,number_format($anterior,2,'.',','),0,0,'R');

// 		ASIGNACIONES   		//
      $asignacion=$this->bd->select("select substr(a.codcat,1,2) as sector,
                coalesce(sum(b.totpre),0) as monasi
                  from forestcos b, forasometcre a
                  where b.codpar='".$tb->fields["partida"]."' and
                  a.codmet=b.codmet
                  group by substr(a.codcat,1,2)");

      $asignacion1=$this->bd->select("select substr(a.codcat,1,2) as sector,
                coalesce(sum(a.monpre),0) as monasi
                   from forotrcrepre a
                   where a.codparegr='".$tb->fields["partida"]."'
                   group by substr(a.codcat,1,2)");

      $asignacion2=$this->bd->select("select substr(a.codcat,1,2) as sector,
                coalesce(sum(b.monpre),0) as monasi
                 from formetotrcre b, forasometcre a
                 where b.codparegr='".$tb->fields["partida"]."' and
                 a.codmet=b.codmet
                 group by substr(a.codcat,1,2)");

// 		SECTORES			//

      for ($i=0;$i<=15;$i++){
        $sectores[$i] = 0;
      }

//							//

      while (!$asignacion->EOF)
         {
        if ($asignacion->fields["sector"] == '01') {$sectores[1]+=$asignacion->fields["monasi"]; }
           if ($asignacion->fields["sector"] == '02') {$sectores[2]=$sectores[2]+$asignacion->fields["monasi"];}
           if ($asignacion->fields["sector"] == '03') {$sectores[3]=$sectores[3]+$asignacion->fields["monasi"];}
           if ($asignacion->fields["sector"] == '04') {$sectores[4]=$sectores[4]+$asignacion->fields["monasi"];}
           if ($asignacion->fields["sector"] == '05') {$sectores[5]=$sectores[5]+$asignacion->fields["monasi"];}
           if ($asignacion->fields["sector"] == '06') {$sectores[6]=$sectores[6]+$asignacion->fields["monasi"];}
           if ($asignacion->fields["sector"] == '07') {$sectores[7]=$sectores[7]+$asignacion->fields["monasi"];}
           if ($asignacion->fields["sector"] == '08') {$sectores[8]=$sectores[8]+$asignacion->fields["monasi"];}
           if ($asignacion->fields["sector"] == '09') {$sectores[9]=$sectores[9]+$asignacion->fields["monasi"];}
           if ($asignacion->fields["sector"] == '10') {$sectores[10]=$sectores[10]+$asignacion->fields["monasi"];}
           if ($asignacion->fields["sector"] == '11') {$sectores[11]=$sectores[11]+$asignacion->fields["monasi"];}
           if ($asignacion->fields["sector"] == '12') {$sectores[12]=$sectores[12]+$asignacion->fields["monasi"];}
           if ($asignacion->fields["sector"] == '13') {$sectores[13]=$sectores[13]+$asignacion->fields["monasi"];}
           if ($asignacion->fields["sector"] == '14') {$sectores[14]=$sectores[14]+$asignacion->fields["monasi"];}
           if ($asignacion->fields["sector"] == '15') {$sectores[15]=$sectores[15]+$asignacion->fields["monasi"];}
        $asignacion->MoveNext();
      }

         while (!$asignacion1->EOF)
         {
        if ($asignacion1->fields["sector"] == '01') {$sectores[1]+=$asignacion1->fields["monasi"]; }
           if ($asignacion1->fields["sector"] == '02') {$sectores[2]=$sectores[2]+$asignacion1->fields["monasi"];}
           if ($asignacion1->fields["sector"] == '03') {$sectores[3]=$sectores[3]+$asignacion1->fields["monasi"];}
           if ($asignacion1->fields["sector"] == '04') {$sectores[4]=$sectores[4]+$asignacion1->fields["monasi"];}
           if ($asignacion1->fields["sector"] == '05') {$sectores[5]=$sectores[5]+$asignacion1->fields["monasi"];}
           if ($asignacion1->fields["sector"] == '06') {$sectores[6]=$sectores[6]+$asignacion1->fields["monasi"];}
           if ($asignacion1->fields["sector"] == '07') {$sectores[7]=$sectores[7]+$asignacion1->fields["monasi"];}
           if ($asignacion1->fields["sector"] == '08') {$sectores[8]=$sectores[8]+$asignacion1->fields["monasi"];}
           if ($asignacion1->fields["sector"] == '09') {$sectores[9]=$sectores[9]+$asignacion1->fields["monasi"];}
           if ($asignacion1->fields["sector"] == '10') {$sectores[10]=$sectores[10]+$asignacion1->fields["monasi"];}
           if ($asignacion1->fields["sector"] == '11') {$sectores[11]=$sectores[11]+$asignacion1->fields["monasi"];}
           if ($asignacion1->fields["sector"] == '12') {$sectores[12]=$sectores[12]+$asignacion1->fields["monasi"];}
           if ($asignacion1->fields["sector"] == '13') {$sectores[13]=$sectores[13]+$asignacion1->fields["monasi"];}
           if ($asignacion1->fields["sector"] == '14') {$sectores[14]=$sectores[14]+$asignacion1->fields["monasi"];}
           if ($asignacion1->fields["sector"] == '15') {$sectores[15]=$sectores[15]+$asignacion1->fields["monasi"];}
        $asignacion1->MoveNext();
      }

      while (!$asignacion2->EOF)
         {
        if ($asignacion2->fields["sector"] == '01') {$sectores[1]+=$asignacion2->fields["monasi"]; }
           if ($asignacion2->fields["sector"] == '02') {$sectores[2]=$sectores[2]+$asignacion2->fields["monasi"];}
           if ($asignacion2->fields["sector"] == '03') {$sectores[3]=$sectores[3]+$asignacion2->fields["monasi"];}
           if ($asignacion2->fields["sector"] == '04') {$sectores[4]=$sectores[4]+$asignacion2->fields["monasi"];}
           if ($asignacion2->fields["sector"] == '05') {$sectores[5]=$sectores[5]+$asignacion2->fields["monasi"];}
           if ($asignacion2->fields["sector"] == '06') {$sectores[6]=$sectores[6]+$asignacion2->fields["monasi"];}
           if ($asignacion2->fields["sector"] == '07') {$sectores[7]=$sectores[7]+$asignacion2->fields["monasi"];}
           if ($asignacion2->fields["sector"] == '08') {$sectores[8]=$sectores[8]+$asignacion2->fields["monasi"];}
           if ($asignacion2->fields["sector"] == '09') {$sectores[9]=$sectores[9]+$asignacion2->fields["monasi"];}
           if ($asignacion2->fields["sector"] == '10') {$sectores[10]=$sectores[10]+$asignacion2->fields["monasi"];}
           if ($asignacion2->fields["sector"] == '11') {$sectores[11]=$sectores[11]+$asignacion2->fields["monasi"];}
           if ($asignacion2->fields["sector"] == '12') {$sectores[12]=$sectores[12]+$asignacion2->fields["monasi"];}
           if ($asignacion2->fields["sector"] == '13') {$sectores[13]=$sectores[13]+$asignacion2->fields["monasi"];}
           if ($asignacion2->fields["sector"] == '14') {$sectores[14]=$sectores[14]+$asignacion2->fields["monasi"];}
           if ($asignacion2->fields["sector"] == '15') {$sectores[15]=$sectores[15]+$asignacion2->fields["monasi"];}
        $asignacion2->MoveNext();
      }


      for  ($i=1;$i<=15;$i++){
        $tsectores[$i]+=$sectores[$i];
      }


      for  ($i=1;$i<=15;$i++){
        $sectores[0]+=$sectores[$i];
      }

      $tsectores[0]+=$sectores[0];

// 		IMPRIMIR 		//
      $this->SetX(72);
      $x=72;
      for ($i=1;$i<=15;$i++){
        $this->Cell(17,3,number_format($sectores[$i],2,'.',','),0,0,'R');
        $x+=17;
        $this->SetX($x);
      }
      $this->SetX($x);
      $this->Cell(17,3,number_format($sectores[0],2,'.',','),0,0,'R');


      $this->SetXY(27,$Y);
      $this->MultiCell(28,3,$tb->fields["nomparegr"]);
      $this->ln();
      $tb->MoveNext();
      }

      $this->SetFont("Arial","B",5);
      $this->SetY($Y+6);
      $this->SetX(35);
      $this->Cell(10,3,'TOTALES :');
      $this->SetFont("Arial","",5);

      $this->SetX(72);
      $x=72;
      for ($i=1;$i<=15;$i++){
        $this->Cell(17.6,3,number_format($tsectores[$i],2,'.',','),0,0,'R');
        $x+=17;
        $this->SetX($x);
      }
      $this->SetX($x);
      $this->Cell(17,3,number_format($tsectores[0],2,'.',','),0,0,'R');



    }
  }
?>