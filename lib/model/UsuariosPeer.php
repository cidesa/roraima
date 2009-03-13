<?php

/**
 * Subclass for performing query and update operations on the 'usuarios' table.
 *
 *
 *
 * @package lib.model
 */
class UsuariosPeer extends BaseUsuariosPeer
{
  public static function getDato($codigo, $nomdat)
  {
     return Herramientas::getX('CEDEMP','Usuarios',$nomdat,$codigo);
  }
}
