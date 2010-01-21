<?php

/**
 * Subclass for performing query and update operations on the 'ccmunici' table.
 *
 *
 *
 * @package lib.model
 */
class CcmuniciPeer extends BaseCcmuniciPeer
{
  public static function getMunicipios()
  {
    $m = CcmuniciPeer::doSelect(new Criteria());
    if($m){
      $resp = array();
      foreach($m as $munic){
        $resp[$munic->getId()] = $munic->getNommun();
      }
      return $resp;
    }else return array();
  }

  public static function getMunicipiosbyPk($eId)
  {
    $c = new Criteria();
    $c->add(CcmuniciPeer::CCESTADO_ID,$eId);
    $c->addAscendingOrderByColumn(CcmuniciPeer::NOMMUN);
    $m = CcmuniciPeer::doSelect($c);
    if($m){
      $resp = array();
      foreach($m as $munic){
        $resp[$munic->getId()] = $munic->getNommun();
      }
      return $resp;
    }else return array();
  }


}
