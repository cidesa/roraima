<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/Cabecera.php");
  require_once("../../lib/general/Herramientas.class.php");
  require_once("../../lib/modelo/sqls/nomina/Nprhisnomdef.class.php");

  class pdfreporte extends fpdf
  {

    function pdfreporte()
    {
      $this->fpdf("p","mm","Letter");
      $this->cabe='s';
      $this->index=0;
      $this->codempdes= H::GetPost('codempdes');
      $this->codemphas= H::GetPost('codemphas');
      $this->codcardes= H::GetPost('codcardes');
      $this->codcarhas= H::GetPost('codcarhas');
      $this->tipnomdes= H::GetPost('codnomdes');
      $this->tipnomhas= H::GetPost('codnomhas');
      $this->codcondes= H::GetPost('codcondes');
      $this->codconhas= H::GetPost('codconhas');
      $this->pernomdes= H::GetPost('pernomdes');
      $this->pernomhas= H::GetPost('pernomhas');
      $this->especial = H::GetPost('especial');
      $this->codnomesp = H::GetPost('tipnomesp');
      $this->autorizado = H::GetPost('autpor');
      $this->revisado = H::GetPost('revpor');
      $this->elaborado = H::GetPost('elapor');

      $this->objNprhisnomdef = new Nprhisnomdef();
      $this->arrp = $this->objNprhisnomdef->SQLp($this->codempdes,$this->codemphas,$this->tipnomdes,$this->tipnomhas,$this->codcardes,$this->codcarhas,$this->especial,$this->codnomesp,$this->codcondes,$this->codconhas,$this->pernomdes,$this->pernomhas);

      $this->setAutoPageBreak(true,40);

    }

    function Header()
    {
      $this->SetTextColor(0,0,0);
      $this->getCabecera(H::GetPost("titulo"),"");
      $this->setFont("Arial","B",9);
      /*if ($this->cabe=='s')
      {*/
      $i=$this->index;
      $y=40;
      $this->SetTextColor(0,0,0);$this->texto(15,$y,"NOMINA:");
      $this->setTextColor(0,0,155);$this->texto(35,$y,$this->arrp[$i]["codnom"]."   ".$this->arrp[$i]["nomnom"]);
      $this->SetTextColor(0,0,0);$this->texto(15,$y,"NOMINA:");
      $this->texto(15,$y,"NOMINA:");
      if ($this->especial!='S')
      {
        $this->texto(140,$y,"Periodo del:  ".date('d/m/Y',strtotime($this->arrp[$i]["ultfec"]))."  al  ".date('d/m/Y',strtotime($this->arrp[$i]["profec"])));
      }else
      {
        $this->arrnomesp = $this->objNprhisnomdef->SQLnpnomesptipos($this->especial);
        $this->texto(140,$y,"Periodo del:  ".date('d/m/Y',strtotime($this->arrnomesp[$i]["fechadel"]))."  al  ".date('d/m/Y',strtotime($this->arrnomesp[$i]["fechahas"])));
      }
      //}
      $this->line(10,45,200,45);
      $this->setY(50);
    }

    function Cuerpo()
    {
       //DETALLE DE EMPLEADOS POR NOMINA
      $i=0;
      $this->setFont("Arial","",7);
      $this->setFillColor(200,200,200);
      $this->setX(15);$this->cell(15,5,$this->arrp[$i]["cedemp"],0,0,'C',1);
      $this->setX($this->GetX()+2);$this->cell(70,5,$this->arrp[$i]["nomemp"],0,0,'C',1);
      $this->setFont("Arial","B",7);
      $this->setX($this->GetX()+5);$this->cell(15,5,"CARGO:  ");
      $this->setFont("Arial","",7);
      $this->setX($this->GetX()+5);$this->cell(50,5,$this->arrp[$i]["codcar"]."    ".$this->arrp[$i]["nomcar"]);
      $this->ln();
      $this->setFont("Arial","B",7);
      $this->setX(15);$this->cell(25,5,"Fecha de Ingreso:  ");
      $this->setFont("Arial","",7);
      $this->setX($this->GetX()+3);$this->cell(15,5,date("d/m/Y",strtotime($this->arrp[$i]["fecing"])));
      $this->setFont("Arial","B",7);
      $this->setX(125);$this->cell(15,5,"SUELDO:  ");
      $this->setFont("Arial","",7);
      $this->arrconsue = $this->objNprhisnomdef->SQLnpconsueldo($this->arrp[$i]["codemp"],$this->arrp[$i]["codcar"],$this->arrp[$i]["codnom"]);
      $this->setX($this->GetX()+5);$this->cell(15,5,H::FormatoMonto($this->arrconsue[$i]["sueldo"]));
      $this->ln();
      $this->setFont("Arial","B",7);
      $this->setX(15);$this->cell(25,5,"Centro de Pago:  ");
      $this->setFont("Arial","",7);
      $this->setX($this->GetX()+3);$this->cell(80,5,$this->arrp[$i]["nomban"]);
      $this->setFont("Arial","B",7);
      $this->setX(125);$this->cell(25,5,"Cuenta Bancaria:  ");
      $this->setFont("Arial","",7);
      $this->setX($this->GetX()+3);$this->cell(80,5,$this->arrp[$i]["cuenta_banco"]);
      $this->ln();
      $this->line(10,$this->GetY(),200,$this->GetY());
      $this->line(10,$this->GetY()+7,200,$this->GetY()+7);
      $this->setFont("Arial","B",7);
      $this->ln(1);
      $this->setX(15);
      $this->cell(15,4,"Código");
      $this->cell(95,4,"Nombre de Concepto");
      $this->cell(30,4,"Asignacion");
      $this->cell(30,4,"Deduccion");
      $this->cell(30,4,"Saldo");
      $this->ln(4);
      $this->setFont("Arial","",6);
      //POR NOMINA
      $tempcodnom = $this->arrp[0]["codnom"];
      $tempcodemp = $this->arrp[0]["codemp"];
      $tot_asigna=0;
      $tot_deduc=0;
      $canemp=1;
      $cs_asigna=0;
      $cs_deduc=0;
      for ($i=0;$i<count($this->arrp);$i++)
      {

        if ($tempcodemp!=$this->arrp[$i]["codemp"] || $tempcodnom!=$this->arrp[$i]["codnom"])
        {
          $tot_asigna=$tot_asigna + $cs_asigna;
          $tot_deduc=$tot_deduc + $cs_deduc;
          $this->setFont("Arial","B",6);
          $this->ln(5);
          $this->setX(115);
          $this->setAutoPageBreak(false);
          $this->cell(30,4,"TOTAL                        ".H::FormatoMonto($cs_asigna),0,0,'R');
          $this->cell(28,4,H::FormatoMonto($cs_deduc),0,0,'R');
          $this->line(122,$this->GetY()-1,145,$this->GetY()-1);
          $this->line(150,$this->GetY()-1,173,$this->GetY()-1);
          $this->line(178,$this->GetY()-1,200,$this->GetY()-1);
          $this->ln();
          $this->texto(114,$this->GetY(),"NETO");
          $this->texto($this->GetX()+12.2,$this->GetY(),H::FormatoMonto($cs_asigna-$cs_deduc)."   ",'J',0,1);
          $this->setAutoPageBreak(true,40);
          $canemp++;
          if ($tempcodnom!=$this->arrp[$i]["codnom"])
          {
            $this->setFont("Arial","B",7);
            $this->ln(12);
            $this->rect(10,$this->getY()-2,200,12);
            $this->cell(60,4,"TOTAL    ".strtoupper($this->arrp[$i]["nomnom"]));
            $this->ln(4);
            $this->cell(100,4,"TOTAL DE TRABAJADORES EN LA NOMINA   ".$canemp);
            $y1=$this->GetY()-5;
            $this->setXY(125,$y1);
            $this->multicell(25,4,'Asignacion
            '.H::FormatoMonto($tot_asigna),0,'C',0);
            $this->setXY(150,$y1);
            $this->multicell(25,4,'Deduciones
            '.H::FormatoMonto($tot_deduc),0,'C',0);
            $this->setXY(175,$y1);
            $this->multicell(25,4,'Saldo
            '.H::FormatoMonto($tot_asigna-$tot_deduc),0,'C',0);
            $this->index=$i;
            $this->AddPage();
            $tot_asigna=0;
            $tot_deduc=0;
            $canemp=0;

          }else
          {
            $this->ln(8);
            if ($this->GetY()>210)
            { $this->AddPage();}
            else
                $this->line(10,$this->GetY()-2,200,$this->GetY()-2);
          }
          ////////////FIN DETALLE EMPLEADO///////////////


        //  $this->setAutoPageBreak(false);
          //DETALLE DE EMPLEADOS POR NOMINA
           /*if ($this->GetY()>210){
            $this->AddPage();
          }else*/

          $this->setFont("Arial","",7);
          $this->setFillColor(200,200,200);
          $this->setX(15);$this->cell(15,5,$this->arrp[$i]["cedemp"],0,0,'C',1);
          $this->setX($this->GetX()+2);$this->cell(70,5,$this->arrp[$i]["nomemp"],0,0,'C',1);
          $this->setFont("Arial","B",7);
          $this->setX($this->GetX()+5);$this->cell(15,5,"CARGO:  ");
          $this->setFont("Arial","",7);
          $this->setX($this->GetX()+5);$this->cell(50,5,$this->arrp[$i]["codcar"]."    ".$this->arrp[$i]["nomcar"]);
          $this->ln();
          $this->setFont("Arial","B",7);
          $this->setX(15);$this->cell(25,5,"Fecha de Ingreso:  ");
          $this->setFont("Arial","",7);
          $this->setX($this->GetX()+3);$this->cell(15,5,date("d/m/Y",strtotime($this->arrp[$i]["fecing"])));
          $this->setFont("Arial","B",7);
          $this->setX(125);$this->cell(15,5,"SUELDO:  ");
          $this->setFont("Arial","",7);
          $this->arrconsue = $this->objNprhisnomdef->SQLnpconsueldo($this->arrp[$i]["codemp"],$this->arrp[$i]["codcar"],$this->arrp[$i]["codnom"]);
          $this->setX($this->GetX()+5);$this->cell(15,5,H::FormatoMonto($this->arrconsue[$i]["sueldo"]));
          $this->ln();
          $this->setFont("Arial","B",7);
          $this->setX(15);$this->cell(25,5,"Centro de Pago:  ");
          $this->setFont("Arial","",7);
          $this->setX($this->GetX()+3);$this->cell(80,5,$this->arrp[$i]["nomban"]);
          $this->setFont("Arial","B",7);
          $this->setX(125);$this->cell(25,5,"Cuenta Bancaria:  ");
          $this->setFont("Arial","",7);
          $this->setX($this->GetX()+3);$this->cell(80,5,$this->arrp[$i]["cuenta_banco"]);
          $this->ln();
          $this->line(10,$this->GetY(),200,$this->GetY());
          $this->line(10,$this->GetY()+7,200,$this->GetY()+7);
          $this->setFont("Arial","B",7);
          $this->ln(1);
          $this->setX(15);
          $this->cell(15,4,"Código");
          $this->cell(95,4,"Nombre de Concepto");
          $this->cell(30,4,"Asignacion");
          $this->cell(30,4,"Deduccion");
          $this->cell(30,4,"Saldo");
          $cs_asigna=0;
          $cs_deduc=0;
          $this->ln(4);

        }
        $this->setFont("Arial","",6);
        //DETALLE DE CONCEPTO POR EMPLEADO
        $this->ln(4);
        $this->setX(17);
        if ($this->arrp[$i]["asigna"]!=0 || $this->arrp[$i]["deduc"]!=0)
        {
          $this->cell(15,4,$this->arrp[$i]["codcon"]);
          $this->cell(80,4,$this->arrp[$i]["nomcon"]);
          if ($this->arrp[$i]["asigna"]!=0)
            $this->cell(30,4,H::FormatoMonto($this->arrp[$i]["asigna"]),0,0,'R');
          else
              $this->cell(30,4,'',0,0,'R');
          if ($this->arrp[$i]["deduc"]!=0)
            $this->cell(30,4,H::FormatoMonto($this->arrp[$i]["deduc"]),0,0,'R');
          else
            $this->cell(30,4,'',0,0,'R');
          $cs_asigna= $cs_asigna + $this->arrp[$i]["asigna"];
          $cs_deduc= $cs_deduc + $this->arrp[$i]["deduc"];
          //CALCULO DE PRESTAMO
          $arrasicon= $this->objNprhisnomdef->SQLnpasiconemp($this->arrp[$i]["codemp"],$this->arrp[$i]["codcar"],$this->arrp[$i]["codcon"]);
          $acumulado= $arrasicon[0]["saldo"];
          $arrtippre= $this->objNprhisnomdef->SQLnptippre($this->arrp[$i]["codcon"]);
          $tipoprestamo = $arrtippre[0]["tippre"];
          if (is_null($tipoprestamo))
            $saldoprestamo = 0;
          else
            $saldoprestamo = $acumulado;
          if ($saldoprestamo!=0)
            $this->cell(25,4,H::FormatoMonto($saldoprestamo),0,0,'R');
         // $this->setAutoPageBreak(true,25);

          /* if ($this->GetY()>230){
            $this->AddPage();
          }*/

          /////FIN CALCULO/////
        }

        ///////////////FIN DETALLE CONCEPTO////////////////////////////////////

        //////////FIN NOMINA
        $tempcodnom = $this->arrp[$i]["codnom"];
        $tempcodemp = $this->arrp[$i]["codemp"];
      }

      $this->setFont("Arial","B",6);
      $this->ln(5);
      $this->setX(115);
      $this->cell(30,4,"TOTAL                        ".H::FormatoMonto($cs_asigna),0,0,'R');
      $this->cell(28,4,H::FormatoMonto($cs_deduc),0,0,'R');
      $this->line(122,$this->GetY()-1,145,$this->GetY()-1);
      $this->line(150,$this->GetY()-1,173,$this->GetY()-1);
      $this->line(178,$this->GetY()-1,200,$this->GetY()-1);
      $this->ln();
      $this->texto(114,$this->GetY(),"NETO");
      $this->texto($this->GetX()+12.2,$this->GetY(),H::FormatoMonto($cs_asigna-$cs_deduc)."   ",'J',0,1);

      $this->setFont("Arial","B",7);
      $this->ln(12);
      $this->rect(10,$this->getY()-2,200,12);
      $this->cell(60,4,"TOTAL    ".strtoupper($this->arrp[$i]["nomnom"]));
      $this->ln(4);
      $this->cell(100,4,"TOTAL DE TRABAJADORES EN LA NOMINA   ".$canemp);
      $y1=$this->GetY()-5;
      $this->setXY(125,$y1);
      $this->multicell(25,4,'Asignacion
      '.H::FormatoMonto($tot_asigna),0,'C',0);
      $this->setXY(150,$y1);
      $this->multicell(25,4,'Deduciones
      '.H::FormatoMonto($tot_deduc),0,'C',0);
      $this->setXY(175,$y1);
      $this->multicell(25,4,'Saldo
      '.H::FormatoMonto($tot_asigna-$tot_deduc),0,'C',0);


      //PIE DE PAGINA
      $this->line(15,$this->GetY()+15,50,$this->GetY()+15);
      $this->line(80,$this->GetY()+15,115,$this->GetY()+15);
      $this->line(150,$this->GetY()+15,185,$this->GetY()+15);
      $this->setXY(7,$this->GetY()+15);
      $this->cell(50,4,$this->elaborado,0,0,'C');
      $this->setXY(73,$this->GetY());
      $this->cell(50,4,$this->revisado,0,0,'C');
      $this->setXY(142,$this->GetY());
      $this->cell(50,4,$this->autorizado,0,0,'C');
      $this->setXY(7,$this->GetY()+4);
      $this->cell(50,4,'Elaborado',0,0,'C');
      $this->setXY(73,$this->GetY());
      $this->cell(50,4,'Revisado',0,0,'C');
      $this->setXY(142,$this->GetY());
      $this->cell(50,4,'Autorizado',0,0,'C');

    }

  }
