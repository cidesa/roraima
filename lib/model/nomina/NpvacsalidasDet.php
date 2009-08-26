<?php

/**
 * Subclass for representing a row from the 'npvacsalidas_det' table.
 *
 * 
 *
 * @package lib.model
 */ 
class NpvacsalidasDet extends BaseNpvacsalidasDet
{
	
	public function getDiaspdisfrutar()
   {
   	 return ($this->diasdisfutar-$this->diasdisfrutados)-$this->diasvac;
   }
}
