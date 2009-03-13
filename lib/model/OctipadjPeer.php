<?php

/**
 * Subclass for performing query and update operations on the 'octipadj' table.
 *
 *
 *
 * @package lib.model
 */
class OctipadjPeer extends BaseOctipadjPeer
{
   public static function getTiposadjudicacion()
  {
    $e = OctipadjPeer::doSelect(new Criteria());
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getCodtipadj()] = $esta->getDestipadj();
      }
      return $resp;
    }else return array();
  }

}
