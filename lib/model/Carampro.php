<?php

/**
 * Subclass for representing a row from the 'carampro'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Carampro.php 37135 2010-03-17 14:54:38Z dmartinez $
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
