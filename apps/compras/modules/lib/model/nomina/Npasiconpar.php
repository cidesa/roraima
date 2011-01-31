<?php

/**
 * Subclase para representar una fila de la tabla 'npasiconpar'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npasiconpar extends BaseNpasiconpar
{
    protected $obj=array();

  public function getNomcon()
  {
      return Herramientas::getX('CODCON','Npdefcpt','Nomcon',self::getCodcon());
  }

  public function getNompar()
  {
      return Herramientas::getX('CODPAR','Nppartidas','Nompar',self::getCodpar());
  }
}
