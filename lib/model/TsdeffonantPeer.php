<?php

/**
 * Subclase para crear funcionalidades especÃ­ficas de busqueda y actualizaciÃ³n en la tabla 'tsdeffonant'.
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
class TsdeffonantPeer extends BaseTsdeffonantPeer
{
  public static function getFondos()
  {
    $resp = array();
    $c = new Criteria();
    $m = TsdeffonantPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getCodfon()] = $mon->getCodfon()." - ".$mon->getDesfon();
      }
    }
    return $resp;
  }
}
