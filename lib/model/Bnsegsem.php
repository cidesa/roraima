<?php

/**
 * Subclass for representing a row from the 'bnsegsem' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Bnsegsem extends BaseBnsegsem
{
  public function getDessem()
  {    
    return Herramientas::getXx('Bnregsem',array('CODACT','CODSEM'),array(self::getCodact(),self::getCodsem()),'Dessem');    		
  }			
  
  public function getDescob()
  {
    return Herramientas::getX('CODCOB','Bncobseg','Descob',self::getCobsegsem());	
  }	
}
