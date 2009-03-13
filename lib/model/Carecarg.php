<?php

/**
 * Subclass for representing a row from the 'carecarg' table.
 *
 *
 *
 * @package lib.model
 */
class Carecarg extends BaseCarecarg
{
  public function getDescta()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcta());
  }

 public function getNompre()
  {
  	$c = new Criteria();
  	$dato= CadefartPeer::doSelectOne($c);
  	if ($dato)
  	{
     if ($dato->getAsiparrec()=='P')
  	 {

  	 	return Herramientas::getX('CODPRE','Cpdeftit','Nompre',self::getCodpre());
  	 }
     else
  	 {
  	 	return Herramientas::getX('CODPAR','Nppartidas','Nompar',self::getCodpre());
  	 }
  	}//if ($dato)
  }
}
