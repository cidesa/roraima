<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npestemp'.
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
class NpestempPeer extends BaseNpestempPeer
{
  public static function getEstatus()
  {
    $resp = array();

    $c = new Criteria();
    $m = NpestempPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getCodestemp()] = $mon->getDesestemp();
      }
    }
    return $resp;
  }
}
