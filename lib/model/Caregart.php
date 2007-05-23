<?php

/**
 * Subclass for representing a row from the 'caregart' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Caregart extends BaseCaregart
{
 public function getExitot()
	{
		$data = parent::getExitot();
		if($data!='') return number_format($data,2,'.',',');

	}
	
 public function getCosult()
	{
		$data = parent::getCosult();
		if($data!='') return number_format($data,2,'.',',');

	}
	
 public function getCospro()
	{
		$data = parent::getCospro();
		if($data!='') return number_format($data,2,'.',',');

	}
	
 public function getInvini()
	{
		$data = parent::getInvini();
		if($data!='') return number_format($data,2,'.',',');

	}
 
	
public function getNomram()
	{
		return Herramientas::getX('RAMART','Caramart','Nomram',self::getRamart());
	}


 
	 
}
