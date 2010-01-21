<?php

/**
 * Subclass for performing query and update operations on the 'ccgerenc' table.
 *
 *
 *
 * @package lib.model
 */
class CcgerencPeer extends BaseCcgerencPeer
{

public static function getGerencias()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(CcgerencPeer::ORDEN);
    $e = CcgerencPeer::doSelect($c);
    //$e = CcgerencPeer::doSelect(new Criteria());
    if($e){
      $resp = array();
      foreach($e as $gerenc){
        $resp[$gerenc->getId()] = $gerenc->getNomger();
      }
      return $resp;
    }else return array();
  }

  public static function getGerenciasRuta()
  {
    $c = new Criteria();
    $c->add(CcgerencPeer::ENRUTA,'S');
    $c->addAscendingOrderByColumn(CcgerencPeer::ORDEN);
    $e = CcgerencPeer::doSelect($c);
    //$e = CcgerencPeer::doSelect(new Criteria());
    if($e){
      $resp = array();
      foreach($e as $gerenc){
        $resp[$gerenc->getId()] = $gerenc->getNomger();
      }
      return $resp;
    }else return array();
  }

}
