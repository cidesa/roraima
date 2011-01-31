<?php

/**
 * Subclass for representing a row from the 'caconpag'.
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
class Caconpag extends BaseCaconpag
{
  protected $tiedatrel="";

   public function getTiedatrel()
  {
   	$valor="N";
   	if (self::getId()){
  	$d= new Criteria();
  	$d->add(CaordcomPeer::CONPAG,self::getCodconpag());
  	$resul= CaordcomPeer::doSelectOne($d);
  	if ($resul)
  	{
  		$valor= 'S';
  	}
  	else $valor= 'N';
   	}

  	return $valor;
  }

  public function setTiedatrel()
  {
  	return $this->tiedatrel;
  }
}
