<?php

/**
 * Subclass for performing query and update operations on the 'ccparroq' table.
 *
 *
 *
 * @package lib.model
 */
class CcparroqPeer extends BaseCcparroqPeer
{
  public static function getParroquias()
  {
    $m = CcparroqPeer::doSelect(new Criteria());
    if($m){
      $resp = array();
      foreach($m as $parr){
        $resp[$parr->getId()] = $parr->getNompar();
      }
      return $resp;
    }else return array();
  }

  public static function getParroquiasbyPk($eId)
  {
    $c = new Criteria();
    $c->add(CcparroqPeer::CCMUNICI_ID,$eId);
    $c->addAscendingOrderByColumn(CcparroqPeer::NOMPAR);
    $m = CcparroqPeer::doSelect($c);
    if($m){
      $resp = array();
      foreach($m as $parr){
        $resp[$parr->getId()] = $parr->getNompar();
      }
      return $resp;
    }else return array();
  }
}
