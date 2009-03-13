<?php

/**
 * Subclass for representing a row from the 'tsentislr' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Tsentislr extends BaseTsentislr
{
  public function getFeclib()
  {
  	$fec=Herramientas::getX('REFLIB','Tsmovlib','feclib',self::getNumord());
  	if ($fec)
  	{
  	 return  date("d/m/Y",strtotime($fec));
  	}
  	else
  	{
  		return ' ';
  	}
	
  }
}
