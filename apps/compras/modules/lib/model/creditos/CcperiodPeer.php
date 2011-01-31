<?php

/**
 * Subclass for performing query and update operations on the 'ccperiod' table.
 *
 *
 *
 * @package lib.model
 */
class CcperiodPeer extends BaseCcperiodPeer
{
  public static function getPeriodos()
  {
    $m = CcperiodPeer::doSelect(new Criteria());
    if($m){
      $resp = array();
      foreach($m as $parr){
        $resp[$parr->getId()] = $parr->getDesper();
      }
      return $resp;
    }else return array();
  }
}
