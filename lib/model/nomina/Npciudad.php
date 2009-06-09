<?php

/**
 * Subclass for representing a row from the 'npciudad' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npciudad extends BaseNpciudad
{
public function getNompai()
  {
	return Herramientas::getX('CODPAI','Nppais','Nompai',self::getCodpai());	  
  }
  
public function getNomedo()
  {
	return Herramientas::getX('CODEDO','Npestado','Nomedo',self::getCodedo());	  
  }  
	
}
