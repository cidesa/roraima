<?php

/**
 * Subclass for performing query and update operations on the 'faartpvp' table.
 *
 *
 *
 * @package lib.model
 */
class FaartpvpPeer extends BaseFaartpvpPeer
{
  public static function getPrecios($codart='')
  {
  	$resp = array();
    if ($codart!='')
    {
      $c = new Criteria();
      $c->add(FaartpvpPeer::CODART,$codart);
      $m = FaartpvpPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[(string)$pvp->getPvpart()] = number_format($pvp->getPvpart(), 2, ',', '.');
       }
      }
    }
    else
    {
      $c = new Criteria();
      $m = FaartpvpPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[(string)$pvp->getPvpart()] = number_format($pvp->getPvpart(), 2, ',', '.');
       }
      }
    }
   return $resp;
  }
}
