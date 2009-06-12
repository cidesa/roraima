<?php

/**
 * Subclass for representing a row from the 'npconasi' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npconasi extends BaseNpconasi
{
  protected $nomcon='';
  
  public function getNomcon()
  {
  	return H::getx('Codcon','Npdefcpt','Nomcon',$this->codcpt);
  }
  
	
  public function getAfealibv()
  {
  	if ($this->afealibv=='N' || $this->afealibv=='')
	  return 0;  	
  	else
  	    return 1;
  }
  
  public function getAfealibf()
  {
  	if ($this->afealibf=='N' || $this->afealibf=='')
	  return 0;  	
  	else
  	    return 1;
  }
}
