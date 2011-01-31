<?php

/**
 * Subclass for representing a row from the 'fatipcte'.
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
class Fatipcte extends BaseFatipcte
{
  public function __toString()
  {
    return $this->nomtipcte;
  }
}
