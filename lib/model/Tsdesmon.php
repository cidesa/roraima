<?php

/**
 * Subclass for representing a row from the 'tsdesmon'.
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
class Tsdesmon extends BaseTsdesmon
{
  protected $tiedatrel="";

  public function getTiedatrel()
  {
  	  $valor="N";
  	  $d= new Criteria();
  	  $d->add(CasolartPeer::TIPMON,self::getCodmon());
  	  $resul= CasolartPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$valor= 'S';
  	  }
  	  else {
  	  	  $da= new Criteria();
	  	  $da->add(CaordcomPeer::TIPMON,self::getCodmon());
	  	  $resula= CaordcomPeer::doSelectOne($da);
	  	  if ($resula) $valor= 'S';
	  	  else $valor= 'N';
  	  }
  	return $valor;
  }

  public function setTiedatrel()
  {
  	return $this->tiedatrel;
  }

}