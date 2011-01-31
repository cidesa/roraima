<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'tsdefcajchi'.
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
class TsdefcajchiPeer extends BaseTsdefcajchiPeer
{
  public static function getCajas()
  {
    $resp = array();
    $c = new Criteria();
    $m = TsdefcajchiPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getCodcaj()] = $mon->getCodcaj()." - ".$mon->getDescaj();
      }
    }
    return $resp;
  }
}
