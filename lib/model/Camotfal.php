<?php

/**
 * Subclass for representing a row from the 'camotfal' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Camotfal extends BaseCamotfal
{
  
  public function getCampoa(){
    
    return Herramientas::getX('codfal','Caartdph','codart',self::getCodfal());
    
  }
  
  public function getDesitipfal(){
    
    $reg = parent::getTipfal();
    
    if($reg=='RCP') return 'Recepción';
    else return 'Despacho';
    
    
  }
  
}
