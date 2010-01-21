<?php

/**
 * Subclass for performing query and update operations on the 'cctipana' table.
 *
 *
 *
 * @package lib.model
 */
class CctipanaPeer extends BaseCctipanaPeer
{
  public static function getTipanabyPk($eId)
  {
    $c = new Criteria();
    $c->add(CctipanaPeer::CCGERENC_ID,$eId);
    $m = CctipanaPeer::doSelect($c);
    if($m){
      $resp = array();
      foreach($m as $dato){
        $resp[$dato->getId()] = $dato->getNomtipana();
      }
      return $resp;
    }else return array();
  }
}
