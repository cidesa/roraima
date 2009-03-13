<?php

/**
 * Subclass for performing query and update operations on the 'fadefcaj' table.
 *
 *
 *
 * @package lib.model
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
