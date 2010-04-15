<?php

/**
 * Subclass for representing a row from the 'fatipcte'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fatipcte.php 33699 2009-10-01 22:15:36Z dmartinez $
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
