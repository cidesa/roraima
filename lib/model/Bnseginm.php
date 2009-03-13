<?php

/**
 * Subclass for representing a row from the 'bnseginm' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Bnseginm extends BaseBnseginm
{
  public function getDesinm()
  {    
    return Herramientas::getXx('Bnreginm',array('CODACT','CODINM'),array(self::getCodact(),self::getCodmue()),'Desinm');    		
  }			
  
  public function getDescob()
  {
    return Herramientas::getX('CODCOB','Bncobseg','Descob',self::getCobseginm());	
  }	  
}
