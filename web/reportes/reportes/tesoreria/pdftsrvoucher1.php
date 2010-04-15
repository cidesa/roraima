<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/Cabecera.php");
  require_once("../../lib/general/funciones.php");
  require_once("../../lib/general/Herramientas.class.php");
  require_once("../../lib/modelo/sqls/tesoreria/Tsrvoucher1.class.php");

  class pdfreporte extends fpdf
  {

    var $bd;
    var $titulos;
    var $titulos2;
    var $anchos;
    var $anchos2;
    var $campos;
    var $sql;
    var $sql1;
    var $sql1b;
    var $sql1c;
    var $sql2;
    var $sql3;
    var $sqlb;
    var $che1;
    var $che2;
    var $hecho;
    var $revi;
    var $conta;
    var $audi;
    var $mes;
    var $ano;
    var $apro;
    var $ela;
    var $cod1;
    var $cod2;
    var $deb;
    var $cre;
    var $status;
    var $auxd=0;
    var $car;
    var $acumsalant=0;
    var $acumdeb=0;
    var $acumlib=0;
    var $acumban=0;
    var $acumlib2=0;
    var $acumban2=0;
    var $sal=0;
    var $fecha;

    function pdfreporte()
    {
      $this->fpdf("p","mm","Letter");
      //$this->bd=new basedatosAdo();
      $this->bd=new Tsrvoucher1();
      $this->titulos=array();
      $this->titulos2=array();
      $this->campos=array();
      $this->anchos=array();
      $this->anchos2=array();
      $this->numchedes=str_replace('*',' ',H::GetPost("numchedes"));
      $this->numchehas=str_replace('*',' ',H::GetPost("numchehas"));
      $this->hecho=str_replace('*',' ',H::GetPost("hecho"));
      $this->revi=str_replace('*',' ',H::GetPost("revi"));
      $this->auto=str_replace('*',' ',H::GetPost("auto"));
      $this->conta=str_replace('*',' ',H::GetPost("conta"));


      $this->arrp=$this->bd->sqlp($this->numchedes,$this->numchehas);
      $this->arrp2=$this->bd->sqlp2($this->numchedes,$this->numchehas);
      $this->arrp3=$this->bd->sqlpx($this->numchedes,$this->numchehas);
      $this->llenartitulosmaestro();

    }

    function llenartitulosmaestro()
    {
        $this->titulos[0]="";
        $this->titulos[1]="Cuenta";
        $this->titulos[2]="Uso";
        $this->titulos[3]="Saldo Anterior";
        $this->titulos[4]="Débitos";
        $this->titulos[5]="Créditos";
        $this->titulos[6]="Saldo Segun Libros";

    }

    function Header()
    {
      //$this->Image("../../img/logo_1.jpg",185,8,18);
      //$this->Rect(5,5,184,83);
      //  $this->line(5,3,10,3);
        //$this->line(5,3,5,8);
      $this->setFont("Arial","B",10);
      $ncampos=count($this->titulos);
      $ncampos2=count($this->titulos2);

          $this->line(10,220,200,220);
            $this->line(10,215,200,215);
            $this->SetXY(10,215);
          $this->cell(30,5,"REALIZADO POR:");
          $this->SetXY(10,185);
          $this->cell(47,5,$this->hecho);
            $this->line(10,215,10,225);
            $this->SetXY(59,215);
          $this->cell(30,5,"REVISADO POR:");
          $this->SetXY(59,185);
          $this->cell(47,5,$this->revi);
            $this->line(58.75,215,58.75,225);
            $this->SetXY(108,215);
          $this->cell(30,5,"AUTORIZADO POR:");
          $this->SetXY(108,185);
          $this->cell(47,5,$this->auto);
            $this->line(107.5,215,107.5,225);
            $this->SetXY(157,215);
          $this->cell(30,5,"CONTABILIDAD:");
          $this->SetXY(157,185);
          $this->cell(47,5,$this->conta);
            $this->line(156.25,215,156.25,225);
            $this->line(200,215,200,225);
            $this->line(10,225,200,225);

          $this->setFont("Arial","B",9);
            $this->SetXY(97.5,230);
          $this->cell(30,5,"RECIBÍ CONFORME:");
          $this->SetXY(97.5,235);
          $this->cell(30,5,"NOMBRE Y APELLIDO:");
          $this->SetXY(97.5,240);
          $this->cell(30,5,"_____________________________________");
          $this->SetXY(97.5,245);
          $this->cell(30,5,"C.I.                         RIF.    ");
          $this->SetXY(97.5,250);
          $this->cell(30,5,"FIRMA Y/O SELLO");
    }

    function Cuerpo()
    {
      $this->setFont("Arial","B",9);
      $i=0;
      $a=0;
      $b=0;
      $cont=0;

      //------------------------------------------------------------------------------------------------
      foreach($this->arrp as $cheque)//while
      {
        $this->acumdebcre=0;
        $this->acumhabcre=0;
          $this->numcom=$cheque["numcom"];
        $this->setFont("Arial","B",9);
        $this->SetXY(140,8);
        $this->cell(30,2,str_pad($cheque["monchestr"], 20, "*", STR_PAD_LEFT));
        $this->setFont("Arial","",10);
        $this->SetXY(30,22);
        $this->cell(130,5,'***'.strtoupper($cheque["nomben"]).'***'.'       '.$cheque["cedrif"]);
        $this->SetXY(40,29);
        $this->MultiCell(130,5,(str_pad(H::obtenermontoescrito($cheque["monche"]),100," ",STR_PAD_RIGHT)).'--------------');
        $this->setFont("Arial","",9);
        $this->SetXY(15,41);
        $this->cell(30,5,"CARACAS,   ");
        $this->cell(30,5,$cheque["dia"]."/".$cheque["mes"]);
        $this->cell(20,5,"       ".$cheque["ano"]);
        $this->SetXY(20,48);
        //$this->cell(10,5,'CADUCA A LOS 90 DIAS');
        $this->SetXY(40,72);
        //$this->MultiCell(130,5,strtoupper($cheque["desord"]),0,'',0);
        $y1=$this->GetY();
          $cheques["numcom"]=$cheque["numcom"];
        $this->SetXY(20,85);
        $this->cell(180,5,'COMPROBANTE DE EGRESO',0,0,'C');
        $this->line(10,90,200,90);
        $this->SetXY(10,90);
        //  $this->cell(30,5,"BANCO:");
                  $this->line(75,90,75,95);
                    $this->SetXY(75,90);
                    $this->cell(30,5,"CUENTA Nº:");
                  $this->line(140,90,140,95);
                    $this->SetXY(140,90);
                    $this->cell(30,5,"CHEQUE:");
        $this->line(10,95,200,95);
        $this->SetXY(10,95);
          $this->cell(30,5,"ORDENES(ES) DE PAGO(S) Nº:");
        $this->line(10,100,200,100);
        $this->SetXY(10,100);
          $this->cell(30,5,"BENEFICIARIO:");
        $this->line(10,95,200,95);
        $this->SetXY(10,105);
          $this->cell(30,5,"CONCEPTO:");
        $this->line(10,115,200,115);
        $this->line(10,105,200,105);


        $this->line(10,90,10,115);
        $this->line(200,90,200,115);

        $y1=122;
        foreach($this->arrp2 as $cheques)
              {
          if($cheques["numcom"]==$cheque["numcom"])
          {
          $this->setFont("Arial","",9);
          $this->SetXY(10,$y1+10);
          $this->line(10,$y1+10,200,$y1+10);
          $this->Cell(80,5,strtoupper($cheques["codcta"]),0,0,'');
          $this->SetX(55);
          $this->MultiCell(70,5,strtoupper($cheques["desasi"]),0,'',0);
          if($cheques["debcre"]=='D')
          {
            $this->SetXY(130,$y1+10);
        //    $this->Cell(40,5,strtoupper($cheques["monasi"]),0,0,'C');
              $this->cell(40,5,number_format($cheques["monasi"],2,'.',','),0,0,'C');
            $this->acumdebcre=$this->acumdebcre+strtoupper($cheques["monasi"]);
          }
          else
          {
            $this->SetXY(170,$y1+10);
            $this->Cell(40,5,number_format($cheques["monasi"],2,'.',','),0,0,'C');
            //$this->cell(40,5,number_format($cheques["monasi"]),0,0,'C');
            $this->acumhabcre=$this->acumhabcre+strtoupper($cheques["monasi"]);
          }
          $a++;
          $this->ln();
          $y1=$this->GetY()-5;
          }
            }

            //DIBUJO DEL DETALLE

            $this->line(10,127,200,127);
              $this->line(10,132,200,132);
                     $this->SetXY(10,127);
          $this->cell(47,5,"CÓDIGO DE CUENTA");
            $this->line(10,127,10,137+($a*10));
            $this->line(55,127,55,137+($a*10));
              $this->SetXY(55,127);
          $this->cell(47,5,"DESCRIPCIÓN");
            $this->line(130,127,130,137+($a*10));
              $this->SetXY(130,127);
          $this->cell(47,5,"DÉBITO");
            $this->line(170,127,170,137+($a*10));
              $this->SetXY(170,127);
          $this->cell(47,5,"CRÉDITO");
            $this->line(200,127,200,137+($a*10));
            $this->line(10,137+($a*10),200,137+($a*10));

            $this->SetXY(170,138+($a*10));
            //$this->celda(93,'',number_format($tb3->fields["valor"],2,'.',','),0,0,'R');
              $this->cell(40,5,number_format($this->acumhabcre,2,'.',','),0,0,'C');

              $this->SetXY(130,138+($a*10));
                $this->cell(40,5,number_format($this->acumdebcre,2,'.',','),0,0,'C');

            $this->line(130,142+($a*10),200,142+($a*10));
            $this->line(130,137+($a*10),130,142+($a*10));
            $this->line(170,137+($a*10),170,142+($a*10));
            $this->line(200,137+($a*10),200,142+($a*10));

          $this->line(170,147+($a*10),200,147+($a*10));
          $this->line(170,152+($a*10),200,152+($a*10));

            $this->line(170,147+($a*10),170,152+($a*10));
            $this->line(200,147+($a*10),200,152+($a*10));

        $this->SetXY(125,147+($a*10));
        $this->cell(40,5,trim("TOTAL IMPORTE A PAGAR"),0,0,'L');
        $this->SetXY(170,148+($a*10));
        $this->cell(30,2,str_pad($cheque["monchestr"], 20, "*", STR_PAD_LEFT));
          $a=0;

        $cont=0;
        $y2=$this->GetY();
        $this->setFont("Arial","",9);
        $this->SetXY(10,90);
        $this->cell(40,5,trim("BANCO DEL TESORO"),0,0,'C');
        $this->SetXY(93,90);
        $this->cell(40,5,trim($cheque["numcue"]),0,0,'R');
        $this->SetXY(150,90);
        $this->cell(30,5,trim($cheque["numche"]),0,0,'R');
        $this->SetXY(60,95);
      //  $this->cell(130,5,strtoupper($cheque["numord"]));
        $this->SetXY(40,100);
        $this->cell(130,5,strtoupper($cheque["nomben"]).'       '.$cheque["cedrif"]);
        $this->SetXY(70,100);
        //$this->MultiCell(130,5,strtoupper($cheque["desord"]),0,'',0);
        $op["numche"]=$cheque["numche"];

        $y3=$y2;
        $yy=67;
        //$this->SetXY(20,$yy+18);
        //$this->MultiCell(150,5,strtoupper($this->arrp3["descon"]),0,'J',0);
        $vv=0;
        foreach ($this->arrp3 as $op)
              {

        if($cheque["numche"]==$op["numche"])
        {
        if($vv==0)
        {
          //$this->SetXY(20,$yy+18);
          $this->SetXY(30,105);
          $this->MultiCell(150,5,strtoupper($op["deslib"]),0,'J',0);
        }
        $yy=$this->GetY();
        $this->SetXY(20,$y3+35);
        $this->cell(30,5,'');
        $this->cell(40,5,'');
        $this->cell(40,5,'');
        $this->SetXY(45,95);
        $this->cell(30,5,trim($op["numord"]),0,0,'R');
        $b++;
        $vv++;
        $y3=$this->GetY()-10;

        }
              }
        $i++;

        if($i < count($this->arrp))
        {
          $this->AddPage();
        }

      }
    }
  }
?>
