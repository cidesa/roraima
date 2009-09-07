<?php


/**
 * Subclass for representing a row from the 'cpdisfuefin'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpdisfuefin extends BaseCpdisfuefin {
  protected $nomext = "";
  protected $monto  = 0;
  protected $mondis = 0;
  protected $montoreal = 0;
  protected $monpre  = 0;
  protected $moncom  = 0;
  protected $moncau  = 0;
  protected $monpag  = 0;
  protected $mondisf = 0;
  protected $origenpreejeglofin=0;
  protected $tipmov  = '';
  protected $refmov  = '';
  protected $codori  = '';
  protected $monsoltra = 0;


  public function afterHydrate()
  {
  //if (($this->tipmov=='CREDITO') or $this->tipmov=='MALOTRASLADO')
  if ($this->tipmov=='CREDITO')
  {
    $this->monto = H::FormatoMonto(Herramientas::getXx('cpdisfuefin',array('correl','refdis','codpre'),array(self::getCorrel(),$this->refmov,self::getCodpre()),'monasi'));
  }else{
    $this->monto = H::FormatoMonto(Herramientas::getXx('cpmovfuefin',array('correl','refmov','tipmov'),array(self::getCorrel(),$this->refmov,$this->tipmov),'monmov'));
  }
  }

  public function getNomext()
  {
    $c = new Criteria();
    $c->add(CptraslaPeer::REFTRA,self::getFuefin());
    $per = CptraslaPeer::doSelectone($c);

  if ($per)
  {
    $referencia = $per->getNrodec();
  }else{
    $nomext = self::getRefdis();
  }

  return Herramientas::getX('codfin','fortipfin','nomext',self::getFuefin()).'-'.$nomext;
  }

  public function getMoneje()
  {
     $output = array();
     $monto  = 0;
     $anocierre = substr(Herramientas::getX('codemp','cpdefniv','feccie','001'),0,4);
     $sql = "select coalesce(sum(monmov),0) as moncom from cpmovfuefin where correl='".self::getCorrel()."' and codpre='".self::getCodpre()."' and to_char(fecmov,'YYYY')='".$anocierre."' and stamov<>'N' and tipmov<>'TRASLADO'";
     if (Herramientas::BuscarDatos($sql,&$output))
   {
     if ($output[0]['moncom']!=0)
     {
    $monto = $output[0]['moncom'];
     }
   }

   return H::FormatoMonto($monto);
  }

  public function getMondis()
  {
  return  H::FormatoMonto(self::getMonasi() - H::QuitarMontov2(self::getMoneje()));
  }

////  DEL MODULO PreEjeGloFin   ////
  public function getOrigenFin()
  {
    $valor = '';
    if (self::getOrigen()=='INICIAL')      { $valor = "Asignacion Inicial";      }
    else if (self::getOrigen()=='TRASLADO'){ $valor = "Asignacion por Traslado"; }
    else if (self::getOrigen()=='CREDITO') { $valor = "Asignacion por Credito";  }
    else { return ""; }


  $c = new Criteria();
  $c->add(FortipfinPeer::CODFIN,self::getFuefin());
  $per = FortipfinPeer::doSelectone($c);

  if ($per) $valor = $valor ." - ". $per->getNomext();

  $c = new Criteria();
  $c->add(CptraslaPeer::REFTRA,self::getRefdis());
  $per = CptraslaPeer::doSelectone($c);

  if ($per){
    if ($per->getNrodec()<>''){  $valor = $valor ." - ". $per->getNrodec(); }
    else{ $valor = $valor ." - ". self::getRefdis();  }

  }else{ $valor = $valor ." - ". self::getRefdis();  }

    return $valor;
  }

  public function getMontra()
  {
    $monto = 0;
    //Traslados (Modificaciones)
     $sql="Select sum(monmov) as montra from cpmovfuefin where correl='".self::getCorrel()."' and tipmov='TRASLADO' and stamov<>'N' and codpre='".self::getCodpre()."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
       if ($result[0]["montra"]>0){
         $monto = $result[0]["montra"];
       }
    }


    //Disminuciones
    $sql="Select sum(monmov) as montra from cpmovfuefin where correl='".self::getCorrel()."' and tipmov='DEBITO' and stamov<>'N' and codpre='".self::getCodpre()."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
       if ($result[0]["montra"]>0){
         $monto =  $monto + $result[0]["montra"];
       }
    }

  return H::FormatoMonto($monto);
  }



  public function getMonsoltra()
  {
    $monto = 0;
    //Solicitud Traslados (Modificaciones)
     $sql="Select sum(monmov) as montra from cpmovfuefin where correl='".self::getCorrel()."' and tipmov='SOLTRASLADO' and stamov<>'N' and codpre='".self::getCodpre()."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
       if ($result[0]["montra"]>0){
         $monto = $result[0]["montra"];
       }
    }


    //Disminuciones
    $sql="Select sum(monmov) as montra from cpmovfuefin where correl='".self::getCorrel()."' and tipmov='DEBITO' and stamov<>'N' and codpre='".self::getCodpre()."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
       if ($result[0]["montra"]>0){
         $monto =  $monto + $result[0]["montra"];
       }
    }

  return H::FormatoMonto($monto);
  }


  public function getAsignactual()
  {

    return H::FormatoMonto(self::getMonasi() - H::QuitarMontov2(self::getMontra()));
  }


  public function getMonpre()
  {
    $monto = 0;
    $anocierre = substr(Herramientas::getX('codemp','cpdefniv','feccie','001'),0,4);

  //Precompromiso
     $sql = "Select Sum(A.MONAJU*(C.MONMOV/A.MONIMP)) as MonAju,
                Sum(C.MONMOV) as MonPrc
            From CPIMPPRC A,CPPRECOM B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecPrc,'YYYY') ='".$anocierre. "' And
                  C.Correl ='".self::getCorrel()."' AND
                  A.RefPrc = B.RefPrc AND
                  C.RefMov = a.REFPRC AND
                  C.CodPre = A.CODPRE And
                  C.TipMov = 'PRECOMPROMISO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $result[0]["monprc"];
    }


  //Compromiso
      $sql = "Select Sum(A.MONAJU*(C.MONMOV/A.MONIMP)) as MonAju,
                Sum(C.MONMOV) as  MonCom
            From CPIMPCOM A,CPCOMPRO B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecCOM,'YYYY')='".$anocierre."' And
                  C.Correl='".self::getCorrel(). "' AND
                  A.RefCOM=B.RefCOM AND
                  C.RefMov = A.REFCOM AND
                  C.CodPre = A.CODPRE And
                  C.TipMov='COMPROMISO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $monto + $result[0]["moncom"] - $result[0]["monaju"];
    }

  //Causado
      $sql = "Select  Sum(A.MONAJU*(C.MONMOV/A.MONIMP)) AS MonAju,
                Sum(C.MONMOV) AS MonCAU
            From CPIMPCAU A,CPCAUSAD B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecCAU,'YYYY')='".$anocierre."' And
                  C.Correl='".self::getCorrel(). "' AND
                  A.RefCAU=B.RefCAU AND
                  C.RefMov = A.REFCAU AND
                  C.CodPre = A.CODPRE And
                  C.TipMov='CAUSADO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $monto + $result[0]["moncau"] - $result[0]["monaju"];
    }


  //Pagado
      $sql = "Select Sum(A.MONAJU*(C.MONMOV/A.MONIMP)) as MonAju,
                Sum(C.MONMOV) as MonPAG
            From CPIMPPAG A,CPPAGOS B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecPAG,'YYYY')='".$anocierre."' And
                  C.Correl='".self::getCorrel()."' AND
                  A.RefPAG=B.RefPAG AND
                  C.RefMov = A.REFPAG AND
                  C.CodPre = A.CODPRE And
                  C.TipMov = 'PAGADO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $monto + $result[0]["monpag"] - $result[0]["monaju"];
    }

  return H::FormatoMonto($monto);
  }

  public function getMoncom()
  {
    $monto = 0;
    $anocierre = substr(Herramientas::getX('codemp','cpdefniv','feccie','001'),0,4);

     $sql = "Select Sum(A.MONCOM*(C.MONMOV/A.MONIMP)) as moncom
            From CPIMPPRC A,CPPRECOM B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecPrc,'YYYY')='".$anocierre. "' And
                  C.Correl='".self::getCorrel()."' AND
                  A.RefPrc=B.RefPrc AND
                  C.RefMov = a.REFPRC AND
                  C.CodPre = A.CODPRE And
                  C.TipMov='PRECOMPROMISO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $result[0]["moncom"];
    }

  //Compromiso
      $sql = "Select Sum(A.MONAJU*(C.MONMOV/A.MONIMP)) as MonAju,
                Sum(C.MONMOV) as  MonCom
            From CPIMPCOM A,CPCOMPRO B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecCOM,'YYYY')='".$anocierre."' And
                  C.Correl='".self::getCorrel(). "' AND
                  A.RefCOM=B.RefCOM AND
                  C.RefMov = A.REFCOM AND
                  C.CodPre = A.CODPRE And
                  C.TipMov='COMPROMISO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $monto + $result[0]["moncom"] - $result[0]["monaju"];
    }


  //Causado
      $sql = "Select  Sum(A.MONAJU*(C.MONMOV/A.MONIMP)) AS MonAju,
                Sum(C.MONMOV) AS MonCAU
            From CPIMPCAU A,CPCAUSAD B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecCAU,'YYYY')='".$anocierre."' And
                  C.Correl='".self::getCorrel(). "' AND
                  A.RefCAU=B.RefCAU AND
                  C.RefMov = A.REFCAU AND
                  C.CodPre = A.CODPRE And
                  C.TipMov='CAUSADO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $monto + $result[0]["moncau"] - $result[0]["monaju"];
    }


  //Pagado
      $sql = "Select Sum(A.MONAJU*(C.MONMOV/A.MONIMP)) as MonAju,
                Sum(C.MONMOV) as MonPAG
            From CPIMPPAG A,CPPAGOS B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecPAG,'YYYY')='".$anocierre."' And
                  C.Correl='".self::getCorrel()."' AND
                  A.RefPAG=B.RefPAG AND
                  C.RefMov = A.REFPAG AND
                  C.CodPre = A.CODPRE And
                  C.TipMov = 'PAGADO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $monto + $result[0]["monpag"] - $result[0]["monaju"];
    }

  return H::FormatoMonto($monto);
  }

  public function getMoncau()
  {
    $monto = 0;
    $anocierre = substr(Herramientas::getX('codemp','cpdefniv','feccie','001'),0,4);

     $sql = "Select Sum(A.MONCAU*(C.MONMOV/A.MONIMP)) as moncau
            From CPIMPPRC A,CPPRECOM B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecPrc,'YYYY')='".$anocierre. "' And
                  C.Correl='".self::getCorrel()."' AND
                  A.RefPrc=B.RefPrc AND
                  C.RefMov = a.REFPRC AND
                  C.CodPre = A.CODPRE And
                  C.TipMov='PRECOMPROMISO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $result[0]["moncau"];
    }

  //Compromiso
      $sql = "Select Sum(A.MONCAU*(C.MONMOV/A.MONIMP)) as MonCau
            From CPIMPCOM A,CPCOMPRO B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecCOM,'YYYY')='".$anocierre."' And
                  C.Correl='".self::getCorrel(). "' AND
                  A.RefCOM=B.RefCOM AND
                  C.RefMov = A.REFCOM AND
                  C.CodPre = A.CODPRE And
                  C.TipMov='COMPROMISO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $monto + $result[0]["moncau"];
    }


  //Causado
      $sql = "Select  Sum(A.MONAJU*(C.MONMOV/A.MONIMP)) AS MonAju,
                Sum(C.MONMOV) AS MonCAU
            From CPIMPCAU A,CPCAUSAD B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecCAU,'YYYY')='".$anocierre."' And
                  C.Correl='".self::getCorrel(). "' AND
                  A.RefCAU=B.RefCAU AND
                  C.RefMov = A.REFCAU AND
                  C.CodPre = A.CODPRE And
                  C.TipMov='CAUSADO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $monto + $result[0]["moncau"] - $result[0]["monaju"];
    }


  //Pagado
      $sql = "Select Sum(A.MONAJU*(C.MONMOV/A.MONIMP)) as MonAju,
                Sum(C.MONMOV) as MonPAG
            From CPIMPPAG A,CPPAGOS B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecPAG,'YYYY')='".$anocierre."' And
                  C.Correl='".self::getCorrel()."' AND
                  A.RefPAG=B.RefPAG AND
                  C.RefMov = A.REFPAG AND
                  C.CodPre = A.CODPRE And
                  C.TipMov = 'PAGADO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $monto + $result[0]["monpag"] - $result[0]["monaju"];
    }

  return H::FormatoMonto($monto);
  }

  public function getMonpag()
  {
    $monto = 0;
    $anocierre = substr(Herramientas::getX('codemp','cpdefniv','feccie','001'),0,4);

     $sql = "Select Sum(A.MONPAG*(C.MONMOV/A.MONIMP)) as monpag
            From CPIMPPRC A,CPPRECOM B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecPrc,'YYYY')='".$anocierre. "' And
                  C.Correl='".self::getCorrel()."' AND
                  A.RefPrc=B.RefPrc AND
                  C.RefMov = a.REFPRC AND
                  C.CodPre = A.CODPRE And
                  C.TipMov='PRECOMPROMISO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $result[0]["monpag"];
    }

  //Compromiso
      $sql = "Select Sum(A.MONPAG*(C.MONMOV/A.MONIMP)) as MonPag
            From CPIMPCOM A,CPCOMPRO B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecCOM,'YYYY')='".$anocierre."' And
                  C.Correl='".self::getCorrel(). "' AND
                  A.RefCOM=B.RefCOM AND
                  C.RefMov = A.REFCOM AND
                  C.CodPre = A.CODPRE And
                  C.TipMov='COMPROMISO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $monto + $result[0]["monpag"];
    }


  //Causado
      $sql = "Select Sum(A.MONPAG*(C.MONMOV/A.MONIMP)) AS MonPag
            From CPIMPCAU A,CPCAUSAD B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecCAU,'YYYY')='".$anocierre."' And
                  C.Correl='".self::getCorrel(). "' AND
                  A.RefCAU=B.RefCAU AND
                  C.RefMov = A.REFCAU AND
                  C.CodPre = A.CODPRE And
                  C.TipMov='CAUSADO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $monto + $result[0]["monpag"];
    }


  //Pagado
      $sql = "Select Sum(A.MONAJU*(C.MONMOV/A.MONIMP)) as MonAju,
                Sum(C.MONMOV) as MonPAG
            From CPIMPPAG A,CPPAGOS B,CPMOVFUEFIN C
            Where A.CodPre = '".self::getCodpre()."' And
                  To_Char(B.FecPAG,'YYYY')='".$anocierre."' And
                  C.Correl='".self::getCorrel()."' AND
                  A.RefPAG=B.RefPAG AND
                  C.RefMov = A.REFPAG AND
                  C.CodPre = A.CODPRE And
                  C.TipMov = 'PAGADO' AND
                  C.STAMOV<>'N'";

    if (Herramientas::BuscarDatos($sql,&$result))
    {
         $monto = $monto + $result[0]["monpag"] - $result[0]["monaju"];
    }

  return H::FormatoMonto($monto);
  }

  public function getMondisf()
  {

  return H::FormatoMonto(self::getMonasi() - H::QuitarMontov2(self::getMontra()) - H::QuitarMontov2(self::getMonpre()));
  }

///////////////////////////////////
}