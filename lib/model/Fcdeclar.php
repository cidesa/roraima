<?php

/**
 * Subclass for representing a row from the 'fcdeclar' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Fcdeclar extends BaseFcdeclar
{
  public function getDircon()
  {  	
    return Herramientas::getX('rifcon','fcconrep','dircon',self::getRifcon());
  }	

  public function getTipcon()
  {  	
    return Herramientas::getX('rifcon','fcconrep','tipcon',self::getRifcon());
  }	

  public function getNomcon()
  {  	
    return Herramientas::getX('rifcon','fcconrep','nomcon',self::getRifcon());
  }	
    
  public function getNaccon()
  {  	
    return Herramientas::getX('rifcon','fcconrep','naccon',self::getRifcon());
  }	
   
}
