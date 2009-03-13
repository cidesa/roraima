<?php

/**
 * Subclass for performing query and update operations on the 'fordefegrgen' table.
 *
 * 
 *
 * @package lib.model
 */ 
class FordefegrgenPeer extends BaseFordefegrgenPeer
{
		public function getDespar()
	{
		return Herramientas::getX('CODPRE','Cpdeftit','Nompre',trim(self::getCodpariva()));
	}
	
}
