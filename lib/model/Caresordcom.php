<?php

/**
 * Subclass for representing a row from the 'caresordcom' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Caresordcom extends BaseCaresordcom
{
  public function getCanord($val=false)
  {

    if($val) return number_format($this->canord,3,',','.');
    else return $this->canord;

  }
 
	public function setCanord($v)
	{

    if ($this->canord !== $v) {
        $this->canord = Herramientas::toFloat($v,3);
        $this->modifiedColumns[] = CaresordcomPeer::CANORD;
      }
  
	} 


}
