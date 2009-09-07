<?php

/**
 * Subclase para representar una fila de la tabla 'usuarios'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.sima_user
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

  public function __toString()
  {
    return $this->nomuse;
  }

  public function getNomuni(){

    return Herramientas::getX('id','acunidad','nomuni',self::getNumuni());
  }

}
