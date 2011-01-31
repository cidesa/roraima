<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'usuarios'.
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
class UsuariosPeer extends BaseUsuariosPeer
{
  public static function getDato($codigo, $nomdat)
  {
     return Herramientas::getX('CEDEMP','Usuarios',$nomdat,$codigo);
  }
}
