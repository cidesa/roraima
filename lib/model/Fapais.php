<?php

/**
 * Subclass for representing a row from the 'fapais'.
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
class Fapais extends BaseFapais
{
  public function __toString()
  {
    return $this->nompai;
  }

}
