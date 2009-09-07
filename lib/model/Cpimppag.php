<?php

/**
 * Subclass for representing a row from the 'cpimppag'.
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
class Cpimppag extends BaseCpimppag
{
  protected $descodpre;

  public function getDescodpre()
  {
	return CpdeftitPeer::getNompre(self::getCodpre());
  }
}
