<?php

/**
 * Subclass for performing query and update operations on the 'octiplic' table.
 *
 *
 *
 * @package lib.model
 */
class OctiplicPeer extends BaseOctiplicPeer
{
  public static function getTiposLicitacion()
  {
    $e = OctiplicPeer::doSelect(new Criteria());
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getCodtiplic()] = $esta->getDestiplic();
      }
      return $resp;
    }else return array();
  }
}
