<?php

/**
 * Subclase para representar una fila de la tabla 'atprovee'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Atprovee extends BaseAtprovee
{
	
	public function __toString()
	{
		return $this->rifpro." - ".$this->nompro;
	}
  
}