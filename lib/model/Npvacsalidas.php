<?php

/**
 * Subclass for representing a row from the 'npvacsalidas' table.
 *
 *
 *
 * @package lib.model
 */
class Npvacsalidas extends BaseNpvacsalidas
{
  public function getNomemp()
  {
  	  $c = new Criteria();
  	  $c->add(NphojintPeer::CODEMP,self::getCodemp());
  	  $nombre = NphojintPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomemp();
	  else
	    return ' ';
   }

  public function getFecing($formato=false)
  {
  	  $c = new Criteria();
  	  $c->add(NphojintPeer::CODEMP,self::getCodemp());
  	  $fecha = NphojintPeer::doSelectone($c);
	  if ($fecha)
	   if ($formato)
	     return date("d/m/Y",strtotime($fecha->getFecing()));
	   else
	  	 return $fecha->getFecing();
	  else
	    return ' ';
   }

}
