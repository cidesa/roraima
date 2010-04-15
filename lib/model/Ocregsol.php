<?php

/**
 * Subclass for representing a row from the 'ocregsol'.
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
class Ocregsol extends BaseOcregsol
{
	public function getNomste()
	{
		return Herramientas::getX('CEDSTE','Ocdatste','Nomste',self::getCedste());
	}

	public function getDessol1()
	{
		return Herramientas::getX('CODSOL','Octipsol','Dessol',self::getCodsol());
	}

	public function getDesorg()
	{
		return Herramientas::getX('CODORG','Ocdeforg','Desorg',self::getCodorg());
	}

	public function getNomemp()
	{
		return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodemp());
	}

}
