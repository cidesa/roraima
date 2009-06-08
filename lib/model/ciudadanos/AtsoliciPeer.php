<?php

/**
 * Subclass for performing query and update operations on the 'atsolici' table.
 *
 *
 *
 * @package lib.model
 */
class AtsoliciPeer extends BaseAtsoliciPeer
{
  //Cooperativa, Particular, Consejo Comunal, Empresa, Organismo del Estado, Otros
  public static function getTipos()
  {
    return Array('O' => 'Cooperativa', 'P' => 'Particular', 'C' => 'Consejo Comunal', 'E' => 'Empresa', 'G' => 'Organismo del Estado', 'O' => 'Otros');
  }


}
