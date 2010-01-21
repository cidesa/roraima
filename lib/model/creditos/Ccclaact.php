<?php

/**
 * Subclass for representing a row from the 'ccclaact' table.
 *
 *
 *
 * @package lib.model
 */
class Ccclaact extends BaseCcclaact
{

   public static function getClases(){
   $c = new Criteria();
   return CcclaactPeer::doSelect($c);
  }

public function __toString(){
    return $this->getNomclaact();
  }
}
