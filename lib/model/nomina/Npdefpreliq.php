<?php

/**
 * Subclass for representing a row from the 'npdefpreliq' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npdefpreliq extends BaseNpdefpreliq
{
	public function getNomnom()
  {   
  	return Herramientas::getX('codnom','npnomina','nomnom',self::getCodnom());
  }

public function getNompar()
  {   
  	return Herramientas::getX('codpar','nppartidas','nompar',self::getCodpar());
  }

}
