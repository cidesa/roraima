<?php

/**
 * Subclass for representing a row from the 'rhindniv'.
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
class Rhindniv extends BaseRhindniv
{
	protected $obj_indniv=array();
	
	public  function getDesniv()
	{
		return H::GetX('Codniv','Rhdefniv','Desniv',$this->codniv);
	}
	public  function getDesind()
	{
		return H::GetX('Codind','Rhdefind','Desind',$this->codind);
	}
}
