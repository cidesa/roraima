<?php

/**
 * Subclass for representing a row from the 'catcosaval' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catcosaval extends BaseCatcosaval
{
  public function getDesdivgeo()
  {
   return Herramientas::getX('CODDIVGEO','Catdivgeo','Desdivgeo',self::getCoddivgeo());
  }

  public function getDesuso()
  {
   return Herramientas::getX('ID','Catusoesp','Desuso',self::getCatusoespId());
  }

  public function getDesTipo()
  {
  	if (self::getTipo()=='T') $valor='TERRENO';
  	else $valor='CONSTRUCCIÓN';
   return $valor;
  }
}
