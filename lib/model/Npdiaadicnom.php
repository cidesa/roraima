<?php

/**
 * Subclass for representing a row from the 'npdiaadicnom' table.
 *
 *
 *
 * @package lib.model
 */
class Npdiaadicnom extends BaseNpdiaadicnom
{

 private $check= '';


 public function setCheck($val)
  {
	$this->check = $val;
  }

  public function getCheck()
  {
	return $this->check;
  }


 public function getNomnom()
  {
  	  $c = new Criteria();
  	  $c->add(NpnominaPeer::CODNOM,self::getCodnom());
  	  $nombre = NpnominaPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomnom();
	  else
	    return ' ';
  }

  public function getNomcon($codcon="")
  {
  	  $c = new Criteria();
  	  $c->add(NpdefcptPeer::CODCON,$codcon);
  	  $nombre1 = NpdefcptPeer::doSelectone($c);
	  if ($nombre1)
	  	return $nombre1->getNomcon();
	  else
	    return ' ';
  }

}
