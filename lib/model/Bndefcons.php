<?php

/**
 * Subclass for representing a row from the 'bndefcons' table.
 *
 *
 *
 * @package lib.model
 */
class Bndefcons extends BaseBndefcons
{
	private $codact1= ' ';
	
	public function getDesmue()
	{
		return Herramientas::getXx('Bnregmue',array('CODACT','CODMUE'),array(self::getCodact(),self::getCodsem()),'Desmue');
	}
	
	public function getDescta()
	{
		return Herramientas::getX('CODCTA','Contabb','descta',self::getCtadepcar());			
	}
	
	public function getDesctaabo()
	{
		return Herramientas::getX('CODCTA','Contabb','descta',self::getCtadepabo());
	}
	
	public function getDesctaajucar()
	{
		return Herramientas::getX('CODCTA','Contabb','descta',self::getCtaajucar());
	}
	
	public function getDesctaajuabo()
	{
		return Herramientas::getX('CODCTA','Contabb','descta',self::getCtaajuabo());
	}
	
	public function getDesctarevcar()
	{
		return Herramientas::getX('CODCTA','Contabb','descta',self::getCtaajuabo());		
	}
	public function getDesctarevabo()
	{
		return Herramientas::getX('CODCTA','Contabb','descta',self::getCtarevabo());		
	}
	
	public function getDesctapercar()
	{
		return Herramientas::getX('CODCTA','Contabb','descta',self::getCtapercar());	
	}
	
	public function getDesctaperabo()
	{
		return Herramientas::getX('CODCTA','Contabb','descta',self::getCtaperabo());	
	}	
	
   public function setCodact1($val)
    {
	   $this->codact1= $val;		
	}
	
	public function getCodact1()
    {  		
		return $this->codact1;
    }	
	
	public function getDesmue1()
	{
		return "";//Herramientas::getXx('Bnregmue',array('CODACT','CODMUE'),array(self::getCodact(),self::getCodsem()),'Desmue');
	}
    
}
