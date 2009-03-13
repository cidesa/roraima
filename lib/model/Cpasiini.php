<?php

/**
 * Subclass for representing a row from the 'cpasiini' table.
 *
 *
 *
 * @package lib.model
 */
class Cpasiini extends BaseCpasiini
{
	protected $obj = array();
	protected $monmov = '';


    public function AfterHydrate()
    {
    	//$this->monmov ='10';
    }

    public function getNompre()
    {
    	return Herramientas::getX('codpre','cpdeftit','nompre',self::getCodpre());
    }

}
