<?php

/**
 * Subclase para representar una fila de la tabla 'npseghcm'.
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
class Npseghcm extends BaseNpseghcm
{
	protected $nomnom='';
	protected $nomcon='';
	
	public function getNomnom()
	{
		return H::getX('Codnom','Npnomina','nomnom',$this->codnom);
	}
	public function getNomcon()
	{
		return H::getX('Codcon','Npdefcpt','nomcon',$this->codcon);
	}
	public function getNomconapo()
	{
		return H::getX('Codcon','Npdefcpt','nomcon',$this->codconapo);
	}
}
