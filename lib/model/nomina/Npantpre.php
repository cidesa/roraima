<?php

/**
 * Subclass for representing a row from the 'npantpre' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npantpre extends BaseNpantpre
{
public function getNomemp()
  {
  	return Herramientas::getX('codemp','nphojint','nomemp',self::getCodemp());  	
  }
}
