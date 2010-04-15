<?php

/**
 * Subclass for representing a row from the 'opretcon'.
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
class Opretcon extends BaseOpretcon
{
	public function getDescon()
	{
      return Herramientas::getX('CODCON','Npdefcpt','Nomcon',self::getCodcon());
	}
	
	public function getDestip()
	{
      return Herramientas::getX('CODTIP','Optipret','Destip',self::getCodtip());
	}
	
		public function getDesnom()
	{
      return Herramientas::getX('CODNOM','Npnomina','Nomnom',self::getCodnom());
	}
	
}
