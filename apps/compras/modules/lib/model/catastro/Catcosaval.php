<?php

/**
 * Subclase para representar una fila de la tabla  'catcosaval'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.catastro
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
