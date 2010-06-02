<?php

/**
 * Subclass for representing a row from the 'careqart'.
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
class Careqart extends BaseCareqart
{
	protected $obj = array();
	protected $check = '';
	protected $check2 = '';
	protected $check3 = '';
	protected $totfil = '';

	public function getDesubi()
	{
		return  Herramientas::getX('codubi','bnubibie','desubi',self::getCodcatreq());
	}

  public function getDescen()
  {
	return Herramientas::getX('CODCEN','Cadefcen','Descen',self::getCodcen());
  }

}
