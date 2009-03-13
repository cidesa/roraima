<?php

/**
 * Subclass for representing a row from the 'nptippre' table.
 *
 *
 *
 * @package lib.model
 */
class Nptippre extends BaseNptippre
{
  protected $obj=array();

  public function getNomcon()
  {
  	  $c = new Criteria();
  	  $c->add(NpdefcptPeer::CODCON,self::getCodcon());
  	  $nombre = NpdefcptPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomcon();
	  else
	    return ' ';
  }

}
