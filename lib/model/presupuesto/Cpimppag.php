<?php

/**
 * Subclass for representing a row from the 'cpimppag'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Cpimppag.php 35042 2009-11-26 01:33:34Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpimppag extends BaseCpimppag
{
  protected $descodpre;
  protected $mondis = 0.00;
  protected $monnet = 0.00;
  protected $salparpag = 0.00;

  public function getDescodpre()
  {
	return CpdeftitPeer::getNompre(self::getCodpre());
  }


  /*public function setMondis($val){
  	$this->mondis = $val;
  }

  public function getMondis(){
	return
  }*/
}
