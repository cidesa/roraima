<?php

/**
 * Subclass for representing a row from the 'foringdisper' table.
 *
 * 
 *
 * @package lib.model
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
