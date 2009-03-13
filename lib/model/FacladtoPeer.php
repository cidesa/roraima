<?php

/**
 * Subclass for performing query and update operations on the 'facladto' table.
 *
 *
 *
 * @package lib.model
 */
class FacladtoPeer extends BaseFacladtoPeer
{
  public static function getUsuarios()
  {
  	$resp = array();
    $c = new Criteria();
    $m = FacladtoPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getLoguse()] = $mon->getLoguse();
      }
    }
    return $resp;
  }
}
