<?php

/**
 * Subclass for representing a row from the 'bnsegsem'.
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
class Bnsegsem extends BaseBnsegsem
{
  public function getDessem()
  {    
    return Herramientas::getXx('Bnregsem',array('CODACT','CODSEM'),array(self::getCodact(),self::getCodsem()),'Dessem');    		
  }			
  
  public function getDescob()
  {
    return Herramientas::getX('CODCOB','Bncobseg','Descob',self::getCobsegsem());	
  }	
}
