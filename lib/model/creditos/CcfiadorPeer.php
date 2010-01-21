<?php

/**
 * Subclass for performing query and update operations on the 'ccfiador' table.
 *
 *
 *
 * @package lib.model
 */
class CcfiadorPeer extends BaseCcfiadorPeer
{
	  public static function buscarPorCedPerpre ($id, $ced){
	  $c = new Criteria();
      $c->add(CcfiadorPeer::CEDFIA,$ced,Criteria::EQUAL);
      $c->add(CcfiadorPeer::CCPERPRE_ID,$id,Criteria::EQUAL);
	  $p= CcfiadorPeer::doSelect($c);
	  return $p;
	}
}
