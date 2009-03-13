<?php

/**
 * Subclass for representing a row from the 'forpryorgpub' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Forpryorgpub extends BaseForpryorgpub
{
   public function getNomorg()
   {
   	  return Herramientas::getX('CODORG','Fordeforgpub','Nomorg',self::getCodorg());
   }
}
