<?php

/**
 * Subclass for representing a row from the 'bnsegmue' table.
 *
 *
 *
 * @package lib.model
 */
class Bnsegmue extends BaseBnsegmue
{
	
  public function getDesmue()
  {    
    return Herramientas::getXx('Bnregmue',array('CODACT','CODMUE'),array(self::getCodact(),self::getCodmue()),'Desmue');    		
  }		

  public function getDescob()
  {
    return Herramientas::getX('CODCOB','Bncobseg','Descob',self::getCobsegmue());	
  }		  
}
