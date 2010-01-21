<?php

/**
 * Subclass for performing query and update operations on the 'ccrepben' table.
 *
 *
 *
 * @package lib.model
 */
class CcrepbenPeer extends BaseCcrepbenPeer
{
	 public static function buscarPorCedPerpre ($id, $ced){
	  $c = new Criteria();
      $c->add(CcrepbenPeer::CEDRIFBEN,$ced,Criteria::EQUAL);
      $c->add(CcrepbenPeer::CCPERPRE_ID,$id,Criteria::EQUAL);
	  $per= CcrepbenPeer::doSelect($c);
	  return $per;
	}

}
