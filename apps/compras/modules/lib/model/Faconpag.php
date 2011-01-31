<?php

/**
 * Subclass for representing a row from the 'faconpag'.
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
class Faconpag extends BaseFaconpag
{
  public function __toString()
  {
    return $this->desconpag;
  }

  public function getCodconpag()
  {
  	$valor=self::getId();
   return $valor;
  }
}
