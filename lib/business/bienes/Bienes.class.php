<?php
class Bienes
{
  /*
   * Función Principal para validar datos del formulario Bieregactmued
   */
  public static function validarBnregmue($articulo) {
      return self::validarCodact($articulo);
    }


  public static function validarCodact($articulo)
  {
         $codact=$articulo->getCodact();
         $codmue=$articulo->getCodmue();

     $c = new Criteria();
     $c->add(BnregmuePeer::CODACT,$codact);
     $c->add(BnregmuePeer::CODMUE,$codmue);
     $objBnregmue = BnregmuePeer::doSelectOne($c);

     if ($objBnregmue)
       return 203;
     else
        return -1;

  }

  /*
   * Función Principal para validar datos del formulario Bieregactinm
   */
  public static function validarBnreginm($articulo)
  {
      return self::validarCodmue($articulo);
  }


  public static function validarCodmue($articulo)
  {
     $codact=$articulo->getCodact();
     $codinm=$articulo->getCodinm();

     $c = new Criteria();
     $c->add(BnreginmPeer::CODACT,$codact);
     $c->add(BnreginmPeer::CODINM,$codinm);
     $objBnreginm = BnreginmPeer::doSelectOne($c);

     if ($objBnreginm)
       return 203;
     else
        return -1;
  }

  public static function SalvarBiedisactmuenew($clase)
  {
    try{
      if (self::Actualizar_Mueble($clase)!= -1) return 0;
      $clase->save();
      return -1;

    }catch (Exception $ex){
      return 0;
    }
  }

  public static function Actualizar_Mueble($clase)
  {
    try{
      #Paso 1
      $c = new Criteria();
      $c->add(BndisbiePeer::CODDIS,substr($clase->getTipdismue(),0,10));
      $bndisbie = BndisbiePeer::doSelectOne($c);
      $encontro = false;
      $adiciona = false;

      if ($bndisbie){
        if ($bndisbie->getDesinc()=='S'){
          $encontro = true;
        }
        if ($bndisbie->getAdimej()=='S'){
          $adiciona = true;
        }
      }

      #Paso 2
      $c = new Criteria();
      $c->add(BnregmuePeer::CODACT,$clase->getCodact());
      $c->add(BnregmuePeer::CODMUE,$clase->getCodmue());
      $bnregmue = BnregmuePeer::doSelectOne($c);

      if ($bnregmue)
      {
        if ($encontro){
            $bnregmue->setStamue('D');
        }else{
            $bnregmue->setCodubi($clase->getCodubides());
        }

        if (($adiciona) and $clase->getId()=='')
        {
          $bnregmue->setValadi($clase->getValadi() + $clase->getMondismue());
        }
        $bnregmue->save();
      }

      return -1;

    } catch (Exception $ex){
      return 0;
    }
  }

  public static function grabarComprobante($clase,$bnregmue,&$arrcompro,$desincorpora,$bndefcon)
  {
    $mensaje="";
    $numeroorden="";
    $r='';
    /*if ($clase->getRefing()=='########')
    {
      if (Herramientas::getVerCorrelativo('cortras','cidefniv',&$r))
      {
         $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(CitraslaPeer::REFTRA,$numero);
          $resul= CitraslaPeer::doSelectOne($c);
          if ($resul)
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $numorden=$numero;
      }
    }else{
      $numorden=str_replace('#','0',$clase->getRefing());
    }*/
    $numorden="ACM".substr($clase->getNrodismue(),-5,10);
    //$numerocomprob = $numeroorden;
    $numerocomprob=Comprobante::Buscar_Correlativo();
    $cuentaporpagarrendicion = "";

    $codigocuenta = "";
    $tipo  = "";
    $des   = "";
    $monto = "";

    $codigocuenta1 = "";
    $tipo1  = "";
    $desc1   = "";
    $monto1 = "";

    $codigocuenta2 = "";
    $tipo2  ="";
    $desc2   ="";
    $monto2 ="";

    $cuentas= "";
    $tipos  = "";
    $montos ="";
    $descr  ="";

    $msjuno = "";
    $msjdos = "";

    $depacu   = H::FormatoMonto($bnregmue->getDepacu(),0);
    $valini   = H::FormatoMonto($bnregmue->getValini(),0);
    $valadi   = H::FormatoMonto($bnregmue->getValadi(),0);;
    $descri = split('-',$clase->getTipdismue());
    $descripC = $descri[1];
    $ctadepcar= $bndefcon->getCtadepcar();  //CuentaCar
    $CuentaAbo= $bndefcon->getCtadepabo();
    $CuentaPedida= $bndefcon->getCtapercar();

    if (!$desincorpora)
    {
        $codigocuenta1  = $ctadepcar;
        $desc1 = $descripC;
        $tipo1 = 'D';
        $monto1 = $clase->getMondismue();
    }else{
        $codigocuenta1  = $ctadepcar;
        $desc1 = $descripC;
        $tipo1 = 'D';
        $monto1 = $depacu;

        if (($valini + $valadi) - $depacu > 0)
        {
          $codigocuenta1  = $codigocuenta1."_".$CuentaPedida;
          $desc1 = $desc1."_".$descripC;
          $tipo1 = $tipo1."_".'D';
          $monto1 = $monto1."_".(($valini + $valadi) - $depacu);
        }

        $codigocuenta2 = $CuentaAbo;
        $desc2 = $descripC;
        $tipo2 = 'C';
        $monto2 = ($valini + $valadi);
    }

      $cuentas = $codigocuenta1.'_'.$codigocuenta2;
      $descr   = $desc1.'_'.$desc2;
      $tipos   = $tipo1.'_'.$tipo2;
      $montos  = $monto1.'_'.$monto2;

      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom($numerocomprob);  //Correlativo
      $clscommpro->setReftra($numorden);
      $clscommpro->setFectra(date("d/m/Y",strtotime($clase->getFecdismue())));
      $descri = split('-',$clase->getTipdismue());
      $clscommpro->setDestra($descri[1]);
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;

  return true;
  }

}
?>
