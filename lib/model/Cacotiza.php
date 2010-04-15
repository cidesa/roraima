<?php

/**
 * Subclass for representing a row from the 'cacotiza'.
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
class Cacotiza extends BaseCacotiza
{
	private $rifpro = '';
	
	
	public function getNompro()
	{
	  return Herramientas::getX('codpro','caprovee','nompro',self::getCodpro());
	}
	
	

	public function getDesconpag()
	{
	  return Herramientas::getX('codconpag','caconpag','desconpag',self::getConpag());
	}
	
	public function getDesforent()
	{
	  return Herramientas::getX('codforent','caforent','desforent',self::getForent());
	}

	public function getDesreq()
	{
	  return Herramientas::getX('reqart','casolart','desreq',self::getRefsol());
	}
	
	public function getRifpro()
	{
	  return Herramientas::getX('codpro','caprovee','rifpro',self::getCodpro());	 
	}
	
   public function setRifpro($val)
    {
	   $this->rifpro= $val;		
	}
	
	public function getRifpronew()
    {  		
		return $this->rifpro;
    }
}
