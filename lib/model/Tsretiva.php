<?php

/**
 * Subclass for representing a row from the 'tsretiva'.
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
