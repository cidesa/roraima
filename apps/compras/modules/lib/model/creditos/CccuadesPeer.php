<?php

/**
 * Subclass for performing query and update operations on the 'cccuades' table.
 *
 *
 *
 * @package lib.model
 */
class CccuadesPeer extends BaseCccuadesPeer
{
  public static function getDesembolsosByFK($eId)
  {
    $c = new Criteria();
    $c->add(CccreditPeer::NUMEXP,$eId);
    $c->addJoin(CccuadesPeer::CCCREDIT_ID,CccreditPeer::ID);
    $c->add(CccuadesPeer::ESTATU,'PL');
    $m = CccuadesPeer::doSelect($c);

    if($m){
      $resp = array();
      foreach($m as $cua){
        $resp[$cua->getId()] = $cua->getOrddes();
      }

      return $resp;
    }
  }

 public static function getDesembolsosByFKCred($eId)
  {
  	 $resp = array();
    $c = new Criteria();
    $c->add(CccuadesPeer::CCCREDIT_ID,$eId);
    $c->add(CccuadesPeer::ESTATU,'PL');
    $m = CccuadesPeer::doSelect($c);

    if($m){
      $resp = array();
      foreach($m as $cua){
        $resp[$cua->getId()] = $cua->getOrddes();
      }

      return $resp;
    }/*else
    {
     $c = new Criteria();
     $c->add(CccuadesPeer::CCCREDIT_ID,$eId);
     $m = CccuadesPeer::doSelect($c);
     if($m){
      $resp = array();
      foreach($m as $cua){
        $resp[$cua->getId()] = $cua->getOrddes();
      }

      return $resp;
     }*/else return $resp;
    //}
  }


  public static function getMaxDesembolsosByCreditos($eId)
  {
    $c = new Criteria();
    $c->add(CccuadesPeer::CCCREDIT_ID,$eId);
    $c->addDescendingOrderByColumn(CccuadesPeer::FECDES);
    $c->setLimit(1);
    $m = CccuadesPeer::doSelectOne($c);
    if ($m)
      return $m;
    else return "";
  }

}
