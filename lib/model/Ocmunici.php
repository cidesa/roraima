<?php

/**
 * Subclass for representing a row from the 'ocmunici'.
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
class Ocmunici extends BaseOcmunici
{
	public function getNompai()
	{
		return Herramientas::getX('codpai','ocpais','nompai',self::getCodpai());
	}
	public function getNomedo()
	{
		return Herramientas::getX('codpai','ocestado','nomedo',self::getCodedo());
	}
}
