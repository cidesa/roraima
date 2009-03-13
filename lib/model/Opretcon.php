<?php

/**
 * Subclass for representing a row from the 'opretcon' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Opretcon extends BaseOpretcon
{
	public function getDescon()
	{
      return Herramientas::getX('CODCON','Npdefcpt','Nomcon',self::getCodcon());
	}
	
	public function getDestip()
	{
      return Herramientas::getX('CODTIP','Optipret','Destip',self::getCodtip());
	}
	
		public function getDesnom()
	{
      return Herramientas::getX('CODNOM','Npnomina','Nomnom',self::getCodnom());
	}
	
}
