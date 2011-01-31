<?php

/**
 * Subclass for representing a row from the 'farecarg'.
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
class Farecarg extends BaseFarecarg
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
