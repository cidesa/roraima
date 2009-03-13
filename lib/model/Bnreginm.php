<?php

/**
 * Subclass for representing a row from the 'bnreginm' table.
 *
 *
 *
 * @package lib.model
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
