<?php

/**
 * Subclass for representing a row from the 'fordefpryaccmet' table.
 *
 *
 *
 * @package lib.model
 */
class Fordefpryaccmet extends BaseFordefpryaccmet
{
  private $distribucion = '';

  public function setDistribucion($val)
  {
	$this->distribucion = $val;
  }

  public function getDistribucion()
  {
     return $this->distribucion;
  }

  public function getNompro()
  {
    return Herramientas::getX('CODPRO','Fordefpry','Nompro',self::getCodpro());
  }

  public function getTippro()
  {
  	//$sw = Herramientas::getX('PROACC','Fordefpry','Proacc',self::getCodpro())=='P';
  	$sw = Herramientas::getX('PROACC','Fordefpry','Proacc',self::getCodpro());
  	if (!empty($sw)){
	    if($sw=="P")
	    {
	    	return 'Proyecto';
	    }
	    elseif($sw=="A")
	    {
	    	return 'Acción Centralizada';
	    }
  	}
  }

  public function getDesaccesp()
  {
    return Herramientas::getX('CODACCESP','Fordefaccesp','Desaccesp',self::getCodaccesp());
  }

  public function getDesunimed()
  {
    return Herramientas::getX('CODUNIMED','Fordefunimed','Desunimed',self::getCodunimed());
  }
}
