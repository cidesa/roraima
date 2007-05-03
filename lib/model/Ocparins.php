<?php

/**
 * Subclass for representing a row from the 'ocparins' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Ocparins extends BaseOcparins
{
  public function getDespar(){
    
    return Herramientas::getX('codpar','ocdefpar','despar',self::getCodpar());
    
  }

  public function getCancon(){
    
    return Herramientas::getX('codpar','ocparcon','cancon',self::getCodpar());
    
  }
  
  public function getAbrUni(){
    
    $coduni = Herramientas::getX('codpar','ocdefpar','coduni',self::getCodpar());
    return Herramientas::getX('coduni','ocunidad','abruni',$coduni);
    
  }
  
  
}
