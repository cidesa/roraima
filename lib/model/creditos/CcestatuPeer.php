<?php

/**
 * Subclass for performing query and update operations on the 'ccestatu' table.
 *
 *
 *
 * @package lib.model
 */
class CcestatuPeer extends BaseCcestatuPeer
{
	 public static function getEstatusbyPk($eId)
  {
    $c = new Criteria();
    if($eId!='') {$c->add(CcestatuPeer::CCGERENC_ID,$eId);}
    else $c->add(CcestatuPeer::CCGERENC_ID,0);
    $c->add(CcestatuPeer::ENRUTA,'S');
    $c->addAscendingOrderByColumn(CcestatuPeer::ORDEN);
    $e = CcestatuPeer::doSelect($c);
    if($e){
      $resp = array();
      foreach($e as $est){
        $resp[$est->getId()] = $est->getNombre();
      }
      return $resp;
    }else return array();
  }
}
