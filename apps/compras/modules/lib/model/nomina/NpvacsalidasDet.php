<?php

/**
 * Subclase para representar una fila de la tabla 'npvacsalidas_det'.
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
class NpvacsalidasDet extends BaseNpvacsalidasDet
{
	
	public function getDiaspdisfrutar()
   {
   	 return ($this->diasdisfutar-$this->diasdisfrutados)-$this->diasvac;
   }
}
