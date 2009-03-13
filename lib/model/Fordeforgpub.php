<?php

/**
 * Subclass for representing a row from the 'fordeforgpub' table.
 *
 * 
 *
 * @package lib.model
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
