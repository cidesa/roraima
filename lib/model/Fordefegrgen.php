<?php

/**
 * Subclass for representing a row from the 'fordefegrgen' table.
 *
 *
 *
 * @package lib.model
 */
class Fordefegrgen extends BaseFordefegrgen
{
  protected $despariva = '';

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    parent::hydrate($rs, $startcol);

    $this->despariva = Herramientas::getX('CODPAR','Nppartidas','nompar',trim(self::getCodpariva()));

  }

	public function getNomparegr()
	{
	  return Herramientas::getX('CodParEgr','Fordefparegr','Nomparegr',self::getCodpariva());
	}

}
