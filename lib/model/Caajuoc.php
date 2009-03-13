<?php

/**
 * Subclass for representing a row from the 'caajuoc' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Caajuoc extends BaseCaajuoc
{
  private $nompro = '';
  
  public function getDesord(){
    
    return Herramientas::getX('ordcom','Caordcom','desord',self::getOrdcom());

            
    
    
  }
  
  public function getCodpro(){
    
    $codpro = Herramientas::getX('ordcom','caordcom','Codpro',self::getOrdcom());
    
    $this->nompro = Herramientas::getX('codpro','CaProvee','nompro',$codpro);
    
    return $codpro;  
    
  }
  
  public function getNompro(){
    
    return $this->nompro; 
    
  }
   
}
