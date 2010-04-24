<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'fadefcaj'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: FadefcajPeer.php 33699 2009-10-01 22:15:36Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class FadefcajPeer extends BaseFadefcajPeer
{
  public static function getCajas()
  {
  	$resp = array();
    $c = new Criteria();
    $m = FadefcajPeer::doSelect($c);
    if($m){
      foreach($m as $caj){
        $resp[$caj->getId()] = $caj->getId()."  -  ".$caj->getDescaj();
      }
    }
    return $resp;
  }
}
