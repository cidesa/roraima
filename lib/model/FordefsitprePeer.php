<?php

/**
 * Subclass for performing query and update operations on the 'fordefsitpre' table.
 *
 *
 *
 * @package lib.model
 */
class FordefsitprePeer extends BaseFordefsitprePeer
{

 public static function getSituacion($codigo)
  {
  	return Herramientas::getX('CODSITPRE','Fordefsitpre','Dessitpre',str_pad($codigo,2,0,STR_PAD_LEFT));
  }
}
