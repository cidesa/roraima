<?php

/**
 * Subclass for representing a row from the 'ocpais' table.
 *
 *
 *
 * @package lib.model
 */
class Ocpais extends BaseOcpais
{
  public static function getEstados()
  {
    $e = OcpaisPeer::doSelect(new Criteria());
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getCodpai()] = $esta->getNompai();
      }
      return $resp;
    }else return array();
  }
}
