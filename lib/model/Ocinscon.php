<?php

/**
 * Subclass for representing a row from the 'ocinscon' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Ocinscon extends BaseOcinscon
{
  
  public function getDescon(){
    
    return Herramientas::getX('Codcon','Ocregcon','Descon',self::getCodcon());
    
  }

  public function getCodobr(){
    
    return Herramientas::getX('Codcon','Ocregcon','Codobr',self::getCodcon());
    
  }
  
  public function getCodpro(){
    
    return Herramientas::getX('Codcon','Ocregcon','Codpro',self::getCodcon());
    
  }
  
  public function getDesobr(){
    
    return Herramientas::getX('Codobr','Ocregobr','',self::getCodobr());
    
  }
  
  public function getNompro(){
    
    return Herramientas::getX('Codpro','Caprovee','Nompro',self::getCodpro());
    
  }
  
}
