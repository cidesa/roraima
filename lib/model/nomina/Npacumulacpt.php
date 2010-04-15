<?php

/**
 * Subclase para representar una fila de la tabla 'npacumulacpt'.
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
class Npacumulacpt extends BaseNpacumulacpt
{
	protected $objcon=array();
	
	public function getNomnom()
	{
		return H::getX('Codnom','Npnomina','Nomnom',$this->codnom);
	}
	public function getNomcon()
	{
		return H::getX('Codcon','Npdefcpt','Nomcon',$this->codcon);
	}
}
