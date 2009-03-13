<?php

/**
 * Subclass for representing a row from the 'cadefalm' table.
 *
 *
 *
 * @package lib.model
 */
class Cadefalm extends BaseCadefalm
{

  public function getNomcat(){
     return Herramientas::getX('codubi','Bnubibie','Desubi',self::getCodcat());
  }

  public function setCodalm($v){

    parent::setCodalm(str_pad($v, 6 , "0", STR_PAD_LEFT));

  }

 private $check = '';


 public function setCheck($val)
  {
	$this->check = $val;
  }

  public function getCheck()
  {
	return $this->check;
  }

}
