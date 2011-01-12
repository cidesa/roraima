<?php

/**
 * Subclase para representar una fila de la tabla 'npasiconcar'.
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
class Npasiconcar extends BaseNpasiconcar
{
    protected $obj=array();

  public function getNomcon()
  {
    return Herramientas::getX('CODCON','Npdefcpt','Nomcon',self::getCodcon());
  }
}
