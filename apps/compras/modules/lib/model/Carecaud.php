<?php

/**
 * Subclass for representing a row from the 'carecaud'.
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
class Carecaud extends BaseCarecaud
{
  protected $tiedatrel="";

   public function __toString()
    {
		return $this->getDesrec();
    }

  public function getDestiprec()
	{
		return Herramientas::getX('CODTIPREC','Catiprec','destiprec',self::getCodtiprec());
	}

   public function getTiedatrel()
  {
   	$valor="N";
   	if (self::getId()){
  	$d= new Criteria();
  	$d->add(CarecproPeer::CODREC,self::getCodrec());
  	$resul= CarecproPeer::doSelectOne($d);
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
