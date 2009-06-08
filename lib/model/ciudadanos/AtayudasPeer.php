<?php

/**
 * Subclass for performing query and update operations on the 'atayudas' table.
 *
 *
 *
 * @package lib.model
 */
class AtayudasPeer extends BaseAtayudasPeer
{
  public static function getListaAnalisis()
  {
    // Aceptada Total, Aceptada Parcialmente, Rechazada, En Proceso, No Revisada
    return Array('T' => 'Aceptada Totalmente', 'P' => 'Aceptada Parcialmente', 'R' => 'Rechazada', 'E' => 'En Proceso', 'N' => 'No Revisada');
  }

  public static function getListaEstados()
  {
    // Aceptada Total, Aceptada Parcialmente, Rechazada, En Proceso, No Revisada
    return Array('A' => 'Analizado', 'E' => 'En Proceso', 'R' => 'Rechazada');
  }
}
