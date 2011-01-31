<?php

/**
 * Subclass for representing a row from the 'carampro'.
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
class Carampro extends BaseCarampro
{

  public function getNomram()
  {
    return Herramientas::getX('ramart','caramart','nomram',self::getRamart());
  }
}
