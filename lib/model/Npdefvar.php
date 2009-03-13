<?php

/**
 * Subclass for representing a row from the 'npdefvar' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npdefvar extends BaseNpdefvar
{
public function getNomnom(){
    
    return Herramientas::getX('codnom','Npnomina','nomnom',self::getCodnom());
    
  }
	
}
