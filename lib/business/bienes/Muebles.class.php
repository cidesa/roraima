<?php
/**
 * Muebles: Clase estática para el manejo de los Bienes Muebles
 *
 * @package    Roraima
 * @subpackage bienes
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Muebles
{

    /**************************************************************************
   **                       Formulario bieregsegmue                         **
   **                       Jesus Lobaton                                   **
   **************************************************************************/
  /**
   * Función para registrar
   *
   * @static
   * @param $Bnsegmue Object a guardar
   * @return void
   */
  public static function salvarbieregsegmue($bnsegmue,$grid)
  {
    if ( self::salvarsegmue($bnsegmue)==-1)
    {
    //salvar detalle
    $codact = $bnsegmue->getCodact();
    $codmue = $bnsegmue->getCodmue();
    $nrosegmue = $bnsegmue->getNrosegmue();

    $x = $grid[0];
    $j = 0;

    while ($j < count($x)) {
      $x[$j]->setCodact($codact);
      $x[$j]->setCodmue($codmue);
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

  public static function salvarsegmue($bnsegmue)
  {
   if (date('Y-m-d') > $bnsegmue->getFecsegven())
     {
       $bnsegmue->setStasegmue('V');
     }else{
       $bnsegmue->setStasegmue('A');
     }
    $bnsegmue->save();
  return '-1';
  }
    /**************************************************************************
   **                           FIN                                         **
   **                       Jesus Lobaton                                   **
   **************************************************************************/

public static function validarBieregsegmue($bnsegmue,&$msj)
 {
    $c= new Criteria();
    $c->add(BnsegmuePeer::CODACT,$bnsegmue->getCodact());
    $c->add(BnsegmuePeer::CODMUE,$bnsegmue->getCodmue());
    $c->add(BnsegmuePeer::NROSEGMUE,$bnsegmue->getNrosegmue());
    $resul= BnsegmuePeer::doSelectOne($c);
    if ($resul)
    {
      return $msj=201;
    }
    else
    {
      return $msj=-1;
    }

 }

 public static function validarBndefcon($bndefcon,&$msj)
 {
    $c= new Criteria();
    $c->add(BndefconPeer::CODACT,$bndefcon->getCodact());
    $c->add(BndefconPeer::CODMUE,$bndefcon->getCodmue());
    $resul= BndefconPeer::doSelectOne($c);
    if ($resul)
    {
      return $msj=202;
    }
    else
    {
      return $msj=-1;
    }

 }

public static function Validar_biedisactmuenew($valor1,$valor2)
{
  $val = -1;
  {
                     if (($valor1>= $valor2) and ($valor2))
                      { // print 'entre';exit;
                        $val=416;
                      }
        return $val;
 }
}


  public static function SalvarBiedisactmuenew($clase)
  {
    try{
      if (self::Actualizar_Mueble($clase)!= -1) return 0;

       $tienecorrelativo=false;
       if (Herramientas::getVerCorrelativo('corrmue','bndefins',&$r))
       {
	      if ($clase->getNrodismue()=='##########')
	      {
	      	$tienecorrelativo=true;
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 10, '0', STR_PAD_LEFT);

	          $sql="select nrodismue from bndismue where codact='".$clase->getCodact()."' and codmue='".$clase->getCodmue()."' and nrodismue='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,&$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	        $clase->setNrodismue(str_pad($r, 10, '0', STR_PAD_LEFT));
	      }
	      else
	      {
	        $clase->setNrodismue(str_replace('#','0',$clase->getNrodismue()));
	      }
    }

	  if ($tienecorrelativo)
	  {
	     Herramientas::getSalvarCorrelativo('corrmue','bndefins','Referencia',$r,&$msg);
	  }
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

  public static function EliminarBiedisactmuenew($bndismue)
  {
    if (self::Elimina_Comprobantes($bndismue) != -1) return 0;
    if (self::Reactualizar_Mueble($bndismue) != -1) return 0;
    $codact=$bndismue->getCodact();
    $codmue=$bndismue->getCodmue();
    $bndismue->delete();
    self::actualizarUbicacion($codact,$codmue);
    return -1;
  }

  public static function Elimina_Comprobantes($bndismue)
  {
    try
    {
      $numerocomprobante="ACM".substr($bndismue->getNrodismue(),-5,10);
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


  public static function Reactualizar_Mueble($bndismue)
  {
    try
    {
      $encontro = false;
      $descri = split('-',$bndismue->getTipdismue());
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
      $c->add(BnregmuePeer::CODACT,$bndismue->getCodact());
      $c->add(BnregmuePeer::CODMUE,$bndismue->getCodmue());
      $reg = BnregmuePeer::doSelectone($c);
      if ($reg)
      {
        if ($encontro)
        {
          $reg->setStamue('A');
        }else
        {
          $reg->setCodubi($bndismue->getCodubiori());
        }
        $reg->save();
      }

    return -1;

    } catch (Exception $ex){
      return 0;
    }
  }

  public static function actualizarUbicacion($codact,$codmue)
  {
    try
    {
      $c= new Criteria();
      $c->add(BnregmuePeer::CODACT,$codact);
      $c->add(BnregmuePeer::CODMUE,$codmue);
      $reg= BnregmuePeer::doSelectOne($c);
      if ($reg)
      {
         $sql="select  codubiori,codubides from bndismue where id = (
				select max(id) from (
				select codubiori,codubides,id from bndismue where codact='".$codact."' and codmue='".$codmue."' and ( length(trim(codubiori))>0 and length(trim(codubides)) > 0 )
				union
				select codubiori,codubides,id from bndismue where codact='".$codact."' and codmue='".$codmue."' and substring(tipdismue,1, instr1(tipdismue,' ')-1)='".$reg->getCoddis()."'
				) as bienes	)";
	     if (Herramientas::BuscarDatos($sql,&$result))
	     {
           if (trim($result[0]["codubides"])=="")
           {
           	 $reg->setCodubi($result[0]["codubiori"]);
           }else {
           	$reg->setCodubi($result[0]["codubides"]);
           }
           $reg->save();
	     }
      }

      return -1;

    } catch (Exception $ex){
      return 0;
    }
  }

}
?>