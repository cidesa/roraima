<?php

/**
 * Subclass for representing a row from the 'bnsegmue'.
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
class Bnsegmue extends BaseBnsegmue
{
	
  public function getDesmue()
  {    
    return Herramientas::getXx('Bnregmue',array('CODACT','CODMUE'),array(self::getCodact(),self::getCodmue()),'Desmue');    		
  }		

  public function getDescob()
  {
    return Herramientas::getX('CODCOB','Bncobseg','Descob',self::getCobsegmue());	
  }		  
}
