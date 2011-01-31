<?php

/**
 * Subclass for performing query and update operations on the 'ccclaact' table.
 *
 *
 *
 * @package lib.model
 */
class CcclaactPeer extends BaseCcclaactPeer
{
   public static function getActs(){

      $c = new Criteria();
      $acts = CcclaactPeer::doSelect($c);

	  $tipo = array();

      foreach($acts as $act)
      {
        $tipo += array($act->getId() => $act->getNomclaact());
      }
       return $tipo;

   }
}
