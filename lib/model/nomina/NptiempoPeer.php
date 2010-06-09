<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'nptiempo'.
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
class NptiempoPeer extends BaseNptiempoPeer
{
  public static function getCondiciones()
  {
    $resp = array();

    $c = new Criteria();
    $m = NptiempoPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getCodtie()] = $mon->getDestie();
      }
    }
    return $resp;
  }
}
