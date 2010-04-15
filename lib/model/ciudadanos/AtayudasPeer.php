<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'atayudas'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
