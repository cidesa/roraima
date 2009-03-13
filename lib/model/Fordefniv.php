<?php

/**
 * Subclass for representing a row from the 'fordefniv' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Fordefniv extends BaseFordefniv
{
  private $nomemp = '';  
	
  public function setNomemp($val)
  {
	$this->nomemp = $val;		
  }
	
  public function getNomemp()
  {
	return $this->nomemp;		
  }
}
 
