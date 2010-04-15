<?php

/**
 * Subclass for representing a row from the 'faconpag'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Faconpag.php 33699 2009-10-01 22:15:36Z dmartinez $
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
