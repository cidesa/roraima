<?php
/**
 * Inmuebles: Clase estática para el manejo de los Bienes Inmuebles
 *
 * @package    Roraima
 * @subpackage bienes
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Inmuebles
{

    /**************************************************************************
   **         Registro de Inmueble Formulario Bieregseginm                  **
   **                       Jesus Lobaton                                   **
   **************************************************************************/
  /**
   * Función para registrar un Seguro de Inmuebles
   *
   * @static
   * @param $Bnseginm Object a guardar
   * @return void
   */
  public static function salvarbieregseginm($bnseginm,$grid)
  {
    if ( self::salvarseginm($bnseginm)==-1)
    {
       //salvar detalle
    $codact = $bnseginm->getCodact();
    $codmue = $bnseginm->getCodmue();
    $nrosegmue = $bnseginm->getNroseginm();

    $x = $grid[0];
    $j = 0;

    while ($j < count($x)) {
      $x[$j]->setCodact($codact);
      $x[$j]->setCodinm($codmue);
      $x[$j]->setNrosegmue($nrosegmue);
      $x[$j]->save();
      $j++;
    }
    $z = $grid[1];
    $j = 0;
    if (!empty ($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }
    }
   return -1;
    }
  }

  public static function salvarseginm($bnseginm)
  {
   if (date('Y-m-d') > $bnseginm->getFecsegven())
     {
       $bnseginm->setStaseginm('V');
     }else{
       $bnseginm->setStaseginm('A');
     }
    $bnseginm->save();
  return '-1';
  }
    /**************************************************************************
   **                           FIN                                         **
   **                       Jesus Lobaton                                   **
   **************************************************************************/

 public static function validarBieregseginm($bnseginm,&$msj)
 {
    $c= new Criteria();
    $c->add(BnseginmPeer::CODACT,$bnseginm->getCodact());
    $c->add(BnseginmPeer::CODMUE,$bnseginm->getCodmue());
    $c->add(BnseginmPeer::NROSEGINM,$bnseginm->getNroseginm());
    $resul= BnseginmPeer::doSelectOne($c);
    if ($resul)
    {
      return $msj=200;
    }
    else
    {
      return $msj=-1;
    }

 }

  public static function Validar_biedisactinm($valor1,$valor2)
  {
    $val = -1;
    {
      if (($valor1>= $valor2) and $valor1 and $valor2)
       {
         $val=416;
       }
    return $val;
   }
  }


  public static function SalvarBiedisactinm($clase)
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
      $c->add(BndisbiePeer::CODDIS,substr($clase->getTipdisinm(),0,6));
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
      $c->add(BnreginmPeer::CODACT,$clase->getCodact());
      $c->add(BnreginmPeer::CODINM,$clase->getCodmue());
      $bnreginm = BnreginmPeer::doSelectOne($c);

      if ($bnreginm)
      {
        if ($encontro){
            $bnreginm->setStainm('D');
        }else{
            $bnreginm->setCodubi($clase->getCodubides());
        }

        if (($adiciona) and $clase->getId()=='')
        {
          $bnreginm->setValadi($clase->getValadi() + $clase->getMondisinm());
        }
        $bnreginm->save();
      }

      return -1;

    } catch (Exception $ex){
      return 0;
    }
  }

  public static function grabarComprobante($clase,$bnreginm,&$arrcompro,$desincorpora,$bndefcon)
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
    $numorden="ACI".substr($clase->getNrodisinm(),-5,10);
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

    $depacu   = H::FormatoMonto($bnreginm->getDepacu(),0);
    $valini   = H::FormatoMonto($bnreginm->getValini(),0);
    $valadi   = H::FormatoMonto($bnreginm->getValadi(),0);;
    $descri = split('-',$clase->getTipdisinm());
    $descripC = $descri[1];
    $ctadepcar= $bndefcon->getCtadepcar();  //CuentaCar
    $CuentaAbo= $bndefcon->getCtadepabo();
    $CuentaPedida= $bndefcon->getCtapercar();

    if (!$desincorpora)
    {
        $codigocuenta1  = $ctadepcar;
        $desc1 = $descripC;
        $tipo1 = 'D';
        $monto1 = $clase->getMondisinm();
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
      $clscommpro->setFectra(date("d/m/Y",strtotime($clase->getFecdisinm())));
      $descri = split('-',$clase->getTipdisinm());
      $clscommpro->setDestra($descri[1]);
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;

  return true;
  }


  public static function EliminarBiedisactinm($bndisinm)
  {
    if (self::Elimina_Comprobantes($bndisinm) != -1) return 0;
    if (self::Reactualizar_Mueble($bndisinm) != -1) return 0;
    $bndisinm->delete();
    return -1;
  }

  public static function Elimina_Comprobantes($bndisinm)
  {
    try
    {
      $numerocomprobante="ACI".substr($bndisinm->getNrodisinm(),-5,10);
      $c = new criteria();
      $c->add(Contabc1Peer::REFASI,$numerocomprobante);
      Contabc1Peer::doDelete($c);

      $c = new criteria();
      $c->add(ContabcPeer::REFTRA,$numerocomprobante);
      ContabcPeer::doDelete($c);

    return -1;

    } catch (Exception $ex){
      return 0;
    }
  }


  public static function Reactualizar_Mueble($bndisinm)
  {
    try
    {
      $encontro = false;
      $descri = split('-',$bndisinm->getTipdisinm());
      $c = new criteria();
      $c->add(BndisbiePeer::CODDIS,$descri[1]);
      $reg = BndisbiePeer::doSelectone($c);
      if ($reg)
      {
        if ($reg->getDesinc() == 'S')
        {
          $encontro = true;
        }
      }

      $c = new criteria();
      $c->add(BnreginmPeer::CODACT,$bndisinm->getCodact());
      $c->add(BnreginmPeer::CODINM,$bndisinm->getCodmue());
      $reg = BnreginmPeer::doSelectone($c);
      if ($reg)
      {
        if ($encontro)
        {
          $reg->setStainm('A');
        }else
        {
          $reg->setCodubi($bndisinm->getCodubiori());
        }
        $reg->save();
      }

    return -1;

    } catch (Exception $ex){
      return 0;
    }
  }


}
?>