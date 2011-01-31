<?php

/**
 * Subclass for performing query and update operations on the 'ccestado' table.
 *
 *
 *
 * @package lib.model
 */
class CcestadoPeer extends BaseCcestadoPeer
{
  public static function getEstados()
  {
    $e = CcestadoPeer::doSelect(new Criteria());
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getId()] = $esta->getNomest();
      }
      return $resp;
    }else return array();
  }
}
