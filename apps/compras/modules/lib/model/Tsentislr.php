<?php

/**
 * Subclass for representing a row from the 'tsentislr'.
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
class Tsentislr extends BaseTsentislr
{
  public function getFeclib()
  {
  	$fec=Herramientas::getX('REFLIB','Tsmovlib','feclib',self::getNumord());
  	if ($fec)
  	{
  	 return  date("d/m/Y",strtotime($fec));
  	}
  	else
  	{
  		return ' ';
  	}
	
  }
}
