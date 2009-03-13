<?php

/**
 * Subclass for representing a row from the 'fargoart' table.
 *
 *
 *
 * @package lib.model
 */
class Fargoart extends BaseFargoart
{
  protected $nomrgo="";
  protected $codcta="";
  protected $recfij="";
  protected $tipo="";
  protected $monrgo2="0,00";

  public function getNomrgo()
  {
   return Herramientas::getX('CODRGO','Carecarg','Nomrgo',self::getCodrgo());
  }

  public function getRecfij()
  {
  	$re=Herramientas::getX('CODRGO','Carecarg','Calcul',self::getCodrgo());
  	if ($re=='S')
  	{
  		$valor="Si";
  	}else $valor="No";
   return $valor;
  }

  public function getCodcta()
  {
   return Herramientas::getX('CODRGO','Carecarg','Codcta',self::getCodrgo());
  }

  public function getTipo()
  {
   return Herramientas::getX('CODRGO','Carecarg','Tiprgo',self::getCodrgo());
  }

  public function getMonrgo2()
  {
   return number_format(Herramientas::getX('CODRGO','Carecarg','Monrgo',self::getCodrgo()), 2, ',', '.');
  }
}

