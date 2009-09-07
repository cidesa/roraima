<?php

/**
 * Subclass for representing a row from the 'fordefegrgen'.
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
