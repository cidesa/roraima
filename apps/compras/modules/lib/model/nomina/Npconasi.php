<?php

/**
 * Subclase para representar una fila de la tabla 'npconasi'.
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
class Npconasi extends BaseNpconasi
{
  protected $nomcon='';
  
  public function getNomcon()
  {
  	return H::getx('Codcon','Npdefcpt','Nomcon',$this->codcpt);
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
