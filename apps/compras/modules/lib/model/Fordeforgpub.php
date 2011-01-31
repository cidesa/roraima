<?php

/**
 * Subclass for representing a row from the 'fordeforgpub'.
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
class Fordeforgpub extends BaseFordeforgpub
{
   public function getPreanu($val=false)
	{
		return parent::getPreanu(true);
	}
	
	public function getCapsoc($val=false)
	{
		return parent::getCapsoc(true);
	}
}
