<?php

/**
 * Subclass for representing a row from the 'bnreginm'.
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
class Bnreginm extends BaseBnreginm
{
	public function getNomprovee()
	{
		 return Herramientas::getX('codpro','caprovee','nompro',trim(self::getCodpro()));
	}

	public function getDesubi()
	{
   	   return Herramientas::getX('codubi','bnubibie','desubi',trim(self::getCodubi()));
	}

	public function getDisposicion()
	{
   	   return Herramientas::getX('coddis','bndisbie','desdis',trim(self::getCoddis()));
	}

    public function getValactual()
	  {
	    $des = 0;
	    $des = $this->getValini()+ $this->getValadis();
	    return $des;
	  }

}
