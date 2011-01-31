<?php

/**
 * Subclass for representing a row from the 'ocdefper'.
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
class Ocdefper extends BaseOcdefper
{

	public function getDestipper()
	{
	  return Herramientas::getX('Codtipper','Octipper','Destipper',self::getCodtipper());
	}

	public function getDestipcar()
	{
	  return Herramientas::getX('Codtipcar','Octipcar','Destipcar',self::getCodtipcar());
	}

	public function getDestippro()
	{
	  return Herramientas::getX('Codtippro','Octippro','Destippro',self::getCodtippro());
	}
}
