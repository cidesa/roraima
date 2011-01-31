<?php

/**
 * Subclase para representar una fila de la tabla 'npdocentporemp'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npdocentporemp extends BaseNpdocentporemp
{
	protected $nomemp='';
	protected $desdoc='';
	protected $objdoc=array();
	
	public function getNomemp()
	{
		return H::GetX('Codemp','Nphojint','Nomemp',$this->codemp);
	}
	
	public function getDesdoc()
	{
		return H::GetX('Coddoc','Npdocent','Desdoc',$this->coddoc);
	}
}
