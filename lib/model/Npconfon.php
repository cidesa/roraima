<?php

/**
 * Subclass for representing a row from the 'npconfon' table.
 *
 *
 *
 * @package lib.model
 */
class Npconfon extends BaseNpconfon
{

 private $check = '';


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
	return Herramientas::getX('CODNOM','Npnomina','Nomnom',self::getCodnom());
  }

  public function getNomcon()
  {
	return Herramientas::getX('CODCON','Npdefcpt','Nomcon',self::getCodcon());
  }






}
