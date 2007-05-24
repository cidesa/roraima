<?php

/**
 * Subclass for representing a row from the 'cadphart' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Cadphart extends BaseCadphart
{
   public function getMondph()
	{
		$data = parent::getMondph();
		if($data!='') return number_format($data,2,'.',',');

	}
	
	public function getNomalm()
	{
		return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
	}
	
	public function getDesreq()
	{
		return Herramientas::getX('REQART','Careqart','Desreq',self::getReqart());
	}
	
	public function getFecreq()
	{
		return Herramientas::getX('REQART','Careqart','Fecreq',self::getReqart());
	}
	
	public function getNomcat()
	{
		return Herramientas::getX('CODCAT','Npcatpre','Nomcat',str_pad(self::getCodori(), 32, ' '));
	}
}
