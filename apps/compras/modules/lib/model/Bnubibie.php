<?php

/**
 * Subclass for representing a row from the 'bnubibie'.
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
class Bnubibie extends BaseBnubibie
{

  public function getDesubiadm()
  {
  	 return Herramientas::getX('CODUBI','Bnubica','Desubi',self::getCodubiadm());
  }
}
