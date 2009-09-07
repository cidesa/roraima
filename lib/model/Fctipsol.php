<?php

/**
 * Subclass for representing a row from the 'fctipsol'.
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
class Fctipsol extends BaseFctipsol
{
	protected $grid= array();

  public function getNomfueing()
  {
  	return Herramientas::getX('CODFUE','FCFuePre','Nomfue',self::getFueing());
  }

  public function getDesing()
  {
	  	return Herramientas::getX('CODFUE','fcfuepre','Nomfue',self::getFueing());
  }

  public function getNomfue()
  {
  	return Herramientas::getX('CODFUE','FCFuePre','Nomfue',self::getFueing());
  }



}
