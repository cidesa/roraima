<?php

/**
 * Subclass for representing a row from the 'ocproequ'.
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
class Ocproequ extends BaseOcproequ
{
  public function getDesequ()
  {
  return Herramientas::getX('CODEQU','Ocdefequ','Desequ',self::getCodequ());
  }
}
