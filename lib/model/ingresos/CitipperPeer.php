<?php

/**
 * Subclase para crear funcionalidades especÃ­ficas de busqueda y actualizaciÃ³n en la tabla 'citipper'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.ingresos
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class CitipperPeer extends BaseCitipperPeer
{
  public static function getPersonas()
  {
    $resp = array();
    $c = new Criteria();
    $m = CitipperPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getCodtipper()] = $mon->getDestipper();
      }
    }
    return $resp;
  }
}
