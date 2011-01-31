<?php

/**
 * Subclase para representar una fila de la tabla 'npvacdiasbonovac'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Npvacdiasbonovac extends BaseNpvacdiasbonovac
{
public function getNomnom()
  {   
  	return Herramientas::getX('codnom','npnomina','nomnom',self::getCodnom());
  }
 
 public function getLunes()
	
	{ 
		return Herramientas::getX('codnom','npvacjorlab','lunes',self::getCodnom());
	}	  
public function getMartes()
	
	{ 
		return Herramientas::getX('codnom','npvacjorlab','martes',self::getCodnom());
	}	  
public function getMiercoles()
	
	{ 
		return Herramientas::getX('codnom','npvacjorlab','miercoles',self::getCodnom());
	}	  
public function getJueves()
	
	{ 
		return Herramientas::getX('codnom','npvacjorlab','jueves',self::getCodnom());
	}	  
public function getViernes()
	
	{ 
		return Herramientas::getX('codnom','npvacjorlab','viernes',self::getCodnom());
	}	  
public function getSabado()
	
	{ 
		return Herramientas::getX('codnom','npvacjorlab','sabado',self::getCodnom());
	}	  
public function getDomingo()
	
	{ 
		return Herramientas::getX('codnom','npvacjorlab','domingo',self::getCodnom());
	}	  
    	  


}
