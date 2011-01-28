<?php

/**
 * Subclass for representing a row from the 'forparing'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Forparing.php 41359 2010-11-11 14:35:06Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Forparing extends BaseForparing
{
	public $objfuentefinan = array();
        protected $asiper="";

	public function getMontoing($val=false)
	{
		return parent::getMontoing(true);
	}
	
	public function getDespar()
	{
      return Herramientas::getX('CODPARING','Fordefparing','Nomparing',self::getCodparing());
	}
		
	public function getDesfin()
	{
      return Herramientas::getX('CODFIN','Fortipfin','Nomext',self::getCodtipfin());
	}
	
		
	
}
