<?php

/**
 * Subclass for representing a row from the 'tsdetsal'.
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
class Tsdetsal extends BaseTsdetsal
{
 protected $codpar="";
 protected $desart="";

  public function getCodpar()
  {
   return Herramientas::getX('CODART','Caregart','Codpar',self::getCodart());
  }

  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }
}
