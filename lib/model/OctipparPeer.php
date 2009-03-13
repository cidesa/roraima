<?php

/**
 * Subclass for performing query and update operations on the 'octippar' table.
 *
 *
 *
 * @package lib.model
 */
class OctipparPeer extends BaseOctipparPeer
{
  public static function getTipospar()
  {
    $e = OctipparPeer::doSelect(new Criteria());
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getCodtippar()] = $esta->getDestippar();
      }
      return $resp;
    }else return array();
  }
}
