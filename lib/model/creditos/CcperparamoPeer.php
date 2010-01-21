<?php

/**
 * Subclass for performing query and update operations on the 'ccperparamo' table.
 *
 *
 *
 * @package lib.model
 */
class CcperparamoPeer extends BaseCcperparamoPeer
{
	  public static function getPerparamos()
  {
    $e = CcperparamoPeer::doSelect(new Criteria());
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getId()] = $esta->getNomper();
      }
      return $resp;
    }else return array();
  }


}
