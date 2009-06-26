<?php

/**
 * Subclass for representing a row from the 'npasipre' table.
 *
 *
 *
 * @package lib.model
 */
class Npasipre extends BaseNpasipre
{
  public function getNomcon()
  {
  	  return Herramientas::getX('codtipcon','Nptipcon','Destipcon',self::getCodcon());
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
