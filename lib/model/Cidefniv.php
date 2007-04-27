<?php

/**
 * Subclass for representing a row from the 'cidefniv' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Cidefniv extends BaseCidefniv
{
public function getNomemp()
  {
  	return Herramientas::getX('CODEMP','EmpresaUser','Nomemp',self::getCodemp());
  }
}
