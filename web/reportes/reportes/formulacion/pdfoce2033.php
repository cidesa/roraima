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

    var $codsecdes;
    var $codsechas;
    var $codprodes;
    var $codprohas;
    var $perdesde;
    var $perhasta;
    var $codpardes;
    var $codparhas;
    var $codprydes;
    var $codpryhas;
    var $codactdes;
    var $codacthas;

    function pdfreporte()
    {
        $this->conf="L";
      $this->fpdf($this->conf,"mm","Legal");
      $this->bd=new basedatosAdo();
      // sector
      $this->codsecdes=$_POST["codsecdes"];

     // programa
      $this->codprodes=$_POST["codprodes"];



      $this->codpardes=$_POST["codpardes"];
      $this->codparhas=$_POST["codparhas"]; // partidad

      $this->nivel = $_POST["nivel"];

      if($this->nivel==0) $this->titulo= 'Creditos Presupuestarios del Programa y sus Actividades a Nivel de Partidas y Sub-Partidas Especificas';
      else $this->titulo= 'Creditos Presupuestarios del Programa y sus Actividades a Nivel de Partidas, Sub-Partidas Especificas y Ordinales';

      //////////////////////////////////////////////////////////////
/////AQUI VOOOOOOY //

  $l1=$this->bd->select("select sum(coalesce(lonniv,0)) as lon1
              from forniveles where consec=1 and catpar='C'");

  $l2= $this->bd->select("select sum(coalesce(lonniv,0)) as lon2
                from forniveles where consec=2 and catpar='C'");

 //////////////////////////////////////////////////////////////////////////////////
 //if($this->nivel==0) $vista = 'creditos_programas_subpartidas';
 //else
  $vista = 'creditos_programas_ordinal';

 $this->sql="select distinct a.programa,a.partida,a.actividad,
      coalesce((select sum(b.monpre) from forotrcrepre b where b.codcat like a.programa||'-51%' and b.codparegr like a.partida||'%'),0) as act51,
      coalesce((select sum(b.monpre) from forotrcrepre b where b.codcat like a.programa||'-52%' and b.codparegr like a.partida||'%'),0) as act52,
      coalesce((select sum(b.monpre) from forotrcrepre b where b.codcat like a.programa||'-53%' and b.codparegr like a.partida||'%'),0) as act53,
      coalesce((select sum(b.monpre) from forotrcrepre b where b.codcat like a.programa||'-54%' and b.codparegr like a.partida||'%'),0) as act54,
      coalesce((select sum(b.monpre) from forotrcrepre b where b.codcat like a.programa||'-55%' and b.codparegr like a.partida||'%'),0) as act55,
      coalesce((select sum(b.monpre) from forotrcrepre b where b.codcat like a.programa||'-56%' and b.codparegr like a.partida||'%'),0) as act56,
      coalesce((select sum(b.monpre) from forotrcrepre b where b.codcat like a.programa||'-57%' and b.codparegr like a.partida||'%'),0) as act57,
      coalesce((select sum(b.monpre) from forotrcrepre b where b.codcat like a.programa||'-58%' and b.codparegr like a.partida||'%'),0) as act58,
      coalesce((select sum(b.monpre) from forotrcrepre b where b.codcat like a.programa||'-59%' and b.codparegr like a.partida||'%'),0) as act59,
      coalesce((select sum(b.monpre) from forotrcrepre b where b.codcat like a.programa||'-60%' and b.codparegr like a.partida||'%'),0) as act60
      from ".$vista." a
      where substr(a.programa,1,2) = '".$this->codsecdes."' and substr(a.programa,1,5) = '".$this->codprodes."'" .
          " AND (rtrim(a.actividad) = '51' OR rtrim(a.actividad) = '52' OR rtrim(a.actividad) = '53' OR rtrim(a.actividad) = '54' OR rtrim(a.actividad) = '55')
      order by programa,partida,actividad";


     /*  print '<pre>';
						print_r(  $this->sql);
						 print '</pre>';
						exit;*///////


    }


    function Header()
    {
      $this->SetLineWidth(0.05);
      $this->Rect(10,10,330,35);
      $this->image("../../img/logo_1.jpg",12,12,22,22);
      $this->SetFont("Arial","B",8);
      $this->SetXY(35,13);
      $this->Cell(5,5,'REPUBLICA BOLIVARIANA DE VENEZUELA');
      $emp = $this->bd->select("select nomemp as empres from empresa where codemp = '001'");
      $this->SetXY(35,18);
      //$this->Cell(5,5,$emp->fields["empres"]);
      $this->Cell(5,5,'GOBERNACIÓN DEL ESTADO TACHIRA');
      $this->ln();
      $this->SetX(35);
      $this->multicell(60,3,'DISTRIBUCION ADMINISTRATIVA DEL PRESUPUESTO DE GASTOS');

      $this->SetXY(295,13);
      $this->Cell(5,5,'Página:  '.$this->PageNo().'  de  {nb}');
      $this->SetXY(295,18);
      $this->Cell(5,5,'Fecha:  '.date("d/m/Y"));

      $an=$this->bd->select("select to_char(fecper,'yyyy') as ano
                    from fordefniv");


      $this->SetFont("Arial","B",10);
      $this->setXY(110,22);
      $this->MultiCell(125,4,strtoupper($this->titulo)."
      PRESUPUESTO:  ".$an->fields["ano"],0,'C',0);


    $this->Formato();
    $this->sql4="select distinct(nomcat) as sector from fordefcatpre where rtrim(codcat)=rtrim('".$this->codsecdes."')";
    $tb4=$this->bd->select($this->sql4);
	$programa=substr($this->codprodes,0,2).substr($this->codprodes,3,5);

    $this->sql6="select distinct(nomcat) as programa from fordefcatpre where rtrim(codcat)=rtrim('".$this->codprodes."')";
    $tb6=$this->bd->select($this->sql6);

    $tb=$this->bd->select($this->sql);

  	$this->sql7="select distinct(nomuni) as unidad, a.coduni,codcat from fordefcatpre a, fordefunieje b where  substr(a.codcat,1,8)=rtrim('".$this->codprodes."-".$tb->fields["actividad"]."') and a.coduni=b.coduni order by codcat";
//	print     $this->sql7; exit;

    $tb7=$this->bd->select($this->sql7);

   $this->settextcolor(128,0,0);
      $this->SetFont("Arial","B",9);
      $this->SetXY(11,32);
      $this->Cell(3,10,'SECTOR                       :  '.$this->codsecdes ."   ". $tb4->fields["sector"]);
      $this->SetXY(11,35);
      $this->Cell(3,10,'PROGRAMA                 :  '.$programa."    ".$tb6->fields["programa"]);
      $this->SetXY(11,38);
      $this->Cell(3,10,'UNIDAD EJECUTORA :    '.$tb7->fields["coduni"]."    ".$tb7->fields["unidad"]);
      $this->SetFont("Arial","",8);
      $this->SetY(58);

	 $this->sqlact="select
	  		(select nomcat from fordefcatpre a where a.codcat like ('".$this->codprodes."-51%')) as act51,
	  		(select nomcat from fordefcatpre a where a.codcat like ('".$this->codprodes."-52%')) as act52,
	  		(select nomcat from fordefcatpre a where a.codcat like ('".$this->codprodes."-53%')) as act53,
	  		(select nomcat from fordefcatpre a where a.codcat like ('".$this->codprodes."-54%')) as act54,
	  		(select nomcat from fordefcatpre a where a.codcat like ('".$this->codprodes."-55%')) as act55,
			(select nomcat from fordefcatpre a where a.codcat like ('".$this->codprodes."-56%')) as act56";
	  		/* print '<pre>';
						print_r(  $this->sqlact);
						 print '</pre>';
						exit;*/
	  $tbact=$this->bd->select($this->sqlact);
	  $this->settextcolor(128,0,0);
	  $this->SetFont("Arial","B",6);
	  $this->SetX(160);

      $this->multiCell(28,3,$tbact->fields["act51"],0,'L');
	  $y=$this->gety();
      $this->SetXY(190,$y-($y-58));
      //$this->SetXY(190,$y);
      $this->multiCell(28,3,$tbact->fields["act52"],0,'L');
      $this->SetXY(220,$y-($y-58));
      $this->multiCell(28,3,$tbact->fields["act53"],0,'L');
      $this->SetXY(250,$y-($y-58));
      $this->multiCell(28,3,$tbact->fields["act54"],0,'L');
      $this->SetXY(280,$y-($y-58));
      $this->multiCell(28,3,$tbact->fields["act55"],0,'L');
      $this->SetXY(310,$y-($y-58));
      $this->multiCell(28,3,$tbact->fields["act56"],0,'L');
      $this->SetY(75);


    }

    function Formato()
    {
      $this->SetFont("Arial","B",9);
      $this->Rect(10,45,330,150);
   $this->settextcolor(0,0,128);
      $this->SetXY(10,66);
      $this->Cell(10,3,'PART');
      $this->Line(20,45,20,195);
      $this->SetXY(20,66);
      $this->Cell(10,3,'GEN');
      $this->Line(30,45,30,195);
      $this->SetXY(30,66);
      $this->Cell(10,3,'ESP');
      $this->Line(40,45,40,195);
      $this->SetXY(40,63);
      $this->MultiCell(10,3,'SUB ESP');
      $this->Line(50,45,50,195);

      $this->SetXY(50,66);
      $this->Cell(10,3,'ORDI');
      $this->Line(60,45,60,195);

      $this->SetXY(60,66);
      $this->Cell(10,3,'NUM');
      $this->Line(70,45,70,195);
      $this->SetXY(70,66);
      $this->Cell(10,3,'APT');
      $this->Line(80,45,80,195);
      $this->SetXY(80,66);
      $this->Cell(60,3,'DENOMINACIÓN',0,0,'C');
      $this->Line(130,45,130,195);
      $this->SetXY(130,63);
      $this->MultiCell(30,3,'TOTAL PROGRAMA',0,'C',0);
      $this->Line(160,45,160,195);
      $this->SetXY(160,45);
      $this->Cell(190,7,'ACTIVIDADES',0,0,'C');
      $this->SetY(50);
      $this->SetX(160);
      $this->Cell(30,7,'51',0,0,'C');
      $this->Line(190,51,190,195);
      $this->SetX(190);
      $this->Cell(30,7,'52',0,0,'C');
      $this->Line(220,51,220,195);
      $this->SetX(220);
      $this->Cell(30,7,'53',0,0,'C');
      $this->Line(250,51,250,195);
      $this->SetX(250);
      $this->Cell(30,7,'54',0,0,'C');
      $this->Line(280,51,280,195);
      $this->SetX(280);
      $this->Cell(30,7,'55',0,0,'C');
      $this->Line(310,51,310,195);
      $this->SetXY(310,50);
      $this->MultiCell(30,7,'56',0,'C',0);
      $this->settextcolor(0,0,128);

      $this->Line(160,51,340,51);
      $this->Line(10,70,340,70);

      $this->ln();


    }

    function Cuerpo()
    {


      /*$l1=$this->bd->select("select sum(coalesce(lonniv,0)) as lon1
              from forniveles where consec=1 and catpar='C'");

      $l2= $this->bd->select("select sum(coalesce(lonniv,0)) as lon2
                      from forniveles where consec=2 and catpar='C'");*/
      $this->SetY(90);
      $tordinario=0;
      $tcoordinado=0;
      $tlaee=0;
      $tfides=0;
      $textraord=0;
      $ttotal=0;
     $tb=$this->bd->select($this->sql);
/*
    $this->sql4="select distinct(nomcat) as sector from fordefcatpre where rtrim(codcat)=rtrim('".substr($tb->fields["programa"],0,2)."')";
    $tb4=$this->bd->select($this->sql4);

    $this->sql6="select distinct(nomcat) as programa from fordefcatpre where rtrim(codcat)=rtrim('".substr($tb->fields["programa"],0,5)."')";
    $tb6=$this->bd->select($this->sql6);

    $this->sql7="select distinct(nomuni) as unidad, a.coduni from fordefcatpre a, fordefunieje b where  substr(a.codcat,1,5)=rtrim('".substr($tb->fields["programa"],0,5)."') and a.coduni=b.coduni";

    $tb7=$this->bd->select($this->sql7);

   $this->settextcolor(128,0,0);
      $this->SetFont("Arial","B",9);
      $this->SetXY(11,32);
      $this->Cell(3,10,'SECTOR                       :  '.substr($tb->fields["programa"],0,2) ."   ". $tb4->fields["sector"]);
      $this->SetXY(11,35);
      $this->Cell(3,10,'PROGRAMA                 :  '.substr($tb->fields["programa"],3,2)."    ".$tb6->fields["programa"]);
      $this->SetXY(11,38);
      $this->Cell(3,10,'UNIDAD EJECUTORA :    '.$tb7->fields["coduni"]."    ".$tb7->fields["unidad"]);
      $this->SetFont("Arial","",8);
    $this->SetY(52);

	 $this->sqlact="select
	  		(select nomcat from fordefcatpre a where a.codcat like ('".$this->codsecdes."-".$this->codprodes."-__-51%')) as act51,
	  		(select nomcat from fordefcatpre a where a.codcat like ('".$this->codsecdes."-".$this->codprodes."-__-52%')) as act52,
	  		(select nomcat from fordefcatpre a where a.codcat like ('".$this->codsecdes."-".$this->codprodes."-__-53%')) as act53,
	  		(select nomcat from fordefcatpre a where a.codcat like ('".$this->codsecdes."-".$this->codprodes."-__-54%')) as act54,
	  		(select nomcat from fordefcatpre a where a.codcat like ('".$this->codsecdes."-".$this->codprodes."-__-55%')) as act55";
	  $tbact=$this->bd->select($this->sqlact);
	  $this->settextcolor(128,0,0);
	  $this->SetFont("Arial","",6);
	  $this->SetX(160);

      $this->multiCell(25,3,$tbact->fields["act51"],0,'L');
	  $y=$this->gety();
      $this->SetXY(190,$y-($y-52));
      $this->multiCell(25,3,$tbact->fields["act52"],0,'L');
      $this->SetXY(220,$y-($y-52));
      $this->multiCell(25,3,$tbact->fields["act53"],0,'L');
      $this->SetXY(250,$y-($y-52));
      $this->multiCell(25,3,$tbact->fields["act54"],0,'L');
      $this->SetXY(280,$y-($y-52));
      $this->multiCell(25,3,$tbact->fields["act55"],0,'L');*/


    $this->SetY(75);
    $acumt=0;
    $acum1=0;
    $acum2=0;
    $acum3=0;
    $acum4=0;
    $acum5=0;
    $acump6=0;

    $acump=0;
    $acump1=0;
    $acump2=0;
    $acump3=0;
    $acump4=0;
    $acump5=0;
    $acump6=0;

    $este=substr($tb->fields["partida"],0,4);
   while (!$tb->EOF)
     {
       $this->settextcolor(0,0,0);
       if ($este!=substr($tb->fields["partida"],0,4)){
         $this->SetFont("Arial","BU",7);
         // totoles por partidas
         $this->SetX(65); $this->Cell(3,4,'TOTAL POR PARTIDA'." ".$este,0,'C',0);
         $this->SetX(130);  $this->Cell(30,4,number_format($acump ,2,',','.').' Bs',0,0,'R');
         $this->SetX(160); $this->Cell(30,5,number_format($acump1,2,',','.').' Bs',0,0,'R');
         $this->SetX(190); $this->Cell(30,5,number_format($acump2,2,',','.').' Bs',0,0,'R');
         $this->SetX(220); $this->Cell(30,5,number_format($acump3,2,',','.').' Bs',0,0,'R');
         $this->SetX(250); $this->Cell(30,5,number_format($acump4,2,',','.').' Bs',0,0,'R');
         $this->SetX(280); $this->Cell(30,5,number_format($acump5,2,',','.').' Bs',0,0,'R');
         $this->SetX(310); $this->Cell(30,5,number_format($acump6,2,',','.').' Bs',0,0,'R');
    $this->sql3="select distinct(nomparegr) as nombre from fordefparegr where rtrim(codparegr)=rtrim('".$este."')";
    $tb3=$this->bd->select($this->sql3);
    $nombreanterior=$tb3->fields["nombre"];

     $this->SetFont("Arial","BU",6);
     $this->SetX(70);  $this->multicell(60,3,$nombreanterior);
     $this->ln(5);
 // acumulo por total
    $acumt=$acump+$acumt;
    $acum1=$acump1+$acum1;
    $acum2=$acump2+$acum2;
    $acum3=$acump3+$acum3;
    $acum4=$acump4+$acum4;
    $acum5=$acump5+$acum5;
    $acum6=$acump6+$acum6;


    $acump=0;
    $acump1=0;
    $acump2=0;
    $acump3=0;
    $acump4=0;
    $acump5=0;
    $acump6=0;

    $este=substr($tb->fields["partida"],0,4);
    }
    //else{

    $this->SetFont("Arial","",7);
    $this->SetX(10);  $this->Cell(3,4,substr($tb->fields["partida"],0,4));
    $this->SetX(20);  $this->Cell(3,4,substr($tb->fields["partida"],6,2));
    $this->SetX(30);  $this->Cell(3,4,substr($tb->fields["partida"],9,2));
    $this->SetX(40);  $this->Cell(3,4,substr($tb->fields["partida"],12,2));
    $this->SetX(50);  $this->Cell(3,4,substr($tb->fields["partida"],15,3));
    $this->SetX(60);  $this->Cell(3,4,substr($tb->fields["partida"],19,3));
    $this->SetX(70);  $this->Cell(3,4,substr($tb->fields["partida"],23,3));

 		$total=$tb->fields["act51"]+$tb->fields["act52"]+$tb->fields["act53"]+$tb->fields["act54"]+$tb->fields["act55"]+$tb->fields["act56"];

        $this->SetX(130);  $this->Cell(30,4,number_format($total ,2,',','.'),0,0,'R');
        $this->SetX(160); $this->Cell(30,5,number_format($tb->fields["act51"],2,',','.'),0,0,'R');
        $this->SetX(190); $this->Cell(30,5,number_format($tb->fields["act52"],2,',','.'),0,0,'R');
        $this->SetX(220); $this->Cell(30,5,number_format($tb->fields["act53"],2,',','.'),0,0,'R');
        $this->SetX(250); $this->Cell(30,5,number_format($tb->fields["act54"],2,',','.'),0,0,'R');
        $this->SetX(280); $this->Cell(30,5,number_format($tb->fields["act55"],2,',','.'),0,0,'R');
        $this->SetX(310); $this->Cell(30,5,number_format($tb->fields["act56"],2,',','.'),0,0,'R');

    $this->sql3="select distinct(nomparegr) as nombre from fordefparegr where rtrim(codparegr)=rtrim('".$tb->fields["partida"]."')";
    $tb3=$this->bd->select($this->sql3);
    $this->SetFont("Arial","",6);
    $this->SetX(80);  $this->multicell(50,3,$tb3->fields["nombre"]);

    // acumulo por partida
    $acump=$acump+$total;
    $acump1=$tb->fields["act51"]+$acump1;
    $acump2=$tb->fields["act52"]+$acump2;
    $acump3=$tb->fields["act53"]+$acump3;
    $acump4=$tb->fields["act54"]+$acump4;
    $acump5=$tb->fields["act55"]+$acump5;
    $acump6=$tb->fields["act56"]+$acump6;
    //}

     $MiY=$this->GetY();
    if (($MiY>204) && (!$tb->EOF))
			  {
	$this->addpage();
			  }


        $this->ln();
		$tb->MoveNext();

     }// fin del ciclo

         $this->SetFont("Arial","BU",7);
         $this->SetX(65); $this->Cell(3,5,'TOTAL POR PARTIDA'."       ".$este,0,'C',0);
         $this->SetX(130);  $this->Cell(30,5,number_format($acump ,2,',','.').' Bs.',0,0,'R');
         $this->SetX(160); $this->Cell(30,5,number_format($acump1,2,',','.').' Bs.',0,0,'R');
         $this->SetX(190); $this->Cell(30,5,number_format($acump2,2,',','.').' Bs.',0,0,'R');
         $this->SetX(220); $this->Cell(30,5,number_format($acump3,2,',','.').' Bs.',0,0,'R');
         $this->SetX(250); $this->Cell(30,5,number_format($acump4,2,',','.').' Bs.',0,0,'R');
         $this->SetX(280); $this->Cell(30,5,number_format($acump5,2,',','.').' Bs.',0,0,'R');
         $this->SetX(310); $this->Cell(30,5,number_format($acump6,2,',','.').' Bs.',0,0,'R');
// para que sume el ultimo registro
    $ultimo=$acump;
    $ultimo1=$acump1;
    $ultimo2=$acump2;
    $ultimo3=$acump3;
    $ultimo4=$acump4;
    $ultimo5=$acump5;
    $ultimo6=$acump6;


    $acumt=$ultimo+$acumt;
    $acum1=$ultimo1+$acum1;
    $acum2=$ultimo2+$acum2;
    $acum3=$ultimo3+$acum3;
    $acum4=$ultimo4+$acum4;
    $acum5=$ultimo5+$acum5;
    $acum6=$ultimo6+$acum6;

         $this->ln();
     //total general
   $this->settextcolor(128,0,0);
   $this->SetFont("Arial","B",8);
      $this->SetX(100);
      $this->Cell(30,3,'TOTALES',0,'C',0);
      $this->SetX(130);
      $this->SetX(130); $this->Cell(30,4,number_format($acumt ,2,',','.').' Bs.',0,0,'R');
      $this->SetX(160); $this->Cell(30,5,number_format($acum1,2,',','.').' Bs.',0,0,'R');
      $this->SetX(190); $this->Cell(30,5,number_format($acum2,2,',','.').' Bs.',0,0,'R');
      $this->SetX(220); $this->Cell(30,5,number_format($acum3,2,',','.').' Bs.',0,0,'R');
      $this->SetX(250); $this->Cell(30,5,number_format($acum4,2,',','.').' Bs.',0,0,'R');
      $this->SetX(280); $this->Cell(30,5,number_format($acum5,2,',','.').' Bs.',0,0,'R');
      $this->SetX(310); $this->Cell(30,5,number_format($acum6,2,',','.').' Bs.',0,0,'R');

      $this->settextcolor(0,0,0);



    }
  }
?>