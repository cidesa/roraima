<?php

/**
 * Subclass for representing a row from the 'catraalm'.
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
class Catraalm extends BaseCatraalm
{
	public function getAlmaori()
	{
		return Herramientas::getX('codalm','cadefalm','nomalm',self::getAlmori());
	}

	public function getAlmades()
	{
		return Herramientas::getX('codalm','cadefalm','nomalm',self::getAlmdes());
	}

	public function getNomubiori()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubiori());
	}

	public function getNomubides()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubides());
	}
}
