<?php

/**
 * Subclass for representing a row from the 'npconaho' table.
 *
 *
 *
 * @package lib.model
 */
class Npconaho extends BaseNpconaho
{
  private $check = '';

  public function getCheck()
  {
	return $this->check;
  }

 public function setCheck($val)
  {
	$this->check = $val;
  }

  public function getNomnom()
  {
	return Herramientas::getX('CODNOM','Npnomina','Nomnom',self::getCodnom());
  }

  public function getNomcon()
  {
	return Herramientas::getX('CODCON','Npdefcpt','Nomcon',self::getCodcon());
  }




}
