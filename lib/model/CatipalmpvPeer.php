<?php

/**
 * Subclase para crear funcionalidades especÃ­ficas de busqueda y actualizaciÃ³n en la tabla 'catipalmpv'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class CatipalmpvPeer extends BaseCatipalmpvPeer
{
  public static function getTipos()
  {
    $resp = array();
    $c = new Criteria();
    $m = CatipalmpvPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getCodtippv()] = $mon->getNomtippv();
      }
    }
    return $resp;
  }
}
