<?php

/**
 * Subclass for representing a row from the 'caajuoc'.
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
