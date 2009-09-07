<?php

/**
 * Subclass for representing a row from the 'usuarios'.
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
class Usuarios extends BaseUsuarios
{
  protected $confirm = '';
  protected $password = '';
  protected $repassword = '';


  public function getNomuni(){

    return Herramientas::getX('id','acunidad','nomuni',self::getNumuni());
  }

  public function getDesniv(){

    return Herramientas::getX('CODNIV','Segnivapr','Desniv',self::getCodniv());
  }

}
