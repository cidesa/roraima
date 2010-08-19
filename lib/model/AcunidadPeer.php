<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'acunidad'.
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
class AcunidadPeer extends BaseAcunidadPeer
{
  public static function getAcunidades()
  {
    $result = array();

    $acunidades = AcunidadPeer::doSelect(new Criteria());
    foreach ($acunidades as $unidad){
      $result[$unidad->getId()] = $unidad->getNomuni();
    }

    return $result;

  }
}
