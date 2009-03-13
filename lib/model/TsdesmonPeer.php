<?php

/**
 * Subclass for performing query and update operations on the 'tsdesmon' table.
 *
 *
 *
 * @package lib.model
 */
class TsdesmonPeer extends BaseTsdesmonPeer
{
	  public static function getMonedas()
  {
  	$resp = array();
    $c = new Criteria();
    $m = TsdesmonPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getCodmon()] = $mon->getNommon();
      }
    }
    return $resp;
  }
}
