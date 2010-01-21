<?php

/**
 * Subclass for representing a row from the 'ccbalger' table.
 *
 *
 *
 * @package lib.model
 */
class Ccbalger extends BaseCcbalger
{
	protected $objbalger=array();

	  public function getNumerosolicitud(){
   return Herramientas::getX('id','ccsolici','numsol',self::getCcsoliciId());
  }

  public function getNombreBeneficiario(){
   return Herramientas::getX('id','ccbenefi','nomben',self::getCcbenefiId());
  }

}
