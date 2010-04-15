<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/Cabecera.php");
  require_once("../../lib/general/Herramientas.class.php");
  require_once("../../lib/modelo/sqls/nomina/Nprnompre.class.php");

  class pdfreporte extends fpdf
  {

    function pdfreporte()
    {
      $this->fpdf("l","mm","Letter");
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
      $this->cod1= H::GetPost('cod1');
      $this->especial = H::GetPost('especial');
      $this->codnomesp = H::GetPost('tipnomesp');
      $this->autorizado = H::GetPost('autpor');
      $this->revisado = H::GetPost('revpor');
      $this->elaborado = H::GetPost('elapor');
      $this->aprobado = H::GetPost('aprpor');

      $this->objNprnompre = new Nprnompre();
      $this->arrp = $this->objNprnompre->SQLp($this->codempdes,$this->codemphas,$this->tipnomdes,$this->tipnomhas,$this->codcardes,$this->codcarhas,$this->especial,$this->codnomesp,$this->codcondes,$this->codconhas,$this->cod1);

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
      $arrnomnom = $this->objNprnompre->SQLnomnom($this->arrp[$i]["codnom"]);
      $nomnom = $arrnomnom[0]["nomnom"];
      $this->setTextColor(0,0,155);$this->texto(35,$y,$this->arrp[$i]["codnom"]."   ".$nomnom);
      $this->SetTextColor(0,0,0);$this->texto(15,$y,"NOMINA:");
      $this->texto(15,$y,"NOMINA:");
      if ($this->especial!='S')
      {
      //  $this->texto(200,$y,"Periodo del:  ".date('d/m/Y',strtotime($this->arrp[$i]["ultfec"]))."  al  ".date('d/m/Y',strtotime($this->arrp[$i]["profec"])));
      }else
      {
        $this->arrnomesp = $this->objNprnompre->SQLnpnomesptipos($this->especial);
     //   $this->texto(200,$y,"Periodo del:  ".date('d/m/Y',strtotime($this->arrnomesp[$i]["fechadel"]))."  al  ".date('d/m/Y',strtotime($this->arrnomesp[$i]["fechahas"])));
      }
      //}
      //$this->line(10,45,270,45);
      $this->setY(48);
      $this->setX(12);
      $this->setFont("Arial","B",8);
      $this->rect(10,$this->GetY()-13,260,20);
      $this->cell(55,4,"Código Presupuestario");
      $this->cell(60,4,"Descripción");
      $this->cell(45,4,"Cuenta Contable");
      $this->cell(37,4,"Descripción");
      $this->cell(25,4,"Asignacion");
      $this->cell(20,4,"Deducion");
      $this->cell(30,4,"Aporte");
      $this->ln(8);
    }

    function Cuerpo()
    {
      $this->setWidths(array(50,60,35,45,25,23,20));
      $this->setAligns(array("L","L","C","L","R","R","R"));


      $tot_asigna=0;
      $tot_deduci=0;
      $tot_aporte=0;
      $this->setFont("Arial","",7);
      $tempcodnom = $this->arrp[$this->index]["codnom"];
      for ($i=0;$i<count($this->arrp);$i++)
      {
        if ($tempcodnom != $this->arrp[$i]["codnom"])
        {
          $this->setFont("Arial","B",8);
          $this->ln(12);
          $this->line(150,$this->getY()-5,270,$this->getY()-5);
          $this->setX(180);
          $this->cell(15,4,'TOTALES');
          $this->cell(25,4,H::FormatoMonto($tot_asigna),0,0,"R");
          $this->cell(25,4,H::FormatoMonto($tot_deduci),0,0,"R");
          $this->cell(25,4,H::FormatoMonto($tot_aporte),0,0,"R");
          $this->setFont("Arial","",7);
          $tot_asigna=0;
          $tot_deduci=0;
          $tot_aporte=0;
          $this->index=$i;
          $this->AddPage();
        }

        if ($this->arrp[$i]["asigna"]>0)
          $asigna = H::FormatoMonto($this->arrp[$i]["asigna"]);
        else
          $asigna = '';
        if ($this->arrp[$i]["deduci"]>0)
          $deduci = H::FormatoMonto($this->arrp[$i]["deduci"]);
        else
          $deduci = '';
        if ($this->arrp[$i]["aporte"]>0)
          $aporte = H::FormatoMonto($this->arrp[$i]["aporte"]);
        else
          $aporte = '';
        $this->Row(array($this->arrp[$i]["codpre"],$this->arrp[$i]["nompre"],$this->arrp[$i]["codcta"],$this->arrp[$i]["descta"],$asigna,$deduci,$aporte));
        $tot_asigna+= $this->arrp[$i]["asigna"];
        $tot_deduci+= $this->arrp[$i]["deduci"];
        $tot_aporte+= $this->arrp[$i]["aporte"];
        $tempcodnom = $this->arrp[$i]["codnom"];
      }
      $this->setFont("Arial","B",8);
      $this->ln(12);
      $this->line(150,$this->getY()-5,270,$this->getY()-5);
      $this->setX(180);
      $this->cell(15,4,'TOTALES');
      $this->cell(25,4,H::FormatoMonto($tot_asigna),0,0,"R");
      $this->cell(25,4,H::FormatoMonto($tot_deduci),0,0,"R");
      $this->cell(25,4,H::FormatoMonto($tot_aporte),0,0,"R");

      //PIE DE PAGINA

      $this->line(15,$this->GetY()+15,50,$this->GetY()+15);
      $this->line(80,$this->GetY()+15,115,$this->GetY()+15);
      $this->line(150,$this->GetY()+15,185,$this->GetY()+15);
      $this->line(215,$this->GetY()+15,250,$this->GetY()+15);
      $this->setXY(7,$this->GetY()+15);
      $this->cell(50,4,$this->elaborado,0,0,'C');
      $this->setXY(73,$this->GetY());
      $this->cell(50,4,$this->revisado,0,0,'C');
      $this->setXY(142,$this->GetY());
      $this->cell(50,4,$this->aprobado,0,0,'C');
      $this->setXY(210,$this->GetY());
      $this->cell(50,4,$this->autorizado,0,0,'C');
      $this->setXY(7,$this->GetY()+4);
      $this->cell(50,4,'Elaborado',0,0,'C');
      $this->setXY(73,$this->GetY());
      $this->cell(50,4,'Revisado',0,0,'C');
      $this->setXY(142,$this->GetY());
      $this->cell(50,4,'Aprobado',0,0,'C');
      $this->setXY(210,$this->GetY());
      $this->cell(50,4,'Autorizado',0,0,'C');


    }

  }
