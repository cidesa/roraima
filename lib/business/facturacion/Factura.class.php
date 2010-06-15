<?php
/**
 * Factura: Clase estática para el manejo de las facturas
 *
 * @package    Roraima
 * @subpackage facturacion
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Factura.class.php 38960 2010-06-15 19:04:48Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Factura {

  public static function salvarFactura($fafactur,$grid1,$grid2,$grid3,$grid4,$tipocaja,&$msj,&$msj2,&$msj3)
  {
    if ($fafactur->getIncluircliente()=='S')
    {
      $facliente= new Facliente();
      $facliente->setCodpro($fafactur->getRifpro());
      $facliente->setRifpro($fafactur->getRifpro());
      $facliente->setNompro($fafactur->getNompro());
      if ($fafactur->getTelpro()!="") $facliente->setTelpro($fafactur->getTelpro());
      if ($fafactur->getDirpro()!="") $facliente->setDirpro($fafactur->getDirpro());
      $facliente->setTipper($fafactur->getTipper());
      $facliente->save();
    }

    if (!self::grabarComprobanteOrden(&$fafactur,$grid1,&$msj))
    {
      return true;
    }

    if ($fafactur->getTipref()=='VC')
    {
      if (!self::grabarComprobanteInv(&$fafactur,$grid1,&$msj2))
      {
      	return true;
      }
    }

    self::grabarFactura($fafactur,$grid1,$grid2,$grid3,$grid4,$tipocaja);

    if (!self::generarAsientos(&$fafactur,$grid1,$grid2,$grid3,$grid4,&$arrasientos,&$pos,&$msj3))
    {
      return true;
    }

    self::grabarComprobanteMaestro(&$fafactur,$arrasientos,&$pos);

    if ($fafactur->getTipconpag()=='R') //Pago a Crédito
    {
      self::documentoXCobrar($fafactur);
      self::recargosXCobrar($fafactur,$grid4);
      self::descuentoXCobrar($fafactur,$grid2);
    }

    if ($fafactur->getTipconpag()=='C') //Pago a Contado
    {
    //  self::grabarIngreso($fafactur,$grid3);
    //  self::grabarImpIng($fafactur);
    }

    return true;

  }

  public static function grabarComprobanteOrden(&$fafactur,$grid1,&$msj)
  {
  	$grabarcomprobante=true;
  	$monto=0;
  	$cant=0;
  	$msj=-1;
    $col=self::determinarReferenciaDoc($fafactur->getTipref());

  	$x=$grid1[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getPrecio()!="") { $precio=$x[$j]->getPrecio(); }
     else { $precio=$x[$j]->getPrecioe();}
     if ($x[$j]->getCodctapro()!="" || $fafactur->getTipref()=="VC")
     {
     	eval('$cant = $x[$j]->get'.ucfirst(strtolower($col)).'();');
        $monto= $monto + ($cant * $precio);
     }
     $j++;
    }

    if ($monto>0)
    {
      $numcomord="FO".substr($fafactur->getReffac(),2,6);
       $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
        {
          $correl=$numcomord;
        }else {
           $correl=OrdendePago::Buscar_Correlativo();
        }
      $fafactur->setNumcomord($correl);

      $contabc= new Contabc();
      $contabc->setNumcom($correl);
      $contabc->setReftra($numcomord);
      $contabc->setFeccom($fafactur->getfecfac());
      if ($fafactur->getTipref()=='VC')
      {
      	$contabc->setDescom('Relación del Cliente de Mercancía Cedida en Consignación según Factura Nro. '.$fafactur->getReffac());
      }
      else
      {
        $contabc->setDescom('Venta de Mercancía a Consignación en la Factura Nro. '.$fafactur->getReffac());
      }
      $contabc->setStacom('D');
      $contabc->setTipcom(null);
      $contabc->setMoncom($monto);

      $numasi=0;
      if ($fafactur->getTipref()=='VC')
      {
      	$prov=$fafactur->getCodcli();
      	$cuenta=self::buscarCtaConsig('C',$prov,'P');
      	if ($cuenta!='')
      	{
      	  $numasi= $numasi +1;
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl);
          $contabc1->setFeccom($fafactur->getFecfac());
          $contabc1->setDebcre('D');
          $contabc1->setCodcta($cuenta);
          $contabc1->setNumasi($numasi);
          $contabc1->setRefasi($numcomord);
          $contabc1->setDesasi(H::getX('Codcta','Contabb','Descta',$cuenta));
          $contabc1->setMonasi($monto);

      	}
      	else
      	{
          $msj=1128;
          $grabarcomprobante=false;
          return $grabarcomprobante;
      	}

      	$cuenta2=self::buscarCtaConsig('C',$prov,'O');
      	if ($cuenta2!='')
      	{
      	   $contabc->save(); //Debido al rollback
      	   $contabc1->save(); //Debido al rollback

          $numasi= $numasi +1;
          $contabc2= new Contabc1();
          $contabc2->setNumcom($correl);
          $contabc2->setFeccom($fafactur->getFecfac());
          $contabc2->setDebcre('C');
          $contabc2->setCodcta($cuenta2);
          $contabc2->setNumasi($numasi);
          $contabc2->setRefasi($numcomord);
          $contabc2->setDesasi(H::getX('Codcta','Contabb','Descta',$cuenta2));
          $contabc2->setMonasi($monto);
          $contabc2->save();
      	}
      	else
      	{
      	  $msj=1129;
          $grabarcomprobante=false;
          return $grabarcomprobante;
      	}
      }
      else
      {
        $x=$grid1[0];
	    $j=0;
	    while ($j<count($x))
	    {
	     if ($x[$j]->getPrecio()!="") { $precio=$x[$j]->getPrecio(); }
         else { $precio=$x[$j]->getPrecioe();}
	     if ($x[$j]->getCodctapro()!="" || $fafactur->getTipref()=="VC")
	     {
	       $prov=$x[$j]->getCodctapro();
	       eval('$cant = $x[$j]->get'.ucfirst(strtolower($col)).'();');
           $monto= $monto + ($cant * $precio);
           $cuenta=self::buscarCtaConsig('P',$prov,'P');
	      	if ($cuenta!='')
	      	{
	      	  $c= new Criteria();
	      	  $c->add(Contabc1Peer::NUMCOM,$correl);
	      	  $c->add(Contabc1Peer::CODCTA,$cuenta);
	      	  $c->add(Contabc1Peer::DEBCRE,'D');
	      	  $contabc1= Contabc1Peer::doSelectOne($c);
	      	  if ($contabc1)
	      	  {
	      	  	$contabc1->setMonasi($data->getMonasi() +$monto);
	      	  }
	      	  else
	      	  {
	      	    $numasi= $numasi +1;
	            $contabc1= new Contabc1();
	            $contabc1->setNumcom($correl);
	            $contabc1->setFeccom($fafactur->getFecfac());
	            $contabc1->setDebcre('D');
	            $contabc1->setCodcta($cuenta);
	            $contabc1->setNumasi($numasi);
	            $contabc1->setRefasi($numcomord);
	            $contabc1->setDesasi(H::getX('Codcta','Contabb','Descta',$cuenta));
	            $contabc1->setMonasi($monto);
	      	  }
	      	}
	      	else
	      	{
	      	  $msj=1130;
              $grabarcomprobante=false;
              return $grabarcomprobante;
	      	}

	        $cuenta2=self::buscarCtaConsig('P',$prov,'O');
	      	if ($cuenta2!='')
	      	{
	      	  $contabc->save(); //Debido al rollback
      	      $contabc1->save(); //Debido al rollback

	      	  $c= new Criteria();
	      	  $c->add(Contabc1Peer::NUMCOM,$correl);
	      	  $c->add(Contabc1Peer::CODCTA,$cuenta2);
	      	  $c->add(Contabc1Peer::DEBCRE,'C');
	      	  $data= Contabc1Peer::doSelectOne($c);
	      	  if ($data)
	      	  {
	      	  	$data->setMonasi($data->getMonasi() +$monto);
	      	  	$data->save();
	      	  }
	      	  else
	      	  {
	      	    $numasi= $numasi +1;
	            $contabc2= new Contabc1();
	            $contabc2->setNumcom($correl);
	            $contabc2->setFeccom($fafactur->getFecfac());
	            $contabc2->setDebcre('C');
	            $contabc2->setCodcta($cuenta2);
	            $contabc2->setNumasi($numasi);
	            $contabc2->setRefasi($numcomord);
	            $contabc2->setDesasi($fafactur->getDesfac());
	            $contabc2->setMonasi($monto);
	            $contabc2->save();
	      	  }
	      	}
	      	else
	      	{
	      	  $msj=1131;
              $grabarcomprobante=false;
              return $grabarcomprobante;
	      	}
	     }
	     $j++;
	    }
      }
    }
    else
    {
      $grabarcomprobante=true;
    }

    return $grabarcomprobante;
  }

  public static function determinarReferenciaDoc($documento)
  {
    if ($documento=='V')
    {
      $colum='cantot';
    }

    if ($documento=='P')
    {
      $colum='canent';
    }

    if ($documento=='D' || $documento=='VC')
    {
      $colum='candesp';
    }
    return $colum;
  }

  public static function buscarCtaConsig($tipo,$prove,$ord_per)
  {
  	$busctasig="";
    if ($tipo=='P')
    {
      $c= new Criteria();
      $c->add(CaproveePeer::CODPRO,$prove);
      $reg= CaproveePeer::doSelectOne($c);
    }
    else
    {
      $c= new Criteria();
      $c->add(FaclientePeer::CODPRO,$prove);
      $reg= FaclientePeer::doSelectOne($c);
    }

    if ($reg)
    {
      if ($ord_per=='O')
      {
      	$busctasig=$reg->getCodordmercon();
      }else $busctasig=$reg->getCodperdmercon();

      $c= new Criteria();
      $c->add(ContabbPeer::CODCTA,$busctasig);
      $dat= ContabbPeer::doSelectOne($c);
      if (!$dat)
      {
      	$busctasig="";
      }
    }
    else $busctasig="";

    return $busctasig;
  }

  public static function generarAsientos(&$fafactur,$grid1,$grid2,$grid3,$grid4,&$arrasientos,&$pos,&$msj3)
  {
  	$msj3=-1;
  	$salactual=H::toFloat($fafactur->getTottotart()) - H::toFloat($fafactur->getMondesc());
  	$numcomord="FA".substr($fafactur->getReffac(),2,6);
  	$correl=OrdendePago::Buscar_Correlativo();
  	//$fafactur->setNumcom($correl);
  	$arrasientos=array();
  	$pos=0;
    $col=self::determinarReferenciaDoc($fafactur->getTipref());

    if ($fafactur->getTipconpag()=='R') //Asiento Contable d Cta x Cobrar a Cliente
    {
      $ctacont=$fafactur->getCtacli();
      if ($ctacont!=""){
      $desdoc=H::getX('codcta','Contabb','Descta',$ctacont);
      self::guardarAsientos($ctacont,$desdoc,'D',$salactual,&$arrasientos,&$pos);
      }else{
      	$msj3=1147;
      	return false;
      }
    }
    else
    {
      $x=$grid3[0];
	  $j=0;
	  while ($j<count($x))
	  {
        $c= new Criteria();
        $c->add(FatippagPeer::ID,$x[$j]->getTippag());
        $data= FatippagPeer::doSelectOne($c);
        if ($data)
        {
          if ($data->getGenmov()=='S')
          {
            $a= new Criteria();
            $a->add(TsdefbanPeer::NUMCUE,$x[$j]->getNomban());
            $reg= TsdefbanPeer::doSelectOne($a);
            if ($reg)
            {
              $ctaban=$reg->getCodcta();
              if ($ctaban!=""){
              $desdoc=H::getX('codcta','Contabb','Descta',$ctaban);
              self::guardarAsientos($ctaban,$desdoc,'D',$x[$j]->getMonpag(),&$arrasientos,&$pos);
              }else{
            	$msj3=1149;
      	        return false;
              }
            }else{
            	$msj3=1148;
      	        return false;
            }
          }
          else  //Asiento Contable de Venta al Contado
          {
            $a= new Criteria();
            $reg= CadefartPeer::doSelectOne($a);
            if ($reg)
            {
              $ctaVco= $reg->getCtavco();
              if ($ctaVco!=""){
              $desdoc=H::getX('codcta','Contabb','Descta',$ctaVco);
              self::guardarAsientos($ctaVco,$desdoc,'D',$x[$j]->getMonpag(),&$arrasientos,&$pos);
              }else{
            	$msj3=1150;
      	        return false;
              }
            }
          }
        }
        else //Asiento Contable de Venta al Contado
        {
          $a= new Criteria();
          $reg= CadefartPeer::doSelectOne($a);
          if ($reg)
          {
            $ctaVco= $reg->getCtavco();
            if ($ctaVco!=""){
              $desdoc=H::getX('codcta','Contabb','Descta',$ctaVco);
              self::guardarAsientos($ctaVco,$desdoc,'D',$x[$j]->getMonpag(),&$arrasientos,&$pos);
            }else{
            	$msj3=1150;
      	        return false;
            }
          }
        }
	  	$j++;
	  }
    }

     if ($fafactur->getVuelto()>0)  //Asiento Contable del Vuelto
     {
       if ($ctaVco=="")
       {
       	 $a= new Criteria();
         $reg= CadefartPeer::doSelectOne($a);
         if ($reg)
         {
           $ctaVco= $reg->getCtavco();
           if ($ctaVco!="") {
            $desdoc=H::getX('codcta','Contabb','Descta',$ctaVco);
            self::guardarAsientos($ctaVco,$desdoc,'C',$fafactur->getVuelto(),&$arrasientos,&$pos);
           }else{
            	$msj3=1150;
      	        return false;
            }
         }
       }
       else
       {
       	 $desdoc=H::getX('codcta','Contabb','Descta',$ctaVco);
       	 self::guardarAsientos($ctaVco,$desdoc,'C',$fafactur->getVuelto(),&$arrasientos,&$pos);
       }
     }

      $z=$grid2[0]; //Asiento Contable de los Descuentos
	  $i=0;
	  if (count($z)>0)
	  {
         while($i<count($z))
         {
           if ($z[$i]->getCoddesc()!="")
           {
           if ($z[$i]->getCodcta()!="")
           {
            $cuencon=$z[$i]->getCodcta();
            if ($cuencon!=""){
            $descrip=H::getX('codcta','Contabb','Descta',$cuencon);
            self::guardarAsientos($cuencon,$descrip,'D',$z[$i]->getMondesc(),&$arrasientos,&$pos);
            }else{
              $msj3=1151;
      	      return false;
            }
           }else{
              $msj3=1151;
      	      return false;
            }
           }
           $i++;
         }
	  }

	  $w=$grid4[0]; //Asiento Contable de los Recargos
	  $l=0;
	  if (count($w)>0)
	  {
         while($l<count($w))
         {
          if ($w[$l]->getCodrgo()!="")
          {
           if ($w[$l]->getCodcta()!="")
           {
            $cuencon=$w[$l]->getCodcta();
            if ($cuencon!=""){
             $descrip=H::getX('codcta','Contabb','Descta',$cuencon);
             $c = new Criteria();
             $c->add(FargoartPeer::REFDOC,$fafactur->getReffac());
             $c->add(FargoartPeer::CODRGO,$w[$l]->getCodrgo());
             $per = FargoartPeer::doSelectOne($c);
             if($per)
                $monrgo=$per->getMonrgo();
             else
                $monrgo=$w[$l]->getMonrgo();
             self::guardarAsientos($cuencon,$descrip,'C',$monrgo,&$arrasientos,&$pos);
            }else{
              $msj3=1152;
      	      return false;
            }
           }else{
              $msj3=1152;
      	      return false;
            }
          }
           $l++;
         }
	  }

      $cant=0;
	  $x=$grid1[0]; //Asiento Contable de la Cta de Venta
	  $j=0;
	  while($j<count($x))
      {
        if ($x[$j]->getCodart()!="")
        {

          if ($x[$j]->getBlanco2()=='0,00' && $fafactur->getTipref()!='VC')
          {
             eval('$cant = $x[$j]->get'.ucfirst(strtolower($col)).'();');
             if ($x[$j]->getPrecio()!="") { $precio=$x[$j]->getPrecio(); }
             else { $precio=$x[$j]->getPrecioe();}
             $monto_ingreso=round(($cant * $precio),2);
          }
          else
          {
          	if ($fafactur->getTipref()=='VC')
          	{
              $d= new Criteria();
              $d->add(FaartproPeer::CODPRO,$fafactur->getCodcli());
              $d->add(FaartproPeer::CODART,$x[$j]->getCodart());
              $d->add(FaartproPeer::TIPPER,'C');
              $dat= FaartproPeer::doSelectOne($d);
              if ($dat)
              {
              	$porcentaje=$dat->getComisi();
              	$cta_provee=$dat->getCtades();
              }
              else
              {
              	$porcentaje=$x[$j]->getBlanco2();
              }
          	}
          	  eval('$cant = $x[$j]->get'.ucfirst(strtolower($col)).'();');
          	  if ($x[$j]->getPrecio()!="") { $precio=$x[$j]->getPrecio(); }
             else { $precio=$x[$j]->getPrecioe();}
              $monaux=round((($cant* $precio*$porcentaje)/100),2);
              $monto_ingreso=round((($cant*$precio)-$monaux),2);
          }

          $cta_vta=H::getX('Codart','Caregart','Ctavta',$x[$j]->getCodart());
          if ($cta_vta!="")
          {
            if (!self::buscarAsientos($cta_vta,'C',$monto_ingreso,&$arrasientos,&$pos))
            {
              $descrip=H::getX('codcta','Contabb','Descta',$cta_vta);
              self::guardarAsientos($cta_vta,$descrip,'C',$monto_ingreso,&$arrasientos,&$pos);
            }
          }else{
              $msj3=1153;
      	      return false;
          }

          if ($x[$j]->getBlanco2()!='0,00' || $fafactur->getTipref()=='VC')
          {
          	eval('$cant = $x[$j]->get'.ucfirst(strtolower($col)).'();');
          	if ($x[$j]->getPrecio()!="") { $precio=$x[$j]->getPrecio(); }
             else { $precio=$x[$j]->getPrecioe();}
          	$monto_provee=round((($cant* $precio*$porcentaje)/100),2);
          	if ($fafactur->getTipref()!='VC')
          	{
              $f= new Criteria();
              $f->add(CaproveePeer::CODPRO,$x[$j]->getCodctapro());
              $reg= CaproveePeer::doSelectOne($f);
              if ($reg)
              {
              	$cta_provee=$reg->getCodcta();
              }else $cta_provee="";
          	}
          	if ($cta_provee!="")
          	{
          	    if (!self::buscarAsientos($cta_provee,'C',$monto_provee,&$arrasientos,&$pos))
	            {
	              $descrip=H::getX('codcta','Contabb','Descta',$cta_provee);
	              self::guardarAsientos($cta_provee,$descrip,'C',$monto_provee,&$arrasientos,&$pos);
	            }
          	}else{
          	  $msj3=1154;
      	      return false;
          	}
          }

        }
      	$j++;
      }
     return true;
  }

  public static function guardarAsientos($ctacont,$desdoc,$debcre,$monto,&$arrasientos,&$pos)
  {
    $i=0;
	while ($i<=($pos-1))
	{
      if ($arrasientos[$i]["0"]==$ctacont && $arrasientos[$i]["2"]==$debcre)
      {
      	$arrasientos[$i]["3"]=($arrasientos[$i]["3"] + $monto);
      	return true;
      }
	   $i++;
	}
	$arrasientos[$pos]["0"]=$ctacont;
    $arrasientos[$pos]["1"]=$desdoc;
    $arrasientos[$pos]["2"]=$debcre;
    $arrasientos[$pos]["3"]=$monto;
    $pos= $pos +1;
    return true;
  }

  public static function buscarAsientos($codcta,$debcre,$monasi,&$arrasientos,&$pos)
  {
    $busasi=false;
    $i=0;
	while ($i<=($pos-1))
	{
      if ($arrasientos[$i]["0"]==$codcta && $arrasientos[$i]["2"]==$debcre)
      {
      	$arrasientos[$i]["3"]=$arrasientos[$i]["3"] + $monasi;
      	$busasi=true;
      	return $busasi;
      }
	   $i++;
	}
	return $busasi;
  }

  public static function grabarComprobanteMaestro(&$fafactur,$arrasientos,&$pos)
  {
    $reftra="FA".substr($fafactur->getReffac(),2,6);
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $correl3=$reftra;
    }else {
    $correl3=OrdendePago::Buscar_Correlativo();
    }
    $contabc = new Contabc();
    $contabc->setNumcom($correl3);
    $contabc->setReftra($reftra);
    $contabc->setFeccom($fafactur->getFecfac());
    $contabc->setDescom($fafactur->getDesfac());
    $contabc->setStacom('D');
    $contabc->setTipcom(null);
    $contabc->setMoncom($fafactur->getMonfac());
    $contabc->save();

    $fafactur->setNumcom($correl3);

    self::grabarComprobanteDetalle($fafactur,$correl3,$arrasientos,&$pos);
  }

  public static function grabarComprobanteDetalle($fafactur,$correl3,$arrasientos,&$pos)
  {
    if ($pos!=0)
    {
      $i=0;
	  while ($i<=($pos-1))
	  {
	  	if ($arrasientos[$i]["2"]!="")
	  	{
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl3);
          $contabc1->setFeccom($fafactur->getFecfac());
          $contabc1->setCodcta($arrasientos[$i]["0"]);
          $numasi= $i +1;
          $contabc1->setNumasi($numasi);
          $contabc1->setRefasi($fafactur->getReffac());
          $contabc1->setDesasi($arrasientos[$i]["1"]);
          if ($arrasientos[$i]["2"]=='D')
          {
          	$contabc1->setDebcre('D');
          	$contabc1->setMonasi($arrasientos[$i]["3"]);
          }
          else
          {
          	$contabc1->setDebcre('C');
          	$contabc1->setMonasi($arrasientos[$i]["3"]);
          }
          $contabc1->save();
	  	}
	  	$i++;
	  }
    }
  }

  public static function grabarComprobanteInv(&$fafactur,$grid1,&$msj2)
  {
    $grabarcomprobanteinv=true;
    $msj2=-1;
    $montotot=self::calcularCostoPro($fafactur,$grid1);
    $col=self::determinarReferenciaDoc($fafactur->getTipref());
    $cant=0;

    if ($montotot>0)
    {
       $numcomprobinv="FI".substr($fafactur->getReffac(),2,6);
      $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
        {
          $correl2=$numcomprobinv;
        }else {
        $correl2=OrdendePago::Buscar_Correlativo();
        }

      $fafactur->setNumcominv($correl2);
      $contabc= new Contabc();
      $contabc->setNumcom($correl2);
      $contabc->setReftra($numcomprobinv);
	  $contabc->setFeccom($fafactur->getFecfac());
	  $contabc->setDescom('Disminución de Inventario según Relación de Mercancía a Consignación de la Factura Nro. '.$fafactur->getReffac());
	  $contabc->setStacom('D');
	  $contabc->setTipcom(null);
	  $contabc->setMoncom($montotot);


	  $numasiento=0; //Grabamos el Debito. Costo de  Venta de cada Articulo
	  $x=$grid1[0];
	  $j=0;
	  while($j<count($x))
      {
        $a= new Criteria();
        $a->add(CaregartPeer::CODART,$x[$j]->getCodart());
        $resul= CaregartPeer::doSelectOne($a);
        if ($resul)
        {
          eval('$cant = $x[$j]->get'.ucfirst(strtolower($col)).'();');
          $monto=$cant*$resul->getCospro();
          if ($monto>0)
          {
            $f= new Criteria();
            $f->add(Contabc1Peer::NUMCOM,$correl2);
            $f->add(Contabc1Peer::FECCOM,$fafactur->getFecfac());
            $f->add(Contabc1Peer::CODCTA,$resul->getCtacos());
            $resul2= Contabc1Peer::doSelectOne($f);
            if ($resul2)
            {
              $contabc->save();
              $resul2->setMonasi($resul2->getMonasi() + $monto);
              $resul2->save();
            }
            else
            {
              $k= new Criteria();
              $k->add(ContabbPeer::CODCTA,$resul->getCtacos());
              $resul2= ContabbPeer::doSelectOne($k);
              if ($resul2)
              {
              	$contabc->save();
                $numasiento= $numasiento + 1;
                $contabc1= new Contabc1();
		        $contabc1->setNumcom($correl2);
		        $contabc1->setFeccom($fafactur->getFecfac());
		        $contabc1->setCodcta($resul->getCtacos());
		        $contabc1->setNumasi($numasiento);
		        $contabc1->setRefasi($numcomprobinv);
		        $contabc1->setDesasi($resul2->getDescta());
		        $contabc1->setDebcre('D');
		        $contabc1->setMonasi($monto);
		        $contabc1->save();

              }
              else
              {
              	$msj2="El Artículo ".$x[$j]->getCodart()." no posee una Cuenta de Costo asociada válida... El comprobante de Inventario no será generado";
              	$grabarcomprobanteinv=false;
              	return $grabarcomprobanteinv;
              }
            }
          }
          else
          {
          	$msj2="El Artículo ".$x[$j]->getCodart()."no tiene Costo Promedio... El comprobante de Inventario no será generado";
            $grabarcomprobanteinv=false;
            return $grabarcomprobanteinv;
          }
        }
      	$j++;
      }

      $x=$grid1[0]; // Grabamos el Crédito. Cuenta de Inventario de cada Artículo
	  $j=0;
	  while($j<count($x))
      {
      	$a= new Criteria();
        $a->add(CaregartPeer::CODART,$x[$j]->getCodart());
        $resul= CaregartPeer::doSelectOne($a);
        if ($resul)
        {
          eval('$cant = $x[$j]->get'.ucfirst(strtolower($col)).'();');
          $monto=$cant*$resul->getCospro();
          if ($monto>0)
          {
          	$f= new Criteria();
            $f->add(Contabc1Peer::NUMCOM,$correl2);
            $f->add(Contabc1Peer::FECCOM,$fafactur->getFecfac());
            $f->add(Contabc1Peer::CODCTA,$resul->getCodcta());
            $resul2= Contabc1Peer::doSelectOne($f);
            if ($resul2)
            {
              $contabc->save();
              $resul2->setMonasi($resul2->getMonasi() + $monto);
              $resul2->save();
            }
            else
            {
              $k= new Criteria();
              $k->add(ContabbPeer::CODCTA,$resul->getCodcta());
              $resul2= ContabbPeer::doSelectOne($k);
              if ($resul2)
              {
              	$contabc->save();
                $numasiento= $numasiento + 1;
                $contabc1= new Contabc1();
		        $contabc1->setNumcom($correl2);
		        $contabc1->setFeccom($fafactur->getFecfac());
		        $contabc1->setCodcta($resul->getCodcta());
		        $contabc1->setNumasi($numasiento);
		        $contabc1->setRefasi($numcomprobinv);
		        $contabc1->setDesasi($resul2->getDescta());
		        $contabc1->setDebcre('C');
		        $contabc1->setMonasi($monto);
		        $contabc1->save();

              }
              else
              {
              	$msj2="El Artículo ".$x[$j]->getCodart()." no posee una Cuenta de Costo asociada válida... El comprobante de Inventario no será generado";
              	$grabarcomprobanteinv=false;
              	return $grabarcomprobanteinv;
              }
            }
          }
          else
          {
          	$msj2="El Artículo ".$x[$j]->getCodart()."no tiene Costo Promedio... El comprobante de Inventario no será generado";
            $grabarcomprobanteinv=false;
            return $grabarcomprobanteinv;
          }
        }
      	$j++;
      }
    }
    else
    {
      	$msj2="Los Articulos no tienen Costo Promedio.El comprobante de Inventario no será generado";
        $grabarcomprobanteinv=false;
        return $grabarcomprobanteinv;
    }
    return $grabarcomprobanteinv;
  }

  public static function calcularCostoPro($fafactur,$grid1)
  {
  	$calcularcostopro=0;
  	$cant=0;
  	$col=self::determinarReferenciaDoc($fafactur->getTipref());

    $x=$grid1[0];
	$j=0;
	while($j<count($x))
    {
      $c= new Criteria();
      $c->add(CaregartPeer::CODART,$x[$j]->getCodart());
      $resul= CaregartPeer::doSelectOne($c);
      if ($resul)
      {
      	eval('$cant = $x[$j]->get'.ucfirst(strtolower($col)).'();');
        $calcularcostopro=  $calcularcostopro + ($cant*$resul->getCospro());
      }
      $j++;
    }
    return $calcularcostopro;
  }

  public static function grabarFactura($fafactur,$grid1,$grid2,$grid3,$grid4,$tipocaja)
  {
    $c = new Criteria();
	$c->add(FadefcajPeer :: ID, $tipocaja);
	$reg = FadefcajPeer :: doSelectOne($c);
	if ($reg)
	{
		$reg->setCorcaj($reg->getCorcaj() +1);
		$reg->save();
	}

    $fafactur->setStatus('A');
    $fafactur->setCodcaj($tipocaja);
    $fafactur->save();

    self::grabarDescuentoArticulo($fafactur,$grid1,$grid2);
    self::grabarRecargoArticulo($fafactur,$grid1,$grid4);
    self::grabarFormaPago($fafactur,$grid3);
    self::grabarDetalleFactura($fafactur,$grid1);
  }

  public static function grabarDetalleFactura($fafactur,$grid1)
  {
  	$col=self::determinarReferenciaDoc($fafactur->getTipref());
    $x=$grid1[0];
    $j=0;
    $cantot=0;
    if ($x[$j]->getCodart()!="")
    {
        $monto=0;
      while ($j<count($x))
	  {
	  	eval('$cantot = $x[$j]->get'.ucfirst(strtolower($col)).'();');
	    if ($x[$j]->getCodart()!="" && $cantot>0)
	    {
	     $x[$j]->setReffac($fafactur->getReffac());
	     if ($x[$j]->getPrecio()=="")
	     {
	     	$x[$j]->setPrecio($x[$j]->getPrecioe());
	     }
             $c = new Criteria();
             $c->add(FaartfacproPeer::REFFAC,$fafactur->getReffac());
             $c->add(FaartfacproPeer::CODART,$x[$j]->getCodart());
             $per = FaartfacproPeer::doSelectOne($c);
             if($per)
             {
                 $per->setEstatus('P');
                 $per->save();
             }
	     $x[$j]->setCantot($cantot);
	     $x[$j]->save();

	     if ($fafactur->getTipref()!='D' && $fafactur->getTipref()!='VC')
	     {
	     	$c= new Criteria();
	     	$c->add(CaregartPeer::CODART,$x[$j]->getCodart());
	     	$result= CaregartPeer::doSelectOne($c);
	     	if ($result && $x[$j]->getBlanco2()=="A")
	     	{
	     	  $result->setDistot($result->getDistot() - $cantot);
	     	  $result->save();
	     	}
	     }
	    }
            if($x[$j]->getMonrgo()!='')
            {
                $monto+=$x[$j]->getMonrgo();
            }
	    $j++;
	  }
          $sqlrec="update fargoart set monrgo='".$monto."'
                     where  refdoc='".$fafactur->getReffac()."'";
          H::insertarRegistros($sqlrec);
    }

    $z=$grid1[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
  }

  public static function grabarDescuentoArticulo($fafactur,$grid1,$grid2)
  {
    $marcados=self::marcados('D',$grid1);
    if ($marcados>0)
    {
      $z=$grid1[0];
      $j=0;
      while ($j<count($z))
      {
        if ($z[$j]->getCodart()!="" && $z[$j]->getDesc()!="0")
        {
           $acumart=0;
           $x=$grid2[0];
           $i=0;
           while ($i<count($x))
           {
             if ($x[$i]->getCoddesc()!="" && $x[$i]->getMondesc()!="0.00")
             {
               if ($x[$i]->getTipdesc()=="M")
               {
               	 $monpro=self::proporcion($j,$grid1);
                 $descart= ($x[$i]->getMondesc() * $monpro/100);
               }
               else
               {
               	 if ($z[$j]->getPrecio()!="")
               	 {
               	 	$precio=$z[$j]->getPrecio();
               	 }else $precio=$z[$j]->getPrecioe();

                 if ($fafactur->getEsretencion()=='N')
                 {
                   $descart= (($z[$j]->getCantot() * $precio * $x[$i]->getMontdesc())/100);
                 }
                 else
                 {
                   $descart= (($z[$j]->getMonrgo() * $x[$i]->getMontdesc())/100);
                 }
               }

               $acumart= $acumart + $descart;
               if ($i==(count($x)-1))
               {
               	$diferencia= round(($acumart - $z[$j]->getMondes()),2);
               	$descart= $descart + $diferencia;
               }

               $x[$i]->setRefdoc($fafactur->getReffac());
               $x[$i]->setCodart($z[$j]->getCodart());
               $x[$i]->setMondetdesc($descart);
               $x[$i]->setTipdoc('F');
               $x[$i]->save();
             }
           	$i++;
           }
        }
      	$j++;
      }
    }

    $z=$grid2[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
  }

  public static function proporcion($fila,$grid1)
  {
  	$montotot=0;
  	$proporcion=0;
  	$x=$grid1[0];
    $l=0;
    while ($l<count($x))
    {
      if ($x[$l]->getTotart()!="" && is_numeric($x[$l]->getTotart()))
      {
        if (!is_numeric($x[$l]->getPrecio()))
        {
         $precio="0,00";
        }

        if (!is_numeric($x[$l]->getPrecioe()))
        {
         $precio="0,00";
        }

        if ($x[$l]->getPrecio()!="")
        {
        $precio=$x[$l]->getPrecio();
        }else $precio=$x[$l]->getPrecioe();

        if ($x[$l]->getDesc()=="1")
        {
          $montotot= $montotot + ($x[$l]->getCantot() * $precio);
        }
      }
      $l++;
    }
    if ($x[$fila]->getPrecio()!="")
    $precio2=$x[$fila]->getPrecio();
    else $precio2=$x[$fila]->getPrecioe();
    $proporcion = (($x[$fila]->getCantot() * $precio2 * 100)/$montotot);

   return $proporcion;
  }

  public static function marcados($tipo,$grid)
  {
    $marcados=0;
    $marca="";
    if ($tipo=='R') //Recargo
    $indice='check';
    else
    $indice='desc';

    $z=$grid[0];
    $j=0;
    while ($j<count($z))
    {
      eval('$marca = $z[$j]->get'.ucfirst(strtolower($indice)).'();');
      if ($marca=="1")
      {
      	$marcados= $marcados +1;
      }
      $j++;
    }

   return $marcados;
  }

  public static function grabarRecargoArticulo($fafactur,$grid1,$grid4)
  {
    $z=$grid4[0];
    $j=0;
    while ($j<count($z))
    {
      if ($z[$j]->getCodrgo()!="")
      {
        $x=$grid1[0];
        $i=0;
        while ($i<count($x))
        {
          if ($x[$i]->getCodart()!="" && $x[$i]->getMonrgo()!="0,00")
          {
          	$grabar=true;
          }

          if ($z[$j]->getRecfij()=="No")
          {
          	$grabar=false;
          	if ($x[$i]->getCheck()=="1")
          	{
          	  $grabar=true;
          	}
          }

          if ($grabar==true)
          {
          	$z[$j]->setCodart($x[$i]->getCodart());
          	$z[$j]->setRefdoc($fafactur->getReffac());
          	$z[$j]->setTipdoc('F');
          	$z[$j]->save();
          }
          $i++;
        }
      }
      $j++;
    }

    $z=$grid4[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
  }

  public static function grabarFormaPago($fafactur,$grid3)
  {
    $x=$grid3[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getTippag()!="" && $x[$j]->getMonpag()!=0)
      {
        $x[$j]->setReffac($fafactur->getReffac());
        $x[$j]->setNropag(str_pad($j,3,'0',STR_PAD_LEFT));
        $x[$j]->save();

        $a= new Criteria();
        $a->add(FatippagPeer::ID,$x[$j]->getTippag());
        $resul= FatippagPeer::doSelectOne($a);
        if ($resul)
        {
          if ($resul->getGenmov()=='S')
          {
          	$descop=$fafactur->getDesfac();
          	$montop=$x[$j]->getMonpag();
          	$nroreflib=$x[$j]->getNumero();
            $nrocue=$x[$j]->getNomban();
            $tipmov=$x[$j]->getCodmov();
            self::generaMovLib($fafactur,$descop,$montop,$nroreflib,$nrocue,$tipmov);
          }
        }
      }
      $j++;
    }

    $z=$grid3[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
  }

  public static function generaMovLib($fafactur,$descop,$montop,$nroreflib,$nrocue,$tipmov)
  {
  	$d= new Criteria();
  	$d->add(TsmovlibPeer::NUMCUE,$nrocue);
  	$d->add(TsmovlibPeer::REFLIB,$nroreflib);
  	$d->add(TsmovlibPeer::TIPMOV,$tipmov);
  	$resul= TsmovlibPeer::doSelectOne($d);
  	if (!$resul)
  	{
      $tsmovlib= new Tsmovlib();
      $tsmovlib->setNumcue($nrocue);
      $tsmovlib->setReflib($nroreflib);
      $tsmovlib->setFeclib($fafactur->getFecfac());
      $tsmovlib->setTipmov($tipmov);
      $tsmovlib->setDeslib($descop);
      $tsmovlib->setMonmov($montop);
      $tsmovlib->setNumcom($fafactur->getNumcom());
      $tsmovlib->setStatus('C');
      $tsmovlib->setFeccom($fafactur->getFecfac());
      $tsmovlib->setStacon('N');
      $tsmovlib->save();
  	}
  }

  public static function documentoXCobrar($fafactur)
  {
    $fatipmov = Fatipmov::getFirst();
    if(!$fatipmov){

    }else{
      $cobdocume= new Cobdocume();
      $cobdocume->setCodcli($fafactur->getCodcli());
      $cobdocume->setRefdoc(str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT));
      //$cobdocume->setCodmov('001');
      $cobdocume->setFatipmovId($fatipmov->getId());
      $cobdocume->setFecemi($fafactur->getFecfac());
      $fecven=H::dateAdd('m',1,$fafactur->getFecfac(),'+');
      $cobdocume->setFecven($fecven);
      $cobdocume->setOridoc('FAC');
      $cobdocume->setDesdoc($fafactur->getDesfac());
      $mondoc=(H::convnume($fafactur->getTottotart()) - H::convnume($fafactur->getTotmonrgo()));
      $cobdocume->setMondoc($mondoc);
      $cobdocume->setRecdoc(H::convnume($fafactur->getTotmonrgo()));
      $cobdocume->setDscdoc(H::convnume($fafactur->getMondesc()));
      $cobdocume->setAbodoc(H::convnume($fafactur->getMoncan()));
      $salact=H::convnume($fafactur->getTottotart()) - H::convnume($fafactur->getMondesc()) - H::convnume($fafactur->getMoncan());
      $cobdocume->setSaldoc($salact);
      $cobdocume->setStadoc('A');
      $cobdocume->setReffac($fafactur->getReffac());
      $cobdocume->setNumcom($fafactur->getNumcom());
      $cobdocume->setFeccom($fafactur->getFecfac());
      $cobdocume->save();
    }
  }

  public static function recargosXCobrar($fafactur,$grid4)
  {
    $x=$grid4[0];
    $j=0;
    if (count($x)>2)
    {
      while ($j<count($x))
      {
        if ($x[$j]->getCodrgo()!="")
        {
          $cobrecdoc= new Cobrecdoc();
          $cobrecdoc->setRefdoc(str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT));
          $cobrecdoc->setCodcli($fafactur->getCodcli());
          $cobrecdoc->setCodrec($x[$j]->getCodrgo());
          $cobrecdoc->setFecdoc($fafactur->getFecfac());
          $c = new Criteria();
          $c->add(FargoartPeer::REFDOC,$fafactur->getReffac());
          $c->add(FargoartPeer::CODRGO,$x[$j]->getCodrgo());
          $per = FargoartPeer::doSelectOne($c);
          if($per)
            $monrgo=$per->getMonrgo();
          else
            $monrgo=$x[$j]->getMonrgo();
          $cobrecdoc->setMonrec($monrgo);
          $cobrecdoc->save();
        }
      	$j++;
      }
    }
  }

  public static function descuentoXCobrar($fafactur,$grid2)
  {
    $x=$grid2[0];
    $j=0;
    if (count($x)>0)
    {
      while ($j<count($x))
      {
        if ($x[$j]->getCoddesc()!="")
        {
          $cobdesdoc= new Cobdesdoc();
          $cobdesdoc->setRefdoc(str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT));
          $cobdesdoc->setCodcli($fafactur->getCodcli());
          $cobdesdoc->setCoddes($x[$j]->getCoddesc());
          $cobdesdoc->setFecdes($fafactur->Fecfac());
          $cobdesdoc->setMondes($x[$j]->getMondesc());
          $cobdesdoc->save();
        }
      	$j++;
      }
    }
  }

  public static function grabarIngreso($fafactur,$grid3)
  {
  	$cireging= new Cireging();
  	$cireging->setRefing($fafactur->getReffac());
  	$cireging->setCodtip('FAC');
  	$cireging->setFecing($fafactur->getFecfac());
  	$cireging->setAnoing(substr($fafactur->getFecfac(),0,4));
  	$cireging->setDesing($fafactur->getDesfac());
  	$cireging->setRifcon($fafactur->getCodcli());
  	$cireging->setDesanu(null);
  	$moning= (($fafactur->getMonfac() - H::convnume($fafactur->getTotrec())) + H::convnume($fafactur->getTotdesc()));
  	$cireging->setMoning($moning);
  	$cireging->setMonrec(H::convnume($fafactur->getTotrec()));
  	$cireging->setMondes(H::convnume($fafactur->getTotdesc()));
  	$cireging->setMontot($moning);
  	$cireging->setPrevis('S');
  	$cireging->setStaing('A');

  	$x=$grid3[0];
    $j=0;
    while ($j<count($x))
    {
      $c= new Criteria();
      $c->add(FatippagPeer::ID,$x[$j]->getTippag());
      $result= FatippagPeer::doSelectOne($c);
      if ($result)
      {
      	if ($result->getGenmov()=="S")
      	{
      	  $cireging->setTipmov($x[$j]->getTippag());
      	  $cireging->setCtaban($x[$j]->getNomban());
      	}
      }
      $j++;
    }
   $cireging->save();
  }

  public static function grabarImpIng($fafactur)
  {
    $c= new Criteria();
    $c->add(CiimpingPeer::REFING,$fafactur->getReffac());
    $c->add(CiimpingPeer::FECING,$fafactur->getFecfac());
    CiimpingPeer::doDelete($c);

    $previsto=true;
    $sql="SELECT B.CODING as coding,SUM(A.MONRGO) as monrec,SUM(A.TOTART) as monfac FROM FAARTFAC A,CAREGART B WHERE A.REFFAC='".$fafactur->getReffac()."' AND A.CODART=B.CODART GROUP BY B.CODING";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $i=0;
      while ($i<count($result))
      {
        $ciimping= new Ciimping();
        $ciimping->setRefing($fafactur->getReffac());
        $ciimping->setFecing($fafactur->getFecfac());
        $ciimping->setCodpre($result[$i]["coding"]);
        $ciimping->setMoning($result[$i]["monfac"] - $result[$i]["monrec"]);
        $ciimping->setMonrec($result[$i]["monrec"]);
        $ciimping->setMondes(0);
        $ciimping->setMontot($result[$i]["monfac"] - $result[$i]["monrec"]);
        $ciimping->setMonaju(0);
        $ciimping->setStaimp('A');
        $ciimping->save();
      	$i++;
      }
    }
  }

  public static function anularComprobante($tipo,$numcom,$fecanu,&$msj)
  {
  	$msj="";

    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numcom);
    $datos= ContabcPeer::doSelectOne($c);
    if ($datos)
    {
      $contabc= new Contabc();
      if ($tipo=='C')
      {
      	$contabc->setNumcom("RF".substr($numcom,2,6));
      }else if ($tipo=='I')
      {
      	$contabc->setNumcom("RI".substr($numcom,2,6));
      }
      else
      {
      	$contabc->setNumcom("RO".substr($numcom,2,6));
      }
      $contabc->setReftra($datos->getReftra());
      $contabc->setFeccom($fecanu);
      $contabc->setDescom($datos->getDescom());
      $contabc->setStacom('D');
      $contabc->setTipcom(null);
      $contabc->setMoncom($datos->getMoncom());
      $contabc->save();

      $a= new Criteria();
      $a->add(Contabc1Peer::NUMCOM,$numcom);
      $results= Contabc1Peer::doSelect($a);
      if ($results)
      {
      	foreach ($results as $obj)
      	{
      	  $contabc1= new Contabc1();
      	  if ($tipo=='C')
      	  {
      	   $contabc1->setNumcom("RF".substr($numcom,2,6));
      	  }else if ($tipo=='I')
      	  {
      	  	$contabc1->setNumcom("RI".substr($numcom,2,6));
      	  }
      	  else
      	  {
      	  	$contabc1->setNumcom("RO".substr($numcom,2,6));
      	  }
      	  $contabc1->setFeccom($fecanu);
      	  $contabc1->setCodcta($obj->getCodcta());
      	  $contabc1->setNumasi($obj->getNumasi());
      	  $contabc1->setRefasi($obj->getRefasi());
      	  $contabc1->setDesasi($obj->getDesasi());
      	  if ($obj->getDebcre()=='D')
      	  {
      	    $contabc1->setDebcre('C');
      	  }else
      	  {
      	  	$contabc1->setDebcre('D');
      	  }
      	  $contabc1->setMonasi($obj->getMonasi());
      	  $contabc1->save();

      	}
      }
    }
    else
    {
    	$msj="El Comprobante Nro. ".$numcom."no fué Anulado";
    }
  }

  public static function generarNotaCredito($reffac,$fecanu,$monto)
  {
    $facnotcre= new Fanotcre();
    $facnotcre->setReffac($reffac);
    $corre=substr(self::generarCodInt("Fanotcre","correl"),2,8);
    $facnotcre->setCorrel($corre);
    $facnotcre->setFecnot($fecanu);
    $facnotcre->setMonto($monto);
    $facnotcre->save();
  }

  public static function generarCodInt($nombretabla,$campoclave)
  {
  	$codinterno='1';
  	$codint=str_pad($codinterno,10,'0',STR_PAD_LEFT);
  	if (self::ultRegporCodInt2($nombretabla,$campoclave,&$result))
  	{
  	  if ($result[0]["$campoclave"]!="")
  	  {
        $codig=$result[0]["$campoclave"];
        $codig= $codig + 1;
        $codinterno=$codig;
        $codint=str_pad($codinterno,10,'0',STR_PAD_LEFT);
  	  }
  	}
  	$generarcodint=$codint;
  	return $generarcodint;
  }

  public static function ultRegporCodInt2($nombretabla,$campoclave,&$result)
  {
  	$result=array();
  	$sql="SELECT ".$campoclave." FROM ".$nombretabla." WHERE ".$campoclave."=(SELECT MAX(".$campoclave.") FROM ".$nombretabla." WHERE ".$campoclave."<>'9999999999') Order By ".$campoclave."";
  	if (Herramientas::BuscarDatos($sql,&$result))
    {
     return true;
    }else return false;
  }

  public static function anularCxC($reffac,$fecanu,$motanu)
  {
    $c= new Criteria();
    $c->add(CobdocumePeer::REFDOC,$reffac);
    $resul= CobdocumePeer::doSelectOne($c);
    if ($resul)
    {
      $resul->setFecanu($fecanu);
      $resul->setDesanu($motanu);
      $resul->setStadoc('N');
      $resul->save();
    }
  }

  public static function devolverArticulosExist($reffac)
  {
   $a= new Criteria();
   $a->add(FafacturPeer::REFFAC,$reffac);
   $reg= FafacturPeer::doSelectOne($a);
   if ($reg)
   {
     if ($reg->getTipref()!='D' && $reg->getTipref()!='VC')
     {
     	$d= new Criteria();
     	$d->add(FaartfacPeer::REFFAC,$reffac);
     	$results= FaartfacPeer::doSelect($d);
     	if ($results)
     	{
     	  foreach ($results as $regs)
     	  {
     	  	$c= new Criteria();
     	  	$c->add(CaregartPeer::CODART,$regs->getCodart());
     	  	$dato= CaregartPeer::doSelectOne($c);
     	  	if ($dato)
     	  	{
     	  		if ($dato->getTipo()=='A')
     	  		{
     	  		  $dato->setDistot($dato->getDistot() + $regs->getCantot());
     	  		  $dato->save();
     	  		}
     	  	}
     	  }
     	}
     }
   }
  }

  public static function eliminarComprob($numcom)
  {
    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numcom);
    $datos= ContabcPeer::doSelectOne($c);
    if ($datos)
    {
      if ($datos->getStacom()!='A')
      {
        $d= new Criteria();
        $d->add(Contabc1Peer::NUMCOM,$numcom);
        $reg= Contabc1Peer::doSelect($d);
        if ($reg)
        {
          foreach ($reg as $obj)
          {
          	$obj->delete();
          }
         $datos->delete();
        }
      }else
      {
      	$msj="El Comprobante Nro. ".$numcom." no puede ser Eliminado por que ya fue Actualizado en Contabilidad";
      }
    }
    else
    {
      $msj="El Comprobante Nro. ".$numcom." ya fué eliminado anterioridad";
    }
  }

  public static function articulosConsignacion($codart)
  {
  	$art_consig=H::getX('CODART','Caregart','Mercon',$codart);
  	if ($art_consig=='S')
  	{
  	 $articulo_consig=true;
  	}
  	else
  	{
  	  $articulo_consig=false;
  	}
   return $articulo_consig;
  }

  public static function arregloPedidos($codreferencia,$tipref,&$encontro,&$msj,&$arreglodet,&$p,&$sin_cta_aso)
  {
  	$msj="";
  	$p="";
  	$fila1=""; $fila2=""; $fila3=""; $fila4=""; $fila5=""; $fila6="0,00"; $fila7="0,00"; $fila8="0,00"; $fila9="0,00"; $fila10="0,00"; $fila11="0,00"; $fila12="0,00";
  	$fila13="0,00"; $fila14="0,00"; $fila15="0,00"; $fila16="0,00"; $fila17=""; $fila18="0,00"; $fila19=""; $fila20=""; $fila21=""; $fila22="0,00";
    $c= new Criteria();
	$c->add(FaartpedPeer::NROPED,$codreferencia);
	$reg2= FaartpedPeer::doSelect($c);
	if ($reg2)
	{
	  $arreglodet="";
	  foreach ($reg2 as $objdato)
	  {
        $diferencia=0;
        $cant_total=0;

        $sql="Select cantot as cantot From FaArtFac where CODART='".$objdato->getCodart()."' AND codref = '".$codreferencia."' and RefFac in (Select RefFac from FaFactur where STATUS<>'N' AND TipRef='".$tipref."')";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
          $e=0;
          $p="artped";
          while ($e<count($result))
          {
          	$cant_total= $cant_total + $result[$e]["cantot"];
          	$e++;
          }
          $encontro=false;
          if ($objdato->getCantot()<= $cant_total)
          {
          	$encontro=true;
          }
          $diferencia= $objdato->getCantot() - $cant_total;
          if ($encontro==false)
          {
	         $fila1='0';
	         $fila2=$codreferencia;
	         $fila3=$objdato->getCodart();

             $a= new Criteria();
             $a->add(CaregartPeer::CODART,$objdato->getCodart());
             $reg= CaregartPeer::doSelectOne($a);
             if ($reg)
             {
             	$fila4=$reg->getDesart();
             	$fila5=$reg->getUnimed();
             	$fila14=number_format($reg->getDistot(),2,',','.');
             	if ($reg->getCtavta()=="")
             	{
             	  $sin_cta_aso='N';
             	}else $sin_cta_aso='S';
             }

             $fila7=number_format($objdato->getCantot(),2,',','.');
             $fila8=number_format($diferencia,2,',','.');
             $fila21=H::getX('Codart','Caregart','Tipo',$objdato->getCodart());
             if ($diferencia==0)
             {
             	$fila16=number_format($objdato->getCantot(),2,',','.');
             }else $fila16=number_format($diferencia,2,',','.');
             $canentart=0;
             if (H::convnume($fila8)<= (H::convnume($fila14) - $canentart))
             {
               $fila8=$fila8;
               $fila6= H::convnume($fila14) - H::convnume($fila8 -$canentart);
             }else
             {
               $fila6="0";
               $fila8=$fila14;
             }
             $fila10=number_format($objdato->getPreart(),2,',','.');
             $fila11=number_format($objdato->getPreart(),2,',','.');
             $fila15=number_format($objdato->getPreart(),2,',','.');

             $colum=self::determinarReferenciaDoc($tipref);
             $fila12="0,00";
             $fila15="0,00";
             $fila17="";
             $fila18="0,00";
             $fila19="";
             $fila20='0';
             $fila22="";
             $fila9="0,00";
             $cal=H::convnume($fila10)*H::convnume($fila8);
             $fila13=number_format($cal,2,',','.');
	         //$encontro=true;
	         //cambio moneda

          }

        }
        else
        {
        	$fila1='0';
	         $fila2=$codreferencia;
	         $fila3=$objdato->getCodart();

             $a= new Criteria();
             $a->add(CaregartPeer::CODART,$objdato->getCodart());
             $reg= CaregartPeer::doSelectOne($a);
             if ($reg)
             {
             	$fila4=$reg->getDesart();
             	$fila5=$reg->getUnimed();
             	$fila14=number_format($reg->getDistot(),2,',','.');
             	if ($reg->getCtavta()=="")
             	{
             	  $sin_cta_aso='N';
             	}else $sin_cta_aso='S';
             }

             $fila7=number_format($objdato->getCantot(),2,',','.');
             $fila8=number_format($diferencia,2,',','.');
             $fila21=H::getX('Codart','Caregart','Tipo',$objdato->getCodart());
             if ($diferencia==0)
             {
             	$fila16=number_format($objdato->getCantot(),2,',','.');
             }else $fila16=number_format($diferencia,2,',','.');
             $canentart=0;
             if (H::convnume($fila8)<= (H::convnume($fila14) - $canentart))
             {
               $fila8=$fila8;
               $fila6= H::convnume($fila14) - H::convnume($fila8 -$canentart);
             }else
             {
               $fila6="0";
               $fila8=$fila14;
             }
             $fila10=number_format($objdato->getPreart(),2,',','.');
             $fila11=number_format($objdato->getPreart(),2,',','.');
             $fila15=number_format($objdato->getPreart(),2,',','.');

             $colum=self::determinarReferenciaDoc($tipref);
             $fila12="0,00";
             $fila17="";
             $fila18="0,00";
             $fila19="";
             $fila20='0';
             $fila22="";
             $fila9="0,00";
             $cal=H::convnume($fila10)*H::convnume($fila7);
             $fila13=number_format($cal,2,',','.');
	         //$encontro=true;
	         //cambio moneda
        }

        $arreglodet=$arreglodet.$fila1.'_'.$fila2.'_'.$fila3.'_'.$fila4.'_'.$fila5.'_'.$fila6.'_'.$fila7.'_'.$fila8.'_'.$fila9.'_'.$fila10.'_'.$fila11.'_'.$fila12.'_'.$fila13.'_'.$fila14.'_'.$fila15.'_'.$fila16.'_'.$fila17.'_'.$fila18.'_'.$fila19.'_'.$fila20.'_'.$fila21.'_'.$fila22.'!';

	  }
	}
	else
	{
	  $msj="alert('No Existen Datos Asociados al Criterio Seleccionado');";
	}
    return true;
  }

  public static function arregloDespachos($codreferencia,$tipref,&$encontro,&$msj,&$arreglodet,&$p,&$sin_cta_aso)
  {
  	$msj="";
  	$p="";
  	$fila1=""; $fila2=""; $fila3=""; $fila4=""; $fila5=""; $fila6="0,00"; $fila7="0,00"; $fila8="0,00"; $fila9="0,00"; $fila10="0,00"; $fila11="0,00"; $fila12="0,00";
  	$fila13="0,00"; $fila14="0,00"; $fila15="0,00"; $fila16="0,00"; $fila17=""; $fila18="0,00"; $fila19=""; $fila20=""; $fila21=""; $fila22="0,00";
    if ($tipref=='D' || $tipref=='VC')
    {
      $c= new Criteria();
      $c->add(CaartdphPeer::DPHART,$codreferencia);
      $resul= CaartdphPeer::doSelect($c);
      if ($resul)
      {
      	$arreglodet="";
        foreach ($resul as $objdato)
	    {
	      $diferencia=0;
          $cant_total=0;

          $sql="Select codart as codart, cantot as cantot From FaArtFac where CODART='".$objdato->getCodart()."' AND codref = '".$codreferencia."' and RefFac in (Select RefFac from FaFactur where TipRef='".$tipref."')";
          if (Herramientas::BuscarDatos($sql,&$result))
          {
            $e=0;
            while ($e<count($result))
            {
          	  $cant_total= $cant_total + $result[$e]["cantot"];
          	  $e++;
            }
            $encontro=false;
            if ($objdato->getCandph()<= $cant_total)
            {
           	 $encontro=true;
            }
            $diferencia= $objdato->getCandph() - $cant_total;

            if ($encontro==false)
            {
                 $fila1='0';
		         $fila2=$codreferencia;
		         $fila3=$objdato->getCodart();
                 $fila21=H::getX('Codart','Caregart','Tipo',$objdato->getCodart());

	             $a= new Criteria();
	             $a->add(CaregartPeer::CODART,$objdato->getCodart());
	             $reg= CaregartPeer::doSelectOne($a);
	             if ($reg)
	             {
	             	$fila4=$reg->getDesart();
	             	$fila5=$reg->getUnimed();
	             	$fila6=number_format($reg->getDistot(),2,',','.');
	             	$fila14=number_format($reg->getDistot(),2,',','.');
	             	if ($reg->getCtavta()=="")
	             	{
	             	  $sin_cta_aso='N';
	             	}else $sin_cta_aso='S';
	             }

	             $fila9=number_format($diferencia,2,',','.');

	             $a= new Criteria();
	             $a->add(CadphartPeer::DPHART,$objdato->getDphart());
	             $registro= CadphartPeer::doSelectOne($a);
	             if ($registro)
	             {
                   $e= new Criteria();
                   $e->add(FaartnotPeer::CODART,$objdato->getCodart());
                   $e->add(FaartnotPeer::NRONOT,$registro->getReqart());
                   $data= FaartnotPeer::doSelectOne($e);
                   if ($data)
                   {
                   	 $fila10=number_format($data->getPreart(),2,',','.');
	                 $fila14=number_format($data->getPreart(),2,',','.');
                   }
                   else
                   {
                   	$fila10="0,00";
                   	$fila11="0,00";
                    $fila15="0,00";
                   }

                   $fila12="0,00";
                   $fila13=number_format($objdato->getMontot(),2,',','.');
	             }
	             else
	             {
                   $fila10="0,00";
                   $fila11="0,00";
                   $fila12="0,00";
                   $fila13="0,00";
                   $fila15="0,00";
	             }


	             $fila7="0,00";
	             $fila8="0,00";
                 $fila16="0,00";
	             $fila17="";
	             $fila18="0,00";
	             $fila19="";
	             $fila20='0';
	             $fila22="";
		         //$encontro=true;
		         //cambio moneda
            }
          }
          else
          {
          	     $p="artped";
          	     $fila1='0';
		         $fila2=$codreferencia;
		         $fila3=$objdato->getCodart();
                 $fila21=H::getX('Codart','Caregart','Tipo',$objdato->getCodart());

	             $a= new Criteria();
	             $a->add(CaregartPeer::CODART,$objdato->getCodart());
	             $reg= CaregartPeer::doSelectOne($a);
	             if ($reg)
	             {
	             	$fila4=$reg->getDesart();
	             	$fila5=$reg->getUnimed();
	             	$fila6=number_format($reg->getDistot(),2,',','.');
	             	$fila14=number_format($reg->getDistot(),2,',','.');
	             	if ($reg->getCtavta()=="")
	             	{
	             	  $sin_cta_aso='N';
	             	}else $sin_cta_aso='S';
	             }

	             $fila9=number_format($objdato->getCandph(),2,',','.');

	             $a= new Criteria();
	             $a->add(CadphartPeer::DPHART,$objdato->getDphart());
	             $registro= CadphartPeer::doSelectOne($a);
	             if ($registro)
	             {
                   $e= new Criteria();
                   $e->add(FaartnotPeer::CODART,$objdato->getCodart());
                   $e->add(FaartnotPeer::NRONOT,$registro->getReqart());
                   $data= FaartnotPeer::doSelectOne($e);
                   if ($data)
                   {
                   	 $fila10=number_format($data->getPreart(),2,',','.');
                   	 $fila11=number_format($data->getPreart(),2,',','.');
	                 $fila15=number_format($data->getPreart(),2,',','.');
                   }
                   else
                   {
                   	$fila10=number_format($objdato->getPreart(),2,',','.');
                   	 $fila11=number_format($objdato->getPreart(),2,',','.');
	                 $fila15=number_format($objdato->getPreart(),2,',','.');
                   }

                   $fila12="0,00";
                   $fila13=number_format($objdato->getMontot(),2,',','.');
	             }
	             else
	             {
                   $fila10="0,00";
                   $fila11="0,00";
                   $fila12="0,00";
                   $fila13="0,00";
                   $fila15="0,00";
	             }


	             $fila7="0,00";
	             $fila8="0,00";
                 $fila16="0,00";
	             $fila17="";
	             $fila18="0,00";
	             $fila19="";
	             $fila20='0';
	             $fila22="";
	             $cal=H::convnume($fila10)*H::convnume($fila9);
                 $fila13=number_format($cal,2,',','.');
		         //$encontro=true;
		         //cambio moneda

          }
          $arreglodet=$arreglodet.$fila1.'_'.$fila2.'_'.$fila3.'_'.$fila4.'_'.$fila5.'_'.$fila6.'_'.$fila7.'_'.$fila8.'_'.$fila9.'_'.$fila10.'_'.$fila11.'_'.$fila12.'_'.$fila13.'_'.$fila14.'_'.$fila15.'_'.$fila16.'_'.$fila17.'_'.$fila18.'_'.$fila19.'_'.$fila20.'_'.$fila21.'_'.$fila22.'!';
	    }
      }
      else
      {
        $msj="alert('No Existen Datos Asociados al Criterio Seleccionado');";
      }
    }
  }

  public static function datosRecargos($rgofijos,$reffac,&$arreglorec,&$trajo)
  {
  	if ($rgofijos=='S')
    {
      $c= new Criteria();
      $c->add(FarecargPeer::CALCUL,'S');
      $resul= FarecargPeer::doSelect($c);
    }
    else
    {
      $c= new Criteria();
      $c->add(FargoartPeer::REFDOC,$reffac);
      $c->add(FargoartPeer::TIPDOC,'F');
      $resul= FargoartPeer::doSelect($c);
    }
    $trajo=true;
    if ($resul)
    {
      $arreglorec="";
      foreach ($resul as $obj)
      {
      	$fila1=$obj->getCodrgo();
      	$c= new Criteria();
      	$c->add(FarecargPeer::CODRGO,$obj->getCodrgo());
      	$reg= FarecargPeer::doSelectOne($c);
      	if ($reg)
      	{
      	  $fila2=$reg->getNomrgo();
      	  if ($reg->getCalcul()=='S')
      	  {
      	  	$fila3="Si";
      	  }else $fila3="No";

      	 $fila4=number_format($obj->getMonrgo(),2,',','.');
      	 $fila5=$reg->getCodcta();
      	 $fila6=$reg->getTiprgo();
      	 $fila7=number_format($reg->getMonrgo(),2,',','.');

      	$arreglorec=$arreglorec.$fila1.'_'.$fila2.'_'.$fila3.'_'.$fila4.'_'.$fila5.'_'.$fila6.'_'.$fila7.'!';
      	}
      }
    }
    else
    {
    	$trajo=false;
    }
  }

  public static function mostrarDescuentos($tipcli,&$arreglodesc)
  {
  	$arreglodesc="";
    $a= new Criteria();
    $a->add(FadtoctePeer::FATIPCTE_ID,$tipcli);
    $resul= FadtoctePeer::doSelect($a);
    if ($resul)
    {
      foreach ($resul as $obj)
      {
        $d= new Criteria();
        $d->add(FadesctoPeer::CODDESC,$obj->getCoddto());
        $reg= FadesctoPeer::doSelectOne($d);
        if ($reg)
        {
          $fila1=$reg->getCoddesc();
          $fila2=$reg->getDesdesc();
          if ($reg->getTipdesc()=='M')
          {
            $fila3=number_format($reg->getMondesc(),2,',','.');
          }
          else
          {
          	$fila3="0,00";
          }
          $fila4=$reg->getCodcta();
          $fila5="";
          $fila6=number_format($reg->getMondesc(),2,',','.');
          $fila7=$reg->getTipdesc();
          $fila8=$reg->getTipret();

         $arreglodesc=$arreglodesc.$fila1.'_'.$fila2.'_'.$fila3.'_'.$fila4.'_'.$fila5.'_'.$fila6.'_'.$fila7.'_'.$fila8.'!';
        }

      }
    }
    else
    {
      $fila1="";
      $fila2="";
      $fila3="0,00";
      $fila4="";
      $fila5="1";
      $fila6="";
      $fila7="";
      $fila8="";
      $arreglodesc=$arreglodesc.$fila1.'_'.$fila2.'_'.$fila3.'_'.$fila4.'_'.$fila5.'_'.$fila6.'_'.$fila7.'_'.$fila8.'!';
    }
  }

  public static function PreciosRepetidos($grid)
  {
  	$precios_repetidos=false;
    return $precios_repetidos;
  	$x=$grid[0];
    $i=0;
    if (count($x)>0)
    {
  	  while ($i<count($x))
  	  {
  	   	$j=0;
        while ($j<count($x))
  	    {
          if ($i!=$j)
          {
            if ($x[$j]->getCodart() !='' && $x[$i]->getCodart()==$x[$j]->getCodart())
            {
            	if ($x[$i]->getPrecio()=="0,00")
            	{
            	  if ($x[$i]->getPrecioe()!=$x[$j]->getPrecioe())
            	  {
            	  	$precios_repetidos=true;
            	  	return $precios_repetidos;
            	  }
            	}
            	else
            	{
            	  if ($x[$i]->getPrecio()!=$x[$j]->getPrecio())
            	  {
            	  	$precios_repetidos=true;
            	  	return $precios_repetidos;
            	  }
              }
            }
          }
	        $j++;
	      }
 	    $i++;
 	    }
    }
    return $precios_repetidos;
  }

  public static function Verificar_pago($grid,$monfac,$tipconpag)
  {
  	$verificar_pago=false;
  	if (self::Pago_Mayor_Igual($grid,$monfac)==true)
  	{
  	  if ($tipconpag=='C')
  	  {
  	  	$verificar_pago=true;
  	  }
  	}
  	else
  	{
  	  if ($tipconpag=='R')
  	  {
  	  	$verificar_pago=true;
  	  }
  	}
  	return  $verificar_pago;
  }

  public static function Pago_Mayor_Igual($grid,$monfac)
  {
  	$pago_mayor_igual=false;
  	$monto_pago=0;
  	$x=$grid[0];
    $i=0;
    if (count($x)>0)
    {
	  while ($i<count($x))
	  {
	    if ($x[$i]->getMonpag()!="0,00")
	    {
	      $monto_pago= $monto_pago + $x[$i]->getMonpag();
	    }
	  	$i++;
	  }

	  if ($monto_pago>=$monfac)
	  {
	  	$pago_mayor_igual=true;
	  }
    }
    return $pago_mayor_igual;
  }

}
?>