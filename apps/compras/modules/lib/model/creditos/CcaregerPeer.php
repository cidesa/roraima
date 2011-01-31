<?php

/**
 * Subclass for performing query and update operations on the 'ccareger' table.
 *
 *
 *
 * @package lib.model
 */
class CcaregerPeer extends BaseCcaregerPeer
{
  public static function getAregerbyPk($eId)
  {
    $c = new Criteria();
    $c->add(CcaregerPeer::CCGERENC_ID,$eId);
    $m = CcaregerPeer::doSelect($c);
    if($m){
      $resp = array();
      foreach($m as $dato){
        $resp[$dato->getId()] = $dato->getNomare();
      }
      return $resp;
    }else return array();
  }
}
