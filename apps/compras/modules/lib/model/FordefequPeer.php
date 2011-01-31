<?php

/**
 * Subclass for performing query and update operations on the 'fordefequ' table.
 *
 * 
 *
 * @package lib.model
 */ 
class FordefequPeer extends BaseFordefequPeer
{
  public static function getObjetivo($codigo)
  {
  	return Herramientas::getX('CODEQU','Fordefequ','Desobj',$codigo);
  }
}
