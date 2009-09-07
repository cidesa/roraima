<?php

/**
 * Subclass for representing a row from the 'carecaud'.
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
class Carecaud extends BaseCarecaud
{

   public function __toString()
    {
		return $this->getDesrec();
    }

  public function getDestiprec()
	{
		return Herramientas::getX('CODTIPREC','Catiprec','destiprec',self::getCodtiprec());
	}
}
