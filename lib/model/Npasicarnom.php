<?php

/**
 * Subclass for representing a row from the 'npasicarnom' table.
 *
 *
 *
 * @package lib.model
 */
class Npasicarnom extends BaseNpasicarnom
{
	  public function getNomcar()
	  {
	  	return Herramientas::getX('codcar','npcargos','nomcar',self::getCodcar());
	  }

	  public function getNomnom()
	  {
	  	return Herramientas::getX('codnom','npnomina','nomnom',self::getCodnom());
	  }

    public function getNomcarnew()
    {
      return Herramientas::getX('codcar','npcargos','nomcar',self::getCodcar());
    }

    public function getCodcarnew()
    {
      return self::getCodcar();
    }
}
