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
    var $sqla;
    var $sqlb;
    var $sqlc;
    var $sqld;
    var $rep;
    var $tipo1;
    var $tipo2;
    var $cod1;
    var $cod2;
    var $status;
    var $obs;
    var $codpre1;
    var $codpre2;
    var $filtro;
    var $conf;

    function pdfreporte()
    {
      $this->conf="L";
      $this->fpdf($this->conf,"mm","Letter");
      $this->cab=new cabecera();
      $this->bd=new basedatosAdo();

      $this->fecha1=$_POST["fecha1"];
      $this->fecha2=$_POST["fecha2"];
      $this->tipo1=$_POST["tipo1"];
      $this->tipo2=$_POST["tipo2"];
      $this->cod1=$_POST["cod1"];
      $this->cod2=$_POST["cod2"];
      $this->status=$_POST["status"];
      $this->filtro=$_POST["filtro"];


      if ($this->status=='T')
      {

        $this->sqla="select a.refprc, a.staprc,
            a.tipprc,
            to_char(a.fecprc,'dd/mm/yyyy') as fecprc,
            (case when a.staprc='A' then 'Activo' else 'Anulado' end) as estado,
            rtrim(a.desprc) as desprc,
            rtrim(b.codpre) as codpre,
            rtrim(c.nompre) as nompre,
            b.monimp,
            b.moncom,
            b.moncau,
            b.monpag,
            b.monaju as ajuste,
            (b.monimp-b.monaju) as mon_aju,
            ((b.monimp-b.monaju)-b.moncom) as por_comp,
            a.cedrif
            from cpprecom a,cpimpprc b, cpdeftit c
            where  a.refprc = b.refprc and
                 b.codpre = c.codpre  and
                 a.fecprc >= to_date('".$this->fecha1."','dd/mm/yyyy') and
                 a.fecprc <= to_date('".$this->fecha2."','dd/mm/yyyy') and
                 rtrim(b.codpre) >= rtrim('".$this->cod1."') and
                 rtrim(b.codpre) <=rtrim('".$this->cod2."') and
                 rtrim(a.tipprc) >= rtrim('".$this->tipo1."')        and
                 rtrim(a.tipprc) <= rtrim('".$this->tipo2."')        and
                 (b.codpre like '".$this->filtro."%')
            order by a.refprc";
      }
      else
      {
        $this->sqla="select a.refprc, a.staprc,
            a.tipprc,
            to_char(a.fecprc,'dd/mm/yyyy') as fecprc,
            (case when a.staprc='A' then 'Activo' else 'Anulado' end) as estado,
            rtrim(a.desprc) as desprc,
            rtrim(b.codpre) as codpre,
            rtrim(c.nompre) as nompre,
            b.monimp,
            b.moncom,
            b.moncau,
            b.monpag,
            b.monaju as ajuste,
            (b.monimp-b.monaju) as mon_aju,
            ((b.monimp-b.monaju)-b.moncom) as por_comp,
            a.cedrif
            from cpprecom a,cpimpprc b, cpdeftit c
            where  a.refprc = b.refprc and
                 b.codpre = c.codpre  and
                 a.fecprc >= to_date('".$this->fecha1."','dd/mm/yyyy') and
                 a.fecprc <= to_date('".$this->fecha2."','dd/mm/yyyy') and
                 rtrim(b.codpre) >= rtrim('".$this->cod1."') and
                 rtrim(b.codpre) <=rtrim('".$this->cod2."') and
                 rtrim(a.staprc)=rtrim('".$this->status."') and
                 rtrim(a.tipprc) >= rtrim('".$this->tipo1."')        and
                 rtrim(a.tipprc) <= rtrim('".$this->tipo2."')        and
                 (b.codpre like '".$this->filtro."%')
            order by a.refprc";
      }

      //print $this->sqla;


    }

    function Header()
    {
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
      $this->setFont("Arial","B",8);
      $this->SetTextColor(0,0,164);//rojo
      $this->SetY(35);
      $this->SetX(10);
      $this->cell(5,5,"CONTABILIDAD PRESUPUESTARIA");
      $this->SetY(39);
      $this->SetX(10);
      if ($this->status=='T')
      {
        $tipo='TODOS';
      }
      else if ($this->status=='A')
      {
        $tipo='ACTIVOS';
      }
      else
      {
        $tipo='ANULADOS';
      }
      $this->cell(5,5,"Precompromisos    ".$tipo);
      $this->SetY(43);
      $this->SetX(10);
      $this->cell(5,5,"Al    ".date('d/m/Y'));
      $this->line(10,50,270,50);

      $this->SetTextColor(164,0,0);//rojo
      $this->SetY(51);
      $this->SetX(10);
      $this->cell(5,5,"REFERENCIA");
      $this->SetX(40);
      $this->cell(5,5,"TIPO");
      $this->SetX(66);
      $this->cell(5,5,"FECHA ");
      $this->SetX(155);
      $this->cell(5,5,"DESCRIPCION");
      $this->SetY(55);
      $this->SetX(45);
      $this->cell(5,5,"Imputaciones Presupuestarias");
      $this->SetX(91);
      $this->cell(5,5,"Precomprometido");
      $this->SetX(121);
      $this->cell(5,5,"Monto Liberado");
      $this->SetX(148);
      $this->cell(5,5,"Monto Definitivo");
      $this->SetX(176);
      $this->cell(5,5,"Por Comprometer");
      $this->SetX(205);
      $this->cell(5,5,"Comprometido");
      $this->SetX(233);
      $this->cell(5,5,"Causado");
      $this->SetX(255);
      $this->cell(5,5,"Pagado");
      $this->Line(10,60,270,60);

      $this->SetTextColor(0,0,0);//rojo
      $this->ln(5);
    }
    function Cuerpo()
    {
      $this->setFont("Arial","B",8);
        $tba=$this->bd->select($this->sqla);
      $tba2=$this->bd->select($this->sqla);

      $totacumprecom=0;
      $totacummonlib=0;
      $totacummondef=0;
      $totacumporcom=0;
      $totacumcompro=0;
      $totacumcausad=0;
      $totacumpagado=0;

      ////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////
      if (!$tba2->EOF)
      {
         $ref=$tba2->fields["refprc"];
         $this->setFont("Arial","",7);
         $this->SetX(16);
         $this->cell(5,5,$tba2->fields["refprc"],0,0,'C');
         $this->SetX(42);
         $this->cell(5,5,$tba2->fields["tipprc"],0,0,'C');
         if ($tba2->fields["staprc"]=='A')
         {
           $sta="ACTIVO";
         }
         else
         {
           $sta="ANULADO";
         }
         $this->SetX(59);
         $this->cell(5,5,$sta,0,0,'C');
         $this->SetX(75);
         $this->cell(5,5,$tba2->fields["fecprc"],0,0,'C');
         $this->ln(1);
         $this->SetX(95);
         $this->Multicell(180,3,substr($tba2->fields["desprc"],0,200),0,'L');

         $sql="select nomben from opbenefi where trim(cedrif)=trim('".$tba2->fields["cedrif"]."')";
         $tb=$this->bd->select($sql);

         $this->ln(3);
         $this->SetX(15);
         $this->cell(5,5,"Beneficiario:");
         $this->SetX(40);
         $this->cell(5,5,$tba2->fields["cedrif"],0,0,'C');
         $this->SetX(55);
         $this->cell(5,5,strtoupper($tb->fields["nomben"]),0,0,'L');

         $this->ln(5);

      }

      $acumprecom=0;
      $acummonlib=0;
      $acummondef=0;
      $acumporcom=0;
      $acumcompro=0;
      $acumcausad=0;
      $acumpagado=0;

      while (!$tba->EOF)
      {

        if ($tba->fields["refprc"]!=$ref)
        {
          $this->Line(80,$this->GetY(),270,$this->GetY());

          $this->SetX(110);
          $this->cell(5,5,number_format($acumprecom,2,',','.'),0,0,'R');
          $this->SetX(137);
          $this->cell(5,5,number_format($acummonlib,2,',','.'),0,0,'R');
          $this->SetX(166);
          $this->cell(5,5,number_format($acummondef,2,',','.'),0,0,'R');
          $this->SetX(195);
          $this->cell(5,5,number_format($acumporcom,2,',','.'),0,0,'R');
          $this->SetX(221);
          $this->cell(5,5,number_format($acumcompro,2,',','.'),0,0,'R');
          $this->SetX(244);
          $this->cell(5,5,number_format($acumcausad,2,',','.'),0,0,'R');
          $this->SetX(265);
          $this->cell(5,5,number_format($acumpagado,2,',','.'),0,0,'R');

          if ($this->GetY()>155)
          {
            $this->AddPage();
          }
          else
          {
            $this->ln(5);
          }


          $this->Line(10,$this->GetY(),270,$this->GetY());

          $acumprecom=0;
          $acummonlib=0;
          $acummondef=0;
          $acumporcom=0;
          $acumcompro=0;
          $acumcausad=0;
          $acumpagado=0;

           $this->setFont("Arial","",7);
           $this->SetX(16);
           $this->cell(5,5,$tba->fields["refprc"],0,0,'C');
           $this->SetX(42);
           $this->cell(5,5,$tba->fields["tipprc"],0,0,'C');
           if ($tba->fields["staprc"]=='A')
           {
            $sta="ACTIVO";
           }
           else
           {
            $sta="ANULADO";
           }
           $this->SetX(59);
           $this->cell(5,5,$sta,0,0,'C');
           $this->SetX(75);
           $this->cell(5,5,$tba->fields["fecprc"],0,0,'C');
           $this->ln(1);
           $this->SetX(95);
           $this->Multicell(180,3,substr($tba->fields["desprc"],0,200),0,'L');

           $sql="select nomben from opbenefi where trim(cedrif)=trim('".$tba->fields["cedrif"]."')";
           $tb=$this->bd->select($sql);

           $this->ln(3);
           $this->SetX(15);
           $this->cell(5,5,"Beneficiario:");
           $this->SetX(40);
           $this->cell(5,5,$tba->fields["cedrif"],0,0,'C');
           $this->SetX(55);
           $this->cell(5,5,strtoupper($tb->fields["nomben"]),0,0,'L');

           $this->ln(5);

        }

        //detalle
        $ref=$tba->fields["refprc"];

        $this->SetX(12);
          $this->setFont("Arial","",7);
        $this->cell(5,5,$tba->fields["codpre"],0,0,'L');
          $this->setFont("Arial","",7);
        if (strlen($tba->fields["nompre"])>25)
        {
          $this->ln(1);
          $this->SetX(60);
          $this->Multicell(40,3,substr(strtoupper($tba->fields["nompre"]),0,40),0,'L');
          $this->ln(-7);
        }
        else
        {
          $this->ln(1);
          $this->SetX(60);
          $this->Multicell(40,3,substr(strtoupper($tba->fields["nompre"]),0,40),0,'L');
          $this->ln(-4);
        }
        $this->SetX(110);
        $this->cell(5,5,number_format($tba->fields["monimp"],2,',','.'),0,0,'R');

        $this->SetX(137);
        $this->cell(5,5,number_format($tba->fields["ajuste"],2,',','.'),0,0,'R');

        $this->SetX(166);
        $this->cell(5,5,number_format($tba->fields["mon_aju"],2,',','.'),0,0,'R');

        $this->SetX(195);
        $this->cell(5,5,number_format($tba->fields["por_comp"],2,',','.'),0,0,'R');

        $this->SetX(221);
        $this->cell(5,5,number_format($tba->fields["moncom"],2,',','.'),0,0,'R');

        $this->SetX(244);
        $this->cell(5,5,number_format($tba->fields["moncau"],2,',','.'),0,0,'R');

        $this->SetX(265);
        $this->cell(5,5,number_format($tba->fields["monpag"],2,',','.'),0,0,'R');

        $acumprecom=$acumprecom+$tba->fields["monimp"];
        $acummonlib=$acummonlib+$tba->fields["ajuste"];
        $acummondef=$acummondef+$tba->fields["mon_aju"];
        $acumporcom=$acumporcom+$tba->fields["por_comp"];
        $acumcompro=$acumcompro+$tba->fields["moncom"];
        $acumcausad=$acumcausad+$tba->fields["moncau"];
        $acumpagado=$acumpagado+$tba->fields["monpag"];

        $totacumprecom=$totacumprecom+$tba->fields["monimp"];
        $totacummonlib=$totacummonlib+$tba->fields["ajuste"];
        $totacummondef=$totacummondef+$tba->fields["mon_aju"];
        $totacumporcom=$totacumporcom+$tba->fields["por_comp"];
        $totacumcompro=$totacumcompro+$tba->fields["moncom"];
        $totacumcausad=$totacumcausad+$tba->fields["moncau"];
        $totacumpagado=$totacumpagado+$tba->fields["monpag"];

        if (strlen($tba->fields["nompre"])>25)
        {
          $this->ln(7);
        }
        else
        {
          $this->ln(4);
        }

      $tba->MoveNext();
      }


      //   2do    ////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////
          if ($this->status=='T')
          {

            $this->sqla="select
            a.refcom,
            a.tipcom,
            to_char(a.feccom,'dd/mm/yyyy') as feccom,
            (case when a.stacom='A' then 'Activo' else 'Anulado' end) as status_com,
            a.stacom,
            rtrim(a.descom) as descom,
            rtrim(b.codpre ) as codpre,
            rtrim(d.nompre) as nompre,
            b.monimp as monimpcom,
            b.moncau as monimpcau_com,
            b.monpag as monpagcom,
            b.monaju as monajucom,
            (b.monimp-b.monaju) as mon_ajucom,
            a.cedrif as cedrif
            from
            cpcompro a,
            cpimpcom b,
            cpdoccom c,
            cpdeftit d
            where
            a.refcom=b.refcom and
            a.tipcom=c.tipcom and
            b.codpre=d.codpre and
            c.refprc='N' and
            c.afeprc='S' and
            a.feccom >= to_date('".$this->fecha1."','dd/mm/yyyy') and
            a.feccom <= to_date('".$this->fecha2."','dd/mm/yyyy') and
            rtrim(b.codpre) >= rtrim('".$this->cod1."') and
            rtrim(b.codpre) <=rtrim('".$this->cod2."') and
            rtrim(a.stacom)=rtrim('".$this->status."') and
            rtrim(a.tipcom) >= rtrim('".$this->tipo1."')        and
            rtrim(a.tipcom) <= rtrim('".$this->tipo2."')        and
            (b.codpre like '".$this->filtro."%')";
          }
          else
          {
            $this->sqla="select
            a.refcom,
            a.tipcom,
            to_char(a.feccom,'dd/mm/yyyy') as feccom,
            a.stacom,
            (case when a.stacom='A' then 'Activo' else 'Anulado' end) as status_com,
            rtrim(a.descom) as descom,
            rtrim(b.codpre ) as codpre,
            rtrim(d.nompre) as nompre,
            b.monimp as monimpcom,
            b.moncau as monimpcau_com,
            b.monpag as monpagcom,
            b.monaju as monajucom,
            (b.monimp-b.monaju) as mon_ajucom,
            a.cedrif as cedrif
            from
            cpcompro a,
            cpimpcom b,
            cpdoccom c,
            cpdeftit d
            where
            a.refcom=b.refcom and
            a.tipcom=c.tipcom and
            b.codpre=d.codpre and
            c.refprc='N' and
            c.afeprc='S' and
            a.feccom >= to_date('".$this->fecha1."','dd/mm/yyyy') and
            a.feccom <= to_date('".$this->fecha2."','dd/mm/yyyy') and
            rtrim(b.codpre) >= rtrim('".$this->cod1."') and
            rtrim(b.codpre) <=rtrim('".$this->cod2."') and
            rtrim(a.stacom)=rtrim('".$this->status."') and
            rtrim(a.tipcom) >= rtrim('".$this->tipo1."')        and
            rtrim(a.tipcom) <= rtrim('".$this->tipo2."')        and
            (b.codpre like '".$this->filtro."%')";
          }
      $tba=$this->bd->select($this->sqla);
      $tba2=$this->bd->select($this->sqla);

      if (!$tba2->EOF)
      {
         $ref=$tba2->fields["refcom"];
         $this->setFont("Arial","",7);
         $this->SetX(16);
         $this->cell(5,5,$tba2->fields["refcom"],0,0,'C');
         $this->SetX(42);
         $this->cell(5,5,$tba2->fields["tipcom"],0,0,'C');
         if ($tba2->fields["stacom"]=='A')
         {
           $sta="ACTIVO";
         }
         else
         {
           $sta="ANULADO";
         }
         $this->SetX(59);
         $this->cell(5,5,$sta,0,0,'C');
         $this->SetX(75);
         $this->cell(5,5,$tba2->fields["feccom"],0,0,'C');
         $this->ln(1);
         $this->SetX(95);
         $this->Multicell(180,3,substr($tba2->fields["descom"],0,200),0,'L');

         $sql="select nomben from opbenefi where trim(cedrif)=trim('".$tba2->fields["cedrif"]."')";
         $tb=$this->bd->select($sql);

         $this->ln(3);
         $this->SetX(15);
         $this->cell(5,5,"Beneficiario:");
         $this->SetX(40);
         $this->cell(5,5,$tba2->fields["cedrif"],0,0,'C');
         $this->SetX(55);
         $this->cell(5,5,strtoupper($tb->fields["nomben"]),0,0,'L');

         $this->ln(5);

      }

      $acumprecom=0;
      $acummonlib=0;
      $acummondef=0;
      $acumporcom=0;
      $acumcompro=0;
      $acumcausad=0;
      $acumpagado=0;

      while (!$tba->EOF)
      {

        if ($tba->fields["refcom"]!=$ref)
        {
          $this->Line(80,$this->GetY(),270,$this->GetY());

          $this->SetX(110);
          $this->cell(5,5,number_format($acumprecom,2,',','.'),0,0,'R');
          $this->SetX(137);
          $this->cell(5,5,number_format($acummonlib,2,',','.'),0,0,'R');
          $this->SetX(166);
          $this->cell(5,5,number_format($acummondef,2,',','.'),0,0,'R');
          $this->SetX(195);
          $this->cell(5,5,number_format($acumcompro,2,',','.'),0,0,'R');
          $this->SetX(244);
          $this->cell(5,5,number_format($acumcausad,2,',','.'),0,0,'R');
          $this->SetX(265);
          $this->cell(5,5,number_format($acumpagado,2,',','.'),0,0,'R');

          if ($this->GetY()>155)
          {
            $this->AddPage();
          }
          else
          {
            $this->ln(5);
          }


          $this->Line(10,$this->GetY(),270,$this->GetY());

          $acumprecom=0;
          $acummonlib=0;
          $acummondef=0;
          $acumporcom=0;
          $acumcompro=0;
          $acumcausad=0;
          $acumpagado=0;

          $this->setFont("Arial","",7);
           $this->SetX(16);
           $this->cell(5,5,$tba->fields["refcom"],0,0,'C');
           $this->SetX(42);
           $this->cell(5,5,$tba->fields["tipcom"],0,0,'C');
           if ($tba2->fields["stacom"]=='A')
           {
            $sta="ACTIVO";
           }
           else
           {
            $sta="ANULADO";
           }
           $this->SetX(59);
           $this->cell(5,5,$sta,0,0,'C');
           $this->SetX(75);
           $this->cell(5,5,$tba->fields["feccom"],0,0,'C');
           $this->ln(1);
           $this->SetX(95);
           $this->Multicell(180,3,substr($tba->fields["descom"],0,200),0,'L');

           $sql="select nomben from opbenefi where trim(cedrif)=trim('".$tba->fields["cedrif"]."')";
           $tb=$this->bd->select($sql);

           $this->ln(3);
           $this->SetX(15);
           $this->cell(5,5,"Beneficiario:");
           $this->SetX(40);
           $this->cell(5,5,$tba->fields["cedrif"],0,0,'C');
           $this->SetX(55);
           $this->cell(5,5,strtoupper($tb->fields["nomben"]),0,0,'L');

           $this->ln(5);

        }

        //detalle
        $ref=$tba->fields["refcom"];

        $this->SetX(12);
        $this->cell(5,5,$tba->fields["codpre"],0,0,'L');
        if (strlen($tba->fields["nompre"])>25)
        {
          $this->ln(1);
          $this->SetX(60);
          $this->Multicell(40,3,substr(strtoupper($tba->fields["nompre"]),0,40),0,'L');
          $this->ln(-7);
        }
        else
        {
          $this->ln(1);
          $this->SetX(60);
          $this->Multicell(40,3,substr(strtoupper($tba->fields["nompre"]),0,40),0,'L');
          $this->ln(-4);
        }
        $this->SetX(110);
        $this->cell(5,5,number_format($tba->fields["monimpcom"],2,',','.'),0,0,'R');

        $this->SetX(137);
        $this->cell(5,5,number_format($tba->fields["monajucom"],2,',','.'),0,0,'R');

        $this->SetX(166);
        $this->cell(5,5,number_format($tba->fields["mon_ajucom"],2,',','.'),0,0,'R');

        $this->SetX(221);
        $this->cell(5,5,number_format($tba->fields["monimpcom"],2,',','.'),0,0,'R');

        $this->SetX(244);
        $this->cell(5,5,number_format($tba->fields["monimpcau_com"],2,',','.'),0,0,'R');

        $this->SetX(265);
        $this->cell(5,5,number_format($tba->fields["monpagcom"],2,',','.'),0,0,'R');

        $acumprecom=$acumprecom+$tba->fields["monimpcom"];
        $acummonlib=$acummonlib+$tba->fields["monajucom"];
        $acummondef=$acummondef+$tba->fields["mon_ajucom"];
        $acumcompro=$acumcompro+$tba->fields["monimpcom"];
        $acumcausad=$acumcausad+$tba->fields["monimpcau_com"];
        $acumpagado=$acumpagado+$tba->fields["monpagcom"];

        $totacumprecom=$totacumprecom+$tba->fields["monimpcom"];
        $totacummonlib=$totacummonlib+$tba->fields["monajucom"];
        $totacummondef=$totacummondef+$tba->fields["mon_ajucom"];
        $totacumporcom=$totacumporcom+$acumporcom;
        $totacumcompro=$totacumcompro+$tba->fields["monimpcom"];
        $totacumcausad=$totacumcausad+$tba->fields["monimpcau_com"];
        $totacumpagado=$totacumpagado+$tba->fields["monpagcom"];

        if (strlen($tba->fields["nompre"])>25)
        {
          $this->ln(7);
        }
        else
        {
          $this->ln(4);
        }

      $tba->MoveNext();
      }

      //   3ro    ////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////
          if ($this->status=='T')
          {
            $this->sqla="select
            a.refcau,
            a.tipcau,
            to_char(a.feccau,'dd/mm/yyyy') as feccau,
            (case when a.stacau='A' then 'Activo' else 'Anulado' end) as status_cau,
            a.stacau,
            rtrim(a.descau) as descau,
            rtrim(b.codpre ) as codpre,
            rtrim(d.nompre) as nompre,
            b.monimp as monimpcau,
            b.monpag as monpagcau,
            b.monaju as monajucau,
            (b.monimp-b.monaju) as mon_ajucau,
            --((b.monimp-b.monaju)-b.moncom) por_comp,
            a.cedrif as cedrif
            from
            cpcausad a,
            cpimpcau b,
            cpdoccau c,
            cpdeftit d
            where
            a.refcau=b.refcau and
            a.tipcau=c.tipcau and
            b.codpre=d.codpre and
            c.refier='N' and
            c.afeprc='S' and
            a.feccau >= to_date('".$this->fecha1."','dd/mm/yyyy') and
            a.feccau <= to_date('".$this->fecha2."','dd/mm/yyyy') and
            rtrim(b.codpre) >= rtrim('".$this->cod1."') and
            rtrim(b.codpre) <=rtrim('".$this->cod2."') and
            rtrim(a.stacau)=rtrim('".$this->status."') and
            rtrim(a.tipcau) >= rtrim('".$this->tipo1."')        and
            rtrim(a.tipcau) <= rtrim('".$this->tipo2."')        and
            (b.codpre like '".$this->filtro."%')";
          }
          else
          {
            $this->sqla="select
            a.refcau,
            a.tipcau,
            to_char(a.feccau,'dd/mm/yyyy') as feccau,
            (case when a.stacau='A' then 'Activo' else 'Anulado' end) as status_cau,
            a.stacau,
            rtrim(a.descau) as descau,
            rtrim(b.codpre ) as codpre,
            rtrim(d.nompre) as nompre,
            b.monimp as monimpcau,
            b.monpag as monpagcau,
            b.monaju as monajucau,
            (b.monimp-b.monaju) as mon_ajucau,
            --((b.monimp-b.monaju)-b.moncom) por_comp,
            a.cedrif as cedrif
            from
            cpcausad a,
            cpimpcau b,
            cpdoccau c,
            cpdeftit d
            where
            a.refcau=b.refcau and
            a.tipcau=c.tipcau and
            b.codpre=d.codpre and
            c.refier='N' and
            c.afeprc='S' and
            a.feccau >= to_date('".$this->fecha1."','dd/mm/yyyy') and
            a.feccau <= to_date('".$this->fecha2."','dd/mm/yyyy') and
            rtrim(b.codpre) >= rtrim('".$this->cod1."') and
            rtrim(b.codpre) <=rtrim('".$this->cod2."') and
            rtrim(a.stacau)=rtrim('".$this->status."') and
            rtrim(a.tipcau) >= rtrim('".$this->tipo1."')        and
            rtrim(a.tipcau) <= rtrim('".$this->tipo2."')        and
            (b.codpre like '".$this->filtro."%')";
          }
      $tba=$this->bd->select($this->sqla);
      $tba2=$this->bd->select($this->sqla);

      if (!$tba2->EOF)
      {
         $ref=$tba2->fields["refcau"];
         $this->setFont("Arial","",7);
         $this->SetX(16);
         $this->cell(5,5,$tba2->fields["refcau"],0,0,'C');
         $this->SetX(42);
         $this->cell(5,5,$tba2->fields["tipcau"],0,0,'C');
         if ($tba2->fields["stacau"]=='A')
         {
           $sta="ACTIVO";
         }
         else
         {
           $sta="ANULADO";
         }
         $this->SetX(59);
         $this->cell(5,5,$sta,0,0,'C');
         $this->SetX(75);
         $this->cell(5,5,$tba2->fields["feccau"],0,0,'C');
         $this->ln(1);
         $this->SetX(95);
         $this->Multicell(180,3,substr($tba2->fields["descau"],0,200),0,'L');

         $sql="select nomben from opbenefi where trim(cedrif)=trim('".$tba2->fields["cedrif"]."')";
         $tb=$this->bd->select($sql);

         $this->ln(3);
         $this->SetX(15);
         $this->cell(5,5,"Beneficiario:");
         $this->SetX(40);
         $this->cell(5,5,$tba2->fields["cedrif"],0,0,'C');
         $this->SetX(55);
         $this->cell(5,5,strtoupper($tb->fields["nomben"]),0,0,'L');

         $this->ln(5);

      }

      $acumprecom=0;
      $acummonlib=0;
      $acummondef=0;
      $acumporcom=0;
      $acumcompro=0;
      $acumcausad=0;
      $acumpagado=0;

      while (!$tba->EOF)
      {

        if ($tba->fields["refcau"]!=$ref)
        {
          $this->Line(80,$this->GetY(),270,$this->GetY());

          $this->SetX(110);
          $this->cell(5,5,number_format($acumprecom,2,',','.'),0,0,'R');
          $this->SetX(137);
          $this->cell(5,5,number_format($acummonlib,2,',','.'),0,0,'R');
          $this->SetX(166);
          $this->cell(5,5,number_format($acummondef,2,',','.'),0,0,'R');
          $this->SetX(195);
          $this->cell(5,5,number_format($acumcompro,2,',','.'),0,0,'R');
          $this->SetX(244);
          $this->cell(5,5,number_format($acumcausad,2,',','.'),0,0,'R');
          $this->SetX(265);
          $this->cell(5,5,number_format($acumpagado,2,',','.'),0,0,'R');

          if ($this->GetY()>155)
          {
            $this->AddPage();
          }
          else
          {
            $this->ln(5);
          }


          $this->Line(10,$this->GetY(),270,$this->GetY());

          $acumprecom=0;
          $acummonlib=0;
          $acummondef=0;
          $acumporcom=0;
          $acumcompro=0;
          $acumcausad=0;
          $acumpagado=0;

          $this->setFont("Arial","",7);
           $this->SetX(16);
           $this->cell(5,5,$tba->fields["refcau"],0,0,'C');
           $this->SetX(42);
           $this->cell(5,5,$tba->fields["tipcau"],0,0,'C');
           if ($tba2->fields["stacau"]=='A')
           {
            $sta="ACTIVO";
           }
           else
           {
            $sta="ANULADO";
           }
           $this->SetX(59);
           $this->cell(5,5,$sta,0,0,'C');
           $this->SetX(75);
           $this->cell(5,5,$tba->fields["feccau"],0,0,'C');
           $this->ln(1);
           $this->SetX(95);
           $this->Multicell(180,3,substr($tba->fields["descau"],0,200),0,'L');

           $sql="select nomben from opbenefi where trim(cedrif)=trim('".$tba->fields["cedrif"]."')";
           $tb=$this->bd->select($sql);

           $this->ln(3);
           $this->SetX(15);
           $this->cell(5,5,"Beneficiario:");
           $this->SetX(40);
           $this->cell(5,5,$tba->fields["cedrif"],0,0,'C');
           $this->SetX(55);
           $this->cell(5,5,strtoupper($tb->fields["nomben"]),0,0,'L');

           $this->ln(5);

        }

        //detalle
        $ref=$tba->fields["refcau"];

        $this->SetX(12);
        $this->cell(5,5,$tba->fields["codpre"],0,0,'L');
        if (strlen($tba->fields["nompre"])>25)
        {
          $this->ln(1);
          $this->SetX(60);
          $this->Multicell(40,3,substr(strtoupper($tba->fields["nompre"]),0,40),0,'L');
          $this->ln(-7);
        }
        else
        {
          $this->ln(1);
          $this->SetX(60);
          $this->Multicell(40,3,substr(strtoupper($tba->fields["nompre"]),0,40),0,'L');
          $this->ln(-4);
        }
        $this->SetX(110);
        $this->cell(5,5,number_format($tba->fields["monimpcau"],2,',','.'),0,0,'R');

        $this->SetX(137);
        $this->cell(5,5,number_format($tba->fields["monajucau"],2,',','.'),0,0,'R');

        $this->SetX(166);
        $this->cell(5,5,number_format($tba->fields["mon_ajucau"],2,',','.'),0,0,'R');

        $this->SetX(221);
        $this->cell(5,5,number_format($tba->fields["monimpcau"],2,',','.'),0,0,'R');

        $this->SetX(244);
        $this->cell(5,5,number_format($tba->fields["monimpcau"],2,',','.'),0,0,'R');

        $this->SetX(265);
        $this->cell(5,5,number_format($tba->fields["monpagcau"],2,',','.'),0,0,'R');

        $acumprecom=$acumprecom+$tba->fields["monimpcau"];
        $acummonlib=$acummonlib+$tba->fields["monajucau"];
        $acummondef=$acummondef+$tba->fields["mon_ajucau"];
        $acumcompro=$acumcompro+$tba->fields["monimpcau"];
        $acumcausad=$acumcausad+$tba->fields["monimpcau"];
        $acumpagado=$acumpagado+$tba->fields["monpagcau"];

        $totacumprecom=$totacumprecom+$tba->fields["monimpcau"];
        $totacummonlib=$totacummonlib+$tba->fields["monajucau"];
        $totacummondef=$totacummondef+$tba->fields["mon_ajucau"];
        $totacumporcom=$totacumporcom+$acumporcom;
        $totacumcompro=$totacumcompro+$tba->fields["monimpcau"];
        $totacumcausad=$totacumcausad+$tba->fields["monimpcau"];
        $totacumpagado=$totacumpagado+$tba->fields["monpagcau"];

        if (strlen($tba->fields["nompre"])>25)
        {
          $this->ln(7);
        }
        else
        {
          $this->ln(4);
        }

      $tba->MoveNext();
      }

        $this->Line(80,$this->GetY(),270,$this->GetY());

        $this->SetX(110);
        $this->cell(5,5,number_format($acumprecom,2,',','.'),0,0,'R');
        $this->SetX(137);
        $this->cell(5,5,number_format($acummonlib,2,',','.'),0,0,'R');
        $this->SetX(166);
        $this->cell(5,5,number_format($acummondef,2,',','.'),0,0,'R');
        $this->SetX(195);
        $this->cell(5,5,number_format($acumcompro,2,',','.'),0,0,'R');
        $this->SetX(244);
        $this->cell(5,5,number_format($acumcausad,2,',','.'),0,0,'R');
        $this->SetX(265);
        $this->cell(5,5,number_format($acumpagado,2,',','.'),0,0,'R');

        $this->ln(7);

        $this->setFont("Arial","B",7);
        $this->SetX(70);
        $this->cell(5,5,'TOTALES');
        $this->Line(70,$this->GetY(),270,$this->GetY());

        $this->SetX(110);
        $this->cell(5,5,number_format($totacumprecom,2,',','.'),0,0,'R');
        $this->SetX(137);
        $this->cell(5,5,number_format($totacummonlib,2,',','.'),0,0,'R');
        $this->SetX(166);
        $this->cell(5,5,number_format($totacummondef,2,',','.'),0,0,'R');
        $this->SetX(195);
        $this->cell(5,5,number_format($totacumporcom,2,',','.'),0,0,'R');
        $this->SetX(221);
        $this->cell(5,5,number_format($totacumcompro,2,',','.'),0,0,'R');
        $this->SetX(244);
        $this->cell(5,5,number_format($totacumcausad,2,',','.'),0,0,'R');
        $this->SetX(265);
        $this->cell(5,5,number_format($totacumpagado,2,',','.'),0,0,'R');


    }

  }
?>