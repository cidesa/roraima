<?php

/**
 * Subclass for representing a row from the 'opfactur' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Opfactur extends BaseOpfactur
{
  private $notdeb = '';
  private $notcrd = '';
  private $unocien = '';
  private $impusob = '';
  
  public function setNotdeb($val)
  {
	$this->notdeb = $val;		
  }
	
  public function getNotdeb()
  {
	return $this->notdeb;		
  }
  
  public function setNotcrd($val)
  {
	$this->notcrd = $val;		
  }
	
  public function getNotcrd()
  {
	return $this->notcrd;		
  }
  
  public function setUnocien($val)
  {
	$this->unocien = $val;		
  }
	
  public function getUnocien()
  {
	return $this->unocien;		
  }
  
  public function setImpusob($val)
  {
	$this->impusob = $val;		
  }
	
  public function getImpusob()
  {
	return $this->impusob;		
  }
}