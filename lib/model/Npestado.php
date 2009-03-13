<?php

/**
 * Subclass for representing a row from the 'npestado' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npestado extends BaseNpestado
{
 public function getNompai()
  {
	return Herramientas::getX('CODPAI','Nppais','Nompai',self::getCodpai());	  
  }
	
}
