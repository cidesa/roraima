<?php

/**
 * Subclass for representing a row from the 'opdetord' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Opdetord extends BaseOpdetord
{
  private $check = ''; 
  private $retiva = '';
  protected $refe="";
  protected $refsal = '';

  public function setCheck($val)
  {
	$this->check = $val;		
  }
	
  public function getCheck()
  {
	return $this->check;		
  }

  public function setRetiva($val)
  {
	$this->retiva = $val;		
  }
	
  public function getRetiva()
  {
	return $this->retiva;		
  }
}
