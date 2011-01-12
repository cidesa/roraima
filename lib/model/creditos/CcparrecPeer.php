<?php

class CcparrecPeer extends BaseCcparrecPeer
{
  public static function getCuades($id='')
  {
    $c = new Criteria();
    $c->add(CccuadesPeer::CCCREDIT_ID,$id);
    $e = CccuadesPeer::doSelect($c);
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getId()] = $esta->getOrddes();
      }
      return $resp;
    }else return array();
  }
}
