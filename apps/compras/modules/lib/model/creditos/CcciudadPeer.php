<?php

/**
 * Subclass for performing query and update operations on the 'ccciudad' table.
 *
 *
 *
 * @package lib.model
 */
class CcciudadPeer extends BaseCcciudadPeer
{
	public static function getCiudades()
  {
    $c = CcciudadPeer::doSelect(new Criteria());
    if($c){
      $resp = array();
      foreach($c as $ciudad){
        $resp[$ciudad->getId()] = $ciudad->getNomciu();
      }
      return $resp;
    }else return array();
  }

  public static function getCiudadesbyPk($eId)
  {
    $c = new Criteria();
    $c->add(CcciudadPeer::CCESTADO_ID,$eId);
    $c->addAscendingOrderByColumn(CcciudadPeer::NOMCIU);
    $m = CcciudadPeer::doSelect($c);
    if($m){
      $resp = array();
      foreach($m as $ciudad){
        $resp[$ciudad->getId()] = $ciudad->getNomciu();
      }
      return $resp;
    }else return array();
  }
}
