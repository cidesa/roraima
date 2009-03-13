<?php

/**
 * Subclass for representing a row from the 'npconceptoscategoria' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npconceptoscategoria extends BaseNpconceptoscategoria
{
public function getNomcon()
    {
    	return Herramientas::getX('codcon','npdefcpt','nomcon',self::getCodcon());
    }

public function getDescat()
    {    	
       return Herramientas::getX('codcat','npcatpre','nomcat',self::getCodcat());      
    }

public function getCodpre()
     {  	
    	return Herramientas::getX('codcon','Npdefcpt','codpar',self::getCodcon());
     }

 public function setCheck($val)
  {
	$this->check = $val;		
  }
	
  public function getCheck()
  {
	return $this->check;		
  }

}
