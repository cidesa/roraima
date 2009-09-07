<?php

/**
 * Subclass for representing a row from the 'foringdisper'.
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
class Foringdisper extends BaseForingdisper
{
	public function getMonpar($val=false)
	{
		return parent::getMonpar(true);
	}
	
	public function getPorper($val=false)
	{
		return parent::getPorper(true);
	}
	
}
