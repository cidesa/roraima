<?php

/**
 * Subclass for representing a row from the 'cpdoccau'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpdoccau.php 40733 2010-09-22 20:47:08Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpdoccau extends BaseCpdoccau
{
  protected $etadef="";

  public function getEtadef() {
    $cpdefniv=CpdefnivPeer::doSelectOne(new Criteria());
	if ($cpdefniv){
	   return $cpdefniv->getEtadef();
	 } else return 1;
    }

    public function setEtadef()
    {
        return $this->etadef;
    }

  public function getTipmovren()
  {
  	return self::getTipcau();
  }

  public function getNommovren()
  {
  	return self::getNomext();
  }
}
