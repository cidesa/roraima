<?php

/**
 * Subclass for representing a row from the 'camotfal'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
