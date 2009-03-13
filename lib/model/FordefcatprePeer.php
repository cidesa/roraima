<?php

/**
 * Subclass for performing query and update operations on the 'fordefcatpre' table.
 *
 *
 *
 * @package lib.model
 */
class FordefcatprePeer extends BaseFordefcatprePeer
{
   public static function getUnidad($codigo)
   {
     return Herramientas::getX('CODCAT','Fordefcatpre','Nomcat',$codigo);
   }

	public static function getNomcat($codigo)
	{
	  return Herramientas::getX('CODCAT','Fordefcatpre','Nomcat',$codigo);
	}

	public static function getCodunieje()
	{
	  return '';
	}
}
