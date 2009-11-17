<?php

/**
 * Subclass for representing a row from the 'rhvalniv'.
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
class Rhvalniv extends BaseRhvalniv
{
	protected $obj_valniv=array();
	
	public  function getDesniv()
	{
		return H::GetX('Codniv','Rhdefniv','Desniv',$this->codniv);
	}
	public  function getDesvalins()
	{
		return H::GetX('Codvalins','Rhdefvalins','Desvalins',$this->codvalins);
	}
}
