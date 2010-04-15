<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");

  class pdfreporte extends fpdf
  {

    var $bd;
    var $titulos;
    var $titulos2;
    var $anchos;
    var $anchos2;
    var $campos;
    var $sql1;
    var $sql2;
    var $rep;
    var $numero;
    var $cab;
    var $codempdes;
    var $codemphas;
    var $codcardes;
    var $codcarhas;
    var $codcatdes;
    var $codcathas;
    var $codcondes;
    var $codconhas;
    var $tipnom;
    var $elaborado;
    var $revisado;
    var $autorizado;
    var $conf;
    var $nombre;
    var $especial;


    function pdfreporte()
    {
      $this->conf="p";
      $this->fpdf($this->conf,"mm","Letter");
      $this->cab=new cabecera();
      $this->bd=new basedatosAdo();
      $this->titulos=array();
      $this->titulos2=array();
      $this->campos=array();
      $this->anchos=array();
      $this->anchos2=array();
      $this->codempdes=$_POST["codempdes"];
      $this->codemphas=$_POST["codemphas"];
      $this->codcardes=$_POST["codcardes"];
      $this->codcarhas=$_POST["codcarhas"];
      $this->codcatdes=$_POST["codcatdes"];
      $this->codcathas=$_POST["codcathas"];
      $this->codcondes=$_POST["codcondes"];
      $this->codconhas=$_POST["codconhas"];
      $this->tipnom=$_POST["tipnom"];
      $this->elaborado=$_POST["elaborado"];
      $this->revisado=$_POST["revisado"];
      $this->autorizado=$_POST["autorizado"];
      $this->especial=$_POST["especial"];
      $this->fechades=$_POST["fechades"];
	  $this->fechahas=$_POST["fechahas"];
	  $this->tipnomesp1=$_POST["tipnomesp1"];
      $this->tipnomesp2=$_POST["tipnomesp2"];

        if ($this->especial == 'S')
            {
                $especial = " G.especial = 'S' AND
        (G.CODNOMESP) >= TRIM('".$this->tipnomesp1."') AND
        (G.CODNOMESP) <= TRIM('".$this->tipnomesp2."') AND ";
             }
            else
            {  if ($this->especial == 'N')           $especial = " G.especial = 'N' AND";
            }

      $this->sql="SELECT
              distinct C.CODEMP as codemp,
              to_char(C.FECRET,'dd/mm/yyyy') as fecret,
              C.NOMEMP as nomemp,
              to_char(C.FECING,'dd/mm/yyyy') as fecing,
              C.NUMCUE as CUENTA_BANCO,
              B.CODCAT as CODCAT,
              D.nomcat as nomcat,
              C.CEDEMP as cedemp,
              LTRIM(RTRIM(B.CODCAR)) as CODCAR,
              B.NOMCAR as nomcar,
              (CASE WHEN C.STAEMP='A' THEN 'ACTIVO' WHEN C.STAEMP='S' THEN 'SUSPENDIDO' WHEN C.STAEMP='V' THEN 'VACACIONES' ELSE '' END) as ESTATUS,
              G.CODCAR as codcargo,
              G.CODCON as codcon,
              LTRIM(RTRIM(G.NOMCON)) AS NOMCON,-- G.MONTO as ASIGNA
							(CASE WHEN H.OPECON='A' THEN coalesce(sum(G.MONTO),0) ELSE 0 END) as ASIGNA,
	(CASE WHEN H.OPECON='D' THEN coalesce(sum(G.MONTO),0) ELSE 0 END) as DEDUC,
	(CASE WHEN H.OPECON='P' THEN coalesce(sum(G.MONTO),0) ELSE 0 END) as APORTE, cast(REPLACE(c.cedemp,'.', '') as int )
            FROM
              NPHOJINT C,
              NPASICAREMP B,
              NPCATPRE D,
              nphiscon G,
              NPDEFCPT H
            WHERE
              (B.CODNOM) = ('".$this->tipnom."') AND
              C.CODEMP>= ('".$this->codempdes."') AND
              C.CODEMP <= ('".$this->codemphas."') AND
              B.CODCAT>= ('".$this->codcatdes."') AND
              B.CODCAT <= ('".$this->codcathas."') AND
              B.CODCAR>= ('".$this->codcardes."') AND
              B.CODCAR <= ('".$this->codcarhas."') AND
              G.CODCON>='".$this->codcondes."' AND
              G.CODCON<='".$this->codconhas."' AND ".$especial."

              B.STATUS='V' AND
              H.IMPCPT='S' AND
              B.CODEMP=C.CODEMP AND
              B.CODCAT=D.CODCAT AND
              B.CODEMP=G.CODEMP AND
              B.CODCAR=G.CODCAR AND
              B.CODNOM=G.CODNOM AND
              G.CODCON=H.CODCON and
		      g.fecnomdes>=to_date('".$this->fechades."','dd/mm/yyyy') and
			  g.fecnom<=to_date('".$this->fechahas."','dd/mm/yyyy')
				GROUP BY
				C.CODEMP ,c.cedemp,
				C.FECRET,
				C.NOMEMP ,
				H.OPECON,c.fecing,c.numcue,b.codcat,d.nomcat,b.codcar,b.nomcar,c.staemp,g.codcar,
				g.codcon,g.nomcon,g.monto
            ORDER BY
              b.codcat,cast(REPLACE(c.cedemp,'.', '') as int )";
        //  print '<pre>'; print $this->sql;exit;

    }

    function Header()
    {
      $this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s");
      $this->setFont("Arial","B",8);
      $rs=$this->bd->select("select upper(nomnom) as nombre from NPNOMINA where codnom='".$this->tipnom."'");
      $band=false;
      if(!$rs->EOF)
      {
        $this->nombre=$rs->fields["nombre"];
      }
      $sr=$this->bd->select("SELECT frecal, numsem, to_char(ULTFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=RPAD('".$this->tipnom."',3,' ')");
      if(!$sr->EOF)
      {
        if($sr->fields["frecal"]=='S')
        {
          $band=true;
          $fechasem=$sr->fields["numsem"];

        }
        $fechad=$sr->fields["fecha"];

      }
      $ss=$this->bd->select("SELECT frecal, numsem, to_char(PROFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=RPAD('".$this->tipnom."',3,' ')");
      if(!$ss->EOF)
      {
        $fechah=$ss->fields["fecha"];
      }
      $this->cell(0,5,'NOMINA: '.$this->tipnom.' - '.$this->nombre. '    PERIODO DEL: '.$this->fechades.' AL '.$this->fechahas);
    //  $this->cell(60,5,'PERIODO DEL: '.$this->fechades.' AL '.$this->fechahas);
      if($band==true)
      {
        $this->cell(40,5,'SEMANA Nro: '.$fechasem);
      }
      $this->ln(5);

    }
    function Cuerpo()
    {
      $this->setFont("Arial","B",8);
        $tb=$this->bd->select($this->sql);
        $tb2=$tb;
      $ref="";
      $acum1=0;
      $acum2=0;
      $acum3=0;
      $totacum1=0;
      $totacum2=0;
      $totacum3=0;
      $acumulado=0;
      $cont=0;
      $contador=0;
      $total1=0;
      $total2=0;
      $total3=0;
      $neto=0;
      $totalneto=0;
      $con=0;
      if(!$tb2->EOF)
      {
      	$con++;
        $ref=$tb2->fields["codemp"];
        $cat=$tb2->fields["codcat"];
        $contador=$contador+1;
        $this->setFont("Arial","B",8);
        $this->cell(80,5,$tb2->fields["codcat"].' '.strtoupper($tb2->fields["nomcat"]));
        $nomcat=$tb2->fields["nomcat"];
        $this->ln(5);
        $this->line(10,$this->getY(),200,$this->getY());
        $this->ln(2);
        $this->SetFillColor(195,195,195);
        $this->cell(20,3,'Cedula',0,0,'',1);
        $this->cell(70,3,'Apellidos y Nombres ',0,0,'',1);
        $this->cell(20,3,'Fecha Ingreso',0,0,'',1);
        $this->cell(30,3,'C.Cargo',0,0,'',1);
        $this->cell(50,3,'Descripcion del Cargo',0,0,'',1);
        $this->SetFillColor(0,0,0);
        $this->ln(4);
        $this->line(10,$this->getY(),200,$this->getY());
        $this->setFont("Arial","",8);
        $this->cell(20,5,$tb2->fields["codemp"]);
        $this->cell(70,5,$tb2->fields["nomemp"]);
        $this->cell(20,5,$tb2->fields["fecing"]);
        $this->cell(30,5,$tb2->fields["codcar"]);
        $this->cell(50,5,$tb2->fields["nomcar"]);
          $nom=ucwords($tb2->fields["nomemp"]);
        $this->ln(5);
        //$this->line(10,$this->getY(),200,$this->getY());
        $this->setFont("Arial","BU",8);
        $this->cell(20,5,'Codigo');
        $this->cell(85,5,'Nombre del Concepto');
        $this->cell(30,5,'Asignaciones');
        $this->cell(30,5,'Deducciones');
       //  $this->cell(30,5,'Aporte');
        $this->ln(4);
        //$this->line(10,$this->getY(),200,$this->getY());
      }

      while(!$tb->EOF)
      {
        if($tb->fields["codemp"]!=$ref)
        {
        $this->setFont("Arial","B",8);
        $this->ln(2);
        $this->line(100,$this->getY(),200,$this->getY());
        //totales
        $cont=$cont+1;
        $this->cell(20,5,'');
        $this->cell(65,5,'Totales Bs.',0,0,'R');
//         $this->cell(10,5,'');
        $this->cell(30,5,number_format($acum1,2,',','.'),0,0,'R');
        $this->cell(30,5,number_format($acum2,2,',','.'),0,0,'R');
      //   $this->cell(27,5,number_format($acum3,2,',','.'),0,0,'R');
        $totacum1=$totacum1+$acum1;
        $totacum2=$totacum2+$acum2;
      //   $totacum3=$totacum3+$acum3;
        $this->ln(4);
        $this->cell(20,5,'');
        $this->cell(65,5,'Neto a Cobrar Bs.',0,0,'R');
        //$this->cell(10,3,'');
        $this->SetFillColor(195,195,195);
        $this->cell(30,3,number_format(($acum1-$acum2),2,',','.'),0,0,'R',1);
        $neto=$neto+$acum1-$acum2;
        $this->SetFillColor(0,0,0);
        $this->cell(30,5,'');
        $this->ln(5);
         $this->ln(6);
		 $this->cell(150,5,'RECIBI CONFORME: ',0,0,'R');
		 $this->setFont("Arial","BU",8);
		 $this->cell(50,5,'                                             					 ');
		 $this->setFont("Arial","B",8);
		 $this->ln(3);
		 $this->cell(190,5,$nom,0,0,'R');
		 $this->ln(7);
        $acum1=0;
        $acum2=0;

        // $acum3=0;
        //
        if($tb->fields["codcat"]!=$cat)
        {
          $this->line(10,$this->getY(),200,$this->getY());
          $this->cell(85,5,'TOTAL:  '.ucwords($nomcat));
          $this->cell(30,5,number_format($totacum1,2,',','.'),0,0,'R');
          $this->cell(30,5,number_format($totacum2,2,',','.'),0,0,'R');
          $this->cell(27,5,number_format($totacum1-$totacum2,2,',','.'),0,0,'R');
          $total1=$total1+$totacum1;
          $total2=$total2+$totacum2;
      //    $total3=$total3+$totacum3;
          $totacum1=0;
          $totacum2=0;
      //     $totacum3=0;
          //
          $acumulado=0;
          $this->ln(4);
          $this->line(10,$this->getY(),200,$this->getY());
          $this->cell(110,5,'CANTIDAD DE TRABAJADORES: '.$cont);
          $cont=0;
          //$this->cell(50,5,'TOTAL A PAGAR: '.number_format($neto,2,',','.'));
          $totalneto=$totalneto+$neto;
          $neto=0;
          $this->ln(4);
          $this->line(10,$this->getY(),200,$this->getY());
          $this->ln(8);
          $this->cell(80,5,$tb->fields["codcat"].' '.strtoupper($tb->fields["nomcat"]));
          $nomcat=$tb->fields["nomcat"];
          $this->ln(5);
        }
        if ($con>2 or $this->posicion>150){
				 	$this->AddPage();
				 	$con=0;
				 }
        $this->line(10,$this->getY(),200,$this->getY());
        $this->ln(2);
        $cat=$tb->fields["codcat"];
        $this->SetFillColor(195,195,195);
        $this->cell(20,3,'Cedula',0,0,'',1);
        $this->cell(70,3,'Apellidos y Nombres',0,0,'',1);
        $this->cell(20,3,'Fecha Ingreso',0,0,'',1);
        $this->cell(30,3,'C.Cargo',0,0,'',1);
        $this->cell(50,3,'Descripcion del Cargo',0,0,'',1);
        $this->SetFillColor(0,0,0);
        $this->ln(4);
        $this->line(10,$this->getY(),200,$this->getY());
        $this->setFont("Arial","",8);
        $this->cell(20,5,$tb->fields["codemp"]);
        $this->cell(70,5,$tb->fields["nomemp"]);
        $this->cell(20,5,$tb->fields["fecing"]);
        $this->cell(30,5,$tb->fields["codcar"]);
        $this->cell(50,5,$tb->fields["nomcar"]);
          $nom=ucwords($tb2->fields["nomemp"]);
        $this->ln(5);
        //$this->line(10,$this->getY(),200,$this->getY());
        $this->setFont("Arial","BU",8);
        $this->cell(20,5,'Codigo');
        $this->cell(85,5,'Nombre del Concepto');
        $this->cell(30,5,'Asignaciones');
        $this->cell(30,5,'Deducciones');
      //  $this->cell(30,5,'Aporte');
        $this->ln(4);
        //$this->line(10,$this->getY(),200,$this->getY());
        $contador=$contador + 1;
        $con++;

        } //end If

        if ($tb->fields["asigna"]!=0 || $tb->fields["deduc"]!=0){
          $this->setFont("Arial","",8);
          $this->cell(20,5,$tb->fields["codcon"]);
           $this->posicion=$this->gety();
          $x=$this->GetX();
          $this->cell(75,5,$tb->fields["nomcon"]);
          $this->cell(30,5,number_format($tb->fields["asigna"],2,',','.'),0,0,'R');
          $acum1=$acum1+$tb->fields["asigna"];
          $this->cell(30,5,number_format($tb->fields["deduc"],2,',','.'),0,0,'R');
          $acum2=$acum2+$tb->fields["deduc"];
              $this->ln(3);
        }

        $ref=$tb->fields["codemp"];
        $tb->MoveNext();


      }//end While
        $this->setFont("Arial","B",8);
        $this->ln(2);
        $this->line(100,$this->getY(),200,$this->getY());

        //totales
        $this->cell(20,5,'');
        $this->cell(65,5,'Totales Bs.',0,0,'R');
//         $this->cell(10,5,' ');
        $this->cell(30,5,number_format($acum1,2,',','.'),0,0,'R');
        $this->cell(30,5,number_format($acum2,2,',','.'),0,0,'R');
        // $this->cell(27,5,number_format($acum3,2,',','.'),0,0,'R');
        $totacum1=$totacum1+$acum1;
        $totacum2=$totacum2+$acum2;
      //   $totacum3=$totacum3+$acum3;
        $this->ln(4);
        $this->cell(20,5,'');
        $this->cell(65,5,'Neto a Cobrar Bs.',0,0,'R');

//         $this->cell(10,3,'');
        $this->SetFillColor(195,195,195);
        $this->cell(30,3,number_format(($acum1-$acum2),2,',','.'),0,0,'',1);
        $neto=$neto+($acum1-$acum2);
        $this->SetFillColor(0,0,0);
        $this->cell(30,5,'');
        $this->ln(5);
         $this->ln(6);
		 $this->cell(150,5,'RECIBI CONFORME: ',0,0,'R');
		 $this->setFont("Arial","BU",8);
		 $this->cell(50,5,'                                             					 ');
		 $this->setFont("Arial","B",8);
		 $this->ln(3);
		 $this->cell(190,5,$nom,0,0,'R');
		 $this->ln(7);
        $this->line(10,$this->getY(),200,$this->getY());
        $this->cell(85,5,'');
        $this->cell(30,5,number_format($totacum1,2,',','.'),0,0,'R');
        $acum1=0;
        $this->cell(30,5,number_format($totacum2,2,',','.'),0,0,'R');
          $this->cell(30,5,number_format($totacum1-$totacum2,2,',','.'),0,0,'R');

        $this->setx(10);
        $this->multicell(85,5,'TOTAL:   '.$nomcat);
        $acum2=0;
        // $this->cell(27,5,number_format($totacum3,2,',','.'),0,0,'R');
        $total1=$total1+$totacum1;
        $total2=$total2+$totacum2;
        // $total3=$total3+$totacum3;
        $totacum1=0;
        $totacum2=0;
        // $totacum3=0;
        $this->ln(4);
        $this->line(10,$this->getY(),200,$this->getY());
        $this->cell(110,5,'CANTIDAD DE TRABAJADORES: '.($cont+1));
        $cont=0;
        //$this->cell(50,5,'TOTAL A PAGAR: '.number_format($neto,2,',','.'));
        $totalneto=$totalneto+$neto;
        //$neto=0;
        $this->ln(4);
        $this->line(10,$this->getY(),200,$this->getY());
        $this->ln(8);
        $this->cell(85,5,'TOTAL NOMINA:  '.$this->nombre);
        $this->cell(30,5,number_format($total1,2,',','.'),0,0,'R');
        $acum1=0;
        $this->cell(30,5,number_format($total2,2,',','.'),0,0,'R');
        $acum2=0;
        $this->cell(27,5,number_format($total1-$total2,2,',','.'),0,0,'R');
        $this->ln(4);
        $this->line(10,$this->getY(),200,$this->getY());
        $this->cell(110,5,'TOTAL DE TRABAJADORES: '.($contador));

        //$this->cell(50,5,'TOTAL A PAGAR: '.number_format($totalneto,2,',','.'));
        $this->ln(4);
        $this->line(10,$this->getY(),200,$this->getY());
        $this->ln(5);
        $this->setFont("Arial","BU",8);
        $this->cell(150,5,$this->elaborado);
        $this->cell(50,5,$this->revisado);
        $this->ln(3);
        $this->setFont("Arial","B",8);
        $this->cell(150,5,'            Elaborado Por');
        $this->cell(50,5,'              Revisado Por');
        $this->ln(3);
        $this->setFont("Arial","BU",8);
        $this->cell(110,5,$this->autorizado,0,0,'R');
        $this->ln(3);
        $this->setFont("Arial","B",8);
        $this->cell(110,5,'Autorizado Por            ',0,0,'R');
        //
    }
  }
?>