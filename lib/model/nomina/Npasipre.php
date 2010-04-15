<?php

/**
 * Subclase para representar una fila de la tabla 'npasipre'.
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
class Npasipre extends BaseNpasipre
{
  public function getNomcon()
  {
  	  return Herramientas::getX('codtipcon','Nptipcon','Destipcon',self::getCodcon());
  }
  
  public function getAfealibv()
  {
  	if ($this->afealibv=='N' || $this->afealibv=='')
	  return 0;  	
  	else
  	    return 1;
  }
  
  public function getAfealibf()
  {
  	if ($this->afealibf=='N' || $this->afealibf=='')
	  return 0;  	
  	else
  	    return 1;
  }

}
