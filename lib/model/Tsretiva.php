<?php

/**
 * Subclass for representing a row from the 'tsretiva' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Tsretiva extends BaseTsretiva
{
  private $monrgo = '';
  private $tiprgo = ''; 
  
  public function getDestip()
  {
	return  Herramientas::getX('CODTIP','Optipret','Destip',self::getCodret());
  }
  
  public function getCodcon()
  {
	return  Herramientas::getX('CODTIP','Optipret','Codcon',self::getCodret());
  }
  
  public function getBasimp()
  {
	return  Herramientas::getX('CODTIP','Optipret','Basimp',self::getCodret());
  }
  
  public function getPorret()
  {
	return  Herramientas::getX('CODTIP','Optipret','Porret',self::getCodret());
  }
  
  public function getFactor()
  {
	return  Herramientas::getX('CODTIP','Optipret','Factor',self::getCodret());
  }
  
  public function getPorsus()
  {
	return  Herramientas::getX('CODTIP','Optipret','Porsus',self::getCodret());
  }
  
  public function getNomrgo()
  {
	return  Herramientas::getX('CODRGO','Carecarg','Nomrgo',self::getCodrec());
  }

  public function getCodpre()
  {
	return  Herramientas::getX('CODRGO','Carecarg','Codpre',self::getCodrec());
  }
  
  public function setMonrgo($val)
  {
	$this->monrgo = $val;		
  }
	
  public function getMonrgo()
  {
	return $this->monrgo;		
  }
	
  public function setTiprgo($val)
  {
	$this->tiprgo = $val;		
  }
	
  public function getTiprgo()
  {
	return $this->tiprgo;		
  } 
}
