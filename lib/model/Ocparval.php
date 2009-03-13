<?php

/**
 * Subclass for representing a row from the 'ocparval' table.
 *
 *
 *
 * @package lib.model
 */
class Ocparval extends BaseOcparval
{
  public function getDespar()
  {
    return Herramientas::getX('CODPAR','Ocdefpar','despar',self::getCodpar());
  }

   public function getCoduni()
  {
   $valor=Herramientas::getX('CODPAR','Ocdefpar','coduni',self::getCodpar());
   $abruni=Herramientas::getX('CODUNI','Ocunidad','abruni',$valor);
    return $abruni;
  }
  public function getCosuni()
  {
   $codobr=Herramientas::getX('CODCON','Ocregcon','codobr',self::getCodcon());
   $c= new Criteria();
   $c->add(OcpreobrPeer::CODOBR,$codobr);
   $c->add(OcpreobrPeer::CODPAR,self::getCodpar());
   $regis= OcpreobrPeer::doSelectOne($c);
   if ($regis)
   {
   	$costouni= $regis->getCosuni();
   }else $costouni='0,00';
    return $costouni;
  }

  public function getCancon()
  {
  	$c= new Criteria();
  	$c->add(OcparconPeer::CODCON,self::getCodcon());
  	$c->add(OcparconPeer::CODPAR,self::getCodpar());
  	$resul= OcparconPeer::doSelectOne($c);
  	if ($resul)
    {
  	  $cantcont=$result->getCancon();
    }else $cantcont='0,00';

    return $cantcont;
  }

  public function getMontot()
  {
	 $totval= self::getCantidad() * self::getCosuni();
    return number_format($totval,2,',','.');
  }

}
