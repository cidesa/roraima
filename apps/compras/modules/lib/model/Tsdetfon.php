<?php

/**
 * Subclase para representar una fila de la tabla 'tsdetfon'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Tsdetfon extends BaseTsdetfon
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
