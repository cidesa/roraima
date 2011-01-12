<?php

/**
 * Subclass for representing a row from the 'rhdefcur'.
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
class Rhdefcur extends BaseRhdefcur
{
	protected $obj_cla=array();
	protected $obj_inst=array();
	
	public  function getDestipur()
	{
		return H::GetX('Codtipcur','Rhtipcur','Destipcur',$this->codtipcur);
	}
	public  function getNompro()
	{
		return H::GetX('Codpro','Caprovee','Nompro',$this->codpro);
	}
	public  function getNomtit()
	{
		return H::GetX('Codtit','Rhtitcur','Nomtit',$this->codtit);
	}
}
