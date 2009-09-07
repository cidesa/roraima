<?php

/**
 * Subclass for representing a row from the 'faartpvp'.
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
class Faartpvp extends BaseFaartpvp
{
	public $obj = array();

    public function getDesart()
    {
  	    return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    }

  public function getDesartdesde()
  {
	return Herramientas::getX('CODART','Caregart','Desart',self::getArtdesde());
  }

  public function getDesarthasta()
  {
	return Herramientas::getX('CODART','Caregart','Desart',self::getArthasta());
  }

  public function getArtdesde()///
  {
	   return '';
  }

  public function getArthasta()
  {
	   return '';
  }

}
